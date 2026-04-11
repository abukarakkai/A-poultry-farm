<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        /* Define A4 Paper and Margins */
        @page {
            margin: 2cm;
            /* Professional print standard margin */
        }

        * {
            font-family: "DejaVu Sans", sans-serif;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #374151;
            line-height: 1.4;
        }

        /* Watermark - Absolute positioned relative to the page */
        .watermark {
            position: fixed;
            /* Fixed ensures it stays in place per page if needed */
            top: 30%;
            left: 10%;
            width: 80%;
            opacity: 0.05;
            z-index: -1000;
            text-align: center;
        }

        .watermark img {
            width: 500px;
        }

        /* Header Table - Use 100% width for responsiveness */
        .header-table {
            width: 100%;
            border-bottom: 3px solid #15803d;
            padding-bottom: 10px;
            margin-bottom: 30px;
            border-collapse: collapse;
        }

        .farm-name {
            font-size: 26px;
            font-weight: bold;
            color: #166534;
            margin: 0;
            text-transform: uppercase;
        }

        .report-type {
            font-size: 11px;
            color: #6b7280;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .header-right {
            text-align: right;
            font-size: 12px;
            vertical-align: top;
        }

        /* Data Tables */
        .section-title {
            font-size: 15px;
            font-weight: bold;
            color: #166534;
            border-left: 4px solid #15803d;
            padding-left: 8px;
            margin: 20px 0 10px 0;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed;
        }

        .table-data th {
            background-color: #f0fdf4;
            color: #166534;
            padding: 8px;
            border: 1px solid #e5e7eb;
            font-size: 10px;
            text-transform: uppercase;
            text-align: left;
        }

        .table-data td {
            padding: 8px;
            border: 1px solid #e5e7eb;
            font-size: 12px;
            word-wrap: break-word;
        }

        /* Two Column Financial Layout */
        .columns-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .column-td {
            width: 48%;
            vertical-align: top;
        }

        /* Profit Highlight */
        .profit-card {
            background-color: #1f2937;
            color: #ffffff;
            padding: 15px;
            border-radius: 6px;
            margin-top: 10px;
            width: 100%;
        }

        .profit-value {
            font-size: 22px;
            font-weight: bold;
        }

        /* Footer - Positioned at the bottom of every page */
        .footer {
            position: fixed;
            bottom: -1cm;
            /* Adjust based on your @page margin */
            left: 0;
            right: 0;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
            text-align: center;
            font-size: 10px;
            color: #9ca3af;
            text-transform: uppercase;
        }


        .container {
  width: 100%;
  margin-top: 20px;
}

.section {
  width: 48%;
  display: inline-block;
  vertical-align: top;
}

.card {
  padding: 15px;
  border-radius: 10px;
  border: 1px solid;
}

.income-card {
  background-color: #f0fdf4;
  border-color: #bbf7d0;
}

.expense-card {
  background-color: #fef2f2;
  border-color: #fecaca;
}

.title {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}

.income-title {
  color: #166534;
}

.expense-title {
  color: #991b1b;
}

.row {
  width: 100%;
  border-bottom: 1px solid #ddd;
  padding: 3px 0;
}

.row-table {
  width: 100%;
}

.left {
  font-size: 13px;
  color: #333;
}

.sub-text {
  font-size: 11px;
  color: #777;
}

.right {
  text-align: right;
  font-weight: bold;
}

.income-amount {
  color: #15803d;
}

.expense-amount {
  color: #b91c1c;
}
    </style>
</head>

