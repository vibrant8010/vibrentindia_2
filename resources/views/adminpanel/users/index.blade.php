@extends('adminpanel.adminlayout')
{{-- @extends('businesspanel.busniesspanel') --}}



@section('content')
<<<<<<< HEAD

<style>
    .top-products table{
      color: #f1f1f1;
    }
    .btn-edit-blue {
        background-color:#4434a0; /* Blue */
        color: white;
    }
   
</style>

<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<div class="container">
    <div class="heading-section">
        <div class="main-heading text-white">
            UserList
        </div>
        <div class="btn btn-primary">
            <a href="{{ route('admin.users.create') }}" class="btn text-white ">Create Users</a>
        </div>
    </div>
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
    <section class="top-products mt-5">
        <div class="d-flex flex-row justify-content-between align-items-center mb-2">
       
            <!-- Search Bar -->
            <form action="{{ route('admin.users.index') }}" method="GET" class="input-group" style="max-width: 200px;">
                @csrf
                <input type="text" name="search" class="form-control border-primary" placeholder="Search Users" aria-label="Search Users" value="{{ request('search') }}" style="border-radius: 3px; box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);">
                {{-- <button type="submit" class="btn btn-primary">Search</button> --}}
            </form>
            
            <!-- Show Entries Dropdown -->
            
            <!-- Create Users Button -->
            {{-- <button class="btn btn-success" >Create Users</button> --}}
        
        </div>
        
    <div class="table-wrapper">
        <table id="usersTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobileno }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-edit-blue">Edit</a>
                        </td>
                        
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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
        $('#usersTable').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search functionality
            "ordering": true, // Enable column sorting
            "info": true, // Show table information
            "lengthChange": true, // Enable changing the number of entries shown
            "pageLength": 10, // Set default number of entries to show
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
=======
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
            <h3 class="fw-bold mb-3">User List</h3>
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
                    <a href="{{ route('admin.users.index') }}">Users</a>
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
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('admin.users.create') }}">
                            <i class="fa fa-plus"></i>
                            Create Users
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id)  }}" class="btn btn-sm btn-primary">Edit</a>
                                                {{-- <a href="{{ route('admin.users.destroy', $user->id)  }}" class="btn btn-sm btn-danger">Delete</a> --}}
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125

@endsection

@push('scripts')
<!-- DataTables Scripts -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
<script>
    $(document).ready(function () {
        $('#multi-filter-select').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [10, 25, 50, 100],
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous",
                },
            },
        });

    });
</script>
@endpush

