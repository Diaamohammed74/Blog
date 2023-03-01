@extends('admin.layouts.app')

@section('PageHeader')
    Subcategories
@endsection

@section('PageTitle')
    View-Subcategories
@endsection

@section('content')

    <div class="card-body">
        <div class="p-1">
            <a href="{{route('sub_category/create')}}" class="btn btn-outline-primary " role="button" aria-pressed="true">Add new Subcategory</a>
            <a href="{{route('categories')}}" class="btn btn-outline-info" role="button" aria-pressed="true">Show Parent Categories</a>
        </div>
        @include('admin.layouts.messages')
        <table class="table table-bordered">
            <thead>

                <tr>
                    <th>#</th>
                    <th>Subcategory Name</th>
                    <th>Parent Category</th>
                    <th>No.Related Articles</th>
                    <th>Related Articles</th>
                    {{-- <th>Created at</th> --}}
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @forelse ($subcategories as $subcategory)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $subcategory->name }}
                        </td>

                        <td>
                            {{ $subcategory->category->name }}
                        </td>

                        <td>
                            {{ $subcategory->article()->count() }}
                        </td>
                        <td>
                            @if ($subcategory->article->count() > 0)
                                @foreach ($subcategory->article as $article)
                                    <a href="{{route('articles/show',$article->id)}}">{{ $article->title }}</a><br>
                                @endforeach
                            @else
                                N/A
                            @endif


                        </td>

                        <td> {{-- manage group button --}}
                            <div class="btn-group manage-button">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item disabled-link"
                                        href="{{ route('sub_category/edit', $subcategory->id) }}">
                                        <i class="fas fa-edit"></i> Update
                                    </a>

                                    <form action="{{ route('sub_category/delete', $subcategory->id) }}" method="POST"
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

            {{ $subcategories->links() }}

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
