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
<body class="landing-page online-school">
<style type="text/css">
  
 
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
              <ul>
                <li><img src="{{ url('Elearn/Elearn/assets')}}/img/flags/VN.png"></li>
                <li><img src="{{ url('Elearn/Elearn/assets')}}/img/flags/KR.png"></li>
                <li><img src="{{ url('Elearn/Elearn/assets')}}/img/flags/JP.png"></li>
                <li><img src="{{ url('Elearn/Elearn/assets')}}/img/flags/CN.png"></li>
                <li><img src="{{ url('Elearn/Elearn/assets')}}/img/flags/US.png"></li>
              </ul>
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
                  <h1 class="title" style="color:#ff6d04;">Online School</h1>
                            
                </div>
              </div>
          </div>
      </div>


      <div class="main main-raised">
        <div class="container">
          <div class="row">

            <div class="col-md-3">
        
                <div class="asides ">
                  <div class="aside">
                      <div class="card card-product">
                          <div class="card-image "><!-- card-raised -->
                              <a href="#"> <img src="{{ url('Elearn/Elearn/assets')}}/img/english-course/tst.jpg" class="attachment-hestia-shop size-hestia-shop wp-post-image" alt=""> </a>
                              <div class="ripple-container"></div>
                          </div>
                          <div class="content">
                              <h6 class="category">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                  TAKE A FREE TRIAL CLASS
                                </button><!-- <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">TAKE A FREE TRIAL CLASS</a> --></h6>
                             
                              <hr>
                              <div class="card-description">
                                  <p>Take a 30-minute free trial class with us so that we can assess your English Level and show you how the lessons work!</p>
                              </div>
                              
                          </div>
                      </div>
                  </div>

                </div>
            </div>

            <div class="col-md-8 col-md-offset-1 ">

              <h2 class="easya-title">What is EasyA Online?</h2>

              <div class="card  card-plain card-blog sticky">
                <div class="row">
                    <div class="col-ms-5 col-sm-5">
                      <div class="card-image card-raised">
                        <a href="#" > 
                          <img width="360" height="240" src="http://mediakey1.ef.com/sitecore/__~/media/centralefcom/corporate/2017/online-school/Step3_TB_4144_retouch.jpg" class="attachment-hestia-blog size-hestia-blog wp-post-image" alt="Perfectly on furniture" ">
                        </a>
                      </div>
                    </div>

                    <div class="col-ms-7 col-sm-7">
                        <h2 class="card-title entry-title">Live Online Class</h2>
                        <h6 class="text-info">Individual or Group Class</h6>
                          <div class="card-description">
                            <p>Make learning fun with your family and friends or choose a private one-on- one class.</p>
                          </div>
                        
                    </div>
                </div>
              </div>

              <div class="card  card-plain card-blog sticky">
                <div class="row">
              
                    <div class="col-ms-7 col-sm-7 text-right">
                        <h2 class="card-title entry-title">Online Booking System</h2>
                        <h6 class="text-info">Real-time Booking System for Maximum Flexibility</h6>
                          <div class="card-description">
                            <p>Book your classes at any convenient time you want.</p>
                          </div>
                    </div>

                    <div class="col-ms-5 col-sm-5">
                      <div class="card-image card-raised">
                        <a href="#" > 
                          <img width="360" height="240" src="https://demot-vertigostudio.netdna-ssl.com/hestia-pro/wp-content/uploads/sites/92/2016/10/blog3-360x240.jpg" class="attachment-hestia-blog size-hestia-blog wp-post-image" alt="Perfectly on furniture" ">
                        </a>
                      </div>
                    </div>
                </div>
              </div>

              <div class="card  card-plain card-blog sticky">
                <div class="row">
                  <div class="col-ms-5 col-sm-5">
                    <div class="card-image card-raised">
                      <a href="#" > 
                        <img width="360" height="240" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/group.png" class="attachment-hestia-blog size-hestia-blog wp-post-image" alt="Perfectly on furniture" ">
                      </a>
                    </div>
                  </div>

                  <div class="col-ms-7 col-sm-7">
                      <h2 class="card-title entry-title">Hand-Picked Tutors</h2>
                      <h6 class="text-info">Trained and Skilled</h6>
                        <div class="card-description">
                          <p>We only hire qualified and passionate tutors who will help you achieve only the best results.</p>
                        </div>
                      
                  </div>
                </div>
              </div>

              <div class="card  card-plain card-blog sticky">
                <div class="row">
              
                    <div class="col-ms-7 col-sm-7 text-right">
                        <h2 class="card-title entry-title">Interactive Lessons</h2>
                        <h6 class="text-info">Engaging and Productive</h6>
                          <div class="card-description">
                            <p>Learn with ease and fun with our specially design lessons based on your needs.</p>
                          </div>
                    </div>

                    <div class="col-ms-5 col-sm-5">
                      <div class="card-image card-raised">
                        <a href="#" > 
                          <img width="360" height="240" src="https://cdn.lynda.com/courses/144198-636356275983784678_270x480_thumb.jpg" class="attachment-hestia-blog size-hestia-blog wp-post-image" alt="Perfectly on furniture" ">
                        </a>
                      </div>
                    </div>
                </div>
              </div>

              <div class="card  card-plain card-blog sticky">
                <div class="row">
                  <div class="col-ms-5 col-sm-5">
                    <div class="card-image card-raised">
                      <a href="#" > 
                        <img width="360" height="240" src="https://cdn.lynda.com/course/373553/373553-636125469315480526-16x9.jpg" alt="Perfectly on furniture" ">
                      </a>
                    </div>
                  </div>

                  <div class="col-ms-7 col-sm-7">
                      <h2 class="card-title entry-title">Comprehensive Progress Report</h2>
                      <h6 class="text-info">Detailed Progress Report after 20 th Class</h6>
                        <div class="card-description">
                          <p>See how much progress you made with our up-to- date and printable reports.</p>
                        </div>
                      
                  </div>
                </div>
              </div>

              <br>
              <hr>
              <br>

              <h2 class="easya-title">About Us</h2>

              <p>In our school, you are not just a student, but a friend. You are not only studying, but you are building a learning
              relationship. We teach you based on your needs and we personalize your learning from your most difficult subjects to
              the easiest.</p>

              <p>Our one-on- one teaching method ensures that you are given utmost attention. Do you want to see your tutor on Skype
              or QQ Messenger? No problem. We will teach you with a smile wherever you are: at the comfort of your home, in a
              park, at a restaurant, or anywhere!</p>

             <p> All of our tutors are office-based and are fully equipped with the learning materials that they need to provide you with a
              fun and memorable learning experience.
              Whether you just want to learn ESL (English as a Secondary Language) or need to enhance your conversational English
              and grammar for IELTS, TOEIC or EIKEN, EasyA Online English Tutorial Center is the best choice for you.  </p>  

              <br>
              <hr>
              <br>

              <h2 class="easya-title">Featured Tutors</h2>

              <div id="teacher-carousel" class="carousel slide" data-ride="carousel">
                  <div class="col-md-10">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-img">
                                        <img alt="teacher image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Joan_2.JPG">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-details">
                                        <h4>Joan</h4>
                                        <p>
                                            Were for good. Seed i created appear, seas first and fruitful them life, 
                                            moved created first beginning fly. Was gathered whales whales our seasons 
                                            blessed them.
                                        </p>

                                        <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-img">
                                        <img alt="teacher image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/China_2.JPG">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-details">
                                        <h4>Rebecca</h4>
                                        
                                        <p>
                                            Were for good. Seed i created appear, seas first and fruitful them life, 
                                            moved created first beginning fly. Was gathered whales whales our seasons 
                                            blessed them.
                                        </p>

                                        <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-img">
                                        <img alt="teacher image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/kate.png">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-details">
                                        <h4>Kate</h4>
                                        <p>
                                            Were for good. Seed i created appear, seas first and fruitful them life, 
                                            moved created first beginning fly. Was gathered whales whales our seasons 
                                            blessed them.
                                        </p>

                                        <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-img">
                                        <img alt="teacher image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Rechel_2.JPG">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-details">
                                        <h4>Rechel</h4>
                                        
                                        <p>
                                            Were for good. Seed i created appear, seas first and fruitful them life, 
                                            moved created first beginning fly. Was gathered whales whales our seasons 
                                            blessed them.
                                        </p>

                                        <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-img">
                                        <img alt="teacher image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Straw_2.JPG">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-details">
                                        <h4>Strawberry</h4>
                                        
                                        <p>
                                            Were for good. Seed i created appear, seas first and fruitful them life, 
                                            moved created first beginning fly. Was gathered whales whales our seasons 
                                            blessed them.
                                        </p>

                                        <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>

                  <div class="col-md-2">
                    <div class="slide-indicator">
                      
                        <ol class="carousel-indicators">
                          <li data-target="#teacher-carousel" data-slide-to="0" class="active">
                              <div class="carousel-nav-img">
                                  
                                  <img alt="Navigation Image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Joan_2.JPG">
                              </div>
                          </li>
                          <li data-target="#teacher-carousel" data-slide-to="1" class="">
                              <div class="carousel-nav-img">
                                  
                                  <img alt="Navigation Image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/China_2.JPG">
                              </div>
                          </li>
                          <li data-target="#teacher-carousel" data-slide-to="2" class="">
                              <div class="carousel-nav-img">
                                  
                                  <img alt="Navigation Image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/kate.png">
                              </div>
                          </li>
                          <li data-target="#teacher-carousel" data-slide-to="3" class="">
                              <div class="carousel-nav-img">
                                  
                                  <img alt="Navigation Image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Rechel_2.JPG">
                              </div>
                          </li>
                          <li data-target="#teacher-carousel" data-slide-to="4" class="">
                              <div class="carousel-nav-img">
                                  
                                  <img alt="Navigation Image" src="{{ url('Elearn/Elearn/assets')}}/img/Teachers/teach/Straw_2.JPG">
                              </div>
                          </li>
                      </ol>
                    </div>
                  </div>
              </div>

            </div>
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
