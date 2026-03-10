document.addEventListener("scroll", () => {
    document.querySelectorAll(".reveal").forEach(el => {
        const windowHeight = window.innerHeight;
        const elementTop = el.getBoundingClientRect().top;

        if (elementTop < windowHeight - 120) {
            el.classList.add("active");
        }
    });
});
