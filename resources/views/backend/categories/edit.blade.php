@extends('backend.master')

@section('title','Edit Category')

@section('content')
        <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard'); }}">Dashboard</a>
        <span class="breadcrumb-item active">Edit Category</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <div class="row">
                <label class="col-sm-4 form-control-label">Category Name : <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" value="{{ $data->name }}" id="name" placeholder="Enter Name Of Category ">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Category Order : <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="number" class="form-control" value="{{ $data->order }}" id="order" placeholder="Enter Category Order">
                </div>
              </div>
              <input type="hidden" id="id" value="{{ $data->id }}">
              <div class="form-layout-footer mg-t-30">
                <button type="button" class="btn btn-info mg-r-5" id="newCat">Save</button>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->
    </div><!-- sl-mainpanel -->
@endsection


@section('js')
    <script>
    $(document).on('click', '#newCat', function () {
        $('#newCat').click(function(e){
                e.preventDefault();
                let name = $('#name').val();
                let order = $('#order').val();
                let id = $('#id').val();

                if(name == ''){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Plz enter category name',
                        icon: 'error',
                        confirmButtonText: 'ok'
                    });

                }else if(order == ''){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Plz enter category order',
                        icon: 'error',
                        confirmButtonText: 'ok'
                    });
                }else{
                    $.ajax({
                        method: 'POST',
                        url: '/add-category/update',
                        data: {
                            name: name,
                            order: order,
                            id: id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){

                            if(response.data == 1){
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Category updated Success',
                                    icon: 'success',
                                    confirmButtonText: 'ok'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                })
                            }

                        },
                    });
                }
            });
        });
    </script>
@endsection
