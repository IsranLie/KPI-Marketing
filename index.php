<?php
require_once "functions.php";

$dataKpi = getKpi();
$dataPercentage = getPercentage();

// Prepare arrays for JavaScript
$employeeNamesJs = [];
$kpiScoresJs = [];
$salesOntimeJs = [];
$salesLateJs = [];
$reportOntimeJs = [];
$reportLateJs = [];

foreach ($dataKpi as $kpi) {
    $employeeNamesJs[] = $kpi['Nama'];
    $kpiScoresJs[] = $kpi['KPI'];
}

foreach ($dataPercentage as $percent) {
    $salesOntimeJs[] = $percent['Percentage_Sales_Ontime'];
    $salesLateJs[] = $percent['Percentage_Sales_Late'];
    $reportOntimeJs[] = $percent['Percentage_Report_Ontime'];
    $reportLateJs[] = $percent['Percentage_Report_Late'];
}

// Encode PHP arrays to JSON for use in JavaScript
$employeesNameJson = json_encode($employeeNamesJs);
$kpiScoresJson = json_encode($kpiScoresJs);
$salesOntimeJson = json_encode($salesOntimeJs);
$salesLateJson = json_encode($salesLateJs);
$reportOntimeJson = json_encode($reportOntimeJs);
$reportLateJson = json_encode($reportLateJs);
?>

