        $(document).ready(function () {
            // Function to toggle classes based on scroll position
            function updateNavbar() {
                if ($(window).scrollTop() > 50) { // Change the value as needed
                    $('.navbar').addClass('scroll').removeClass('hover');
                    $('.navbar').css('z-index', '100'); // Change the z-index value
                } else {
                    $('.navbar').removeClass('scroll hover');
                    $('.navbar').css('z-index', '-1'); // Reset the z-index value
                }
            }

            // Toggle classes on initial page load
            updateNavbar();

            // Toggle classes on scroll
            $(window).scroll(function () {
                updateNavbar();
            });
        });
            
        $(document).ready(function () {
            // Function to toggle classes based on scroll position
            function updateNavbar() {
                const sectionsToAnimate = ['#home', '#about', '#cars', '#services', '#contact'];

                sectionsToAnimate.forEach(sectionId => {
                    const $section = $(sectionId);
                    const $navbarLink = $(`.navbar .nav-link[data-section="${sectionId}"]`);

                    if ($section.length) {
                        const sectionTop = $section.offset().top;
                        const sectionBottom = sectionTop + $section.outerHeight();
                        const navbarTop = $('.navbar').offset().top;

                        if (navbarTop >= sectionTop && navbarTop <= sectionBottom) {
                            // Navbar is touching or above this section
                            $navbarLink.addClass('active');
                        } else {
                            $navbarLink.removeClass('active');
                        }
                    }
                });
            }

            // Toggle classes on initial page load
            updateNavbar();

            // Toggle classes on scroll
            $(window).scroll(function () {
                updateNavbar();
            });
        });
            
        // Fungsi untuk menangani klik di navbar
        function scrollToSection(sectionId) {
            // Mengambil elemen yang sesuai dengan sectionId
            const section = document.querySelector(sectionId);

            if (section) {
                // Menggulir ke elemen tersebut
                section.scrollIntoView({ behavior: 'smooth' });

                // Menghapus kelas 'active' dari semua elemen navbar
                const navbarLinks = document.querySelectorAll('.nav-link');
                navbarLinks.forEach((link) => {
                    link.classList.remove('active');
                });

                // Menambahkan kelas 'active' ke elemen navbar yang sesuai
                const activeLink = document.querySelector(`[data-section="${sectionId}"]`);
                activeLink.classList.add('active');
            }
        }

        // Menangani klik di setiap elemen navbar
        const navbarLinks = document.querySelectorAll('.nav-link');
        navbarLinks.forEach((link) => {
            link.addEventListener('click', function () {
                // Mendapatkan sectionId dari atribut data-section
                const sectionId = link.getAttribute('data-section');
                scrollToSection(sectionId);
            });
        });

        document.getElementById("showAll").addEventListener("click", function() {
            showCars("all");
        });
        
        document.getElementById("showSUV").addEventListener("click", function() {
            showCars("suv");
        });
        
        document.getElementById("showMiniBus").addEventListener("click", function() {
            showCars("minibus");
        });        

        function showCars(category) {
            const allCards = document.querySelectorAll(".col-md-4");
            allCards.forEach(card => {
                card.style.display = "none";
            });
        
            const categoryButtons = document.querySelectorAll(".btn-primary");
            categoryButtons.forEach(button => {
                button.classList.remove("active");
            });
        
            if (category === "all") {
                allCards.forEach(card => {
                    card.style.display = "block";
                });
            } else {
                const categoryCards = document.querySelectorAll("." + category);
                categoryCards.forEach(card => {
                    card.style.display = "block";
                });
        
                // Tandai tombol yang aktif
                const activeButton = document.getElementById("show" + category.toUpperCase());
                activeButton.classList.add(".active");
            }
        }
               