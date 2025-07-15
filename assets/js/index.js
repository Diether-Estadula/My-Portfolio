// Slick Carousel Initialization
$(document).ready(function () {
    $('.slick-carousel').slick({
      speed: 5000,
      autoplay: true,
      autoplaySpeed: 0,
      cssEase: 'linear',
      infinite: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      pauseOnHover: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 4
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2
          }
        }
      ]
    });
});
  
// AOS Animation Initialization
AOS.init({
    duration: 1000,
    once: true
});
  
// Scroll to Top Button
document.addEventListener('DOMContentLoaded', function () {
    const scrollToTopBtn = document.getElementById("scrollToTopBtn");
  
    window.addEventListener("scroll", () => {
      if (window.pageYOffset > 300) {
        scrollToTopBtn.style.display = "block";
      } else {
        scrollToTopBtn.style.display = "none";
      }
    });
  
    scrollToTopBtn.addEventListener("click", (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });

    const burgerBtn = document.getElementById('burgerBtn');
    const closeBtn = document.getElementById('closeBtn');
    const navbar = document.getElementById('navbarContent');
  
    const linkButtons = document.querySelectorAll('.nav-link');

    linkButtons.forEach(button => {
      button.addEventListener('click', () => {
        navbar.classList.remove('show');
      });
    });

    burgerBtn.addEventListener('click', () => {
      navbar.classList.add('show');
    });
    
    closeBtn.addEventListener('click', () => {
      navbar.classList.remove('show');
    });

    document.getElementById('contactForm').addEventListener('submit', async function(e) {
      e.preventDefault(); // stop default form submission
    
      const form = e.target;
      const formData = new FormData(form);
      const sentMessage = document.getElementById('sent-message');
      const errorMessage = document.getElementById('error-message');
    
      try {
        const response = await fetch("https://formsubmit.co/dietherestadula456@gmail.com", {
          method: "POST",
          body: formData,
          headers: {
            'Accept': 'application/json'
          }
        });
    
        if (response.ok) {
          sentMessage.textContent = "Your message has been sent successfully!";
          sentMessage.classList.add('d-block');
          form.reset();
        } else {
          errorMessage.textContent = "There was a problem sending your message.";
          errorMessage.classList.add('d-block');
        }
      } catch (error) {
        errorMessage.textContent = "Something went wrong. Please try again later.";
        errorMessage.classList.add('d-block');
      }
    });
});
  