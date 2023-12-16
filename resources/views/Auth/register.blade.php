@extends('layout.loginlayout')



@section('body')

<div class="row">
    <div class="col-sm-6 mt-5">

           <form  id="form">
            {{-- @csrf --}}
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" id="name" value="">
                  <div class="error"></div>
                </div>
              </div>
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
                <button type="submit" class="btn btn-primary register">Register</button>
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
                let token = $('meta[name="csrf_token"]').attr('content')
                insertData = {
            name: name,
            email: email,
            password: password,
            _token: token
        }

                $.ajax({
                    type: "POST",
                    url: "{{ route('authreg')}}",
                    // headers: {
                    //     // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').prop('content')
                    //     'X-CSRF-TOKEN':"{{ csrf_token() }}"
                    // },
                    data: insertData,
                    dataType: "json",

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

