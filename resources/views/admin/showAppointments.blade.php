<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('appointments.title') }}</title>
    <!-- Include Admin CSS -->
    @include('admin.css')

</head>
<body>
<div class="container-scroller">
    <!-- Include Sidebar and Navbar -->
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container" style="margin-top: 10%; text-align: center;">
            <!-- Search Bar -->
            <form action="{{ url('search_appointments') }}" method="GET" class="search-bar mb-4">
                <input type="text" name="search" placeholder="{{ __('appointments.search_placeholder') }}" required>
                <button type="submit" class="btn btn-primary">{{ __('appointments.search') }}</button>
            </form>

            <!-- Display Success and Error Messages -->
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('appointments.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('appointments.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Appointments Table -->
            <div class="table-container">
                <table class="table text-center justify-content-center align-items-center">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('appointments.id') }}</th>
                        <th scope="col">{{ __('appointments.name') }}</th>
                        <th scope="col">{{ __('appointments.email') }}</th>
                        <th scope="col">{{ __('appointments.phone') }}</th>
                        <th scope="col">{{ __('appointments.doctor_name') }}</th>
                        <th scope="col">{{ __('appointments.speciality') }}</th>
                        <th scope="col">{{ __('appointments.date') }}</th>
                        <th scope="col">{{ __('appointments.message') }}</th>
                        <th scope="col">{{ __('appointments.status') }}</th>
                        <th scope="col">{{ __('appointments.controls') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($appoint as $appoints)
                        <tr>
                            <td>{{ $appoints->id }}</td>
                            <td>{{ $appoints->name }}</td>
                            <td>{{ $appoints->email }}</td>
                            <td>{{ $appoints->phone }}</td>
                            <td>{{ $appoints->doctor->name }}</td>
                            <td>{{ __('usersHome.' . $appoints->speciality) }}</td>
                            <td>{{ $appoints->date }}</td>
                            <td>{{ $appoints->message }}</td>
                            <td>{{ __('appointments.' . $appoints->status) }}</td>
                            <td class="d-flex justify-content-center">
                                <!-- Cancel Button -->
                                <form action="{{ url('cancel_appoint', $appoints->id) }}" method="POST" onsubmit="return confirm('{{ __('appointments.cancel_confirmation') }}')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">{{ __('appointments.cancel') }}</button>
                                </form>
                                <!-- Approve Button -->
                                <form action="{{ url('approve', $appoints->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">{{ __('appointments.approve') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">{{ __('appointments.no_appointments') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include Admin JS -->
@include('admin.js')
</body>
</html>
```

