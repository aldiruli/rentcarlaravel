<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- your tab logo here -->
    <link rel="icon" href="#">
    <title> Your Rent Car</title>
    <!-- Add Animate.css library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Link CSS dari Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/src/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #ffffff;">
            <!-- <img src="assets/img/template/zatrans-rent-car-icon3.png" alt="Zatrans Rent Car" width="150" height="50"> -->
            Your Logo Here
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-section="#home" onclick="scrollToSection('#home')">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-section="#about" onclick="scrollToSection('#about')">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-section="#cars" onclick="scrollToSection('#cars')">Our Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-section="#services" onclick="scrollToSection('#services')">Our Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-section="#contact" onclick="scrollToSection('#contact')">Contact</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>

<!-- jumbotron -->
<div class="jumbotron" id="home">
    <div class="jumbotron-bg animate__animated animate__fadeInRight animate__slow">
        <!-- <div class="img-attrib">publicdomainq.net</div> -->
    </div> <!-- Bagian latar belakang -->
    <div class="jumbotron-content">
        @forelse ($homes as $home)
            <h1 class="best_text">{{ $home->title }}</h1>
            <p class="many_text">{{ $home->body }}</p>
        @empty
            {{-- <h1 class="best_text">We Are<br>Best Guide<br>For Your Transportation</h1>
            <p class="many_text">There are Many Choices & Variations</p> --}}
        @endforelse
        <div class="read_bt"><a onclick="scrollToSection('#about')">About Us</a></div>
    </div>
</div>

<!-- about us -->
<div id="about">
    <div class="container">
        <h2 class="text-center mb-12">Your Rent Car</h2>
    <div class="row">
        <div class="col-md-6 about-zatrans">
            <img src="assets/img/template/toyota-alphard-rental-mobil-surabaya.png" class="img-fluid" alt="rental-mobil-surabaya">
        </div>
        <div class="col-md-6">
            <p class="lead">Welcome to Your Rent Car, We are the leading car rental company in Surabaya. a place where your journey is not just about getting to your destination, but also becomes an extraordinary, unforgettable adventure.</p>
            <p class="lead">With a commitment to providing an unrivaled driving experience, we understand that a journey is more than just a route from A to B. That's why we're here to give you more than just a car – we take you on a journey full of wonderful memories and unmatched freedom .</p>  
        </div>
    </div>
    </div>
</div>

