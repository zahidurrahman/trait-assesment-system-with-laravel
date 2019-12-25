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
                        <a href="{{ route('export_adt') }}" class="btn btn-success" style="float:right;margin-bottom: 10px">Export to Excel</a>
                        <div class="table-responsive">
                        <table class="table" >
                            <thead>
                            <tr>
                                <th scope="col">Respondent ID</th>
                                <th scope="col">Brown - A</th>
                                <th scope="col">Brown - D</th>
                                <th scope="col">Brown - T</th>

                                <th scope="col">Yellow - A</th>
                                <th scope="col">Yellow - D</th>
                                <th scope="col">Yellow - T</th>

                                <th scope="col">Red - A</th>
                                <th scope="col">Red - D</th>
                                <th scope="col">Red - T</th>

                                <th scope="col">Pink - A</th>
                                <th scope="col">Pink - D</th>
                                <th scope="col">Pink - T</th>

                                <th scope="col">Green - A</th>
                                <th scope="col">Green - D</th>
                                <th scope="col">Green - T</th>

                                <th scope="col">Blue - A</th>
                                <th scope="col">Blue - D</th>
                                <th scope="col">Blue - T</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cpp_all as $share)
                                <tr>
                                    <td>{{$share->owner->name}}</td>

                                    <td>{{$share->cluster1_a}}</td>
                                    <td>{{$share->cluster1_d}}</td>
                                    <td>{{$share->cluster1_t}}</td>

                                    <td>{{$share->cluster2_a}}</td>
                                    <td>{{$share->cluster2_d}}</td>
                                    <td>{{$share->cluster2_t}}</td>

                                    <td>{{$share->cluster3_a}}</td>
                                    <td>{{$share->cluster3_d}}</td>
                                    <td>{{$share->cluster3_t}}</td>

                                    <td>{{$share->cluster4_a}}</td>
                                    <td>{{$share->cluster4_d}}</td>
                                    <td>{{$share->cluster4_t}}</td>

                                    <td>{{$share->cluster5_a}}</td>
                                    <td>{{$share->cluster5_d}}</td>
                                    <td>{{$share->cluster5_t}}</td>

                                    <td>{{$share->cluster6_a}}</td>
                                    <td>{{$share->cluster6_d}}</td>
                                    <td>{{$share->cluster6_t}}</td>



                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $cpp_all->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
