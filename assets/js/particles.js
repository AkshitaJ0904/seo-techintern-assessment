document.addEventListener('DOMContentLoaded', function() {
    // Create particles
    for (let i = 0; i < 30; i++) {
        createParticle();
    }
    
    // Initialize gradients and effects
    initializeGradients();
});

function createParticle() {
    const particle = document.createElement('div');
    particle.classList.add('particle');
    
    // Random size between 3-8px
    const size = Math.random() * 5 + 3;
    particle.style.width = `${size}px`;
    particle.style.height = `${size}px`;
    
    // Random position
    particle.style.left = `${Math.random() * 100}vw`;
    particle.style.top = `${Math.random() * 100}vh`;
    
    // Random opacity
    particle.style.opacity = Math.random() * 0.3;
    
    // Random animation duration between 30-90s
    const duration = Math.random() * 60 + 30;
    particle.style.animation = `floatParticle ${duration}s linear infinite`;
    
    // Create keyframe animation unique to this particle
    const keyframes = `
    @keyframes floatParticle {
        0% {
            transform: translate(0, 0);
        }
        25% {
            transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px);
        }
        50% {
            transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px);
        }
        75% {
            transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px);
        }
        100% {
            transform: translate(0, 0);
        }
    }`;
    
    const style = document.createElement('style');
    style.innerHTML = keyframes;
    document.head.appendChild(style);
    
    document.body.appendChild(particle);
}

function initializeGradients() {
    // Add any additional gradient initializations here
}