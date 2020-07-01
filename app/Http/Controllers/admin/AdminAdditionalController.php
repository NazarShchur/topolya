<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\Additional;
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

    public function getAdditionals(){
        return view('admin.editAdds', ['additionals'=>Additional::all()->where('is_active', '=', true)]);
    }

    public function editAdditional(Request $request){
        $add = Additional::all()->firstWhere('id', '=', $request->additional_id);
        $add->name = $request->name;
        $add->price = $request->price;
        $add->is_hourly = $request->is_hourly;
        $add->save();
        return back();
    }

    public function createAdditional(Request $request){
        $add = new Additional();
        $add->name = $request->name;
        $add->price = $request->price;
        $add->is_hourly = $request->is_hourly;
        $add->is_active = true;
        $add->save();
        return back();
    }

    public function deleteAdditional(Request $request){
        $add = Additional::all()->firstWhere('id', '=', $request->additional_id);
        $add->is_active = false;
        $add->save();
        return back();
    }
}
