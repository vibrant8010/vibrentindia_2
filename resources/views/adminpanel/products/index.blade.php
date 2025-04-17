<<<<<<< HEAD
@extends('adminpanel.adminlayout')
=======
{{-- @extends('adminpanel.adminlayout')
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
@section('content')

<style>
    .top-products table {
        color: #f1f1f1;
        width: 100%; /* Ensure the table takes full width */
    }
    .btn-edit-blue {
        background-color: #4434a0; /* Blue */
        color: white;
    }
    img {
        width: 150px; /* Adjust width as needed */
        height: auto; /* Maintain aspect ratio */
    }
    /* Add horizontal scrollbar to the table wrapper */
    .table-wrapper {
        overflow-x: auto; /* Enable horizontal scrolling */
        white-space: nowrap; /* Prevent wrapping of table content */
    }
</style>

<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<div class="container">
    <div class="heading-section">
        <div class="main-heading text-white">
            Products
        </div>
        <div class="btn btn-primary">
            <a href="{{ route('admin.products.create') }}" class="btn text-white">Create Product</a>
        </div>
    </div>
<<<<<<< HEAD
=======

    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 2000);
        </script>
    @endif

    <section class="top-products mt-5">
        <!-- Search Bar -->
        <form action="{{ route('admin.products.index') }}" method="GET" class="input-group" style="max-width: 200px;">
            <input type="text" name="search" class="form-control border-primary" placeholder="Search Product" aria-label="Search Product" value="{{ request('search') }}" style="border-radius: 3px; box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);">
        </form>

        <!-- Table Wrapper with Horizontal Scrollbar -->
        <div class="table-wrapper">
            <table id="productsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Logo</th>
                        <th>Company Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Material</th>
                        <th>Category</th>
                        <th>Category_Type</th>
                        <th>Subcategory</th>
                        <th>Size</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->company && $product->company->logo_url)
                                    <img src="{{ asset($product->company->logo_url) }}" style="width: 100px; height: auto;" alt="{{ $product->company->name }}">
                                @else
                                    <span>No Logo</span>
                                @endif
                            </td>
                            <td>{{ $product->company->name ?? 'N/A' }}</td>
                            <td>
                                @if ($product->image_url)
                                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" style="width: 150px; height: auto;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->material ?? 'N/A' }}</td>
                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                            <td>{{ $product->category_type }}</td>
                            <td>{{ $product->subcategory->name ?? 'N/A' }}</td>
                            <td>{{ $product->size ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-edit-blue">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#productsTable').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search functionality
            "ordering": true, // Enable column sorting
            "info": true, // Show table information
            "lengthChange": true, // Enable changing the number of entries shown
            "pageLength": 10, // Set default number of entries to show
            "scrollX": true, // Enable horizontal scrolling for DataTables
            "language": {
                "paginate": {
                    "previous": "Previous",
                    "next": "Next"
                },
                "search": "Search:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries"
            }
        });
    });
</script>

@endsection --}}
@extends('adminpanel.adminlayout')
{{-- @extends('businesspanel.busniesspanel') --}}
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125

    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 2000);
        </script>
    @endif

    <section class="top-products mt-5">
        <!-- Search Bar -->
        <form action="{{ route('admin.products.index') }}" method="GET" class="input-group" style="max-width: 200px;">
            <input type="text" name="search" class="form-control border-primary" placeholder="Search Product" aria-label="Search Product" value="{{ request('search') }}" style="border-radius: 3px; box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);">
        </form>

<<<<<<< HEAD
        <!-- Table Wrapper with Horizontal Scrollbar -->
        <div class="table-wrapper">
            <table id="productsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Logo</th>
                        <th>Company Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Material</th>
                        <th>Category</th>
                        <th>Category_Type</th>
                        <th>Subcategory</th>
                        <th>Size</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->company && $product->company->logo_url)
                                    <img src="{{ asset($product->company->logo_url) }}" style="width: 100px; height: auto;" alt="{{ $product->company->name }}">
                                @else
                                    <span>No Logo</span>
                                @endif
                            </td>
                            <td>{{ $product->company->name ?? 'N/A' }}</td>
                            <td>
                                @if ($product->image_url)
                                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" style="width: 150px; height: auto;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->material ?? 'N/A' }}</td>
                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                            <td>{{ $product->category_type }}</td>
                            <td>{{ $product->subcategory->name ?? 'N/A' }}</td>
                            <td>{{ $product->size ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-edit-blue">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
=======
@section('content')
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<<<<<<< HEAD
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#productsTable').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search functionality
            "ordering": true, // Enable column sorting
            "info": true, // Show table information
            "lengthChange": true, // Enable changing the number of entries shown
            "pageLength": 10, // Set default number of entries to show
            "scrollX": true, // Enable horizontal scrolling for DataTables
            "language": {
                "paginate": {
                    "previous": "Previous",
                    "next": "Next"
                },
                "search": "Search:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries"
            }
        });
    });
</script>

