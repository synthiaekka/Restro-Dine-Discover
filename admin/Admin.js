document.addEventListener("DOMContentLoaded", function () {
    // Sidebar toggle functionality
    const menuBtn = document.getElementById("menu-btn");
    const closeBtn = document.getElementById("close-btn");
    const sidebar = document.querySelector(".sidebar");

    menuBtn.addEventListener("click", function () {
        sidebar.classList.add("show");
    });

    closeBtn.addEventListener("click", function () {
        sidebar.classList.remove("show");
    });
    restaurantLink.addEventListener('click', () => {
        // Redirect to the restaurant page (replace the URL with the actual URL)
        window.location.href = '/restaurant'; // Change '/restaurant' to the actual URL
    });
    
    bookingLink.addEventListener('click', () => {
        // Redirect to the booking page (replace the URL with the actual URL)
        window.location.href = '/booking'; // Change '/booking' to the actual URL
    });

    // Dark mode toggle functionality
    const darkModeBtns = document.querySelectorAll(".dark-mode span");
    const body = document.body;

    darkModeBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            body.classList.toggle("dark-mode");
            darkModeBtns.forEach((btn) => btn.classList.toggle("active"));
        });
    });
});





