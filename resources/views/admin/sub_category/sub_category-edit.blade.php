@extends('admin.layouts.app')
@section('PageHeader')
    Update Sub Category
@endsection
@section('PageTitle')
    Update Sub Category
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"> Update Sub Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.layouts.messages')
        <form class="form-horizontal" action="{{ route('sub_category/update',$subcategory->id) }}" method="POST" >
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub Category name</label>
                    <div class="col-4">
                        <input type="text" name='sub_name' class="form-control @error('sub_name') is-invalid @enderror"
                            value="{{ $subcategory->name}}">
                        @error('sub_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Choose a category:</label>
                    <div class="col-4">
                        <select class="form-control" name="category">
                            {{-- <option value="" selected>....</option> --}}
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($subcategory->category_id==$category->id )
                                    selected
                                @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
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
