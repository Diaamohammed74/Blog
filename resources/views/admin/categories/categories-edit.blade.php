@extends('admin.layouts.app')

@section('PageHeader')
    Update Category
@endsection

@section('PageTitle')
    Update-Category
@endsection

@section('PageHeader')
    {{-- Add Category --}}
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Update Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.layouts.messages')
        <form class="form-horizontal" action="{{url('admin/categories/update',$category->id)}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-12">Category Name</label>
                    <div class="col-10">
                        <input type="text" name='name' class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{$category->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
