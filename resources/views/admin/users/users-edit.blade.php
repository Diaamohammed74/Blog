@extends('admin.layouts.app')

@section('PageHeader')
    Edit-{{ $user->name }}-Information
@endsection

@section('PageTitle')
    Edit-User
@endsection


@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.layouts.messages')
        <form class="form-horizontal" action="{{ route('users/update', $user->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-4">
                        <input type="text" name='name' class="form-control @error('name') is-invalid @enderror"
                            value="{{ $user->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-4">
                        <input type="email" name='email' class="form-control @error('email') is-invalid @enderror"
                            value="{{ $user->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-4">
                        <input type="password" name='current_password'
                            class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-4">
                        <input type="password" name='password' class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
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
