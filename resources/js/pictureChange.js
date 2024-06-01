



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

    $("#pCategory").click(function(){
        $(this).addClass("text-red-600 ")
        $(this).removeClass("text-blue-600 ")
        $("#categoryClose").removeClass("hidden")
        $('.newCategory').removeClass("hidden")
    })

    $("#categoryClose").click(function(){
        $("#pCategory").addClass("text-blue-600 ")
        $("#pCategory").removeClass("text-red-600 ")
        $("#categoryClose").addClass("hidden")
        $('.newCategory').addClass("hidden")
    })
});