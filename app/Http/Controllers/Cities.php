<?php

namespace App\Http\Controllers;

use App\Models\Cities as ModelsCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Cities extends Controller
{
    
    public function index(){
        try {
            if(Gate::allows('admin')){
                return view('cities', ['cities' => ModelsCities::all()]);
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function add(){
        try {
            if(Gate::allows('admin')){
                return view('city-add');
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function create(Request $request){
        try {
            if(Gate::allows('admin')){
                $request->validate([
                    'name' => 'required'
                ]);

                $city = ModelsCities::create([
                    'name'  => $request->name
                ]);

                $city->save();

                return redirect('/');
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function delete(Request $request){
        try {
            if(Gate::allows('admin')){
                $city = ModelsCities::find($request->id);

                $city->jobs()->delete();
                $city->delete();

                return redirect('/cities');
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

}
