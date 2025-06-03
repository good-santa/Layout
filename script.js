// Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

document.querySelector('.secondary-button').addEventListener('click', (e) => {
    e.preventDefault();
    const aboutSection = document.querySelector('#about');
    aboutSection.scrollIntoView({ behavior: 'smooth' });
});

// Mobile Menu
const mobileMenuButton = document.querySelector('.mobile-menu-button');
const navMenu = document.querySelector('.nav-menu');

if (window.innerWidth <= 768) {
    navMenu.style.display = 'none';
}

function toggleMobileMenu() {
    if (!navMenu.classList.contains('active')) {
        navMenu.style.display = 'flex';
        navMenu.classList.add('active');
        mobileMenuButton.classList.add('active');
    } else {
        navMenu.classList.remove('active');
        mobileMenuButton.classList.remove('active');
        setTimeout(() => {
            navMenu.style.display = 'none';
        }, 300);
    }
}

mobileMenuButton.addEventListener('click', function(e) {
    e.stopPropagation();
    toggleMobileMenu();
});

document.addEventListener('click', function(e) {
    if (window.innerWidth <= 768 && 
        !navMenu.contains(e.target) && 
        !mobileMenuButton.contains(e.target) &&
        navMenu.classList.contains('active')) {
        toggleMobileMenu();
    }
});

window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        navMenu.classList.remove('active');
        mobileMenuButton.classList.remove('active');
        navMenu.style.display = 'flex';
    } else if (!navMenu.classList.contains('active')) {
        navMenu.style.display = 'none';
    }
});

// Scroll Animations
const animateOnScroll = () => {
    const elements = document.querySelectorAll('.feature, .course-card, .timeline-content, .review-card, .countdown-item, .special-offer-button');
    
    elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementPosition < windowHeight - 100) {
            element.classList.add('animate');
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }
    });
};

document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('.feature, .course-card, .timeline-content, .review-card, .countdown-item, .special-offer-button');
    
    elements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
    
    animateOnScroll();
});

let ticking = false;
window.addEventListener('scroll', () => {
    if (!ticking) {
        window.requestAnimationFrame(() => {
            animateOnScroll();
            ticking = false;
        });
        ticking = true;
    }
});

// Form Handling
const contactForm = document.querySelector('.contact-form form');
if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const formData = new FormData(contactForm);
        const data = Object.fromEntries(formData);
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(data.email)) {
            alert('Будь ласка, введіть коректну email адресу');
            return;
        }
        
        console.log('Form submitted:', data);
        
        alert('Дякуємо за ваше повідомлення! Ми зв\'яжемося з вами найближчим часом.');
        contactForm.reset();
    });
}

// Modal Window
const modal = document.getElementById('applicationModal');
const ctaButton = document.querySelector('.cta-button');
const closeModal = document.querySelector('.close-modal');
const applicationForm = document.getElementById('applicationForm');
const courseSelect = document.getElementById('course');

function openModalWithCourse(courseValue) {
    if (courseValue === 'special-offer') {
        const courseSelect = document.getElementById('course');
        courseSelect.value = 'tas-creation';
        const priceElement = document.querySelector('.course-price .price');
        const originalPrice = parseInt(priceElement.textContent.replace('$', ''));
        const discountedPrice = originalPrice * 0.8;
        priceElement.textContent = `$${discountedPrice.toFixed(2)}`;
    }
    courseSelect.value = courseValue;
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

ctaButton.addEventListener('click', () => {
    openModalWithCourse('');
});

document.querySelectorAll('.course-button').forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        const courseCard = button.closest('.course-card');
        const courseTitle = courseCard.querySelector('h3').textContent;
        const courseValue = courseTitle.includes('Створення') ? 'tas-creation' : 'tas-usage';
        openModalWithCourse(courseValue);
    });
});

closeModal.addEventListener('click', () => {
    modal.classList.remove('active');
    document.body.style.overflow = '';
});

modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
});

applicationForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const formData = {
        course: document.getElementById('course').value,
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        experience: document.getElementById('experience').value,
        message: document.getElementById('message').value
    };
    
    console.log('Application submitted:', formData);
    
    alert('Дякуємо за вашу заявку! Ми зв\'яжемося з вами найближчим часом.');
    
    modal.classList.remove('active');
    document.body.style.overflow = '';
    applicationForm.reset();
});

// Swiper Initialization
const swiper = new Swiper('.reviewSwiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

// Cookie Consent
document.addEventListener('DOMContentLoaded', function() {
    const cookieConsent = document.getElementById('cookieConsent');
    const acceptButton = document.getElementById('acceptCookies');
    const declineButton = document.getElementById('declineCookies');

    const cookieChoice = localStorage.getItem('cookieConsent');
    
    if (cookieChoice === null) {
        cookieConsent.style.display = 'block';
    }

    acceptButton.addEventListener('click', function(e) {
        e.stopPropagation();
        localStorage.setItem('cookieConsent', 'accepted');
        cookieConsent.style.display = 'none';
    });

    declineButton.addEventListener('click', function(e) {
        e.stopPropagation();
        localStorage.setItem('cookieConsent', 'declined');
        cookieConsent.style.display = 'none';
        
        setTimeout(function() {
            localStorage.removeItem('cookieConsent');
            cookieConsent.style.display = 'block';
        }, 24 * 60 * 60 * 1000);
    });
});

// Scroll to Top
document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopButton = document.getElementById('scrollToTop');

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollToTopButton.classList.add('visible');
        } else {
            scrollToTopButton.classList.remove('visible');
        }
    });

    scrollToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

// Theme Toggle
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.documentElement.setAttribute('data-theme', savedTheme);
    } else {
        document.documentElement.setAttribute('data-theme', prefersDarkScheme.matches ? 'dark' : 'light');
    }
    
    themeToggle.addEventListener('click', function() {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
});

// Countdown Timer
function updateCountdown() {
    const endTime = localStorage.getItem('countdownEndTime');
    let targetTime;
    
    if (!endTime) {
        targetTime = new Date().getTime() + (24 * 60 * 60 * 1000);
        localStorage.setItem('countdownEndTime', targetTime);
    } else {
        targetTime = parseInt(endTime);
    }
    
    function update() {
        const now = new Date().getTime();
        const distance = targetTime - now;
        
        if (distance < 0) {
            targetTime = new Date().getTime() + (24 * 60 * 60 * 1000);
            localStorage.setItem('countdownEndTime', targetTime);
        }
        
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
    }
    
    update();
    setInterval(update, 1000);
}

document.addEventListener('DOMContentLoaded', updateCountdown); 