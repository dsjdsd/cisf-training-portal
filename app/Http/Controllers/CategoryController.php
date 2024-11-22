<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function listCategory(Request $request){
        if ($request->ajax()) {
            $query = Category::orderBy('id', 'DESC');
            return Datatables::of($query)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                       return $row->status==1?"<button class='btn btn-success category-status'  data-id='{$row->id}' data-status='1'>Active</button>":"<button class='btn btn-danger category-status' data-id='{$row->id}' data-status='0'>In-Active</button>";
                    })
                    ->addColumn('action', function($row){
                        return '<a href="' . url('admin/edit-category/' . Crypt::encryptString($row->id)) . '" target="_blank" class="btn btn-primary">Edit</a>';
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('panel-pages.admin-panel.categories.list-category');
    }
    public function addCategory(){
        return view('panel-pages.admin-panel.categories.add-category');
    }
    public function saveCategory(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:255'
        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('adminListCategory')->with('success', 'Your category details have been saved successfully.');
    }
    public function editCategory($id){
        $category_id = Crypt::decryptString($id);
        $data['category'] = Category::find($category_id);
        return view('panel-pages.admin-panel.categories.edit-category',$data);
    }
    public function updateCategory(Request $request){
        $request->validate([
            'id' => 'required',
            'category_name' => 'required|string|max:255',
        ]);
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('adminListCategory')->with('success', 'Your category details have been updated successfully.');
    }
    public function updateStatusCategory(Request $request){
        $Category = Category::find($request->categoryId);
        $Category->status = $request->newStatus;
        $Category->save();
        return response()->json(['message' => 'Status updated successfully','status'=>200]);
    }
}
