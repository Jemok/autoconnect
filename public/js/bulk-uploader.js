function readURL(input, identifier, imageSelector, advertId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+identifier)
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }

    var fileInput = document.getElementById(imageSelector);
    var file = fileInput.files[0];
    var formData = new FormData();
    formData.append(identifier, file);
    formData.append('imageArea', imageSelector);
    formData.append('vehicleId', advertId);
    formData.append('keyIdentifier', identifier);

    console.log(formData);

    $.ajax({
       url: '/api/images/upload-bulk',
        type: 'POST',
        cache: false,
        contentType:false,
        processData:false,
        data: formData,
        enctype: 'multipart/form-data',
    });
}