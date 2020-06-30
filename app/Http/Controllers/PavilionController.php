<?php


namespace App\Http\Controllers;


use App\Model\Pavilion;

class PavilionController extends Controller
{
    public function getAll(){
        return view('pavilions', ['pavilions' => Pavilion::all()]);
    }


    public function getById($id){
        return view('pavilion',
            ['pavilion' => Pavilion::all()->firstWhere("id", '=', $id)]);
    }
}
