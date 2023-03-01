@extends('admin.layouts.app')
@section('PageHeader')
    Categories
@endsection

@section('PageTitle')
    View Categories
@endsection

@section('content')
    <div class="card-body">
        <div class="pb-1">
            <a href="{{route('categories/create')}}" class="btn btn-outline-primary col-2" role="button" aria-pressed="true">Add New Category</a>
            <a href="{{route('sub_categories')}}" class="btn btn-outline-info col-2" role="button" aria-pressed="true">Show All Subcategories</a>
            <a href="{{route('articles')}}" class="btn btn-outline-success col-2" role="button" aria-pressed="true">Show All Articles</a>
        </div>

@include('admin.layouts.messages')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>NO.Articles</th>
                    <th>NO.Related Subcategories</th>
                    <th>Related Subcategories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{$category->articles()->count() }}</td>
                        <td>{{$category->subcategory()->count() }}</td>

                        <td>
                            @if ($category->subcategory->count()>0)
                            @foreach ($category->subcategory as $subcategory )
                                        {{$subcategory->name}}<br>
                            @endforeach
                            @else
                                None
                            @endif
                        </td>

                        <td>
                            <div class="btn-group manage-button" title="Group Management">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('admin/categories/edit', $category->id) }}">
                                        <i class="fas fa-edit"></i> Update
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
        <div class="d-flex justify-content-center mt-3">

            {{ $categories->links() }}

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
