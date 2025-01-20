@extends('businesspanel.busniesspanel')

@section('title')
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
@endsection

@section('container')

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">DataTables.Net</h3>
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
                <a href="#">Tables</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Datatables</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Multi Filter Select</h4>
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
                                @foreach ($user as $users)
                                    <tr>
                                        <td>{{ $users->id }}</td>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->role }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $users->id)  }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
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
    //     $('#ajax-datatable').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: "{{ route('admin.users') }}",
    //         columns: [
    //             { data: 'id', name: 'id' },
    //             { data: 'name', name: 'name' },
    //             { data: 'role', name: 'role' },
    //             { data: 'email', name: 'email' },
    //             { data: 'action', name: 'action', orderable: false, searchable: false }
    //         ],
    //         language: {
    //             search: "Search:",
    //             lengthMenu: "Show _MENU_ entries",
    //             info: "Showing _START_ to _END_ of _TOTAL_ entries",
    //             paginate: {
    //                 first: "First",
    //                 last: "Last",
    //                 next: "Next",
    //                 previous: "Previous",
    //             },
    //         },
    //     });
    });
</script>
@endpush
