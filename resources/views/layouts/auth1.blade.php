
<!doctype html>
<html lang="en">

@include('layouts.partials.head')

<style>
    .banner-top {
        background-color: #222845;
    }
    #footer {
        padding: 30px 0 0px;
        background-color: #222845;
        color: #d7d7d7;
    }
    #footer-bottom {
        padding: 10px 0;
        background-color: #222845;
        color: #d7d7d7;
    }
</style>

<body>


<div id="page-wrapper">

    <!-- HEADER -->

    <div id="header-top" >
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <!-- LOGO -->
                    <a id="logo" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png')}}" alt="{{ env('APP_NAME')}}">
                    </a>
                </div><!-- col -->
                <div class="col-sm-4">

                </div><!-- col -->
                <div class="col-sm-5 logme">
                    <div class="widget widget-pages">
                        @auth()

                        <ul >
                            <div class="dropdown2">
                                <li><a href="{{ auth()->user()->url() }}" class="dropbtn2"><i class="fa fa-lock"></i> <strong> {{ auth()->user()->username }}</strong></a></li>
                                <div class="dropdown-content2">
                                    <a href="#">Edit Profile</a>
                                    <a href="#">Saved Jobs</a>
                                    <a href="#">Change Password</a>

                                </div>
                            </div>
                            <li>

                              <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                               <i class="fa fa-sign-out"></i>Logout</a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
</li>

                        </ul>

                        @endauth

                        @guest()

                                <ul >

                                        <li><a href="{{ route('jobseeker.login') }}" class="dropbtn2"><i class="fa fa-lock"></i> <strong> Login </strong></a></li>


                                </ul>

                            @endguest

                    </div><!-- widget-pages -->


                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- header-top -->



    <div id="header" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- MENU -->
                    <nav>
                        <a id="mobile-menu-button" href="#"><i class="mt-icons-menu"></i></a>
                        <ul class="menu clearfix" id="menu">
                            <li><a style="font-size: 15px" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li><a style="font-size: 15px" href="{{ route('jobseeker.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> Jobseekers</a></li>
                            <li><a style="font-size: 15px" href="{{ route('searchall') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Jobs</a></li>
{{--                            <li><a style="font-size: 15px" href="{{ route('searchall') }}"><i class="fa fa-university" aria-hidden="true"></i> IIT/IIM jobs</a></li>--}}
{{--                            <li ><a style="font-size: 15px" href="{{ route('job.type','govt-jobs') }}"><i class="fa fa-university" aria-hidden="true"></i> Govt.jobs</a></li>--}}
{{--                            <li ><a style="font-size: 15px" href="{{ route('job.type','overseas-jobs') }}"><i class="fa fa-globe" aria-hidden="true"></i> Oversea jobs</a></li>--}}
                            <li ><a style="font-size: 15px" href="{{ route('recruiters') }}"><i class="fa fa-users" aria-hidden="true"></i> Recruiters</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT -->

    @if(session()->has('role_error'))
        <div class="alert alert-danger">
            {{ session()->get('role_error') }}
        </div>
    @endif


@yield('content')


