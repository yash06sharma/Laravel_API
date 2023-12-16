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
                const token = $('meta[name="csrf-token"]').attr('content');

const headers = {
   'X-CSRF-TOKEN': token,
   'Access-Control-Allow-Origin': '*',
   'Content-Type': 'application/json',
};
                console.log(token + "<=csrf token");
                insertData = {
            name: name,
            email: email,
            password: password,

        }

                $.ajax({
                    type: "POST",
                    url: '/api/register',
                    data: insertData,
                    cache : false,
                    processData: false,
                    contentType: false,
        headers: headers,
        // {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
                    success: function (response) {
                        console.log(response);
                        $('.msg').html("data Register Sucessfully!").show();
                        $('.msg').addClass( "alert alert-success" ).fadeOut(5000);
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

