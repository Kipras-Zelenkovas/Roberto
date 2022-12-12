<?php

namespace App\Http\Controllers;

use App\Models\Applications as ModelsApplications;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Applications extends Controller
{

    public function add(Request $request){
        try {
            return view('application-add', ['job_id' => $request->id]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function index(Request $request){
        try {
            $job = Jobs::find($request->id);

            if(Gate::allows('modify-job', $job) || Gate::allows('admin')){
                return view('applications', ['applications' => $job->applications]);
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function find(Request $request){
        try {

            $application = ModelsApplications::find($request->id);
            $job = $application->job;

            if(Gate::allows('modify-job', $job) || Gate::allows('admin')){
                return view('/application', ['application' => $application, 'job' => $job]);
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function create(Request $request){
        try {
            $request->validate([
                'letter' => 'required|string|min:50|max:200',
                'job_id' => 'required'    
            ]);

            $application = ModelsApplications::create([
                'user_id'   => Auth::id(),
                'job_id'    => $request->job_id,
                'letter'    => $request->letter
            ]);

            $application->save();

            return redirect('/?page=1');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function delete(Request $request){
        try {
            $application = ModelsApplications::find($request->id);
            if(Gate::allows('modify-job', $application->job->id) || Gate::allows('admin')){
                $application->delete();

                return redirect('/job?id='. $application->job->id);
            }

            return abort(403);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }


}
