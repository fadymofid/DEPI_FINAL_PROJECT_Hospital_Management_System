<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('medicine.update_medicine_title') }}</title>
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

                <form id="medicineForm" action="{{ url('edit_medicine', $medicine->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('medicine.medicine_name') }}</label>
                        <input name='name' type="text" class="form-control" id="name" value="{{ $medicine->name }}">
                        <small class="error" id="nameError"></small>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('medicine.description') }}</label>
                        <textarea name='description' class="form-control" id="description">{{ $medicine->description }}</textarea>
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
                        <input name='price' type="number" class="form-control" id="price" step="0.01" value="{{ $medicine->price }}">
                        <small class="error" id="priceError"></small>
                    </div>

                    <div class="form-group align-content-lg-center d-flex">
                        <label style="margin-top:20px;margin-right:20px">{{ __('medicine.old_image') }}</label>
                        <img src="medicine_image/{{ $medicine->image }}" style="width:75px;height:75px; border-radius:0px" alt="">
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <label for="customFile">{{ __('medicine.upload_image') }}</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*">
                            <label class="custom-file-label" for="customFile">{{ __('medicine.choose_file') }}</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">{{ __('medicine.update_medicine') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
