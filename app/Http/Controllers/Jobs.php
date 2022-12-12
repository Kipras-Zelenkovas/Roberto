<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Jobs as ModelsJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Jobs extends Controller
{

    public function index(Request $request, $page = 1){
        try {
            $pagination = 15;
            $cities = Cities::all();
            $request->page !== null ? $currentPage = $request->page : $currentPage = 1;
            $jobs = ModelsJobs::where('id', '>', ($currentPage - 1) * $pagination)->paginate($pagination);
            
            return view('main', ['jobs' => $jobs, 'page' => $currentPage, 'cities' => $cities]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function search(Request $request){
        try {
            $pagination = 15;
            $request->page !== null ? $currentPage = $request->page : $currentPage = 1;
            $jobs = ModelsJobs::where('id', '>', ($request->page - 1) * $pagination)->where('title', 'LIKE', '%'.$request->search.'%')->paginate($pagination);
            $cities = Cities::all();

            return view('main', ['jobs' => $jobs, 'page' => $currentPage, 'cities' => $cities]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function byCity(Request $request){
        try {
            $pagination = 15;
            $request->page !== null ? $currentPage = $request->page : $currentPage = 1;
            $jobs = ModelsJobs::where('city_id', $request->city_id)->where('id', '>', ($request->page - 1) * $pagination)->paginate($pagination);
            $cities = Cities::all();

            return view('main', ['jobs' => $jobs, 'page' => $currentPage, 'cities' => $cities]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    
    public function find(Request $request){
        try {
            $job = ModelsJobs::find($request->id);

            return view('job', ['job' => $job]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function modify(Request $request){ 
        try {
            $job = ModelsJobs::find($request->id);
            $cities = Cities::all();
            if(Gate::allows('modify-job', $job) || Gate::allows('admin')){
                return view('modify-job', ['job' => $job, 'cities' => $cities]);
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function add(){

        try {
            $cities = Cities::all();

            return view('create-job', ['cities' => $cities]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function create(Request $request){
        try {
            $request->validate([
                'title'         => 'required|string|max:40|min:5',
                'city_id'       => 'required|string',
                'wage'          => 'required|string|max:6|min:3',
                'position'      => 'required|string|max:20|min:3',
                'description'   => 'required|string|max:300|min:40'
            ]);

            $job = ModelsJobs::create([
                'title'         => $request->title,
                'city_id'       => $request->city_id,
                'wage'          => $request->wage,
                'position'      => $request->position,
                'description'   => $request->description,
                'user_id'       => Auth::id(),
            ]);

            $job->save();

            return redirect('/job?id='. $job->id);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    
    public function update(Request $request){
        try {
            $job = ModelsJobs::find($request->id);

            if(Gate::allows('modify-job', $job) || Gate::allows('admin')){
                $request->validate([
                    'title'         => 'required|string|max:40|min:5',
                    'city_id'          => 'required|string',
                    'wage'          => 'required|string|max:9|min:3',
                    'position'      => 'required|string|max:20|min:3',
                    'description'   => 'required|string|max:300|min:40'
                ]);

                $job->title         = $request->title;
                $job->city_id       = $request->city_id;
                $job->wage          = $request->wage;
                $job->position      = $request->position;
                $job->description   = $request->description;

                $job->save();

                return redirect('/job?id='. $job->id);
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function delete(Request $request){
        try {
            $job = ModelsJobs::find($request->id);

            if(Gate::allows('modify-job', $job) || Gate::allows('admin')){
                $job->applications()->delete();
                $job->delete();

                return redirect('/');
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

}
