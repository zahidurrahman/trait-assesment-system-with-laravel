@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border: 0;">
                    <div class="card-header" style="background-color:#a8e063;border: 0;color:#2C3E50;">
                        Menu <span style="float: right"></span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <center> <h3>Choose Assessment</h3>  </center>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a href="/c" style="text-decoration: none">
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

                                        <div class="card-body">
                                            <center>

                                                <h2 class="card-title">
                                                    <img src="https://image.flaticon.com/icons/svg/1976/1976013.svg" style="width:50px;height:50px;">

                                                </h2>
                                                <p>

                                                    <b>CPP</b><br>
                                                    Credo Personality <br>Profile
                                                </p>
                                            </center>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">

                                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                        <img src="https://challahforhunger.org/wordcms/wp-content/uploads/2016/06/Coming_Soon_Button.png" style="position:absolute;z-index:2;width:80px;height:80px;">
                                        <div class="card-body">
                                            <center>
                                                <h2 class="card-title">
                                                    <img src="https://image.flaticon.com/icons/svg/1491/1491416.svg" style="width:50px;height:50px;">

                                                </h2>

                                                <p>
                                                    <b>CEIQ</b><br>
                                                    Credo Emotional Intelligence Quotient
                                                </p>
                                            </center>
                                        </div>

                                    </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col" >
                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                    <img src="https://challahforhunger.org/wordcms/wp-content/uploads/2016/06/Coming_Soon_Button.png" style="position:absolute;z-index:2;width:80px;height:80px;">
                                    <div class="card-body">
                                        <center>
                                            <h2 class="card-title">
                                                <img src="https://image.flaticon.com/icons/svg/1373/1373027.svg" style="width:50px;height:50px;">

                                            </h2>

                                            <p>
                                                <b> CETA</b><br>
                                                Credo Entrepreneurial Trait Assessment
                                            </p>
                                        </center>

                                    </div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                    <img src="https://challahforhunger.org/wordcms/wp-content/uploads/2016/06/Coming_Soon_Button.png" style="position:absolute;z-index:2;width:80px;height:80px;">
                                    <div class="card-body">
                                        <center>
                                            <h2 class="card-title">
                                                <img src="https://image.flaticon.com/icons/svg/860/860417.svg" style="width:50px;height:50px;">

                                            </h2>
                                            <p>
                                                <b> LCPA</b><br>
                                                Leadership Competencies Potential Assessment
                                            </p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                    <img src="https://challahforhunger.org/wordcms/wp-content/uploads/2016/06/Coming_Soon_Button.png" style="position:absolute;z-index:2;width:80px;height:80px;">
                                    <div class="card-body">
                                        <center>
                                            <h2 class="card-title">
                                                <img src="https://image.flaticon.com/icons/svg/1945/1945670.svg" style="width:50px;height:50px;">

                                            </h2>
                                            <p>
                                                <b>IAE</b><br>
                                                Extroversion vs Introversion
                                            </p>
                                        </center>

                                    </div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                    <img src="https://challahforhunger.org/wordcms/wp-content/uploads/2016/06/Coming_Soon_Button.png" style="position:absolute;z-index:2;width:80px;height:80px;">
                                    <div class="card-body">
                                        <center>
                                            <h2 class="card-title">
                                                <img src="https://image.flaticon.com/icons/svg/1589/1589592.svg" style="width:50px;height:50px;">

                                            </h2>
                                            <p>
                                                <b>APA</b><br>
                                                Motivation Drivers</p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                    <img src="https://challahforhunger.org/wordcms/wp-content/uploads/2016/06/Coming_Soon_Button.png" style="position:absolute;z-index:2;width:80px;height:80px;">
                                    <div class="card-body">
                                        <center>
                                            <h2 class="card-title">
                                                <img src="https://image.flaticon.com/icons/svg/992/992564.svg" style="width:50px;height:50px;">

                                            </h2>
                                            <p>
                                                <b>HOTS</b><br>
                                                Higher Order Thinking Skills</p>
                                        </center>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="card-footer" style="background-color:#a8e063;border: 0;height: 1px;">

                    </div>
                </div>
            </div>
        </div>
@endsection
