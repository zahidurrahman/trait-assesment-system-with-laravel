@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/home" class="btn btn-primary"><i class="fas fa-arrow-left" style="margin-right: 10px"></i>Dashboard</a>


                    </div>

                    <div class="card-body">
                        <a href="{{ route('export_cpp') }}" class="btn btn-success" style="float:right;margin-bottom: 10px">Export to Excel</a>

                        <div class="table-responsive" id="employee_table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Respondent ID</th>
                                <th scope="col">Brown</th>
                                <th scope="col">Yellow</th>
                                <th scope="col">Red</th>
                                <th scope="col">Pink</th>
                                <th scope="col">Green</th>
                                <th scope="col">Blue</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($cpp_all as $share)
                                <tr>
                                    <td>{{$share->owner->name}}</td>
                                    <td>{{$share->score_cluster1}}</td>
                                    <td>{{$share->score_cluster2}}</td>
                                    <td>{{$share->score_cluster3}}</td>
                                    <td>{{$share->score_cluster4}}</td>
                                    <td>{{$share->score_cluster5}}</td>
                                    <td>{{$share->score_cluster6}}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        </div>
                        {{ $cpp_all->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
