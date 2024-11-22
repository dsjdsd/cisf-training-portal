<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;
use DataTables;
use Illuminate\Support\Facades\Crypt;
class RoleController extends Controller
{
    public function listRole(Request $request){
        if ($request->ajax()) {
            $query = Role::orderBy('id', 'DESC');
            return Datatables::of($query)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                       return $row->status==1?"<button class='btn btn-success role-status'  data-id='{$row->id}' data-status='1'>Active</button>":"<button class='btn btn-danger role-status' data-id='{$row->id}' data-status='0'>In-Active</button>";
                    })
                    ->addColumn('action', function($row){
                        return '<a href="' . url('admin/edit-role/' . Crypt::encryptString($row->id)) . '" target="_blank" class="btn btn-primary">Edit</a>';
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('panel-pages.admin-panel.roles.list-role');
    }
    public function addRole(){
        return view('panel-pages.admin-panel.roles.add-role');
    }
    public function saveRole(Request $request){
        $request->validate([
            'role_name' => 'required|string|max:255'
        ]);
        $role = new Role;
        $role->role_name = $request->role_name;
        $role->save();
        return redirect()->route('adminListRole')->with('success', 'Your role details have been saved successfully.');
    }
    public function editRole($id){
        $role_id = Crypt::decryptString($id);
        $data['role'] = Role::find($role_id);
        return view('panel-pages.admin-panel.roles.edit-role',$data);
    }
    public function updateRole(Request $request){
        $request->validate([
            'id' => 'required',
            'role_name' => 'required|string|max:255',
        ]);
        $role = Role::find($request->id);
        $role->role_name = $request->role_name;
        $role->save();
        return redirect()->route('adminListRole')->with('success', 'Your role details have been updated successfully.');
    }
    public function updateStatusRole(Request $request){
        $Role = Role::find($request->roleId);
        $Role->status = $request->newStatus;
        $Role->save();
        return response()->json(['message' => 'Status updated successfully','status'=>200]);
    }
}
