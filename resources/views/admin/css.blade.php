
    <!-- Required meta tags -->

    <link href="
https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css
" rel="stylesheet">
    <link rel="stylesheet" href="admin/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>
        .marg {
            margin-top: 50px;
        }

        label {
            color: #1c1c1c;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control, .custom-select, .custom-file-input {
            border-radius: 4px;
            background-color: #fff;
            color: #000; /* Ensures that text inside inputs is black and visible */
        }

        .form-control:focus, .custom-select:focus, .custom-file-input:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
            background-color: #fff; /* Ensure background is white */
            color: #000; /* Ensures that text remains visible during focus */
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            border-radius: 4px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Error styles */
        .error {
            color: red;
            margin-top: 5px;
        }

        .is-invalid {
            border-color: red;
        }

        /* Ensure the color of the placeholder text is lighter, but input text remains visible */
        ::placeholder {
            color: #6c757d;
        }

        .table-container {
            display: flex;
            justify-content: center; /* Center the table horizontally */
            margin-top: 20px; /* Add some space at the top */
        }


        .table {
            background-color: #fff; /* White table background */
            width: 80%; /*
            color: #000; /* Black text color */
            max-width: 800px; /* Set a maximum width */
            border: 1px solid #ddd; /* Light border for table */
            margin: auto;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd; /* Light border for table cells */
        }
        .btn {
            border-radius: 4px;
        }
        .btn-danger {
            background-color: #e43d12; /* Custom red color */
            border: none;
            color: #fff;
        }
        .btn-success {
            background-color: #4CAF50; /* Custom green color */
            border: none;
            color: #fff;
        }

        /* Custom table adjustments */
        .table td, .table th {
            vertical-align: middle; /* Ensure vertical alignment */
        }

        .control-buttons {
            display: flex;
            justify-content: center;
            gap: 10px; /* Add spacing between buttons */
        }

        .control-buttons form {
            display: inline; /* Ensure forms don't take up the full width */
        }

        .btn {
            width: 100px; /* Set a fixed width for buttons */
        }

        /* Brighter and contrasting design with shades of blue */
        body {
            font-family: 'Arial', sans-serif;
            color: #ffffff; /* White text for better readability */
        }

        .container {
            margin-top: 40px;
        }

        .medicine-card {
            border-radius: 10px;
            background: linear-gradient(135deg, #0a0a3c, #161e25); /* Gradient background */
            box-shadow: 0 4px 10px rgba(30, 144, 255, 0.1); /* Dodger blue border for contrast */
            padding: 20px;
            margin: 20px;
            text-align: left;
            transition: all 0.3s ease;
        }

        .medicine-card:hover {
            box-shadow: 0 8px 16px rgba(30, 144, 255, 0.2); /* Increased shadow on hover */
        }

        .medicine-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #87ceeb; /* Light sky blue border for contrast */
        }

        .medicine-details {
            margin-left: 20px;
        }

        .medicine-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffffff; /* Deep sky blue for titles */
        }

        .medicine-description {
            margin-top: 10px;
            color: #cccccc; /* Light grey for description */
        }

        .control-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            width: 120px;
            color: #000000; /* Black text on buttons */
        }

        .btn-danger {
            background-color: #ff1e38; /* Dodger blue for delete button */
            border: none;
        }

        .btn-danger:hover {
            background-color: #a81521; /* Slightly darker blue on hover */
        }

        .btn-success {
            background-color: #0ed324; /* Deep sky blue for success button */
            border: none;
        }

        .btn-success:hover {
            background-color: #146807; /* Darker blue on hover */
        }

        .search-bar {
            margin-bottom: 40px;
            text-align: center;
        }

        .search-bar input[type="text"] {
            padding: 10px;
            width: 60%;
            border: 2px solid #1e90ff; /* Dodger blue border for contrast */
            background-color: #2c2c2c; /* Dark grey input background */
            color: #ffffff; /* White input text */
            border-radius: 5px;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #1e90ff; /* Dodger blue button */
            color: black;
            border: none;
            border-radius: 5px;
        }

        .search-bar button:hover {
            background-color: #1c86ee; /* Slightly darker blue on hover */
        }
        .doctor-appointments {
            margin-top: 15px;
            text-align: left;
        }

        .list-appointments {
            list-style-type: none;
            padding: 0;
        }

        .list-appointments li {
            margin-bottom: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }














        /* Background and section styles */
        #stats {
            padding: 60px 0;

        }

        /* Icon styles */
        .stat-icon {
            font-size: 4rem;
            color: #3498db;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        /* Stats item container */
        .stats-item-container {
            background-color: #263f4a;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        /* Stat number styles */
        .stats-item span {
            font-size: 2.5rem;
            font-weight: bold;
            color: #e2fbfd;
        }

        /* Stat description (e.g., Doctors, Users, etc.) */
        .stats-item p {
            font-size: 1.2rem;
            color: #c3dbdd;
            margin-top: 10px;
        }

        /* Hover effect on stats items */
        .stats-item-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        /* Hover effect on icons */
        .stats-item-container:hover .stat-icon {
            color: #b83a2d;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stat-icon {
                font-size: 3rem;
            }

            .stats-item span {
                font-size: 2rem;
            }

            .stats-item p {
                font-size: 1rem;
            }
        }
        .container {
            margin-top: 40px;
        }

        .container {
            margin-top: 40px;
        }

        .user-card {
            border: 2px solid #303030; /* Dark border */
            border-radius: 10px;
            background: linear-gradient(135deg, #0a0a3c, #161e25); /* Gradient background */
            box-shadow: 0 4px 10px rgba(30, 144, 255, 0.1);
            padding: 20px;
            margin: 20px;
            text-align: left;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            flex-direction: column; /* Align items vertically */
            font-family: 'Arial', sans-serif; /* More modern font */
        }

        .user-image {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            margin-bottom: 20px; /* Space below the image */
        }

        .user-details {
            flex: 1;
            text-align: center; /* Center text in details */
            color: #ffffff; /* White text to contrast with dark background */
        }

        .user-details h5 {
            font-size: 20px; /* Larger font for user name */
            font-weight: 700; /* Bold the name */
            margin-bottom: 10px;
            color: #ffffff; /* Highlight name with yellow color */
        }

        .user-details p {
            font-size: 16px; /* Medium size for other details */
            font-weight: 500; /* Semi-bold for details */
            margin-bottom: 5px;
        }

        .user-details strong {
            font-weight: 600; /* Highlight key points */
            color: #ffda79; /* Yellow for stronger emphasis */
        }

        .control-buttons {
            display: flex;
            justify-content: center; /* Center the buttons */
            gap: 10px;
            margin-top: 20px; /* Space above buttons */
        }

        .btn {
            width: 120px;
        }





        /* Pie Chart Color Palette */
    </style>


