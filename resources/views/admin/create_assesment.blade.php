@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="/home"><i class="fas fa-arrow-left" style="margin-right: 10px"></i></a>Create Assesment</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('assesment') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="C.P.P" required>
                            </div>
                            <button type="submit" class="btn btn-success">ADD </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