<!-- FOOTER -->
    <footer>

        <div id="footer">

            <div class="container">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">

                        <div class="widget widget-contact">
                            <h4 class="widget-title">Information</h4>
                            <ul>
                                <li><a href="{{ route('about') }}" > About Us </a> </li>
                                <li><a href="{{ route('terms') }}" > Terms & Conditions </a></li>
                                <li><a href="{{ route('privacy') }}" > Privacy Policy </a></li>
                                <li><a href="{{ route('contactus') }}" > Contact Us </a></li>
                                <li><a href="{{ route('faq') }}" > Help / FAQ </a></li>

                            </ul>

                        </div><!-- widget-contact -->

                    </div><!-- col -->
                    <div class="col-sm-2">

                        <div class="widget widget-contact">
                            @guest()
                                <h4 class="widget-title">Jobseekers </h4>
                                <ul>
                                    <li><a href="{{ route('jobseeker.login') }}" > Login/Register </a> </li>
                                </ul>
                            @endguest

                            <h4 class="widget-title"> Recruiters </h4>
                            <ul>
                                <li><a href="{{ route('recruiters') }}" > Browse All Recruiters </a> </li>

                                <!--<li><a href="recruiter-listing.html" > Go to OwoRecruiters </a></li>-->
                                <!--<li><a href="#" > Report a Problem </a></li>-->
                            </ul>
                        </div><!-- widget-contact -->

                    </div><!-- col -->
                    <div class="col-sm-2">

                        <div class="widget widget-contact">

                            <h4 class="widget-title">Browse Jobs</h4>

                            <ul>
                                <li><a href="{{ route('all_jobs') }}" > Browse All Jobs </a> </li>
                                <!--<li><a href="#" > Premium MBA Jobs </a></li>
                                <li><a href="#" > Premium Engineering Jobs </a></li>-->
                                {{--                                <li><a href="jobsearch_all.html?sch=1" > Govt. Jobs </a></li>--}}
                                {{--                                <li><a href="jobsearch_all.html?sch=2" > International Jobs </a></li>--}}
                                <li><a href="{{ route('category_job') }}" > Jobs by Company </a> </li>
                                <li><a href="{{ route('company_job') }}" > Jobs by Category </a></li>
                                <li><a href="{{ route('job_by_area') }}" > Jobs by Location </a></li>
                            </ul>

                        </div><!-- widget-contact -->

                    </div><!-- col -->
                    <div class="col-sm-2">

                        <div class="widget widget-contact">
                            {{--                            <h4 class="widget-title">GOVT. JOBS</h4>--}}
                            {{--                            <ul>--}}
                            {{--                                <li><a href="job_by_location.html?loc=1" > Location </a></li>--}}
                            {{--                            </ul>--}}

                            {{--                            <h4 class="widget-title"> Oversea jobs</h4>--}}
                            {{--                            <ul>--}}
                            {{--                                <li><a href="job_by_location.html?loc=2" > All Countries </a> </li>--}}
                            {{--                            </ul>--}}

                            <h4 class="widget-title"> Employers</h4>
                            <ul>
                                <li><a href="{{ route('jobs.create') }}" > Post Jobs </a> </li>
                                <!--<li><a href="#" > Search Resumes</a> </li>-->
                            </ul>



                        </div><!-- widget-contact -->


                    </div><!-- col -->
                    <div class="col-sm-2">

                        <!--	<div class="widget widget-contact">
                                <h4 class="widget-title">SERVICES</h4>

                                <ul>
                                    <li><a href="#" > In-house Consultants </a> </li>
                                    <li><a href="#" > Resume Writing </a></li>
                                    <li><a href="#" > Featured Resume </a></li>
                                    <li><a href="#" > Priority Applicant </a></li>
                                    <li><a href="#" > Recruiters Connent </a></li>
                                </ul>

                            </div>--><!-- widget-contact -->

                        <div class="widget widget-social">
                            <h4 class="widget-title">FOLLOW US</h4>

                            <div class="social-media">

                                <a class="facebook" href="{{ setting('facebook_link') }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a class="twitter" href="{{ setting('twitter_link') }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a class="google" href="{{ setting('google_link') }}" target="_blank"><i class="fa fa-google-plus"></i></a>
                                <a class="linkedin" href="{{ setting('linkedin_link') }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div><!-- social-media -->
                        </div><!-- widget-social -->
                    </div><!-- col -->
                    <div class="col-sm-1"> </div>
                </div><!-- row -->
            </div><!-- container -->

        </div><!-- footer -->

        <div id="footer-bottom">

            <div class="container">
                <div class="row">

                    <div class="col-sm-12">

                        <div class="widget widget-text">

                            <div  class="copy-right"><p></p>
                                <p>All rights reserved &copy; {{ date('Y') }} {{ setting('site_name') }}</p>
                            </div>

                        </div><!-- widget-text -->

                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->

        </div><!-- footer-bottom -->

    </footer>
    <!-- FOOTER -->

</div><!-- PAGE-WRAPPER -->


<!-- GO TOP -->
<a id="go-top"><i class="mt-icons-arrow-up2"></i></a>

<script >
    $('#myCarousel').carousel({
        interval: 40000
    });

    $('.carousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {

            next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');

        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));

        }
    });
