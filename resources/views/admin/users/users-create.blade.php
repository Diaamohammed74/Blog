@extends('admin.layouts.app')
@section('PageHeader')
    Add New User
@endsection

@section('PageTitle')
    Add-User
@endsection

@section('PageHeader')
    {{-- Add Category --}}
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.layouts.messages')
        <form class="form-horizontal" action="{{ route('users/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-4">
                        <input type="text" name='name' class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-4">
                        <input type="email" name='email' class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-4">
                        <input type="password" name='password' class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-4">
                        <input type="password" name='confirm_password' class="form-control @error('confirm_password') is-invalid @enderror">
                        @error('confirm_password')
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
@endsection
