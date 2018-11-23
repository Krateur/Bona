@extends('admin.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Create a new Category</h4>
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
                    <form class="form-horizontal m-t-30" method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Type a blog name" name="name">
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
