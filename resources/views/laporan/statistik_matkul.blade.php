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

		var m = <?php echo $m; ?>;
		var f = <?php echo $f; ?>;
		var k = <?php echo $k; ?>;
		var perM = (m/100)*100;
		var perF = (f/100)*100;
		var perK = (k/100)*100;

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase Jumlah Absen Per Matakuliah'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [{
            name: 'Fisika',
            y: perF
        }, {
            name: 'Kimia',
            y: perK,
            sliced: true,
            selected: true
        }, {
            name: 'Matematika',
            y: perM
        }]
    }]
});
		</script>
@endsection