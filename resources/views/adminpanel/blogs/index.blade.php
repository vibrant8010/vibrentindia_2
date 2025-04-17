@extends('adminpanel.adminlayout')

@section('content')
    <div class="page-inner">
        {{-- <h1>Blogs</h1>
       --}}
       <div class="page-header mt-4 d-flex justify-content-between">
        <div>
       <h3 class="fw-bold mb-3 d-inline-block">Blogs</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.blogs.index') }}">Blogs</a>
            </li>
            {{-- <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Datatables</a>
            </li> --}}
        </ul>
        </div>
        {{-- <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Create New Blog</a> --}}
       </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                        <h4 class="card-title">Add Row</h4>
                        {{-- <a class="btn btn-primary btn-round ms-auto" href="{{ route('admin.products.create') }}">
                            <i class="fa fa-plus"></i>
                            Add Products
                        </a> --}}
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('admin.blogs.create') }}">
                            <i class="fa fa-plus"></i>
                            Add Blogs
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
        <table class="table table-hover table-bordered dataTable" id="multi-filter-inquiry">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Detail Subcontent</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                            @if ($blog->image_url)
                                <img src="{{ asset($blog->image_url) }}" alt="Blog Image" class="img-thumbnail" style="max-width: 50px; max-height: 50px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $blog->heading }}</td>
                        <td>{!! Str::limit($blog->detail_subcontent, 50) !!}</td>


                        <td class="btn-group" role="group">
                             <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
                    </div>
    </div></div>
        </div>
    </div>
@endsection
