<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     *  Fee Category view list
     */
    public function viewFeeCategory()
    {
        $data['all_data'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category', $data);
    }
    /***
     * add Fee Category
     */
    public function addFeeCategory()
    {
        return view('backend.setup.fee_category.add_fee_category');
    }
    /***
     *  store Fee Category
     */
    public function storeFeeCategory(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    /****
     *  edit Fee Category
     */
    public function editFeeCategory($id)
    {
        $edit_data = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category', compact('edit_data'));
    }
    /***
     * update Fee Category
     */
    public function updateFeeCategory(Request $request, $id)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = FeeCategory::find($id);
        $data->name = $request->name;
        $data->update();

        $notification = array(
            'message' => 'Fee Category updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    /****
     *  delete Fee Category  data
     */
    public function deleteFeeCategory($id)
    {
        FeeCategory::find($id)->delete();
        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
