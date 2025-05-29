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

                    label.find(".preview_image").attr({
                        src: e.target.result,
                        width: "200",
                    });
                    label.find(".file_name").text(fileName);
                }.bind(this);

                reader.readAsDataURL(this.files[0]);
            } else {
                // If no file is selected, reset the label
                let label = $('label[for="' + $(this).attr("id") + '"]');
                label.find(".preview_image").attr({
                    src: "",
                    width: "200",
                });
                label.find(".file_name").text("Choose file");
            }
        });

        // datatable initialization
        $(".datatable").DataTable({
            responsive: true,
        });

        //  tinymce init
        tinymce.init({
            selector: ".tinyeditor",
            height: 400,
            menubar: false,
            branding: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern",
            ],
            toolbar:
                "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons",
        });
    });
})(jQuery);
