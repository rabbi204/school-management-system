<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    /**
     *  student Shift view list
     */
    public function studentShiftView()
    {
        $data['all_data'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }
    /***
     * add student Shift
     */
    public function addStudentShift()
    {
        return view('backend.setup.shift.add_shift');
    }
    /***
     *  store student Shift
     */
    public function storeStudentShift(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    /****
     *  edit student Shift
     */
    public function editStudentShift($id)
    {
        $edit_data = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('edit_data'));
    }
    /***
     * update student Shift
     */
    public function updateStudentShift(Request $request, $id)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = StudentShift::find($id);
        $data->name = $request->name;
        $data->update();

        $notification = array(
            'message' => 'Student Shift updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    /****
     *  delete student Shift  data
     */
    public function deleteStudentShift($id)
    {
        StudentShift::find($id)->delete();
        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
