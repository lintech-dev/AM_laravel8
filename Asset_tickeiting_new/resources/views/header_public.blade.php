<?php
/*$empid_first = Session::get('empid_first');

if($empid_first != "")
{*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Lintechnokrats</title>

  <!-- Favicons -->
  <!-- <link href="img/favicon.png" rel="icon"> -->
  <!-- <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

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
      <!-- <a href="#" class="logo"><img alt="logo" src="{{ URL::asset('img/convergent_logo.png') }}" style="width: 160px; height: 30px;"></a> -->
      <a href="#" class="logo">Logo</a>
      <!--logo end-->

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a class="logout" href="{{ URL::asset('login') }}">login</a>
          </li>
            <!-- <li>
            <a class="logout" href="{{ URL::asset('register') }}">Register</a>
          </li> -->
        </ul>
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
          <!-- <p class="centered">
            <a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a>
          </p> -->
          <?php 
         // $name_first = Session::get('name_first'); 
         // $role_first = Session::get('role_first'); 
          ?>
          <h5 class="centered"><?php //echo"$name_first"; ?></h5>
          
                         <li class="sub"><a href="{{ url('create_ticket_public') }}"><i class="fa fa-ticket"></i><span>Help Desk</span></a></li>
         				 <li class="sub"><a href="{{ url('view_ticket_public') }}"><i class="fa fa-ticket"></i><span>Ticket History</span></a></li> 
         
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

   