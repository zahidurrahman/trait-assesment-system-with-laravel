@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="/create_question"><i class="fas fa-arrow-left" style="margin-right: 10px"></i></a>Show Question


                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif

                       <div class="form-group">
                         <div class="form-group">
                             <strong>Question:</strong>
                             {{ $question->question_name }}
                         </div>
                       </div>

                       <div class="form-group">
                         <div class="form-group">
                             <strong>Cluster:</strong>
                             {{ $question->cluster }}
                         </div>
                       </div>

                        <div class="form-group">
                            <div class="form-group">
                                <strong>ADT:</strong>
                                {{ $question->adt }}
                               </div>
                         </div>

                          <div class="form-group">
                              <div class="form-group">
                                  <strong>Sub Cluster:</strong>
                                    {{ $question->sub_cluster }}
                                </div>
                          </div>
                          <div class="form-group">
                            <div class="form-group">
                                <strong>Trait Type:</strong>
                                {{ $question->trait_type }}
                               </div>
                         </div>


                            <div class="form-group">
                                <div class="form-group">
                                    <strong>Reverse Question:</strong>
                                    @if($question->reverse==0)
                                        <p>No</p>
                                    @else
                                        <span>Yes</span>
                                    @endif

                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
