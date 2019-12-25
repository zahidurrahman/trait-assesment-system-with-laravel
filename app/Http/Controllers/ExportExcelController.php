<?php

namespace App\Http\Controllers;

use App\Exports\ADTExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class ExportExcelController extends Controller
{
    function excel()
    {
//        $users = DB::table('cpp_mark_overall')->get();
//        $csvExporter = new \Laracsv\Export();
//        $csvExporter->build($users, ['id', 'respondent_id','assesment_id','score_cluster1','score_cluster2','score_cluster3','score_cluster4','score_cluster5','score_cluster6'])->download();

    }

    function exceladt()
    {

//        $customer_data = DB::table('users')->get()->toArray();
//        $customer_array[] = array(' Name', 'Email');
//        foreach($customer_data as $customer)
//        {
//            $customer_array[] = array(
//                'Name'  => $customer->name,
//                'Email'   => $customer->email,
//
//            );
//        }
//        Excel::store('Customer Data', function($excel) use ($customer_array){
//            $excel->setTitle('Customer Data');
//            $excel->sheet('Customer Data', function($sheet) use ($customer_array){
//                $sheet->fromArray($customer_array, null, 'A1', false, false);
//            });
//        })->download('xlsx');

    }

    public function export()
    {
        return Excel::download(new UsersExport, 'cpp_over_all.xlsx');
    }

    public function exportadt()
    {
        return Excel::download(new ADTExport(), 'adt_over_all.xlsx');
    }
}
