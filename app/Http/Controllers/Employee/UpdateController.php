<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(UpdateRequest $request, Employee $employee){
        $data = $request->validated();
        $employee->update($data);
        return $employee;
    }
}
