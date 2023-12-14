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

});

</script>
@endsection

