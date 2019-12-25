@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="/home" class="btn btn-primary"><i class="fas fa-arrow-left" style="margin-right: 10px"></i>Dashboard</a>


                    </div>

                    <div class="card-body">


                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- Button trigger modal -->
                            <button type="button" style="margin-bottom: 10px" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                               Add New Question
                            </button>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($shares as $share)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$share->question_name}}</td>

                                        <td>
                                            <form action="{{ route('questions.destroy',$share->id) }}" method="POST">

                                                <a class="btn btn-outline-success btn-sm" href="{{ route('questions.show',$share->id) }}">Show</a>

                                                <a class="btn btn-outline-info btn-sm" href="{{ route('questions.edit',$share->id) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach


                                </tbody>

                            </table>
                            {{ $shares->links() }}
                    </div>



                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('question') }}">
                                        @csrf
                                       
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Question</label>
                                            <textarea class="form-control" name="question_name" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Assessment type</label>
                                            <select class="form-control"name="assesment_id" required>
                                                <option disabled selected value="">--Select--</option>
                                                <option value='1'>CPP</option>
                                                <option value='2'>CEIQ</option>
                                                <option value='3'>CETA</option>
                                                <option value='4'>ICPA</option>
                                                <option value='5'>IAE</option>
                                                <option value='6'>APA</option>
                                                <option value='7'>HOTS</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Cluster</label>
                                            <select class="form-control"name="cluster" id="first" required>
                                                <option disabled selected value="">--Select--</option>
                                                <option value='cluster1'>Brown</option>
                                                <option value='cluster2'>Yellow</option>
                                                <option value='cluster3'>Red</option>
                                                <option value='cluster4'>Pink</option>
                                                <option value='cluster5'>Green</option>
                                                <option value='cluster6'>Blue</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">ADT</label>
                                            <select class="form-control" name="adt" required id="second">
                                                <option disabled selected value="">--Select--</option>

                                                <option value="cluster1_a">Brown - A</option>
                                                <option value="cluster1_d">Brown - D</option>
                                                <option value="cluster1_t">Brown - T</option>

                                                <option value="cluster2_a">Yellow - A</option>
                                                <option value="cluster2_d">Yellow - D</option>
                                                <option value="cluster2_t">Yellow - T</option>

                                                <option value="cluster3_a">Red - A</option>
                                                <option value="cluster3_d">Red - D</option>
                                                <option value="cluster3_t">Red - T</option>

                                                <option value="cluster4_a">Pink - A</option>
                                                <option value="cluster4_d">Pink - D</option>
                                                <option value="cluster4_t">Pink - T</option>

                                                <option value="cluster5_a">Green - A</option>
                                                <option value="cluster5_d">Green - D</option>
                                                <option value="cluster5_t">Green - T</option>

                                                <option value="cluster6_a">Blue - A</option>
                                                <option value="cluster6_d">Blue - D</option>
                                                <option value="cluster6_t">Blue - T</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Sub Cluster</label>
                                            <select class="form-control" name="sub_cluster" required id="third">
                                                <option disabled selected value="">--Select--</option>

                                                <option value="cluster1_1">Brown - Exuberance</option>
                                                <option value="cluster1_2">Brown - Intellectual</option>
                                                <option value="cluster1_3">Brown - Flexibility</option>

                                                <option value="cluster2_1">Yellow - Fantasy</option>
                                                <option value="cluster2_2">Yellow - Risk-Seeking</option>
                                                <option value="cluster2_3">Yellow - Futuristic</option>

                                                <option value="cluster3_1">Red - Kinesthetic</option>
                                                <option value="cluster3_2">Red - Emotions and Feelings Oriented</option>
                                                <option value="cluster3_3">Red - Sociability</option>

                                                <option value="cluster4_1">Pink - Code of Conduct</option>
                                                <option value="cluster4_2">Pink - Cooperativeness</option>
                                                <option value="cluster4_3">Pink - Selflessness</option>

                                                <option value="cluster5_1">Green - Form</option>
                                                <option value="cluster5_2">Green - Structural Thinking</option>
                                                <option value="cluster5_3">Green - Preparedness</option>

                                                <option value="cluster6_1">Blue - Task Oriented</option>
                                                <option value="cluster6_2">Blue - Thinking Orientation</option>
                                                <option value="cluster6_3">Blue - Authority & Power</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Trait</label>
                                            <input type="text" name="trait_type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stable/Balanced" required>
                                        </div>

                                        <div class="form-group" style="margin-left: 20px">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="reverse" class="form-check-input" value="1">Reverse Question
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-success">CREATE</button>
                                    </form>

                                </div>

                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#first').on('change', function () {
                console.log($('#first').val());
                $('#second').html('');
                $('#third').html('');
                if ($('#first').val() == 'cluster1') {

                    $('#second').append('<option value="cluster1_a">Brown - A</option>');
                    $('#second').append('<option value="cluster1_d">Brown - D</option>');
                    $('#second').append('<option value="cluster1_t">Brown - T</option>');

                    $('#third').append('<option value="cluster1_1">Brown - Exuberance</option>');
                    $('#third').append('<option value="cluster1_2">Brown - Intellectual</option>');
                    $('#third').append('<option value="cluster1_3">Brown - Flexibility</option>');

                }
                else if ($('#first').val() == 'cluster2') {

                    $('#second').append('<option value="cluster2_a">Yellow - A</option>');
                    $('#second').append('<option value="cluster2_d">Yellow - D</option>');
                    $('#second').append('<option value="cluster2_t">Yellow - T</option>');

                    $('#third').append('<option value="cluster2_1">Yellow - Fantasy</option>');
                    $('#third').append('<option value="cluster2_2">Yellow - Risk-Seeking</option>');
                    $('#third').append('<option value="cluster2_3">Yellow - Futuristic</option>');



                }
                else if ($('#first').val() == 'cluster3') {

                    $('#second').append('<option value="cluster3_a">Red - A</option>');
                    $('#second').append('<option value="cluster3_d">Red - D</option>');
                    $('#second').append('<option value="cluster3_t">Red - T</option>');

                    $('#third').append('<option value="cluster3_1">Red - Kinesthetic</option>');
                    $('#third').append('<option value="cluster3_2">Red - Emotions and Feelings Oriented</option>');
                    $('#third').append('<option value="cluster3_3">Red - Sociability</option>');


                }
                else if ($('#first').val() == 'cluster4') {

                    $('#second').append('<option value="cluster4_a">Pink - A</option>');
                    $('#second').append('<option value="cluster4_d">Pink - D</option>');
                    $('#second').append('<option value="cluster4_t">Pink - T</option>');

                    $('#third').append('<option value="cluster4_1">Pink - Code of Conduct</option>');
                    $('#third').append('<option value="cluster4_2">Pink - Cooperativeness</option>');
                    $('#third').append('<option value="cluster4_3">Pink - Selflessness</option>');

                }
                else if ($('#first').val() == 'cluster5') {

                    $('#second').append('<option value="cluster5_a">Green - A</option>');
                    $('#second').append('<option value="cluster5_d">Green - D</option>');
                    $('#second').append('<option value="cluster5_t">Green - T</option>');

                    $('#third').append('<option value="cluster5_1">Green - Form</option>');
                    $('#third').append('<option value="cluster5_2">Green - Structural Thinking</option>');
                    $('#third').append('<option value="cluster5_3">Green - Preparedness</option>');

                }


                else {
                    $('#second').append('<option value="cluster6_a">Blue - A</option>');
                    $('#second').append('<option value="cluster6_d">Blue - D</option>');
                    $('#second').append('<option value="cluster6_t">Blue - T</option>');

                    $('#third').append('<option value="cluster6_1">Blue - Task Oriented</option>');
                    $('#third').append('<option value="cluster6_2">Blue - Thinking Orientation</option>');
                    $('#third').append('<option value="cluster6_3">Blue -  Authority & Power</option>');
                }
            });

        });
    </script>
@endsection