</script>

<!--jQUERY-->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/jquery/jquery-2.1.3.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- VIEWPORT -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/viewport/jquery.viewport.js"></script>

<!-- MENU -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/menu/hoverIntent.js"></script>
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/menu/superfish.js"></script>

<!-- FANCYBOX -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/fancybox/jquery.fancybox.pack.js"></script>

<!-- REVOLUTION SLIDER -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/revolutionslider/js/jquery.themepunch.tools.min.js"></script>
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>

<!-- OWL Carousel -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/owl-carousel/owl.carousel.min.js"></script>

<!-- PARALLAX -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/parallax/jquery.stellar.min.js"></script>

<!-- ISOTOPE -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/isotope/imagesloaded.pkgd.min.js"></script>
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/isotope/isotope.pkgd.min.js"></script>

<!-- PLACEHOLDER -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/placeholders/jquery.placeholder.min.js"></script>

<!-- CONTACT FORM VALIDATE & SUBMIT -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/validate/jquery.validate.min.js"></script>
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/submit/jquery.form.min.js"></script>

<!-- GOOGLE MAPS -->
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/googlemaps/gmap3.min.js"></script>

<!-- CHARTS -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/charts/jquery.easypiechart.min.js"></script>

<!-- COUNTER -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/counter/jQuerySimpleCounter.js"></script>

<!-- STATISTICS -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/statistics/chart.min.js"></script>

<!-- YOUTUBE PLAYER -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/ytplayer/jquery.mb.YTPlayer.js"></script>

<!-- HOVERDIR -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/hoverdir/hoverdir.js"></script>

<!-- MAGNIFY -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/magnify/jquery.magnify.js"></script>

<!-- INSTAFEED -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/instafeed/instafeed.min.js"></script>

<!-- TWITTERFETCHER -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/twitterfetcher/twitterfetcher.js"></script>

<!-- TEXT ROTATOR -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/text-rotator/jquery.simple-text-rotator.min.js"></script>

<!-- ANIMATIONS -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/plugins/animations/wow.min.js"></script>

<!-- CUSTOM JS -->
<script src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/js/custom.js"></script>

</body>

</html>

<!--Auto Complete ---------------------------------------------------------------->

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/js/auto/jquery.autocomplete.js"></script>
<script type="text/javascript" src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/js/auto/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/js/auto/jquery.autocomplete.pack.js"></script>



<!--<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>-->
<link rel="stylesheet" type="text/css" href="http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/assets/js/auto/jquery.autocomplete.css" />

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript">
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail());
        var id = profile.getId();
        var name = profile.getName();
        var email = profile.getEmail();
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            //alert("dfs");
            console.log('User signed out.');
            // window.location='logout.php';
        });
        // alert(id);
        // alert(name);
        // alert(email);

        $.ajax({
            type: "POST",
            url: "ajax_google.php",
            data: "id="+ id + "&name=" + name + "&email=" + email ,
            success: function(msg){
                // alert(msg);
                window.location='emp_welcome.php';
            }
        });
        //alert(profile.getId());
        // alert(profile.getName());
        // alert(profile.getImageUrl());
        // alert(profile.getEmail());

    }

</script>
<script>
    function signOut() {

        // alert("dfsd");
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            //alert("dfs");
            console.log('User signed out.');
            window.location='logout_emp.php';
        });


    }
