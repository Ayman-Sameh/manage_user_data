<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use App\Exports\UserDataExport;
use App\Imports\UserDataImport;
use Maatwebsite\Excel\Facades\Excel;

class UserDataController extends Controller
{
    public function index()
    {
        $data = UserData::all();

        return view('user-data.index' , compact('data'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import' => 'required|mimes:csv,xlsx|max:5120'
        ]);

        Excel::import(new UserDataImport, $request->file('import'));

        return back()->with('success' , 'Data imported Successfully');
    }

    public function export()
    {
        return Excel::download(new UserDataExport, 'user.xlsx');
    }
}
