@extends('admin.layouts.app')
@section('PageHeader')
    Categories
@endsection

@section('PageTitle')
    View Categories
@endsection

@section('content')
    <div class="card-body">
@include('admin.layouts.messages')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>NO. Of Articles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $articleCount = $category->articles()->count() }}</td>
                        <td>
                            <div class="btn-group manage-button" title="Group Management">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('admin/categories/edit', $category->id) }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ url('admin/categories/delete', $category->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item delete-button">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            <div class="alert alert-primary text-center" role="alert">
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
