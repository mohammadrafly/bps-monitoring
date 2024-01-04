<?= $this->extend('layout/DashboardLayout') ?>

<?= $this->section('content') ?>  

<div class="mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white rounded-lg flex items-center justify-between p-4">
            <svg class="w-12 h-12 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
            </svg>
            <div class="ml-3 font-medium text-gray-600">
                <p class="mb-2">Total Pengguna</p>
                <h6 class="mb-0"><?= $user ?></h6>
            </div>
        </div>

        <div class="bg-white rounded-lg flex items-center justify-between p-4">
            <svg class="w-12 h-12 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
            </svg>
            <div class="ml-3 font-medium text-gray-600">
                <p class="mb-2">Total Progres</p>
                <h6 class="mb-0"><?= $employee ?></h6>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="w-full rounded-lg shadow bg-white p-4 mt-5 dark:bg-gray-800">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                            <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                            <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
                        </svg>
                    </div>
                    <div>
                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1"><?= $getTotalThisWeek ?></h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Total Progres Perminggu</p>
                    </div>
                </div>
                <div>
                    <span class="<?= ($persen > 0) ? 'bg-green-100 text-green-500 dark:text-green-500' : (($persen < 0) ? 'bg-red-100 text-red-500 dark:text-red-500' : 'bg-gray-100 text-gray-500 dark:text-gray-500') ?> text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                            <?php
                            if ($persen > 0) {
                                echo '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>';
                            } elseif ($persen < 0) {
                                echo '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v12m0 0l4-4m-4 4-4-4"/>';
                            }
                            ?>
                        </svg>
                        <?= number_format($persen, 2) ?>%
                    </span>
                </div>
            </div>

            <div id="column-chart"></div>
        </div>

        <div class="mt-5 bg-white shadow rounded-lg p-4">
            <div class="overflow-x-auto">
            <h5 class="leading-none text-2xl font-medium text-gray-600 pb-2 mb-5">Progres minggu ini</h5>
                <table id="bps-datatable" class="display table-auto w-full text-gray-600">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Petugas</th>
                            <th class="border px-4 py-2">Target</th>
                            <!-- <th class="border px-4 py-2">Absolut</th> -->
                            <th class="border px-4 py-2">Realisasi (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data as $row): ?>
                            <tr>
                                <td class="border px-4 py-2"><?= $no++ ?></td>
                                <td class="border px-4 py-2"><?= $row['nama_petugas'] ?></td>
                                <td class="border px-4 py-2"><?= $row['target'] ?></td>
                                <!-- <td class="border px-4 py-2"></td> -->
                                <td class="border px-4 py-2"><?= ($row['realisasi'] / $row['target']) * 100 ?>%</td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
        const dates = <?php echo json_encode(array_map(function($date) {
                            $dayName = date('l', strtotime($date)); // Get the full day name
                            return substr($dayName, 0, 3); // Extract the first three characters of the day name
                        }, $chartData['dates'])); ?>;

        const chartData = <?php echo json_encode($chartData['chartData']); ?>;
        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [
                {
                    name: "Organic",
                    color: "#1A56DB",
                    data: chartData,
                },
            ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                horizontal: false,
                columnWidth: "70%",
                borderRadiusApplication: "end",
                borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                filter: {
                    type: "darken",
                    value: 1,
                },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                left: 2,
                right: 2,
                top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                categories: dates,
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
            }

            if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();
            }
    });
</script>
<?= $this->endSection() ?>
