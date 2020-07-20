<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\Additional;
use App\Model\Order;
use Carbon\Carbon;

class AdminOrderController extends Controller
{
    public function getAllOrdersPaginated() {
        return view('admin.orders', ['orders' => Order::paginate(2)]);
    }



    public function getOrderById($id){
        $order = Order::all()->firstWhere('id', '=', $id);
        return view("admin.editOrder", [
            'order' => $order,
            'additionals' => Additional::all()->where('is_active', '=', true),
            'to_pay' => $this->orderToPay($order),
            'payed' => $this->orderPayed($order),
            'now' => $this->currentTimeMoscow()
        ]);
    }

    public function payAll($id){
        $order = Order::all()->firstWhere('id', '=', $id);

        foreach ($order->additional_orders()->get() as $add){
            if($add->to_pay > 0){
                $add->is_closed = true;
                $add->save();
            }
        }
        return back();
    }

    private function orderToPay(Order $order){
        $to_pay = 0;
        foreach ($order->additional_orders()->get() as $add){
            //if(!$add->is_closed){
                $to_pay+=$add->to_pay;
           // }
        }
        return $to_pay;
    }

    private function orderPayed(Order $order){
        $payed = 0;
        foreach ($order->additional_orders()->get() as $add){
            if($add->is_closed){
                $payed+=$add->to_pay;
            }
        }
        return $payed;
    }

    private function currentTimeMoscow(){
        return Carbon::now('Europe/Moscow')->format('H:i');
    }

}
