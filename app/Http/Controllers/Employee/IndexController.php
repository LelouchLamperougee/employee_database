<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class IndexController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->get();

        return $employees;
    }
}