</script>
<script type="text/javascript">
    function advancedsearch()
    {
//alert('ghghghfg');
        var adkey = $("#ad-keyword").val();
        var location = $("#location").val();
        var advindustry = $("#advindustry").val();
        var advfarea = $("#advfarea").val();
        if(adkey != "" || location != "" || advindustry != ""  || advfarea != "")
        {
            $('#advancesearchform').submit();
            return true;
        }
        else
        {
            $('#divsearch').html("<div class='alert'>Please enter Keywords or Location or select Job Category or Industry to search</div>");
            return false;
        }
        /*
        $.ajax({
            type: "POST",
            url: "http://74.124.215.220/~demolin/demo/entrepreneur_job_portal//ajax_save_jobs.php",
            async:false,
            data: "id="+id+"&seeker_id="+seeker_id,
            success: function(msg){
                alert(msg);
            //window.location='http://74.124.215.220/~demolin/demo/entrepreneur_job_portal/search.html';
        }
        });*/
    }
</script>
<!--Auto Complete End ------------------------------------------------------------------->
<script type="text/javascript">

    //<![CDATA[



    // check-out date >= check-in date

    function customRange(dates) {

        if (this.id == 'startdate') {

            $('#enddate').datepick('option', 'minDate', dates[0] || null);

        }

        else {

            $('#startdate').datepick('option', 'maxDate', dates[0] || null);

        }

        var edt = $('#ed_timestamp').val();

        var sdt = $('#sd_timestamp').val();

        if ((edt > 0) && (sdt > 0)) {

            $('span.nights').text((edt - sdt) / (3600*24) + ' night(s)');

        } else {

            $('span.nights').text('');

        }

    }



    $(document).ready(function(){




        $("#keyword").autocomplete("keyskillsearch.php", {

            width: 175,
            formatResult: function(data, value) {
                //alert(data);
                return value.split(",")[0];
            }
        });

        $("#ad-keyword").autocomplete("keyskillsearch.php", {
            //alert(data);
            width: 175,
            formatResult: function(data, value) {

                return value.split(",")[0];
            }
        });

        $("#location").autocomplete("ajax_joblocation.php", {

            width: 165,
            formatResult: function(data, value) {
                return value.split(",")[0];
            }
        });

        $("#adv-location").autocomplete("ajax_joblocation.php", {

            width: 165,
            formatResult: function(data, value) {
                return value.split(",")[0];
            }
        });
        // Datepick input fields

        /*	$('#startdate').datepick({

                onSelect: customRange,

                showTrigger: '#trigger',

                altField: '#sd_timestamp',

                //altFormat: $.datepick.TIMESTAMP

            });

            $('#enddate').datepick({

                onSelect: customRange,

                showTrigger: '#trigger',

                altField: '#ed_timestamp',

            //	altFormat: $.datepick.TIMESTAMP

            });
    */


        // Carousel slider

        /*$('.carousel ul').cycle({

            prev: '.previous',

            next: '.next',

            timeout: 6000,

            pause: 1

        });*/



        /* tabs */

        //var tabs = $("#tabs").tabs(function () {



        //$("#innerimages").css("display","none");

        //$("#innerimages_loader").css("display","none");

        //});



        // Template setup

        //	Site.setup();



        // Google map setup

        // centerX: 27.9944

        // centerY: -9.84375

        // zoom: 2

        // clustering: true

        // NOTE: hotel list is loaded on the bottom of this file

        //Site.gmapInit(27.9944, -9.84375, 2, true);



    });



    //]]>

</script>
<script type="text/javascript">
    function chkempty()
    {
        if(tinyMCE.get("job_desc").getContent())
        {

            var idddd = "job_desc";
            alert(job_desc);
            chkkabuse();


        }
    }


    function chkkabuse(txtid)
    {
        // alert(txtid);
        // exit;
        var idd = txtid;
        //alert(idd);
        var textval =document.getElementById(idd).value;
        //alert(textval);
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                //alert(xmlhttp.responseText);

                //alert(xmlhttp.responseText);
                if(xmlhttp.responseText==0)
                {
                    document.getElementById(txtid).focus();
                    document.getElementById(txtid).value="";
                    //document.getElementById("name1").innerHTML="<font color='red' style='font-size:12px;'>Don't use abuse words,  </font> ";
                    alert ("Don't use abuse words");


                }
                else
                {
                    //document.getElementById("name1").innerHTML="<font color='#009966' style='font-size:12px;'>good</font>";
                }
            }
        }
        xmlhttp.open("GET","chkabuse.php?q="+textval,true);
        xmlhttp.send();


    }
