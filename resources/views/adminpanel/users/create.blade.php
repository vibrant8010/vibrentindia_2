@extends('adminpanel.adminlayout')
@section('title')
    <title>Create User</title>
@endsection

{{-- @section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Create User</h3>
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
                    <a href="#">Edit User</a>
                </li>
            </ul>
        </div>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                                <li class="nav-item submenu" role="presentation">
                                    <a class="nav-link active" id="line-basic-tab" data-bs-toggle="pill" href="#line-basic"
                                        role="tab" aria-controls="line-basic" aria-selected="true">Create User</a>
                                </li>
                                <li class="nav-item submenu" id="company-tab-item" role="presentation"
                                   >
                                    <a class="nav-link" id="line-company-tab" data-bs-toggle="pill" href="#line-company"
                                        role="tab" aria-controls="line-company" aria-selected="false"
                                        tabindex="-1">Company Details</a>
                                </li>
                                <li class="nav-item submenu" id="products-tab-item" role="presentation" style="display: {{ old('role', $user->role) === 'business' ? 'block' : 'none' }};">
                                    <a class="nav-link" id="line-products-tab" data-bs-toggle="pill" href="#line-products"
                                        role="tab" aria-controls="line-products" aria-selected="false"
                                        tabindex="-1">Company Products</a>
                                </li>
                            </ul>

                            <div class="tab-content mt-3 mb-3" id="line-tabContent">
                                <!-- Basic Information Tab -->
                                <div class="tab-pane fade active show" id="line-basic" role="tabpanel"
                                    aria-labelledby="line-basic-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" class="form-control"
                                                    value="{{ old('username') }}" required>
                                                @error('username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ old('email') }}" required>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="mobileno">Mobile No.</label>
                                                <input type="number" name="mobileno" class="form-control"
                                                    value="{{ old('mobileno') }}" required>
                                                @error('mobileno')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="role">Role</label>
                                                <select name="role" id="role" class="form-control" required>
                                                    <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>
                                                        User</option>
                                                    <option value="business"
                                                        {{ old('role') === 'business' ? 'selected' : '' }}>Business
                                                    </option>
                                                </select>
                                                @error('role')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Company Details Tab -->
                                <div class="tab-pane fade" id="line-company" role="tabpanel"
                                    aria-labelledby="line-company-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="name">Company Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="logo_upload">Upload Logo</label>
                                            <input type="file" name="logo_upload" class="form-control"
                                                id="logo_upload"
                                                accept="image/jpeg, image/png, image/jpg, image/gif, image/webp">
                                            @error('logo_upload')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!-- Image Preview -->
                                            <img id="logo_preview" src="#" alt="Logo Preview"
                                                style="max-width: 200px; margin-top: 10px; display: none;">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label for="description">Description</label>
                                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="gst_registration_date">GST Registration Date</label>
                                                <input type="date" name="gst_registration_date" class="form-control"
                                                    value="{{ old('gst_registration_date') }}">
                                                @error('gst_registration_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="gst_no">GST Number</label>
                                                <input type="text" name="gst_no" class="form-control"
                                                    value="{{ old('gst_no') }}">
                                                @error('gst_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="legal_status">Legal Status</label>
                                                <input type="text" name="legal_status" class="form-control"
                                                    value="{{ old('legal_status') }}">
                                                @error('legal_status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="nature_of_business">Nature of Business</label>
                                                <input type="text" name="nature_of_business" class="form-control"
                                                    value="{{ old('nature_of_business') }}">
                                                @error('nature_of_business')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="alternate_names">Alternate Names</label>
                                                <textarea name="alternate_names" class="form-control">{{ old('alternate_names') }}</textarea>
                                                @error('alternate_names')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="city">City</label>
                                                <input type="text" name="city" class="form-control"
                                                    value="{{ old('city') }}">
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label for="state">State</label>
                <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                @error('state')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label for="pincode">Pincode</label>
                                                <input type="text" name="pincode" class="form-control" value="{{ old('pincode') }}">
                                                @error('pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>

                            </div>

                            <div class="text-end mt-3 mb-3">
                                <button type="submit" class="btn btn-success">Add</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Show/hide company details and products tabs based on role selection
        document.getElementById('role').addEventListener('change', function() {
            const companyTabItem = document.getElementById('company-tab-item');
            const productsTabItem = document.getElementById('products-tab-item');

            if (this.value === 'business') {
                companyTabItem.style.display = 'block';
                productsTabItem.style.display = 'block';
            } else {
                companyTabItem.style.display = 'none';
                productsTabItem.style.display = 'none';

                // Activate basic tab if company or products tab is currently active
                if (document.getElementById('line-company-tab').getAttribute('aria-selected') === 'true' ||
                    document.getElementById('line-products-tab').getAttribute('aria-selected') === 'true') {
                    document.getElementById('line-basic-tab').click();
                }
            }
        });

        // Image preview for logo upload
        document.getElementById('logo_upload').addEventListener('change', function(event) {
            if (event.target.files && event.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById('logo_preview');
                    output.src = reader.result;
                    output.style.display = 'block';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>
@endsection --}}
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Create User</h3>
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
                    <a href="#">Create User</a>
                </li>
            </ul>
        </div>

      <!-- Display Validation Errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                            <li class="nav-item submenu" role="presentation">
                                <a class="nav-link active" id="line-basic-tab" data-bs-toggle="pill" href="#line-basic"
                                    role="tab" aria-controls="line-basic" aria-selected="true">Basic Information</a>
                            </li>
                            <li class="nav-item submenu" id="company-tab-item" role="presentation" style="display: {{ old('role') === 'business' ? 'block' : 'none' }};">
                                <a class="nav-link" id="line-company-tab" data-bs-toggle="pill" href="#line-company"
                                    role="tab" aria-controls="line-company" aria-selected="false"
                                    tabindex="-1">Company Details</a>
                            </li>
                            <li class="nav-item submenu" id="products-tab-item" role="presentation" style="display: {{ old('role') === 'business' ? 'block' : 'none' }};">
                                <a class="nav-link" id="line-products-tab" data-bs-toggle="pill" href="#line-products"
                                    role="tab" aria-controls="line-products" aria-selected="false"
                                    tabindex="-1">Company Products</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3 mb-3" id="line-tabContent">
                            <!-- Basic Information Tab -->
                            <div class="tab-pane fade active show" id="line-basic" role="tabpanel"
                                aria-labelledby="line-basic-tab">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" placeholder="Username"
                                                value="{{ old('username') }}" required>
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="mobileno">Mobile No.</label>
                                            <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number"
                                                value="{{ old('mobileno') }}" required>
                                            @error('mobileno')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="role">User Type</label>
                                            <select class="form-select" id="role" name="role" required>
                                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                                <option value="business" {{ old('role') == 'business' ? 'selected' : '' }}>Business</option>
                                            </select>
                                            @error('role')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Company Details Tab -->
                            <div class="tab-pane fade" id="line-company" role="tabpanel"
                                aria-labelledby="line-company-tab">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="name">Company Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="Company Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="legal_status">Legal Status</label>
                                            <input type="text" name="legal_status" class="form-control"
                                                value="{{ old('legal_status') }}" placeholder="Legal Status">
                                            @error('legal_status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="description">Company Description</label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="Company Description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="gst_no">GST Number</label>
                                            <input type="text" name="gst_no" class="form-control"
                                                value="{{ old('gst_no') }}" placeholder="GST Number">
                                            @error('gst_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="gst_registration_date">GST Registration Date</label>
                                            <input type="date" name="gst_registration_date" class="form-control"
                                                value="{{ old('gst_registration_date') }}">
                                            @error('gst_registration_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="nature_of_business">Nature of Business</label>
                                            <input type="text" name="nature_of_business" class="form-control"
                                                value="{{ old('nature_of_business') }}" placeholder="Nature of Business">
                                            @error('nature_of_business')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="alternate_names">Alternate Names</label>
                                            <textarea name="alternate_names" class="form-control" placeholder="Alternate Names">{{ old('alternate_names') }}</textarea>
                                            @error('alternate_names')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control"
                                                value="{{ old('city') }}" placeholder="City">
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="state">State</label>
                                            <input type="text" name="state" class="form-control"
                                                value="{{ old('state') }}" placeholder="State">
                                            @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="pincode">Pincode</label>
                                            <input type="text" name="pincode" class="form-control"
                                                value="{{ old('pincode') }}" placeholder="Pincode">
                                            @error('pincode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="logo_upload">Company Logo</label>
                                            <input type="file" name="logo_upload" class="form-control" id="logo_upload"
                                                accept="image/jpeg, image/png, image/jpg, image/gif, image/webp">
                                            @error('logo_upload')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!-- Image Preview -->
                                            <div class="mt-2">
                                                <img id="logo_preview" src="#"
                                                    alt="Logo Preview" style="max-width: 200px; display:none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Company Products Tab -->
                            <div class="tab-pane fade" id="line-products" role="tabpanel"
                                aria-labelledby="line-products-tab">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-bold">Company Products</h5>
                                            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-plus"></i> Add New Product
                                            </a>
                                        </div>

                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i> No products found for this company.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-3 mb-3">
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </div>

    <script>
        // Show/hide company details and products tabs based on role selection
        document.getElementById('role').addEventListener('change', function () {
            const companyTabItem = document.getElementById('company-tab-item');
            const productsTabItem = document.getElementById('products-tab-item');

            if (this.value === 'business') {
                companyTabItem.style.display = 'block';
                productsTabItem.style.display = 'block';
            } else {
                companyTabItem.style.display = 'none';
                productsTabItem.style.display = 'none';

                // Activate basic tab if company or products tab is currently active
                if (document.getElementById('line-company-tab').getAttribute('aria-selected') === 'true' ||
                    document.getElementById('line-products-tab').getAttribute('aria-selected') === 'true') {
                    document.getElementById('line-basic-tab').click();
                }
            }
        });

        // Image preview for logo upload
        document.getElementById('logo_upload').addEventListener('change', function(event) {
            if (event.target.files && event.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById('logo_preview');
                    output.src = reader.result;
                    output.style.display = 'block';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>
@endsection
