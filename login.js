function attemptLogin() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Simple validation for demonstration
    if (email === "user123@gmail.com" && password === "password") {
        loginMessage.style.color = "#28a745";
        loginMessage.textContent = "Login successful! Loading the Dashboard...";

        // Save authentication status (you may use more secure methods in a real application)
        localStorage.setItem('authenticated', 'true');

        // Redirect to the dashboard after a short delay
        setTimeout(() => {
            window.location.href = 'dashboard.html';
        }, 1500);
    } else {
        loginMessage.style.color = "#dc3545";
        loginMessage.textContent = "Invalid email address or password. Please try again.";
    }
}