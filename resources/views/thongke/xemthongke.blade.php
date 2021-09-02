<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<main style="background-color: white;">
@include('home')
    <div class="row">
@can('xemthongke')
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                SAN PHAM (SO LUONG) </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$soluongsanpham}} <a class="fas fa-calendar" href="{{route('hang')}}">(chitiet)</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                USER (SO LUONG)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$soluonguser}} <a class="fas fa-user" href="{{route('user')}}">(chitiet)</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">DON HANG(SO LUONG)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$soluongdonhang}} <a class="fas fa-calendar" href="{{route('donhang')}}">(chitiet)</a></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
</div>
</div>
@endcan
<div class="row">
    <div class="col-sm-6">
<figure class="highcharts-figure">
    <div id="bieudocot" data-list-day="{{$listDay}}" data-money={{$arraydoanhthu}} ></div>
    <p class="highcharts-description">
    </p>
</figure>
</div>
<div class="col-sm-6">
<figure class="highcharts-figure">
    <div id="bieudoxoay" data-json="{{$statusdonhang}}"></div>
    <p class="highcharts-description">
    </p>
</figure>
</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <table  class="table table-hover table-striped table-bordered" border="yes">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">info</th>
                                <th scope="col">tong tien</th>
                                <th scope="col">thoi gian</th>
                                <th scope="col">trang thai</th>
                            </tr>
                        </thead>
                        @foreach($donhang as $key=>$v )
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$v->name }}<br>
                            {{$v->email}}<br>
                            {{$v->phone}}</td>
                            <td>{{number_format($v->total)}} VND</td>
                            <td>{{$v->created_at}}</td>
                            <td>
                            @if($v->status==1)
                            <a href="#" class="label-success label">da xu ly</a>
                            @elseif($v->status==0)
                            <a href="#" class="label-default label">chua xu ly</a>
                            @elseif($v->status==2)
                            <a href="#" class="label-primary label">dang cho dien thoai</a>
                            @elseif($v->status==3)
                            <a href="#" class="label-info label">da nghe dien thoai</a>
                            @elseif($v->status==4)
                            <a href="#" class="label-danger label">don hang hoan thanh</a>
                            @elseif($v->status==5)
                            <a href="#" class="label-danger label">da huy</a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    let datadonhang=$('#bieudoxoay').attr('data-json');
    datadonhang=JSON.parse(datadonhang);
Highcharts.chart('bieudoxoay', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Bieu do don hang'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data:datadonhang
    }],
});
//line chart
</script>
<script>
let listDay=$('#bieudocot').attr('data-list-day');
listDay=JSON.parse(listDay);
let listMoney=$('#bieudocot').attr('data-money');
listMoney=JSON.parse(listMoney);
Highcharts.chart('bieudocot', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'BIEU DO DOANH THU CAC NGAY TRONG THANG'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: listDay
    
    },
    yAxis: {
        title: {
            text: ''
        },
        labels: {
            formatter: function () {
                return this.value + '-';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Hoan tat giao dich',
        marker: {
            symbol: 'square'
        },
        data:listMoney
    }]
});
</script>
<style>
.highcharts-credits{
    display: none;
}

</style>