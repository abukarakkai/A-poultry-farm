<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
{
    $sales = Sale::latest()->get();

    return view('sales.index', compact('sales'));
}

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'customer_name' => 'required',
            'income_type' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required'
        ]);

        Sale::create($request->all());


        return response()->json(['success' => true]);

    }
    

    public function show($id)
        {
            return response()->json(Sale::findOrFail($id));
        }

        public function update(Request $request, $id)
            {
                $sale = Sale::findOrFail($id);

                $sale->update($request->all());

                return response()->json([
                    'success' => true
                ]);
            }


public function destroy($id)
{
    $sale = Sale::findOrFail($id);
    $sale->delete();

    return response()->json([
        'success' => true
    ]);
}
}