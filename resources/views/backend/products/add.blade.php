@extends('backend.master')
@section('title','Add product')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('add.product') }}">Products</a>
        <span class="breadcrumb-item active">Add Product</span>
      </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Form Layouts</h5>
          <p>Forms are used to collect user information with different element types of input, select, checkboxes, radios and more.</p>
        </div><!-- sl-page-title -->
         <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Left Label Alignment</h6>
              <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p>
            <div class="row">
                <label class="col-sm-4 form-control-label">Product Category: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter product category">
                  <br>
                </div>
              </div><!-- row -->
              <div class="row">
                <label class="col-sm-4 form-control-label">Product Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter product name">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Lastname: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter lastname">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter email address">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" class="form-control" placeholder="Enter your address"></textarea>
                </div>
              </div>
              <div class="form-layout-footer mg-t-30">
                <button class="btn btn-info mg-r-5">Submit Form</button>
                <button class="btn btn-secondary">Cancel</button>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row --><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
