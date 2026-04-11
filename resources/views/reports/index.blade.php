<x-app-layout>

  <section class="p-4 overflow-auto flex-1">
    <div class="p-4 md:p-6 bg-gray-50 min-h-screen">

      <h1 class="text-2xl font-bold text-gray-800 mb-6">Monthly Report</h1>

      <!-- 🔷 Month Selector -->
      <form method="GET" class="mb-6 flex flex-col md:flex-row gap-4 items-start md:items-center">
        <label class="text-gray-700 font-medium">Select Month:</label>

        <input type="month" name="month" value="{{ request('month', now()->format('Y-m')) }}"
          class="border border-gray-300 rounded-lg px-3 py-2">

        <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-full">
          Generate Report
        </button>
      </form>

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
          class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-2 rounded-xl">
          Export PDF
        </a> <span>  </span>
        <button onclick="window.print()" class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-2 rounded-xl">
          Print / Export
        </button>
      </div>

    </div>


    <div
      class="relative mx-auto my-10 w-[210mm] min-h-[297mm] bg-white p-12 shadow-lg border border-gray-200 overflow-hidden print:shadow-none print:my-0">

      <!-- Watermark Logo -->
      <div class="absolute inset-0 flex items-center justify-center opacity-[0.07] pointer-events-none">
        <img src="/logo.png" class="w-96 grayscale">
      </div>

      <!-- Header Section -->
      <header class="relative z-10 border-b-4 border-green-700 pb-4 mb-8">
        <div class="flex justify-between items-start">
          <div>
            <h1 class="text-3xl font-extrabold text-green-800 tracking-tight">
              Arrayhaan Poultry farm
            </h1>
            <p class="text-sm text-gray-600 mt-1 uppercase tracking-wide font-medium">
              Official Production & Financial Report
            </p>
          </div>
          <div class="text-right">
            <p class="text-sm font-bold text-gray-800">{{ now()->format('F j, Y') }}</p>
            <p class="text-xs text-gray-500">Kano State, Nigeria</p>
          </div>
        </div>
      </header>

      <!-- Content Body -->
      <div class="relative z-10 space-y-8">

        <!-- Production Table -->
        <section>
          <h2 class="text-lg font-bold text-green-800 border-l-4 border-green-700 pl-2 mb-3">Production Summary</h2>
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-green-50 text-green-900 uppercase text-xs">
                <th class="p-2 border">Pen</th>
                <th class="p-2 border">Crates</th>
                <th class="p-2 border">Feed</th>
                <th class="p-2 border">Mortality</th>
              </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-200">
              @foreach($reports as $r)
              <tr>
                <td class="p-2 border">{{ $r->pen }}</td>
                <td class="p-2 border">{{ $r->crates }}</td>
                <td class="p-2 border">{{ $r->feed }}</td>
                <td class="p-2 border text-red-600">{{ $r->mortality }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
          <!-- Income Section -->
          <div class="bg-green-50 p-6 rounded-2xl shadow-sm border border-green-100">
            <h3 class="text-lg font-bold text-green-800 mb-4 flex items-center gap-2">
              <span>🥚</span> Income Breakdown
            </h3>
            <div class="space-y-3">
              @foreach($incomeBreakdown as $income)
              <div class="flex justify-between items-center border-b border-green-200 pb-2">
                <div>
                  <p class="font-medium text-gray-800">{{ $income->income_type }}</p>
                  <p class="text-xs text-gray-500">
                    {{ number_format($income->total_qty) }} sold at ₦{{ number_format($income->price, 2) }}
                  </p>
                </div>
                <span class="font-bold text-green-700">₦{{ number_format($income->total_sum, 2) }}</span>
              </div>
              @endforeach
            </div>
          </div>

          <!-- Expense Section -->
          <div class="bg-red-50 p-6 rounded-2xl shadow-sm border border-red-100">
            <h3 class="text-lg font-bold text-red-800 mb-4 flex items-center gap-2">
              <span>💸</span> Expense Breakdown
            </h3>
            <div class="space-y-3">
              @foreach($expenseBreakdown as $expense)
              <div class="flex justify-between items-center border-b border-red-200 pb-2">
                <div>
                  <p class="font-medium text-gray-800">{{ $expense->title }}</p>
                  <p class="text-xs text-gray-500">
                    {{ number_format($expense->total_qty) }} units at ₦{{ number_format($expense->unit_price, 2) }}
                  </p>
                </div>
                <span class="font-bold text-red-700">-₦{{ number_format($expense->total_sum, 2) }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>


        <!-- Income & Expenses Grid -->
        <div class="grid grid-cols-2 gap-8">
          <!-- Income -->
          <section>
            <h2 class="text-sm font-bold text-gray-700 mb-2 uppercase">Income</h2>
            <table class="w-full text-sm border">
              @foreach($incomeSummary as $i)
              <tr class="border-b">
                <td class="p-2 bg-gray-50">{{ $i->income_type }}</td>
                <td class="p-2 text-right">₦{{ number_format($i->amount) }}</td>
              </tr>
              @endforeach
              <tr class="font-bold bg-green-50">
                <td class="p-2">Total</td>
                <td class="p-2 text-right">₦{{ number_format($totalIncome) }}</td>
              </tr>
            </table>
          </section>

          <!-- Expenses -->
          <section>
            <h2 class="text-sm font-bold text-gray-700 mb-2 uppercase">Expenses</h2>
            <table class="w-full text-sm border">
              @foreach($expenseSummary as $e)
              <tr class="border-b">
                <td class="p-2 bg-gray-50">{{ $e->category }}</td>
                <td class="p-2 text-right">₦{{ number_format($e->amount) }}</td>
              </tr>
              @endforeach
              <tr class="font-bold bg-red-50 text-red-700">
                <td class="p-2">Total</td>
                <td class="p-2 text-right">₦{{ number_format($totalExpense) }}</td>
              </tr>
            </table>
          </section>
        </div>

        <!-- Profit Summary Card -->
        <div class="bg-gray-800 text-white p-4 rounded-lg flex justify-between items-center">
          <div>
            <p class="text-xs uppercase text-gray-400">Net Profit</p>
            <p class="text-2xl font-bold">₦{{ number_format($profit) }}</p>
          </div>
          <div class="text-right text-xs">
            <p>Income: ₦{{ number_format($totalIncome) }}</p>
            <p>Expenses: ₦{{ number_format($totalExpense) }}</p>
          </div>
        </div>

        <!-- Charts Grid -->

        <!-- <div class="grid grid-cols-2 gap-6 print:block">
              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <div class="border p-2 rounded print:mb-4">
                <h3 class="text-xs font-bold mb-2 text-center">Egg Production Trend</h3>
                <canvas id="productionChart"></canvas>
            </div>
            <div class="border p-2 rounded">
                <h3 class="text-xs font-bold mb-2 text-center">Income vs Expense</h3>
                <canvas id="financeChart"></canvas>
            </div>
        </div> -->

        <canvas id="productionChart"></canvas>
        <canvas id="financeChart"></canvas>
      </div>

      <!-- Footer -->
      <footer
        class="absolute bottom-12 left-12 right-12 border-t-2 border-gray-100 pt-4 text-center text-[10px] text-gray-500 uppercase tracking-widest">
        <p>Maiduguri Road, Makole Kano State, Nigeria</p>
        <p class="mt-1 font-bold">+234 703 867 1413 | +234 703 560 3273</p>
      </footer>
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