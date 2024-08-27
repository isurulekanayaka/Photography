setTimeout(function() {
    let successAlert = document.getElementById('success-alert');
    if (successAlert) {
        successAlert.style.display = 'none';
    }
}, 1000);

// Hide error alert after 10 seconds
setTimeout(function() {
    let errorAlert = document.getElementById('error-alert');
    if (errorAlert) {
        errorAlert.style.display = 'none';
    }
}, 1000);