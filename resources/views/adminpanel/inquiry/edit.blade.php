@extends('adminpanel.adminlayout')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Inquiry</h3>
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
                    <a href="#">Edit Product</a>
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
                        <form action="{{ route('admin.inquiry.update', $inquiry->id) }}" method="POST"
                           >
                            @csrf
                            @method('PUT')


                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="product_id">Product ID:</label>
                                        <input type="text" class="form-control" name="product_id"
                                            value="{{ old('product_id', $inquiry->product_code) }}" required readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="product_name">Product Name:</label>
                                        <input type="text" class="form-control" name="product_name"
                                            value="{{ old('product_name', $inquiry->product_name) }}" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="companyname">Company Name:</label>
                                        <input type="text" class="form-control" name="companyname"
                                            value="{{ old('companyname', $inquiry->companyname) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">

                                        <label for="name">Customer Name:</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $inquiry->name) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                       <label for="email">Email:</label>
                                       <input type="email" class="form-control" name="email" value="{{ old('email', $inquiry->email) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                     <label for="phone">Phone:</label>
                                      <input type="text" class="form-control" name="phone" value="{{ old('phone', $inquiry->phone) }}">
                                  </div>
                                </div>
                                    </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control" name="quantity" value="{{ old('quantity', $inquiry->quantity) }}"
                                    min="1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                <label for="message">Message:</label>
                                <textarea class="border-0 w-100"  name="message">{{ old('message', $inquiry->message) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <button type="submit" class="btn-submit m-0">Update Inquiry</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.inquiry.index') }}">Back to Inquiry List</a>


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

            .alert ul {
                margin: 0;
                padding-left: 20px;
            }
        </style>


        <script>
            document.getElementById('category_id').addEventListener('change', function() {
                let categoryId = this.value;

                fetch(`/get-subcategories/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        let subcategorySelect = document.getElementById('subcategory_id');
                        subcategorySelect.innerHTML = '<option value="">Select a Subcategory</option>';

                        data.subcategories.forEach(subcategory => {
                            let option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            });
        </script>
    @endsection
