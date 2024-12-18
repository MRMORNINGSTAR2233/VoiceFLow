// script.js
$(document).ready(function () {
    $('#submitBtn').on('click', function () {
        const formData = $('#applicationForm').serialize(); // Serialize form data
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: formData,
            success: function (response) {
                $('#result').html(response).show(); // Show formatted response
                $('#applicationForm')[0].reset(); // Reset form after submission
            },
            error: function () {
                alert('There was an error processing your form. Please try again.');
            }
        });
    });
});
