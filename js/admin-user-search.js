$(document).ready(function(){
    
    //Update Display of Active State
    $(".toggle-user-btn").each(function(){
        if ($(this).text() == "0"){
            $(this).text("Activate");
        }

        if($(this).text() == "1"){
            $(this).addClass("active-user");
            $(this).text("Deactivate");
        }
    })

    //Searchbar Filter
    $("#user-search").keyup(function(){
        var value = $(this).val().toLowerCase();
        $(".user-display").each(function(){
            var search = $(this).find("#username-display").text().toLowerCase();
            if(search.indexOf(value) > -1){
                $(this).show();
            }
            else{
                $(this).hide();
            }
        });
    });

    //Toggle Filter
    $(".toggle-switch").click(function(){
        if($("#ckb").is(":checked")){
            $("#ckb").prop("checked", false);
            $("#active-title").text("Deactive Users");
        }
        else{
            $("#ckb").prop("checked", true);
            $("#active-title").text("Active Users");
        }
    })
})