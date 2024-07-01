<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Gallery</title>
</head>
<style>
   body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #181818;
    color: #fff;
}

.container {
    width: 100%;
    margin: 0 auto;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

header h1 {
    margin: 0;
}

#gallery {
    padding: 50px;
}



.gallery-item img {
    width:  420px;
    height: 300px;
    border-radius: 5px;
    padding: 20px;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

footer p {
    margin: 0;
}

    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/50a7f855e9.js" crossorigin="anonymous"></script>
<body>
<nav>
        <label class="logo">GGG</label>
        <ul>
            <li><a href="main.html">Home</a></li>
            <li><a href="main.html#services">Services</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="main.html#contact">Contact</a></li>
            <li><a href="review.php">Reviews</a></li>
            <li><a href="registration_form.php">My Profile</a></li>
            <li><a href="view_appointment.php">Appointment</a></li>
        </ul>
    </nav>

    <section id="gallery">
        <div class="container">
            <br><br><center>
            <h1>Our Work</h1></center>
            <table>
            <tr>
            <td>
                <div class="gallery-item">
                    <img src="image1.jpg" alt="Haircut 1">
                    <td>
                </div>
                <td>
                <div class="gallery-item">
                    <img src="image6.jpg" alt="Nails 1">
                </td>
                </div>
                <td>
                <div class="gallery-item">
                    <img src="image3.jpg" alt="Makeup 1">
                </div>
                </td>
            </tr>

            <tr>
            <td>
                <div class="gallery-item">
                    <img src="image4.jpg" alt="Haircut 1">
                    <td>
                </div>
                <td>
                <div class="gallery-item">
                    <img src="image10.jpg" alt="Nails 1">
                </td>
                </div>
                <td>
                <div class="gallery-item">
                    <img src="image9.webp" alt="Makeup 1">
                </div>
                </td>
            </tr>
        </div>
       
        </table>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Salon Website. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
