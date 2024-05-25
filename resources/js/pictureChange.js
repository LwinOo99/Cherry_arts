



$(document).ready(function () {
    $('#pictureBtn').change(function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#picture').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // $('#pictureBtn').click(function(){
    //     alert("ok")
    // })
});