</script>
<script type="text/javascript">
    function jobalertValidate()
    {
        var keywordalert=$('#keywordalert').val();
        var locationalert=$('#locationalert').val();
        var workexp=$('#workexp').val();
        var indus=$('#indus').val();
        var jobcat=$('#jobcat').val();
        var jobrole=$('#jobrole').val();
        var namealert=$('#namealert').val();
        var emailalert=$('#emailalert').val();

        var clr=0;
        $('.error').hide();
        if(keywordalert=="")
        {
            $('#keywordinfo').html('<span class="error">Please enter keyword</span>');
            $('#keywordalert').focus();
            document.myform1.keywordalert.style.borderColor="red";
            clr=1;
        }
        if(locationalert=="")
        {
            $('#locationinfo').html('<span class="error">Please enter location</span>');
            $('#locationalert').focus();
            document.myform1.locationalert.style.borderColor="red";
            clr=1;
        }
        if(workexp=="")
        {
            $('#workinfo').html('<span class="error">Please enter Experience</span>');
            $('#workexp').focus();
            document.myform1.workexp.style.borderColor="red";
            clr=1;
        }
        if(indus=="")
        {
            $('#industryinfo').html('<span class="error">Please enter industry</span>');
            $('#indus').focus();
            document.myform1.indus.style.borderColor="red";
            clr=1;
        }
        if(jobcat=="")
        {
            $('#categoryinfo').html('<span class="error">Please enter job category</span>');
            $('#jobcat').focus();
            document.myform1.jobcat.style.borderColor="red";
            clr=1;
        }
        if(jobrole=="")
        {
            $('#roleinfo').html('<span class="error">Please enter job role</span>');
            $('#jobrole').focus();
            document.myform1.jobrole.style.borderColor="red";
            clr=1;
        }
        if(namealert=="")
        {
            $('#nameinfo').html('<span class="error">Please enter Name</span>');
            $('#namealert').focus();
            document.myform1.namealert.style.borderColor="red";
            clr=1;
        }
        if(emailalert=="")
        {
            $('#emailinfo').html('<span class="error">Please enter Email</span>');
            $('#emailalert').focus();
            document.myform1.emailalert.style.borderColor="red";
            clr=1;
        }
        // var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if(document.getElementById("inlineCheckbox1").checked == false){
            $('#termsinfo').html('<span class="error">Please agree to the terms and conditions to continue.</span>');
            clr=1;
        }

        if(clr==0)
        {
            document.myform1.keywordalert.value=1;
            document.myform1.submit();
            return true;
        }

    }

</script>

<style>
    .error,.redstar{ color:#F00;   font-size: 12px;}
</style>


<script type="text/javascript">
    function login_validation()
    {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(document.getElementById('username').value=="")
        {
//alert("Please enter the Username / Email");
            document.getElementById('id1').innerHTML='<span style="color:#DE1616; ">Please enter the Username / Email</span>';
            document.getElementById('username').focus();
            return false;

        }
        /*
        else if(!emailReg.test(document.getElementById('username').value))
        {
        //$('#emailLabel').html('<span class="error">Valid ' + inputMessage[0] + ' Required</span>');clr=1;
        document.getElementById('id1').innerHTML='<span style="color:#DE1616; ">Email ID Format is Wrong</span>';
        document.getElementById('username').focus();
        return false;
        }
        */


        if(document.getElementById('password').value=="")
        {
//alert("Please enter the Password");
            document.getElementById('id1').innerHTML='<span style="color:#DE1616; ">Please enter the Password</span>';
            document.getElementById('password').focus();
            return false;

        }


    }

</script>
