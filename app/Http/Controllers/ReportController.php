<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Carbon\Carbon;
// use App\Models\Record;
// use App\Models\Sale;
// use App\Models\Expense;
// use App\Models\Pen;
// use Barryvdh\DomPDF\Facade\Pdf;

// class ReportController extends Controller
// {
//     public function index(Request $request)
//     {
//         // 📅 Get selected month or default
//         $month = $request->month 
//             ? Carbon::parse($request->month) 
//             : Carbon::now();

//         $startDate = $month->copy()->startOfMonth();
//         $endDate   = $month->copy()->endOfMonth();

//         // 🐔 Production + Mortality (Grouped by Pen)
//         $reports = Pen::with(['records' => function ($query) use ($startDate, $endDate) {
//             $query->whereBetween('record_date', [$startDate, $endDate]);
//         }])->get()->map(function ($pen) {

//             $crates = $pen->records->sum('eggs_collected'); // 30 eggs = 1 crate
//             $feed   = $pen->records->sum('feed_given');
//             $mortality = $pen->records->sum('mortality');

//             return (object)[
//                 'pen' => $pen->name,
//                 'crates' => $crates,
//                 'feed' => $feed,
//                 'mortality' => $mortality
//             ];
//         });

//         // 💰 Income Summary (Sales Table)
//         $incomeSummary = Sale::selectRaw('income_type, SUM(total_amount) as amount')
//             ->whereBetween('date', [$startDate, $endDate])
//             ->groupBy('income_type')
//             ->get();

//         // 💸 Expense Summary
//         $expenseSummary = Expense::selectRaw('category, SUM(amount) as amount')
//             ->whereBetween('date', [$startDate, $endDate])
//             ->groupBy('category')
//             ->get();

//         // 📊 Totals
//         $totalEggs = Record::whereBetween('record_date', [$startDate, $endDate])->sum('eggs_collected');
//         $totalCrates = floor($totalEggs / 30);

//         $totalMortality = Record::whereBetween('record_date', [$startDate, $endDate])->sum('mortality');

//         $totalIncome = $incomeSummary->sum('amount');
//         $totalExpense = $expenseSummary->sum('amount');

//         $netProfit = $totalIncome - $totalExpense;

//         // 📦 Return View
//         return view('reports.index', compact(
//             'reports',
//             'incomeSummary',
//             'expenseSummary',
//             'totalCrates',
//             'totalMortality',
//             'totalIncome',
//             'totalExpense',
//             'netProfit',
//             'month'
//         ));
//     }

//     public function exportPdf(Request $request)
// {
//     $month = $request->month 
//         ? \Carbon\Carbon::parse($request->month) 
//         : now();

//     $startDate = $month->copy()->startOfMonth();
//     $endDate   = $month->copy()->endOfMonth();

//     // 🔁 Reuse same logic
//     $reports = \App\Models\Pen::with(['records' => function ($query) use ($startDate, $endDate) {
//         $query->whereBetween('record_date', [$startDate, $endDate]);
//     }])->get()->map(function ($pen) {

//         $crates = $pen->records->sum('eggs_collected') ;
//         $feed = $pen->records->sum('feed_given');
//         $mortality = $pen->records->sum('mortality');

//         return (object)[
//             'pen' => $pen->name,
//             'crates' => $crates,
//             'feed' => $feed,
//             'mortality' => $mortality
//         ];
//     });

//     $incomeSummary = \App\Models\Sale::selectRaw('income_type, SUM(total_amount) as amount')
//         ->whereBetween('date', [$startDate, $endDate])
//         ->groupBy('income_type')
//         ->get();

//     $expenseSummary = \App\Models\Expense::selectRaw('category, SUM(amount) as amount')
//         ->whereBetween('date', [$startDate, $endDate])
//         ->groupBy('category')
//         ->get();

//     $totalIncome = $incomeSummary->sum('amount');
//     $totalExpense = $expenseSummary->sum('amount');
//     $profit = $totalIncome - $totalExpense;

//     $pdf = Pdf::loadView('reports.pdf', compact(
//         'reports',
//         'incomeSummary',
//         'expenseSummary',
//         'totalIncome',
//         'totalExpense',
//         'profit',
//         'month'
//     ));

//     return $pdf->download('monthly-report.pdf');
// }
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Record;
use App\Models\Sale;
use App\Models\Expense;
use App\Models\Pen;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // 📅 Get selected month or default
        $month = $request->month 
            ? Carbon::parse($request->month) 
            : Carbon::now();

        $startDate = $month->copy()->startOfMonth()->toDateString();
        $endDate   = $month->copy()->endOfMonth()->toDateString();

        // 🐔 Production + Mortality (Grouped by Pen)
        $reports = Pen::with(['records' => function ($query) use ($startDate, $endDate) {
            $query->whereDate('record_date', '>=', $startDate)
                  ->whereDate('record_date', '<=', $endDate);
        }])->get()->map(function ($pen) {

            $totalEggs = $pen->records->sum('eggs_collected');

            return (object)[
                'pen' => $pen->name,
                'crates' => $totalEggs, // ✅ FIXED
                'feed' => $pen->records->sum('feed_given'),
                'mortality' => $pen->records->sum('mortality')
            ];
        });

        // 💰 Income Summary
        $incomeSummary = Sale::selectRaw('income_type, SUM(total_amount) as amount')
            ->whereDate('date', '>=', $startDate)
            ->whereDate('date', '<=', $endDate)
            ->groupBy('income_type')
            ->get();

        // 💸 Expense Summary
        $expenseSummary = Expense::selectRaw('category, SUM(amount) as amount')
            ->whereDate('date', '>=', $startDate)
            ->whereDate('date', '<=', $endDate)
            ->groupBy('category')
            ->get();

        // 📊 Totals
        $totalEggs = Record::whereDate('record_date', '>=', $startDate)
            ->whereDate('record_date', '<=', $endDate)
            ->sum('eggs_collected');

        $totalCrates = $totalEggs;

        $totalMortality = Record::whereDate('record_date', '>=', $startDate)
            ->whereDate('record_date', '<=', $endDate)
            ->sum('mortality');

        $productionTrend = Record::selectRaw('DATE(record_date) as date, SUM(eggs_collected) as total')
        ->whereBetween('record_date', [$startDate, $endDate])
        ->groupBy('date')
        ->pluck('total', 'date');

    // 📊 Income vs Expense Trend
    $incomeTrend = \App\Models\Sale::selectRaw('DATE(date) as date, SUM(total_amount) as total')
        ->whereBetween('date', [$startDate, $endDate])
        ->groupBy('date')
        ->pluck('total', 'date');

    $expenseTrend = \App\Models\Expense::selectRaw('DATE(date) as date, SUM(amount) as total')
        ->whereBetween('date', [$startDate, $endDate])
        ->groupBy('date')
        ->pluck('total', 'date');


        $totalIncome = $incomeSummary->sum('amount');
        $totalExpense = $expenseSummary->sum('amount');

        $netProfit = $totalIncome - $totalExpense;

    $incomeBreakdown = \App\Models\Sale::selectRaw('income_type, price, SUM(quantity) as total_qty, SUM(total_amount) as total_sum')
    ->whereBetween('date', [$startDate, $endDate])
    ->groupBy('income_type', 'price')
    ->get();

