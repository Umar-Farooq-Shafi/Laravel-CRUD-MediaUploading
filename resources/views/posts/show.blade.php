@extends('layouts.master')

@section('title') View Post @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('posts.index') }}" class="btn btn-info pull-right mb-3">Back</a>
        </div>
    </div>
    <img class="card-img-top" src="{{ asset('files/' . $post->name) }}" alt="Card image cap">
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <td>{{ $post->title }}</td>
            </tr>
            <tr>
                <th>Created by</th>
                <td>{{ $post->created_by }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $post->description }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $post->st_email }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if ($post->is_active == 1)
                        <span class="badge badge-pill badge-success p-2">Active</span>
                    @else
                        <span class="badge badge-pill badge-danger p-2">Inactive</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $post->created_at->diffForHumans() }}</td>
            </tr>
        </table>
    </div>
@endsection
