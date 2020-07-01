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
        return view("admin.editOrder", ['order' => Order::all()->firstWhere('id', '=', $id), 'additionals' => Additional::all()]);
    }

}
