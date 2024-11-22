<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingProgram;
use App\Models\User;
use App\Models\Category;
use App\Models\Role;
use App\Models\State;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        return view('panel-pages.admin-panel.dashboard');
    }
    public function listTrainingProgramme(Request $request){
        if ($request->ajax()) {
            $query = TrainingProgram::orderBy('id', 'DESC');
            if ($request->filled('programme_name')) {
                $query->where('programme_name', 'like', '%' . $request->programme_name . '%');
            }
            if ($request->filled('course_director_name')) {
                $query->where('course_director_name', 'like', '%' . $request->course_director_name . '%');
            }
            if ($request->filled('from_date')) {
                $query->where('from_date', '>=', $request->from_date);
            }
            if ($request->filled('to_date')) {
                $query->where('to_date', '<=', $request->to_date);
            }
            return Datatables::of($query)
                    ->addIndexColumn()
                    ->addColumn('from_date', function($row){
                            return date('d-m-Y',strtotime($row->from_date));
                    })
                    ->addColumn('to_date', function($row){
                        return date('d-m-Y',strtotime($row->to_date));
                    })
                    ->addColumn('status', function($row){
                       return $row->status==1?"<button class='btn btn-success programme-status'  data-id='{$row->id}' data-status='1'>Active</button>":"<button class='btn btn-danger programme-status' data-id='{$row->id}' data-status='0'>In-Active</button>";
                    })
                    ->addColumn('action', function($row){
                        return '<a href="' . url('admin/view-training-programme/' . Crypt::encryptString($row->id)) . '" target="_blank" class="btn btn-primary">View</a><a href="' . url('admin/edit-training-programme/' . Crypt::encryptString($row->id)) . '" target="_blank" class="btn btn-primary">Edit</a>';
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('panel-pages.admin-panel.training-programme.list-training-programme');
    }
    public function addTrainingProgramme(){
        return view('panel-pages.admin-panel.training-programme.add-training-programme');
    }
    public function saveTrainingProgramme(Request $request){
        $validation = [
            'programme_name' => 'required|string|max:255',
            'course_director_name' => 'required|string|max:255',
            'from_date' => 'required',
            'to_date' => 'required',
            'course_fee' => 'required|numeric',
            'eligibility' => 'required',
            'core_contents' => 'required',
        ];
        if ($request->hasFile('brochure')) {
            $validation['brochure'] = 'required|mimes:pdf|max:2048';
        }
        $request->validate($validation);
        $TrainingProgram = new TrainingProgram;
        $TrainingProgram->programme_name = $request->programme_name;
        $TrainingProgram->course_director_name = $request->course_director_name;
        $TrainingProgram->from_date = $request->from_date;
        $TrainingProgram->to_date = $request->to_date;
        $TrainingProgram->from_time = $request->from_time;
        $TrainingProgram->to_time = $request->to_time;
        $TrainingProgram->course_fee = $request->course_fee;
        $TrainingProgram->eligibility = $request->eligibility;
        $TrainingProgram->core_contents = $request->core_contents;
        if ($request->hasFile('brochure')) {
            $brochure = $request->file('brochure');
            $brochure_name = date('d-m-Y').'-'.time().'-'.$brochure->getClientOriginalName();
            $brochure->move('training-programmes/brochures', $brochure_name);
            $TrainingProgram->brochure = $brochure_name;
        }
        $TrainingProgram->save();
        return redirect()->route('adminListTrainingProgramme')->with('success', 'Your data has been saved successfully.');
    }
    public function editTrainingProgramme($id){
        $programme_id = Crypt::decryptString($id);
        $data['programme'] = TrainingProgram::find($programme_id);
        return view('panel-pages.admin-panel.training-programme.edit-training-programme',$data);
    }
    public function updateTrainingProgramme(Request $request){
        $validation = [
            'id' => 'required',
            'programme_name' => 'required|string|max:255',
            'course_director_name' => 'required|string|max:255',
            'from_date' => 'required',
            'to_date' => 'required',
            'course_fee' => 'required|numeric',
            'eligibility' => 'required',
            'core_contents' => 'required',
            'status' => 'required',
        ];
        if ($request->hasFile('brochure')) {
            $validation['brochure'] = 'required|mimes:pdf|max:2048';
        }
        $request->validate($validation);
        $TrainingProgram = TrainingProgram::find($request->id);
        $TrainingProgram->programme_name = $request->programme_name;
        $TrainingProgram->course_director_name = $request->course_director_name;
        $TrainingProgram->from_date = $request->from_date;
        $TrainingProgram->to_date = $request->to_date;
        $TrainingProgram->from_time = $request->from_time;
        $TrainingProgram->to_time = $request->to_time;
        $TrainingProgram->course_fee = $request->course_fee;
        $TrainingProgram->eligibility = $request->eligibility;
        $TrainingProgram->core_contents = $request->core_contents;
        $TrainingProgram->status = $request->status;
        if ($request->hasFile('brochure')) {
            $brochure = $request->file('brochure');
            $brochure_name = date('d-m-Y').'-'.time().'-'.$brochure->getClientOriginalName();
            $brochure->move('training-programmes/brochures', $brochure_name);
            $TrainingProgram->brochure = $brochure_name;
        }
        $TrainingProgram->save();
        return redirect()->route('adminListTrainingProgramme')->with('success', 'Your data has been updated successfully.');
    }
    public function viewTrainingProgramme($id){
        $programme_id = Crypt::decryptString($id);
        $data['programme'] = TrainingProgram::find($programme_id);
        return view('panel-pages.admin-panel.training-programme.view-training-programme',$data);
    }
    public function updateStatusTrainingProgramme(Request $request){
        $TrainingProgram = TrainingProgram::find($request->programmeId);
        $TrainingProgram->status = $request->newStatus;
        $TrainingProgram->save();
        return response()->json(['message' => 'Status updated successfully','status'=>200]);
    }
    public function listUsers(Request $request){
        $data['categories'] = Category::get();
        $data['roles'] = Role::get();
        if ($request->ajax()) {
            $query = User::join('roles', 'roles.id', '=', 'users.role')
            ->join('categories', 'categories.id', '=', 'users.categories')
            ->select('users.id', 'users.name', 'users.mobile_number', 'users.email', 'roles.role_name','categories.category_name')
            ->orderBy('users.id', 'DESC');
            if ($request->filled('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->filled('mobile_number')) {
                $query->where('mobile_number', 'like', '%' . $request->mobile_number . '%');
            }
            if ($request->filled('email')) {
                $query->where('email', 'like', '%' . $request->email . '%');
            }
            if ($request->filled('category_name')) {
                $query->where('categories', $request->category_name);
            }
            if ($request->filled('role_name')) {
                $query->where('role', $request->role_name );
            }
            return Datatables::of($query)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="' . url('admin/edit-users/' . Crypt::encryptString($row->id)) . '" target="_blank" class="btn btn-primary">View</a><a href="' . url('admin/edit-users/' . Crypt::encryptString($row->id)) . '" target="_blank" class="btn btn-primary">Edit</a>';
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('panel-pages.admin-panel.users.list-users',$data);
    }
    public function editUsers($id){
        $user_id = Crypt::decryptString($id);
        $data['user_detail'] = User::find($user_id);
        $data['categories'] = Category::get();
        $data['roles'] = Role::get();
        $data['states'] = State::where('status',1)->get();
        return view('panel-pages.admin-panel.users.edit-users',$data);
    }
    public function updateUsers(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|max:255',
            'title' => 'required',
            'categories' => 'required',
            'state' => 'required',
            'city' => 'required|string|max:255',
        ]);
        $users = User::find($request->id);
        $users->name = $request->name;
        $users->title = $request->title;
        $users->categories = $request->categories;
        $users->state = $request->state;
        $users->city = $request->city;
        $users->save();
        return redirect()->route('adminListUsers')->with('success', 'Your users details have been updated successfully.');
    }
    public function addUsers(){
        $data['categories'] = Category::get();
        $data['roles'] = Role::get();
        $data['states'] = State::where('status',1)->get();
        return view('panel-pages.admin-panel.users.add-users',$data);    
    }
    public function saveUsers(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:255|unique:users,mobile_number',
            'email' => 'required|string|email|max:255|unique:users,email',
            'title' => 'required',
            'categories' => 'required',
            'state' => 'required',
            'city' => 'required|string|max:255',
        ]);
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->mobile_number = $request->mobile_number;
        $users->password = Hash::make($request->mobile_number);
        $users->normal_password = $request->mobile_number;
        $users->title = $request->title;
        $users->categories = $request->categories;
        $users->state = $request->state;
        $users->city = $request->city;
        $users->save();
        return redirect()->route('adminListUsers')->with('success', 'Your users details have been saevd successfully.');
    }
}
