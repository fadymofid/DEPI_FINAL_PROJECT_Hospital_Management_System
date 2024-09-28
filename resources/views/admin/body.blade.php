<div class="main-panel">

    <section id="stats" class="stats section light-background">

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <!-- Doctors Stat -->
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center stats-item-container">
                    <i class="bi bi-person-badge stat-icon"></i>
                    <div class="stats-item text-center">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $doctorCount }}" data-purecounter-duration="2">{{ $doctorCount }}</span>
                        <p>{{__('usersHome.doctors')}}</p>
                    </div>
                </div><!-- End Stats Item -->

                <!-- Users Stat -->
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center stats-item-container">
                    <i class="bi bi-person-fill stat-icon"></i>
                    <div class="stats-item text-center">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $userCount }}" data-purecounter-duration="2">{{ $userCount }}</span>
                        <p>{{__('usersHome.users')}}</p>
                    </div>
                </div><!-- End Stats Item -->

                <!-- Appointments Stat -->
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center stats-item-container">
                    <i class="bi bi-calendar-check stat-icon"></i>
                    <div class="stats-item text-center">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $appointmentCount }}" data-purecounter-duration="2">{{ $appointmentCount }}</span>
                        <p>{{__('usersHome.Appointments')}}</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section>





    <section id="appointments-chart" class="appointments-chart section light-background">
        <div class="header">
            <h1>{{__('usersHome.percentage')}}</h1>
        </div>
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div id="appointments-chart">
                <canvas id="appointmentsChart"></canvas>

            </div>

            </div>

    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialize PureCounter
    new PureCounter();

    // Fetch doctor data with their appointment counts from the API
    fetch('/api/doctor-appointments')
        .then(response => response.json())
        .then(data => {
            const doctorNames = data.map(doctor => doctor.name);
            const appointmentCounts = data.map(doctor => doctor.appointment_count);

            const colors = [
    '#FF6384', // Red
    '#36A2EB', // Blue
    '#FFCE56', // Yellow
    '#4BC0C0', // Teal
    '#9966FF', // Purple
    '#FF9F40', // Orange
    '#FF5733', // Coral
    '#DAF7A6', // Light Green
    '#C70039', // Dark Red
    '#FFC300', // Golden Yellow
    '#900C3F', // Burgundy
    '#581845', // Dark Purple
    '#33FF57', // Lime Green
    '#FF33F6', // Magenta
    '#33C1FF', // Sky Blue
    '#FF9CDA', // Light Pink
    '#D3D3D3'  // Light Gray
];

            // Create the Pie Chart
            const ctx = document.getElementById('appointmentsChart').getContext('2d');
            const appointmentsChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: doctorNames,
                    datasets: [{
                        label: 'Appointments per Doctor',
                        data: appointmentCounts,
                        backgroundColor: colors,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Allow height to be defined in CSS
                    plugins: {
                        legend: {
                            display: false // Disable default legend
                        },
                        title: {
                            display: true,
                            text: 'Appointments per Doctor',
                            font: {
                                size: 18 // Font size for title
                            }
                        }
                    }
                }
            });

            // Dynamically generate legend
            const legendContainer = document.getElementById('legend');
            doctorNames.forEach((name, index) => {
                const legendItem = document.createElement('div');
                legendItem.className = 'legend-item';
                legendItem.innerHTML = `
                <div class="legend-color" style="background-color: ${colors[index]};"></div>
                <span class="legend-label">${name}</span>
            `;
                legendContainer.appendChild(legendItem);
            });
        })
        .catch(error => console.error('Error fetching doctor appointments:', error));
</script>
<style>
    /* Chart Section */
    #appointments-chart {
        padding: 60px 0;
        border-radius: 10px; /* Rounded corners */
        margin-top: 30px; /* Spacing above the chart */
    }

    /* Chart Canvas Styling */
    #appointmentsChart {
        width: 90%; /* Full width */
        height: 400px; /* Increased height */
        box-shadow: 0 4px 15px rgba(255, 255, 255, 0.75); /* Subtle shadow */
padding: 20px;
        border-radius: 8px; /* Rounded corners for the chart canvas */
    }

    /* Modernized Doctor Names in Legend */




    .legend-color {
        width: 20px; /* Width of the color box */
        height: 20px; /* Height of the color box */
        border-radius: 3px; /* Rounded corners for color box */
        margin-right: 10px; /* Space between color box and text */
    }

    .legend-label {
        font-weight: 500; /* Medium weight for legend labels */
        color: #ffffff; /* Darker color for text */
        font-size: 1rem; /* Font size for better readability */
    }
    #appointments-chart .header {
        text-align: center; /* Center align the header */
        margin-bottom: 20px; /* Space below the header */
    }

    #appointments-chart .header h1 {
        font-size: 3rem; /* Increase the font size */
        color: #2e7e95; /* Dark gray color for the text */
        font-weight: bold; /* Bold font */
        text-transform: uppercase; /* Uppercase letters */
        letter-spacing: 1px; /* Slight letter spacing */
    }
</style>
<!-- Custom Styles -->

