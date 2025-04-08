document.addEventListener('DOMContentLoaded', () => {
    const carouselInner = document.querySelector('.carousel-inner');
    let currentIndex = 0;

    function showNextSlide() {
      if (carouselInner.children.length > 0){
      currentIndex = (currentIndex < carouselInner.children.length - 1) ? currentIndex + 1 : 0;
      carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
    } 
    }
  
    function toggleMenu() {
      const navLinks = document.querySelector('.nav-list');
      navLinks.classList.toggle('active');
  }
  

    setInterval(showNextSlide, 5000); 
    new Typed('#typed-message', {
      strings: ["Welcome to Star Solar Energy and Electrical Services"],
      typeSpeed: 50,
      backSpeed: 25,
      backDelay: 2000,
      startDelay: 1000,
      loop: true
    });
  });
