@extends('layout.adminlayout')


@section('body')

<div class="row">
    <div class="col-sm-6 mt-5">

           <form  id="form">
            <input type="text" class="form-control" name="sid" id="sid" value="">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                  <input
                  type="text" class="form-control" name="name" id="name" value="">
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

              <div class="mb-3 row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="address" id="address" value="">
                  <div class="error"></div>
                </div>
              </div>

                <button type="submit" class="btn btn-primary register">Register</button>

                    <div class="msg"></div>


           </form>
    </div>


    <div class="col-sm-6">
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody  class="user">
            </tbody>

          </table>
          <div class="message"></div>
    </div>

</div>
@endsection

@section('jquery')
<script>

$(document).ready(function () {

    $('.msg').hide();
    function showData(){
        $.ajax({
            type: "GET",
            url: "{{ route('getdata')}}",
            dataType: "json",
            success: function (response) {
                        $(".user").text('');
                        $.each(response,function(index,user)
                        {
                        let html = '<tr>';
                        html += `<td>${user.id}</td>`;
                        html += `<td>${user.name}</td>`;
                        html += `<td class='email'>${user.email}</td>`;
                        html += `<td class='email'>${user.address}</td>`;
                        html += `<td><button class="btn btn-sm btn-secondary btn-edit" data-editId="${user.id}">Edit</button>&nbsp;&nbsp;<button class="btn btn-sm btn-warning btn-del" data-delId="${user.id}">Delete</button></td>`;
                        $('.user').append(html);
                        });
                },
                    error: function (xhr, status, error) {
                    alert('Error inserting task: ' + xhr.responseText);
                }

        });
    }

    showData();

            $('#form').submit(function (event) {
                event.preventDefault();
                let id = $('#sid').val();
                let name = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let address = $('#address').val();
                // return true;
                insertData = {
            id :id,
            name: name,
            email: email,
            password: password,
            address: address,
        }
        // JSON.stringify(insertData)
                $.ajax({
                    type: "POST",
                    url: "{{ route('add')}}",
                    data: insertData,
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                    // dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('.msg').html("data Register Sucessfully!").show();
                        $('.msg').addClass( "alert alert-success" ).fadeOut(5000);
                    },
                    error: function (xhr, status, error) {
                    alert('Error inserting task: ' + xhr.responseText);
                },
                complete: function(response){
                        console.log('data completed');
                        $('#form')[0].reset();
                        showData();
            }
                });
            });

            $('.user').on("click", ".btn-del" ,function () {
               let delId =  $(this).attr('data-delId');
               $.ajax({
                type: "GET",
                url: "/api/delete/"+delId,
                dataType: "json",
                success: function (response) {
                        $('.message').html("data Deleted Sucessfully!").show();
                        $('.message').addClass( "alert alert-success" ).fadeOut(5000);
                showData();
                }
               });
            });

            $('.user').on("click", ".btn-edit" ,function () {
               let editId =  $(this).attr('data-editId');
               $.ajax({
                type: "GET",
                url: "/api/edit/"+editId,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                 $("#sid").val(response['id']);
                 $("#name").val(response['name']);
                 $("#email").val(response['email']);
                 $("#password").val(response['password']);
                 $("#address").val(response['address']);
                }
               });
            });

        });

</script>
@endsection

