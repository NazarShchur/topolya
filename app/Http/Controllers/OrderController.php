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

        return view('pavilions');
    }

    public function getAll() {
        return view('orders', ['orders' => Order::all()]);
    }

    public function getById($id){
        return view("editOrder", ['order' => Order::all()->firstWhere('id', '=', $id), 'additionals' => Additional::all()]);
    }


}
