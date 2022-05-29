/*******************
 Custom Javascript file
 *******************/

// <script>
$(document).ready(function () {
    $("#country").change(function () {
        let country_id = this.value;

        $.get('/get_provinces?country=' + country_id, function (data) {
            $("#province_id").html(data);
        });
    });
});

// </script>
