@extends('admin.template')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        @if(Session::has('success'))
            @include('admin.inc.messages')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Posts Administrations</h4>
                        <h6 class="card-title m-t-40"><button class="btn btn-primary btn-lg"><a href="{{ route('admin.blog.create') }}" style="color:#fff;">Create</a></button></h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CONTENT</th>
                                    <th scope="col">CREATED AT</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $post->id }}</th>
                                        <td>{{ substr( $post->title, 0, 20)}}</td>
                                        <td>{{ substr($post->content, 0, 50)}}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-lg btn-block" href="{{ route('admin.blog.edit', $post->id) }}" style="color: #fff;">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.blog.destroy', $post->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-lg btn-block">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
