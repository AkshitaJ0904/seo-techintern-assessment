/**
 * Main JavaScript file for frontend Product Listing Platform
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize components
    initNavigation();
    initProductFilters();
    initCategorySlider();
    initBackToTop();
    initTooltips();
});

/**
 * Initialize the responsive navigation
 */
function initNavigation() {
    const menuToggle = document.querySelector('.navbar-toggler');
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            const navMenu = document.querySelector('.navbar-collapse');
            navMenu.classList.toggle('show');
            this.setAttribute('aria-expanded', navMenu.classList.contains('show'));
        });
    }
    
    // Add shadow to navbar on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        }
    });
}

/**
 * Initialize product filtering functionality
 */
function initProductFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const products = document.querySelectorAll('.product-card');
    
    if (filterButtons.length && products.length) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-filter');
                
                // Show all products if 'all' is selected
                if (filterValue === 'all') {
                    products.forEach(product => {
                        product.style.display = 'block';
                    });
                } else {
                    // Filter products by category
                    products.forEach(product => {
                        if (product.getAttribute('data-category') === filterValue) {
                            product.style.display = 'block';
                        } else {
                            product.style.display = 'none';
                        }
                    });
                }
            });
        });
    }
    
    // Price range slider
    const priceRange = document.getElementById('price-range');
    if (priceRange && typeof noUiSlider !== 'undefined') {
        noUiSlider.create(priceRange, {
            start: [0, 1000],
            connect: true,
            range: {
                'min': 0,
                'max': 1000
            },
            format: {
                to: function(value) {
                    return Math.round(value);
                },
                from: function(value) {
                    return Math.round(value);
                }
            }
        });
        
        const minPriceDisplay = document.getElementById('min-price');
        const maxPriceDisplay = document.getElementById('max-price');
        
        priceRange.noUiSlider.on('update', function(values) {
            minPriceDisplay.textContent = '$' + values[0];
            maxPriceDisplay.textContent = '$' + values[1];
            
            filterProductsByPrice(parseInt(values[0]), parseInt(values[1]));
        });
    }
    
    function filterProductsByPrice(min, max) {
        products.forEach(product => {
            const price = parseInt(product.getAttribute('data-price'));
            if (price >= min && price <= max) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }
}

/**
 * Initialize category slider for homepage
 */
function initCategorySlider() {
    const categorySlider = document.querySelector('.category-slider');
    if (categorySlider && typeof Swiper !== 'undefined') {
        new Swiper('.category-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 4,
                }
            }
        });
    }
}

/**
 * Initialize back to top button
 */
function initBackToTop() {
    const backToTopBtn = document.querySelector('.back-to-top');
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });
        
        backToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

/**
 * Initialize tooltips
 */
function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    if (tooltipTriggerList.length && typeof bootstrap !== 'undefined') {
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
}

/**
 * Product search functionality
 */
function searchProducts() {
    const searchInput = document.getElementById('searchInput');
    const searchTerm = searchInput.value.toLowerCase();
    const products = document.querySelectorAll('.product-card');
    
    products.forEach(product => {
        const title = product.querySelector('.product-title').textContent.toLowerCase();
        const description = product.querySelector('.product-description').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}