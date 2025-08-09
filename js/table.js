window.addEventListener('resize', function () {
    const form = document.getElementById("table-booking");

    if (window.innerWidth <= 768) {
        form.style.width = "100%";
    } else {
        form.style.width = "50%";
    }
});