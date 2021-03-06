<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Para;


class StudentScheduleController extends Controller
{
    public function index() {
        $user = auth()->user();
        $groupId = Student::where('id',$user->student_id)->first()->group_id;
        $schedules=Schedule::where('group_id',$groupId)
        ->with('weekDay', 'para', 'subject', 'group', 'room', 'teacher')->get();
        return view('university.studentSchedule.index',['schedules' => $schedules]);
    }
}
