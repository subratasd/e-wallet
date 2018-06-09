<?php $__env->startSection('title', 'All Users'); ?>

<?php $__env->startPush('css'); ?>

    <!-- JQuery DataTable Css -->
    <link href="<?php echo e(asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="block-header">
            <h2>


            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Users
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>Email Verify</th>
                                    <th>Mobile Verify</th>
                                    <th>Doc Verify</th>
                                    <th>Block</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Block</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($users->id); ?></th>
                                    <td><?php echo e($users->name); ?></td>
                                    <td><?php echo e($users->email); ?></td>
                                    <td>$<?php echo e(round($users->money,2)); ?></td>
                                    <td><?php if($users->emailV == 0): ?>
                                        <?php echo e('Not Verify'); ?>

                                        <?php else: ?> <?php echo e('Verify'); ?> <?php endif; ?></td>
                                    <td><?php if($users->mobileV == 0): ?>
                                            <?php echo e('Not Verify'); ?>

                                        <?php else: ?> <?php echo e('Verify'); ?> <?php endif; ?></td>
                                    <td><?php if($users->docV == 0): ?>
                                            <?php echo e('Not Verify'); ?>

                                        <?php else: ?> <?php echo e('Verify'); ?> <?php endif; ?></td>
                                    <td><?php if($users->docV == 0): ?>
                                            <?php echo e('block'); ?>

                                        <?php else: ?> <?php echo e('active'); ?> <?php endif; ?></td>
                                    <td><a href=""><button class="btn btn-success waves-brown">View</button></a> </td>
                                    <td><a href=""><button class="btn btn-info waves-brown">Edit</button></a> </td>
                                    <td><a href=""><button class="btn btn-danger waves-brown">Block</button></a> </td>

                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/js/pages/tables/jquery-datatable.js')); ?>"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>