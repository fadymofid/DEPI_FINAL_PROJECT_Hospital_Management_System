<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('messages.medicine_management') }}</title>
    @include('admin.css') <!-- Assuming this includes all necessary styles -->
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container">
            <!-- Search Bar -->
            <div class="search-bar">
                <form action="{{ url('search_medicine') }}" method="GET">
                    <input type="text" name="search" placeholder="{{ __('messages.search_placeholder') }}">
                    <button type="submit">{{ __('messages.search') }}</button>
                </form>
            </div>

            <!-- Loop through each medicine and display as a card -->
            @foreach($medicines as $medicine)
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="medicine-card d-flex align-items-center">
                            <!-- Medicine Image -->
                            <div>
                                <img src="medicine_image/{{$medicine->image}}" class="medicine-image" alt="Medicine Image">
                            </div>
                            <!-- Medicine Details -->
                            <div class="medicine-details">
                                <div class="medicine-title">{{ $medicine->name }}</div>
                                <div><strong>{{ __('medicine.category') }}:</strong> {{ __('medicine.'.$medicine->category) }}</div>
                                <div><strong>{{ __('messages.price') }}:</strong> ${{ $medicine->price }}</div>
                                <div class="medicine-description">{{ __('messages.description') }}: {{ $medicine->description }}</div>

                                <!-- Control buttons -->
                                <div class="control-buttons">
                                    <!-- Delete Button -->
                                    <form action="{{ url('delete_medicine', $medicine->id) }}" method="POST" onsubmit="return confirm('{{ __('messages.delete_confirmation') }}')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                                    </form>

                                    <!-- Update Button -->
                                    <form action="{{ url('update_medicine', $medicine->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">{{ __('messages.update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('admin.js') <!-- Assuming this includes all necessary scripts -->
</body>
</html>
