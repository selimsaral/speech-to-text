Dropzone.autoDiscover = false;
$(document).ready(function () {
    new Dropzone("#myDropzone", {
        maxFilesize: 1,
        init: function () {
            this.on("success", function (file, responseText) {
                $('#results').removeClass('d-none');
                $('#results').prepend('<p>' + file.name + ' : ' + responseText.result + '</p>');
            });
        }
    });
});
