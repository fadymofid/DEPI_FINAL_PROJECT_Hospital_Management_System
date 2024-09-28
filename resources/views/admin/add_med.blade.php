<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('messages.Add Medicine') }}</title>
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
                            {{ session()->get('message') }}
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
                    <form id="medicineForm" action="{{ url('upload_medicine') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('medicine.medicine_name') }}</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="{{ __('medicine.enter_medicine_name') }}" required>
                            <small class="error" id="nameError"></small>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('medicine.description') }}</label>
                            <textarea name="description" class="form-control" id="description" placeholder="{{ __('medicine.enter_medicine_description') }}"></textarea>
                            <small class="error" id="descriptionError"></small>
                        </div>
                        <div class="form-group">
                            <label for="category">{{ __('medicine.category') }}</label>
                            <select class="custom-select custom-select-lg mb-3" id="category" name="category" required>
                                <option value="" disabled selected>{{ __('medicine.enter_medicine_category') }}</option>
                                @php
                                    $categories = [
                                        'antibiotics' => __('medicine.antibiotics'), // Assuming keys are defined in language files
                                        'Painkillers' => __('medicine.Painkillers'),
                                        'antiseptics' => __('medicine.antiseptics'),
                                        'vitamins' => __('medicine.vitamins'),
                                        'supplements' => __('medicine.supplements'),
                                        'others' => __('medicine.others'),
                                    ];
                                @endphp
                                @foreach($categories as $key => $categoryName)
                                    <option value="{{ $key }}">{{ $categoryName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">{{ __('medicine.price') }}</label>
                            <input name="price" type="number" step="0.01" class="form-control" id="price" placeholder="{{ __('medicine.enter_medicine_price') }}" required>
                            <small class="error" id="priceError"></small>
                        </div>
                        <div class="form-group">
                            <label for="customFile">{{ __('medicine.upload_image') }}</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*" required>
                                <label class="custom-file-label" for="customFile">{{ __('medicine.choose_file') }}</label>
                            </div>
                            <small class="error" id="fileError"></small>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">{{ __('medicine.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include("admin.js")

</body>
</html>
