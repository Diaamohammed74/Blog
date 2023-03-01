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
                                        <form action="{{ route('users/delete', $user->id) }}" method="POST"
                                            class="delete-form">
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
        <div class="d-flex justify-content-center mt-3">

            {{ $users->links() }}

            <style>
                .w-5 {
                    display: none;
                }

                .pagination {
                    border: 1px solid rgb(7, 22, 195);
                    display: flex;
                    justify-content: space-between;
                    padding: 10px;
                }

                .pagination li {
                    display: inline-block;
                    margin-right: 5px;
                }

                .pagination li a {
                    color: black;
                    text-decoration: none;
                    padding: 5px 10px;
                    border: 1px solid #ccc;
                }

                .pagination li.active a {
                    color: white;
                    background-color: #007bff;
                    border-color: #007bff;
                }

                .pagination li.disabled a {
                    color: #ccc;
                    pointer-events: none;
                    border-color: #cccccc;
                }

                .pagination .page-link {
                    border: none;
                    background-color: transparent;
                    color: black;
                }

                .pagination .page-item.disabled .page-link {
                    background-color: transparent;
                    border-color: transparent;
                }
            </style>
        </div>
    </div>
@endsection
