<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    /**
     *  student year view list
     */
    public function studentYearView()
    {
        $data['all_data'] = StudentYear::all();
        return view('backend.setup.student_year.view_year', $data);
    }
    /***
     * add student year
     */
    public function addStudentYear()
    {
        return view('backend.setup.student_year.add_year');
    }
    /***
     *  store student year
     */
    public function storeStudentYear(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    /****
     *  edit student year
     */
    public function editStudentYear($id)
    {
        $edit_data = StudentYear::find($id);
        return view('backend.setup.student_year.edit_student_year', compact('edit_data'));
    }
    /***
     * update student year
     */
    public function updateStudentYear(Request $request, $id)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = StudentYear::find($id);
        $data->name = $request->name;
        $data->update();

        $notification = array(
            'message' => 'Student Year updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    /****
     *  delete student year data
     */
    public function deleteStudentYear($id)
    {
        StudentYear::find($id)->delete();
        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

}
