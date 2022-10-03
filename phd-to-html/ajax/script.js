$(document).ready(function(){
    $("#load-button").on("click",function(e){
        $.ajax({
            url :"ajax-lod.php",
            type :"POST",
            success :function(data){
                
                $("#table-data").html(data);
                
            }
        });

    });
});