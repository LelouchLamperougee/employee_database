<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;


class DestroyController extends Controller
{
    public function destroy(Company $company){
        $company->delete();
        return response([]);
    }
}
