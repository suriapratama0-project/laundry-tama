document.addEventListener('scroll', function() {
  const boxes = document.querySelectorAll('.box');
  const windowHeight = window.innerHeight;
  
  boxes.forEach(function(box) {
    const boxTop = box.getBoundingClientRect().top;
    
    if (boxTop < windowHeight - 50) {
      box.classList.add('visible');
    }
  });
});
