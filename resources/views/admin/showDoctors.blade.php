<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('messages.doctor_management') }}</title>
    @include('admin.css') <!-- Assuming this includes all necessary styles -->
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container" style="text-align: center;">

            <!-- Search Bar -->
            <form action="{{ url('search_doctor') }}" method="GET" class="search-bar">
                <input type="text" name="search" placeholder="{{ __('messages.search_placeholder') }}" required>
                <button type="submit">{{ __('messages.search') }}</button>
            </form>

            <div class="row">
                @foreach($doctors as $doctor)
                    <div class="col-md-4">
                        <div class="doctor-card">
                            <img src="doctor_image/{{$doctor->image}}" class="doctor-image" alt="Doctor Image">
                            <div class="doctor-details">
                                <h5>{{ $doctor->name }}</h5>
                                <p>{{ __('messages.phone') }}: {{ $doctor->phone }}</p>
                                <p><strong>{{ __('messages.speciality') }}: {{ __('usersHome.' . $doctor->speciality) }} </strong></p>
                                <div><strong>{{ __('messages.consultation_fee') }}:</strong> ${{ $doctor->consultation_fee }}</div>
                            </div>
                            <div class="control-buttons">
                                <form action="{{ url('delete_doc', $doctor->id) }}" method="POST" onsubmit="return confirm('{{ __('messages.delete_confirmation') }}')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                                </form>
                                <form action="{{ url('update_doc', $doctor->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">{{ __('messages.update') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('admin.js')
</body>
</html>
