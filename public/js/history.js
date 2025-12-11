document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".history-stars").forEach(container => {
    const stars = container.querySelectorAll("span");

    stars.forEach((star, index) => {
      star.addEventListener("click", () => {
        stars.forEach((s, i) => {
          s.classList.toggle("active", i <= index);
        });
      });
    });
  });
});
