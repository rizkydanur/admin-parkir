@extends('user.layouts.layout')

@section('content')
<section>
@livewire('dashboard-stats-component')
</section>


<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title">Grafik</h2>
        <div class="row row-cols-2">
            <div class="col-md-6">
                <div id="chart" style="height: 400px;"></div>
            </div>
            <div class="col-md-4">
                <div id="chart2" style="height: 400px;"></div>
            </div>
            <div class="col-md-2">
                <div id="chart3" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</main>


<!-- Load ECharts -->
<script src="{{ asset('assets/js/echarts.min.js') }}"></script>

<!-- data perbulan -->
<script>
   document.addEventListener('DOMContentLoaded', function() {
            fetch('/get-parking-data-bulan')
                .then(response => response.json())
                .then(data => {
                    var chart = echarts.init(document.getElementById('chart'));

                    var option = {
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data: ['Parkir Masuk', 'Parkir Keluar']
                        },
                        xAxis: {
                            type: 'category',
                            data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                name: 'Parkir Masuk',
                                type: 'bar',
                                data: data.masuk
                            },
                            {
                                name: 'Parkir Keluar',
                                type: 'bar',
                                data: data.keluar
                            }
                        ]
                    };

                    chart.setOption(option);
                })
                .catch(error => console.error('Error fetching data:', error));
        });
</script>

<!-- data perhari -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/get-parking-data-hari')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                var chart = echarts.init(document.getElementById('chart2'));

                var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                var option = {
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['Parkir Masuk', 'Parkir Keluar']
                    },
                    xAxis: {
                        type: 'category',
                        data: daysOfWeek.map(day => data.masuk.hasOwnProperty(day) ? day : '')
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [
                        {
                            name: 'Parkir Masuk',
                            type: 'bar',
                            data: daysOfWeek.map(day => data.masuk[day] !== undefined ? data.masuk[day] : 0)
                        },
                        {
                            name: 'Parkir Keluar',
                            type: 'bar',
                            data: daysOfWeek.map(day => data.keluar[day] !== undefined ? data.keluar[day] : 0)
                        }
                    ]
                };

                chart.setOption(option);
            })
            .catch(error => console.error('Error fetching data:', error));
    });
</script>






<!-- data pertahun -->
<script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/get-parking-data-tahun')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    var chart = echarts.init(document.getElementById('chart3'));

                    var option = {
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data: ['Parkir Masuk', 'Parkir Keluar']
                        },
                        xAxis: {
                            type: 'category',
                            data: Object.keys(data.masuk)
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                name: 'Parkir Masuk',
                                type: 'bar',
                                data: Object.values(data.masuk)
                            },
                            {
                                name: 'Parkir Keluar',
                                type: 'bar',
                                data: Object.values(data.keluar)
                            }
                        ]
                    };

                    chart.setOption(option);
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>



@endsection
