<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('Elearn/Elearn/assets')}}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ url('Elearn/Elearn/assets')}}/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Easy A</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
  <link href="{{ url('Elearn/Elearn/assets')}}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ url('Elearn/Elearn/assets')}}/css/material-kit.css" rel="stylesheet"/>
  <link href="{{ url('Elearn/Elearn/assets')}}/css/style.css" rel="stylesheet"/>

</head>
<body class="landing-page tutors">
<style type="text/css">
  
  .card .card-image, .card .header, .card-profile .card-avatar, .card-testimonial .card-avatar img, .card-raised, .img-raised, .iframe-container iframe {
    box-shadow: 0 16px 38px -12px rgba(0,0,0,.56), 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);
  }
   section#team {
    padding-top: 45px;
  }

  <style type="text/css">
  /*.card-image img:first-child{ display:block;}
  .card-image img:last-child{ display:none;}
  .card-image:hover img:first-child{ display:none;}
  .card-image:hover img:last-child{ display:block;}*/
  </style>

</style>  
  <nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
    <div class="border-top"></div>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="topbar-left">
              <p>Contact Us &nbsp; | &nbsp;+63 998 7654 321</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="topbar-right">
               <ul class="nav">
        <li>
            <div id="google_translate_element"></div>
        </li>
    </ul>
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-nav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              
              <a class="navbar-brand navbar-logo" href="#">
                <img class="img-responsive" src="{{ url('Elearn/Elearn/assets')}}/img/logo.png">
              </a>
            </div>

            <div class="collapse navbar-collapse" id="navigation-doc">
                <ul class="nav navbar-nav navbar-right">
                
                <li><a href="{{ url('/') }}">HOME</a></li>
                <li  class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
                          <span>ABOUT US</span>
                          <span class="caret"></span>
                        </a>
                          <ul role="menu" class=" dropdown-menu">
                              <li><a href="{{ url('/online-school') }}"><span>ONLINE SCHOOL</span></a></li>
                              <li><a href="{{ url('/our-tutors') }}"><span>OUR TUTORS</span></a></li>
                          </ul>
                </li>
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
                        <span>ENGLISH COURSES</span>
                        <span class="caret"></span>
                      </a>
                        <ul role="menu" class=" dropdown-menu">
                            <li><a href="{{ url('/kids-english') }}"><span>KIDS ENGLISH</span></a></li>
                            <li><a href="{{ url('/everyday-english') }}"><span>Everyday English </span></a></li>
                            <li><a href="{{ url('/business-english') }}"><span>Business English</span></a></li>
                            <li><a href="{{ url('/english-test') }}"><span>English Test</span></a></li>
                        </ul>
                </li>
                <li><a href="{{ url('/blog') }}">BLOG</a></li>
                <li><a href="{{ url('/faq') }}">FAQ</a></li>
                <li class="btn btn-primary btn-main-nav"><a href="{{ url('login')}}">LOGIN</a></li>

              </ul>

            </div>
        </div>
    </div>
  </nav>

    <div class="wrapper contact-page-banner">
      <div class="header header-filter parallax-section" style="background-image: url('{{ url('Elearn/Elearn/assets')}}/img/banner-bg.jpg');">
          <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="title" style="color:#ff6d04;">Our Tutors</h1>
                            
                </div>
              </div>
          </div>
      </div>


      <div class="main main-raised">
        <div class="container">
            

          <section class="hestia-team " id="team" data-sorder="hestia_team">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h1 class="card-title" style="margin-top: 15px;">Meet our trained and experienced English teachers. These guys make the magic happen!</h1>
                        <p class="description">Have you ever talked to your best friend or your loving parents and received an advice regarding a certain problem? Or, have they ever taught you something new that they know well? Now imagine an English tutor that is exactly like your best friend or your loving parents - that’s what all the tutors in EasyA are.</p>

                        <p class="description">We do not simply treat our students as students, but we treat them as our friends. We always build a fun and comfortable learning relationship with them.</p>

                        <p class="description">At the same time, our tutors have exceptional English grammar knowledge and are all fluent in conversational English. They are all excited to share their knowledge with you.</p>

                        <p class="description">Try us, speak with us, learn with us, and believe.</p>

                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          TAKE A FREE TRIAL CLASS
                        </button>
                    </div>

                    <div class="col-md-6 text-left">
                        <div class="card-image card-raised"> 
                          <img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/group.png" alt="Desmond Purpleson">
                        </div>
                    </div>

                </div>
                <br>
                <hr>
                <br>
                <br>
                <div class="hestia-team-content">
                    <div class="row">
                        <div class="col-xs-12 col-ms-6 col-sm-6">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image card-raised">
                                      <img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Joan_2.JPG">
                                      <!-- <img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/China_2.JPG"> -->
                                    </div>
                                    <div class="footer">
                                             <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                            </audio>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="content">
                                        <h4 class="card-title">Teacher Joan</h4>
                                        <!-- <h6 class="category text-muted">CEO</h6> -->
                                        <p class="card-description">Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-ms-6 col-sm-6">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image card-raised"> <img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/China_2.JPG" alt="Desmond Purpleson"></div>
                                    <div class="footer">
                                             <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                            </audio>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="content">
                                        <h4 class="card-title">Teacher Rebecca</h4>
                                        <!-- <h6 class="category text-muted">CEO</h6> -->
                                        <p class="card-description">Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-ms-6 col-sm-6">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image card-raised"> <img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Rechel_2.JPG" alt="Desmond Purpleson"></div>
                                    <div class="footer">
                                             <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                            </audio>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="content">
                                        <h4 class="card-title">Teacher Rechel</h4>
                                        <!-- <h6 class="category text-muted">CEO</h6> -->
                                        <p class="card-description">Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-ms-6 col-sm-6">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image card-raised"> <img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Straw_2.JPG" alt="Desmond Purpleson"></div>
                                    <div class="footer">
                                             <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                            </audio>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="content">
                                        <h4 class="card-title">Teacher Strawberry</h4>
                                        <!-- <h6 class="category text-muted">CEO</h6> -->
                                        <p class="card-description">Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
          </section>

          <!-- 
          <div class="section landing-section">
                  <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center title">Work with us</h2>
                        <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group label-floating is-empty">
                                <label class="control-label">Your Name</label>
                                <input type="email" class="form-control">
                                <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group label-floating is-empty">
                                <label class="control-label">Your Email</label>
                                <input type="email" class="form-control">
                                <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="form-group label-floating is-empty">
                              <label class="control-label">Your Messge</label>
                              <textarea class="form-control" rows="4"></textarea>
                            <span class="material-input"></span></div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button class="btn btn-primary btn-raised">
                                      Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
          </div> 
          -->

        </div>

      </div> <!-- main-raised -->
    </div><!-- wrapper -->

  

    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Easy A English
                        </a>
                    </li>
          <li>
                        <a href="#">
                           About Us
                        </a>
                    </li>
                    <li>
                        <a href="#">
                           Blog
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2017, made with <i class="fa fa-heart heart"></i> by MAKENA
            </div>
        </div>
    </footer>

