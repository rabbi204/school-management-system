<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /***
     *  student class view page
     */
    public function viewStudentClass()
    {
        $data['all_data'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }
    /***
     * student class add
     */
    public function addStudentClass()
    {
        return view('backend.setup.student_class.add_class');
    }
    /**
     *  store student class
     */
    public function storeStudentClass(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    /***
     *  Edit Student Class
     */
    public function editStudentClass($id)
    {
        $edit_data = StudentClass::find($id);
        return view('backend.setup.student_class.edit_student_class', compact('edit_data'));
    }
    /***
     *  update student class
     */
    public function updateStudentClass(Request $request, $id)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = StudentClass::find($id);
        $data->name = $request->name;
        $data->update();

        $notification = array(
            'message' => 'Student Class updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    /*****
     *  delete student class
     */
    public function deleteStudentClass($id)
    {
        StudentClass::find($id)->delete();
        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

}
