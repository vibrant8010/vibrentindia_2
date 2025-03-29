{{-- @extends('adminpanel.adminlayout')

@section('content')
<div class="container">
    <h1>Edit User</h1>

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

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Basic User Fields -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $user->name) }}" required>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="mobileno">Mobile No.</label>
            <input type="number" name="mobileno" class="form-control" value="{{ old('mobileno', $user->mobileno) }}" required>
            @error('mobileno')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                <option value="business" {{ old('role', $user->role) === 'business' ? 'selected' : '' }}>Business</option>
            </select>
            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Company Details Fields (Hidden by Default) -->
        <div id="company-details" style="display: {{ old('role', $user->role) === 'business' ? 'block' : 'none' }};">
            <h2>Company Details</h2>
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->companyDetails->name ?? '') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="logo_upload">Upload Logo</label>
                <input type="file" name="logo_upload" class="form-control" id="logo_upload" accept="image/jpeg, image/png, image/jpg, image/gif, image/webp">
                @error('logo_upload')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <!-- Image Preview -->
                <img id="logo_preview" src="{{ $user->companyDetails && $user->companyDetails->logo_url ? asset($user->companyDetails->logo_url) : '#' }}" alt="Logo Preview" style="max-width: 200px; margin-top: 10px; display: {{ $user->companyDetails && $user->companyDetails->logo_url ? 'block' : 'none' }};">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $user->companyDetails->description ?? '') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="gst_registration_date">GST Registration Date</label>
                <input type="date" name="gst_registration_date" class="form-control" value="{{ old('gst_registration_date', $user->companyDetails->gst_registration_date ?? '') }}">
                @error('gst_registration_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="gst_no">GST Number</label>
                <input type="text" name="gst_no" class="form-control" value="{{ old('gst_no', $user->companyDetails->gst_no ?? '') }}">
                @error('gst_no')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="legal_status">Legal Status</label>
                <input type="text" name="legal_status" class="form-control" value="{{ old('legal_status', $user->companyDetails->legal_status ?? '') }}">
                @error('legal_status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nature_of_business">Nature of Business</label>
                <input type="text" name="nature_of_business" class="form-control" value="{{ old('nature_of_business', $user->companyDetails->nature_of_business ?? '') }}">
                @error('nature_of_business')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="alternate_names">Alternate Names</label>
                <textarea name="alternate_names" class="form-control">{{ old('alternate_names', $user->companyDetails->alternate_names ?? '') }}</textarea>
                @error('alternate_names')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $user->companyDetails->city ?? '') }}">
                @error('city')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" name="state" class="form-control" value="{{ old('state', $user->companyDetails->state ?? '') }}">
                @error('state')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="pincode">Pincode</label>
                <input type="text" name="pincode" class="form-control" value="{{ old('pincode', $user->companyDetails->pincode ?? '') }}">
                @error('pincode')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    // Show/hide company details based on role selection
    document.getElementById('role').addEventListener('change', function () {
        const companyDetails = document.getElementById('company-details');
        if (this.value === 'business') {
            companyDetails.style.display = 'block';
        } else {
            companyDetails.style.display = 'none';
        }
    });

    // Image preview for logo upload
    document.getElementById('logo_upload').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('logo_preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
@endsection --}}
@extends('adminpanel.adminlayout')
@section('title')
    <title>Edit User</title>
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit User</h3>
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
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                                <li class="nav-item submenu" role="presentation">
                                    <a class="nav-link active" id="line-basic-tab" data-bs-toggle="pill" href="#line-basic"
                                        role="tab" aria-controls="line-basic" aria-selected="true">Basic Information</a>
                                </li>
                                <li class="nav-item submenu" id="company-tab-item" role="presentation" style="display: {{ old('role', $user->role) === 'business' ? 'block' : 'none' }};">
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
                                                <input type="text" class="form-control" name="username" placeholder="Username"
                                                    value="{{ old('username', $user->name) }}" required>
                                                @error('username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email"
                                                    value="{{ old('email', $user->email) }}" required>
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
                                                    value="{{ old('mobileno', $user->mobileno) }}" required>
                                                @error('mobileno')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="role">User Type</label>
                                                <select class="form-select" id="role" name="role" required>
                                                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                                                    <option value="business" {{ old('role', $user->role) === 'business' ? 'selected' : '' }}>Business</option>
                                                </select>
                                                @error('role')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ old('address', $user->address ?? '') }}" placeholder="Address">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-1">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label for="about">About Me</label>
                                                <textarea class="form-control" name="about" placeholder="About Me" rows="3">{{ old('about', $user->about ?? '') }}</textarea>
                                                @error('about')
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
                                                    value="{{ old('name', $user->companyDetails->name ?? '') }}" placeholder="Company Name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="legal_status">Legal Status</label>
                                                <input type="text" name="legal_status" class="form-control"
                                                    value="{{ old('legal_status', $user->companyDetails->legal_status ?? '') }}" placeholder="Legal Status">
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
                                                <textarea name="description" class="form-control" rows="3" placeholder="Company Description">{{ old('description', $user->companyDetails->description ?? '') }}</textarea>
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
                                                    value="{{ old('gst_no', $user->companyDetails->gst_no ?? '') }}" placeholder="GST Number">
                                                @error('gst_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="gst_registration_date">GST Registration Date</label>
                                                <input type="date" name="gst_registration_date" class="form-control"
                                                    value="{{ old('gst_registration_date', $user->companyDetails->gst_registration_date ?? '') }}">
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
                                                    value="{{ old('nature_of_business', $user->companyDetails->nature_of_business ?? '') }}" placeholder="Nature of Business">
                                                @error('nature_of_business')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label for="alternate_names">Alternate Names</label>
                                                <textarea name="alternate_names" class="form-control" placeholder="Alternate Names">{{ old('alternate_names', $user->companyDetails->alternate_names ?? '') }}</textarea>
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
                                                    value="{{ old('city', $user->companyDetails->city ?? '') }}" placeholder="City">
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label for="state">State</label>
                                                <input type="text" name="state" class="form-control"
                                                    value="{{ old('state', $user->companyDetails->state ?? '') }}" placeholder="State">
                                                @error('state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label for="pincode">Pincode</label>
                                                <input type="text" name="pincode" class="form-control"
                                                    value="{{ old('pincode', $user->companyDetails->pincode ?? '') }}" placeholder="Pincode">
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
                                                    <img id="logo_preview" src="{{ $user->companyDetails && $user->companyDetails->logo_url ? asset($user->companyDetails->logo_url) : '#' }}"
                                                        alt="Logo Preview" style="max-width: 200px; display: {{ $user->companyDetails && $user->companyDetails->logo_url ? 'block' : 'none' }};">
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

                                            @php
                                            // Get company products
                                            $products = null;
                                            if (isset($user->companyDetails)) {
                                              $products = \App\Models\Product::where('company_id', $user->companyDetails->id)
                                                        ->latest()
                                                        ->get();
                                                }
                                            @endphp

                                            @if(!empty($products) && $products->count() > 0)
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Image</th>
                                                                <th>Name</th>
                                                                <th>Subcategory</th>
                                                                <th>Category Type</th>
                                                                <th>Material</th>
                                                                <th>Size</th>
                                                                <th>Created</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($products as $product)
                                                                <tr>
                                                                    <td>{{ $product->id }}</td>
                                                                    <td>
                                                                        @if($product->image_url)
                                                                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                                                                                class="img-thumbnail" style="max-width: 50px; max-height: 50px;">
                                                                        @else
                                                                            <span class="badge bg-secondary">No Image</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $product->name }}</td>
                                                                    <td>{{ $product->subcategory->name ?? 'N/A' }}</td>
                                                                    <td>
                                                                        @if($product->category_type == 'Top')
                                                                            <span class="badge bg-success">Top</span>
                                                                        @elseif($product->category_type == 'Trending')
                                                                            <span class="badge bg-info">Trending</span>
                                                                        @elseif($product->category_type == 'New Arrival')
                                                                            <span class="badge bg-primary">New Arrival</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $product->material ?? 'N/A' }}</td>
                                                                    <td>{{ $product->size ?? 'N/A' }}</td>
                                                                    <td>{{ $product->created_at ? $product->created_at->format('d M Y') : 'N/A' }}</td>
                                                                    <td>
                                                                        <div class="btn-group" role="group">
                                                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                                               class="btn btn-sm btn-info">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                            {{-- <a href="{{ route('admin.products.show', $product->id) }}"
                                                                               class="btn btn-sm btn-primary">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a> --}}
                                                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                                                  method="POST" class="d-inline"
                                                                                  onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="alert alert-info">
                                                    <i class="fas fa-info-circle me-2"></i> No products found for this company.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-3 mb-3">
                                <button type="submit" class="btn btn-success">Update</button>
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
