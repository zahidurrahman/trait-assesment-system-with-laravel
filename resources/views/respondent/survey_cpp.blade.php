<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<meta charset="utf-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }
</style>
<style>
    .__range input
    {
        outline: none;
        -webkit-appearance: none;
        background-color: #aaa;
        height: 3px;
        width: 100%;
        margin: 10px auto;
    }
    .__range input::-webkit-slider-thumb
    {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background-color: green;
        border-radius: 50%;
        cursor: -moz-grab;
        cursor: -webkit-grab;
    }
    .__range input::-moz-range-thumb
    {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background-color: green;
        border-radius: 50%;
        cursor: -moz-grab;
        cursor: -webkit-grab;
    }
    .__range input::-ms-thumb
    {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background-color: green;
        border-radius: 50%;
        cursor: -moz-grab;
        cursor: -webkit-grab;
    }
    .__range-step{
        position: relative;
    }

    .__range-max{
        float: right;
    }
    .__range-step input::-webkit-slider-thumb
    {
        background: transparent;
    }
    .__range-step input::-moz-range-thumb
    {
        background: transparent;
    }
    .__range-step input::-ms-thumb
    {
        background: transparent;
    }
    .__range-step datalist {
        position:relative;
        display: flex;
        justify-content: space-between;
        height: auto;
        bottom: 16px;
        /* disable text selection */
        -webkit-user-select: none; /* Safari */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE10+/Edge */
        user-select: none; /* Standard */
        /* disable click events */
        pointer-events:none;
    }
    .__range-step datalist option {
        width: 10px;
        height: 10px;
        min-height: 10px;
        border-radius: 100px;
        /* hide text */
        white-space: nowrap;
        padding:0;
        line-height: 40px;
    }


    .__range-step-popup output
    {
        position: absolute;
        background-color: green;
        width: 30px;
        height: 30px;
        text-align: center;
        color: white;
        border-radius: 100px;
        display: inline-block;
        font-size:12px;
        bottom: 100%;
        left: 0;
        vertical-align: middle;
        line-height: 30px;
    }
    .__range-step-popup .__range-output-square{
        padding: 0 5px;
        min-width: 25px;
        width: auto !important;
        border-radius: 5px !important;
    }
    .__range-step-popup output:after
    {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        border-top: 10px solid green;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        top: 90%;
        left: 50%;
        margin-left: -10px;
        margin-top: -1px;
    }
    .__range-step-popup datalist{
        overflow:hidden;
    }
    .__range-step{
        margin:0 40px;
    }
    .__range-step-popup{
        margin:40px 40px;
    }
</style>
<body>
<script>
    document.querySelectorAll(".__range-step").forEach(function(ctrl) {
        var el = ctrl.querySelector('input');
        var output = ctrl.querySelector('output');
        var newPoint, newPlace, offset;
        el.oninput =function(){
            // colorize step options
            ctrl.querySelectorAll("option").forEach(function(opt) {
                if(opt.value<=el.valueAsNumber)
                    opt.style.backgroundColor = 'green';
                else
                    opt.style.backgroundColor = '#aaa';
            });
            // colorize before and after
            var valPercent = (el.valueAsNumber  - parseInt(el.min)) / (parseInt(el.max) - parseInt(el.min));
            var style = 'background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+
                valPercent+', green), color-stop('+
                valPercent+', #aaa));';
            el.style = style;

            // Popup
            if((' ' + ctrl.className + ' ').indexOf(' ' + '__range-step-popup' + ' ') > -1)
            {
                var selectedOpt=ctrl.querySelector('option[value="'+el.value+'"]');
                output.innerText= selectedOpt.text;
                output.style.left = "50%";
                output.style.left = ((selectedOpt.offsetLeft + selectedOpt.offsetWidth/2) - output.offsetWidth/2) + 'px';
            }
        };
        el.oninput();
    });

    window.onresize = function(){
        document.querySelectorAll(".__range").forEach(function(ctrl) {
            var el = ctrl.querySelector('input');
            el.oninput();
        });
    };
</script>
<form id="regForm" action="/action_page.php">
    <h1>Register:</h1>
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
        <div class="container-fluid">
            <h1>Page 1</h1>

            <div class="row">
                <div class="col-sm-6" style="background-color:yellow;">

                </div>
                <div class="col-sm-6" style="background-color:pink;">
                    <div class="row">
                        <div class="col-sm-2" style="background-color:yellow;">
                            <center>
                               <p>1</p>
                            </center>
                        </div>
                        <div class="col-sm-2" style="background-color:yellow;">
                            <center>
                                <p>2</p>
                            </center>
                        </div>
                        <div class="col-sm-2" style="background-color:yellow;">
                            <center>
                                <p>3</p>
                            </center>
                        </div>
                        <div class="col-sm-2" style="background-color:yellow;">
                            <center>
                                <p>4</p>
                            </center>
                        </div>
                        <div class="col-sm-2" style="background-color:yellow;">
                            <center>
                                <p>5</p>
                            </center>
                        </div>
                        <div class="col-sm-2" style="background-color:yellow;">
                            <center>
                                <p>6</p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i=0;
            for($i=0;$i<5;$i++){
            ?>
            <div class="row">
                <div class="col-sm-6" style="background-color:yellow;">
                    <p>Are you Familiar with managing muliple stress?</p>
                </div>
                <div class="col-sm-6" style="background-color:pink;">
                    <div class="row">
                        <div class="col-sm-2" style="background-color:yellow;">
                           <center>
                               <input type="radio" checked="checked" name="radio">
                           </center>
                        </div>
                        <div class="col-sm-2" style="background-color:pink;">
                            <input type="radio"  name="radio">
                        </div>
                        <div class="col-sm-2" style="background-color:yellow;">
                           <input type="radio"  name="radio">
                        </div>
                        <div class="col-sm-2" style="background-color:pink;">
                            <input type="radio" name="radio">
                        </div>
                        <div class="col-sm-2" style="background-color:yellow;">
                           <input type="radio" name="radio">
                        </div>
                        <div class="col-sm-2" style="background-color:pink;">
                           <input type="radio"  name="radio">
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="tab">Contact Info:
        <div class="container-fluid">
            <h1>Page 2</h1>
            <div class="row">
                <div class="col-sm-6" style="background-color:yellow;">
                    <p>Are you Familiar with managing muliple stress?</p>
                </div>
                <div class="col-sm-6" style="background-color:pink;">
                    <div class="__range __range-step">
                        <input value="3" type="range" max="5" min="1" step="1" list="ticks1">
                        <datalist id="ticks1">
                            <option value="1">Now</option>
                            <option value="2">1 mth</option>
                            <option value="3">2 mth</option>
                            <option value="4">3 mth</option>
                            <option value="5">4+ mth</option>
                        </datalist>
                    </div>


                    <div class="__range __range-step __range-step-popup">
                        <input value="30" type="range" max="50" min="10" step="10" list="ticks2">
                        <datalist id="ticks2">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </datalist>
                        <output ></output>
                    </div>

                    <div class="__range __range-step __range-step-popup">
                        <input value="1" type="range" max="4" min="1" step="1" list="ticks2">
                        <datalist id="ticks2">
                            <option value="1">Very bad</option>
                            <option value="2">Bad</option>
                            <option value="3">Good</option>
                            <option value="4">Excellent</option>
                        </datalist>
                        <output class="__range-output-square"></output>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="tab">Birthday:
        <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
        <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
        <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
    </div>
    <div class="tab">Login Info:
        <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
        <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
    </div>
    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

</body>
</html>
