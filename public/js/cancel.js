export function initCancelPopup() {

    const cancelBtn = document.querySelector(".reservation-btn-cancel");
    const modal = document.getElementById("cancelModal");
    const closeModal = document.getElementById("closeModal");
    const confirmCancel = document.getElementById("confirmCancel");

    cancelBtn.addEventListener("click", () => {
        modal.style.display = "flex";
    });

    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) modal.style.display = "none";
    });

    confirmCancel.addEventListener("click", () => {
        modal.style.display = "none";
        alert("Reservation canceled!");
    });
}
