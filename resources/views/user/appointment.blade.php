<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">{{ __('usersHome.make_appointment') }}</h1>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form class="main-form" method="POST" action="{{ url('appointment') }}">
            @csrf
            <div class="row mt-5">
                <!-- Full Name -->
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="name" class="sr-only">{{ __('usersHome.full_name') }}</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('usersHome.full_name') }}" required>
                </div>

                <!-- Email Address -->
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <label for="email" class="sr-only">{{ __('usersHome.email_address') }}</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('usersHome.email_address') }}" required>
                </div>

                <!-- Appointment Date -->
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <label for="date" class="sr-only">Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>

                <!-- Speciality Dropdown -->
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <label for="speciality" class="sr-only">{{ __('usersHome.speciality') }}</label>
                    <select name="speciality" id="speciality" class="custom-select" required>
                        <option value="" disabled selected>{{ __('usersHome.speciality') }}</option>
                        <option value="general_health">{{ __('usersHome.general_health') }}</option>
                        <option value="cardiology">{{ __('usersHome.cardiology') }}</option>
                        <option value="dental">{{ __('usersHome.dental') }}</option>
                        <option value="neurology">{{ __('usersHome.neurology') }}</option>
                        <option value="orthopaedics">{{ __('usersHome.orthopaedics') }}</option>
                    </select>
                </div>

                <!-- Doctors Dropdown -->
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <label for="doctor_id" class="sr-only">{{ __('usersHome.doctor') }}</label>
                    <select name="doctor_id" id="doctor_id" class="custom-select" required>
                        <option value="" disabled selected>{{ __('usersHome.doctor') }}</option>
                        @foreach($doctor as $doctors)
                            <option value="{{ $doctors->id }}" data-speciality="{{ strtolower(str_replace(' ', '_', $doctors->speciality)) }}">
                                {{ $doctors->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Phone Number -->
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <label for="phone" class="sr-only">{{ __('usersHome.number') }}</label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="{{ __('usersHome.number') }}" required>
                </div>

                <!-- Message -->
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <label for="message" class="sr-only">{{ __('usersHome.enter_message') }}</label>
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="{{ __('usersHome.enter_message') }}"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">{{ __('usersHome.submit_request') }}</button>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let specialitySelect = document.getElementById('speciality');
        let doctorSelect = document.getElementById('doctor_id');

        // Function to filter doctors based on selected speciality
        function filterDoctors() {
            let selectedSpeciality = specialitySelect.value.toLowerCase();

            // Loop through doctor options and show/hide based on speciality
            Array.from(doctorSelect.options).forEach(function (option) {
                if (option.value === "") {
                    option.style.display = 'block'; // Show placeholder
                } else {
                    let doctorSpeciality = option.getAttribute('data-speciality');
                    option.style.display = (doctorSpeciality === selectedSpeciality) ? 'block' : 'none';
                }
            });

            // Reset doctor selection after filtering
            doctorSelect.value = "";
        }

        // Listen for changes to the speciality dropdown
        specialitySelect.addEventListener('change', filterDoctors);
    });
</script>
