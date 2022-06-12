<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     *  student Group view list
     */
    public function studentGroupView()
    {
        $data['all_data'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group', $data);
    }
    /***
     * add Group year
     */
    public function addStudentGroup()
    {
        return view('backend.setup.student_group.add_group');
    }
    /***
     *  store Group year
     */
    public function storeStudentGroup(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    /****
     *  edit Group year
     */
    public function editStudentGroup($id)
    {
        $edit_data = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_student_group', compact('edit_data'));
    }
    /***
     * update Group year
     */
    public function updateStudentGroup(Request $request, $id)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = StudentGroup::find($id);
        $data->name = $request->name;
        $data->update();

        $notification = array(
            'message' => 'Student Group updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    /****
     *  delete Group year data
     */
    public function deleteStudentGroup($id)
    {
        StudentGroup::find($id)->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
