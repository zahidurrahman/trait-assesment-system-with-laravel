<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\CPP_Mark_Overall;
use DB;

class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
//    public function collection()
//    {
//        return User::all();
//    }

//    public function export()
//    {
//       // return Excel::download(new UsersExport, 'users.xlsx');
//    }

    public function view():view{
        return view('admin.export.cpp',[
            'users'=> CPP_Mark_Overall::all()
                //DB::table('cpp_mark_overall')->get()
        ]);
    }
    //User::all()
}
