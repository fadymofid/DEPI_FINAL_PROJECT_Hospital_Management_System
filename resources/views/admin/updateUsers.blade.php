<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('usersHome.users') }}</title>
    <base href="/public">
    @include('admin.css') <!-- Assuming this includes all necessary styles -->
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container mt-4">
            <div class="form-container">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form id="userForm" action="{{ url('update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('usersHome.name') }}</label>
                        <input name='name' type="text" class="form-control" id="name" value="{{ $user->name }}">
                        <small class="error" id="nameError"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('usersHome.email') }}</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
                        <small class="error text-danger">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="phone">{{ __('messages.phone') }}</label>
                        <input name='phone' type="text" class="form-control" id="phone" value="{{ $user->phone }}">
                        <small class="error" id="phoneError"></small>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">{{ __('messages.address') }}</label>
                        <input name="address" type="text" class="form-control" id="address" value="{{ old('address', $user->address) }}">
                        <small class="error text-danger">{{ $errors->first('address') }}</small>
                    </div>


                    <button type="submit" class="btn btn-success mt-3">{{ __('messages.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
