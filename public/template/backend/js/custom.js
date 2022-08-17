$(document).ready(function(){
    if($.cookie('remember_email')){
        $('#remember-me').prop('checked', true);
    }
})

