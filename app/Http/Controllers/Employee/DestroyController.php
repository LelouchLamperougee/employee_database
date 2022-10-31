<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response([]);
    }
}
