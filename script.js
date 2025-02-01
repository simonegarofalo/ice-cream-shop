document.addEventListener("DOMContentLoaded", () => {
  const fadeElements = document.querySelectorAll(".fade-in");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add("visible");
        }, 400);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  fadeElements.forEach((el) => observer.observe(el));
});

  