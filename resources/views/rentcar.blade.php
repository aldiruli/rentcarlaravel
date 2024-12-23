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
                    <a class="nav-link" data-section="#about" onclick="scrollToSection('#about')">Our Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-section="#cars" onclick="scrollToSection('#cars')">About Us</a>
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

<a href="https://wa.me/1234567890" target="_blank" class="whatsapp-button">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- jumbotron -->
<div class="jumbotron" id="home">
    <div class="jumbotron-bg animate__animated animate__fadeInRight animate__slow">
        <!-- <div class="img-attrib">publicdomainq.net</div> -->
    </div> 
    <div class="jumbotron-content">
        @forelse ($homes as $home)
            <h1 class="best_text">{{ $home->title }}</h1>
            <p class="many_text">{{ $home->body }}</p>
        @empty
        @endforelse
        <div class="read_bt"><a onclick="scrollToSection('#about')">Our Cars</a></div>
    </div>
</div>

<!-- about us -->
<div id="about">
    <div class="container">
        <h2 class="text-center mb-4">Our Car List</h2>
        <div class="row">
            <div class="text-center col-md-12">
                <button type="button" id="showAll" class="btn btn-primary" onclick="filterCategory('all')">All</button>
                <button type="button" id="showCityCar" class="btn btn-primary" onclick="filterCategory('citycar')">City Car</button>
                <button type="button" id="showAPV" class="btn btn-primary" onclick="filterCategory('apv')">Apv/Mpv</button>
                <button type="button" id="showMiniBus" class="btn btn-primary" onclick="filterCategory('minibus')">Minibus</button>
                <button type="button" id="showSedan" class="btn btn-primary" onclick="filterCategory('sedan')">Sedan</button>
            </div>
        </div>
        <br>
        
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
                            <p class="card-text">{{ $car->current_status }}</p>
                            @if ($car->current_status === 'rented')
                                <p class="text-warning">
                                    Ready on: 
                                    {{ $car->returned_at ? \Carbon\Carbon::parse($car->returned_at)->addDay()->format('d-m-Y') : 'TBA' }}
                                </p>
                            @endif
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

<!-- Car List -->
<div id="cars">
    <div class="container">
        <h2 class="text-center mb-12">Your Rent Car</h2>
    <div class="row">
        <div class="col-md-6 about-zatrans">
            <img src="assets/img/template/toyota-alphard-rental-mobil-surabaya.png" class="img-fluid" alt="rental-mobil-surabaya">
        </div>
        <div class="col-md-6">
            @if($abouts->isEmpty())
                <p class="lead">No about content available.</p>
            @else
                @foreach ($abouts as $about)
                    <p class="lead">{{ $about->description }}</p>
                @endforeach
            @endif
            {{-- <p>{{ dd($abouts) }}</p> --}}
        </div>
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