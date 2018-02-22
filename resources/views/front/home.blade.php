<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ url('Elearn/Elearn/assets')}}/img/apple-icon.png">
	<link rel="icon" type="image/png" href="{{ url('Elearn/Elearn/assets')}}/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Easy A | Home </title>

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
<body id="landing-page" class="landing-page home">
	
    <nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
    <div class="border-top"></div>
    <div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-8">
					<div class="topbar-left">
						<p>Contact Us &nbsp; | &nbsp;+63 998 7654 321</p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-4">
					
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
  <!-- <ul class="nav"> 
  <li class="drop">English
    <ul id="language-list">
<li><a href="#" data-value="">English (US)</a></li>
<li><a href="#" data-value="">한국어</a></li>
<li><a href="#" data-value="">日本語</a></li>
<li><a href="#" data-value="">Tiếng Việt</a></li>
<li><a href="#" data-value="">中文(台灣)</a></li>   
<li><a href="#" data-value="">中文(简体)</a></li>       
      
    </ul>
  </li>
</ul> -->
</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main-nav">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-ea">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		
        		<a class="navbar-brand navbar-logo" href="{{ url('/') }}">
        			<img class="img-responsive" src="{{ url('Elearn/Elearn/assets')}}/img/logo.png">
        		</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-ea">
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
                <li class="btn btn-primary btn-main-nav"><a href="http://ea-english.com/login">LOGIN</a></li>

              </ul>

        	</div>
    	</div>
    </div>
    </nav>
	<div class="wrapper">
        <div class="header header-filter parallax-section" style="background-image: url('{{ url('Elearn/Elearn/assets')}}/img/banner-bg.jpg');">
            <div class="container">
                <div class="row">
					<div class="col-md-7">
						<h1 class="title">Learning english is easy in EASY A.</h1>
	                    <h4>Take a 30-minute free trial class with us so that we can assess your english level and show you how the lessons work!</h4>
	                    <br />
	                    <button class="btn btn-primary btn-raised btn-lg" data-toggle="modal" data-target="#myModal">
						  Take a free trial class
						</button>
	                    
					</div>
                </div>
            </div>
        </div>


		<div class="container">

        	<div class="section text-center">
        		<div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="heading_group text-center">
			              <h2>EASYA ENGLISH</h2>
			              <span class="subtitle">Build a learning relationship</span> 
			            </div>

                        <p class="description">We have the latest virtual classroom software, e-learning materials, and equipment needed ready to teach you English that you cannot normally find even in actual English learning and review schools. Try us and be amazed with how we can teach you through ways you cannot imagine.</p>
                    </div>
                </div>

				<div class="team">
					<div class="row">
						<div class="col-md-6" >
						    <div class="card card-profile card-plain">
						        <a href="{{ url('/kids-english') }}">
						    	<div class="card-image">
						    	<img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/english-course/kid.jpg" >
						    	</div>
						    	</a>

						    	<div class="content text-center">
						                <a href="{{ url('/kids-english') }}"><h4 class="card-title"> Kids English</h4></a>
						                <p class="card-description">Improve your kid’s fluency in General English through conversation lessons, going through personalized topics according to your kid’s level and needs. </p>
						               
						        </div>
						    </div>
						</div>

						<div class="col-md-6" style="">
						    <div class="card card-profile card-plain">
						    	
						    	<a href="{{ url('/everyday-english') }}">
						    	<div class="card-image">
						    		<img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/english-course/everyday.jpg" >
						    	</div>
						    	</a>

						    	<div class="content text-center">
					                <a href="{{ url('/everyday-english') }}"><h4 class="card-title"> Everyday English</h4></a>
					                <p class="card-description">Our personalized learning solution is perfect for people who want to speak English just like it’s their first language. You will feel more confident about having regular conversations in English after going through our program.</p>
						        </div>
						        
						    </div>
						</div>

						<div class="col-md-6" style="">
						    <div class="card card-profile card-plain">
                                <a href="{{ url('/business-english') }}">
						    	<div class="card-image">
						    		<img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/english-course/bus-eng.jpg" >
						    	</div>
						    	</a>
						        
					            <div class="content text-center">
					                <a href="{{ url('/business-english') }}"><h4 class="card-title"> Business English</h4></a>
					                <p class="card-description">EasyA Online English Tutorial Center has a wide array of Business English topics to enhance your knowledge of the corporate world and boost your confidence in different fields of business, like Marketing and Human Resource Management.</p>
					               
					            </div>
						        
						    </div>
						</div>

						<div class="col-md-6" style="">
						    <div class="card card-profile card-plain">
						        <a href="{{ url('/english-test') }}">
						        <div class="card-image"> <img class="img" src="{{ url('Elearn/Elearn/assets')}}/img/english-course/tst.jpg" ></div></a>

						        <div class="content text-center">
					                <a href="{{ url('/english-test') }}"><h4 class="card-title"> English Test</h4></a>
					                <p class="card-description">Have you been struggling to attain that elusive target score in IELTS or TOEFL? Or are you nervous about the first time that you will take IELTS or TOEFL? Either way, our teachers can match your specific needs.</p>
					               
					            </div>
						        
						    </div>
						</div>
						
					</div>
				</div>
            </div>

        </div><!-- container -->
	</div><!-- wrapper -->

	<section class="teacher-section parallax-section" id="teacher-section">
		
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="title-area">
                        <div class="title-icon">
                            <i class="fa fa-address-card-o"></i>
                        </div>
                        <h4 class="section-subtitle wow fadeInUp animated animated" data-wow-duration="600ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 600ms; animation-delay: 300ms; animation-name: fadeInUp;">Our featured teachers</h4>
                       
                    </div>
                </div>
            </div>
        </div>

        <div id="teacher-carousel" class="carousel slide" data-ride="carousel">
            <div class="container">
                <div class="row">
                	
                	<div class="col-md-10">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                            @foreach($teachers as $teacher)
                            <!-- Teacher -->
                            <div class="item {{ ($teacher->rank == 1)? 'active': '' }}">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-img">
                                        <img alt="teacher image" src="{{ url($teacher->getUser->user_image ) }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="teacher-details">
                                        <h4>{{ $teacher->firstname }} </h4>
                                        <p>
                                            @if($teacher->desc != "")
                                                {{ $teacher->desc }}
                                            @else

                                                Were for good. Seed i created appear, seas first and fruitful them life, 
                                                moved created first beginning fly. Was gathered whales whales our seasons 
                                                blessed them.
                                            @endif
                                        </p>

                                        <audio controls>
                                              <source src="{{ url('/recordings/'.$teacher->teacher_id.'-'.strtolower($teacher->firstname).'-recording.mp3') }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <!-- /Teacher -->
                            @endforeach

                            <!-- <div class="item active">
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
                            </div> -->
                        </div>
                    </div>

                    <div class="col-md-2">
                		<div class="slide-indicator">
                			
                    		<ol class="carousel-indicators">
                                @foreach($teachers as $teacher)
    			                    <li data-target="#teacher-carousel" data-slide-to="{{ (intval($teacher->rank) - 1) }}" class="{{ ($teacher->rank == 1)? 'active': '' }}">
    			                        <div class="carousel-nav-img">
    			                            
    			                            <img alt="Navigation Image" src="{{ url($teacher->getUser->user_image ) }}">
    			                        </div>
    			                    </li>
                                @endforeach
<!-- 
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
			                    </li> -->
			                </ol>
                		</div>
                	</div>

                </div>
            </div>
            <!-- Indicators -->
        </div>

    </section>

    <section class="app-download-section parallax-section" style="background-image: url('{{ url('Elearn/Elearn/assets')}}/img/banner-bg.jpg');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 nopad">
                    <div class="app-download-content text-center">
                        <h3>Take a 30-minute free trial class  with us so that we can assess your english level and show you how the lessons work!</h3>

                        <!-- Button trigger modal -->
						<button class="btn btn-white" data-toggle="modal" data-target="#myModal">
						  take a free TRIAL CLASS
						</button>
                       
                    </div>
                </div>
               
            </div>
        </div>
    </section>
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
					<h4 class="text-center description">We will get back to you as soon as possible.</h4>
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

    <!-- Google Translate -->

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
