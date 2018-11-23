@extends('admin.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit a blog post</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    @if($errors->any())
                        @include('admin.inc.messages')
                    @endif
                    <form action="{{ route('admin.blog.update', $post->id) }}" class="form-horizontal m-t-30" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" value="{{ $post->title }}" name="title">
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control" value="{{ $post->author }}" name="author">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" rows="5" name="content">{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Blog category</label>
                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="category_id">
                                <option selected value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Upload an image</label>
                            <input type="file" class="form-control" name="image" value="{{ $post->image }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
