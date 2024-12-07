@extends('layouts.layout')
@section("title", "Dashboard")
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  </head>
<body>
  <nav class="sidebar">
    <header>
      <div class="image-text">
        <span class="logoImage">
            <img src="{{ asset('images/Equickserv_Icon.png') }}" alt="logo">
        </span>
        
          <div class="text header-text">
            <span class="brand">EquickServ</span>
            <span class="word">A web reservation</span>
          </div>
      </div>
<button>
      <i class="menu-icon"> <img src="{{ asset('images/menu.png') }}" alt="menu"> </i>
      </button>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="{{ route('dashboard') }}">
                        <i class="home-icon">  <img src="{{ asset('images/home.png') }}" alt="menu"> </i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{ route('reservations') }}">
                        <i class="home-icon">  <img src="{{ asset('images/calendar.png') }}" alt="menu"> </i>
                        <span class="text nav-text">Reservations</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{ route('equipments') }}">
                        <i class="home-icon">  <img src="{{ asset('images/equipment.png') }}" alt="menu"> </i>
                        <span class="text nav-text">Equipments</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{ route('settings') }}">
                        <i class="home-icon">  <img src="{{ asset('images/settings.png') }}" alt="menu"> </i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bottom-content">
            <li class="nav-link">
                <form action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <button type="submit" class="logout-button">
                        <i class="home-icon">  <img src="{{ asset('images/logout.png') }}" alt="menu"> </i>
                        <span class="text nav-text">Logout</span>
                    </button>
                </form>
            </li>
        </div>
    </div>
  </nav> 
  
 <!-- Content Area -->
 <div class="content-area">
    <div class="top-row">
        <div class="panel">Top Box 1</div>
        <div class="panel">Top Box 2</div>
    </div>
    <div class="bottom-row">
        <div class="panel">Bottom Box</div>
    </div>
  </div>
</body>
</html>
@endsection