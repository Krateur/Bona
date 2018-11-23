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
                        <h4 class="card-title">Navbar Administrations</h4>
                        <h6 class="card-title m-t-40"><button class="btn btn-primary btn-lg"><a href="{{ route('admin.navbar.create') }}" style="color:#fff;">Create</a></button></h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">CREATED AT</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($names as $name)
                                    <tr>
                                        <th scope="row">{{ $name->id }}</th>
                                        <td>{{ substr( $name->name, 0, 20)}}</td>
                                        <td>{{ $name->created_at }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-lg btn-block" href="{{ route('admin.navbar.edit', $name->id) }}" style="color: #fff;">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.navbar.destroy', $name->id) }}" method="post">
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
                                {{ $names->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
