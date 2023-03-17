$(document).ready(function(){
    
    $(".toggle-user-btn").each(function(){
        if ($(this).text() == "0"){
            $(this).text("Activate");
        }

        if($(this).text() == "1"){
            $(this).addClass("active-user");
            $(this).text("Deactivate");
        }
    })
})