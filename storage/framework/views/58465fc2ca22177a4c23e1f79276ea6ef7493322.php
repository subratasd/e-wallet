<html lang="<?php echo e(app()->getLocale()); ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'Laravel')); ?></title>



    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/theme.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/MoneAdmin.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/Font-Awesome/css/font-awesome.css')); ?>" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="<?php echo e(asset('assets/css/layout2.css')); ?>" rel="stylesheet" />
    <!-- END PAGE LEVEL  STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<?php echo $__env->yieldPushContent('css'); ?>

</head>

<body class="padTop53">




<script>
    var Auto_refresh = setInterval(function () {
        $('#dd').load('<?php echo url('user/money');?>').fadeIn("slow");
    },1000);

    var Auto_refresh2 = setInterval(function () {
        $('#ddd').load('<?php echo url('user/money');?>').fadeIn("slow");
    },1000);



</script>


<!-- MAIN WRAPPER -->
<div id="wrap">


    <!-- HEADER SECTION -->
    <div id="top">

        <?php echo $__env->make('layouts.user.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
    <!-- END HEADER SECTION -->



    <!-- MENU SECTION -->
    <div id="left">
        <div class="media user-media well-small">
            <a class="user-link" href="#">
                <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo e(asset('assets/img/user.gif')); ?>" />
            </a>
            <br />
            <div class="media-body">
                <h5 class="media-heading"> <?php echo e(Auth::user()->name); ?></h5>
                <ul class="list-unstyled user-info">

                    <li >
                       <h4 class="panel-success text-center">Balance $<b id="dd"></b></h4>


                    </li>

                </ul>
            </div>
            <br />
        </div>

       <?php echo $__env->make('layouts.user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
    <!--END MENU SECTION -->


    <!--PAGE CONTENT -->
    <div id="content">

        <?php echo $__env->yieldContent('content'); ?>




    </div>
    <!--END PAGE CONTENT -->
    <!-- RIGHT STRIP  SECTION -->
    <div id="right">


        <div class="well well-small">
            <ul class="list-unstyled">
                <li>Balance &nbsp;&nbsp;&nbsp; : <span>$<b id="ddd"></b></span></li>
                <li>Account ID &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: <span>53,000</span></li>
                <li>Account status   : <span>3,000</span></li>
                <li>Account type &nbsp;&nbsp;: <span>3,000</span></li>
                <li>Your Login ip &nbsp;&nbsp;: <span>3,000</span></li>
            </ul>
        </div>
        <div class="well well-small">
            <button class="btn btn-block"> Help </button>
            <button class="btn btn-primary btn-block"> Tickets</button>
            <button class="btn btn-info btn-block"> New </button>
            <button class="btn btn-success btn-block"> Users </button>
            <button class="btn btn-danger btn-block"> Profit </button>
            <button class="btn btn-warning btn-block"> Sales </button>
            <button class="btn btn-inverse btn-block"> Stock </button>
        </div>
        <div class="well well-small">
            <span>Profit</span><span class="pull-right"><small>20%</small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-info" style="width: 20%"></div>
            </div>
            <span>Sales</span><span class="pull-right"><small>40%</small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
            </div>
            <span>Pending</span><span class="pull-right"><small>60%</small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
            </div>
            <span>Summary</span><span class="pull-right"><small>80%</small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
            </div>
        </div>




    </div>
    <!-- END RIGHT STRIP  SECTION -->

</div>

<!--END MAIN WRAPPER -->








<!-- FOOTER -->
<div id="footer">
    <p>&copy; <?php echo e(date('Y')); ?> E-wallet</p>
</div>
<!--END FOOTER -->










<!-- GLOBAL SCRIPTS -->
<script src="<?php echo e(asset('assets/plugins/jquery-2.0.3.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js')); ?>"></script>
<!-- END GLOBAL SCRIPTS -->

<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<?php echo Toastr::message(); ?>


<script>

    <?php if($errors->any()): ?>

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

             toastr.error('<?php echo e($error); ?>','Error',{
                 closeButton:true,
        progressBar:true,
    });
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</script>

<?php echo $__env->yieldPushContent('js'); ?>

</body>


</html>