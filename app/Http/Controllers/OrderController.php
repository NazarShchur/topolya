<?php


namespace App\Http\Controllers;


use App\Model\Additional;
use App\Model\AdditionalOrder;
use App\Model\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request){
        $order = new Order();
        $order->contact_number = $request->phone;
        $order->contact_name = $request->name;
        $order->people_count = $request->people_count;
        $order->is_closed = false;
        $order->date = $request->date;
        $order->pavilion_id = $request->pavilion_id;
        $order->save();
        $this->createAdditionalOrderForGivenPavilion($order);
        return back();
    }

    private function createAdditionalOrderForGivenPavilion(Order $order){
        $pavilion = $order->pavilion()->first();
        $add_order = new AdditionalOrder();
        $add_order->is_closed = false;
        $add_order->to_pay = $pavilion->price;
        $add_order->order_id = $order->id;
        $add_order->additional_id = Additional::all()->firstWhere('name', '=', $pavilion->name)->id;
        $add_order->save();
    }

}
