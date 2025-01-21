function togglemenu() {
    const menu = document.querySelector('.nav-middle ul'); // Get the ul inside nav-middle
    menu.classList.toggle('active'); // Toggle the active class to show or hide the menu
}
/*
document.getElementById("signupForm").addEventListener("submit", function (event) {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission
        document.getElementById("error").style.display = "block";
        document.getElementById("error").textContent = "Passwords do not match!";
    } else {
        document.getElementById("error").style.display = "none";
    }
});
*/