@endsection
=======
        <script>

            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 2000); // Change this value to 10000 for 10 seconds
        </script>

    @endif
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Product List</h3>
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
                    <a href="{{ route('admin.products.index') }}">Products</a>
                </li>
                {{-- <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li> --}}
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                        <h4 class="card-title">Add Row</h4>
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('admin.products.create') }}">
                            <i class="fa fa-plus"></i>
                            Add Products
                        </a>
                        </div>
                    </div>
                    <!--<div class="card-body">-->
                    <!--    @if(!empty($products) && $products->count() > 0)-->
                    <!--    <div class="table-responsive">-->
                    <!--        <table class="table table-hover table-bordered dataTable" id="multi-filter-products">-->
                    <!--            <thead class="thead-light">-->
                    <!--                <tr>-->
                    <!--                    <th>ID</th>-->
                    <!--                    <th>Image</th>-->
                    <!--                    <th>Name</th>-->
                    <!--                    <th>Subcategory</th>-->
                    <!--                    <th>Category Type</th>-->
                    <!--                    <th>Company Name</th>-->
                    <!--                    <th>Material</th>-->
                    <!--                    <th>Size</th>-->
                    <!--                    <th>Created</th>-->
                    <!--                    <th>Actions</th>-->
                    <!--                </tr>-->
                    <!--            </thead>-->
                    <!--            <tbody>-->
                    <!--                @foreach($products as $product)-->
                    <!--                    <tr>-->
                    <!--                        <td>{{ $product->id }}</td>-->
                    <!--                        <td>-->
                    <!--                            @if($product->image_url)-->
                    <!--                                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"-->
                    <!--                                    class="img-thumbnail" style="max-width: 50px; max-height: 50px;">-->
                    <!--                            @else-->
                    <!--                                <span class="badge bg-secondary">No Image</span>-->
                    <!--                            @endif-->
                    <!--                        </td>-->
                    <!--                        <td>{{ $product->name }}</td>-->
                    <!--                        <td>{{ $product->subcategory->name ?? 'N/A' }}</td>-->
                    <!--                        <td>-->
                    <!--                            @if($product->category_type == 'Top')-->
                    <!--                                <span class="badge bg-success">Top</span>-->
                    <!--                            @elseif($product->category_type == 'Trending')-->
                    <!--                                <span class="badge bg-info">Trending</span>-->
                    <!--                            @elseif($product->category_type == 'New Arrival')-->
                    <!--                                <span class="badge bg-primary">New Arrival</span>-->
                    <!--                            @endif-->
                    <!--                        </td>-->
                    <!--                        <td>{{ $product->company->name ?? 'N/A' }}</td>-->
                    <!--                        <td>{{ $product->material ?? 'N/A' }}</td>-->
                    <!--                        <td>{{ $product->size ?? 'N/A' }}</td>-->
                    <!--                        <td>{{ $product->created_at ? $product->created_at->format('d M Y') : 'N/A' }}</td>-->
                    <!--                        <td>-->
                    <!--                            <div class="btn-group" role="group">-->
                    <!--                                <a href="{{ route('admin.products.edit', $product->id) }}"-->
                    <!--                                   class="btn btn-sm btn-info">-->
                    <!--                                    <i class="fas fa-edit"></i>-->
                    <!--                                </a>-->
                    <!--                                {{-- <a href="{{ route('admin.products.show', $product->id) }}"-->
                    <!--                                   class="btn btn-sm btn-primary">-->
                    <!--                                    <i class="fas fa-eye"></i>-->
                    <!--                                </a> --}}-->
                    <!--                                <form action="{{ route('admin.products.destroy', $product->id) }}"-->
                    <!--                                      method="POST" class="d-inline"-->
                    <!--                                      onsubmit="return confirm('Are you sure you want to delete this product?');">-->
                    <!--                                    @csrf-->
                    <!--                                    @method('DELETE')-->
                    <!--                                    <button type="submit" class="btn btn-sm btn-danger">-->
                    <!--                                        <i class="fas fa-trash"></i>-->
                    <!--                                    </button>-->
                    <!--                                </form>-->
                    <!--                            </div>-->
                    <!--                        </td>-->
                    <!--                    </tr>-->
                    <!--                @endforeach-->
                    <!--            </tbody>-->
                    <!--        </table>-->
                    <!--    </div>-->
                    <!--@else-->
                    <!--    <div class="alert alert-info">-->
                    <!--        <i class="fas fa-info-circle me-2"></i> No products found for this company.-->
                    <!--    </div>-->
                    <!--@endif-->
                    <!--</div>-->
                     <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered dataTable" id="multi-filter-products">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Subcategory</th>
                                        <th>Category Type</th>
                                        <th>Company Name</th>
                                        <th>Material</th>
                                        <th>Size</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<!-- DataTables Scripts -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('#multi-filter-products').DataTable({-->
<!--            paging: true,-->
<!--            searching: true,-->
<!--            ordering: true,-->
<!--            lengthMenu: [10, 25, 50, 100],-->
<!--            language: {-->
<!--                search: "Search:",-->
<!--                lengthMenu: "Show _MENU_ entries",-->
<!--                info: "Showing _START_ to _END_ of _TOTAL_ entries",-->
<!--                paginate: {-->
<!--                    first: "First",-->
<!--                    last: "Last",-->
<!--                    next: "Next",-->
<!--                    previous: "Previous",-->
<!--                },-->
<!--            },-->
<!--        });-->

<!--    });-->
<!--</script>-->
@endpush

>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
