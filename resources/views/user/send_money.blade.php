@extends('layouts.users.master')

@section('title', 'Send Money')

@push('css')

@endpush


@section('content')

    <div style="padding-top: 30px;"></div>

    <div class="col-md-12 col-sm-12 col-lg-12">
<form action="{{route('user.sendmoney.store')}}" method="post">
    @csrf


    <div class="form-group input-group">
        <span class="input-group-addon">To</span>
        <input type="text" class="form-control" placeholder="Type Email" id="sendto" name="sendto">
    </div>

    <br>


    <div id="dt"></div>
    <div id="dts"></div>



    <div class="form-group input-group" >
        <span class="input-group-addon">$</span>
        <input type="text" class="form-control" placeholder="Amount USD" name="amount" id="am">
        <span class="input-group-addon">USD</span>
    </div>
    <div id="cp" style="color: red;"></div>

    <br>
    <textarea class="form-control" rows="5" name="mass" placeholder="Your Message (Optional)"></textarea>
    <br>
    <input type="submit" value="Send" class="btn btn-success btn-block">




</form>
    </div>

@endsection


@push('js')


    <script>




        jQuery(document).ready(function(){


            $("#cclick").click(function(){

                $("#cp").show();


                $("#charge").val("1");

                $("#cclick").hide();
                $("#cclick2").show();

            });



            $("#cclick2").click(function(){

                $("#cp").hide();
                $("#charge").val("0");

                $("#cclick2").hide();
                $("#cclick").show();

            });


            $("#cclick").click(function(){

                var amm = $("#am").val();

                $.post(
                    "jsapi-charge.php",
                    {
                        amount : amm
                    },
                    function(data) {
                        $("#cp").html(data);
                    }
                );

            });


            $("#am").on('input',function(){

                var amm = $("#am").val();

                $.post(
                    "jsapi-charge.php",
                    {
                        amount : amm
                    },
                    function(data) {
                        $("#cp").html(data);
                    }
                );

            });


            $("#dt").click(function(){
                $("#sendto").fadeOut("500");
                $("#dt").fadeOut("1000",function() {
                    $("#amountt").fadeIn("1000");
                });
            });


            $('#sendto').on('input', function() {
                var dt = $("#sendto").val();
                $.post(
                    "<?php echo url('user/usr');?>",
                    {
                        dt : dt,
                        data:'_token = <?php echo csrf_token() ?>',
                    },
                    function(data) {
                        var result = $.trim(data);
                        if(result==="data"){
                            $("#dt").hide();
                            $("#dts").show();
                            $("#dts").html("NO USER FOUND WITH THIS EMAIL");
                        } else {
                            $("#dt").show();
                            $("#dts").hide();
                            $("#dt").html(data);
                        }



                    }
                );


            });


        });
    </script>

@endpush