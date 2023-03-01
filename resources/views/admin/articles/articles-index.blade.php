@extends('admin.layouts.app')

@section('PageHeader')
    Articles
@endsection

@section('PageTitle')
    View-Articles
@endsection

@section('content')
    <div class="card-body">
        @include('admin.layouts.messages')
        <table class="table table-bordered">
            <thead>

                <tr>
                    <th>#</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Writer</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td style="width: 70px; height: 90px;">
                            <img src="{{ asset('imgs/' . $article->cover) }}" alt="Article img"
                                style="max-width: 100%; max-height: 100%;">
                        </td>

                        <td>
                            <b>Article:</b>
                            {{ $article->title }}<br>
                            <b>Category:</b>
                            {{ $article->category->name }}<br> {{-- getting the category name of the article --}}
                            <b>Sub Category:</b>
                            {{ $article->subcategory->name }}<br> {{-- getting the category name of the article --}}
                        </td>

                        <td>
                            {{ $article->short_description }}
                        </td>

                        <td style="width: 6%">
                            {{ $article->user->name }} {{-- getting the writer name of the article --}}
                        </td>

                        <td style="width: 10%">
                            {{ $article->created_at->diffForHumans() }}
                        </td>

                        <td> {{-- manage group button --}}
                            <div class="btn-group manage-button">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('articles/show', $article->id) }}">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a class="dropdown-item disabled-link"
                                        href="{{ route('articles/edit', $article->id) }}">
                                        <i class="fas fa-edit"></i> Update
                                    </a>

                                    <form action="{{ route('articles/delete', $article->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item delete-button"
                                            @if (auth()->user()->id != $article->user->id) disabled @endif>
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
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

            {{ $articles->links() }}

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
