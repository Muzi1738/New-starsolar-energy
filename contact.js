document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contact-form');
    const feedback = document.getElementById('contact-feedback');

    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        let valid = true;
        const fields = document.querySelectorAll('.contact-field');
        
        fields.forEach(field => {
            if (field.dataset.required === 'Y' && !field.value.trim()) {
                valid = false;
                field.style.borderColor = 'red';
            } else {
                field.style.borderColor = '#ccc';
            }
        });
    });
});
