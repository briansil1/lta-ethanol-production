<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function home(Request $request) {
        return view('admin.home');
    }

    public function getUsersReport(Request $request) {
        $request->validate([
            'password' => [
                'required',
                Rule::in([env('ADMIN_PASS')])
            ]
        ]);

        return Excel::download(new UsersExport, 'users_report.xlsx');
    }
}
