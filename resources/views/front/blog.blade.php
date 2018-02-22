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
<body class="landing-page blog">


<style type="text/css">
  /*--------------------------------------------------------------
  # Blog
  --------------------------------------------------------------*/
 
  /*--------------------------------------------------------------
  ## Content
  --------------------------------------------------------------*/
  .search-no-results .search-form, .error404 .search-form {
    margin-top: 40px;
  }

  #authors-on-blog {
    padding: 80px 0;
  }
  #authors-on-blog .card-profile {
    text-align: left;
  }
  #authors-on-blog .col-md-6:nth-child(2n+1) {
    clear: both;
  }

  .blog-post.blog-post-wrapper .section-text h1 {
    font-size: 63.84px;
    line-height: 73.416px;
  }
  .blog-post.blog-post-wrapper .section-text h2 {
    font-size: 43.68px;
    line-height: 65.52px;
  }
  .blog-post.blog-post-wrapper .section-text h3 {
    font-size: 30.66px;
    line-height: 42.924px;
  }
  .blog-post.blog-post-wrapper .section-text h4 {
    font-size: 31.62px;
    line-height: 49.011px;
  }
  .blog-post.blog-post-wrapper .section-text h5 {
    font-size: 21px;
    line-height: 32.55px;
  }
  .blog-post.blog-post-wrapper .section-text h6 {
    font-size: 15.12px;
    line-height: 22.68px;
  }

  .blog-post {
    word-wrap: break-word;
    line-height: 25.2px;
  }
  .blog-post .section-text {
    padding-bottom: 0;
    font-size: 16.8px;
  }
  .blog-post .section-text p {
    margin-bottom: 30px;
  }
  .blog-post .section-blog-info {
    padding-top: 15px;
  }
  .blog-post .section-blog-info .entry-categories, .blog-post .section-blog-info .entry-tags {
    word-break: break-all;
  }
  .blog-post .section-blog-info .entry-categories span, .blog-post .section-blog-info .entry-tags span {
    display: inline-block;
    margin: 5px;
  }
  .blog-post .section-blog-info .entry-categories a {
    display: inline-block;
    padding: 2px 2px;
    color: #fff;
  }
  .blog-post .section-blog-info .card-profile {
    margin-top: 0;
    text-align: left;
  }
  .blog-post .section-blog-info .card-profile .description {
    font-size: 14px;
  }

  dl dd, pre {
    margin-bottom: 30px;
  }

  .alignleft .avatar {
    margin-right: 24px;
  }

  .alignright .avatar {
    margin-left: 24px;
  }

  article.sticky h2:before {
    content: "Featured: ";
  }

  img.centered, .aligncenter {
    display: block;
    margin: 0 auto 24px;
  }

  img.alignnone {
    margin-bottom: 12px;
  }

  .alignleft {
    float: left;
    text-align: left;
  }

  .alignright {
    float: right;
    text-align: right;
  }

  img.alignleft, .wp-caption.alignleft {
    margin: 0 24px 24px 0;
    margin: 0 2.4rem 2.4rem 0;
  }

  img.alignright, .wp-caption.alignright {
    margin: 0 0 24px 24px;
  }

  .wp-caption-text {
    padding-top: 10px;
    font-size: 14px;
    font-weight: 700;
    text-align: center;
  }

  .gallery-caption {
    padding-top: 10px;
  }

  .bypostauthor {
    display: block;
  }

  /*--------------------------------------------------------------
  ## Comments
  --------------------------------------------------------------*/
  .media .avatar, .media-body .avatar, .media-area .avatar {
    overflow: hidden;
    width: 64px;
    height: 64px;
    margin: 0 auto;
    margin-right: 15px;
    border-radius: 50%;
    -webkit-box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);
    box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);
  }

  .media-area .hestia-title,
  .comment-respond .hestia-title {
    margin-bottom: 30px;
  }

  .comment .pull-left {
    padding-right: 10px;
  }

  .media-body div.avatar {
    margin: 0 10px;
  }

  .media {
    overflow: visible;
  }
  .media .avatar img {
    width: 100%;
  }
  .media .media-heading {
    margin-top: 0;
    font-size: 18.2px;
    margin-bottom: 10px;
  }
  .media .media-heading small {
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
  }
  .media .media-body {
    padding-right: 10px;
  }
  .media .media-body .media .media-body {
    padding-right: 0;
  }
  .media .media-footer .btn {
    margin-bottom: 20px;
  }
  .media .media-footer:after {
    display: table;
    clear: both;
    content: " ";
  }
  .media p {
    color: #999999;
    font-size: 16px;
    line-height: 25.6px;
  }

  #comments .comment-notes {
    display: none;
  }

  .section-comments ul.children .comment-author.avatar, .section-comments ul.children .avatar img {
    width: 40px;
    height: 40px;
  }

  .blog-post .media p {
    color: #555;
  }
  .blog-post .section-comments .title {
    margin-bottom: 30px;
  }
  .blog-post .section-comments .comment-respond .author {
    margin: 15px 20px 0 0;
  }
  .blog-post .section-comments .comment-respond .author img {
    border-radius: 100%;
  }
  .blog-post .comment-reply-link {
    font-size: 12px;
    font-weight: 400;
    text-transform: uppercase;
    float: right;
  }

  label.subscribe-label {
    font-weight: 300;
  }

  .media-body {
    width: 10000px;
    display: table-cell;
    overflow: visible;
  }

  .blog .card .card-image {
    overflow: hidden;
    position: relative;
    height: 60%;
     margin-top: -30px; 
    margin-right: 15px;
    margin-left: 15px;
    border-radius: 6px;
    -webkit-transition: all 300ms cubic-bezier(0.34,1.61,.7,1);
    transition: all 300ms cubic-bezier(0.34,1.61,.7,1);
    -webkit-transform: translate(0,0);
    -ms-transform: translate(0,0);
    transform: translate(0,0);
}

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
                <li class="btn btn-primary btn-main-nav"><a href="http://ea-english.com/login">LOGIN</a></li>

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
                  <h1 class="title" style="color:#ff6d04;">Our Blog</h1>
                            
                </div>
              </div>
          </div>
      </div>


      <div class="main main-raised">
        <div class="container">
            

          <div class="col-md-10 col-md-offset-1 blog-posts-wrap">

            <article class="card card-raised card-plain card-blog sticky">
              <div class="row">
                <div class="col-ms-5 col-sm-5">
                  <div class="card-image card-raised">
                    <a href="#" title="Perfectly on furniture"> 
                      <img width="360" height="240" src="https://demot-vertigostudio.netdna-ssl.com/hestia-pro/wp-content/uploads/sites/92/2016/10/card-blog4-360x240.jpg" class="attachment-hestia-blog size-hestia-blog wp-post-image" alt="Perfectly on furniture" ">
                    </a>
                  </div>
                </div>

                <div class="col-ms-7 col-sm-7">
                    <h2 class="card-title entry-title">
                      <a href="#" >Perfectly on furniture</a></h2>
                      <div class="card-description">
                        <p> Feet evil to hold long he open knew an no. Apartments occasional boisterous as solicitude to introduced. Or fifteen covered we enjoyed demesne is in prepare. In stimulated my everything it literature. Greatly explain attempt
                          <a class="moretag" href="#"> Read more…</a>
                        </p>
                      </div>
                      <div class="author "> By: 
                        <a href="#" class="vcard author"><strong class="fn">MAKENA</strong></a>
                      </div>
                </div>
            </article>

            <article class="card  card-plain card-blog sticky">
              <div class="row">
                <div class="col-ms-5 col-sm-5">
                  <div class="card-image card-raised">
                    <a href="#" title="Perfectly on furniture"> 
                      <img width="360" height="240" src="https://demot-vertigostudio.netdna-ssl.com/hestia-pro/wp-content/uploads/sites/92/2016/09/bg5-360x240.jpg" class="attachment-hestia-blog size-hestia-blog wp-post-image" alt="Perfectly on furniture" ">
                    </a>
                  </div>
                </div>

                <div class="col-ms-7 col-sm-7">
                    <h2 class="card-title entry-title">
                      <a href="#" >Perfectly on furniture</a></h2>
                      <div class="card-description">
                        <p> Feet evil to hold long he open knew an no. Apartments occasional boisterous as solicitude to introduced. Or fifteen covered we enjoyed demesne is in prepare. In stimulated my everything it literature. Greatly explain attempt
                          <a class="moretag" href="#"> Read more…</a>
                        </p>
                      </div>
                      <div class="author "> By: 
                        <a href="#" class="vcard author"><strong class="fn">MAKENA</strong></a>
                      </div>
                </div>
            </article>

            <article class="card  card-plain card-blog sticky">
              <div class="row">
                <div class="col-ms-5 col-sm-5">
                  <div class="card-image card-raised">
                    <a href="#" title="Perfectly on furniture"> 
                      <img width="360" height="240" src="https://demot-vertigostudio.netdna-ssl.com/hestia-pro/wp-content/uploads/sites/92/2016/10/blog5-360x240.jpg" class="attachment-hestia-blog size-hestia-blog wp-post-image" alt="Perfectly on furniture" ">
                    </a>
                  </div>
                </div>

                <div class="col-ms-7 col-sm-7">
                    <h2 class="card-title entry-title">
                      <a href="#" >Perfectly on furniture</a></h2>
                      <div class="card-description">
                        <p> Feet evil to hold long he open knew an no. Apartments occasional boisterous as solicitude to introduced. Or fifteen covered we enjoyed demesne is in prepare. In stimulated my everything it literature. Greatly explain attempt
                          <a class="moretag" href="#"> Read more…</a>
                        </p>
                      </div>
                      <div class="author "> By: 
                        <a href="#" class="vcard author"><strong class="fn">MAKENA</strong></a>
                      </div>
                </div>
            </article>
            
          </div>

              
          <br>
          <hr>
          <br>

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
                  &copy; 2017, made with <i class="fa fa-heart heart"></i> by KENAMA
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
