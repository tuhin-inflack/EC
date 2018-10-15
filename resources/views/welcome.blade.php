<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Crypto Dashboard - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin
        Dashboard
    </title>
    <link rel="apple-touch-icon" href="{{ asset('theme/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/core/colors/palette-gradient.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/css/cryptocoins/cryptocoins.css') }}">--}}
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/assets/css/style.css') }}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="index.html">
                        <img class="brand-logo" alt="modern admin logo" src="{{ asset('theme/images/logo/logo.png') }}">
                        <h3 class="brand-text">Modern Admin</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>
                    <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                   data-toggle="dropdown">Mega</a>
                        <ul class="mega-dropdown-menu dropdown-menu row">
                            <li class="col-md-2">
                                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i>
                                    News</h6>
                                <div id="mega-menu-carousel-example">
                                    <div>
                                        <img class="rounded img-fluid mb-1"
                                             src="{{ asset('theme/images/slider/slider-2.png') }}"
                                             alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>
                                        <p class="news-content">
                                            <span class="font-small-2">January 26, 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> Drill down
                                    menu</h6>
                                <ul class="drilldown-menu">
                                    <li class="menu-list">
                                        <ul>
                                            <li>
                                                <a class="dropdown-item" href="layout-2-columns.html"><i
                                                            class="ft-file"></i> Page layouts & Templates</a>
                                            </li>
                                            <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>
                                                <ul>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="la la-bookmark-o"></i> Second level</a></li>
                                                    <li><a href="#"><i class="la la-lemon-o"></i> Second level menu</a>
                                                        <ul>
                                                            <li><a class="dropdown-item" href="#"><i
                                                                            class="la la-heart-o"></i> Third level</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"><i
                                                                            class="la la-file-o"></i> Third level</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"><i
                                                                            class="la la-trash-o"></i> Third level</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"><i
                                                                            class="la la-clock-o"></i> Third level</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i class="la la-hdd-o"></i>
                                                            Second level, third link</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="la la-floppy-o"></i>
                                                            Second level, fourth link</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="color-palette-primary.html"><i
                                                            class="ft-camera"></i> Color palette system</a>
                                            </li>
                                            <li><a class="dropdown-item" href="sk-2-columns.html"><i
                                                            class="ft-edit"></i> Page starter kit</a></li>
                                            <li><a class="dropdown-item" href="changelog.html"><i
                                                            class="ft-minimize-2"></i> Change log</a></li>
                                            <li>
                                                <a class="dropdown-item" href="https://pixinvent.ticksy.com/"><i
                                                            class="la la-life-ring"></i> Customer support center</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="col-md-3">
                                <h6 class="dropdown-menu-header text-uppercase"><i class="la la-list-ul"></i> Accordion
                                </h6>
                                <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                                    <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                                        <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a
                                                    data-toggle="collapse" data-parent="#accordionWrap"
                                                    href="#accordionOne"
                                                    aria-expanded="true" aria-controls="accordionOne">Accordion Item
                                                #1</a></div>
                                        <div class="card-collapse collapse show" id="accordionOne" role="tabpanel"
                                             aria-labelledby="headingOne"
                                             aria-expanded="true">
                                            <div class="card-content">
                                                <p class="accordion-text text-small-3">Caramels dessert chocolate cake
                                                    pastry jujubes bonbon.
                                                    Jelly wafer jelly beans. Caramels chocolate cake liquorice
                                                    cake wafer jelly beans croissant apple pie.</p>
                                            </div>
                                        </div>
                                        <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a
                                                    class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionWrap"
                                                    href="#accordionTwo" aria-expanded="false"
                                                    aria-controls="accordionTwo">Accordion Item #2</a></div>
                                        <div class="card-collapse collapse" id="accordionTwo" role="tabpanel"
                                             aria-labelledby="headingTwo"
                                             aria-expanded="false">
                                            <div class="card-content">
                                                <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly
                                                    tiramisu
                                                    dessert pie. Tiramisu macaroon muffin jelly marshmallow
                                                    cake. Pastry oat cake chupa chups.</p>
                                            </div>
                                        </div>
                                        <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a
                                                    class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionWrap"
                                                    href="#accordionThree" aria-expanded="false"
                                                    aria-controls="accordionThree">Accordion Item #3</a></div>
                                        <div class="card-collapse collapse" id="accordionThree" role="tabpanel"
                                             aria-labelledby="headingThree"
                                             aria-expanded="false">
                                            <div class="card-content">
                                                <p class="accordion-text">Candy cupcake sugar plum oat cake wafer
                                                    marzipan jujubes
                                                    lollipop macaroon. Cake dragée jujubes donut chocolate
                                                    bar chocolate cake cupcake chocolate topping.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4">
                                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-envelope-o"></i>
                                    Contact Us</h6>
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label" for="inputName1">Name</label>
                                            <div class="col-sm-9">
                                                <div class="position-relative has-icon-left">
                                                    <input class="form-control" type="text" id="inputName1"
                                                           placeholder="John Doe">
                                                    <div class="form-control-position pl-1"><i class="la la-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label" for="inputEmail1">Email</label>
                                            <div class="col-sm-9">
                                                <div class="position-relative has-icon-left">
                                                    <input class="form-control" type="email" id="inputEmail1"
                                                           placeholder="john@example.com">
                                                    <div class="form-control-position pl-1"><i
                                                                class="la la-envelope-o"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label"
                                                   for="inputMessage1">Message</label>
                                            <div class="col-sm-9">
                                                <div class="position-relative has-icon-left">
                                                    <textarea class="form-control" id="inputMessage1" rows="2"
                                                              placeholder="Simple Textarea"></textarea>
                                                    <div class="form-control-position pl-1"><i
                                                                class="la la-commenting-o"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 mb-1">
                                                <button class="btn btn-info float-right" type="button"><i
                                                            class="la la-paper-plane-o"></i> Send
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                    class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore Modern...">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">John Doe</span>
                </span>
                            <span class="avatar avatar-online">
                  <img src="{{ asset('theme/images/portrait/small/avatar-s-19.png') }}" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i
                                        class="ft-user"></i> Edit Profile</a>
                            <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                            <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                            <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                                                       id="dropdown-flag" href="#"
                                                                       data-toggle="dropdown"
                                                                       aria-haspopup="true" aria-expanded="false"><i
                                    class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i
                                        class="flag-icon flag-icon-gb"></i> English</a>
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Notifications</span>
                                </h6>
                                <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                            </li>
                            <li class="scrollable-container media-list w-100">
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                    class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">You have new order!</h6>
                                            <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit
                                                amet, consectetuer elit.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">30 minutes ago
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                    class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading red darken-1">99% Server load</h6>
                                            <p class="notification-text font-small-3 text-muted">Aliquam tincidunt
                                                mauris eu risus.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Five hour ago
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                    class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                            <p class="notification-text font-small-3 text-muted">Vestibulum auctor
                                                dapibus neque.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Today
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                    class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Complete the task</h6>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Last week
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                    class="ft-file icon-bg-circle bg-teal"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Generate monthly report</h6>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Last month
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                href="javascript:void(0)">Read all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i
                                    class="ficon ft-mail"> </i></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Messages</span>
                                </h6>
                                <span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                            </li>
                            <li class="scrollable-container media-list w-100">
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="{{ asset('theme/images/portrait/small/avatar-s-19.png') }}"
                               alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Margaret Govan</h6>
                                            <p class="notification-text font-small-3 text-muted">I like your portfolio,
                                                let's start.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Today
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                        <span class="avatar avatar-sm avatar-busy rounded-circle">
                          <img src="{{ asset('theme/images/portrait/small/avatar-s-2.png') }}"
                               alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Bret Lezama</h6>
                                            <p class="notification-text font-small-3 text-muted">I have seen your work,
                                                there is</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Tuesday
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="{{ asset('theme/images/portrait/small/avatar-s-3.png') }}"
                               alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Carie Berra</h6>
                                            <p class="notification-text font-small-3 text-muted">Can we have call in
                                                this week ?</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">Friday
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                        <span class="avatar avatar-sm avatar-away rounded-circle">
                          <img src="{{ asset('theme/images/portrait/small/avatar-s-6.png') }}"
                               alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Eric Alsobrook</h6>
                                            <p class="notification-text font-small-3 text-muted">We have project party
                                                this saturday.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">last month
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                href="javascript:void(0)">Read all messages</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('partials.menu')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div id="crypto-stats-3" class="row">
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4>BTC</h4>
                                        <h6 class="text-muted">Bitcoin</h6>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>$9,980</h4>
                                        <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4>ETH</h4>
                                        <h6 class="text-muted">Ethereum</h6>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>$944</h4>
                                        <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="eth-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4>XRP</h4>
                                        <h6 class="text-muted">Balance</h6>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>$1.2</h4>
                                        <h6 class="danger">20% <i class="la la-arrow-down"></i></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="xrp-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Candlestick Multi Level Control Chart -->
            <!-- Slaes & Purchase Order -->
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div id="accordionCrypto" role="tablist" aria-multiselectable="true">
                        <div class="card collapse-icon accordion-icon-rotate">
                            <div id="heading31" class="card-header bg-info p-1 bg-lighten-1">
                                <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionBTC"
                                   aria-expanded="true"
                                   aria-controls="accordionBTC" class="card-title lead white">BTC</a>
                            </div>
                            <div id="accordionBTC" role="tabpanel" aria-labelledby="heading31"
                                 class="card-collapse collapse show"
                                 aria-expanded="true">
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <div class="media-list list-group">
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">BTC/USD</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">11916.9</p>
                              <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 BTC</p>
                            </span>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1 bg-info bg-lighten-5">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">BTC/EUR</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">9213.3</p>
                              <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 BTC</p>
                            </span>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">BTC/GBP</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">8015.1</p>
                              <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 BTC</p>
                            </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="heading32" class="card-header bg-info p-1 bg-lighten-1 my-1">
                                <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionETH"
                                   aria-expanded="false"
                                   aria-controls="accordionETH" class="card-title lead white collapsed">ETH</a>
                            </div>
                            <div id="accordionETH" role="tabpanel" aria-labelledby="heading32"
                                 class="card-collapse collapse"
                                 aria-expanded="false">
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <div class="media-list list-group">
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">ETH/USD</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">11916.9</p>
                              <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 ETH</p>
                            </span>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">ETH/EUR</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">9213.3</p>
                              <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 ETH</p>
                            </span>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">ETH/GBP</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">8015.1</p>
                              <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 ETH</p>
                            </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="heading33" class="card-header bg-info p-1 bg-lighten-1">
                                <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionXRP"
                                   aria-expanded="false"
                                   aria-controls="accordionXRP" class="card-title lead white collapsed">XRP</a>
                            </div>
                            <div id="accordionXRP" role="tabpanel" aria-labelledby="heading33"
                                 class="card-collapse collapse"
                                 aria-expanded="false">
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <div class="media-list list-group">
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">XRP/USD</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">11916.9</p>
                              <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 XRP</p>
                            </span>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">XRP/EUR</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">9213.3</p>
                              <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 XRP</p>
                            </span>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                <a class="media-link" href="#">
                            <span class="media-left">
                              <p class="text-bold-600 m-0">XRP/GBP</p>
                              <p class="font-small-2 text-muted m-0">24h Change</p>
                              <p class="font-small-2 text-muted m-0">24h Volume</p>
                            </span>
                                                    <span class="media-body text-right">
                              <p class="text-bold-600 m-0">8015.1</p>
                              <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                              <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 XRP</p>
                            </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">BTC/USD</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li class="text-center mr-4">
                                        <h6 class="text-muted">Last price</h6>
                                        <p class="text-bold-600 mb-0">$ 11916.9</p>
                                    </li>
                                    <li class="text-center mr-4">
                                        <h6 class="text-muted">Daily change</h6>
                                        <p class="text-bold-600 mb-0">$ 283.1</p>
                                    </li>
                                    <li class="text-center">
                                        <h6 class="text-muted">24h volume</h6>
                                        <p class="text-bold-600 mb-0"><i class="cc BTC-alt" title="BTC"></i> 1029.1906
                                            BTC</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body pt-0">
                                <div id="btc-candlestick-control" class="height-350 echart-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Trade History & Place Order -->
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Trade History</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn round btn-sm btn-outline-info active">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Market
                                    </label>
                                    <label class="btn round btn-sm btn-outline-info">
                                        <input type="radio" name="options" id="option2" autocomplete="off"> Yours
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive mt-1">
                                <table class="table table-xs">
                                    <thead>
                                    <tr>
                                        <th>Price($)</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="success">11900.12</td>
                                        <td><i class="cc BTC-alt"></i> 0.215</td>
                                        <td>11:23:25</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11903.18</td>
                                        <td><i class="cc BTC-alt"></i> 1.545</td>
                                        <td>11:23:05</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11899.56</td>
                                        <td><i class="cc BTC-alt"></i> 0.541</td>
                                        <td>11:22:50</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11910.52</td>
                                        <td><i class="cc BTC-alt"></i> 0.321</td>
                                        <td>11:22:15</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11901.15</td>
                                        <td><i class="cc BTC-alt"></i> 0.548</td>
                                        <td>11:21:25</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11903.45</td>
                                        <td><i class="cc BTC-alt"></i> 0.587</td>
                                        <td>11:21:01</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11895.50</td>
                                        <td><i class="cc BTC-alt"></i> 5.125</td>
                                        <td>11:20:15</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11889.56</td>
                                        <td><i class="cc BTC-alt"></i> 0.894</td>
                                        <td>11:20:03</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11885.69</td>
                                        <td><i class="cc BTC-alt"></i> 0.754</td>
                                        <td>11:19:55</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11891.12</td>
                                        <td><i class="cc BTC-alt"></i> 0.889</td>
                                        <td>11:19:15</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11889.88</td>
                                        <td><i class="cc BTC-alt"></i> 0.654</td>
                                        <td>11:18:18</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11881.15</td>
                                        <td><i class="cc BTC-alt"></i> 1.254</td>
                                        <td>11:18:01</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11875.75</td>
                                        <td><i class="cc BTC-alt"></i> 0.885</td>
                                        <td>11:17:25</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Place Order</h4>
                            <div class="heading-elements">
                                <h6 class="danger">Fee: 0.2%</h6>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-underline no-hover-bg">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-limit" data-toggle="tab"
                                           aria-controls="limit"
                                           href="#limit" aria-expanded="true">Limit</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-market" data-toggle="tab" aria-controls="market"
                                           href="#market"
                                           aria-expanded="false">Market</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-stop-limit" data-toggle="tab"
                                           aria-controls="stop-limit"
                                           href="#stop-limit" aria-expanded="false">Stop Limit</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="limit" aria-expanded="true"
                                         aria-labelledby="base-limit">
                                        <div class="row">
                                            <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Buy BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">USD Balance: $ 5000.00</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-limit-buy-price">Price</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-limit-buy-price"
                                                                       class="form-control" placeholder="$ 11916.9"
                                                                       name="btc-limit-buy-price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-limit-buy-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-limit-buy-amount"
                                                                       class="form-control" placeholder="0.026547 BTC"
                                                                       name="btc-limit-buy-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    25%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    50%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    75%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    100%
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-limit-buy-total">Total</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-limit-buy-total"
                                                                       class="form-control" placeholder="$ 318.1856"
                                                                       name="btc-limit-buy-total">
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit"
                                                                    class="btn round btn-success btn-block btn-glow">
                                                                Buy BTC
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-xl-6 pl-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Sell BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">BTC Balance: 1.2654898</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-price">Price</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-limit-sell-price"
                                                                       class="form-control" placeholder="$ 11916.9"
                                                                       name="btc-limit-sell-price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-limit-sell-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-limit-sell-amount"
                                                                       class="form-control" placeholder="0.026547 BTC"
                                                                       name="btc-limit-sell-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    25%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    50%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    75%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    100%
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-limit-sell-total">Total</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-limit-sell-total"
                                                                       class="form-control" placeholder="$ 318.1856"
                                                                       name="btc-limit-sell-total">
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit"
                                                                    class="btn round btn-danger btn-block btn-glow">
                                                                Sell BTC
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="market" aria-labelledby="base-market">
                                        <div class="row">
                                            <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Buy BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">USD Balance: $ 5000.00</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-market-buy-price">Price</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-market-buy-price"
                                                                       class="form-control" placeholder="Market prise $"
                                                                       name="btc-market-buy-price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-market-buy-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-market-buy-amount"
                                                                       class="form-control" placeholder="0.026547 BTC"
                                                                       name="btc-market-buy-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    25%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    50%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    75%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    100%
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit"
                                                                    class="btn round btn-success btn-block btn-glow">
                                                                Buy BTC
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-xl-6 pl-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Sell BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">BTC Balance: 1.2654898</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-price">Price</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-market-sell-price"
                                                                       class="form-control" placeholder="Market prise $"
                                                                       name="btc-market-sell-price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-market-sell-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-market-sell-amount"
                                                                       class="form-control" placeholder="0.026547 BTC"
                                                                       name="btc-market-sell-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    25%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    50%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    75%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    100%
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit"
                                                                    class="btn round btn-danger btn-block btn-glow">
                                                                Sell BTC
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="stop-limit" aria-labelledby="base-stop-limit">
                                        <div class="row">
                                            <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Buy BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">USD Balance: $ 5000.00</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-buy">Stop</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-buy"
                                                                       class="form-control" placeholder="$ 11916.9"
                                                                       name="btc-stop-buy">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-stop-buy-limit">Limit</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-buy-limit"
                                                                       class="form-control" placeholder="$ 12000.0"
                                                                       name="btc-stop-buy-limit">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-stop-buy-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-buy-amount"
                                                                       class="form-control" placeholder="0.026547 BTC"
                                                                       name="btc-stop-buy-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    25%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    50%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    75%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    100%
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-stop-buy-total">Total</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-stop-buy-total"
                                                                       class="form-control" placeholder="$ 318.1856"
                                                                       name="btc-stop-buy-total">
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit"
                                                                    class="btn round btn-success btn-block btn-glow">
                                                                Buy BTC
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-xl-6 pl-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Sell BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">BTC Balance: 1.2654898</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-sell">Stop</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-sell"
                                                                       class="form-control" placeholder="$ 11916.9"
                                                                       name="btc-stop-sell">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-stop-sell-limit">Limit</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-sell-limit"
                                                                       class="form-control" placeholder="$ 12000.0"
                                                                       name="btc-stop-sell-limit">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-stop-sell-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-sell-amount"
                                                                       class="form-control" placeholder="0.026547 BTC"
                                                                       name="btc-stop-sell-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    25%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    50%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    75%
                                                                </button>
                                                                <button type="button"
                                                                        class="btn round btn-outline-secondary btn-sm">
                                                                    100%
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label"
                                                                   for="btc-stop-sell-total">Total</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-stop-sell-total"
                                                                       class="form-control" placeholder="$ 318.1856"
                                                                       name="btc-stop-sell-total">
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit"
                                                                    class="btn round btn-danger btn-block btn-glow">
                                                                Sell BTC
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Trade History & Place Order -->
            <!-- Sell Orders & Buy Order -->
            <div class="row match-height">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sell Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">Total BTC available: 6542.56585</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Price per BTC</th>
                                        <th>BTC Ammount</th>
                                        <th>Total($)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-success bg-lighten-5">
                                        <td>10583.4</td>
                                        <td><i class="cc BTC-alt"></i> 0.45000000</td>
                                        <td>$ 4762.53</td>
                                    </tr>
                                    <tr>
                                        <td>10583.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.04000000</td>
                                        <td>$ 423.34</td>
                                    </tr>
                                    <tr>
                                        <td>10583.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.25100000</td>
                                        <td>$ 2656.51</td>
                                    </tr>
                                    <tr>
                                        <td>10583.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.35000000</td>
                                        <td>$ 3704.33</td>
                                    </tr>
                                    <tr>
                                        <td>10595.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.30000000</td>
                                        <td>$ 3178.71</td>
                                    </tr>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10599.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.02000000</td>
                                        <td>$ 211.99</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buy Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">Total USD available: 9065930.43</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Price per BTC</th>
                                        <th>BTC Ammount</th>
                                        <th>Total($)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10599.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.02000000</td>
                                        <td>$ 211.99</td>
                                    </tr>
                                    <tr>
                                        <td>10583.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.04000000</td>
                                        <td>$ 423.34</td>
                                    </tr>
                                    <tr>
                                        <td>10583.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.35000000</td>
                                        <td>$ 3704.33</td>
                                    </tr>
                                    <tr>
                                        <td>10595.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.30000000</td>
                                        <td>$ 3178.71</td>
                                    </tr>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10583.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.25100000</td>
                                        <td>$ 2656.51</td>
                                    </tr>
                                    <tr>
                                        <td>10595.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.29697926</td>
                                        <td>$ 3146.74</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sell Orders & Buy Order -->
            <!-- Active Orders -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Active Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <td>
                                    <button class="btn btn-sm round btn-danger btn-glow"><i
                                                class="la la-close font-medium-1"></i> Cancel all
                                    </button>
                                </td>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount BTC</th>
                                        <th>BTC Remaining</th>
                                        <th>Price</th>
                                        <th>USD</th>
                                        <th>Fee (%)</th>
                                        <th>Cancel</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td>11900.12</td>
                                        <td>$ 6979.78</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:50:50</td>
                                        <td class="danger">Sell</td>
                                        <td><i class="cc BTC-alt"></i> 1.38647</td>
                                        <td><i class="cc BTC-alt"></i> 0.38647</td>
                                        <td>11905.09</td>
                                        <td>$ 4600.97</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:49:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.45879</td>
                                        <td><i class="cc BTC-alt"></i> 0.45879</td>
                                        <td>11901.85</td>
                                        <td>$ 5460.44</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.89877</td>
                                        <td><i class="cc BTC-alt"></i> 0.89877</td>
                                        <td>11899.25</td>
                                        <td>$ 10694.6</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="danger">Sell</td>
                                        <td><i class="cc BTC-alt"></i> 0.45712</td>
                                        <td><i class="cc BTC-alt"></i> 0.45712</td>
                                        <td>11908.58</td>
                                        <td>$ 5443.65</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td>11900.12</td>
                                        <td>$ 6979.78</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Active Orders -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2"
                                                                                     href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                                                     target="_blank">PIXINVENT </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i
                    class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('theme/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('theme/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('theme/vcendors/js/charts/echarts/echarts.js') }}" type="text/javascript"></script>--}}
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('theme/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/js/core/app.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('theme/js/scripts/customizer.js') }}" type="text/javascript"></script>--}}
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
{{--<script src="{{ asset('theme/js/scripts/pages/dashboard-crypto.js') }}" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL JS-->
</body>
</html>