$(document).ready(function(){
    $(".toggle-user-btn").each(function(){
        if ($(this).attr("value") == "0"){
            $(this).prop("value", "Activate");
            $(this).addClass("deactive-user");
        }
        else{
            $(this).text("Deactivate");
        }
    })
})