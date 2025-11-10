document.addEventListener("DOMContentLoaded", function () {
    // Select all post term separators
    document.querySelectorAll('.wp-block-post-terms__separator').forEach(separator => {
        // Replace comma (and any spaces) with a dot and space
        separator.textContent = ' • ';
    });
});

// assets/js/nav.js

document.addEventListener("DOMContentLoaded", () => {
    const openBtn = document.querySelector(".wp-block-navigation__responsive-container-open");
    const closeBtn = document.querySelector(".wp-block-navigation__responsive-container-close");
    const menu = document.querySelector(".wp-block-navigation__responsive-container");

    // Create overlay
    const overlay = document.createElement("div");
    overlay.classList.add("nav-overlay");
    document.body.appendChild(overlay);

    function openMenu() {
        menu.classList.add("is-open");
        overlay.classList.add("active");
        document.body.style.overflow = "hidden"; // prevent scroll
    }

    function closeMenu() {
        menu.classList.remove("is-open");
        overlay.classList.remove("active");
        document.body.style.overflow = "";
    }

    openBtn?.addEventListener("click", openMenu);
    closeBtn?.addEventListener("click", closeMenu);
    overlay.addEventListener("click", closeMenu);

    // Optional: close with Escape key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeMenu();
    });
});
