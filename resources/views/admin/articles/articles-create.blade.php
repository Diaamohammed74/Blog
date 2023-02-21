@extends('admin.layouts.app')
@section('PageHeader')
    Post Article
@endsection
@section('PageTitle')
    Post-Article
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Post Article</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.layouts.messages')
        <form class="form-horizontal" action="{{ route('articles/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Article Title</label>
                    <div class="col-4">
                        <input type="text" name='title' class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Choose a category:</label>
                    <div class="col-4">
                        <select class="form-control" name="select">
                            {{-- <option value="" selected>....</option> --}}
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <textarea
                            class="form-control @error('short_description')
                            is-invalid
                        @enderror"
                            rows="3" name="short_description">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Article Content</label>
                    <div class="col-sm-10">
                        <textarea
                            class="form-control @error('content')
                            is-invalid
                        @enderror"
                            rows="5" name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Photo</label>
                    <div class="col-sm-10">
                        <input type="file" name="cover" value="{{old('cover')}}"
                            class="form-control-file  @error('cover')
                        is-invalid @enderror" >
                        @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
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
