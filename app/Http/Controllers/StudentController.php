<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Student;
use Session;
use File;

class StudentController extends Controller
{
    public function index()
    {
        $student = new Student;
        $studentList = $student->getAllStudents();
        $standards = $studentList->unique('class');
        $studentCodes = $studentList->unique('code');
        return view('student.view',compact('studentList','standards','studentCodes'));
    }

    public function create()
    {
        return view('student.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'code' => 'required|unique:students',
            'photo' => 'required|max:1000|mimes:jpg,png,jpeg',
            'activity' => 'required'
        ]);
        $student = new Student;
        $student->name = $request->name;
        $student->class = $request->class;
        $student->code = $request->code;
        $student->activity = implode(',', $request->activity);
        if ($request->file('photo')){
            $photo = $request->file('photo');
            $photoName = uniqid().$photo->getClientOriginalName();
            $photo->move('photo',$photoName);
            $student->photo = 'photo/'.$photoName;
        }
        if($student->save()) {
            Session::flash('success','Student registered');
        } else {
            Session::flash('failure','Something went wrong');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $response = $this->getActiviesFromLeza();
        $activities = json_decode($response, TRUE);
        $student = Student::findorfail($id);
        $studentActivties = explode(',', $student->activity);
        return view('student.edit', compact('student','activities','studentActivties'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'code' => 'required|unique:students,code,'.$id,
            'photo' => 'max:1000|mimes:jpg,png,jpeg',
            'activity' => 'required'
        ]);
        $student = Student::findorfail($id);
        $student->name = $request->name;
        $student->class = $request->class;
        $student->code = $request->code;
        $student->activity = implode(',', $request->activity);
        if ($request->file('photo')){
            if((!empty($student->photo)) && File::exists($student->photo)) {
                File::delete($student->photo);
            }
            $photo = $request->file('photo');
            $photoName = uniqid().$photo->getClientOriginalName();
            $photo->move('photo',$photoName);
            $student->photo = 'photo/'.$photoName;
        }
        if($student->update()) {
            Session::flash('success','Student updated successfully');
        } else {
            Session::flash('failure','Something went wrong');
        }
        return redirect()->back();
    }

    public function getActiviesFromLeza()
    {
        return Curl::to('http://websites.lezasolutions.com/activities.json')->get();
    }

    public function getActivities()
    {
        $response = $this->getActiviesFromLeza();
        return response()->json($response);
    }

    public function getStudentsByFilter(Request $request)
    {
        $student = new Student;
        $studentDetails = $student->getAllStudents();
        $standards = $studentDetails->unique('class');
        $studentCodes = $studentDetails->unique('code');
        $activities = $request->activity?implode('|', $request->activity):'';
        $studentList = $student->getFilterResults($activities, $request->code, $request->class);
        return view('student.view',compact('studentList','standards','studentCodes'));
    }
}