<!-- Modal Core -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">TRIAL CLASS APPLICATION FORM</h2>
          <h4 class="text-center description">We will responde get back to you in a couple of hours.</h4>
                    <form id="trial-class-form" method="post" action="{{ url('/trial_application')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                <div class="form-group label-floating">
                  <label class="control-label">Your Name</label>
                  <input type="text" name="your_name" class="form-control" required="">
                </div>
                            </div>

                            <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Your Email</label>
                  <input type="email" name="your_email" class="form-control" required="">
                </div>
                            </div>

                            <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Mobile</label>
                  <input type="text" name="your_mobile" class="form-control" required="">
                </div>
                            </div>

                            <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Skype ID</label>
                  <input type="text" name="your_skype" class="form-control" required="">
                </div>
                            </div>

                             <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">QQ ID</label>
                  <input type="text" name="your_qq" class="form-control" required="">
                </div>
                            </div>

                             <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Date</label>
                  <input type="date" name="your_date" class="form-control" required="">
                </div>
                            </div>

                            <div class="col-md-6">
                <div class="form-group label-floating">
                  <label class="control-label">Time</label>
                  <input type="time" name="your_time" class="form-control" required="">
                </div>
                            </div>

                            <div class="col-md-12">
                <div class="form-group label-floating">
                  <label class="control-label">Lesson</label>
                  <input type="text" name="your_lesson" class="form-control" required="">
                </div>
                            </div>
                        </div>

            <!-- <div class="form-group label-floating">
              <label class="control-label">Your Messge</label>
              <textarea class="form-control" rows="4"></textarea>
            </div> -->

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button id="send-application" type="button" class="btn btn-primary btn-raised">
                  Send
                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info btn-simple">Save</button>
      </div> -->
    </div>
  </div>
</div>


</body>

  <!--   Core JS Files   -->
  <script src="{{ url('Elearn/Elearn/assets')}}/js/jquery.min.js" type="text/javascript"></script>
  <script src="{{ url('Elearn/Elearn/assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="{{ url('Elearn/Elearn/assets')}}/js/material.min.js"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ url('Elearn/Elearn/assets')}}/js/nouislider.min.js" type="text/javascript"></script>

  <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
  <script src="{{ url('Elearn/Elearn/assets')}}/js/bootstrap-datepicker.js" type="text/javascript"></script>

  <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
  <script src="{{ url('Elearn/Elearn/assets')}}/js/material-kit.js" type="text/javascript"></script>
  <script src="{{ url('Elearn/Elearn/assets')}}/js/custom.js" type="text/javascript"></script>
  <script type="text/javascript">
        $(document).ready(function(){
            $('#send-application').click(function(){
                var url = $('#trial-class-form').attr('action');
                var data = $( '#trial-class-form' ).serialize();

                var invalid = false;
                var error_msg = "";
                $('#trial-class-form input[required]').each(function(each, input){

                    if( ($(input).val() == null) || ($(input).val() == "") ){
                        invalid = true;
                        error_msg += $(input).attr('name') + " is required! \n ";
                    } 
                    
                });
                
                if(invalid){
                    alert(error_msg);
                }else{

                    $.post(url, data)
                    .done(function(response){
                        if (response.error == false) {
                            alert(response.message);
                        }else{
                            alert('Sending Application Error!');
                        }
                        // console.log(response);
                    })
                    .fail(function(response){
                        alert('Sending Application Error!');
                        // console.log(response);
                    });

                    $('#myModal').modal('hide');

                    // event.preventDefault();
                }
            });
        });
    </script>
</html>
