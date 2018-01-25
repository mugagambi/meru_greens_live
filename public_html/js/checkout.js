// In your Javascript (external .js resource or <script> tag)
$(document).ready(function () {
    $('#country').select2();
    $('#country').change(function () {
        var country = $(this).find("option:selected").attr('value');
        if (country === 'KE') {
            $("#county-form").css("display", "block");
        } else {
            $("#county-form").css("display", "none");
        }
    });
});