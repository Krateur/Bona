@extends('admin.template')
@section('content')
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Create a new Blog Post</h4>
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
                        <form class="form-horizontal m-t-30" method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Type a blog title" name="title">
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="author">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="5" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Blog category</label>
                                <select class="custom-select col-12" id="inlineFormCustomSelect" name="category_id">
                                    @foreach($categories as $category)
                                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Upload an image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@stop
