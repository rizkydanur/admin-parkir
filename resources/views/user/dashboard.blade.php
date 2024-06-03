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
            fetch('/user/get-parking-data-bulan')
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
    fetch('/user/get-parking-data-hari')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            var chart = echarts.init(document.getElementById('chart2'));

            var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            // Inisialisasi array untuk data parkir masuk dan keluar
            var masukData = [];
            var keluarData = [];

            // Mengisi data parkir masuk dan keluar dari setiap hari dalam seminggu
            daysOfWeek.forEach(day => {
                var masuk = data.masuk.hasOwnProperty(day) ? data.masuk[day] : 0;
                var keluar = data.keluar.hasOwnProperty(day) ? data.keluar[day] : 0;

                // Menentukan batas atas yang sesuai berdasarkan nilai data
                var maxLimit = Math.max(10, Math.ceil(Math.max(masuk, keluar) / 10) * 10);

                // Menambahkan nilai data parkir masuk dan keluar ke dalam array dengan batas atas yang sesuai
                masukData.push(masuk > maxLimit ? maxLimit : masuk);
                keluarData.push(keluar > maxLimit ? maxLimit : keluar);
            });

            var option = {
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['Parkir Masuk', 'Parkir Keluar']
                },
                xAxis: {
                    type: 'category',
                    data: daysOfWeek
                },
                yAxis: {
                    type: 'value',
                    max: function(value) { // Atur maksimum sumbu y berdasarkan nilai data
                        return Math.ceil(value.max / 10) * 10;
                    }
                },
                series: [
                    {
                        name: 'Parkir Masuk',
                        type: 'bar',
                        data: masukData
                    },
                    {
                        name: 'Parkir Keluar',
                        type: 'bar',
                        data: keluarData
                    }
                ]
            };

            chart.setOption(option);
        })
        .catch(error => console.error('Error fetching data:', error));
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Function to calculate the date range for the current week
    function getCurrentWeekRange() {
        const today = new Date();
        const currentDay = today.getDay(); // 0 (Sunday) to 6 (Saturday)
        const startOffset = currentDay === 0 ? -6 : 1 - currentDay; // Start from previous Sunday if today is Sunday

        const startDate = new Date(today);
        startDate.setDate(today.getDate() + startOffset);
        const endDate = new Date(today);
        endDate.setDate(today.getDate() + (7 - currentDay));

        return {
            startDate: formatDate(startDate),
            endDate: formatDate(endDate)
        };
    }

    // Function to format date as YYYY-MM-DD
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Function to fetch data from the database for the entire week
    function fetchData(startDate, endDate) {
        return fetch(`/user/get-parking-data-hari?start=${startDate}&end=${endDate}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            });
    }

    const { startDate, endDate } = getCurrentWeekRange();

    fetchData(startDate, endDate)
        .then(data => {
            var chart = echarts.init(document.getElementById('chart2'));

            const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            // Map fetched data to days of the week
            const parkirMasukData = daysOfWeek.map(day => data.masuk[day] !== undefined ? data.masuk[day] : 0);
            const parkirKeluarData = daysOfWeek.map(day => data.keluar[day] !== undefined ? data.keluar[day] : 0);

            var option = {
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['Parkir Masuk', 'Parkir Keluar']
                },
                xAxis: {
                    type: 'category',
                    data: daysOfWeek
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                        name: 'Parkir Masuk',
                        type: 'bar',
                        data: parkirMasukData
                    },
                    {
                        name: 'Parkir Keluar',
                        type: 'bar',
                        data: parkirKeluarData
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
            fetch('/user/get-parking-data-tahun')
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
