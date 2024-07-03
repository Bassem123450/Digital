
// script.js// Get all slides and buttons
const slides = document.querySelectorAll('.custom-card-portfolio');
const prevBtn = document.querySelector('.swiper-button-prev');
const nextBtn = document.querySelector('.swiper-button-next');

let currentSlide = 1;
const slidesToShow = 3;

// Function to show the current slide
function showSlide(index) {
  slides.forEach((slide, i) => {
    if (i >= index && i < index + slidesToShow) {
      slide.style.display = 'block';
    } else {
      slide.style.display = 'none';
    }
  });
}

// Show initial slides
showSlide(currentSlide);

// Event listener for next button
nextBtn.addEventListener('click', () => {
  if (currentSlide + slidesToShow < slides.length) {
    currentSlide += slidesToShow;
    showSlide(currentSlide);
  }
});

// Event listener for previous button
prevBtn.addEventListener('click', () => {
  if (currentSlide - slidesToShow >= 0) {
    currentSlide -= slidesToShow;
    showSlide(currentSlide);
  }
});
