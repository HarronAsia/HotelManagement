<div class="col-md-4">
    <h1>{{ $chart1->options['chart_title'] }}</h1>
    {!! $chart1->renderHtml() !!}

</div>
<div class="col-md-4">
    <h1>{{ $chart2->options['chart_title'] }}</h1>
    {!! $chart2->renderHtml() !!}


</div>
<div class="col-md-4">
    <h1>{{ $chart3->options['chart_title'] }}</h1>
    {!! $chart3->renderHtml() !!}

</div>

{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
{!! $chart3->renderJs() !!}
{!! $chart2->renderJs() !!}
$chart_options = [
'chart_title' => 'Booking Room By Week',
'chart_type' => 'line',
'report_type' => 'group_by_date',
'model' => 'App\Models\Booking_Date',

'group_by_field' => 'checkin',
'group_by_period' => 'week',
'filter_field' => 'checkin',
'group_by_field_format' => 'Y-m-d',

];
$chart1 = new LaravelChart($chart_options);

$chart_options = [
'chart_title' => 'Booking Room by Month',
'chart_type' => 'line',
'report_type' => 'group_by_date',
'model' => 'App\Models\Booking_Date',

'group_by_field' => 'checkin',
'group_by_period' => 'month',
'filter_field' => 'checkin',
'group_by_field_format' => 'Y-m-d',

];
$chart2 = new LaravelChart($chart_options);

$chart_options = [
'chart_title' => 'Booking Room by Year',
'chart_type' => 'line',
'report_type' => 'group_by_date',
'model' => 'App\Models\Booking_Date',

'group_by_field' => 'checkin',
'group_by_period' => 'year',
'filter_field' => 'checkin',
'group_by_field_format' => 'Y-m-d',

];
$chart3 = new LaravelChart($chart_options);