<body>
    <!-- Watermark -->
    <div class="watermark">
        <img src="{{ public_path('logo.png') }}">
    </div>

    <!-- Header -->
    <table class="header-table">
        <tr>
            <td>
                <h1 class="farm-name">Arrayhaan Poultry Farm</h1>
                <div class="report-type">Official Production & Financial Report</div>
            </td>
            <td class="header-right">
                <div style="font-weight: bold;">{{ now()->format('F j, Y') }}</div>
                <div style="margin-top: 2px;">Kano State, Nigeria</div>
            </td>
        </tr>
    </table>

    <!-- Production Table -->
    <div class="section-title">Production Summary</div>
    <table class="table-data">
        <thead>
            <tr>
                <th width="25%">Pen</th>
                <th width="25%">Crates</th>
                <th width="25%">Feed</th>
                <th width="25%">Mortality</th>
            </tr>
        </thead>
        @php
        $totalCrates = 0;
        $totalFeed = 0;
        $totalMortality = 0;
        @endphp

        <tbody>
            @foreach($reports as $r)
            <tr>
                <td>{{ $r->pen }}</td>
                <td>{{ $r->crates }}</td>
                <td>{{ $r->feed }}</td>
                <td style="color: #dc2626;">{{ $r->mortality }}</td>
            </tr>

            @php
            $totalCrates += $r->crates;
            $totalFeed += $r->feed;
            $totalMortality += $r->mortality;
            @endphp


            @endforeach

            <tr">
                <td> <strong>Total</strong></td>
                <td> <strong>{{ $totalCrates }}</strong> </td>
                <td> <strong>{{ $totalFeed }}</strong> </td>
                <td> <strong>{{ $totalMortality }}</strong> </td>
                </tr>


        </tbody>
    </table>

    <!-- Side-by-Side Financials -->
    <table class="columns-table">
        <tr>
            <td class="column-td">
                <div style="font-weight: bold; font-size: 11px; margin-bottom: 5px;">INCOME</div>
                <table class="table-data">
                    @foreach($incomeSummary as $i)
                    <tr>
                        <td style="background-color: #f9fafb;">{{ $i->income_type }}</td>
                        <td align="right"> ₦{{ number_format($i->amount) }}</td>
                    </tr>
                    @endforeach
                    <tr style="font-weight: bold; background-color: #f0fdf4;">
                        <td>Total</td>
                        <td align="right">₦{{ number_format($totalIncome) }}</td>
                    </tr>
                </table>
            </td>
            <td width="4%"></td> <!-- Gutter -->
            <td class="column-td">
                <div style="font-weight: bold; font-size: 11px; margin-bottom: 5px;">EXPENSES</div>
                <table class="table-data">
                    @foreach($expenseSummary as $e)
                    <tr>
                        <td style="background-color: #f9fafb;">{{ $e->category }}</td>
                        <td align="right">₦{{ number_format($e->amount) }}</td>
                    </tr>
                    @endforeach
                    <tr style="font-weight: bold; background-color: #fef2f2; color: #991b1b;">
                        <td>Total</td>
                        <td align="right">₦{{ number_format($totalExpense) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Profit Summary Card -->
    <div class="profit-card">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <div style="font-size: 9px; text-transform: uppercase; color: #9ca3af;">Net Profit</div>
                    <div class="profit-value"> ₦ {{ number_format($profit) }}</div>
                </td>
                <td align="right" style="font-size: 11px; line-height: 1.5;">
                    Income: ₦{{ number_format($totalIncome) }}<br>
                    Expenses: ₦{{ number_format($totalExpense) }}
                </td>
            </tr>
        </table>
    </div>
<div style="page-break-before: always;"></div>

    <div class="container">

        <!-- Income -->
        <div class="section">
            <div class="card income-card">
                <div class="title income-title">🥚 Income Breakdown</div>

                @foreach($incomeBreakdown as $income)
                <div class="row">
                    <table class="row-table">
                        <tr>
                            <td class="left">
                                <strong>{{ $income->income_type }}</strong><br>
                                <span class="sub-text">
                                    {{ number_format($income->total_qty) }} sold at ₦{{ number_format($income->price, 2)
                                    }}
                                </span>
                            </td>
                            <td class="right income-amount">
                                ₦{{ number_format($income->total_sum, 2) }}
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach

            </div>
        </div>

        <!-- Expense -->
        <div class="section" style="float: right;">
            <div class="card expense-card">
                <div class="title expense-title">💸 Expense Breakdown</div>

                @foreach($expenseBreakdown as $expense)
                <div class="row">
                    <table class="row-table">
                        <tr>
                            <td class="left">
                                <strong>{{ $expense->title }}</strong><br>
                                <span class="sub-text">
                                    {{ number_format($expense->total_qty) }} units at ₦{{
                                    number_format($expense->unit_price, 2) }}
                                </span>
                            </td>
                            <td class="right expense-amount">
                                -₦{{ number_format($expense->total_sum, 2) }}
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach

            </div>
        </div>

    </div>





    <div class="footer">
        <p>Maiduguri Road, Makole Kano State, Nigeria</p>
        <p style="margin-top: 5px; color: #313c4a;"><strong>+234 703 867 1413| +234 703 560 3273</strong></p>
    </div>
    </div>
</body>


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
</body>

</html>