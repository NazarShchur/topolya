<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\Additional;
use App\Model\Order;

class AdminOrderController extends Controller
{
    public function getAllOrders() {
        return view('admin.orders', ['orders' => Order::all()]);
    }

    public function getOrderById($id){
        $order = Order::all()->firstWhere('id', '=', $id);
        return view("admin.editOrder", [
            'order' => $order,
            'additionals' => Additional::all()->where('is_active', '=', true),
            'to_pay' => $this->orderToPay($order),
            'payed' => $this->orderPayed($order)
        ]);
    }

    public function closeOrder($id){
        $order = Order::all()->firstWhere('id', '=', $id);
        $order->is_closed = true;
        $order->save();

        foreach ($order->additional_orders()->get() as $add){
            $add->is_closed = true;
            $add->save();
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

}
