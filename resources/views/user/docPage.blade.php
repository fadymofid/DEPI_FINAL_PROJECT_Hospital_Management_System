<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>{{ __('usersHome.doctors') }}</title>
    <link rel="stylesheet" href="../assets/css/maicons.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css" integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="../assets/css/theme.css">


</head>
<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info">
                        <a href="#"><span class="mai-call text-primary"></span> {{ __('usersHome.phone') }}</a>
                        <span class="divider">|</span>
                        <a href="#"><span class="mai-mail text-primary"></span> {{ __('usersHome.email') }}</a>
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-dribbble"></span></a>
                        <a href="#"><span class="mai-logo-instagram"></span></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">{{ __('usersHome.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/viewDocs">{{ __('usersHome.doctors') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/med">{{ __('usersHome.pharmacy') }}</a>
                    </li>
                    @if (\Illuminate\Support\Facades\Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('myAppointments')}}">{{ __('usersHome.My Appointments') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <!-- Display the user's name -->
                                </a>
                                <div class="dropdown-menu" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('usersHome.profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                        {{ __('usersHome.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">{{ __('usersHome.login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">{{ __('usersHome.Register') }}</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
        <div class="dropdown ml-auto">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ __('usersHome.language') }}
            </button>
            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="{{ route('changeLang', ['locale' => 'ar']) }}">العربية</a>
                <a class="dropdown-item" href="{{ route('changeLang', ['locale' => 'en']) }}">English</a>
            </div>
        </div>
    </nav>
</header>
@if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message') }}
    </div>
@endif

<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">{{ __('usersHome.ourDoctors') }}</h1>

        @if($doctors->isEmpty())
            <p>No doctors found.</p>
        @else
            <div class="container-fluid page-body-wrapper">
                <div class="container" style="text-align: center;">
                    <div class="row">
                        @foreach($doctors as $doctor)
                            <div class="col-md-4"> <!-- Adjust column size as needed -->
                                <div class="item">
                                    <div class="card-doctor">
                                        <div class="header">
                                            <img src="doctor_image/{{$doctor->image}}" alt="Doctor Image" class="doctor-image">
                                            <div class="meta">
                                                <a href="tel:{{$doctor->phone}}"><span class="mai-call"></span></a>
                                                <a href="https://wa.me/{{$doctor->phone}}" target="_blank"><span class="mai-logo-whatsapp"></span></a>
                                            </div>
                                        </div>
                                        <div class="body text-center">
                                            <p class="text-xl mb-0">{{$doctor->name}}</p>
                                            <span class="text-l text-grey mb-0">{{ __('usersHome.' . $doctor->speciality) }}</span>
                                            <br>
                                            <span class="text-l mb-0">${{ $doctor->consultation_fee }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<footer class="page-footer">
    <div class="container">
        <div class="row px-md-3">
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>{{ __('usersHome.company') }}</h5>
                <ul class="footer-menu">
                    <li><a href="#">{{ __('usersHome.about_us') }}</a></li>
                    <li><a href="#">{{ __('usersHome.career') }}</a></li>
                    <li><a href="#">{{ __('usersHome.privacy_policy') }}</a></li>
                    <li><a href="#">{{ __('usersHome.terms_of_service') }}</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>{{ __('usersHome.services') }}</h5>
                <ul class="footer-menu">
                    <li><a href="#">{{ __('usersHome.general_health') }}</a></li>
                    <li><a href="#">{{ __('usersHome.cardiology') }}</a></li>
                    <li><a href="#">{{ __('usersHome.dental') }}</a></li>
                    <li><a href="#">{{ __('usersHome.neurology') }}</a></li>
                    <li><a href="#">{{ __('usersHome.orthopaedics') }}</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>{{ __('usersHome.contact') }}</h5>
                <ul class="footer-menu">
                    <li><a href="mailto:{{ __('usersHome.email_address') }}">{{ __('usersHome.email_address') }}</a></li>
                    <li><a href="tel:{{ __('usersHome.phone_number') }}">{{ __('usersHome.phone_number') }}</a></li>
                    <li><a href="#">{{ __('usersHome.address') }}</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>{{ __('usersHome.follow_us') }}</h5>
                <ul class="social-media">
                    <li><a href="#"><span class="mai-logo-facebook-f"></span></a></li>
                    <li><a href="#"><span class="mai-logo-twitter"></span></a></li>
                    <li><a href="#"><span class="mai-logo-google"></span></a></li>
                    <li><a href="#"><span class="mai-logo-instagram"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
<script src="../assets/js/language"></script>

</body>
</html>
