import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// ===== INTERSECTION OBSERVER: Scroll Animations =====
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px',
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-8');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elemen dengan class animate-on-scroll
    document.querySelectorAll('.animate-on-scroll').forEach((el) => {
        el.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700', 'ease-out');
        observer.observe(el);
    });

    // ===== COUNTER ANIMATION =====
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    el.textContent = Math.floor(current).toLocaleString('id-ID');
                }, 16);

                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-count]').forEach((el) => {
        counterObserver.observe(el);
    });

    // ===== NAVBAR: Sticky with scroll effect =====
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-dark-900/95', 'backdrop-blur-md', 'shadow-xl', 'border-b', 'border-dark-700');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-dark-900/95', 'backdrop-blur-md', 'shadow-xl', 'border-b', 'border-dark-700');
                navbar.classList.add('bg-transparent');
            }
        });
    }

    // ===== IMAGE PREVIEW on Upload =====
    document.querySelectorAll('input[type="file"][data-preview]').forEach((input) => {
        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            const previewId = input.getAttribute('data-preview');
            const preview = document.getElementById(previewId);

            if (file && preview) {
                const reader = new FileReader();
                reader.onload = (ev) => {
                    preview.src = ev.target.result;
                    preview.classList.remove('hidden');
                    preview.parentElement.querySelector('.upload-placeholder')?.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // ===== AUTO-DISMISS FLASH MESSAGES =====
    const flashMessages = document.querySelectorAll('[data-flash]');
    flashMessages.forEach((msg) => {
        setTimeout(() => {
            msg.style.transition = 'opacity 0.5s ease-out, transform 0.5s ease-out';
            msg.style.opacity = '0';
            msg.style.transform = 'translateY(-10px)';
            setTimeout(() => msg.remove(), 500);
        }, 4000);
    });
});
