@extends('auth.master')
@section('title', 'Update Password')
@section('content')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>

        <form method="POST" action="{{ url('/user/login') }}">
            @csrf
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter New Password">
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Enter your Password Again">
            </div><!-- form-group -->
            <input type="hidden" id="userID" value="{{ $userID->id }}">
            <br><br>
            <button type="submit" class="btn btn-info btn-block UpdatePasswordbtn">Update Password</button>
        </form>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.UpdatePasswordbtn').click(function(e){
                e.preventDefault();

                let password   = $('#password').val();
                let repassword = $('#repassword').val();
                let userID     = $('#userID').val();



                if(password == ''){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Plz enter your password',
                        icon: 'error',
                        confirmButtonText: 'ok'
                    });
                }else if(repassword == ''){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Plz enter your RepeatPassword',
                        icon: 'error',
                        confirmButtonText: 'ok'
                    });

                }else if(password != repassword){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Passwords do not match',
                        icon: 'error',
                        confirmButtonText: 'ok'
                    });
                }else{
                    $.ajax({
                        method: 'POST',
                        url: '/user/updated-password',
                        data: {
                            userID: userID,
                            password: password
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){
                            if(response.data == 1){
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Password updated successfully',
                                    icon: 'success',
                                    confirmButtonText: 'ok'
                                });
                                window.location.href = '/user/login';
                            }
                        },
                    });
                }
            });
        });
    </script>
@endsection
