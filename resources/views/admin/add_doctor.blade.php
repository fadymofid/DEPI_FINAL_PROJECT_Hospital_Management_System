<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('messages.Add Doctors') }}</title>
    @include('admin.css')
</head>
<body>

<div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper marg">
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
                    <form id="userForm" action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('messages.doctor_name') }}</label>
                            <input name='name' type="text" class="form-control" id="name" placeholder="{{ __('messages.doctor_name') }}" required>
                            <small class="error" id="nameError"></small>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('messages.phone') }}</label>
                            <input name='phone' type="text" class="form-control" id="phone" placeholder="{{ __('messages.phone') }}" required>
                            <small class="error" id="phoneError"></small>
                        </div>
                        <div class="form-group">
                            <label for="consultation_fee">{{ __('messages.consultation_fee') }}</label>
                            <input name='consultation_fee' type="number" class="form-control" id="consultation_fee" placeholder="{{ __('messages.consultation_fee') }}" required>
                            <small class="error" id="consultation_feeError"></small>
                        </div>
                        <div class="form-group">
                            <label for="speciality">{{ __('messages.select_speciality') }}</label>
                            <select class="custom-select custom-select-lg mb-3" id="speciality" name="speciality" required>
                                <option value="" disabled selected>{{ __('messages.select_speciality') }}</option>
                                @php
                                    $specialities = [
                                        'general_health' => __('usersHome.general_health'),
                                        'cardiology' => __('usersHome.cardiology'),
                                        'dental' => __('usersHome.dental'),
                                        'neurology' => __('usersHome.neurology'),
                                        'orthopaedics' => __('usersHome.orthopaedics'),
                                    ];
                                @endphp
                                @foreach($specialities as $key => $specialityName)
                                    <option value="{{ $key }}">{{ $specialityName }}</option>
                                @endforeach
                            </select>
                            <small class="error" id="specialityError"></small>
                        </div>
                        <div class="form-group">
                            <label for="customFile">{{ __('messages.upload_image') }}</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*" required>
                                <label class="custom-file-label" for="customFile">{{ __('messages.choose_file') }}</label>
                            </div>
                            <small class="error" id="fileError"></small>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">{{ __('messages.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include("admin.js")
</body>
</html>
