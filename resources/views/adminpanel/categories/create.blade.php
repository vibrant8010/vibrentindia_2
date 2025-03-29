@extends('adminpanel.adminlayout')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Create Category</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Users</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Create Category</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter Category Name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>


                             <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                <label for="subcategories">Subcategories</label>
                                <input type="text" name="subcategories" id="subcategories"
                                    class="form-control @error('subcategories') is-invalid @enderror"
                                    value="{{ old('subcategories') }}" placeholder="Enter subcategories (comma-separated)">

                                @error('subcategories')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                             </div>

                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
