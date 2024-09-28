<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>{{ __('usersHome.My Appointments') }}</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

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

<div class="container text-center">
    <table class="table text-center justify-content-center align-items-center">
        <thead>
        <tr>
            <th scope="col">{{ __('appointments.id') }}</th>
            <th scope="col">{{ __('appointments.doctor_name') }}</th>
            <th scope="col">{{ __('appointments.speciality') }}</th>
            <th scope="col">{{ __('appointments.date') }}</th>
            <th scope="col">{{ __('appointments.message') }}</th>
            <th scope="col">{{ __('appointments.status') }}</th>
            <th scope="col">{{ __('appointments.controls') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($appoint as $appoints)
            <tr>
                <th scope="row">{{ $appoints->id }}</th>
                <td>{{ $appoints->doctor->name ?? 'N/A' }}</td>
                <td>{{ __('usersHome.' . $appoints->speciality) }}</td>
                <td>{{ $appoints->date }}</td>
                <td>{{ $appoints->message }}</td>
                <td>{{ __('appointments.' . $appoints->status) }}</td>
                <td>
                    <form action="{{ url('cancel', $appoints->id) }}" method="POST" onsubmit="return confirm('{{ __('appointments.cancel_confirmation') }}')">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{ __('appointments.cancel') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/language"></script>
</body>
</html>
