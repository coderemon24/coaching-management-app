(function($){
    "use strict";

    $(document).ready(function() {
        // Initialize select2 elements
        $('.select2').select2();
        $('.select2-multiple').select2({
            placeholder: "Select Items",
            allowClear: true
        });
        $('.select2-tags').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Add tags",
            allowClear: true
        });


    });


})(jQuery)
