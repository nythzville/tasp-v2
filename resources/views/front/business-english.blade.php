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
<body class="landing-page courses">


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
            <!-- <a class="navbar-brand" href="#">
              <div class="logo">
                      <img src="{{ url('Elearn/Elearn/assets')}}/img/logo.png" width="160" height="90">
                  </div>
            </a> -->
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

    <style type="text/css">

      .courses .main-raised {
          margin: -60px 0px 0px;
      }

      .asides {
          padding-top: 60px;
      }

      div.asides div.aside {
          
          margin: 0;
          /*padding: 0 15px;*/
          background: transparent;
          -webkit-box-shadow: none;
          box-shadow: none;
      }

      .shop-item:hover > .card > .card-image, .aside:hover > .card > .card-image {
          -webkit-box-shadow: 0 15px 35px -15px rgba(0, 0, 0, 0.5), 0 5px 25px 0 rgba(0, 0, 0, 0.12), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
          box-shadow: 0 15px 35px -15px rgba(0, 0, 0, 0.5), 0 5px 25px 0 rgba(0, 0, 0, 0.12), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
          -webkit-transform: translate(0, -10px);
          -ms-transform: translate(0, -10px);
          transform: translate(0, -10px);
      }

      .courses .main-raised .course-text{
          padding: 60px 45px;
      }

      .card .card-image img {
          float: none; 
          width: 100%;
          height: 100%;
          margin: 0 !important;
          border-radius: 6px;
      }

      .asides .category a {
        color: #000;
      }
      .asides .category a:hover {
        color: #ff6d04;
      }

      .card-product .card-title, .card-product .card-description {
          text-align: left;
      }

      .card-product .card-title a:hover{
          color: #ff6d04;
      }

      .landing-page.courses .header {
          height: 90vh;
      }

      .landing-page.courses .header .container {
          padding-top: 60vh;
          color: #FFFFFF;
      }

      .landing-page.courses .header .container p {
          font-size: 16px;
          font-weight: 600;
      }

      .main.main-raised .course-text p {
          font-size: 16px;
          padding-bottom: 15px;
      }
    </style>


    <div class="wrapper contact-page-banner">
      <div class="header header-filter parallax-section" style="background-image: url('{{ url('Elearn/Elearn/assets')}}/img/english-course/bus-eng.jpg');">
          <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="title" style="color:#ff6d04;">BUSINESS ENGLISH</h1>
                  <p>“Let’s make your working life in an international company effortless.”</p>
                </div>
              </div>
          </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-md-9">
        <div class="main main-raised">
          <!-- <div class="container"> -->
            <div class="row">
              <div class="col-md-12">

                <div class="course-text">
                  <p>Do you have a foreigner boss, clients, or colleagues? Will you be working abroad? Do you want to expand and export your business globally? Then you need Business English and EasyA can help you to learn it easily.</p>

                  <h3>Who should take this course?</h3>  
                  <hr>
                  <p>This specialized course is ideal for all business professionals who want to increase their familiarity and command of the Business English – from the English communication skills that they can use in the workplace, preparation and practice of the typical business communication methods (such as handling business meetings, presentations, and business letters and emails) and topics and vocabulary that they can use in human resource management, sales, marketing, accounting and other important aspects of business. </p>

                  <h3>What you will learn?</h3>
                  <hr>
                  <p>In this course, you will learn the essential skills to effectively communicate in a professional environment.  You will improve your presentation and writing skills as well as expand your professional vocabulary to participate efficiently in meetings. You will be able to acquire knowledge on how to manage negotiations and support arguments in the context of Business English. More importantly, we will help you attain a greater degree of confidence in discussing any business-related topics. </p>

                  <p>Contact us now and we guarantee that learning with EasyA is worth it.</p>

                </div>
                 
                
               
                          
              </div>
            </div>
          <!-- </div> -->
        </div>
      </div>

      <div class="col-md-3">
        
          <div class="asides">
            <div class="aside">
                <div class="card card-product">
                    <div class="card-image">
                        <a href="#" > <img src="{{ url('Elearn/Elearn/assets')}}/img/english-course/tst.jpg" class="attachment-hestia-shop size-hestia-shop wp-post-image" alt=""> </a>
                        <div class="ripple-container"></div>
                    </div>
                    <div class="content">
                        <h6 class="category">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            TAKE A FREE TRIAL CLASS
                          </button><!-- <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">TAKE A FREE TRIAL CLASS</a> --></h6>
                        <h4 class="card-title"> <a class="shop-item-title-link" href="#">KIDS ENGLISH</a></h4>
                        <h4 class="card-title"> <a class="shop-item-title-link" href="#">EVERYDAY ENGLISH</a></h4>
                        <h4 class="card-title"> <a class="shop-item-title-link" href="#">BUSINESS ENGLISH</a></h4>
                        <h4 class="card-title"> <a class="shop-item-title-link" href="#">ENGLISH TEST</a></h4>
                        <hr>
                        <div class="card-description">
                            <p>Take a 30-minute free trial class with us so that we can assess your English Level and show you how the lessons work!</p>
                        </div>
                        <!-- <div class="footer">
                            <div class="price">
                                <h4><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>119.00</span></h4></div>
                            <div class="stats"> <a rel="nofollow" href="/hestia/shop/?add-to-cart=224" data-quantity="1" data-product_id="224" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart btn btn-just-icon btn-simple btn-default" title="Add to cart"><i rel="tooltip" data-original-title="Add to cart" class="fa fa-cart-plus"></i></a></div>
                        </div> -->
                    </div>
                </div>
            </div>

          </div>
      </div>
          
        </div>
      </div>

      

      

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
