<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{

    public function changePasswordIndex()
    {
        if (!Gate::allows('can-access', auth('web')->user())) {
            abort(403);
        }
        return view('Setting.changePassword');
    }


    public function employeeManagementIndex()
    {
        if (!Gate::allows('can-access', auth('web')->user())) {
            abort(403);
        }


        return view('Setting.employeeManagement');
    }

    public function branchManagementIndex()
    {

        if (!Gate::allows('can-access', auth('web')->user())) {
            abort(403);
        }


        return view('Setting.branchManagment');
    }
}
