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
<body class="landing-page">
  
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
                  <h1 class="title" style="color:#ff6d04;">Contact Us</h1>
                            
                </div>
              </div>
          </div>
      </div>


      <!-- <div class="container"> -->
      <style type="text/css">
                          
                  /* CONTACT */
                  #map {
                    height: 100%;
                  }




                  /* Container */
                  .contacts-container {
                      position: absolute;
                      right: 0;
                      top: 50%;
                      transform: translate(-20%,-50%);
                      max-width: 460px;
                      width: 100%;
                  }
                  .contacts-container.active .card:first-child {
                    background: #f2f2f2;
                    margin: 0 15px;
                  }
                  .contacts-container.active .card:nth-child(2) {
                    background: #fafafa;
                    margin: 0 10px;
                  }
                  .contacts-container.active .card.alt {
                    top: 20px;
                    right: 0;
                    width: 100%;
                    min-width: 100%;
                    height: auto;
                    border-radius: 5px;
                    padding: 30px 0 20px;
                    overflow: hidden;
                  }
                  .contacts-container.active .card.alt .toggle {
                    position: absolute;
                    top: 40px;
                    right: -70px;
                    box-shadow: none;
                    -webkit-transform: scale(20);
                    transform: scale(20);
                    -webkit-transition: -webkit-transform .3s ease;
                    transition: -webkit-transform .3s ease;
                    transition: transform .3s ease;
                    transition: transform .3s ease, -webkit-transform .3s ease;
                  }
                  .contacts-container.active .card.alt .toggle:before {
                    content: '';
                  }
                  .contacts-container.active .card.alt .title,
                  .contacts-container.active .card.alt .input-container,
                  .contacts-container.active .card.alt .button-container {
                    left: 0;
                    opacity: 1;
                    visibility: visible;
                    -webkit-transition: .3s ease;
                    transition: .3s ease;
                  }
                  .contacts-container.active .card.alt .title {
                    -webkit-transition-delay: .3s;
                            transition-delay: .3s;
                  }
                  .contacts-container.active .card.alt .input-container {
                    -webkit-transition-delay: .4s;
                            transition-delay: .4s;
                  }
                  .contacts-container.active .card.alt .input-container:nth-child(2) {
                    -webkit-transition-delay: .5s;
                            transition-delay: .5s;
                  }
                  .contacts-container.active .card.alt .input-container:nth-child(3) {
                    -webkit-transition-delay: .6s;
                            transition-delay: .6s;
                  }

                  .contacts-container.active .card.alt .input-container:nth-child(4) {
                    -webkit-transition-delay: .7s;
                            transition-delay: .7s;
                  }
                  .contacts-container.active .card.alt .input-container:nth-child(5) {
                    -webkit-transition-delay: .8s;
                            transition-delay: .8s;
                  }
                  .contacts-container.active .card.alt .button-container {
                    -webkit-transition-delay: .9s;
                            transition-delay: .9s;
                  }

                  /* Card */
                  .contacts-container .card {
                    position: relative;
                    background: #ffffff;
                    border-radius: 5px;
                    padding: 60px 0 40px 0;
                    box-sizing: border-box;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                    -webkit-transition: .3s ease;
                    transition: .3s ease;
                    /* Title */
                    /* Inputs */
                    /* Button */
                    /* Footer */
                    /* Alt Card */
                  }
                  .contacts-container .card:first-child {
                    background: #fafafa;
                    height: 0px;
                    border-radius: 5px 5px 0 0;
                    margin: 0 10px;
                    padding: 0;
                  }
                  .contacts-container .card .title {
                    position: relative;
                    z-index: 1;
                    border-left: 5px solid #ff9905;
                    margin: 0 0 20px;
                    line-height: 24px;
                    padding: 10px 0 10px 50px;
                    color: #ff9905;
                    font-size: 32px;
                    font-weight: 600;
                    text-transform: uppercase;
                    font-family: Zilla Slab;
                  }

                  .contacts-container .card .title span{
                    font-size: 14px;
                    text-transform: none;
                    line-height: 1em;
                    font-weight: 400;
                    font-family: Raleway;

                  }
                  .contacts-container .card .input-container, .card .contacts {
                    position: relative;
                    margin: 0 60px 20px;
                  }
                  .contacts-container .card .input-container input {
                    outline: none;
                    z-index: 1;
                    position: relative;
                    background: none;
                    width: 100%;
                    height: 45px;
                    border: 0;
                    color: #212121;
                    font-size: 24px;
                    font-weight: 400;
                  }
                  .contacts-container .card .input-container input:focus ~ label {
                    color: #9d9d9d;
                    -webkit-transform: translate(-12%, -50%) scale(0.75);
                            transform: translate(-12%, -50%) scale(0.75);
                  }
                  .contacts-container .card .input-container input:focus ~ .bar:before, .card .input-container input:focus ~ .bar:after {
                    width: 50%;
                  }
                  .contacts-container .card .input-container input:valid ~ label {
                    color: #9d9d9d;
                    -webkit-transform: translate(-12%, -50%) scale(0.75);
                            transform: translate(-12%, -50%) scale(0.75);
                  }
                  .contacts-container .card .input-container label {
                    position: absolute;
                    top: 0;
                    left: 0;
                    color: #757575;
                    font-size: 18px;
                    font-weight: 300;
                    line-height: 45px;
                    -webkit-transition: 0.2s ease;
                    transition: 0.2s ease;
                  }
                  .contacts-container .card .input-container .bar {
                    position: absolute;
                    left: 0;
                    bottom: 0;
                    background: #757575;
                    width: 100%;
                    height: 1px;
                  }
                  .contacts-container .card .input-container .bar:before, .contacts-container .card .input-container .bar:after {
                    content: '';
                    position: absolute;
                    background: #ff9905;
                    width: 0;
                    height: 2px;
                    -webkit-transition: .2s ease;
                    transition: .2s ease;
                  }
                  .contacts-container .card .input-container .bar:before {
                    left: 50%;
                  }
                  .contacts-container .card .input-container .bar:after {
                    right: 50%;
                  }
                  .contacts-container .card .button-container {
                    margin: 0 60px;
                    text-align: center;
                  }
                  .contacts-container .card .button-container button {
                    outline: 0;
                    cursor: pointer;
                    position: relative;
                    display: inline-block;
                    background: 0;
                    width: 240px;
                    border: 2px solid #e3e3e3;
                    padding: 15px 0;
                    font-size: 24px;
                    font-weight: 600;
                    line-height: 1;
                    text-transform: uppercase;
                    overflow: hidden;
                    -webkit-transition: .3s ease;
                    transition: .3s ease;
                  }
                  .contacts-container .card .button-container button span {
                    position: relative;
                    z-index: 1;
                    color: #ddd;
                    -webkit-transition: .3s ease;
                    transition: .3s ease;
                  }
                  .contacts-container .card .button-container button:before {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    display: block;
                    background: #ff9905;
                    width: 30px;
                    height: 30px;
                    border-radius: 100%;
                    margin: -15px 0 0 -15px;
                    opacity: 0;
                    -webkit-transition: .3s ease;
                    transition: .3s ease;
                  }
                  .contacts-container .card .button-container button:hover, .contacts-container .card .button-container button:active, .contacts-container .card .button-container button:focus {
                    border-color: #ff9905;
                  }
                  .contacts-container .card .button-container button:hover span, .contacts-container .card .button-container button:active span, .contacts-container .card .button-container button:focus span {
                    color: #ff9905;
                  }
                  .contacts-container .card .button-container button:active span, .contacts-container .card .button-container button:focus span {
                    color: #ffffff;
                  }
                  .contacts-container .card .button-container button:active:before, .contacts-container .card .button-container button:focus:before {
                    opacity: 1;
                    -webkit-transform: scale(10);
                    transform: scale(10);
                  }
                  .contacts-container .card .footer {
                    margin: 40px 0 0;
                    color: #d3d3d3;
                    font-size: 24px;
                    font-weight: 300;
                    text-align: center;
                  }
                  .contacts-container .card .footer a {
                    color: inherit;
                    text-decoration: none;
                    -webkit-transition: .3s ease;
                    transition: .3s ease;
                  }
                  .contacts-container .card .footer a:hover {
                    color: #bababa;
                  }
                  .contacts-container .card.alt {
                    position: absolute;
                    top: 40px;
                    right: -45px;
                    z-index: 10;
                    width: 90px;
                    height: 90px;
                    background: none;
                    border-radius: 100%;
                    box-shadow: none;
                    padding: 0;
                    -webkit-transition: .3s ease;
                    transition: .3s ease;
                    /* Toggle */
                    /* Title */
                    /* Input */
                    /* Button */
                  }
                  .contacts-container .card.alt .toggle {
                    position: relative;
                      background: linear-gradient(45deg, #FFC107, 60%, #ff0000);
                      width: 90px;
                      height: 90px;
                      border-radius: 100%;
                      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                      color: #ffffff;
                      font-size: 45px;
                      line-height: 90px;
                      text-align: center;
                      cursor: pointer;
                  }
                  .contacts-container .card.alt .toggle:before {
                    content: '\f040';
                    display: inline-block;
                    font: normal normal normal 14px/1 FontAwesome;
                    font-size: inherit;
                    text-rendering: auto;
                    -webkit-font-smoothing: antialiased;
                    -moz-osx-font-smoothing: grayscale;
                    -webkit-transform: translate(0, 0);
                            transform: translate(0, 0);
                  }
                  .contacts-container .card.alt .title,
                  .contacts-container .card.alt .input-container,
                  .contacts-container .card.alt .button-container {
                    left: 0px;
                    opacity: 0;
                    visibility: hidden;
                    display: none;
                  }

                  .contacts-container.active .card.alt .title,
                  .contacts-container.active .card.alt .input-container,
                  .contacts-container.active .card.alt .button-container {
                    display: block;
                  }

                  .contacts-container .card.alt .title {
                    position: relative;
                    border-color: #ffffff;
                    color: #ffffff;
                  }
                  .contacts-container .card.alt .title .close {
                    cursor: pointer;
                    position: absolute;
                    top: 0;
                    right: 60px;
                    display: inline;
                    color: #ffffff;
                    font-size: 58px;
                    font-weight: 400;
                    line-height: 0.5;
                  }
                  .contacts-container .card.alt .title .close:before {
                    content: '\00d7';
                  }
                  .contacts-container .card.alt .input-container input {
                    color: #ffffff;
                  }
                  .contacts-container .card.alt .input-container input:focus ~ label {
                    color: #ffffff;
                  }
                  .contacts-container .card.alt .input-container input:focus ~ .bar:before, .contacts-container .card.alt .input-container input:focus ~ .bar:after {
                    background: #ffffff;
                  }
                  .contacts-container .card.alt .input-container input:valid ~ label {
                    color: #ffffff;
                  }
                  .contacts-container .card.alt .input-container label {
                    color: rgba(255, 255, 255, 0.8);
                  }
                  .contacts-container .card.alt .input-container .bar {
                    background: rgba(255, 255, 255, 0.8);
                  }
                  .contacts-container .card.alt .button-container button {
                    width: 100%;
                    background: #ffffff;
                    border-color: #ffffff;
                  }
                  .contacts-container .card.alt .button-container button span {
                    color: #ff9905;
                  }
                  .contacts-container .card.alt .button-container button:hover {
                    background: rgba(255, 255, 255, 0.9);
                  }
                  .contacts-container .card.alt .button-container button:active:before, .contacts-container .card.alt .button-container button:focus:before {
                    display: none;
                  }

                  /* Keyframes */
                  @-webkit-keyframes buttonFadeInUp {
                    0% {
                      bottom: 30px;
                      opacity: 0;
                    }
                  }
                  @keyframes buttonFadeInUp {
                    0% {
                      bottom: 30px;
                      opacity: 0;
                    }
                  }
      </style>
          

        
          <div class="container-fluid">
            <div class="row">


              <div class="col-md-12 nopad">
                <div class="contact-map" style="height: 100vh; background-color: #555;">
                  <div id="map"></div>
                    <script>
                      function initMap() {

                        // Create a new StyledMapType object, passing it an array of styles,
                        // and the name to be displayed on the map type control.
                        var styledMapType = new google.maps.StyledMapType(
                            [
                  {
                    elementType: 'geometry',
                    stylers: [{color: '#f5f5f5'}]
                  },
                  {
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                  },
                  {
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#f5f5f5'}]
                  },
                  {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#bdbdbd'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#ffffff'}]
                  },
                  {
                    featureType: 'road.arterial',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#ff9905'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#c9c9c9'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  }
                ],
                            {name: 'Styled Map'});

                        // Create a map object, and include the MapTypeId to add
                        // to the map type control.
                        var map = new google.maps.Map(document.getElementById('map'), {
                          center: {lat: 10.6992154, lng: 122.5626259},
                          // 10.6992101,122.5603192
                          // 10.6998954,122.5602012 spa rivera
                          zoom: 15,
                          mapTypeControlOptions: {
                            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                                    'styled_map']
                          }
                        });

                        var image = 'http://summer.maverickswebsolutions.com/wp-content/themes/maventheme/{{ url('Elearn/Elearn/assets')}}/img/Pin1.png';
                        var beachMarker = new google.maps.Marker({
                          animation: google.maps.Animation.BOUNCE,
                          position: {lat: 10.6992154, lng: 122.5626259},
                          map: map,
                          icon: image
                        });


                        //Associate the styled map with the MapTypeId and set it to display.
                        map.mapTypes.set('styled_map', styledMapType);
                        map.setMapTypeId('styled_map');
                      }
                    </script>
                 
                </div>

              <div class="contacts-container animated zoomIn">
                <div class="card"></div>
                <div class="card">
                  <h1 class="title">Let's Connect!</h1>
                  <style type="text/css">
                    .ds-btn { padding-left: 0px; }
                    .ds-btn li { list-style:none; text-align:left; padding:10px; }
                    .ds-btn li span{padding-left:30px;padding-right:5px;width:100%;display:inline-block; text-align:left;}
                    .ds-btn li span small{width:100%; display:inline-block; text-align:left; line-height: 20px; color: #000;}
                    .ds-btn li span small a{ color: #000; }
                  </style>
                  <div class="contacts">
                      <ul class="ds-btn">
                        <li>
                          <h3>
                            <i class="fa fa-volume-control-phone"></i>
                            <span> CONTACT US 
                              <br>
                              <small>(033) 321 01234
                              <br> business@easy-a.com 
                              <br> <a href="#">facebook.com/easyaenglish</a>
                              </small>
                            </span>
                          </h3>
                        </li>
                        <li>
                          <h3><i class="fa fa-street-view"></i> 
                          <span> VISIT US <br>
                          <small> Nellys Building, Lopez jaena St. Iloilo City Philippines, 5000</small>
                          </span></h3>
                        </li>
                      </ul>
                  </div>
                </div>
                <div class="card alt">
                  <div class="toggle"></div>
                  <h1 class="title">Lets Talk!
                    <div class="close"></div>
                    <br><span>Obsessing about an idea and want to talk about it? Give us a ring, send us a message or visit us here:</span>
                  </h1>
                  <form>
                    <div class="input-container">
                      <input type="#{type}" id="#{label}" required="required"/>
                      <label for="#{label}">Name:</label>
                      <div class="bar"></div>
                    </div>
                    <div class="input-container">
                      <input type="#{type}" id="#{label}" required="required"/>
                      <label for="#{label}">Mobile:</label>
                      <div class="bar"></div>
                    </div>
                    <div class="input-container">
                      <input type="#{type}" id="#{label}" required="required"/>
                      <label for="#{label}">Email:</label>
                      <div class="bar"></div>
                    </div>
                    <div class="input-container">
                      <input type="#{type}" id="#{label}" required="required"/>
                      <label for="#{label}">Subject:</label>
                      <div class="bar"></div>
                    </div>
                    <div class="input-container">
                      <input type="#{type}" id="#{label}" required="required"/>
                      <label for="#{label}">Message:</label>
                      <div class="bar"></div>
                    </div>
                    <div class="button-container">
                      <button><span>Send</span></button>
                    </div>
                  </form>
                </div>
              </div>

              </div>
              

            </div>
          </div>
          
        



        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAPAoxjT-elx0tSjQYyN5kwWzby83mWUI&callback=initMap"></script>

      


          

      <!--</div> container -->
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
