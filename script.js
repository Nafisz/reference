        particlesJS.load('particles-js', 'particles.json', function() {
            console.log('particles.js loaded');
        });

        // Script animasi scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.about-section').forEach((section) => {
                observer.observe(section);
            });
        });