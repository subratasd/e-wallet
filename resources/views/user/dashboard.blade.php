
@extends('layouts.users.master')

@section('title', 'Dashboard')

@push('css')

@endpush


@section('content')






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








                                <div class="panel {{ $color }}">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">

                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#{{$row->id}}" aria-expanded="false">




                                                <div class="row">

                                                    <div class="col-xs-2 col-md-2">
                                                        <b style="font-size: 14px;">{{date('d M',$row->date)}}</b></div>

                                                    <div class="col-xs-10 col-md-8"><b> {{ $hed }}  {{ $name }}</b><br> </div>


                                                    <div class="col-xs-6 col-md-2 pull-right">

                                                        <b style="font-size: 20px;">{{ $sig }} </b> <b style="font-size: 14px;">${{round($row->amount),2}}</b>
                                                    </div>


                                                </div>


                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{$row->id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">



                                            <div class="row">
                                                <div class="col-md-11 col-md-offset-1 col-sm-12">

                                                    <div class="col-md-4 col-sm-12">
                                                        <h4 style="font-weight: bold;">{{ $paytxt }}</h4>
                                                        <p class="lead" style="font-size: 15px;">{{ $name }}<br>
                                                            <a href="mailto:{{ $email }}" style="font-size: 12px;">{{ $email }}</a></p>
                                                    </div>


                                                    <div class="col-md-4 col-sm-12">
                                                        <h4 style="font-weight: bold;">Transaction ID</h4>
                                                        <p class="lead" style="margin-bottom: 5px; font-size: 15px;">{{$row->trx_id}}</p>

                                                        <i class="fa fa-calendar"></i> <br class="uppercase">  {{date('d M Y',$row->date)}}<br>{{date('H:i:s D T',$row->date)}}
                                                        </br> {{$date = new ago_time(date('Y-m-d',$row->date))}}
                                                        </b>

                                                    </div>


                                                    <div class="col-md-4 col-sm-12">
                                                        <h4 style="font-weight: bold;">Details</h4>

                                                        <div class="col-xs-12">
                                                          <span class="pull-right">{{round($row->amount),2}} USD</span>  <br>

                                                        </div>
                                                        <div class="col-xs-12">
                                                            Fee  <span class="pull-right">{{ $free }} USD</span>  <br> </div>
                                                        <hr>
                                                        <div class="col-xs-12">
                                                            <p><b >=<span class="pull-right">{{ $amo }} USD</span>  </b></p>
                                                        </div>
                                                        <p></p>


                                                    </div>

                                                    <div class="col-md-12">

                                                      {{ $mass }}


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








                   <div class="panel {{ $color }}">
                       <div class="panel-heading">
                           <h4 class="panel-title">

                               <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#{{$row->id}}" aria-expanded="false">




                                   <div class="row">

                                       <div class="col-xs-2 col-md-2">
                                           <b style="font-size: 14px;">{{date('d M',$row->date)}}</b></div>

                                       <div class="col-xs-10 col-md-8"><b> {{ $hed }}  {{ $name }}</b><br> </div>


                                       <div class="col-xs-6 col-md-2 pull-right">

                                           <b style="font-size: 18px;">{{ $sig }}</b> <b style="font-size: 14px;">${{round($row->amount),2}}</b>
                                       </div>


                                   </div>


                               </a>
                           </h4>
                       </div>
                       <div id="{{$row->id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                           <div class="panel-body">



                               <div class="row">
                                   <div class="col-md-11 col-md-offset-1 col-sm-12">

                                       <div class="col-md-4 col-sm-12">
                                           <h4 style="font-weight: bold;">{{ $paytxt }}</h4>
                                           <p class="lead" style="font-size: 15px;">{{ $name }}<br>
                                               <a href="mailto:{{ $email }}" style="font-size: 12px;">{{ $email }}</a></p>
                                       </div>


                                       <div class="col-md-4 col-sm-12">
                                           <h4 style="font-weight: bold;">Transaction ID</h4>
                                           <p class="lead" style="margin-bottom: 5px; font-size: 15px;">{{$row->trx_id}}</p>

                                           <i class="fa fa-calendar"></i> <br class="uppercase">  {{date('d M Y',$row->date)}}<br>{{date('H:i:s D T',$row->date)}}
                                           </br> {{$date = new ago_time(date('Y-m-d',$row->date))}}
                                           </b>

                                       </div>


                                       <div class="col-md-4 col-sm-12">
                                           <h4 style="font-weight: bold;">Details</h4>

                                           <div class="col-xs-12">
                                               <span class="pull-right">{{round($row->amount),2}} USD</span>  <br>

                                           </div>
                                           <div class="col-xs-12">
                                               Fee  <span class="pull-right">{{ $free }} USD</span>  <br> </div>
                                           <hr>
                                           <div class="col-xs-12">
                                               <p><b >=<span class="pull-right">{{ $amo }} USD</span>  </b></p>
                                           </div>
                                           <p></p>


                                       </div>

                                       <div class="col-md-12">

                                           {{ $mass }}


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





@endsection


@push('js')

@endpush