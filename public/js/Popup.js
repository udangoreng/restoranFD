const reserveBtn = document.getElementById("reserveBtn");
const modal = document.getElementById("loginInfoModal");
const closeBtn = document.getElementById("closeLoginInfoModal");

reserveBtn.addEventListener("click", () => {
    modal.style.display = "flex";
});

closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
});
