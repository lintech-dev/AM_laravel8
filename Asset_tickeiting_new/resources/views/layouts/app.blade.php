<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>LINTECHNOKRATS</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('css/style-responsive.css') }}" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>LOGO</b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
      
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <!-- <a class="logout" href="{{ URL::asset('logout') }}">Logout</a> -->
            <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
          </li>
        </ul>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          
          <li class="mt">
            <a href="{{ url('home') }}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-ticket"></i>
              <span>Ticketing Management</span>
              </a>
            <ul class="sub">
              <li class="sub"><a href="{{ url('segment_mgmt') }}"><i class="fa fa-ticket"></i><span>Segment Management</span></a></li>
         				 <li class="sub"><a href="{{ url('company_name_mgmt') }}"><i class="fa fa-ticket"></i><span>Company Name Mgmt</span></a></li>
         				 <li class="sub"><a href="{{ url('region_mgmt') }}"><i class="fa fa-ticket"></i><span>Region Management</span></a></li>
         				 <li class="sub"><a href="{{ url('location_mgmt') }}"><i class="fa fa-ticket"></i><span>Location Management</span></a></li>
         				 
         				 <li class="sub"><a href="{{ url('issue_cat_mgmt') }}"><i class="fa fa-ticket"></i><span>Issue Category <br> Management</span></a></li>
         				 
         				 <li class="sub"><a href="{{ url('ticket_type_mgmt') }}"><i class="fa fa-ticket"></i><span>Ticket Type Management</span></a></li>
         				 <li class="sub"><a href="{{ url('user_mgmt') }}"><i class="fa fa-user"></i><span>User Management</span></a></li>
         				 <li class="sub"><a href="{{ url('report') }}"><i class="fa fa-table"></i><span>Report</span></a></li>
            </ul>
          </li>
          
           <li class="sub-menu">
            <a href="{{ url('Asset_assign') }}">
              <i class="fa fa-desktop"></i>
              <span>Asset Assigning</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Asset Management</span>
              </a>
            <ul class="sub">
                 <li><a href="{{ URL::asset('Asset') }}">Add Asset</a></li>
                    <li><a href="{{ URL('Component_Create') }}">Component create</a></li>
                    <li><a href="{{ URL('Create_Accessory') }}">Create Accessory</a></li>
                    <li><a href="{{ URL('Create_Consumable') }}">Create Consumable</a></li>
                    <li><a href="{{ URL('Create_License') }}">Create License</a></li>
            </ul>
          </li>
         
          <li class="sub-menu">
            <a href="{{ url('query_builder') }}">
              <i class="fa fa-ticket"></i>
              <span>Query Builder</span>
              </a>
          </li>
          
          
          
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
