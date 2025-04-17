{{-- @extends('adminpanel.adminlayout')
@section('content')
<style>
    .top-products table{
      color: #f1f1f1;
    }
    .btn-edit-blue {
        background-color:#4434a0; /* Blue */
        color: white;
}



</style>

<div class="container">
    <div class="heading-section">
        <div class="main-heading text-white">
            Inquiries
        </div>
    </div>

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
        <form action="{{ route('admin.inquiry.index') }}" method="GET" class="input-group" style="max-width: 200px;">
            <input type="text" name="search" class="form-control border-primary" placeholder="Search inquiry" aria-label="Search Product" value="{{ request('search') }}" style="border-radius: 3px; box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);">
                        </form>
        <div class="table-wrapper">


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Company Name</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Quantity</th>
                        <th>Message</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
               <tbody>
                @foreach($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->product_code }}</td>
                    <td>{{ $inquiry->product_name }}</td>
                    <td>{{ $inquiry->companyname }}</td>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->phone }}</td>
                    <td>{{ $inquiry->quantity }}</td>
                    <td>{{ $inquiry->message }}</td>
                    <td>
                        <a href="{{ route('admin.inquiry.edit', $inquiry->id) }}" class="btn btn-edit-blue">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.inquiry.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
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
@endsection --}}
@extends('adminpanel.adminlayout')
{{-- @extends('businesspanel.busniesspanel') --}}



@section('content')
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>


        <script>

            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 2000); // Change this value to 10000 for 10 seconds
        </script>

    @endif
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">inquirie List</h3>
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
                    <a href="{{ route('admin.inquiry.index') }}">Inquiry</a>
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
                    {{-- <div class="card-header">
                        <div class="d-flex align-items-center">
                        <h4 class="card-title">Add Row</h4>
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('admin.inquiry.create') }}">
                            <i class="fa fa-plus"></i>
                            Add Products
                        </a>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        @if(!empty($inquiries) && $inquiries->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered dataTable" id="multi-filter-inquiry">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Company Name</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Quantity</th>
                                        <th>Message</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inquiries as $inquiry)
                                    <tr>
                                        <td>{{ $inquiry->product_code }}</td>
                                        <td>{{ $inquiry->product_name }}</td>
                                        <td>{{ $inquiry->companyname }}</td>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->phone }}</td>
                                        <td>{{ $inquiry->quantity }}</td>
                                        <td>{{ $inquiry->message }}</td>
                                        <td>
                                            <a href="{{ route('admin.inquiry.edit', $inquiry->id) }}" class="btn btn-edit-blue">  <i class="fas fa-edit"></i>   </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.inquiry.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i> No inquiries found for any company.
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
