


$(document).ready(function(){
    // Add click event listener to all anchor tags within the navigation
    $('#navbar-default a').click(function(e){
        // Remove active class from all anchor tags
        $('#navbar-default a').removeClass('underline');
        // Add active class to the clicked anchor tag
        $(this).addClass('underline');
        alert('Ok')
    });
});