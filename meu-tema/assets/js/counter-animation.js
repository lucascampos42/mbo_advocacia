document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200; // Velocidade da animação

    const animateCounter = (counter) => {
        const target = +counter.innerText.replace(/[^0-9]/g, '');
        const suffix = counter.innerText.replace(/[0-9]/g, '');
        
        const updateCount = () => {
            const count = +counter.getAttribute('data-count') || 0;
            const increment = target / speed;

            if (count < target) {
                counter.setAttribute('data-count', Math.ceil(count + increment));
                counter.innerText = Math.ceil(count + increment) + suffix;
                setTimeout(updateCount, 15);
            } else {
                counter.innerText = target + suffix;
            }
        };
        updateCount();
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        observer.observe(counter);
    });
});