<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPI Marketing</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: "Nunito", "sans-serif";
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-300">

    <header class="fixed top-0 w-full bg-white p-4 text-gray-800 border border-b border-gray-800 z-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 transition-colors duration-300">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">KPI Dashboard</h1>
            <nav class="flex items-center space-x-6">
                <ul class="flex space-x-4">
                    <li><a href="#kpi" class="hover:underline">KPI</a></li>
                    <li><a href="#percent" class="hover:underline">Percentage Ontime</a></li>
                </ul>
                <button id="theme-toggle" class="p-2 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 transition-colors duration-300">
                    Theme
                </button>
            </nav>
        </div>
    </header>

    <div class="pt-[10px]">
        <div class="container mx-auto px-4">

            <section id="kpi" class="min-h-screen bg-gray-100 flex flex-col items-center justify-start dark:bg-gray-800
         transition-colors duration-300 font-medium py-20">
                <div class="mb-8">
                    <h2 class="text-4xl text-center font-bold">Key Performance Indicator (KPI)</h2>
                </div>

                <div class="w-full max-w-4xl mx-auto px-4 bg-white dark:bg-gray-700 rounded-lg shadow-lg space-y-6">
                    <div class="p-3 mt-3">
                        <table class="table-auto border-collapse border border-black w-full text-center text-sm">
                            <thead class="dark:text-gray-800">
                                <tr>
                                    <th rowspan="2" class="border border-black bg-green-100">Name</th>
                                    <th colspan="6" class="border border-black bg-blue-200">Sales</th>
                                    <th colspan="6" class="border border-black bg-red-200">Report</th>
                                    <th rowspan="2" class="border border-black bg-yellow-100">KPI</th>
                                </tr>
                                <tr>
                                    <!-- Sales Sub-columns -->
                                    <th class="border border-black bg-blue-100">Target</th>
                                    <th class="border border-black bg-blue-100">Actual</th>
                                    <th class="border border-black bg-blue-100">Achieve</th>
                                    <th class="border border-black bg-blue-100">Weight</th>
                                    <th class="border border-black bg-blue-100">Late</th>
                                    <th class="border border-black bg-blue-100">Total Weight</th>

                                    <!-- Report Sub-columns -->
                                    <th class="border border-black bg-red-100">Target</th>
                                    <th class="border border-black bg-red-100">Actual</th>
                                    <th class="border border-black bg-red-100">Achieve</th>
                                    <th class="border border-black bg-red-100">Weight</th>
                                    <th class="border border-black bg-red-100">Late</th>
                                    <th class="border border-black bg-red-100">Total Weight</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataKpi as $kpi) { ?>
                                    <tr>
                                        <td class="border border-black"><?= $kpi['Nama']; ?></td>

                                        <td class="border border-black"><?= $kpi['Target_Sales']; ?></td>
                                        <td class="border border-black"><?= $kpi['Actual_Sales']; ?></td>
                                        <td class="border border-black"><?= number_format($kpi['Pencapaian_Sales'], 0) . '%'; ?></td>
                                        <td class="border border-black"><?= number_format($kpi['Bobot_Sales'], 0) . '%'; ?></td>
                                        <td class="border border-black"><?= ($kpi['Late_Sales'] > 0) ? '-' . number_format($kpi['Late_Sales'], 0) . '%' : ''; ?></td>
                                        <td class="border border-black"><?= number_format($kpi['Total_Bobot_Sales'], 0) . '%'; ?></td>

                                        <td class="border border-black"><?= $kpi['Target_Report']; ?></td>
                                        <td class="border border-black"><?= $kpi['Actual_Report']; ?></td>
                                        <td class="border border-black"><?= number_format($kpi['Pencapaian_Report'], 0) . '%'; ?></td>
                                        <td class="border border-black"><?= number_format($kpi['Bobot_Report'], 0) . '%'; ?></td>
                                        <td class="border border-black"><?= ($kpi['Late_Report'] > 0) ? '-' . number_format($kpi['Late_Report'], 0) . '%' : ''; ?></td>
                                        <td class="border border-black"><?= number_format($kpi['Total_Bobot_Report'], 0) . '%'; ?></td>

                                        <td class="border border-black"><?= number_format($kpi['KPI'], 0) . '%'; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="px-3 font-bold text-lg">Bar Chart</h3>
                    <div class="px-3">
                        <canvas id="kpiChart" height="200"></canvas>
                    </div>
                </div>
            </section>

            <section id="percent" class="bg-gray-100 flex flex-col items-center justify-start dark:bg-gray-800
         transition-colors duration-300 font-medium py-20">
                <div class="mb-8">
                    <h2 class="text-4xl text-center font-bold">Ontime & Late Percentage</h2>
                </div>

                <div class="w-full max-w-4xl mx-auto px-4 bg-white dark:bg-gray-700 rounded-lg shadow-lg space-y-6">
                    <div class="p-3 mt-3">
                        <table class="table-auto border-collapse border border-black w-full text-center text-sm">
                            <thead class="dark:text-gray-800">
                                <tr>
                                    <th rowspan="2" class="border border-black bg-green-100">Name</th>
                                    <th colspan="5" class="border border-black bg-blue-200">Sales</th>
                                    <th colspan="5" class="border border-black bg-red-200">Report</th>
                                </tr>
                                <tr>
                                    <!-- Sales Sub-columns -->
                                    <th class="border border-black bg-blue-100">Target</th>
                                    <th class="border border-black bg-blue-100">Actual Ontime</th>
                                    <th class="border border-black bg-blue-100">Actual Late</th>
                                    <th class="border border-black bg-blue-100">Percentage Ontime</th>
                                    <th class="border border-black bg-blue-100">Percentage Late</th>

                                    <!-- Report Sub-columns -->
                                    <th class="border border-black bg-red-100">Target</th>
                                    <th class="border border-black bg-red-100">Actual Ontime</th>
                                    <th class="border border-black bg-red-100">Actual Late</th>
                                    <th class="border border-black bg-red-100">Percentage Ontime</th>
                                    <th class="border border-black bg-red-100">Percentage Late</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataPercentage as $percent) { ?>
                                    <tr>
                                        <td class="border border-black"><?= $percent['Nama']; ?></td>

                                        <td class="border border-black"><?= $percent['Target_Sales']; ?></td>
                                        <td class="border border-black"><?= ($percent['Actual_Sales_Ontime'] > 0) ? $percent['Actual_Sales_Ontime'] : ''; ?></td>
                                        <td class="border border-black"><?= ($percent['Actual_Sales_Late'] > 0) ? $percent['Actual_Sales_Late'] : ''; ?></td>
                                        <td class="border border-black"><?= ($percent['Percentage_Sales_Ontime'] > 0) ? number_format($percent['Percentage_Sales_Ontime'], 0) . '%' : ''; ?></td>
                                        <td class="border border-black"><?= ($percent['Percentage_Sales_Late'] > 0) ? number_format($percent['Percentage_Sales_Late'], 0) . '%' : ''; ?></td>

                                        <td class="border border-black"><?= $percent['Target_Report']; ?></td>
                                        <td class="border border-black"><?= ($percent['Actual_Report_Ontime'] > 0) ? $percent['Actual_Report_Ontime'] : ''; ?></td>
                                        <td class="border border-black"><?= ($percent['Actual_Report_Late'] > 0) ? $percent['Actual_Report_Late'] : ''; ?></td>
                                        <td class="border border-black"><?= ($percent['Percentage_Report_Ontime'] > 0) ? number_format($percent['Percentage_Report_Ontime'], 0) . '%' : ''; ?></td>
                                        <td class="border border-black"><?= ($percent['Percentage_Report_Late'] > 0) ? number_format($percent['Percentage_Report_Late'], 0) . '%' : ''; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="px-3 font-bold text-lg">Stacked Bar Chart</h3>

                    <div class="px-3">
                        <canvas id="salesChart" height="100"></canvas>
                    </div>

                    <div class="p-3">
                        <canvas id="reportChart" height="100"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        // Assign value
        const employeesName = <?= $employeesNameJson; ?>;
        const dataKpi = <?= $kpiScoresJson; ?>;
        const salesOntime = <?= $salesOntimeJson; ?>;
        const salesLate = <?= $salesLateJson; ?>;
        const reportOntime = <?= $reportOntimeJson; ?>;
        const reportLate = <?= $reportLateJson; ?>;

        // === KPI CHART ===
        const ctx = document.getElementById('kpiChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: employeesName,
                datasets: [{
                    label: 'KPI Score',
                    data: dataKpi,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        stacked: true,
                        max: 100,
                        ticks: {
                            callback: val => val + '%'
                        },
                        title: {
                            display: true,
                            text: 'KPI Score'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Employees'
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.x !== null) {
                                    label += context.parsed.x + '%';
                                }
                                return label;
                            },
                            title: function(context) {
                                return context[0].label; // employees name tooltip
                            }
                        }
                    }
                }
            }
        });

        // === SALES CHART ===
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: employeesName,
                datasets: [{
                        label: 'Sales On Time',
                        data: salesOntime,
                        backgroundColor: '#4ade80',
                        stack: 'stack1',
                    },
                    {
                        label: 'Sales Late',
                        data: salesLate,
                        backgroundColor: '#f87171',
                        stack: 'stack1',
                    }
                ]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Sales Percentage'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';

                                if (label) {
                                    label += ': ';
                                }
                                // context.parsed.x adalah nilai numerik dari bar untuk bar horizontal (indexAxis: 'y')
                                if (context.parsed.x !== null) {
                                    label += context.parsed.x + '%';
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        max: 100,
                        ticks: {
                            callback: val => val + '%' // sumbu x
                        },
                        title: {
                            display: true,
                            text: 'Percentage'
                        }
                    },
                    y: {
                        stacked: true,
                        title: {
                            display: true,
                            text: 'Employees'
                        }
                    }
                }
            }
        });

        // === REPORT CHART ===
        const reportCtx = document.getElementById('reportChart').getContext('2d');
        new Chart(reportCtx, {
            type: 'bar',
            data: {
                labels: employeesName,
                datasets: [{
                        label: 'Report On Time',
                        data: reportOntime,
                        backgroundColor: '#60a5fa',
                        stack: 'stack2',
                    },
                    {
                        label: 'Report Late',
                        data: reportLate,
                        backgroundColor: '#facc15',
                        stack: 'stack2',
                    }
                ]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Report Percentage'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';

                                if (label) {
                                    label += ': ';
                                }

                                if (context.parsed.x !== null) {
                                    label += context.parsed.x + '%';
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        max: 100,
                        ticks: {
                            callback: val => val + '%'
                        },
                        title: {
                            display: true,
                            text: 'Percentage'
                        }
                    },
                    y: {
                        stacked: true,
                        title: {
                            display: true,
                            text: 'Employees'
                        }
                    }
                }
            }
        });

        // Switch Theme
        tailwind.config = {
            darkMode: 'class'
        }

        const themeToggle = document.getElementById('theme-toggle');
        const htmlElement = document.documentElement;
        const currentTheme = localStorage.getItem('theme');

        if (currentTheme === 'dark') {
            htmlElement.classList.add('dark');
        } else {
            htmlElement.classList.remove('dark');
        }

        themeToggle.addEventListener('click', () => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>
</body>

</html>