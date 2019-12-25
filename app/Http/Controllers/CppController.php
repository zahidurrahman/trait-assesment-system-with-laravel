<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CPP_Mark_Overall;
use App\CPP_Mark_Adt;
use APP\Respondent;
use DB;
use phpDocumentor\Reflection\Types\Null_;

class CppController extends Controller
{
    public function index(){
        $cpp_all = CPP_Mark_Overall::paginate(10);
        return view('admin.cpp_overall', compact('cpp_all'));
    }

    public function adt(){
        $cpp_all = CPP_Mark_Adt::paginate(10);
        return view('admin.adt_overall', compact('cpp_all'));
    }

    public function viewUser(){
        $shares = DB::table('respondent')->paginate(20);
        return view('admin.list_user', compact('shares'));
    }

    public function show_sub()
    {
       //initialise all value
        $sub1_1=0;$count1_1=0;$sub1_2=0;$count1_2=0;$sub1_3=0;$count1_3=0;//cluster 1
        $sub2_1=0;$count2_1=0;$sub2_2=0;$count2_2=0;$sub2_3=0;$count2_3=0;//cluster 2
        $sub3_1=0;$count3_1=0;$sub3_2=0;$count3_2=0;$sub3_3=0;$count3_3=0;//cluster 3
        $sub4_1=0;$count4_1=0;$sub4_2=0;$count4_2=0;$sub4_3=0;$count4_3=0;//cluster 4
        $sub5_1=0;$count5_1=0;$sub5_2=0;$count5_2=0;$sub5_3=0;$count5_3=0;//cluster 5
        $sub6_1=0;$count6_1=0;$sub6_2=0;$count6_2=0;$sub6_3=0;$count6_3=0;//cluster 6

       //get all question for a specific user
        $query_all_answer = DB::table('q_answer')->where('respondent_id',2)->get();
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

        //display data with calculation
       if($count1_1>0){
           echo $sub1_1.'&nbsp;&nbsp;';
           echo round(($sub1_1/($count1_1*6))*100);
           echo '<br>';
       }
        if($count1_2>0){
            echo $sub1_2.'&nbsp;&nbsp;';
            echo round(($sub1_2/($count1_2*6))*100);
            echo '<br>';
        }
        if($count1_3>0){
            echo $sub1_3.'&nbsp;&nbsp;';
            echo round(($sub1_3/($count1_3*6))*100);
            echo '<br>';
        }




    }


