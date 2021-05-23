function loadPreview(input){
    var data = $(input)[0].files; //this file data
    $.each(data, function(index, file){
        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
            var fRead = new FileReader();
            fRead.onload = (function(file){
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image thumb element
                    $('#thumb-output').append(img);
                };
            })(file);
            fRead.readAsDataURL(file);
        }
    });
}