<!-- Car List -->
<div id="cars">
    <div class="container">
        <h2 class="text-center mb-4">Our Car List</h2>
        <div class="row">
            <div class="text-center col-md-12">
                <button type="button" id="showAll" class="btn btn-primary" onclick="filterCategory('all')">All</button>
                <button type="button" id="showSUV" class="btn btn-primary" onclick="filterCategory('SUV')">SUV</button>
                <button type="button" id="showMiniBus" class="btn btn-primary" onclick="filterCategory('Minibus')">Mini bus</button>
            </div>
        </div>
        <br>
        {{-- <div class="row">
            <!-- cars card -->
            <div class="col-md-4 mb-4 minibus">
                <div class="card text-center">
                    <img src="assets/img/alphard-rental-mobil-sby.png" class="card-img-top" alt="rental-mobil-surabaya-alphard">
                    <div class="card-body">
                        <h5 class="card-title">Alpha</h5>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam maxime quo quod, in repellendus, eligendi quia voluptatem voluptas necessitatibus dolor quibusdam! Ducimus nam ipsam totam perspiciatis, soluta porro vel! </p>
                        <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></li> rent now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 suv">
                <div class="card text-center">
                    <img src="assets/img/fortuner-rental-mobil-sby.png" class="card-img-top" alt="rental-mobil-surabaya-Fortuner">
                    <div class="card-body">
                        <h5 class="card-title">Fortune</h5>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam maxime quo quod, in repellendus, eligendi quia voluptatem voluptas necessitatibus dolor quibusdam! Ducimus nam ipsam totam perspiciatis, soluta porro vel! </p>
                        <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></li> rent now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="assets/img/inova-rental-mobil-sby.png" class="card-img-top" alt="rental-mobil-surabaya-innova-reborn">
                    <div class="card-body">
                        <h5 class="card-title">Innovation</h5>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam maxime quo quod, in repellendus, eligendi quia voluptatem voluptas necessitatibus dolor quibusdam! Ducimus nam ipsam totam perspiciatis, soluta porro vel! </p>
                        <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></li> rent now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="assets/img/xenia-rental-mobil-sby.png" class="card-img-top" alt="rental-mobil-surabaya-xenia">
                    <div class="card-body">
                        <h5 class="card-title">Xena</h5>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam maxime quo quod, in repellendus, eligendi quia voluptatem voluptas necessitatibus dolor quibusdam! Ducimus nam ipsam totam perspiciatis, soluta porro vel! </p>
                        <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></li> rent now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="assets/img/xpander-rental-mobil-sby.png" class="card-img-top" alt="rental-mobil-surabaya-xpander">
                    <div class="card-body">
                        <h5 class="card-title">Spander</h5>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam maxime quo quod, in repellendus, eligendi quia voluptatem voluptas necessitatibus dolor quibusdam! Ducimus nam ipsam totam perspiciatis, soluta porro vel! </p>
                        <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></li> rent now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="assets/img/avanza-rental-mobil-sby.png" class="card-img-top" alt="rental-mobil-surabaya-avanza">
                    <div class="card-body">
                        <h5 class="card-title">Avan</h5>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam maxime quo quod, in repellendus, eligendi quia voluptatem voluptas necessitatibus dolor quibusdam! Ducimus nam ipsam totam perspiciatis, soluta porro vel! </p>
                        <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></li> rent now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-2">
                
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="assets/img/hiace-rental-mobil-sby.png" class="card-img-top" alt="rental-mobil-surabaya-hiace-commuter">
                    <div class="card-body">
                        <h5 class="card-title">Hi com</h5>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam maxime quo quod, in repellendus, eligendi quia voluptatem voluptas necessitatibus dolor quibusdam! Ducimus nam ipsam totam perspiciatis, soluta porro vel! </p>
                        <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></li> rent now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="assets/img/hiace-premio-rental-mobil-sby.png" class="card-img-top" alt="rental-mobil-surabaya-hiace-premio">
                    <div class="card-body">
                        <h5 class="card-title">Hi Prem</h5>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam maxime quo quod, in repellendus, eligendi quia voluptatem voluptas necessitatibus dolor quibusdam! Ducimus nam ipsam totam perspiciatis, soluta porro vel! </p>
                        <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></li> rent now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-2">
                
            </div>
            <!-- Add another car card here -->
        </div> --}}
        <div class="row">
            @forelse ($cars as $car)
                <div class="col-md-4 mb-4 {{ strtolower($car->category) }}">
                    <div class="card text-center">
                        <img src="{{ $car->image ? asset('storage/' . $car->image) : 'assets/img/default-image.png' }}" 
                             class="card-img-top" 
                             alt="{{ $car->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->title }}</h5>
                            <p class="card-text">{{ $car->description }}</p>
                            <a href="https://wa.me/1234567890" class="btn btn-primary">
                                <i class="fab fa-whatsapp"></i> Rent Now
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        No cars available at the moment.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Our Services -->
<div id="services">
    <h2 class="text-center mb-12">Our Services</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="service-card">
                    <i class="fas fa-car"></i>
                    <h4>Car Rental</h4>
                    <p>Providing various types of cars for your travel needs.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <i class="fas fa-dollar-sign"></i>
                    <h4>Affordable prices</h4>
                    <p>Offering Quality Cars at Affordable Prices.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <i class="fas fa-tools"></i>
                    <h4>Professional Team</h4>
                    <p>Our professional team is ready to help take you to your destination.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <i class="fas fa-tools"></i>
                    <h4>Professional Team</h4>
                    <p>Our professional team is ready to help take you to your destination.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="service-card">
                    <i class="fas fa-car"></i>
                    <h4>Car Rental</h4>
                    <p>Providing various types of cars for your travel needs.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <i class="fas fa-dollar-sign"></i>
                    <h4>Affordable prices</h4>
                    <p>Offering Quality Cars at Affordable Prices.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <i class="fas fa-tools"></i>
                    <h4>Professional Team</h4>
                    <p>Our professional team is ready to help take you to your destination.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <i class="fas fa-tools"></i>
                    <h4>Professional Team</h4>
                    <p>Our professional team is ready to help take you to your destination.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->
<div id="contact">
    <div class="container">
        <h2 class="text-center mb-4">Contact</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                {{-- <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message <i class="fa fa-paper-plane"></i> </button>
                </form> --}}
                
                <ul>
                    <li>
                        <h3>Your Logo Here</h3>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <b>Jalan Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla distinctio corrupti animi et voluptates aliquam in tempore dolorum! Earum totam possimus, ullam similique saepe error veritatis vero iusto nihil sequi?</b>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <b>+031 xxxxxx xxxxx</b>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <b>test@mail.com</b>
                    </li>
                    <li>
                        <i class="fab fa-whatsapp"></i>
                        <b>+62 xxx xxx xxxx</b>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15864.89636545208!2d112.730877!3d-7.257472499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc63159f75e7%3A0x303d85670d1199d7!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sen!2sid!4v1667785425515!5m2!1sen!2sid"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 Your Rent Car. All rights reserved. Designed & Developed by <a href="https://aldiruli.github.io/" style="color: #fff;"> Aldi Ruliansyah</a></p>
</div>

<!-- Link JavaScript from Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="assets/src/style.js"></script>
{{-- filter kategori mobil --}}
<script>
    function filterCategory(category) {
        // AJAX request
        fetch(`/rentcar/filter/${category}`)
            .then(response => response.json())
            .then(data => {
                // Clear the container
                const container = document.getElementById('carContainer');
                container.innerHTML = '';

                // Check if there are any cars
                if (data.length > 0) {
                    // Loop through the cars and create cards
                    data.forEach(car => {
                        const card = `
                            <div class="col-md-4 mb-4">
                                <div class="card text-center">
                                    <img src="${car.image ? '/storage/' + car.image : 'assets/img/default-image.png'}" 
                                         class="card-img-top" 
                                         alt="${car.title}">
                                    <div class="card-body">
                                        <h5 class="card-title">${car.title}</h5>
                                        <p class="card-text">${car.description}</p>
                                        <a href="https://wa.me/1234567890" class="btn btn-primary">
                                            <i class="fab fa-whatsapp"></i> Rent Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;
                        container.insertAdjacentHTML('beforeend', card);
                    });
                } else {
                    // Show a message if no cars are available
                    container.innerHTML = `
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                No cars available for this category.
                            </div>
                        </div>
                    `;
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>