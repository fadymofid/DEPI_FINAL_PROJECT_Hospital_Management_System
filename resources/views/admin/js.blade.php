<script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
<script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animations/2.1/js/animations.min.js" integrity="sha512-Jb1xPasilz4CRWpHF6CQPrVq8ar/oOGD+IYRc02srqssq/X4jdGb4tEq2mklHHiS3SKpFzU8RerqdbGhQGFomQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="admin/assets/js/off-canvas.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animations/2.1/css/animations.css" integrity="sha512-fA223KUHhMabpsfwuzNiKcnZpczf1sqcq3KxRYs9RKKSiEYVIkCUYZ2TXUK6E3IsToDniBfRIz2vpkUIVScUww==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="admin/assets/js/hoverable-collapse.js"></script>
<script src="admin/assets/js/misc.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animations/2.1/css/animations.min.css" integrity="sha512-tqoI91MZ3oeoSpcLLvyF9Z36ZJHbUmQL15XXmfSvN6i+JZgzw9V1jKpYtDblDBrQKNIsE/dryptIW+7wi739IQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="admin/assets/js/settings.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animations/2.1/js/animations.js" integrity="sha512-ssNhysGUxEIMr8itdRJ53ZxjkmQiLrmJ3IRDirhOqz4p/JjDQY2yQah2G6iBQ15GIMEIWk+Qzvr98YK2tEk7ug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="admin/assets/js/todolist.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animations/2.1/js/smoothscroll.min.js" integrity="sha512-gY9vvjP9EwVJyFszUWV/P7HlHYisdV3chYpYMHaoicpp/xn9/oVHAKJdUgUgj4z9u1qtMZk1MPSUTf2JAu3hkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animations/2.1/js/appear.min.js" integrity="sha512-79SlptT8+qWe7yh3sXv0BF179FkqUIac6O2HGebZprXW6XXKZSrNEvCdTBPbhKrfOzq2nK9Ruc4HQ0j584Ksng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- endinject -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animations/2.1/css/normalize.css" integrity="sha512-je/LuMO1p0mZX5kQmuVBVz0+3PAbEhPO7LNYGqWpWyAOHtdhPXKsqZLf0qJkf4iiBvYkZLDpFqELJv/B5ZYTFg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Custom js for this page -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="admin/assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
<!-- JavaScript Validation -->
<script>
    // Add Bootstrap validation styling for custom file input
    $('#customFile').on('change', function() {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
    });

    // Custom form validation
    document.getElementById('userForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        let isValid = true;

        // Name validation
        const nameInput = document.getElementById('name');
        const nameError = document.getElementById('nameError');
        if (nameInput.value.trim() === "") {
            isValid = false;
            nameInput.classList.add('is-invalid');
            nameError.textContent = "Name is required.";
        } else {
            nameInput.classList.remove('is-invalid');
            nameError.textContent = "";
        }

        // Phone validation
        const phoneInput = document.getElementById('phone');
        const phoneError = document.getElementById('phoneError');
        if (phoneInput.value.trim() === "") {
            isValid = false;
            phoneInput.classList.add('is-invalid');
            phoneError.textContent = "Phone number is required.";
        } else {
            phoneInput.classList.remove('is-invalid');
            phoneError.textContent = "";
        }


        // Speciality validation
        const specialityInput = document.getElementById('speciality');
        const specialityError = document.getElementById('specialityError');
        if (specialityInput.value === "") {
            isValid = false;
            specialityInput.classList.add('is-invalid');
            specialityError.textContent = "Please select a speciality.";
        } else {
            specialityInput.classList.remove('is-invalid');
            specialityError.textContent = "";
        }

        // File validation
        const fileInput = document.getElementById('customFile');
        const fileError = document.getElementById('fileError');
        if (fileInput.files.length === 0) {
            isValid = false;
            fileInput.classList.add('is-invalid');
            fileError.textContent = "Please upload a file.";
        } else {
            fileInput.classList.remove('is-invalid');
            fileError.textContent = "";
        }

        // If all fields are valid, submit the form
        if (isValid) {
            document.getElementById('userForm').submit();
        }
    });




    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.purecounter');

        counters.forEach(counter => {
            const updateCount = () => {
                const start = parseInt(counter.getAttribute('data-purecounter-start'));
                const end = parseInt(counter.getAttribute('data-purecounter-end'));
                const duration = parseInt(counter.getAttribute('data-purecounter-duration')) * 1000;
                const increment = (end - start) / (duration / (1000 / 60)); // Calculate increment per frame
                let current = start;

                const interval = setInterval(() => {
                    current += increment;
                    if (current >= end) {
                        current = end; // Ensure it doesn't exceed the end value
                        clearInterval(interval);
                    }
                    counter.textContent = Math.floor(current);
                }, 1000 / 60); // 60 frames per second
            };

            // Trigger the count up animation
            updateCount();
        });
    });

</script>

