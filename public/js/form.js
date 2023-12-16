$(document).ready(function () {

    $('#form').submit(function (event) {
    event.preventDefault();

    let name = $('#name').val();
    let email = $('#email').val();
    let password = $('#password').val();

    var insertData = {
    name: name,
    email: email,
    password: password,
    }
    console.log(insertData);

    $.ajax({
        type: "POST",
        url: "{{ route('authreg')  }}",
        data: insertData,
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            console.log(response);


        }
    });

    });


    });
