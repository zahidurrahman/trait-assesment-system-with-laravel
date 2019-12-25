<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('respondent.menu');
});

//respondent

Route::get('/c', 'RespondentController@index')->name('cpp');
Route::post('/cc', 'RespondentController@store')->name('cc');


Auth::routes();

//user functionality
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cpp', 'HomeController@index1')->name('test');


//all admin functionality
Route::group(['middleware' => ['admin']], function () {

    //admin functionality
    Route::get('/create-assesment', function () {
        return view('admin.create_assesment');
    });
    Route::post('/create-assesment', 'AssesmentController@store')->name('assesment');

    Route::get('/create_question', 'QuestionController@index');

    Route::post('/create_question', 'QuestionController@store')->name('question');

    Route::resource('questions','QuestionController');

    Route::get('/cpp_all', 'CppController@index');
    
    Route::get('/adt_all', 'CppController@adt');
    Route::get('/all_user', 'CppController@viewUser');
    Route::get('/sub-Cluster', function () {
        return view('admin.test');
    });
    Route::get('/ajax', 'CppController@ajax');

   //another layout and view for show sub cluster
    Route::get('/sub_cluster', function () {
        return view('admin.show_subcluster');
    });

   //first method
    Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');
    Route::get('/export_excel/excel2','ExportExcelController@exceladt')->name('export_excel.excel2');

    //second and perfect method
    Route::get('/export_cpp', 'ExportExcelController@export')->name('export_cpp');
    Route::get('/export_adt', 'ExportExcelController@exportadt')->name('export_adt');


    Route::get('/test2', 'HomeController@index2')->name('test1');
});


Route::get('/cc', function () {
    return view('admin.dashboard');
});



