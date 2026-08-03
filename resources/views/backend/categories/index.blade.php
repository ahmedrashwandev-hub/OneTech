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
                                    <button class="btn btn-outline-danger btn-block mg-b-10">Delete</button>
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
