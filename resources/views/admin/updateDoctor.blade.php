<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('messages.doctor_update_title') }}</title>
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
                <form id="userForm" action="{{ url('edit_doc', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('messages.doctor_name') }}</label>
                        <input name='name' type="text" class="form-control" id="name" value="{{ $data->name }}">
                        <small class="error" id="nameError"></small>
                    </div>
                    <div class="form-group">
                        <label for="phone">{{ __('messages.phone') }}</label>
                        <input name='phone' type="text" class="form-control" id="phone" value="{{ $data->phone }}">
                        <small class="error" id="phoneError"></small>
                    </div>
                    <div class="form-group">
                        <label for="consultation_fee">{{ __('messages.consultation_fee') }}</label>
                        <input name='consultation_fee' type="number" class="form-control" id="consultation_fee" value="{{ $data->consultation_fee }}">
                        <small class="error" id="consultation_feeError"></small>
                    </div>
                    <div class="form-group">
                        <label for="speciality">{{ __('messages.speciality') }}</label>
                        <select class="custom-select custom-select-lg mb-3" id="speciality" name="speciality" required>
                            <option value="" disabled selected>{{ __('messages.speciality') }}</option>
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
                    <div class="form-group align-content-lg-center d-flex">
                        <label style="margin-top:20px;margin-right:20px">{{ __('medicine.old_image') }}</label>
                        <img src="doctor_image/{{$data->image}}" style="width:75px;height:75px; border-radius:0px" alt="">
                    </div>
                    <div class="form-group" style="margin-top:20px">
                        <label for="customFile">{{ __('messages.upload_image') }}</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*">
                            <label class="custom-file-label" for="customFile">{{ __('messages.choose_file') }}</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">{{ __('messages.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
