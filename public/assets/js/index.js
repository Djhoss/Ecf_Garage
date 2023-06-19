
// Récupérer tous les témoignages
const testimonials = document.querySelectorAll('.zoom');

// Ajouter un gestionnaire d'événement pour chaque témoignage
testimonials.forEach(testimonial => {
    testimonial.addEventListener('mouseover', () => {
        testimonial.classList.add('active');
    });

    testimonial.addEventListener('mouseout', () => {
        testimonial.classList.remove('active');
    });
});


  
  
  