<x-app-layout>

  <section class="py-4 overflow-auto flex-1">
    <div class="min-h-screen">

    <div class="flex justify-between bg-white py-2 px-2 items-center mb-6" >
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Monthly Report</h1>

          <!-- 🔷 Month Selector -->
          <form method="GET" class="mb-6 flex flex-col md:flex-row gap-4 items-end md:items-center">
            <input type="month" name="month" value="{{ request('month', now()->format('Y-m')) }}"
              class="border border-gray-300 rounded-lg p-2">

            <button class="flex text-right gap-1 sm:gap-2 bg-yellow-600 text-white px-2 py-2 text-xs sm:px-4 sm:py-2 sm:text-base rounded-md hover:bg-yellow-700 transition">
                <span>+</span>
                <span class="hidden sm:inline">Generate Report</span>
                <span class="sm:hidden">Generate</span>

            </button>
          </form>


    </div>
      <!-- 🔷 Production Table -->
      <div class="overflow-x-auto mb-6">
        <table class="min-w-full text-sm bg-white rounded-xl shadow">
          <thead class="bg-yellow-50 text-gray-600 uppercase text-xs">
            <tr>
              <th class="px-4 md:px-6 py-3 text-left">Pen / Batch</th>
              <th class="px-4 md:px-6 py-3 text-left">Total Crates</th>
              <th class="px-4 md:px-6 py-3 text-left">Feed (Sacks)</th>
              <th class="px-4 md:px-6 py-3 text-left">Mortality</th>
            </tr>
          </thead>

          <tbody class="divide-y">

            @php
            $totalCrates = 0;
            $totalFeed = 0;
            $totalMortality = 0;
            @endphp

            @forelse($reports as $report)
            <tr class="hover:bg-gray-50">
              <td class="px-4 md:px-6 py-4 font-medium">{{ $report->pen }}</td>

              <td class="px-4 md:px-6 py-4 text-green-600">
                {{ $report->crates }}
              </td>

              <td class="px-4 md:px-6 py-4">
                {{ $report->feed }}
              </td>

              <td class="px-4 md:px-6 py-4 text-red-600">
                {{ $report->mortality }}
              </td>
            </tr>

            @php
            $totalCrates += $report->crates;
            $totalFeed += $report->feed;
            $totalMortality += $report->mortality;
            @endphp

            @empty
            <tr>
              <td colspan="4" class="text-center py-4 text-gray-500">
                No data available for this month
              </td>
            </tr>
            @endforelse

            <!-- Totals -->
            <tr class="bg-gray-100 font-semibold">
              <td class="px-4 md:px-6 py-4">Total</td>
              <td class="px-4 md:px-6 py-4 text-green-700">{{ $totalCrates }}</td>
              <td class="px-4 md:px-6 py-4">{{ $totalFeed }}</td>
              <td class="px-4 md:px-6 py-4 text-red-700">{{ $totalMortality }}</td>
            </tr>

          </tbody>
        </table>
      </div>

      <!-- egg sale -->

      <!-- 🔷 Income Summary -->
      <div class="bg-white rounded-xl shadow p-5 mb-6">
        <h2 class="text-xl font-semibold mb-4">Income Summary</h2>

        @php $totalIncome = 0; @endphp

        <ul class="space-y-2 text-gray-700">
          @forelse($incomeSummary as $item)
          <li class="flex justify-between">
            <span>{{ $item->income_type }}</span>
            <span class="text-green-600 font-semibold">
              ₦{{ number_format($item->amount) }}
            </span>
          </li>

          @php $totalIncome += $item->amount; @endphp
          @empty
          <li class="text-gray-500">No income recorded</li>
          @endforelse

          <li class="border-t pt-2 font-bold flex justify-between">
            <span>Total Income</span>
            <span class="text-green-700">
              ₦{{ number_format($totalIncome) }}
            </span>
          </li>
        </ul>
      </div>

      <!-- 🔷 Expenses Summary -->
      <div class="bg-white rounded-xl shadow p-5 mb-6">
        <h2 class="text-xl font-semibold mb-4">Expenses Summary</h2>

        @php $totalExpense = 0; @endphp

        <ul class="space-y-2 text-gray-700">
          @forelse($expenseSummary as $item)
          <li class="flex justify-between">
            <span>{{ $item->category }}</span>
            <span class="text-red-600 font-semibold">
              ₦{{ number_format($item->amount) }}
            </span>
          </li>

          @php $totalExpense += $item->amount; @endphp
          @empty
          <li class="text-gray-500">No expenses recorded</li>
          @endforelse

          <li class="border-t pt-2 font-bold flex justify-between">
            <span>Total Expenses</span>
            <span class="text-red-700">
              ₦{{ number_format($totalExpense) }}
            </span>
          </li>
        </ul>
      </div>

      <!-- 🔷 Profit Summary -->
      <div class="bg-white rounded-xl shadow p-5 mb-6">
        <h2 class="text-xl font-semibold mb-4">Profit Summary</h2>

        @php $profit = $totalIncome - $totalExpense; @endphp

        <p class="text-gray-700">
          Total Income
          <span class="font-semibold text-green-700">
            ₦{{ number_format($totalIncome) }}
          </span>

          –

          Total Expenses
          <span class="font-semibold text-red-700">
            ₦{{ number_format($totalExpense) }}
          </span>

          =

          <span class="font-bold {{ $profit >= 0 ? 'text-green-600' : 'text-red-600' }}">
            ₦{{ number_format($profit) }}
          </span>
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-6">

        <!-- Production Chart -->
        <div class="bg-white p-4 rounded-xl shadow">
          <h3 class="font-semibold mb-2">Egg Production Trend</h3>
          <canvas id="productionChart"></canvas>
        </div>

        <!-- Income vs Expense -->
        <div class="bg-white p-4 rounded-xl shadow">
          <h3 class="font-semibold mb-2">Income vs Expense</h3>
          <canvas id="financeChart"></canvas>
        </div>

      </div>



      <!-- 🔷 Print -->
      <div class="text-right py-4">
        <a href="{{ route('reports.pdf', ['month' => request('month')]) }}"
          class="bg-green-800 hover:bg-green-900 text-white px-6 py-2 rounded-xl">
          Export PDF
        </a> <span>  </span>
        <!-- <button onclick="window.print()" class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-2 rounded-xl">
          Print / Export
        </button> -->
      </div>

              <div class="py-10" >
                <span> </span>
            </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>


      const productionData = @json($productionTrend);
      const incomeData = @json($incomeTrend);
      const expenseData = @json($expenseTrend);

      // Labels (dates)
      const labels = Object.keys(productionData);

      // Production Chart
      new Chart(document.getElementById('productionChart'), {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'Eggs',
            data: Object.values(productionData),
            borderWidth: 2
          }]
        }
      });

      // Finance Chart
      new Chart(document.getElementById('financeChart'), {
        type: 'bar',
        data: {
          labels: Object.keys(incomeData),
          datasets: [
            {
              label: 'Income',
              data: Object.values(incomeData)
            },
            {
              label: 'Expenses',
              data: Object.values(expenseData)
            }
          ]
        }
      });
    </script>

</x-app-layout>