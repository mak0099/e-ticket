@extends('admin.layout')
@section('title','Dashboard')
@section('style')
<!-- Morris Charts CSS -->
    <link href="{{asset('public/admin/vendors/bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/admin/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/admin/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="sm-data-box">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                    <span class="txt-dark block counter"><span class="counter-anim">{{$total['sale']}}</span></span>
                                    <span class="weight-500 uppercase-font block font-13">Total Sales</span>
                                </div>
                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                    <i class="fa fa-money data-right-rep-icon txt-light-grey"></i>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="sm-data-box">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                    <span class="txt-dark block counter"><span class="counter-anim">{{$total['cost']}}</span></span>
                                    <span class="weight-500 uppercase-font block font-13">Total Costs</span>
                                </div>
                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                    <i class="fa fa-money data-right-rep-icon txt-light-grey"></i>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="sm-data-box">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                    <span class="txt-dark block counter"><span class="counter-anim">{{$total['coach']}}</span></span>
                                    <span class="weight-500 uppercase-font block font-13">Total Coaches</span>
                                </div>
                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                    <i class="fa fa-bus data-right-rep-icon txt-light-grey"></i>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="sm-data-box">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                    <span class="txt-dark block counter"><span class="counter-anim">{{$total['counter']}}</span></span>
                                    <span class="weight-500 uppercase-font block font-13">Total Counters</span>
                                </div>
                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                    <i class="fa fa-industry data-right-rep-icon txt-light-grey"></i>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="sm-data-box">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                    <span class="txt-dark block counter"><span class="counter-anim">{{$total['employee']}}</span></span>
                                    <span class="weight-500 uppercase-font block font-13">Total Employees</span>
                                </div>
                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                    <i class="fa fa-users data-right-rep-icon txt-light-grey"></i>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="sm-data-box">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                    <span class="txt-dark block counter"><span class="counter-anim">{{$total['car']}}</span></span>
                                    <span class="weight-500 uppercase-font block font-13">Total Cars</span>
                                </div>
                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                    <i class="fa fa-car data-right-rep-icon txt-light-grey"></i>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="sm-data-box">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                    <span class="txt-dark block counter"><span class="counter-anim">{{$total['route']}}</span></span>
                                    <span class="weight-500 uppercase-font block font-13">Total Routes</span>
                                </div>
                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                    <i class="fa fa-road data-right-rep-icon txt-light-grey"></i>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="sm-data-box">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                    <span class="txt-dark block counter"><span class="counter-anim">{{$total['user']}}</span></span>
                                    <span class="weight-500 uppercase-font block font-13">Total Users</span>
                                </div>
                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                    <i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left col-sm-3">
                    <h6 class="panel-title txt-dark">Car vs. Cost Amount</h6>
                </div>
                <div class="pull-right col-sm-9">
                    <form class="form-inline" method="post" action="{{route('update_cc_chart')}}">
                        {{csrf_field()}}
                        <input name="date_range" class="form-control input-daterange-datepicker" type="text" value="{{$cc_chart['start_date'] . ' - ' . $cc_chart['end_date']}}" autocomplete="off" />
                        <select class="form-control" name="category_id">
                            <option value="0">All Categories</option>
                            @foreach($cc_chart['categories'] as $category)  
                            <option value="{{$category->id}}" {{($category->id == $cc_chart['category_id']) ? 'selected':''}}>{{$category->cost_category_name}}</option>
                            @endforeach
                        </select>   
                        <select class="form-control" name="route_id">
                            <option value="0">All Routes</option>
                            @foreach($cc_chart['routes'] as $route)  
                            <option value="{{$route->id}}" {{($route->id == $cc_chart['route_id']) ? 'selected':''}}>{{$route->route_name}}</option>
                            @endforeach
                        </select> 
                        <button type="submit" class="btn btn-default">Go</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div id="cc_chart" class="morris-chart"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-5">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Counter vs. Sale Amount</h6>
                </div>
                <div class="pull-right">
                    <form class="form-inline" method="post" action="{{route('update_cs_chart')}}">
                        {{csrf_field()}}
                        <input name="date_range" class="form-control input-daterange-datepicker" type="text" value="{{$cs_chart['start_date'] . ' - ' . $cs_chart['end_date']}}" autocomplete="off" />  
                        <button type="submit" class="btn btn-default">Go</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div id="cs_chart" class="morris-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
         <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Month vs. Sale Amount</h6>
                </div>
                <div class="pull-right">
                    <form class="form-inline" method="post" action="{{route('update_ms_chart')}}">
                        {{csrf_field()}}
                        <select class="form-control" name="year">
                            @foreach($ms_chart['years'] as $item) 
                            <option {{($item->year == $ms_chart['year']) ? 'selected':''}}>{{$item->year}}</option>   
                            @endforeach
                        </select>   
                        <button type="submit" class="btn btn-default">Go</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <canvas id="ms_chart"></canvas>
                </div>  
            </div>
        </div>
    </div>
    <div class="col-lg-6">
         <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Month vs. Cost Amount</h6>
                </div>
                <div class="pull-right">
                    <form class="form-inline" method="post" action="{{route('update_mc_chart')}}">
                        {{csrf_field()}}
                        <select class="form-control" name="year">
                            @foreach($mc_chart['years'] as $item) 
                            <option {{($item->year == $mc_chart['year']) ? 'selected':''}}>{{$item->year}}</option>   
                            @endforeach
                        </select>   
                        <button type="submit" class="btn btn-default">Go</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <canvas id="mc_chart"></canvas>
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- /Row -->

@endsection
@section('script')