// 💸 Expense Breakdown: Grouped by Title and Unit Price
$expenseBreakdown = \App\Models\Expense::selectRaw('title, unit_price, SUM(quantity) as total_qty, SUM(amount) as total_sum')
    ->whereBetween('date', [$startDate, $endDate])
    ->groupBy('title', 'unit_price')
    ->get();

        return view('reports.index', compact(
            'reports',
            'incomeSummary',
            'expenseSummary',
            'totalCrates',
            'totalMortality',
            'totalIncome',
            'totalExpense',
            'netProfit',
            'month',
            'productionTrend',
            'incomeTrend',
            'expenseTrend',
            'incomeBreakdown', 
            'expenseBreakdown'

        ));
    }

    public function exportPdf(Request $request)
    {

    $productionChart = $request->productionChart;
    $financeChart = $request->financeChart;

        $month = $request->month 
            ? Carbon::parse($request->month) 
            : now();

        $startDate = $month->copy()->startOfMonth()->toDateString();
        $endDate   = $month->copy()->endOfMonth()->toDateString();

        // 🐔 Production
        $reports = Pen::with(['records' => function ($query) use ($startDate, $endDate) {
            $query->whereDate('record_date', '>=', $startDate)
                  ->whereDate('record_date', '<=', $endDate);
        }])->get()->map(function ($pen) {

            $totalEggs = $pen->records->sum('eggs_collected');

            return (object)[
                'pen' => $pen->name,
                'crates' => $totalEggs,
                'feed' => $pen->records->sum('feed_given'),
                'mortality' => $pen->records->sum('mortality')
            ];
        });

        // 💰 Income
        $incomeSummary = Sale::selectRaw('income_type, SUM(total_amount) as amount')
            ->whereDate('date', '>=', $startDate)
            ->whereDate('date', '<=', $endDate)
            ->groupBy('income_type')
            ->get();

        // 💸 Expense
        $expenseSummary = Expense::selectRaw('category, SUM(amount) as amount')
            ->whereDate('date', '>=', $startDate)
            ->whereDate('date', '<=', $endDate)
            ->groupBy('category')
            ->get();

                    $productionTrend = Record::selectRaw('DATE(record_date) as date, SUM(eggs_collected) as total')
        ->whereBetween('record_date', [$startDate, $endDate])
        ->groupBy('date')
        ->pluck('total', 'date');

    // 📊 Income vs Expense Trend
    $incomeTrend = \App\Models\Sale::selectRaw('DATE(date) as date, SUM(total_amount) as total')
        ->whereBetween('date', [$startDate, $endDate])
        ->groupBy('date')
        ->pluck('total', 'date');

    $expenseTrend = \App\Models\Expense::selectRaw('DATE(date) as date, SUM(amount) as total')
        ->whereBetween('date', [$startDate, $endDate])
        ->groupBy('date')
        ->pluck('total', 'date');

            $incomeBreakdown = \App\Models\Sale::selectRaw('income_type, price, SUM(quantity) as total_qty, SUM(total_amount) as total_sum')
    ->whereBetween('date', [$startDate, $endDate])
    ->groupBy('income_type', 'price')
    ->get();

// 💸 Expense Breakdown: Grouped by Title and Unit Price
$expenseBreakdown = \App\Models\Expense::selectRaw('title, unit_price, SUM(quantity) as total_qty, SUM(amount) as total_sum')
    ->whereBetween('date', [$startDate, $endDate])
    ->groupBy('title', 'unit_price')
    ->get();





        $totalIncome = $incomeSummary->sum('amount');
        $totalExpense = $expenseSummary->sum('amount');
        $profit = $totalIncome - $totalExpense;

        $pdf = Pdf::loadView('reports.pdf', compact(
            
        'reports',
            'incomeSummary',
            'expenseSummary',
            'totalIncome',
            'totalExpense',
            'profit',
            'month',
            'productionTrend',
            'incomeTrend',
            'expenseTrend',
            'incomeBreakdown', 
            'expenseBreakdown'

        )) ;
        $monthName = \Carbon\Carbon::parse($month)->format('F');

        $fileName = 'Arrayhaan ' . $monthName . ' monthly-report.pdf';
        return $pdf->download($fileName);
    }
}