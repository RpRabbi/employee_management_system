document.getElementById('signInForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Use AJAX to submit form data without reloading the page
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var params = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Check if the response contains the redirection to Dashboard
            if (xhr.responseText.includes('Dashboard.html')) {
                window.location.href = 'Dashboard.html';
            } else {
                var alertPopup = document.getElementById('alertPopup');
                alertPopup.textContent = 'Wrong username or password';
                alertPopup.style.display = 'block';
                setTimeout(function() {
                    alertPopup.style.display = 'none';
                }, 3000);
            }
        }
    };

    xhr.send(params);
});
