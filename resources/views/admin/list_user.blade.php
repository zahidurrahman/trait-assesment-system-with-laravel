@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border: 0;">
                    <div class="card-header" style="background-color:#a8e063;border: 0;color:#2C3E50;">
                        <a href="/home" class="btn btn-primary"><i class="fas fa-arrow-left" style="margin-right: 10px"></i>Dashboard</a>


                    </div>

                    <div class="card-body">


                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <!-- Button trigger modal -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;
                            ?>
                            @foreach($shares as $share)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$share->name}}</td>
                                    <td>{{$share->email}}</td>

                                    <td>
                                        <a class="btn btn-outline-success btn-sm" href="/sub_cluster?id={{$share->id}}">View Sub-Cluster</a>
                                    </td>
                                </tr>
                                <?php $i++;?>
                            @endforeach


                            </tbody>

                        </table>
                        {{ $shares->links() }}
                    </div>
                    <div class="card-footer" style="background-color:#a8e063;border: 0;height: 1px;">

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
