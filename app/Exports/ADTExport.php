<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\CPP_Mark_Overall;
use App\CPP_Mark_Adt;
use DB;

class ADTExport implements FromView
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
        return view('admin.export.adt',[
            'adt'=> CPP_Mark_Adt::all()

        ]);
    }

}
