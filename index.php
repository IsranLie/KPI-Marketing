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

    <header class="fixed top-0 w-full bg-gray-100 p-4 text-gray-800 border border-b border-gray-800 z-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 transition-colors duration-300">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">KPI Dashboard</h1>
            <nav class="flex items-center space-x-6">
                <ul class="flex space-x-4">
                    <li><a href="#home" class="hover:underline">KPI</a></li>
                    <li><a href="#about" class="hover:underline">Percentage Ontime</a></li>
                </ul>
                <button id="theme-toggle" class="p-2 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 transition-colors duration-300">
                    Theme
                </button>
            </nav>
        </div>
    </header>

    <div class="pt-[30px]">
        <div class="container mx-auto px-4">

            <section id="home" class="min-h-screen bg-gray-100 flex flex-col items-center justify-start dark:bg-gray-700
         transition-colors duration-300 font-medium py-20">
                <div class="mb-8">
                    <h2 class="text-4xl text-center">Key Performance Indicator</h2>
                </div>

                <div class="w-full max-w-4xl mx-auto px-4 bg-white dark:bg-gray-700 rounded-lg shadow-lg space-y-6">
                    <div class="p-3 mt-3">
                        <table class="table-auto border-collapse border border-black w-full text-center text-sm">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="border border-black bg-white">Nama</th>
                                    <th colspan="6" class="border border-black bg-blue-200">Sales</th>
                                    <th colspan="6" class="border border-black bg-red-200">Report</th>
                                    <th rowspan="2" class="border border-black bg-yellow-100">KPI</th>
                                </tr>
                                <tr>
                                    <!-- Sales Sub-columns -->
                                    <th class="border border-black bg-blue-100">Target</th>
                                    <th class="border border-black bg-blue-100">Actual</th>
                                    <th class="border border-black bg-blue-100">Pencapaian</th>
                                    <th class="border border-black bg-blue-100">Bobot Sales</th>
                                    <th class="border border-black bg-blue-100">Late Sales</th>
                                    <th class="border border-black bg-blue-100">Total Bobot</th>

                                    <!-- Report Sub-columns -->
                                    <th class="border border-black bg-red-100">Target</th>
                                    <th class="border border-black bg-red-100">Actual</th>
                                    <th class="border border-black bg-red-100">Pencapaian</th>
                                    <th class="border border-black bg-red-100">Actual Bobot</th>
                                    <th class="border border-black bg-red-100">Late Report</th>
                                    <th class="border border-black bg-red-100">Total Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-black">Budi</td>
                                    <td class="border border-black">2</td>
                                    <td class="border border-black">2</td>
                                    <td class="border border-black">100%</td>
                                    <td class="border border-black">50%</td>
                                    <td class="border border-black">?</td>
                                    <td class="border border-black">?</td>

                                    <td class="border border-black">2</td>
                                    <td class="border border-black">2</td>
                                    <td class="border border-black">100%</td>
                                    <td class="border border-black">50%</td>
                                    <td class="border border-black">?</td>
                                    <td class="border border-black">?</td>

                                    <td class="border border-black">?</td>
                                </tr>
                                <tr>
                                    <td class="border border-black">Adi</td>
                                    <td class="border border-black">..</td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>

                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>

                                    <td class="border border-black"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-3">
                        <canvas id="kpiChart"></canvas>
                    </div>
                </div>
            </section>

            <section id="about" class="min-h-screen bg-gray-100 flex flex-col items-center justify-start dark:bg-gray-700
         transition-colors duration-300 font-medium py-20">
                <div class="mb-8">
                    <h2 class="text-4xl text-center">Ontime & Late Percentage</h2>
                </div>

                <div class="w-full max-w-4xl mx-auto px-4 bg-white dark:bg-gray-700 rounded-lg shadow-lg space-y-6">
                    <div class="p-3 mt-3">
                        <table class="table-auto border-collapse border border-black w-full text-center text-sm">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="border border-black bg-white">Nama</th>
                                    <th colspan="6" class="border border-black bg-blue-200">Sales</th>
                                    <th colspan="6" class="border border-black bg-red-200">Report</th>
                                    <th rowspan="2" class="border border-black bg-yellow-100">KPI</th>
                                </tr>
                                <tr>
                                    <!-- Sales Sub-columns -->
                                    <th class="border border-black bg-blue-100">Target</th>
                                    <th class="border border-black bg-blue-100">Actual</th>
                                    <th class="border border-black bg-blue-100">Pencapaian</th>
                                    <th class="border border-black bg-blue-100">Bobot Sales</th>
                                    <th class="border border-black bg-blue-100">Late Sales</th>
                                    <th class="border border-black bg-blue-100">Total Bobot</th>

                                    <!-- Report Sub-columns -->
                                    <th class="border border-black bg-red-100">Target</th>
                                    <th class="border border-black bg-red-100">Actual</th>
                                    <th class="border border-black bg-red-100">Pencapaian</th>
                                    <th class="border border-black bg-red-100">Actual Bobot</th>
                                    <th class="border border-black bg-red-100">Late Report</th>
                                    <th class="border border-black bg-red-100">Total Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-black">Budi</td>
                                    <td class="border border-black">2</td>
                                    <td class="border border-black">2</td>
                                    <td class="border border-black">100%</td>
                                    <td class="border border-black">50%</td>
                                    <td class="border border-black">?</td>
                                    <td class="border border-black">?</td>

                                    <td class="border border-black">2</td>
                                    <td class="border border-black">2</td>
                                    <td class="border border-black">100%</td>
                                    <td class="border border-black">50%</td>
                                    <td class="border border-black">?</td>
                                    <td class="border border-black">?</td>

                                    <td class="border border-black">?</td>
                                </tr>
                                <tr>
                                    <td class="border border-black">Adi</td>
                                    <td class="border border-black">..</td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>

                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>
                                    <td class="border border-black"></td>

                                    <td class="border border-black"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-3">
                        <canvas id="salesChart"></canvas>
                    </div>
                    <div class="p-3">
                        <canvas id="reportChart"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
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

        const labels = ['Andi', 'Budi', 'Citra', 'Dewi'];

        // === KPI CHART ===

        const ctx = document.getElementById('kpiChart');

        new Chart(ctx, {
            type: 'bar', // Keep type as 'bar'
            data: {
                labels,
                datasets: [{
                    label: 'KPI Score', // Label for the dataset (e.g., "KPI Score")
                    data: [85, 92, 78, 88, 95], // Corresponding KPI values
                    backgroundColor: [ // Optional: custom colors for each bar
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [ // Optional: border colors
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // THIS IS THE KEY FOR HORIZONTAL BARS IN Chart.js v3+
                scales: {
                    x: { // This is now your value axis (KPI Score)
                        stacked: true,
                        max: 100,
                        ticks: {
                            callback: val => val + '%'
                        },
                        title: {
                            display: true,
                            text: 'KPI Score' // Label for the KPI axis
                        }
                    },
                    y: { // This is now your category axis (Employee Names)
                        title: {
                            display: true,
                            text: 'Employees' // Label for the employee names axis
                        }
                    }
                },
                responsive: true, // Make chart responsive
                maintainAspectRatio: false, // Allows you to control width and height independently with CSS
                plugins: {
                    legend: {
                        display: false // Hide the legend if you only have one dataset and it's self-explanatory
                    }
                }
            }
        });

        // === SALES CHART ===
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                        label: 'Sales On Time',
                        data: [80, 70, 90, 65], // Percentage_Sales_Ontime
                        backgroundColor: '#4ade80',
                        stack: 'stack1',
                    },
                    {
                        label: 'Sales Late',
                        data: [20, 30, 10, 35], // Percentage_Sales_Late
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
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        max: 100,
                        ticks: {
                            callback: val => val + '%'
                        }
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });

        // === REPORT CHART ===
        const reportCtx = document.getElementById('reportChart').getContext('2d');
        new Chart(reportCtx, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                        label: 'Report On Time',
                        data: [75, 60, 85, 55], // Percentage_Report_Ontime
                        backgroundColor: '#60a5fa',
                        stack: 'stack2',
                    },
                    {
                        label: 'Report Late',
                        data: [25, 40, 15, 45], // Percentage_Report_Late
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
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        max: 100,
                        ticks: {
                            callback: val => val + '%'
                        }
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });
    </script>
</body>

</html>