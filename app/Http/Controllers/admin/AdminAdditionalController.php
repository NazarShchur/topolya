<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\AdditionalOrder;
use Illuminate\Http\Request;

class AdminAdditionalController extends Controller
{
    public function addAdditional(Request $request)
    {
        $add_order = new AdditionalOrder();
        $add_order->additional_id = $request->additional_id;
        $add_order->order_id = $request->order_id;
        $add_order->start_time = $request->start_time;
        $add_order->is_closed = false;
        $add_order->save();
        return back();
    }

    public function closeHourlyAdditional(Request $request)
    {
        $add_order = AdditionalOrder::all()->firstWhere('id', '=', $request->additional_order_id);
        $add_order->end_time = $request->end_time;
        $add_order->save();
        return back();
    }
}