<?php
    //CC Chart
    $cc_chart_data = "";
    foreach($cc_chart['data'] as $item){
        $cc_chart_data .= "
            {
                car: '".$item->car_number."',
                amount: ".($item->amount | 0)."
            },
        ";
    }
    //CS Chart
    $cs_chart_data = "";
    foreach($cs_chart['data'] as $item){
        $cs_chart_data .= "
            {
                counter: '".$item->counter_number."',
                amount: ".($item->amount | 0)."
            },
        ";
    }

    //MS Chart
    $ms_chart_data_site = "";
    $ms_chart_data_counter = "";
    foreach($ms_chart['data'] as $item){
        $ms_chart_data_site .= $item['site_amount']. ', ';
        $ms_chart_data_counter .= $item['counter_amount']. ', ';
    }

    //MC Chart
    $mc_chart_data = "";
    foreach($mc_chart['data'] as $item){
        $mc_chart_data .= $item['amount']. ', ';
    }
?>
    <!-- Morris Charts JavaScript -->
    <script src="{{asset('public/admin/vendors/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('public/admin/vendors/bower_components/morris.js/morris.min.js')}}"></script>
    <!-- <script src="{{asset('public/admin/dist/js/morris-data.js')}}"></script> -->
    <script src="{{asset('public/admin/vendors/bower_components/moment/min/moment-with-locales.min.js')}}"></script>
    <script src="{{asset('public/admin/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('public/admin/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('public/admin/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- <script src="{{asset('public/admin/dist/js/chartjs-data.js')}}"></script> -->
<script>
$(document).ready(function () {
    "use strict";
    /* Daterange picker Init*/
    $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            locale: {
              format: 'YYYY-MM-DD',
            },
            
    });
});

</script>
    <script type="text/javascript">
        /*Morris Init*/
$(function() {
    "use strict"; 


    if($('#cc_chart').length > 0){
       // Bar Chart
        Morris.Bar({
            element: 'cc_chart',
            data: [<?php echo $cc_chart_data; ?>],
            xkey: 'car',
            ykeys: ['amount'],
            labels: ['Amount'],
            barRatio: 0.4,
            xLabelAngle: 35,
            pointSize: 1,
            barOpacity: 1,
            pointStrokeColors:['#4aa23c'],
            behaveLikeLine: true,
            grid: false,
            gridTextColor:'#878787',
            hideHover: 'auto',
            barColors: ['#4aa23c'],
            resize: true,
            gridTextFamily:"Roboto"
        });
    }
    if($('#cs_chart').length > 0){
       // Bar Chart
        Morris.Bar({
            element: 'cs_chart',
            data: [<?php echo $cs_chart_data; ?>],
            xkey: 'counter',
            ykeys: ['amount'],
            labels: ['Amount'],
            barRatio: 0.4,
            xLabelAngle: 35,
            pointSize: 1,
            barOpacity: 1,
            pointStrokeColors:['#FF5733'],
            behaveLikeLine: true,
            grid: false,
            gridTextColor:'#878787',
            hideHover: 'auto',
            barColors: ['#FF5733'],
            resize: true,
            gridTextFamily:"Roboto"
        });
    }
    if( $('#ms_chart').length > 0 ){
        var ctx2 = document.getElementById("ms_chart").getContext("2d");
        var data2 = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [
                {
                    label: "Sale Amount (Counter)",
                    backgroundColor: "rgba(248, 179, 45,1)",
                    borderColor: "rgba(248, 179, 45,1)",
                    data: [<?php echo $ms_chart_data_counter; ?>]
                },
                {
                    label: "Sale Amount (Site)",
                    backgroundColor: "rgba(74, 162, 60,1)",
                    borderColor: "rgba(74, 162, 60,1)",
                    data: [<?php echo $ms_chart_data_site; ?>]
                }
            ]
        };
        
        var hBar = new Chart(ctx2, {
            type:"horizontalBar",
            data:data2,
            
            options: {
                tooltips: {
                    mode:"label"
                },
                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "rgba(33,33,33,0)",
                        },
                        ticks: {
                            fontFamily: "Roboto",
                            fontColor:"#878787"
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "rgba(33,33,33,0)",
                        },
                        ticks: {
                            fontFamily: "Roboto",
                            fontColor:"#878787"
                        }
                    }],
                    
                },
                elements:{
                    point: {
                        hitRadius:40
                    }
                },
                animation: {
                    duration:   3000
                },
                responsive: true,
                legend: {
                    display: false,
                },
                tooltip: {
                    backgroundColor:'rgba(33,33,33,1)',
                    cornerRadius:0,
                    footerFontFamily:"'Roboto'"
                }
                
            }
        });
    }
    if( $('#mc_chart').length > 0 ){
        var ctx2 = document.getElementById("mc_chart").getContext("2d");
        var data2 = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [
                {
                    label: "Cost Amount",
                    backgroundColor: "#57BFFF",
                    borderColor: "#57BFFF",
                    data: [<?php echo $mc_chart_data; ?>]
                }
            ]
        };
        
        var hBar = new Chart(ctx2, {
            type:"horizontalBar",
            data:data2,
            
            options: {
                tooltips: {
                    mode:"label"
                },
                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "rgba(33,33,33,0)",
                        },
                        ticks: {
                            fontFamily: "Roboto",
                            fontColor:"#878787"
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "rgba(33,33,33,0)",
                        },
                        ticks: {
                            fontFamily: "Roboto",
                            fontColor:"#878787"
                        }
                    }],
                    
                },
                elements:{
                    point: {
                        hitRadius:40
                    }
                },
                animation: {
                    duration:   3000
                },
                responsive: true,
                legend: {
                    display: false,
                },
                tooltip: {
                    backgroundColor:'rgba(33,33,33,1)',
                    cornerRadius:0,
                    footerFontFamily:"'Roboto'"
                }
                
            }
        });
    }
});
    </script>

    
@endsection