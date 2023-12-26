<?= $this->extend('layout/DashboardLayout') ?>

<?= $this->section('content') ?>  

<div class="mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white rounded-lg flex items-center justify-between p-4">
            <svg class="w-12 h-12 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
            </svg>
            <div class="ml-3 font-medium text-gray-600">
                <p class="mb-2">Total Users</p>
                <h6 class="mb-0"><?= $user ?></h6>
            </div>
        </div>

        <div class="bg-white rounded-lg flex items-center justify-between p-4">
            <svg class="w-12 h-12 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
            </svg>
            <div class="ml-3 font-medium text-gray-600">
                <p class="mb-2">Total Employee</p>
                <h6 class="mb-0"><?= $employee ?></h6>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="w-full rounded-lg shadow bg-white p-4 mt-5">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-600 pb-2"><?= $getTotalThisWeek ?></h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Employee this week</p>
                </div>
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold <?= ($persen > 0) ? 'text-green-500 dark:text-green-500' : (($persen < 0) ? 'text-red-500 dark:text-red-500' : 'text-gray-500 dark:text-gray-500') ?> text-center">
                    <?= number_format($persen, 2) ?>%
                    <svg class="w-3 h-3 ms-1 <?= ($persen > 0) ? 'text-green-500 dark:text-green-500' : (($persen < 0) ? 'text-red-500 dark:text-red-500' : 'text-gray-500 dark:text-gray-500') ?>" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
        </div>

        <div class="mt-5 bg-white shadow rounded-lg p-4">
            <div class="overflow-x-auto">
            <h5 class="leading-none text-2xl font-medium text-gray-600 pb-2 mb-5">Employee This Week</h5>
                <table id="bps-datatable" class="display table-auto w-full text-gray-600">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Nama Petugas</th>
                            <th class="border px-4 py-2">Target</th>
                            <th class="border px-4 py-2">Absolut</th>
                            <th class="border px-4 py-2">Realisasi (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data as $row): ?>
                            <tr>
                                <td class="border px-4 py-2"><?= $no++ ?></td>
                                <td class="border px-4 py-2"><?= $row['nama_petugas'] ?></td>
                                <td class="border px-4 py-2"><?= $row['target'] ?></td>
                                <td class="border px-4 py-2"><?= $row['total_absolut'] ?></td>
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
    window.addEventListener("load", function() {
        let options = {
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: 0
                },
            },
            xaxis: {
                categories: <?php echo json_encode($chartData['dates']); ?>,
                labels: {
                    show: true,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            series: [{
                name: "New users",
                data: <?php echo json_encode($chartData['chartData']); ?>,
                color: "#1A56DB",
            }],
        }

        if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("area-chart"), options);
            chart.render();
        }
    });
</script>
<?= $this->endSection() ?>
