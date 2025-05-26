(function(){
    "use strict";

    $(document).ready(function () {

        // general setting ajax request
        $("#update_general_settings").on("submit", function (e) {
            e.preventDefault();
            let formData = new FormData(this);

            $("#loader_main").css("display", "block");

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status === "success") {
                        console.log(response.message);
                    } else {
                        console.error(response.message);
                    }
                },
                error: function (xhr) {
                    console.error(xhr);
                },
                complete: function(){
                    $("#loader_main").css("display", "none");
                }
            });
        });

    });
})()
