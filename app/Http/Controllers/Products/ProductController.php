<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Employee\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {

        if (!auth('web')->user()) {
            if (auth('employee')->user()->role_id != Employee::MANAGER) {
                abort(403);
            }
        }

        return view('Products.productManagement');
    }
}
