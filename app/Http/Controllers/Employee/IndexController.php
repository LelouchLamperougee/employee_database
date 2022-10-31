<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return $employees;
    }
}
