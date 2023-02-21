
@extends('admin.layouts.app')

@section('PageHeader')
    User Information
@endsection
@section('PageTitle')
    Show User Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('imgs/articles/user1-128x128.jpg') }}" class="rounded-circle mb-3"
                        alt="{{ $user->name }}" width="150" height="150">
                    <div class="mb-3 col-md-12">
                        <label class="form-label fw-bold">Name:</label>
                        <h5 class="">{{ $user->name }}</h5>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label fw-bold">Email:</label>
                        <p class="">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Information</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="created_at" class="col-md-4 col-form-label text-md-left">Joined</label>
                        <div class="col-md-6 ">
                            @if ($user->created_at)
                            <input type="text" name="created_at" value="{{ $user->created_at->format('F j, Y') }}"
                            
                                    class="form-control" readonly>
                            @else
                            <input type="text" name="created_at" value="{{ Carbon\Carbon::now()->format('d/m/y  H:i').' (GMT / UTC +0)' }}"
                            
                                    class="form-control" readonly>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if ($user->articles->count() > 0)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Articles By <b>{{ $user->name }}</b></h5>
                        <hr>
                        <div class="form-group row">
                            @foreach ($user->articles as $article)
                                <label for="created_at"
                                    class="col-md-4 col-form-label text-md-left">Title: <a href="{{route('articles/show',$article->id)}}">{{ $article->title }}</a></label>
                                <div class="col-md-6">

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
