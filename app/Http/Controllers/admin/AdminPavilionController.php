<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\Additional;
use App\Model\Pavilion;
use Illuminate\Http\Request;

class AdminPavilionController extends Controller
{
    public function getPavilions(){
        return view('admin.editPavilions', ['pavilions'=>Pavilion::all()]);
    }

    public function editPavilion(Request $request)
    {
        $pavilion = Pavilion::all()->firstWhere('id', '=', $request->pavilion_id);
        $pavilion->name = $request->name;
        $pavilion->price = $request->price;
        $pavilion->places_count = $request->places_count;
        $pavilion->save();
        return back();
    }

    public function addPavilion(Request $request){
        $pavilion = new Pavilion();
        $pavilion->name = $request->name;
        $pavilion->price = $request->price;
        $pavilion->places_count = $request->places_count;
        $pavilion->save();
        return back();
    }

    public function deletePavilion(Request $request){
        $pavilion = Pavilion::all()->firstWhere('id', '=', $request->pavilion_id);
        $pavilion->delete();
        return back();
    }
}
