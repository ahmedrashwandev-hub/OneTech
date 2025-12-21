@extends('auth.master')
@section('title', 'register')
@section('content')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Create New Account<span class="tx-info tx-normal"></span></div>

        <br><br>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Name" id="name">
        </div><!-- form-group -->
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Email" id="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter your password" id="password">
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter your Reapet password" id="repassword">
        </div><!-- form-group -->
        <br>
        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <button type="submit" class="btn btn-info btn-block newAccount">Sign Up</button>

        <div class="mg-t-40 tx-center">Already have an account? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.newAccount').click(function(e){
                e.preventDefault();
                var name       = $('#name').val();
                var email      = $('#email').val();
                var password   = $('#password').val();
                var repassword = $('#repassword').val();

                if(name == ""){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please enter your name',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }else if(email == ""){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please enter your email',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
                else if(password == ""){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please enter your password',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
                else if(repassword == ""){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please enter your repeat password',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
                else if(password != repassword){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Password does not match',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
                })
            });
    </script>
@endsection
