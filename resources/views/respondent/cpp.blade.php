@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card " style="border: 0;">
                    <div class="card-header" style="background-color:#a8e063;border: 0;color:#2C3E50;">
                        <b>C.P.P - Credo Personality Profile</b>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('cc') }}" method="post">
                            @csrf
                            <div id="bio">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"><b>Name</b></label>
                                    <input type="text" class="form-control" name="name" id="name" rows="3" value="{{ old('name') }}">
                                    <span id = "nm"style="display: none;color:red;">Required</span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><b>Email</b></label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ old('email') }}" >
                                    <span id = "em" style="display: none;color:red;">Required</span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><b>Company Name</b></label>
                                    <input type="text" name="cname" class="form-control" id="cname" aria-describedby="emailHelp"  value="{{ old('cname') }}">
                                    <span id = "cm"style="display: none;color:red;">Required</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><b>Position</b></label>
                                    <input type="text" name="positions" class="form-control" id="position" aria-describedby="emailHelp" value="{{ old('positions') }}">
                                    <span id ="pm" style="display: none;color:red;">Required</span>
                                </div>
                                <a  class="btn btn-success" style="border-radius: 40px;color: white;float: left" onclick="myFunction()">Continue</a>
                                <br><br>

                            </div>

                            <div id="intro" style="display: none;">
                                <h2 style="color:#a8e063;">Credo Personality Profile Questionnaire</h2><br>
                                <div>
                                    <h4>Welcome</h4>
                                    <p style="color: #52BE80  "><b>
                                        Please Complete this questionnaire on your own.<br>
                                        Take your time to reflect on each and select the score that best applies to the real you.<br>
                                        The rating scale ranges from 1 to 9, with 9 very like me and 1 not like me. Please choose accordingly.<br>
                                        This questionnaire compromises 108 questions and take about 15 minutes to complete.
                                    </b>
                                    </p>

                                </div>
                                <br><br>
                                <a  class="btn btn-success" style="color:white;float: left;border-radius: 40px;" onclick="myFunction2()">Continue</a>
                                <br><br><br>

                            </div>
                            {{------------------------------------------------------------------------}}
                            <table class="table" id="myDIV" style="display: none;margin-left: 0px;
                                    border-collapse:separate;
				                    border-spacing:0 12px;">

                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <p style="color: #52BE80  "><b>Take your time to reflect on each and select the score that best applies to the real you.The rating scale ranges from 1 to 9, with 9 very like me and 1 not like me.</b></p>
                                            </div>
                                            <div class="col-sm-2"><p style="color: #52BE80  "><b>Progress 1/6</b></p> </div>
                                            <div class="col-sm-10">
                                                <div class="progress">
                                                 <div class="progress-bar bg-success" style="width:16.66%"></div>
                                                </div><br>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                <?php
                                //get first two row
                                $check_reverse = DB::table('questions')->skip(0)->take(18)->get();
                                $i=1;?>
                                @foreach($check_reverse as $share)
                                    <tr style="background-image: linear-gradient(to right,#A9DFBF , #a8e063);border-radius: 10px;color:#2C3E50;">

                                        <td><b>{{$i}} : {{$share->question_name}}</b></td>

                                        <td>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio1<?php echo $share->id; ?>" value="1" >
                                                <label class="custom-control-label" for="inlineRadio1<?php echo $share->id; ?>"><b>1</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio2<?php echo $share->id; ?>" value="2" >
                                                <label class="custom-control-label" for="inlineRadio2<?php echo $share->id; ?>"><b>2</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio3<?php echo $share->id; ?>" value="3" >
                                                <label class="custom-control-label" for="inlineRadio3<?php echo $share->id; ?>"><b>3</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio4<?php echo $share->id; ?>" value="4" >
                                                <label class="custom-control-label" for="inlineRadio4<?php echo $share->id; ?>"><b>4</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio5<?php echo $share->id; ?>" value="5" >
                                                <label class="custom-control-label" for="inlineRadio5<?php echo $share->id; ?>"><b>5</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio6<?php echo $share->id; ?>" value="6" >
                                                <label class="custom-control-label" for="inlineRadio6<?php echo $share->id; ?>"><b>6</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio7<?php echo $share->id; ?>" value="7" >
                                                <label class="custom-control-label" for="inlineRadio7<?php echo $share->id; ?>"><b>7</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio8<?php echo $share->id; ?>" value="8" >
                                                <label class="custom-control-label" for="inlineRadio8<?php echo $share->id; ?>"><b>8</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio9<?php echo $share->id; ?>" value="9" >
                                                <label class="custom-control-label" for="inlineRadio9<?php echo $share->id; ?>"><b>9</b></label>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach
                                <tr>
                                    <td colspan="3">

                                    </td>
                                </tr>
                                </tbody>

                            </table>

                            <a  class="btn btn-success" id="next1" style="display: none;color: white;float: right; border-radius: 40px;" onclick="myFunction3()">Next</a>

                            {{-----------------------------1st table finish-------------------------------------------}}
                            <table class="table" id="myDIV2" style="display: none;margin-left: 0px;
                                    border-collapse:separate;
				                    border-spacing:0 12px;">

                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p style="color: #52BE80  "><b>Take your time to reflect on each and select the score that best applies to the real you.The rating scale ranges from 1 to 9, with 9 very like me and 1 not like me.</b></p>
                                            </div>
                                            <div class="col-sm-2"><p style="color: #52BE80  "><b>Progress 2/6</b></p> </div>
                                            <div class="col-sm-10">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width:33.32%"></div>
                                                </div><br>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                <?php
                                //get first two row
                                $check_reverse = DB::table('questions')->skip(18)->take(18)->get();
                                $i=19;?>
                                @foreach($check_reverse as $share)
                                    <tr style="background-image: linear-gradient(to right,#EAFAF1 , #58D68D);border-radius: 10px;color:#2C3E50;">

                                        <td><b>{{$i}} : {{$share->question_name}}</b></td>

                                        <td>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio1<?php echo $share->id; ?>" value="1" >
                                                <label class="custom-control-label" for="inlineRadio1<?php echo $share->id; ?>"><b>1</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio2<?php echo $share->id; ?>" value="2" >
                                                <label class="custom-control-label" for="inlineRadio2<?php echo $share->id; ?>"><b>2</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio3<?php echo $share->id; ?>" value="3" >
                                                <label class="custom-control-label" for="inlineRadio3<?php echo $share->id; ?>"><b>3</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio4<?php echo $share->id; ?>" value="4" >
                                                <label class="custom-control-label" for="inlineRadio4<?php echo $share->id; ?>"><b>4</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio5<?php echo $share->id; ?>" value="5" >
                                                <label class="custom-control-label" for="inlineRadio5<?php echo $share->id; ?>"><b>5</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio6<?php echo $share->id; ?>" value="6" >
                                                <label class="custom-control-label" for="inlineRadio6<?php echo $share->id; ?>"><b>6</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio7<?php echo $share->id; ?>" value="7" >
                                                <label class="custom-control-label" for="inlineRadio7<?php echo $share->id; ?>"><b>7</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio8<?php echo $share->id; ?>" value="8" >
                                                <label class="custom-control-label" for="inlineRadio8<?php echo $share->id; ?>"><b>8</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio9<?php echo $share->id; ?>" value="9" >
                                                <label class="custom-control-label" for="inlineRadio9<?php echo $share->id; ?>"><b>9</b></label>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach
                                <tr>
                                    <td colspan="3">

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a  class="btn btn-success" id="pre1" style="display: none;color: white;float: left;border-radius: 40px;" onclick="premyFunction2()">Previous</a>
                            <a  class="btn btn-success" id="next2" style="display: none;color: white;float: right;border-radius: 40px;" onclick="myFunction4()">Next</a>
                            {{-----------------------------2nd table finish-------------------------------------------}}
                            <table class="table" id="myDIV3" style="display: none;margin-left: 0px;
                                    border-collapse:separate;
				                    border-spacing:0 12px;">


                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p style="color: #52BE80  "><b>Take your time to reflect on each and select the score that best applies to the real you.The rating scale ranges from 1 to 9, with 9 very like me and 1 not like me.</b></p>
                                            </div>
                                            <div class="col-sm-2"><p style="color: #52BE80  "><b>Progress 3/6</b></p> </div>
                                            <div class="col-sm-10">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width:50%"></div>
                                                </div><br>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                <?php
                                //get first two row
                                $check_reverse = DB::table('questions')->skip(36)->take(18)->get();
                                $i=37;?>
                                @foreach($check_reverse as $share)
                                    <tr style="background-image: linear-gradient(to right,#F5EEF8,#C39BD3);border-radius: 10px;color:#2C3E50;">

                                        <td><b>{{$i}} : {{$share->question_name}}</b></td>

                                        <td>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio1<?php echo $share->id; ?>" value="1" >
                                                <label class="custom-control-label" for="inlineRadio1<?php echo $share->id; ?>"><b>1</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio2<?php echo $share->id; ?>" value="2" >
                                                <label class="custom-control-label" for="inlineRadio2<?php echo $share->id; ?>"><b>2</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio3<?php echo $share->id; ?>" value="3" >
                                                <label class="custom-control-label" for="inlineRadio3<?php echo $share->id; ?>"><b>3</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio4<?php echo $share->id; ?>" value="4" >
                                                <label class="custom-control-label" for="inlineRadio4<?php echo $share->id; ?>"><b>4</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio5<?php echo $share->id; ?>" value="5" >
                                                <label class="custom-control-label" for="inlineRadio5<?php echo $share->id; ?>"><b>5</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio6<?php echo $share->id; ?>" value="6" >
                                                <label class="custom-control-label" for="inlineRadio6<?php echo $share->id; ?>"><b>6</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio7<?php echo $share->id; ?>" value="7" >
                                                <label class="custom-control-label" for="inlineRadio7<?php echo $share->id; ?>"><b>7</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio8<?php echo $share->id; ?>" value="8" >
                                                <label class="custom-control-label" for="inlineRadio8<?php echo $share->id; ?>"><b>8</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio9<?php echo $share->id; ?>" value="9" >
                                                <label class="custom-control-label" for="inlineRadio9<?php echo $share->id; ?>"><b>9</b></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach
                                <tr>
                                    <td colspan="3">

                                    </td>
                                </tr>
                                </tbody>

                            </table>
                            <a  class="btn btn-success" id="pre2" style="display: none;color: white;float: left;border-radius: 40px;" onclick="premyFunction3()">Previous</a>
                            <a  class="btn btn-success" id="next3" style="display: none;color: white;float: right;border-radius: 40px;" onclick="myFunction5()">Next</a>
                            {{-----------------------------3rd table finish-------------------------------------------}}
                            <table class="table" id="myDIV4" style="display: none;margin-left: 0px;
                                    border-collapse:separate;
				                    border-spacing:0 12px;">

                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p style="color: #52BE80  "><b>Take your time to reflect on each and select the score that best applies to the real you.The rating scale ranges from 1 to 9, with 9 very like me and 1 not like me.</b></p>
                                            </div>
                                            <div class="col-sm-2"><p style="color: #52BE80  "><b>Progress 4/6</b></p> </div>
                                            <div class="col-sm-10">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width:66.66%"></div>
                                                </div><br>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                <?php
                                //get first two row
                                $check_reverse = DB::table('questions')->skip(54)->take(18)->get();
                                $i=55;?>
                                @foreach($check_reverse as $share)
                                    <tr style="background-image: linear-gradient(to right,#A9DFBF , #a8e063);border-radius: 10px;color:#2C3E50;">

                                        <td><b>{{$i}} : {{$share->question_name}}</b></td>

                                        <td>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio1<?php echo $share->id; ?>" value="1" >
                                                <label class="custom-control-label" for="inlineRadio1<?php echo $share->id; ?>"><b>1</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio2<?php echo $share->id; ?>" value="2" >
                                                <label class="custom-control-label" for="inlineRadio2<?php echo $share->id; ?>"><b>2</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio3<?php echo $share->id; ?>" value="3" >
                                                <label class="custom-control-label" for="inlineRadio3<?php echo $share->id; ?>"><b>3</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio4<?php echo $share->id; ?>" value="4" >
                                                <label class="custom-control-label" for="inlineRadio4<?php echo $share->id; ?>"><b>4</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio5<?php echo $share->id; ?>" value="5" >
                                                <label class="custom-control-label" for="inlineRadio5<?php echo $share->id; ?>"><b>5</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio6<?php echo $share->id; ?>" value="6" >
                                                <label class="custom-control-label" for="inlineRadio6<?php echo $share->id; ?>"><b>6</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio7<?php echo $share->id; ?>" value="7" >
                                                <label class="custom-control-label" for="inlineRadio7<?php echo $share->id; ?>"><b>7</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio8<?php echo $share->id; ?>" value="8" >
                                                <label class="custom-control-label" for="inlineRadio8<?php echo $share->id; ?>"><b>8</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio9<?php echo $share->id; ?>" value="9" >
                                                <label class="custom-control-label" for="inlineRadio9<?php echo $share->id; ?>"><b>9</b></label>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach
                                <tr>
                                    <td colspan="3">

                                    </td>
                                </tr>
                                </tbody>

                            </table>

                            <a  class="btn btn-success" id="pre3" style="display: none;color: white;float: left;border-radius: 40px;" onclick="premyFunction4()">Previous</a>
                            <a  class="btn btn-success" id="next4" style="display: none;color: white;float: right;border-radius: 40px;" onclick="myFunction6()">Next</a>
                            {{-----------------------------4th table finish-------------------------------------------}}
                            <table class="table" id="myDIV5" style="display: none;margin-left: 0px;
                            border-collapse:separate;
				            border-spacing:0 12px;">

                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p style="color: #52BE80  "><b>Take your time to reflect on each and select the score that best applies to the real you.The rating scale ranges from 1 to 9, with 9 very like me and 1 not like me.</b></p>
                                            </div>
                                            <div class="col-sm-2"><p style="color: #52BE80  "><b>Progress 5/6</b></p> </div>
                                            <div class="col-sm-10">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width:83.33%"></div>
                                                </div><br>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                <?php
                                //get first two row
                                $check_reverse = DB::table('questions')->skip(72)->take(18)->get();
                                $i=73;?>
                                @foreach($check_reverse as $share)
                                    <tr style="background-image: linear-gradient(to right,#EAFAF1 , #58D68D);border-radius: 10px;color:#2C3E50;">

                                        <td><b>{{$i}} : {{$share->question_name}}</b></td>

                                        <td>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio1<?php echo $share->id; ?>" value="1" >
                                                <label class="custom-control-label" for="inlineRadio1<?php echo $share->id; ?>"><b>1</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio2<?php echo $share->id; ?>" value="2" >
                                                <label class="custom-control-label" for="inlineRadio2<?php echo $share->id; ?>"><b>2</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio3<?php echo $share->id; ?>" value="3" >
                                                <label class="custom-control-label" for="inlineRadio3<?php echo $share->id; ?>"><b>3</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio4<?php echo $share->id; ?>" value="4" >
                                                <label class="custom-control-label" for="inlineRadio4<?php echo $share->id; ?>"><b>4</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio5<?php echo $share->id; ?>" value="5" >
                                                <label class="custom-control-label" for="inlineRadio5<?php echo $share->id; ?>"><b>5</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio6<?php echo $share->id; ?>" value="6" >
                                                <label class="custom-control-label" for="inlineRadio6<?php echo $share->id; ?>"><b>6</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio7<?php echo $share->id; ?>" value="7" >
                                                <label class="custom-control-label" for="inlineRadio7<?php echo $share->id; ?>"><b>7</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio8<?php echo $share->id; ?>" value="8" >
                                                <label class="custom-control-label" for="inlineRadio8<?php echo $share->id; ?>"><b>8</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio9<?php echo $share->id; ?>" value="9" >
                                                <label class="custom-control-label" for="inlineRadio9<?php echo $share->id; ?>"><b>9</b></label>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach
                                <tr>
                                    <td colspan="3">

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <a  class="btn btn-success" id="pre4" style="display: none;color: white;float: left;border-radius: 40px;" onclick="premyFunction5()">Previous</a>
                            <a  class="btn btn-success" id="next5" style="display: none;color: white;float: right;border-radius: 40px;" onclick="myFunction7()">Next</a>
                            {{-----------------------------5th table finish-------------------------------------------}}
                            <table class="table" id="myDIV6" style="display: none;margin-left: 0px;
                            border-collapse:separate;
				            border-spacing:0 12px;">

                                <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p style="color: #52BE80  "><b>Take your time to reflect on each and select the score that best applies to the real you.The rating scale ranges from 1 to 9, with 9 very like me and 1 not like me.</b></p>
                                            </div>
                                            <div class="col-sm-2"><p style="color: #52BE80  "><b>Progress 6/6</b></p> </div>
                                            <div class="col-sm-10">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width:100%"></div>
                                                </div><br>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                <?php
                                //get first two row
                                $check_reverse = DB::table('questions')->skip(90)->take(18)->get();
                                $i=91;?>
                                @foreach($check_reverse as $share)
                                    <tr style="background-image: linear-gradient(to right,#F5EEF8,#C39BD3);border-radius: 10px;color:#2C3E50;">

                                        <td><b>{{$i}} : {{$share->question_name}}</b></td>

                                        <td>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio1<?php echo $share->id; ?>" value="1" >
                                                <label class="custom-control-label" for="inlineRadio1<?php echo $share->id; ?>"><b>1</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio2<?php echo $share->id; ?>" value="2" >
                                                <label class="custom-control-label" for="inlineRadio2<?php echo $share->id; ?>"><b>2</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio3<?php echo $share->id; ?>" value="3" >
                                                <label class="custom-control-label" for="inlineRadio3<?php echo $share->id; ?>"><b>3</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio4<?php echo $share->id; ?>" value="4" >
                                                <label class="custom-control-label" for="inlineRadio4<?php echo $share->id; ?>"><b>4</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio5<?php echo $share->id; ?>" value="5" >
                                                <label class="custom-control-label" for="inlineRadio5<?php echo $share->id; ?>"><b>5</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio6<?php echo $share->id; ?>" value="6" >
                                                <label class="custom-control-label" for="inlineRadio6<?php echo $share->id; ?>"><b>6</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio7<?php echo $share->id; ?>" value="7" >
                                                <label class="custom-control-label" for="inlineRadio7<?php echo $share->id; ?>"><b>7</b></label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio8<?php echo $share->id; ?>" value="8" >
                                                <label class="custom-control-label" for="inlineRadio8<?php echo $share->id; ?>"><b>8</b></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  class="custom-control-input" type="radio"  name="optradio[<?php echo $share->id; ?>]"  id="inlineRadio9<?php echo $share->id; ?>" value="9" >
                                                <label class="custom-control-label" for="inlineRadio9<?php echo $share->id; ?>"><b>9</b></label>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach
                                <tr>
                                    <td colspan="3">

                                    </td>
                                </tr>
                                </tbody>

                            </table>
                            <a  class="btn btn-success" id="pre5" style="display: none;color: white;float: left;border-radius: 40px;" onclick="premyFunction6()">Previous</a>

                            <button type="submit" style="float: right;display: none;border-radius: 40px;" id="btnsubmit" class="btn btn-success" name="submit">Submit</button>
                            {{-----------------------------6th table finish-------------------------------------------}}
                        </form>
                    </div>
                    <div class="card-footer" style="background-color:#a8e063;border: 0;height: 1px;">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<script>
    function myFunction() {
        //check text box is empty or not
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var cname = document.getElementById("cname").value;
        var position = document.getElementById("position").value;
        var nm = document.getElementById("nm");
        var em = document.getElementById("em");
        var cm = document.getElementById("cm");
        var pm = document.getElementById("pm");
        if(name == ''){
            nm.style.display = "block";
            return false;
        }
        if(email == ''){
            em.style.display = "block";
            return false;
        }if(cname == ''){
            cm.style.display = "block";
            return false;
        }if(position == ''){
            pm.style.display = "block";
            return false;
        }
        var bio = document.getElementById("bio");
        var intro = document.getElementById("intro");
        if (intro.style.display === "none") {
            intro.style.display = "block";
            bio.style.display = "none";
        } else {
            intro.style.display = "none";
        }
    }
    function myFunction2() {
        var x = document.getElementById("myDIV");
        var intro = document.getElementById("intro");
        var y = document.getElementById("next1");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "block";
            intro.style.display = "none";

        } else {
            x.style.display = "none";
        }

    }
    function myFunction3() {
        var x = document.getElementById("myDIV2");
        var intro = document.getElementById("myDIV");
        var zz = document.getElementById("next1");
        var bb = document.getElementById("next2");
        var pre1 = document.getElementById("pre1");
        if (x.style.display === "none") {
            x.style.display = "block";
            intro.style.display = "none";
            zz.style.display = "none";
            bb.style.display = "block";
            pre1.style.display = "block";
        } else {
            x.style.display = "none";
        }
       //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    function myFunction4() {
        var x = document.getElementById("myDIV3");
        var intro = document.getElementById("myDIV2");
        var zz = document.getElementById("next2");
        var bb = document.getElementById("next3");
        var pre1 = document.getElementById("pre1");
        var pre2 = document.getElementById("pre2");
        if (x.style.display === "none") {
            x.style.display = "block";
            bb.style.display = "block";
            pre2.style.display = "block";
            intro.style.display = "none";
            zz.style.display = "none";
            pre1.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    function myFunction5() {
        var x = document.getElementById("myDIV4");
        var intro = document.getElementById("myDIV3");
        var zz = document.getElementById("next3");
        var bb = document.getElementById("next4");
        var pre2 = document.getElementById("pre2");
        var pre3 = document.getElementById("pre3");
        if (x.style.display === "none") {
            x.style.display = "block";
            pre3.style.display = "block";
            bb.style.display = "block";
            intro.style.display = "none";
            zz.style.display = "none";
            pre2.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    function myFunction6() {
        var x = document.getElementById("myDIV5");
        var intro = document.getElementById("myDIV4");
        var zz = document.getElementById("next4");
        var bb = document.getElementById("next5");
        var pre3 = document.getElementById("pre3");
        var pre4 = document.getElementById("pre4");
        if (x.style.display === "none") {
            x.style.display = "block";
            bb.style.display = "block";
            pre4.style.display = "block";
            intro.style.display = "none";
            zz.style.display = "none";
            pre3.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    function myFunction7() {
        var x = document.getElementById("myDIV6");
        var intro = document.getElementById("myDIV5");
        var zz = document.getElementById("next5");
        var btnsubmit = document.getElementById("btnsubmit");
        var pre5 = document.getElementById("pre5");
        var pre4 = document.getElementById("pre4");
        if (x.style.display === "none") {
            x.style.display = "block";
            btnsubmit.style.display = "block";
            pre5.style.display = "block";
            pre4.style.display = "none";
            intro.style.display = "none";
            zz.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    //-----------------------------------------
    function premyFunction2() {
        var x = document.getElementById("myDIV");
        var intro = document.getElementById("myDIV2");
        var pre1 = document.getElementById("pre1");
        var next1 = document.getElementById("next1");
        var next2 = document.getElementById("next2");
        if (x.style.display === "none") {
            x.style.display = "block";
            next1.style.display = "block";
            next2.style.display = "none";
            pre1.style.display = "none";
            intro.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    function premyFunction3() {
        var x = document.getElementById("myDIV2");
        var intro = document.getElementById("myDIV3");
        var pre2 = document.getElementById("pre2");
        var pre1 = document.getElementById("pre1");
        var next1 = document.getElementById("next2");
        var next2 = document.getElementById("next3");
        if (x.style.display === "none") {
            x.style.display = "block";
            next1.style.display = "block";
            pre1.style.display = "block";
            next2.style.display = "none";
            pre2.style.display = "none";
            intro.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    function premyFunction4() {
        var x = document.getElementById("myDIV3");
        var intro = document.getElementById("myDIV4");
        var pre2 = document.getElementById("pre3");
        var pre1 = document.getElementById("pre2");
        var next1 = document.getElementById("next3");
        var next2 = document.getElementById("next4");
        if (x.style.display === "none") {
            x.style.display = "block";
            next1.style.display = "block";
            pre1.style.display = "block";
            next2.style.display = "none";
            pre2.style.display = "none";
            intro.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    function premyFunction5() {
        var x = document.getElementById("myDIV4");
        var intro = document.getElementById("myDIV5");
        var pre2 = document.getElementById("pre4");
        var pre1 = document.getElementById("pre3");
        var next1 = document.getElementById("next4");
        var next2 = document.getElementById("next5");
        if (x.style.display === "none") {
            x.style.display = "block";
            next1.style.display = "block";
            pre1.style.display = "block";
            next2.style.display = "none";
            pre2.style.display = "none";
            intro.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
    function premyFunction6() {
        var x = document.getElementById("myDIV5");
        var intro = document.getElementById("myDIV6");
        var pre2 = document.getElementById("pre5");
        var pre1 = document.getElementById("pre4");
        var next1 = document.getElementById("next5");
        var next2 = document.getElementById("btnsubmit");
        if (x.style.display === "none") {
            x.style.display = "block";
            next1.style.display = "block";
            pre1.style.display = "block";
            next2.style.display = "none";
            pre2.style.display = "none";
            intro.style.display = "none";
        } else {
            x.style.display = "none";
        }
        //scroll to op after finish one step
        window.scrollTo(0, 0);
    }
</script>