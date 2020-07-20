<?php


namespace App\Http\Controllers;


use App\Model\Additional;
use App\Model\AdditionalOrder;
use App\Model\Order;
use App\Model\Pavilion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $order = new Order();
        $order->contact_number = $request->phone;
        $order->contact_name = $request->name;
        $order->people_count = $request->people_count;
        $order->is_closed = false;
        $order->date = $request->date;
        $order->pavilion_id = $request->pavilion_id;
        if ($this->validateOrder($order)) {
            $order->save();
            $this->createAdditionalOrderForGivenPavilion($order);
            return back();
        } else {
            return back()->withErrors(['error' => "Беседка занята для даты $order->date"]);
        }
    }

    private function createAdditionalOrderForGivenPavilion(Order $order)
    {
        $pavilion = $order->pavilion()->first();
        $add_order = new AdditionalOrder();
        $add_order->is_closed = false;
        $add_order->to_pay = $pavilion->price;
        $add_order->order_id = $order->id;
        $add_order->additional_id = Additional::all()->firstWhere('name', '=', $pavilion->name)->id;
        $add_order->save();
    }

    private function validateOrder(Order $order)
    {
        $orders = Order::all()->where('pavilion_id', '=', $order->pavilion_id);
        $dates = [];
        foreach ($orders as $ord) {
            $dates[] = $ord->date;
        }
        return !in_array($order->date, $dates);
    }

    public function getAllOrdersCalendar(Request $request)
    {
        $date = is_null($request->date) ? Carbon::now()->format('Y-m') : $request->date;

        $orders = $this->getOrdersForGivenDate($date);

        $fullOccupied = [];
        $halfOccupied = [];

        $countOfPavilions = Pavilion::all()->count();

        $dates = $orders->map(function (Order $order) {
            return $order->date->format('Y-m-d');
        })->toArray();

        $counts = array_count_values($dates);
        foreach ($counts as $key => $value) {
            if ($value == $countOfPavilions && !in_array($key, $fullOccupied)) {
                $fullOccupied[] = $key;
            } else if (!in_array($key, $fullOccupied)) {
                $halfOccupied[] = $key;
            }
        }

        return view('admin.calendar', ['fullOccupied' => $fullOccupied, 'halfOccupied' => $halfOccupied, 'date' => $date]);
    }

    private function getOrdersForGivenDate($date)
    {
        $date = $this->parseDate($date);
        $orders = Order::all();
        foreach ($orders as $key => $order) {
            if ($order->date->month != $date['month'] || $order->date->year != $date['year']) {
                $orders->forget($key);
            }
        }
        return $orders;
    }

    private function parseDate($date)
    {
        $exp = explode('-', $date);
        return ['year' => $exp[0], 'month' => $exp[1]];
    }
}