    //test
    public function ajax(Request $request)
    {
        $id=$request->post_id;
        $output = '';
        $if_previous_disable = '';
        $if_next_disable = '';
//        $prev_id= $id;
//        $next_id= $id;

       //get the name of respondent from the id
        $respondent_get= DB::table('respondent')->where('id',$id)->first();
        if($respondent_get!=null){
            $res_name=$respondent_get->name;
            $res_email=$respondent_get->email;
        }
        $get_sub_main = DB::table('sub_cluster')->where('respondent_id',$id)->first();
        if($get_sub_main!=null){
            $output .= '
               <table class="table">
                   <thead>
                      <tr><td colspan="3"><b>Name : </b>'.$res_name.'&nbsp;&nbsp;<b>Email : </b>'.$res_email.'</td></tr>
                       <tr>
                          <th scope="col">Sub-Cluster</th>
                          <th scope="col"> Value</th>
                          <th scope="col">Percentage</th>
                        </tr>
                   </thead>
                    <tbody>
                       
                        <tr>
                           <td>Exuberance</td>
                           <td>'.$get_sub_main->cluster1_1.'</td>
                            <td>'.$get_sub_main->cluster1_1_p.'%</td>
                        </tr>
                         <tr>
                           <td>Intellectual</td>
                           <td>'.$get_sub_main->cluster1_2.'</td>
                            <td>'.$get_sub_main->cluster1_2_p.'%</td>
                        </tr>
                        <tr>
                           <td>Refresher</td>
                           <td>'.$get_sub_main->cluster1_3.'</td>
                            <td>'.$get_sub_main->cluster1_3_p.'%</td>
                        </tr>
                        
                         <tr>
                           <td>Fantasy</td>
                           <td>'.$get_sub_main->cluster2_1.'</td>
                            <td>'.$get_sub_main->cluster2_1_p.'%</td>
                        </tr>
                         <tr>
                           <td>Risk-Seeking</td>
                           <td>'.$get_sub_main->cluster2_2.'</td>
                            <td>'.$get_sub_main->cluster2_2_p.'%</td>
                        </tr>
                        <tr>
                           <td>Futuristic</td>
                           <td>'.$get_sub_main->cluster2_3.'</td>
                            <td>'.$get_sub_main->cluster2_3_p.'%</td>
                        </tr>
                        
                         <tr>
                           <td>Kinesthetic</td>
                           <td>'.$get_sub_main->cluster3_1.'</td>
                            <td>'.$get_sub_main->cluster3_1_p.'%</td>
                        </tr>
                         <tr>
                           <td>Emotions and Feelings Oriented</td>
                           <td>'.$get_sub_main->cluster3_2.'</td>
                            <td>'.$get_sub_main->cluster3_2_p.'%</td>
                        </tr>
                        <tr>
                           <td>Sociability</td>
                           <td>'.$get_sub_main->cluster3_3.'</td>
                            <td>'.$get_sub_main->cluster3_3_p.'%</td>
                        </tr>
                        
                        <tr>
                           <td>Code of Conduct</td>
                           <td>'.$get_sub_main->cluster4_1.'</td>
                            <td>'.$get_sub_main->cluster4_1_p.'%</td>
                        </tr>
                         <tr>
                           <td>Cooperativeness</td>
                           <td>'.$get_sub_main->cluster4_2.'</td>
                            <td>'.$get_sub_main->cluster4_2_p.'%</td>
                        </tr>
                        <tr>
                           <td>Selflessness</td>
                           <td>'.$get_sub_main->cluster4_3.'</td>
                            <td>'.$get_sub_main->cluster4_3_p.'%</td>
                        </tr>
                        
                         
                        <tr>
                           <td>Form</td>
                           <td>'.$get_sub_main->cluster5_1.'</td>
                            <td>'.$get_sub_main->cluster5_1_p.'%</td>
                        </tr>
                         <tr>
                           <td>Structural Thinking</td>
                           <td>'.$get_sub_main->cluster5_2.'</td>
                            <td>'.$get_sub_main->cluster5_2_p.'%</td>
                        </tr>
                        <tr>
                           <td>Preparedness</td>
                           <td>'.$get_sub_main->cluster5_3.'</td>
                            <td>'.$get_sub_main->cluster5_3_p.'%</td>
                        </tr>
                        
                         <tr>
                           <td>Task Oriented</td>
                           <td>'.$get_sub_main->cluster6_1.'</td>
                            <td>'.$get_sub_main->cluster6_1_p.'%</td>
                        </tr>
                         <tr>
                           <td>Thinking Orientation</td>
                           <td>'.$get_sub_main->cluster6_2.'</td>
                            <td>'.$get_sub_main->cluster6_2_p.'%</td>
                        </tr>
                        <tr>
                           <td>Authority & Power</td>
                           <td>'.$get_sub_main->cluster6_3.'</td>
                            <td>'.$get_sub_main->cluster6_3_p.'%</td>
                        </tr>
                        
                    </tbody>
                </table>
             
              ';
            $query_pev =DB::table('sub_cluster')
                ->where('respondent_id','<',$id)
                ->orderBy('id', 'DESC')
                ->limit(1)
                ->first();
            $query_next =DB::table('sub_cluster')
                ->where('respondent_id','>',$id)
                ->orderBy('id', 'ASC')
                ->limit(1)
                ->first();
            //check for previous button is null or not. if null assign running if
            if($query_pev!=null){
                $prev_id=$query_pev->respondent_id;
            }else{
                $prev_id=$id;
                $if_previous_disable = 'disabled';
            }
            //check for next button is null or not. if null assign running if

            if($query_next!=null){
                $next_id=$query_next->respondent_id;
            }else{
                $next_id=$id;
                $if_next_disable = 'disabled';
            }
            $output .= '
              <br /><br />
              <div align="center">
               <button type="button" name="previous" class="btn btn-warning btn-sm previous" id="'.$prev_id.'" '.$if_previous_disable.'><i class="fas fa-arrow-left" style="margin-right: 10px"></i>Previous</button>
               <button type="button" name="next" class="btn btn-success btn-sm next" id="'.$next_id.'" '.$if_next_disable.'>Next<i class="fas fa-arrow-right" style="margin-left: 10px"></i></button>
              </div>
              <br /><br />
              ';
        }
        echo $output;

    }
}
