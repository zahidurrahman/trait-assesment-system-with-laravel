@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 0;">
                <div class="card-header" style="background-color:#a8e063;border: 0;color:#2C3E50;">
                    Dashboard
                    {{--<span style="float: right"><a href="/create-assesment">Add new Assesment</a></span>--}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <br>
                        <div class="row">
                            <div class="col">
                                <a href="/create_question" style="text-decoration: none">
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

                                        <div class="card-body">
                                            <center>
                                                <h2 class="card-title">
                                                    <img src="https://image.flaticon.com/icons/svg/427/427735.svg" style="width:50px;height:50px;">
                                                </h2>
                                                <p>Manage Question</p>
                                            </center>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="/sub-Cluster" style="text-decoration: none;">
                                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                        <div class="card-body">
                                            <center>
                                                <h2 class="card-title">
                                                    <img src="https://image.flaticon.com/icons/svg/327/327013.svg" style="width:50px;height:50px;">
                                                </h2>
                                                <p>View SubCluster</p>
                                            </center>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="/cpp_all" style="text-decoration: none">
                                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">

                                        <div class="card-body">
                                            <center>
                                                <h2 class="card-title">
                                                    <img src="https://image.flaticon.com/icons/svg/272/272378.svg" style="width:50px;height:50px;">
                                                </h2>
                                                <p>CPP Mark</p>
                                            </center>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="/adt_all"  style="text-decoration: none;">
                                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                        <div class="card-body">
                                            <center>
                                                <h2 class="card-title">
                                                    <img src="https://image.flaticon.com/icons/svg/684/684930.svg" style="width:50px;height:50px;">
                                                </h2>
                                                <p>ADT Mark</p>
                                            </center>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                </div>
                <div class="card-footer" style="background-color:#a8e063;border: 0;height: 1px;">

                </div>
            </div>
        </div>

</div>
@endsection
