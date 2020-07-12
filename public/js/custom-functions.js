$(document).ready(function () {
    $('.revtp-searchform').on('submit', function (event) {
        let action = $(this).attr('action');
        let data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: action,
            data: data,
            dataType: "json",
            success: function (data) {
                let fullNameWithAge = data['firstName'] + ' ' + data['lastName'] + ', ' + data['age'] + ' лет';

                $('.modal-name-place').text(fullNameWithAge);
                $('.modal-profession-place').text(data['profession']);
                $('.modal-skills-place').text(data['skills']);
                $('.modal-psycho-place').text(data['profession']);

                $('#profileModal').modal('show');
                $('#link').val('');
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Произошла ошибка: " + JSON.parse(XMLHttpRequest.responseText)['message']);
            }
        });

        return false;
    });
});
