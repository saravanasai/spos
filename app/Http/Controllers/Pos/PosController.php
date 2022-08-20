<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Employee\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PosController extends Controller
{
    public function index()
    {


        Gate::authorize('can-access-pos');


        return view('Pos.index');
    }
}
