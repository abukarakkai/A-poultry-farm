<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
class ExpenseController extends Controller
{
    //
    public function index()
        {
            $expenses = Expense::orderBy('date', 'desc')->get();
            return view('expenses.index', compact('expenses'));
        }

    public function store(Request $request){
          $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'amount' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'paymentMethod' => 'required|string'
        ]);

        Expense::create($request->all());

        return response()->json(['success' => true]);

    }
        public function show($id)
        {
            return response()->json(Expense::findOrFail($id));
        }

public function update(Request $request, $id)
{
    $expense = Expense::findOrFail($id);

    // Map your JS keys to your Database columns
    $expense->update([
        'title'          => $request->title,
        'date'           => $request->date,
        'category'       => $request->category,
        'description'    => $request->description,
        'unit_price'     => $request->unit_price,
        'quantity'       => $request->quantity,
        'amount'         => $request->amount,
        'paymentMethod' => $request->paymentMethod, // Note the casing match
    ]);

    return response()->json(['success' => true ]);
}

        public function destroy($id)
        {
            $expense = Expense::findOrFail($id);
            $expense->delete();

            return response()->json([
                'success' => true
            ]);
        }

}
