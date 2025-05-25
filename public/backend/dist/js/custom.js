
(function ($) {
    "use strict";

    $(document).ready(function () {
        // Initialize select2 elements
        $(".select2").select2();
        $(".select2-multiple").select2({
            placeholder: "Select Items",
            allowClear: true,
        });
        $(".select2-tags").select2({
            tags: true,
            tokenSeparators: [",", " "],
            placeholder: "Add tags",
            allowClear: true,
        });

        //  custom file input handling
        $(".input_file").on("change", function () {
            let fileName = $(this).val().split("\\").pop();

            if (this.files && this.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    let label = $('label[for="' + $(this).attr("id") + '"]');

                    label.find(".preview_image").attr("src", e.target.result);
                    label.find(".file_name").text(fileName);
                }.bind(this);

                reader.readAsDataURL(this.files[0]);
            }else{
                // If no file is selected, reset the label
                let label = $('label[for="' + $(this).attr("id") + '"]');
                label.find(".preview_image").attr("src", "");
                label.find(".file_name").text("Choose file");
            }
        });







    });


})(jQuery);
