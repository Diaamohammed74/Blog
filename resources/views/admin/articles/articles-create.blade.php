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
                        <select
                            class="form-control @error('category')
                            is-invalid
                        @enderror"
                            name="category" id="category">
                            <option value='0' disabled selected>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Choose a subcategory:</label>
                    <div class="col-4">
                        <select
                            class="form-control @error('subcategory')
                            is-invalid
                        @enderror"
                            name="subcategory" id="subcategory">
                            <option value='0' disabled selected>Choose Subcategory</option>
                        </select>
                        @error('subcategory')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Choose Tags --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Choose Tags:</label>
                    <div class="col-sm-4">
                        <select id="selUser" class="form-control @error('tags')
                            is-invalid
                        @enderror" multiple="multiple" name="tags[]">
                            <option value="0">Select Tags</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="res">

                    </div>
                    <label class="col-sm-2 col-form-label">Add new tag:</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="new_tag" id="new_tag" placeholder="Add a new tag">
                                    {{-- onchange="addNewTag()" --}}
                            </div>
                            <div class="input-group-append">
                                <button id="add_tag" class="btn btn-primary btn-block" type="submit">ADD</button>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Ending Choose Tags --}}

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
                            rows="5" name="content" class="summernote" id="summernote">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Photo</label>
                    <div class="col-sm-10">
                        <input type="file" name="cover" value="{{ old('cover') }}"
                            class="form-control-file  @error('cover')
                        is-invalid @enderror">
                        @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    {{-- <script>
        $("#add_tag").click(function(event){
            event.preventDefault();
            let name=$("#new_tag").val();
            $.ajax({
            method:"POST",
            url:"http://127.0.0.1:8000/admin/addtag",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                name:name
            },
            success:function(res){
                // console.log("YESSS");
                $("#res").append
                (`
                <div class="col-sm-4">
                        <select id="selUser" class="form-control" multiple="multiple" name="tags[]">
                            <option value="0">Select Tags</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">${name}</option>
                            @endforeach
                        </select>
                    </div>
                `);
            },
            error:function(res){
                console.log("error");
            }
        });
        });
    </script> --}}
    
    
    @include('admin.scripts.tags')
    @include('admin.scripts.dropdown')
@endsection
