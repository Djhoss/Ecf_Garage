
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

// fLECHE RETOUR HAUT DE PAGE

window.addEventListener('scroll', function() {
    if (window.pageYOffset > 200) {
        document.getElementById('back-to-top').style.display = 'block';
    } else {
        document.getElementById('back-to-top').style.display = 'none';
    }
});

document.getElementById('back-to-top').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

  
  
  