@extends('layout.loginlayout')


@section('body')

<div class="row">
    <div class="col-sm-8 mt-5">

           <form  id="form">

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="email" id="email" value="">
                  <div class="error"></div>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" name="password" id="password">
                  <div class="error"></div>
                </div>
              </div>

                <button type="submit" class="btn btn-primary register">Login</button>

                    <div class="msg"></div>
           </form>
    </div>
</div>
@endsection

@section('jquery')
<script>

$(document).ready(function () {
    $('#form').submit(function (event) {
                event.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();
                insertData = {
            name: name,
            email: email,
            password: password,
        }
                $.ajax({
                    type: "POST",
                    url: '/api/login',
                    data: insertData,
                    dataType: "json",
                    headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response);
                        $('.msg').html("Login Sucessfully!").show();
                        $('.msg').addClass( "alert alert-success" ).fadeOut(5000);
                        //-------------Dashboard-----------------

                        $.ajax({
            url: '/api/dashboard',
            type: 'GET',
            data: response,
            headers: {
                Authorization: 'Bearer ' + response.token,
            },
            success: function (dashboardResponse) {
                // Handle success for /dashboard route
                console.log('Dashboard Response:', dashboardResponse);
            },
            error: function (xhr, status, error) {
                // Handle error for /dashboard route
                console.log('Error:', xhr.responseText, status, error);
            },
        });
              },
                    error: function (xhr, status, error) {
                    console.log('Error inserting task: ' + xhr.responseText);
                },
                complete: function(response){
                        console.log('data completed');
                        $('#form')[0].reset();
            }
                });
            });
});

</script>
@endsection

