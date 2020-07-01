<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\Additional;
use App\Model\AdditionalOrder;
use App\Model\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getAllOrders() {
        return view('orders', ['orders' => Order::all()]);
    }

    public function getOrderById($id){
        return view("editOrder", ['order' => Order::all()->firstWhere('id', '=', $id), 'additionals' => Additional::all()]);
    }

    public function addAdditional(Request $request)
    {
        $add_order = new AdditionalOrder();
        $add_order->additional_id = $request->additional_id;
        $add_order->order_id = $request->order_id;
        $add_order->start_time = $request->start_time;
        $add_order->is_closed = false;
        $add_order->save();
        return redirect("/orders/$request->order_id");
    }

    public function closeHourlyAdditional(Request $request)
    {
        $add_order = AdditionalOrder::all()->firstWhere('id', '=', $request->additional_order_id);
        $add_order->end_time = $request->end_time;
        $add_order->save();
        return back();
    }
}
