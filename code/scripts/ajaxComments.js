window.onload = function() {
    
    $(document).ready(function(){
        $("#submitButton").click(function(e){
            e.preventDefault();
            $.ajax({
                url: "php/addComment.php",
                data: $("#commentForm").serialize(),
                async: true,
                type: post
            })
        });
    });
}