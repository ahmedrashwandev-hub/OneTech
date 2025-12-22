@extends('auth.master')
@section('title', 'login')
@section('content')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>

        <form method="POST" action="{{ url('/user/login') }}">
            @csrf
            <div class="form-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email">
            </div><!-- form-group -->
            <br><br>
            <button type="submit" class="btn btn-info btn-block loginbtn">Sign In</button>
        </form>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.loginbtn').click(function(e){
                e.preventDefault();

                let email = $('#email').val();

                if(email == ''){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Plz enter your email',
                        icon: 'error',
                        confirmButtonText: 'ok'
                    });
                }else{
                    $.ajax({
                        method: 'POST',
                        url: '/user/reset-password',
                        data: {
                            email: email,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){
                            if(response.data == 0){
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Invalid email address',
                                    icon: 'error',
                                    confirmButtonText: 'ok'
                                });
                            }else{
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Password reset link has been sent to your email',
                                    icon: 'success',
                                    confirmButtonText: 'ok'
                                });
                            }
                            console.log(response);
                        },
                    });
                }
            });
        });
    </script>
@endsection
