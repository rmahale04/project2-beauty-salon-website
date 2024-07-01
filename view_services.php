<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/50a7f855e9.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body, html {
    margin: 20;
    padding: 20;
    font-family: Castellar, sans-serif;
    background-color: hsl(188, 80%, 2%);
}

/* Style for horizontal navigation bar */
.navbar {
    overflow: hidden;
    background-color: #060000;
}

.navbar a {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 30px 20px;
    text-decoration: none;
}

.navbar a:hover {
    background-color:dark grey;
}

.navbar a.active {
    background-color: #4d97e1;
}

/* Style for main content area */
.main-content {
    padding: 20px;
}

/* Style for section headings */
h2 {
    color: #fcf9f9;
}

/* Responsive design for navigation bar */
@media screen and (max-width: 600px) {
    .navbar a {
        float: none;
        display: block;
        text-align: center;
    }
}
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            color: #fff
        }
        th {
            /* background-color: #f2f2f2; */
            background-color: #333; 
        }
        tr:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <!-- Horizontal Navigation Bar -->
    <nav class="navbar">
        <a href="view_services.php" class="active">view service</a>
        <a href="cust_details.php">Customer Details</a>
        <a href="view_reviews.php" >view reviews</a>
        <a href="admin_registration.php">add admin</a>
        <a href="admin_booked_appointments.php">Book Appointment</a>
        <a href="add_services.php">add service</a>
</nav><br><br>
    <section id="services" class="category">
        <p>Our Services</p>
        <a href="admin_skin_care.php" class="category-box">
            <div class="dark-overlay"></div>
            <h2>Skin Care</h2>
        </a>
        <a href="admin_hair_cut.php" class="category-box">
            <div class="dark-overlay"></div>
            <h2>Hair Cut</h2>
        </a>
        <a href="admin_nail_care.php" class="category-box">
            <div class="dark-overlay"></div>
            <h2>Nail Care</h2>
        </a>
        <a href="admin_make_up.php" class="category-box">
            <div class="dark-overlay"></div>
            <h2>Make-Up</h2>
        </a>
    </section>
    <br><br>

<br>
<br>
<!-- <div class="add-customer">
    <a href="add_customer.php"><button>Add Customer</button></a>
</div> -->
</body>
</html>