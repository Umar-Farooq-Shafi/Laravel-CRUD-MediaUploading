@extends('layouts.master')

@section('title') Edit Post @endsection

@section('content')
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="default card-default">
            <div class="card-header">
                Edit Post
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif"
                        name="title" value="{{ $post->title }}"/>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="created_by">Created By</label>
                    <input type="text" class="form-control @if ($errors->has('created_by')) is-invalid @endif"
                        name="created_by" value="{{ $post->created_by }}">
                    @if ($errors->has('created_by'))
                        <div class="invalid-feedback">{{ $errors->first('created_by') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="st_email">Email</label>
                    <input type="email" class="form-control @if ($errors->has('st_email')) is-invalid @endif"
                        name="st_email" value="{{ $post->st_email }}">
                    @if ($errors->has('st_email'))
                        <div class="invalid-feedback">{{ $errors->first('st_email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">Post Picture</label>
                    <input type="file" class="form-control @if ($errors->has('image')) is-invalid @endif"
                        name="image" value="{{ $post->name }}"/>
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea cols="5" rows="3" class="form-control @if ($errors->has('description')) is-invalid @endif"
                        name="description">{{ $post->description }}</textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input @if ($errors->has('description')) is-invalid @endif" name="is_active"
                        value="{{ $post->is_active }}" checked>
                        <label class="form-check-label" for="is_active">
                            Active Post?
                        </label>
                        @if ($errors->has('is_active'))
                            <div class="invalid-feedback">{{ $errors->first('is_active') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Edit</button>
                <a href="{{ route('posts.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection
