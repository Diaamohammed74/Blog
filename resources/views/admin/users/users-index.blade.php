@extends('admin.layouts.app')

@section('PageHeader')
    Users
@endsection
@section('PageTitle')
    View-Users
@endsection

@section('content')
    <div class="card-body">
        @include('admin.layouts.messages')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Articles</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            @if ($user->articles->count() > 0)
                                @foreach ($user->articles as $article)
                                    <a href="{{ url('admin/articles/show', $article->id) }}">{{ $article->title }}<br></a>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>


                        <td>
                            <div class="btn-group manage-button">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('users/show', $user->id) }}">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a class="dropdown-item" href="{{ route('users/edit', $user->id) }}">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
                                    @if (auth()->user()->email == 'diaa@example.org')
                                    <form action="{{ route('users/delete', $user->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item delete-button">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    @else
                                    <button type="submit" class="dropdown-item delete-button" disabled>
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-primary text-center " role="alert">
                                <div>
                                    There is no data
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
