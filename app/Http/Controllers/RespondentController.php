<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Question;
use DB;
use Illuminate\Support\Facades\Redirect;
class RespondentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Question::where('assesment_id', 1)->limit(108)->get();
        return view('respondent.cpp', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //initialise all cluster value
        $cluster1 = 0; $cluster2 = 0; $cluster3 = 0;
        $cluster4 = 0; $cluster5 = 0; $cluster6 = 0;

        //initialise the adt value
        $cluster1_a = 0; $cluster1_d = 0; $cluster1_t = 0;
        $cluster2_a = 0; $cluster2_d = 0; $cluster2_t = 0;
        $cluster3_a = 0; $cluster3_d = 0; $cluster3_t = 0;
        $cluster4_a = 0; $cluster4_d = 0; $cluster4_t = 0;
        $cluster5_a = 0; $cluster5_d = 0; $cluster5_t = 0;
        $cluster6_a = 0; $cluster6_d = 0; $cluster6_t = 0;

        //get respondent details
        $nm = $request->input('name');
        $email= $request->input('email');
        $cname = $request->input('cname');
        $positions = $request->input('positions');

        //check same email exists or not
        $email_check = DB::table('respondent')->select('email')->where('email',$email)->first();
        if($email_check!=null){
            return Redirect::back()->withInput(Input::all())->with('status', 'You already use this Email to  do CPP assessment');
        }else{
            //get the array from user
            $selected = Input::get('optradio');
            //check selected array is null or not if null stop next code execution
            if($selected==null){
                return Redirect::back()->withInput(Input::all())->with('status', 'You have not answered  any question');
            }


            //insert in to table respondent
            DB::table('respondent')->insert(
                ['name' => $nm, 'email' => $email,'company_name'=>$cname,'positions'=>$positions]
            );

            //after insert get the id of the user
            $assesment_query = DB::table('respondent')->select('id')->where('email',$email)->first();
            if($assesment_query!=null) {
                $id = $assesment_query->id;
            }


            //insert into different table based on user input
            foreach ($selected as $selected=> $option)
            {
                //check reverse quetion or not
                $check_reverse = DB::table('questions')->select('reverse')->where('id',$selected)->first();
                if($check_reverse->reverse==1) {
                    if($option==1){
                        $option=9;
                    }
                    else if($option==2){
                        $option=8;
                    }
                    else if($option==3){
                        $option=7;
                    }
                    else if($option==4){
                        $option=6;
                    }
                    else if($option==5){
                        $option=5;
                    }
                    else if($option==6){
                        $option=4;
                    }
                    else if($option==7){
                        $option=3;
                    }
                    else if($option==8){
                        $option=2;
                    }
                    else if($option==9){
                        $option=1;
                    }
                }

                //-------------------------------------------------
                //store dscore into database
                DB::table('q_answer')->insert(
                    ['respondent_id' => $id, 'question_id' => $selected,'rating'=>$option]
                );


                //store the value of cluster
                //------------------------------------------------
                //get the cluster of question
                $query_cluster = DB::table('questions')->select('cluster','adt')->where('id',$selected)->first();
                if($query_cluster!=null) {
                    $cluster = $query_cluster->cluster;
                    $adt = $query_cluster->adt;

                    //for cluster
                    if($cluster=='cluster1'){
                        $cluster1=$cluster1+$option;
                    }
                    if($cluster=='cluster2'){
                        $cluster2=$cluster2+$option;
                    }
                    if($cluster=='cluster3'){
                        $cluster3=$cluster3+$option;
                    }
                    if($cluster=='cluster4'){
                        $cluster4=$cluster4+$option;
                    }
                    if($cluster=='cluster5'){
                        $cluster5=$cluster5+$option;
                    }
                    if($cluster=='cluster6'){
                        $cluster6=$cluster6+$option;
                    }

                    //for adt
                    //1
                    if($adt=='cluster1_a'){
                        $cluster1_a=$cluster1_a+$option;
                    }
                    if($adt=='cluster1_d'){
                        $cluster1_d=$cluster1_d+$option;
                    }
                    if($adt=='cluster1_t'){
                        $cluster1_t=$cluster1_t+$option;
                    }
                    //2
                    if($adt=='cluster2_a'){
                        $cluster2_a=$cluster2_a+$option;
                    }
                    if($adt=='cluster2_d'){
                        $cluster2_d=$cluster2_d+$option;
                    }
                    if($adt=='cluster2_t'){
                        $cluster2_t=$cluster2_t+$option;
                    }
                    //3
                    if($adt=='cluster3_a'){
                        $cluster3_a=$cluster3_a+$option;
                    }
                    if($adt=='cluster3_d'){
                        $cluster3_d=$cluster3_d+$option;
                    }
                    if($adt=='cluster3_t'){
                        $cluster3_t=$cluster3_t+$option;
                    }
                    //4
                    if($adt=='cluster4_a'){
                        $cluster4_a=$cluster4_a+$option;
                    }
                    if($adt=='cluster4_d'){
                        $cluster4_d=$cluster4_d+$option;
                    }
                    if($adt=='cluster4_t'){
                        $cluster4_t=$cluster4_t+$option;
                    }
                    //5
                    if($adt=='cluster5_a'){
                        $cluster5_a=$cluster5_a+$option;
                    }
                    if($adt=='cluster5_d'){
                        $cluster5_d=$cluster5_d+$option;
                    }
                    if($adt=='cluster5_t'){
                        $cluster5_t=$cluster5_t+$option;
                    }
                    //6
                    if($adt=='cluster6_a'){
                        $cluster6_a=$cluster6_a+$option;
                    }
                    if($adt=='cluster6_d'){
                        $cluster6_d=$cluster6_d+$option;
                    }
                    if($adt=='cluster6_t'){
                        $cluster6_t=$cluster6_t+$option;
                    }
                }

            }//end foreach

            //insert into cpp_over all
            DB::table('cpp_mark_overall')->insert(
                [
                    'respondent_id' => $id,
                    'assesment_id' => '1',
                    'score_cluster1'=>$cluster1,
                    'score_cluster2'=>$cluster2,
                    'score_cluster3'=>$cluster3,
                    'score_cluster4'=>$cluster4,
                    'score_cluster5'=>$cluster5,
                    'score_cluster6'=>$cluster6,
                ]
            );

            //insert into adt_over all
            DB::table('cpp_mark_adt')->insert(
                [
                    'respondent_id' => $id,
                    'assesment_id' => '1',

                    'cluster1_a'=>$cluster1_a,
                    'cluster1_d'=>$cluster1_d,
                    'cluster1_t'=>$cluster1_t,

                    'cluster2_a'=>$cluster2_a,
                    'cluster2_d'=>$cluster2_d,
                    'cluster2_t'=>$cluster2_t,

                    'cluster3_a'=>$cluster3_a,
                    'cluster3_d'=>$cluster3_d,
                    'cluster3_t'=>$cluster3_t,

                    'cluster4_a'=>$cluster4_a,
                    'cluster4_d'=>$cluster4_d,
                    'cluster4_t'=>$cluster4_t,

                    'cluster5_a'=>$cluster5_a,
                    'cluster5_d'=>$cluster5_d,
                    'cluster5_t'=>$cluster5_t,

                    'cluster6_a'=>$cluster6_a,
                    'cluster6_d'=>$cluster6_d,
                    'cluster6_t'=>$cluster6_t,

                ]
            );

            //insert into sub_cluster table
            //initialise all value
            $sub1_1=0;$count1_1=0;$sub1_2=0;$count1_2=0;$sub1_3=0;$count1_3=0;//cluster 1
            $sub2_1=0;$count2_1=0;$sub2_2=0;$count2_2=0;$sub2_3=0;$count2_3=0;//cluster 2
            $sub3_1=0;$count3_1=0;$sub3_2=0;$count3_2=0;$sub3_3=0;$count3_3=0;//cluster 3
            $sub4_1=0;$count4_1=0;$sub4_2=0;$count4_2=0;$sub4_3=0;$count4_3=0;//cluster 4
            $sub5_1=0;$count5_1=0;$sub5_2=0;$count5_2=0;$sub5_3=0;$count5_3=0;//cluster 5
            $sub6_1=0;$count6_1=0;$sub6_2=0;$count6_2=0;$sub6_3=0;$count6_3=0;//cluster 6
            $sub1_1_p=0; $sub1_2_p=0; $sub1_3_p=0;
            $sub2_1_p=0; $sub2_2_p=0; $sub2_3_p=0;
            $sub3_1_p=0; $sub3_2_p=0; $sub3_3_p=0;
            $sub4_1_p=0; $sub4_2_p=0; $sub4_3_p=0;
            $sub5_1_p=0; $sub5_2_p=0; $sub5_3_p=0;
            $sub6_1_p=0; $sub6_2_p=0; $sub6_3_p=0;

            //get all question for a specific user
            $query_all_answer = DB::table('q_answer')->where('respondent_id', $id)->get();
            foreach ($query_all_answer as $qa){
                //get the sub-cluster
                $query_sub_cluster = DB::table('questions')->select('sub_cluster')->where('id',$qa->question_id)->first();
                //check the empty array or not
                if($query_sub_cluster!=null){
                    //get teh value of sub cluster
                    $sub_check = $query_sub_cluster->sub_cluster;
                    //each each value and count of each sub cluster

                    //cluster 1
                    if($sub_check=='cluster1_1'){
                        $count1_1=$count1_1+1;
                        $sub1_1=$sub1_1+$qa->rating;
                    }
                    if($sub_check=='cluster1_2'){
                        $count1_2=$count1_2+1;
                        $sub1_2=$sub1_2+$qa->rating;
                    }
                    if($sub_check=='cluster1_3'){
                        $count1_3=$count1_3+1;
                        $sub1_3=$sub1_3+$qa->rating;
                    }
                    //cluster 2
                    if($sub_check=='cluster2_1'){
                        $count2_1=$count2_1+1;
                        $sub2_1=$sub2_1+$qa->rating;
                    }
                    if($sub_check=='cluster2_2'){
                        $count2_2=$count2_2+1;
                        $sub2_2=$sub2_2+$qa->rating;
                    }
                    if($sub_check=='cluster2_3'){
                        $count2_3=$count2_3+1;
                        $sub2_3=$sub2_3+$qa->rating;
                    }

                    //cluster 3
                    if($sub_check=='cluster3_1'){
                        $count3_1=$count3_1+1;
                        $sub3_1=$sub3_1+$qa->rating;
                    }
                    if($sub_check=='cluster3_2'){
                        $count3_2=$count3_2+1;
                        $sub3_2=$sub3_2+$qa->rating;
                    }
                    if($sub_check=='cluster3_3'){
                        $count3_3=$count3_3+1;
                        $sub3_3=$sub3_3+$qa->rating;
                    }

                    //cluster 4
                    if($sub_check=='cluster4_1'){
                        $count4_1=$count4_1+1;
                        $sub4_1=$sub4_1+$qa->rating;
                    }
                    if($sub_check=='cluster4_2'){
                        $count4_2=$count4_2+1;
                        $sub4_2=$sub4_2+$qa->rating;
                    }
                    if($sub_check=='cluster4_3'){
                        $count4_3=$count4_3+1;
                        $sub4_3=$sub4_3+$qa->rating;
                    }

                    //cluster 5
                    if($sub_check=='cluster5_1'){
                        $count5_1=$count5_1+1;
                        $sub5_1=$sub5_1+$qa->rating;
                    }
                    if($sub_check=='cluster5_2'){
                        $count5_2=$count5_2+1;
                        $sub5_2=$sub5_2+$qa->rating;
                    }
                    if($sub_check=='cluster5_3'){
                        $count5_3=$count5_3+1;
                        $sub5_3=$sub5_3+$qa->rating;
                    }

                    //cluster 6
                    if($sub_check=='cluster6_1'){
                        $count6_1=$count6_1+1;
                        $sub6_1=$sub6_1+$qa->rating;
                    }
                    if($sub_check=='cluster6_2'){
                        $count6_2=$count6_2+1;
                        $sub6_2=$sub6_2+$qa->rating;
                    }
                    if($sub_check=='cluster6_3'){
                        $count6_3=$count6_3+1;
                        $sub6_3=$sub6_3+$qa->rating;
                    }

                }//array if



            }//for each finish

            //check count and avoid error divide by 0

            //cluster 1
            if($count1_1>0){
                $sub1_1_p=round(($sub1_1/($count1_1*9))*100);
            }
            if($count1_2>0){
                $sub1_2_p=round(($sub1_2/($count1_2*9))*100);
            }
            if($count1_3>0){
                $sub1_3_p=round(($sub1_3/($count1_3*9))*100);
            }

            //cluster  2
            if($count2_1>0){
                $sub2_1_p=round(($sub2_1/($count2_1*9))*100);
            }
            if($count2_2>0){
                $sub2_2_p=round(($sub2_2/($count2_2*9))*100);
            }
            if($count2_3>0){
                $sub2_3_p=round(($sub2_3/($count2_3*9))*100);
            }

            //cluster  3
            if($count3_1>0){
                $sub3_1_p=round(($sub3_1/($count3_1*9))*100);
            }
            if($count3_2>0){
                $sub3_2_p=round(($sub3_2/($count3_2*9))*100);
            }
            if($count3_3>0){
                $sub3_3_p=round(($sub3_3/($count3_3*9))*100);
            }

            //cluster  4
            if($count4_1>0){
                $sub4_1_p=round(($sub4_1/($count4_1*9))*100);
            }
            if($count4_2>0){
                $sub4_2_p=round(($sub4_2/($count4_2*9))*100);
            }
            if($count4_3>0){
                $sub4_3_p=round(($sub4_3/($count4_3*9))*100);
            }
            //cluster  5
            if($count5_1>0){
                $sub5_1_p=round(($sub5_1/($count5_1*9))*100);
            }
            if($count5_2>0){
                $sub5_2_p=round(($sub5_2/($count5_2*9))*100);
            }
            if($count5_3>0){
                $sub5_3_p=round(($sub5_3/($count5_3*9))*100);
            }

            //cluster  6
            if($count6_1>0){
                $sub6_1_p=round(($sub6_1/($count6_1*9))*100);
            }
            if($count6_2>0){
                $sub6_2_p=round(($sub6_2/($count6_2*9))*100);
            }
            if($count6_3>0){
                $sub6_3_p=round(($sub6_3/($count6_3*9))*100);
            }

            //insert into db here
            DB::table('sub_cluster')->insert(
                [
                    'respondent_id' => $id,
                    'assesment_id' => '1',

                    'cluster1_1'=>$sub1_1,
                    'cluster1_1_p'=> $sub1_1_p,
                    'cluster1_2'=>$sub1_2,
                    'cluster1_2_p'=> $sub1_2_p,
                    'cluster1_3'=>$sub1_3,
                    'cluster1_3_p'=> $sub1_3_p,

                    'cluster2_1'=>$sub2_1,
                    'cluster2_1_p'=> $sub2_1_p,
                    'cluster2_2'=>$sub2_2,
                    'cluster2_2_p'=> $sub2_2_p,
                    'cluster2_3'=>$sub2_3,
                    'cluster2_3_p'=> $sub2_3_p,

                    'cluster3_1'=>$sub3_1,
                    'cluster3_1_p'=> $sub3_1_p,
                    'cluster3_2'=>$sub3_2,
                    'cluster3_2_p'=> $sub3_2_p,
                    'cluster3_3'=>$sub3_3,
                    'cluster3_3_p'=> $sub3_3_p,

                    'cluster4_1'=>$sub4_1,
                    'cluster4_1_p'=> $sub4_1_p,
                    'cluster4_2'=>$sub4_2,
                    'cluster4_2_p'=> $sub4_2_p,
                    'cluster4_3'=>$sub4_3,
                    'cluster4_3_p'=> $sub4_3_p,

                    'cluster5_1'=>$sub5_1,
                    'cluster5_1_p'=> $sub5_1_p,
                    'cluster5_2'=>$sub5_2,
                    'cluster5_2_p'=> $sub5_2_p,
                    'cluster5_3'=>$sub5_3,
                    'cluster5_3_p'=> $sub5_3_p,

                    'cluster6_1'=>$sub6_1,
                    'cluster6_1_p'=> $sub6_1_p,
                    'cluster6_2'=>$sub6_2,
                    'cluster6_2_p'=> $sub6_2_p,
                    'cluster6_3'=>$sub6_3,
                    'cluster6_3_p'=> $sub6_3_p,



                ]
            );

            return view('respondent.thanks');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
