@extends('backend.master')

@section('title','Categories')

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
        <div class="sl-mainpanel">
            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashoard</a>
                <span class="breadcrumb-item active">Categories</span>
            </nav>

            <div class="sl-pagebody">
                <div class="sl-page-title">
                    <h5>Categories</h5>
                </div><!-- sl-page-title -->

                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-primary mg-b-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->order }}</td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $val->id]) }}" class="btn btn-outline-primary btn-block mg-b-10">Edit</a>
                                    <button class="btn btn-outline-danger btn-block mg-b-10 delCate" data-id="{{ $val->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div><!-- table-responsive -->
                {{ $data->links() }}
            </div><!-- sl-pagebody -->
        </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection


@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function(){

            $('.delCate').click(function(e){
                e.preventDefault();

                let id = $(this).data('id');

                Swal.fire({
                    title: 'Warning!',
                    text: 'Do you want to Delete this Category?',
                    icon: 'warning',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            method: 'POST',
                            url:'/category/delete',
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(response){
                                if(response.data == 1){
                                    window.location.reload();
                                }
                            }
                        });
                    }
                })
            });
        })
    </script>
@endsection
