<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Record;
use App\Models\Sale;
use App\Models\Expense;
use App\Models\Pen;


class DashboardController extends Controller
{
    //

    public function dashboard(Request $request) {
        $today = Carbon::today();

        $month = $request->month 
            ? Carbon::parse($request->month) 
            : Carbon::now();

        $startDate = $month->copy()->startOfMonth()->toDateString();
        $endDate   = $month->copy()->endOfMonth()->toDateString();

        $totalEggs = Record::sum('eggs_collected');


    // 🥚 Eggs Sold
    $totalEggsSold = Sale::sum('quantity');

    // 💰 Income
    $totalIncome = Sale::sum('total_amount');

    // 💸 Expenses
    $totalExpense = Expense::sum('amount');

    // ☠️ Mortality
    $totalMortality = Record::sum('mortality');

    // 📊 Daily Production Trend
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




    // =========================
    // 📅 DAILY SUMMARY
    // =========================
    // $dailyEggs = Record::whereDate('record_date', $today)->sum('eggs_collected');
    // $dailyFeed = Record::whereDate('record_date', $today)->sum('feed_given');
    // $dailyMortality = Record::whereDate('record_date', $today)->sum('mortality');

    // $dailyIncome = Sale::whereDate('date', $today)->sum('total_amount');
    // $dailyExpense = Expense::whereDate('date', $today)->sum('amount');

    // $dailyProfit = $dailyIncome - $dailyExpense;

    // // =========================
    // // 📆 MONTHLY SUMMARY
    // // =========================
    // $monthlyEggs = Record::whereDate('record_date', '>=', $startDate)
    //     ->whereDate('record_date', '<=', $endDate)
    //     ->sum('eggs_collected');

    // $monthlyCrates = floor($monthlyEggs / 30);

    // $monthlyFeed = Record::whereDate('record_date', '>=', $startDate)
    //     ->whereDate('record_date', '<=', $endDate)
    //     ->sum('feed_given');

    // $monthlyMortality = Record::whereDate('record_date', '>=', $startDate)
    //     ->whereDate('record_date', '<=', $endDate)
    //     ->sum('mortality');

    // $monthlyIncome = Sale::whereDate('date', '>=', $startDate)
    //     ->whereDate('date', '<=', $endDate)
    //     ->sum('total_amount');

    // $monthlyExpense = Expense::whereDate('date', '>=', $startDate)
    //     ->whereDate('date', '<=', $endDate)
    //     ->sum('amount');

    // $monthlyProfit = $monthlyIncome - $monthlyExpense;

        $selectedDate = $request->date 
        ? Carbon::parse($request->date) 
        : Carbon::today();

    // 📆 Selected Month
    $selectedMonth = $request->month 
        ? Carbon::parse($request->month) 
        : Carbon::now();

    // =========================
    // 📅 LAST 5 DAYS SUMMARY
    // =========================
    $dailySummaries = [];

    for ($i = 4; $i >= 0; $i--) {
        $date = $selectedDate->copy()->subDays($i)->toDateString();

        $eggs = Record::whereDate('record_date', $date)->sum('eggs_collected');
        $feed = Record::whereDate('record_date', $date)->sum('feed_given');
        $mortality = Record::whereDate('record_date', $date)->sum('mortality');

        $income = Sale::whereDate('date', $date)->sum('total_amount');
        $expense = Expense::whereDate('date', $date)->sum('amount');

        $dailySummaries[] = (object)[
            'date' => $date,
            'eggs' => $eggs,
            'feed' => $feed,
            'mortality' => $mortality,
            'income' => $income,
            'expense' => $expense,
            'profit' => $income - $expense
        ];
    }

    // =========================
    // 📆 LAST 5 MONTHS SUMMARY
    // =========================
    $monthlySummaries = [];

    for ($i = 4; $i >= 0; $i--) {
        $month = $selectedMonth->copy()->subMonths($i);

        $start = $month->copy()->startOfMonth()->toDateString();
        $end   = $month->copy()->endOfMonth()->toDateString();

        $eggs = Record::whereDate('record_date', '>=', $start)
            ->whereDate('record_date', '<=', $end)
            ->sum('eggs_collected');

        $feed = Record::whereDate('record_date', '>=', $start)
            ->whereDate('record_date', '<=', $end)
            ->sum('feed_given');

        $mortality = Record::whereDate('record_date', '>=', $start)
            ->whereDate('record_date', '<=', $end)
            ->sum('mortality');

        $income = Sale::whereDate('date', '>=', $start)
            ->whereDate('date', '<=', $end)
            ->sum('total_amount');

        $expense = Expense::whereDate('date', '>=', $start)
            ->whereDate('date', '<=', $end)
            ->sum('amount');

        $cracks = Record::whereDate('record_date', '>=', $start)
            ->whereDate('record_date', '<=', $end)
            ->sum('cracks');


        $monthlySummaries[] = (object)[
            'month' => $month->format('F Y'),
            'eggs' => $eggs,
            'cracks' => floor($cracks / 30),
            'feed' => $feed,
            'mortality' => $mortality,
            'income' => $income,
            'expense' => $expense,
            'profit' => $income - $expense
        ];
    }

    // Add this after your dailySummaries loop

$chartDates = [];
$chartIncome = [];
$chartExpense = [];

foreach ($monthlySummaries as $month) {
    $chartDates[] = $month->month;
    $chartIncome[] = $month->income;
    $chartExpense[] = $month->expense;
}

    $netProfit = ($totalIncome - $totalExpense);

    return view('dashboard', compact(
        'totalEggs',
        'totalEggsSold',
        'totalIncome',
        'totalExpense',
        'netProfit',
        'totalMortality',
        'productionTrend',
        'incomeTrend',
        'expenseTrend',
        
        'dailySummaries',
        'monthlySummaries',
        'selectedDate',
        'selectedMonth',
        'chartDates',
        'chartIncome',
        'chartExpense'


        // 'dailyEggs',
        // 'dailyFeed',
        // 'dailyMortality',
        // 'dailyIncome',
        // 'dailyExpense',
        // 'dailyProfit',

        // // Monthly
        // 'monthlyEggs',
        // 'monthlyCrates',
        // 'monthlyFeed',
        // 'monthlyMortality',
        // 'monthlyIncome',
        // 'monthlyExpense',
        // 'monthlyProfit',

        // 'month'

    ));
}
}
