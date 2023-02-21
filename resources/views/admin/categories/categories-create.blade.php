@extends('admin.layouts.app')

@section('PageHeader')
    Add Category
@endsection

@section('PageTitle')
    Create-Category
@endsection

@section('PageHeader')
    {{-- Add Category --}}
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Create Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.layouts.messages')
        <form class="form-horizontal" action="{{ route('categories/store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-12">Category Name</label>
                    <div class="col-10">
                        <input type="text" name='name' class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
