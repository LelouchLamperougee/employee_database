<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreRequest;
use App\Models\Company;
use App\Models\Employee;

class CreateController extends Controller
{
    public function store(StoreRequest $request){

        $data = $request->validated();
        $employees = Employee::create($data);

        return $employees;
    }
}
