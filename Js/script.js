window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    header.style.boxShadow = window.scrollY > 10 ? '0 2px 20px rgba(0, 0, 0, 0.15)' : '0 2px 10px rgba(0, 0, 0, 0.1)';
  });