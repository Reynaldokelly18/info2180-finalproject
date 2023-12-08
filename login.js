function attemptLogin() {
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var loginMessage = document.getElementById('loginMessage');

    if (!isValidEmail(emailInput.value)) {
        loginMessage.innerHTML = "Invalid email address.";
        return;
    }

    var email = sanitizeInput(emailInput.value);
    var password = sanitizeInput(passwordInput.value);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                handleLoginResponse(response);
            } else {
                loginMessage.innerHTML = "Server error. Please try again. Status: " + xhr.status + ", Response: " + xhr.responseText;

            }
        }
    };

    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("email=" + email + "&password=" + password);
}

function handleLoginResponse(response) {
    var loginMessage = document.getElementById('loginMessage');

    if (response.success) {
        window.location.href = 'dashboard.html';
    } else {
        loginMessage.innerHTML = "Login failed. " + response.error;
    }
}

function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function sanitizeInput(input) {
    return input.trim();
}
