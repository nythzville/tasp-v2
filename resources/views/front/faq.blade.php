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
<body class="landing-page faq">
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
                  <h1 class="title" style="color:#ff6d04;">FREQUENTLY ASKED QUESTIONS</h1>
                            
                </div>
              </div>
          </div>
      </div>


      <div class="main main-raised">
        <div class="container">
          <div class="row">
            <h1 class="easya-title text-center">What can we help you with?</h1>
            <br>
            <br>
            <div class="col-xs-12 col-ms-10 col-sm-8 col-md-4 faq-item">
              <h2 class="easya-title title-h2">WHAT IS EASYA ONLINE?</h2>
            </div>
            <br>
            <div class="col-xs-12 col-ms-10 col-sm-8 col-md-4 faq-item">
                <div class="card card-background card-raised" style="background-image: url('http://mediakey1.ef.com/sitecore/__~/media/centralefcom/corporate/2017/online-school/Step3_TB_4144_retouch.jpg')">
                  <div class="content"> 
                    <span class="label label-primary">Live Class</span>
                    <h4 class="card-title">Individual or Group Class</h4>
                  </div>
                </div>
            </div>

            <div class="col-xs-12 col-ms-10 col-sm-8 col-md-4 faq-item">
                <div class="card card-background card-raised" style="background-image: url('https://demot-vertigostudio.netdna-ssl.com/hestia-pro/wp-content/uploads/sites/92/2016/10/blog3-360x240.jpg')">
                  <div class="content"> 
                    <span class="label label-primary">Online Booking System</span>
                    <h4 class="card-title">Real-time Booking System for Maximum Flexibility</h4>
                  </div>
                </div>
            </div>

            <div class="col-xs-12 col-ms-10 col-sm-8 col-md-4 faq-item">
                <div class="card card-background card-raised" style="background-image: url('{{ url('Elearn/Elearn/assets')}}/img/Teachers/group.png')">
                  <div class="content"> 
                    <span class="label label-primary">Hand-Picked Tutors</span>
                    <h4 class="card-title">Trained and Skilled</h4>
                  </div>
                </div>
            </div>

            <div class="col-xs-12 col-ms-10 col-sm-8 col-md-4 faq-item">
                <div class="card card-background card-raised" style="background-image: url('https://cdn.lynda.com/courses/144198-636356275983784678_270x480_thumb.jpg"')">
                  <div class="content"> 
                    <span class="label label-primary">Interactive Lessons</span>
                    <h4 class="card-title">Engaging and Productive</h4>
                  </div>
                </div>
            </div>

            <div class="col-xs-12 col-ms-10 col-sm-8 col-md-4 faq-item">
                <div class="card card-background card-raised" style="background-image: url('https://cdn.lynda.com/course/373553/373553-636125469315480526-16x9.jpg')">
                  <div class="content"> 
                    <span class="label label-primary">Comprehensive Progress Report</span>
                    <h4 class="card-title">Detailed Progress Report after 20 th Class</h4>
                  </div>
                </div>
            </div>

            <br>
            <br>
            <hr>
            <br>
            <br>

            <div class="steps">
              <h2 class="easya-title title-h2">EASYA ONLINE Step by Step Guide</h2>
              <div class="card card-nav-tabs">
                <div class="header header-easya">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#trial-class" data-toggle="tab" aria-expanded="false">
                                        <!-- <i class="material-icons">face</i> --> TRIAL CLASS
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#how-to-start" data-toggle="tab" aria-expanded="false">
                                        <!-- <i class="material-icons">chat</i> --> HOW TO START
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#classes" data-toggle="tab" aria-expanded="true">
                                        <!-- <i class="material-icons">build</i>  -->CLASSES
                                        <div class="ripple-container"></div>
                                    </a>

                                </li>
                                <li class="">
                                    <a href="#booking" data-toggle="tab" aria-expanded="true">
                                        <!-- <i class="material-icons">build</i>  -->BOOKING &amp; CANCELLATION
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#payment" data-toggle="tab" aria-expanded="true">
                                        <!-- <i class="material-icons">build</i>  -->PAYMENT
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#technicals" data-toggle="tab" aria-expanded="true">
                                        <!-- <i class="material-icons">build</i>  -->TECHNICAL
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="tab-content ">
                        <div class="tab-pane active" id="trial-class">
                            <h2 class="easya-title title-h2">TRIAL CLASS</h2>

                            <div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-title expand">
                                     <div class="right-arrow pull-right">+</div>
                                    <a href="#">Do I need to take a trial class?</a>
                                  </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                  <div class="panel-body">The trial class is a great opportunity to see if our learning methods are convenient for you. Yes. Your trial class will serve as the basis of your Progress Report (if you decide to enroll in EASYA later on). You may have some questions or concerns you’d like to be answered, you may ask your tutor after the lesson.</div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="panel-title expand">
                                      <div class="right-arrow pull-right">+</div>
                                    <a href="#">What should I expect during a trial class?</a>
                                  </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                  <div class="panel-body">During the trial class, you will have a preview of what you can expect when you decide to enroll in EASYA. Your tutor will assess your English Level and recommend what is the best program to suit your needs. But if you want a specific course, then you can ask anything you want regarding the course you want to take.</div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="panel-title expand">
                                      <div class="right-arrow pull-right">+</div>
                                    <a href="#">How long does a trial class take?</a>
                                  </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                  <div class="panel-body">Trial class will be 25 minutes long. <br>
                                    15 minutes for the lesson <br>
                                    10 minutes for enquiries</div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="panel-title expand">
                                      <div class="right-arrow pull-right">+</div>
                                    <a href="#"> What do I need to take the trial class?</a>
                                  </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                  <div class="panel-body">Computer (Desktop, Laptop or Tablet) Or Mobile Phone (can support video calling application) <br>
                                    Internet Connection <br>
                                    Skype or QQ Messenger</div>
                                </div>
                              </div>
                            </div> 
                           
                            
                        </div>
                        <div class="tab-pane" id="how-to-start">
                            <h2 class="easya-title title-h2">How much English do I need to know to take a trial class?</h2>
                            <p>Whether you can only speak 3 – 5 English words or already a fluent speaker, you are welcome to take the class free with commitment.</p>

                            <div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1Schedule" class="panel-title expand">
                                     <div class="right-arrow pull-right">+</div>
                                    <a href="#">1. Schedule Your Free Trial Class</a>
                                  </h4>
                                </div>
                                <div id="collapse1Schedule" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    <button class="btn btn-primary btn-raised btn-lg" data-toggle="modal" data-target="#myModal">
                                      TRIAL CLASS APPLICATION FORM
                                    </button>
                                    <p>After submitting your request, you will receive email with the contact information of your trial class tutor.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse2take" class="panel-title expand">
                                      <div class="right-arrow pull-right">+</div>
                                    <a href="#">2. Take The Trial Class</a>
                                  </h4>
                                </div>
                                <div id="collapse2take" class="panel-collapse collapse">
                                  <div class="panel-body"><p><strong>Important:</strong> <br>
                                  Please be online 5 minutes before the class and kindly accept your tutor’s contact request in Skype or QQ Messenger.</p>

                                    <p>During the class, your tutor will assess your English Level and recommend what is the best program for you. But if you want a specific course, then you can ask anything you want regarding the course you want to take.</p></div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse3decide" class="panel-title expand">
                                      <div class="right-arrow pull-right">+</div>
                                    <a href="#">3. Decide</a>
                                  </h4>
                                </div>
                                <div id="collapse3decide" class="panel-collapse collapse">
                                  <div class="panel-body"><p>After the trial class, you will receive an email with the Price and Payment details about the course you want to take. Please feel free to ask if you need any further information or assistance.</p></div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse4Enroll" class="panel-title expand">
                                      <div class="right-arrow pull-right">+</div>
                                    <a href="#"> 4. Enroll</a>
                                  </h4>
                                </div>
                                <div id="collapse4Enroll" class="panel-collapse collapse">
                                  <div class="panel-body"><p>After completing your payment at EasyA Online, only then the administration will register you as a student. You will receive a unique username and password for logging in the system. Your log in information will be sent through email.</p></div>
                                </div>
                              </div>
                            </div>
                            <br>
                            <p>
                              For further questions, contact us at: <br>
                              Email: <br>
                              Skype: <br>
                              QQ Messenger:
                            </p>
                        </div>
                        <div class="tab-pane " id="classes">
                            <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                        </div>
                        <div class="tab-pane" id="booking">
                            <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                        </div>
                        <div class="tab-pane" id="payment">
                            <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                        </div>
                        <div class="tab-pane" id="technicals">
                            <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                        </div>
                    </div>
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
  
  <script type="text/javascript">
    $(function() {
      $(".expand").on( "click", function() {
        // $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");
        
        if($expand.text() == "+") {
          $expand.text("-");
        } else {
          $expand.text("+");
        }
      });
    });
  </script>
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
