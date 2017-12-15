@extends('layouts.master')

@section('content')
	<div class="col-md-12">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header" data-background-color="purple">
                                  <h4 class="title">Statistik Mata kuliah</h4>
                              </div>
                              <div class="card-content table-responsive">
								<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                                  

                              </div>
                          </div>
                      </div>
                  </div>
            </div>
@endsection

@section('js')
	{{-- expr --}}
	<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Pertemuan Siswa Konsultasi per Bulan'
    },
    subtitle: {
        text: 'Source: MESC'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Pertemuan (Jumlah)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Pertemuan</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Konsultasi',
        data: [
        <?php if ($jan->total) {echo $jan->total;} else {echo 0;}  ?>,
        <?php if ($feb->total) {echo $feb->total;} else {echo 0;}  ?>,
        <?php if ($mar->total) {echo $mar->total;} else {echo 0;}  ?>,
        <?php if ($apr->total) {echo $apr->total;} else {echo 0;}  ?>,
        <?php if ($may->total) {echo $may->total;} else {echo 0;}  ?>,
        <?php if ($jun->total) {echo $jun->total;} else {echo 0;}  ?>,
        <?php if ($jul->total) {echo $jul->total;} else {echo 0;}  ?>,
        <?php if ($aug->total) {echo $aug->total;} else {echo 0;}  ?>,
        <?php if ($sep->total) {echo $sep->total;} else {echo 0;}  ?>,
        <?php if ($oct->total) {echo $oct->total;} else {echo 0;}  ?>,
        <?php if ($nov->total) {echo $nov->total;} else {echo 0;}  ?>,
        <?php if ($des->total) {echo $des->total;} else {echo 0;}  ?>,

        ]

    }]
});
        </script>
@endsection