<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>






        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">



            <div class="card">
                <div class="header"> <h3>RECENT TRANSACTIONS</h3></div>
            <div class="portlet box blue panel-success" style="padding-top: 15px;">
                 <div class="portlet-title">
                    <div class="caption">

                        <i class="fa fa-list"></i>  </div>
                </div>

                <div class="portlet-body">
                    <div class="panel-group accordion" id="accordion1">












               <?php
                         $sds =  $trx->where('send_id',Auth::user()->id);
                            foreach ($sds->take(5) as $row){


                     if($row->send_id > 0){
                       $sig = "-";
                       $amo = round($row->amount+$row->charge, 2);
                       $free = $row->charge;
                       $paytxt = "Sent To";
                       $printrefund = "";
                       $color = "panel-danger";
                       $name = $users->find($row->re_id)->name;
                       $email = $users->find($row->re_id)->email;
                       $hed = 'Payment Send To ';

                       }else{

                     }


                      if ($row->mass == ''){
                         $mass = '';
                      }else{

                         $mass = "Message: $row->mass";
                      }
                      ?>








                                <div class="panel <?php echo e($color); ?>">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">

                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#<?php echo e($row->id); ?>" aria-expanded="false">




                                                <div class="row">

                                                    <div class="col-xs-2 col-md-2">
                                                        <b style="font-size: 14px;"><?php echo e(date('d M',$row->date)); ?></b></div>

                                                    <div class="col-xs-10 col-md-8"><b> <?php echo e($hed); ?>  <?php echo e($name); ?></b><br> </div>


                                                    <div class="col-xs-6 col-md-2 pull-right">

                                                        <b style="font-size: 20px;"><?php echo e($sig); ?> </b> <b style="font-size: 14px;">$<?php echo e(round($row->amount),2); ?></b>
                                                    </div>


                                                </div>


                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?php echo e($row->id); ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">



                                            <div class="row">
                                                <div class="col-md-11 col-md-offset-1 col-sm-12">

                                                    <div class="col-md-4 col-sm-12">
                                                        <h4 style="font-weight: bold;"><?php echo e($paytxt); ?></h4>
                                                        <p class="lead" style="font-size: 15px;"><?php echo e($name); ?><br>
                                                            <a href="mailto:<?php echo e($email); ?>" style="font-size: 12px;"><?php echo e($email); ?></a></p>
                                                    </div>


                                                    <div class="col-md-4 col-sm-12">
                                                        <h4 style="font-weight: bold;">Transaction ID</h4>
                                                        <p class="lead" style="margin-bottom: 5px; font-size: 15px;"><?php echo e($row->trx_id); ?></p>

                                                        <i class="fa fa-calendar"></i> <br class="uppercase">  <?php echo e(date('d M Y',$row->date)); ?><br><?php echo e(date('H:i:s D T',$row->date)); ?>

                                                        </br> <?php echo e($date = new ago_time(date('Y-m-d',$row->date))); ?>

                                                        </b>

                                                    </div>


                                                    <div class="col-md-4 col-sm-12">
                                                        <h4 style="font-weight: bold;">Details</h4>

                                                        <div class="col-xs-12">
                                                          <span class="pull-right"><?php echo e(round($row->amount),2); ?> USD</span>  <br>

                                                        </div>
                                                        <div class="col-xs-12">
                                                            Fee  <span class="pull-right"><?php echo e($free); ?> USD</span>  <br> </div>
                                                        <hr>
                                                        <div class="col-xs-12">
                                                            <p><b >=<span class="pull-right"><?php echo e($amo); ?> USD</span>  </b></p>
                                                        </div>
                                                        <p></p>


                                                    </div>

                                                    <div class="col-md-12">

                                                      <?php echo e($mass); ?>



                                                </div>

                                            </div><!-- row -->



                                        </div>
                                    </div>
                                </div>

                                </div>








                   <?php
                       }

                   $sds =  $trx->where('re_id',Auth::user()->id);
                   foreach ($sds->take(5) as $row){


                   if($row->send_id > 0){
                       $sig = "+";
                       $amo = round($row->amount, 2);
                       $free = 0;
                       $paytxt = "Paid By";
                       $printrefund = "REFUND";
                       $color = "panel-success";
                       $name = $users->find($row->send_id)->name;
                       $email = $users->find($row->send_id)->email;
                       $hed = 'Payment Received Via ';

                   }else{

                   }


                   if ($row->mass == ''){
                       $mass = '';
                   }else{

                       $mass = "Message: $row->mass";
                   }
                   ?>








                   <div class="panel <?php echo e($color); ?>">
                       <div class="panel-heading">
                           <h4 class="panel-title">

                               <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#<?php echo e($row->id); ?>" aria-expanded="false">




                                   <div class="row">

                                       <div class="col-xs-2 col-md-2">
                                           <b style="font-size: 14px;"><?php echo e(date('d M',$row->date)); ?></b></div>

                                       <div class="col-xs-10 col-md-8"><b> <?php echo e($hed); ?>  <?php echo e($name); ?></b><br> </div>


                                       <div class="col-xs-6 col-md-2 pull-right">

                                           <b style="font-size: 18px;"><?php echo e($sig); ?></b> <b style="font-size: 14px;">$<?php echo e(round($row->amount),2); ?></b>
                                       </div>


                                   </div>


                               </a>
                           </h4>
                       </div>
                       <div id="<?php echo e($row->id); ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                           <div class="panel-body">



                               <div class="row">
                                   <div class="col-md-11 col-md-offset-1 col-sm-12">

                                       <div class="col-md-4 col-sm-12">
                                           <h4 style="font-weight: bold;"><?php echo e($paytxt); ?></h4>
                                           <p class="lead" style="font-size: 15px;"><?php echo e($name); ?><br>
                                               <a href="mailto:<?php echo e($email); ?>" style="font-size: 12px;"><?php echo e($email); ?></a></p>
                                       </div>


                                       <div class="col-md-4 col-sm-12">
                                           <h4 style="font-weight: bold;">Transaction ID</h4>
                                           <p class="lead" style="margin-bottom: 5px; font-size: 15px;"><?php echo e($row->trx_id); ?></p>

                                           <i class="fa fa-calendar"></i> <br class="uppercase">  <?php echo e(date('d M Y',$row->date)); ?><br><?php echo e(date('H:i:s D T',$row->date)); ?>

                                           </br> <?php echo e($date = new ago_time(date('Y-m-d',$row->date))); ?>

                                           </b>

                                       </div>


                                       <div class="col-md-4 col-sm-12">
                                           <h4 style="font-weight: bold;">Details</h4>

                                           <div class="col-xs-12">
                                               <span class="pull-right"><?php echo e(round($row->amount),2); ?> USD</span>  <br>

                                           </div>
                                           <div class="col-xs-12">
                                               Fee  <span class="pull-right"><?php echo e($free); ?> USD</span>  <br> </div>
                                           <hr>
                                           <div class="col-xs-12">
                                               <p><b >=<span class="pull-right"><?php echo e($amo); ?> USD</span>  </b></p>
                                           </div>
                                           <p></p>


                                       </div>

                                       <div class="col-md-12">

                                           <?php echo e($mass); ?>



                                       </div>

                                   </div><!-- row -->



                               </div>
                           </div>
                       </div>

                   </div>





                   <?php  }?>



                    </div>
                </div>

            </div>



        </div>
           <a href=""><h3> VIEW ALL TRANSACTIONS </h3></a>

    </div>





<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.users.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>