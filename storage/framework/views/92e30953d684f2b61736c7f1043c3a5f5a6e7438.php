<?php $__env->startSection('title', 'Email Verify'); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<form action="" method="post">
<input type="text" name="emailv">
    </br>
<input type="submit" value="verify">

</form>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.users.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>