<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beauty Salon</title>
  <link rel="stylesheet" href="styles.css">
 <style> 
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #f8f8f8;
  padding: 20px;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1, h2, h3 {
  color: #333;
}

nav ul {
  list-style: none;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-right: 20px;
}

a {
  text-decoration: none;
  color: #333;
}

section {
  padding: 50px 0;
}

.review {
  margin-bottom: 20px;
}
</style>
</head>
<body>
  <header>
    <h1>Welcome to our Beauty Salon</h1>
    <nav>
      <ul>
        <li><a href="#about">About Us</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#reviews">Reviews</a></li>
      </ul>
    </nav>
  </header>

  <section id="about">
    <div class="container">
      <h2>About Us</h2>
      <p>Welcome to our beauty salon! We offer a wide range of services including haircuts, styling, coloring, manicures, pedicures, and more. Our experienced staff is dedicated to providing you with the highest level of service to ensure your satisfaction.</p>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <h2>Contact</h2>
      <p>For appointments or inquiries, please contact us:</p>
      <ul>
        <li>Phone: 123-456-7890</li>
        <li>Email: info@beautysalon.com</li>
        <li>Address: 123 Beauty St, City, Country</li>
      </ul>
    </div>
  </section>

  <section id="reviews">
    <div class="container">
      <h2>Reviews</h2>
      <div class="review">
        <h3>John Doe</h3>
        <p>"I love this salon! The staff is friendly and professional, and I always leave feeling fabulous."</p>
      </div>
      <div class="review">
        <h3>Jane Smith</h3>
        <p>"Highly recommend! Great atmosphere and excellent service."</p>
      </div>
    </div>
  </section>

  <script src="script.js"></script>
</body>
</html>

