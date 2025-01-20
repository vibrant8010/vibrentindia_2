<?php $__env->startSection('title'); ?>
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

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
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($users->id); ?></td>
                                        <td><?php echo e($users->name); ?></td>
                                        <td><?php echo e($users->role); ?></td>
                                        <td><?php echo e($users->email); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.users.edit', $users->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- DataTables Scripts -->

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
    //         ajax: "<?php echo e(route('admin.users')); ?>",
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('businesspanel.busniesspanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/businesspanel/Users/show.blade.php ENDPATH**/ ?>