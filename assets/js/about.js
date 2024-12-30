
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".number2");

    counters.forEach(counter => {
        counter.innerText = '0';
        
        const updateCounter = () => {
            const target = +counter.getAttribute("data-target");
            const current = +counter.innerText;
            const increment = target / 100; 
            
            if (current < target) {
                counter.innerText = `${Math.ceil(current + increment)}`;
                setTimeout(updateCounter, 50); // Adjust timing here
            } else {
                counter.innerText = target;
            }
        };

        updateCounter();
    });
});