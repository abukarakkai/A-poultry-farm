<!-- resources/views/dashboard.blade.php -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
<x-app-layout>

        <!-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Active Pens</p>
                <h2 class="text-2xl font-bold text-yellow-600">4</h2>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Total Birds</p>
                <h2 class="text-2xl font-bold text-yellow-600">3,200</h2>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Today Production (Crates)</p>
                <h2 class="text-2xl font-bold text-yellow-600">85</h2>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Feed Used (This Month)</p>
                <h2 class="text-2xl font-bold text-yellow-600">240 Sacks</h2>
            </div>
        </div> -->
<div class="p-0 md:p-2 bg-gray-50 min-h-screen">

  <h1 class="text-2xl font-bold mb-6">Analytics Dashboard</h1>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">

    <!-- 🥚 Total Eggs -->
    <div class="rounded-2xl border bg-white p-5 shadow-sm hover:shadow-md transition">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100">
            <i data-lucide="egg" class="w-5 h-5 text-blue-600"></i>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500">Total Eggs</span>
                <h4 class="mt-1 text-xl font-bold text-blue-800">
                    {{ number_format($totalEggs ?? 0) }}
                </h4>
            </div>
        </div>
    </div>

    <!-- 📦 Crates -->
    <div class="rounded-2xl border bg-white p-5 shadow-sm hover:shadow-md transition">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100">
            <i data-lucide="package" class="w-5 h-5 text-indigo-600"></i>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500">Egg Sold</span>
                <h4 class="mt-1 text-xl font-bold text-green-800">
                    {{ number_format ($totalEggsSold ?? 0) }}
                </h4>
            </div>
        </div>
    </div>

    <!-- 💰 Income -->
    <div class="rounded-2xl border bg-white p-5 shadow-sm hover:shadow-md transition">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100">
            <i data-lucide="wallet" class="w-5 h-5 text-green-600"></i>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500">Income</span>
                <h4 class="mt-1 text-xl font-bold text-green-800">
                    ₦{{ number_format($totalIncome ?? 0, 2) }}
                </h4>
            </div>
        </div>
    </div>

    <!-- 💸 Expense -->
    <div class="rounded-2xl border bg-white p-5 shadow-sm hover:shadow-md transition">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100">
            <i data-lucide="trending-down" class="w-5 h-5 text-red-600"></i>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500">Expense</span>
                <h4 class="mt-1 text-xl font-bold text-red-800">
                    ₦{{ number_format($totalExpense ?? 0, 2) }}
                </h4>
            </div>
        </div>
    </div>

    <!-- 📈 Profit -->
    <div class="rounded-2xl border bg-white p-5 shadow-sm hover:shadow-md transition">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl 
            {{ ($netProfit ?? 0) >= 0 ? 'bg-green-100' : 'bg-red-100' }}">
            <i data-lucide="bar-chart-3" 
               class="w-5 h-5 {{ ($netProfit ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}"></i>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500">Profit</span>
                <h4 class="mt-1 text-xl font-bold 
                    {{ ($netProfit ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                    ₦{{ number_format($netProfit ?? 0, 2) }}
                </h4>
            </div>
        </div>
    </div>

</div> 

  <!-- 🔷 KPI Cards -->
  <!-- <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">

  
    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500 text-sm">Eggs Produced</p>
      <h2 class="text-xl font-bold text-blue-600">{{ number_format($totalEggs) }}</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500 text-sm">Eggs Sold</p>
      <h2 class="text-xl font-bold text-green-600">{{ number_format($totalEggsSold) }}</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500 text-sm">Income</p>
      <h2 class="text-xl font-bold text-green-700">₦{{ number_format($totalIncome) }}</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500 text-sm">Expenses</p>
      <h2 class="text-xl font-bold text-red-600">₦{{ number_format($totalExpense) }}</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500 text-sm">Mortality</p>
      <h2 class="text-xl font-bold text-red-700">{{ number_format ($totalMortality) }}</h2>
    </div>

  </div> -->

  <div class="grid md:grid-cols-2 py-4 gap-6 mb-6">

    <!-- 📈 Line Chart -->
    <div class="bg-white p-5 rounded-2xl shadow border">
            <h3 class="font-semibold mb-3 flex items-center gap-2">
                <i data-lucide="trending-up" class="w-5 h-5 text-green-600"></i>
                Income vs Expense Trend
            </h3>
            <canvas id="lineChart"></canvas>
        </div>

        <!-- 📊 Bar Chart -->
        <div class="bg-white p-5 rounded-2xl shadow border">
            <h3 class="font-semibold mb-3 flex items-center gap-2">
                <i data-lucide="bar-chart-3" class="w-5 h-5 text-indigo-600"></i>
                Income vs Expense Comparison
            </h3>
            <canvas id="barChart"></canvas>
        </div>

    </div>

  <!-- 🔷 Charts -->

    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-gray-100 py-6 font-[Inter]">

        <!-- 📊 GRID -->
        <div class="grid md:grid-cols-2 gap-4">

            <!-- 📅 DAILY -->
            <div class="bg-white rounded-2xl shadow-lg p-3 sm:p-5 border border-gray-100 hover:shadow-xl transition">
                <!-- Header: Stays compact on mobile -->
                <div class="flex flex-row items-center justify-between gap-2 mb-4">
                    <!-- Heading -->
                    <h2 class="text-sm sm:text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <span class="bg-indigo-100 p-1.5 sm:p-2 rounded-lg shrink-0">
                            <i data-lucide="calendar-days" class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-indigo-600"></i>
                        </span>
                        <span class="truncate">Last 5 Days</span>
                    </h2>

                    <!-- Compact Filter Form -->
                    <form method="GET" class="flex items-center gap-2 bg-gray-50 px-2 py-1.5 sm:px-3 sm:py-2 rounded-xl border shadow-sm">
                        <div class="flex flex-col">
                            <span class="text-[9px] text-gray-400 uppercase font-bold leading-none">Day</span>
                            <input type="date" name="date"
                                value="{{ $selectedDate->toDateString() }}"
                                class="text-[11px] sm:text-xs border-0 bg-transparent focus:ring-0 p-0 w-24 sm:w-auto">
                        </div>

                        <div class="h-5 w-px bg-gray-300"></div>

                        <button class="flex items-center justify-center bg-indigo-600 text-white p-1.5 rounded-lg hover:bg-indigo-700 transition">
                            <i data-lucide="search" class="w-3.5 h-3.5"></i>
                        </button>
                    </form>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="w-full text-[11px] table-auto sm:text-sm">
                        <thead>
                            <tr class="text-gray-400 border-b uppercase text-[9px] sm:text-[11px]">
                                <th class="py-2 text-left font-bold">Date</th>
                                <th class="py-2 text-center">Egg</th>
                                <th class="py-2 text-center">Feed</th>
                                <th class="py-2 text-center">Mort.</th>
                                <th class="py-2 text-center">Income</th>
                                <th class="py-2 text-center">Exp.</th>
                                <th class="py-2 text-right">Profit</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-50">
                            @foreach($dailySummaries as $day)
                            <tr class="hover:bg-gray-50/50 transition">
                                <!-- whitespace-nowrap prevents date from breaking into two lines -->
                                <td class="py-3 font-medium text-gray-700 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($day->date)->format('M d') }}
                                </td>
                                
                                <td class="text-center">
                                    <span class="bg-indigo-50 text-indigo-700 px-2 py-1 rounded-lg font-bold">
                                        {{ $day->eggs }}
                                    </span>
                                </td>

                                <td class="text-center text-gray-600">{{ $day->feed }}</td>
                                
                                <td class="text-center text-red-500">{{ $day->mortality }}</td>
                                
                                <td class="text-center font-medium text-gray-700">
                                    {{ number_format($day->income, 0) }} <!-- Removed decimals for mobile space -->
                                </td>
                                
                                <td class="text-center font-medium text-gray-700">
                                    {{ number_format($day->expense, 0) }}
                                </td>
                                
                                <td class="text-right font-bold {{ $day->profit >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ number_format($day->profit, 0) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- 📆 MONTHLY -->
        <div class="bg-white rounded-2xl shadow-lg p-3 sm:p-4 border border-gray-100 hover:shadow-xl transition">
            <div class="flex flex-row items-center justify-between gap-2 mb-4">
                <!-- Heading -->
                <h2 class="text-sm sm:text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <span class="bg-indigo-100 p-1.5 sm:p-2 rounded-lg shrink-0">
                        <i data-lucide="calendar" class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-indigo-600"></i>
                    </span>
                    <span class="truncate">Last 5 Months</span>
                </h2>

                <!-- Compact Filter -->
                <form method="GET" class="flex items-center gap-1.5 bg-gray-50 px-2 py-1 sm:px-3 sm:py-2 rounded-xl border shadow-sm shrink-0">
                    <div class="flex flex-col">
                        <span class="text-[9px] text-gray-400 leading-none">Month</span>
                        <input type="month" name="month"
                            value="{{ $selectedMonth->format('Y-m') }}"
                            class="text-[10px] sm:text-xs border-0 bg-transparent focus:ring-0 p-0 w-20 sm:w-auto">
                    </div>
                    <div class="h-5 w-px bg-gray-300"></div>
                    <button class="bg-indigo-600 text-white p-1.5 rounded-lg hover:bg-indigo-700 transition">
                        <i data-lucide="search" class="w-3.5 h-3.5"></i>
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <!-- table-auto + tight px-1 padding collapses the gap between columns -->
                <table class="w-full table-auto text-[11px] sm:text-sm">
                    <thead>
                        <tr class="text-gray-400 border-b uppercase text-[9px] sm:text-[10px] tracking-wider">
                            <th class="py-2 text-left pr-2 font-bold">Month</th>
                            <th class="px-1 py-2 text-center">Egg</th>
                            <th class="px-1 py-2 text-center">Feed</th>
                            <th class="px-1 py-2 text-center">Mort.</th>
                            <th class="px-1 py-2 text-center">Income</th>
                            <th class="px-1 py-2 text-center">Exp.</th>
                            <th class="px-1 py-2 text-right">Profit</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-50">
                        @foreach($monthlySummaries as $month)
                        <tr class="hover:bg-gray-50/50 transition">

                            <td class="py-2 font-semibold text-gray-800 whitespace-nowrap">
                                 {{ \Carbon\Carbon::parse($month->month)->format('M y') }}
                             </td>
                            
                            <td class="px-1 text-center whitespace-nowrap">
                                <span class="bg-indigo-50 text-indigo-700 px-1.5 py-0.5 rounded text-[10px] sm:text-xs font-bold">
                                    {{ $month->eggs }}
                                </span>
                            </td>

                            <td class="px-1 text-center whitespace-nowrap text-gray-600">{{ $month->feed }}</td>
                            
                            <td class="px-1 text-center text-red-500 whitespace-nowrap">{{ $month->mortality }}</td>
                            
                            <!-- Removed decimals to save horizontal space -->
                            <td class="px-1 text-center font-medium text-gray-700 whitespace-nowrap">
                                {{ number_format($month->income, 0) }}
                            </td>
                            
                            <td class="px-1 text-center font-medium text-gray-700 whitespace-nowrap">
                                {{ number_format($month->expense, 0) }}
                            </td>
                            
                            <td class="px-1 text-right font-bold whitespace-nowrap {{ $month->profit >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ number_format($month->profit, 0) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        </div>
    </div>

<script>
    lucide.createIcons();
</script>


</div>

        


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>


const labels = @json($chartDates);
const incomeData = @json($chartIncome);
const expenseData = @json($chartExpense);

// 📈 LINE CHART
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Income',
                data: incomeData,
                borderWidth: 2,
                tension: 0.4
            },
            {
                label: 'Expense',
                data: expenseData,
                borderWidth: 2,
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        }
    }
});

// 📊 BAR CHART
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Income',
                data: incomeData,
                borderWidth: 1
            },
            {
                label: 'Expense',
                data: expenseData,
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        }
    }
});
</script>
</x-app-layout>