<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">{{ __('usersHome.ourDoctors') }}</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach($doctor as $doctors )

                <div class="col-md-12"> <!-- Adjust column size as needed -->
                    <div class="item">
                        <div class="card-doctor">
                            <div class="header">
                                <img src="doctor_image/{{$doctors->image}}" alt="Doctor Image" class="doctor-image">
                                <div class="meta">
                                    <a href="tel:{{$doctors->phone}}"><span class="mai-call"></span></a>
                                    <a href="https://wa.me/{{$doctors->phone}}" target="_blank"><span class="mai-logo-whatsapp"></span></a>
                                </div>
                            </div>
                            <div class="body text-center">
                                <p class="text-xl mb-0">{{$doctors->name}}</p>
                                <span class="text-l text-grey mb-0">{{ __('usersHome.' . $doctors->speciality) }}</span>
                                <br>
                                <span class="text-l mb-0">${{ $doctors->consultation_fee }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


