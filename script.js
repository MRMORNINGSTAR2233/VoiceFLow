$(document).ready(function () {
    $('#applicationForm').submit(function (e) {
        e.preventDefault();

        const name = $('#name').val();
        const email = $('#email').val();
        const phone = $('#phone').val();
        const address = $('#address').val();

        // Display the submitted information
        $('#displayName').text(name);
        $('#displayEmail').text(email);
        $('#displayPhone').text(phone);
        $('#displayAddress').text(address);

        $('#result').removeClass('hidden');

        // Send data to the PHP backend
        $.post('register.php', {
            name: name,
            email: email,
            phone: phone,
            address: address
        });
    });
});
