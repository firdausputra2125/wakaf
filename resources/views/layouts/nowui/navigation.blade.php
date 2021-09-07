<?php  $menus = SiteHelpers::menus('top') ;?>
<div class="container">
    <div class="dropdown button-dropdown">
    </div>
    <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('') }}">
            <strong>{{ config('sximo.cnf_appname') }}</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" data-nav-image="{{ asset('frontend/nowui/img/blurred-image-1.jpg') }}" data-color="orange">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('') }}">
                    <i class="fa fa-home"></i>
                    <p>Beranda</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('posts') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Semua Artikel</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('about-us') }}">
                    <i class="fa fa-address-card"></i>
                    <p>Tentang Kami</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-neutral" href="{{ url('dashboard')}}">
                <i class="now-ui-icons users_single-02"></i>
                    @if(\Auth::check())
                    <strong>Dashboard</strong>
                    @else
                    <strong>Login</strong>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>


    
       

