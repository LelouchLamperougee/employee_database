<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function store(StoreRequest $request){
        $data = $request->validated();
        $companies = Company::create($data);
        return $companies;
    }
}
