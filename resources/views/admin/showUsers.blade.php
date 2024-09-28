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
        <div class="container" style="text-align: center;">

            <!-- Search Bar -->
            <form action="{{ url('search_user') }}" method="GET" class="search-bar">
                <input type="text" name="search" placeholder="{{ __('messages.search_placeholder') }}" required>
                <button type="submit">{{ __('messages.search') }}</button>
            </form>

            <div class="row">
                @foreach($users as $user)
                    @if($user->type=='client')
                    <div class="col-md-4">
                        <div class="user-card">

                            <div class="user-details">
                                <h5>{{ $user->name }}</h5>
                                <p>{{ __('usersHome.email') }}: {{ $user->email }}</p>
                                <p>{{ __('usersHome.phone') }}: {{ $user->phone ?? __('usersHome.not_available') }}</p>
                                <p>{{ __('messages.address') }}: {{ $user->address ?? __('usersHome.not_available') }}</p>
                            </div>
                            <div class="control-buttons">
                                <form action="{{ url('delete_user', $user->id) }}" method="POST" onsubmit="return confirm('{{ __('usersHome.delete_confirmation') }}')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                                </form>
                                <form action="{{ url('edit_user', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">{{ __('messages.update') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</div>
@include('admin.js')
</body>
</html>
