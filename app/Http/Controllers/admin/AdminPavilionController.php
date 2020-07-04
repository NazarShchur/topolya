<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\Additional;
use App\Model\Pavilion;
use Illuminate\Database\QueryException;
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

        try {
            $pavilion->save();
        } catch (QueryException $e){
            return back()->withErrors(['error'=>"Беседка с именем $pavilion->name уже существует"]);
        }
        $this->createAdditionalPavilion($pavilion);
        return back();
    }

    public function deletePavilion(Request $request){
        $pavilion = Pavilion::all()->firstWhere('id', '=', $request->pavilion_id);
        $pavilion->delete();
        return back();
    }

    private function createAdditionalPavilion($pavilion){
        $add = new Additional();
        $add->name = $pavilion->name;
        $add->is_hourly = false;
        $add->price = $pavilion->price;
        $add->is_active = false;
        $add->save();
    }
}
