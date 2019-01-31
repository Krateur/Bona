@extends('admin.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit a Navbar</h4>
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
                    <form action="{{ route('admin.navbar.update', $name->id) }}" class="form-horizontal m-t-30" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $name->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label>Upload an image</label>
                            <input type="file" class="form-control" name="image" value="{{ $name->image }}">
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
