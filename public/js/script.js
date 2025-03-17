document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    function handleFormSubmission(form) {
        form.addEventListener("submit", function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add("was-validated");
            } else {
                document.getElementById('form-rfq').submit();
                // event.preventDefault(); // Prevent actual submission
                // window.location.href = "formsuccess.html"; // Redirect to success page
            }
        });
    }

    // Apply validation to all forms with 'needs-validation' class
    document.querySelectorAll(".needs-validation").forEach(handleFormSubmission);
});
