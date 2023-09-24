$(document).ready(function() {
    $('.logout-link').click(function(event) {
        event.preventDefault();
        $('#logoutModal').modal('show');
    });
});