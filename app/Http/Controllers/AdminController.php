<?php

namespace App\Http\Controllers;

use App\Models\FurnitureModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getForm(){
        return view('admin.createNewFurniture');
    }
    public function saveFurniture(Request $request){
        $newFurniture = new FurnitureModel();
        $newFurniture->name = $request->get('name');
        $newFurniture->avatar = $request->get('avatar');
        $newFurniture->price = $request->get('price');
        $result = $newFurniture->save();
        if ($result) {
            Session::flash('message', 'Action successfully !!!');
        } else {
            Session::flash('messageFalse', 'Action failed !!!');
        }
        $adminController = new AdminController();
        return $adminController->getAll();
    }

    public function getAll(){
        $items = FurnitureModel::all();
        return view('admin.allFurniture', ['items'=>$items]);
    }
}
