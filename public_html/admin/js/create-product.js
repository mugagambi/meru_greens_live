$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
});
$(document).ready(function () {
    var add = $('#add');
    var wrapper = $('#images');
    var fieldHTML = '<div class="form-group">\n' +
        '                                <label for="inputPic" class="col-sm-2 control-label">Image</label>\n' +
        '\n' +
        '                                <div class="col-sm-10">\n' +
        '                                    <p class="pull-right" id="remove" style="cursor: pointer;"><i class="fa fa-remove"\n' +
        '                                                                                                  style="color: red;"></i>\n' +
        '                                        remove this\n' +
        '                                        image</p>\n' +
        '                                    <input type="file" name="pic[]"\n' +
        '                                           id="inputPic">\n' +
        '                                </div>\n' +
        '                            </div>';
    $(add).on('click', function () {
        $(wrapper).append(fieldHTML);
    });
    $(wrapper).on('click', '#remove', function (e) {
        $(this).parents('.form-group').remove();
    })
});