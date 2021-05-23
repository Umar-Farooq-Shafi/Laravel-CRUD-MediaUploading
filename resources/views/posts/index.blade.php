@extends('layouts.master')

@section('title') Posts @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('posts.create') }}" class="btn btn-primary pull-right mb-3">Create post</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created by</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $post->title !!}</td>
                            <td>{!! $post->created_by !!}</td>
                            <td>{!! $post->description !!}</td>
                            <td>{!! $post->st_email !!}</td>
                            <td>
                                @if ($post->is_active == 1)
                                    <span class="badge badge-pill badge-success p-2">Active</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic">
                                    <a href="{{ route('posts.edit', $post->id) }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                    <a href="{{ route('posts.show', $post->id) }}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_post_{{ $post->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <div class="modal fade" id="delete_post_{{ $post->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('posts.destroy', $post->id) }}" id="form_delete_post_{{ $post->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete "<b>{{ $post->title }}</b>" post?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-danger">Yes! Delete It</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" align="center">No Posts Found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        {{ $posts->links() }}
    </div>
@endsection
