<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','code','class','photo','activity'];

    public function getAllStudents()
    {
    	return Student::all();
    }

    public function getFilterResults($activities, $code, $class)
    {
    	return Student::Orwhere('code', $code)
	                    ->orWhere('class', $class)
	                    ->orWhereRaw('CONCAT(",", `activity`, ",") regexp ",('.$activities.'),"')
	                    ->get();
    }
}
