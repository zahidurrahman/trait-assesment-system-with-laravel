@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border: 0;">
                    <div class="card-header" style="background-color:#a8e063;border: 0;color:#2C3E50;">
                        <a href="/all_user" class="btn btn-primary"><i class="fas fa-arrow-left" style="margin-right: 10px"></i>Back</a>
                    </div>

                    <div class="card-body">
                        <?php
                                $id = $_GET['id'];
                            $get_sub = DB::table('sub_cluster')->where('respondent_id', $id)->get();

                            ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Sub-Cluster</th>
                                <th scope="col"> Value</th>
                                <th scope="col">Percentage</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($get_sub as $sc)
                                @if($sc->cluster1_1>0)
                                <tr>
                                    <td>Exuberance</td>
                                    <td>{{$sc->cluster1_1}}</td>
                                    <td>{{$sc->cluster1_1_p}}%</td>
                                </tr>
                                @endif
                                @if($sc->cluster1_2>0)
                                <tr>
                                    <td>Intellectual</td>
                                    <td>{{$sc->cluster1_2}}</td>
                                    <td>{{$sc->cluster1_2_p}}%</td>
                                </tr>
                                @endif
                                @if($sc->cluster1_3>0)
                                <tr>
                                    <td>Refresher</td>
                                    <td>{{$sc->cluster1_3}}</td>
                                    <td>{{$sc->cluster1_3_p}}%</td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer" style="background-color:#a8e063;border: 0;height: 1px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
