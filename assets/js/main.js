// main.js





// 3. Scroll reveal
const faders = document.querySelectorAll('.fade-in');
const appearOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };

const appearOnScroll = new IntersectionObserver((entries, obs) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting) return;
    entry.target.classList.add('appear');
    obs.unobserve(entry.target);
  });
}, appearOptions);

faders.forEach(el => {
  appearOnScroll.observe(el);
});

// 4. Form validation
const form = document.getElementById('contactForm');
form.addEventListener('submit', e => {
  const name = form.querySelector('input[placeholder="Name"]').value.trim();
  const email = form.querySelector('input[type="email"]').value.trim();
  const msg = form.querySelector('textarea').value.trim();
  if (!name || !email || !msg) {
    e.preventDefault();
    alert('Please fill in all required fields.');
  }
});

// 5. Back to top
const btnTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
  btnTop.classList.toggle('show', window.pageYOffset > 300);
});
btnTop.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});


