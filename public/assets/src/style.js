        $(document).ready(function () {
            function updateNavbar() {
                if ($(window).scrollTop() > 50) { 
                    $('.navbar').addClass('scroll').removeClass('hover');
                    $('.navbar').css('z-index', '100'); 
                } else {
                    $('.navbar').removeClass('scroll hover');
                    $('.navbar').css('z-index', '-1');
                }
            }

            updateNavbar();

            $(window).scroll(function () {
                updateNavbar();
            });
        });
            
        $(document).ready(function () {
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
                            $navbarLink.addClass('active');
                        } else {
                            $navbarLink.removeClass('active');
                        }
                    }
                });
            }

            updateNavbar();

            $(window).scroll(function () {
                updateNavbar();
            });
        });
            
        function scrollToSection(sectionId) {
            const section = document.querySelector(sectionId);

            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });

                const navbarLinks = document.querySelectorAll('.nav-link');
                navbarLinks.forEach((link) => {
                    link.classList.remove('active');
                });

                const activeLink = document.querySelector(`[data-section="${sectionId}"]`);
                activeLink.classList.add('active');
            }
        }

        const navbarLinks = document.querySelectorAll('.nav-link');
        navbarLinks.forEach((link) => {
            link.addEventListener('click', function () {
                const sectionId = link.getAttribute('data-section');
                scrollToSection(sectionId);
            });
        });

        document.getElementById("showAll").addEventListener("click", function() {
            showCars("all");
        });
        
        document.getElementById("showCityCar").addEventListener("click", function() {
            showCars("citycar");
        });

        document.getElementById("showAPV").addEventListener("click", function() {
            showCars("apv");
        });
        
        document.getElementById("showMiniBus").addEventListener("click", function() {
            showCars("minibus");
        });
        
        document.getElementById("showSedan").addEventListener("click", function() {
            showCars("sedan");
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
        
                const activeButton = document.getElementById("show" + category.toUpperCase());
                activeButton.classList.add(".active");
            }
        }
               
        document.addEventListener("DOMContentLoaded", () => {
            const animatedElements = document.querySelectorAll('.animate__animated');
            
            const observer = new IntersectionObserver((entries) => {
              entries.forEach(entry => {
                const inAnimation = entry.target.getAttribute('data-animate-in'); 
                const outAnimation = entry.target.getAttribute('data-animate-out'); 
                
                if (entry.isIntersecting) {
                  entry.target.classList.add(inAnimation); 
                  if (outAnimation) {
                    entry.target.classList.remove(outAnimation);
                  }
                } else {
                  if (outAnimation) {
                    entry.target.classList.add(outAnimation);
                  }
                  entry.target.classList.remove(inAnimation);
                }
              });
            });
          
            animatedElements.forEach(el => {
              observer.observe(el);
            });
          });