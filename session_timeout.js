
// Function to reset timer
function resetTimer() {
    clearTimeout(window.inactivityTimer);
    window.inactivityTimer = setTimeout(logout, 30 * 60 * 1000); // 30 minutes timeout
}

// Function to logout
function logout() {
    window.location.href = 'session_destroy.php';
}

// Reset timer on user activity
document.addEventListener('mousemove', resetTimer);
document.addEventListener('keypress', resetTimer);
resetTimer(); // Initialize the timer when the page loads

