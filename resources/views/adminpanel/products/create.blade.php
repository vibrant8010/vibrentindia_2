@extends('adminpanel.adminlayout')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Create Product</h3>
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
                    <a href="#">Create Product</a>
                </li>
            </ul>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="name">Product Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter Product Name"
                                            name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="description">Description:</label>
                                        <textarea name="description" class="border-0 w-100" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="material">Material:</label>
                                        <input type="text" placeholder="Enter Material" class="form-control"
                                            name="material" value="{{ old('material') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="size">Size:</label>
                                        <input type="text" class="form-control" name="size"
                                            value="{{ old('size') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="category_id">Category:</label>
                                        <select name="category_id" class="border-0 w-100" id="category_id" required>
                                            <option value="" disabled selected>Select a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="company_id">Company:</label>
                                        <select name="company_id" id="company_id" class="border-0 w-100"  required>
                                            <option value="" disabled selected>Select a Company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                                    {{ $company->name }}
                                                </option> <!-- Changed to company name -->
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                <label for="category_type">Category Type:</label>
                                <select name="category_type" class="border-0 w-100"  required>
                                    <option value="" disabled selected>Select a Category Type</option>
                                    <option value="Top" {{ old('category_type') == 'Top' ? 'selected' : '' }}>Top
                                    </option>
                                    <option value="Trending" {{ old('category_type') == 'Trending' ? 'selected' : '' }}>
                                        Trending</option>
                                    <option value="New Arrival"
                                        {{ old('category_type') == 'New Arrival' ? 'selected' : '' }}>
                                        New Arrival</option>
                                </select>
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                <label for="subcategory_id">Subcategory:</label>
                                <select name="subcategory_id" class="border-0 w-100"  id="subcategory_id" required>
                                    <option value="" disabled selected>Select a Subcategory</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                            {{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                <label for="image_url">Image:</label>
                                <input type="file" name="image_url" required>
                            </div>
                                </div>

                            <div class="form-row">
                                <button type="submit" class="btn-submit m-0">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.products.index') }}" class="m-0">Back to Product List</a>
    </div>

    <style>
        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .product-form {
            max-width: 800px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-row label {
            width: 150px;
            font-weight: 600;
        }

        .form-row input,
        .form-row select,
        .form-row textarea {
            flex: 1;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-left: 10px;
        }

        .form-row textarea {
            min-height: 80px;
            resize: vertical;
        }

        .form-row input[type="file"] {
            padding: 5px;
        }

        .btn-submit {
            background-color: #28a745;
            /* Green for success */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-left: 160px;
            /* Align with label width */
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>

    <script>
        document.getElementById('category_id').addEventListener('change', function() {
            var categoryId = this.value;
            fetch('/get-subcategories/' + categoryId)
                .then(response => response.json())
                .then(data => {
                    var subcategorySelect = document.getElementById('subcategory_id');
                    subcategorySelect.innerHTML =
                        '<option value="" disabled selected>Select a Subcategory</option>';
                    data.subcategories.forEach(function(subcategory) {
                        var option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;
                        subcategorySelect.appendChild(option);
                    });
                });
        });
    </script>
@endsection
