<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pen;
use App\Models\Record;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecordsExport;


class RecordController extends Controller
{
    // public function index()
    // {
    //     $records = Record::with('pen')->latest()->get();
    //     $pens = Pen::all();

    //     return view('records.index', compact('records','pens'));
    // }

    public function store(Request $request)
    {
         $validated = $request->validate([
        'pen_id'          => 'required|exists:pens,id',
        'record_date'     => 'required|date',
        'crates_produced' => 'required|integer|min:0',
        'cracks'          => 'nullable|integer|min:0',
        'feed_consumed'   => 'required|numeric|min:0',
        'cull'            => 'nullable|integer|min:0',
        'mortality'       => 'nullable|integer|min:0',
        'water'           => 'nullable|numeric|min:0',
        'note'            => 'nullable|string|max:255',
    ]);
        Record::create([
            'pen_id' => $request->pen_id,
            'record_date' => $request->record_date,
            'eggs_collected' => $request->crates_produced,
            'cracks' => $request->cracks,
            'feed_given' => $request->feed_consumed,
            'cull' => $request->cull,
            'mortality' => $request->mortality,
            'water' => $request->water,
            'notes' => $request->note


        ]);

        return response()->json([
            'success' => true
        ]);
    }


    public function show($id)
{
    // Load the record and its related pen
    $record = Record::with('pen')->findOrFail($id);

    return response()->json($record);
}


public function index(Request $request)
{
    $pens = Pen::all();

    $records = Record::with('pen')
        // Filter by Pen if selected
        ->when($request->pen_id, function($query, $penId) {
            return $query->where('pen_id', $penId);
        })
        // Filter by Date if selected
        ->when($request->date, function($query, $date) {
            return $query->whereDate('record_date', $date);
        })
        ->latest()
        ->get();

    return view('records.index', compact('records', 'pens'));
}





// ... other imports

public function export(Request $request)
{
    $query = Record::with('pen')
        ->when($request->pen_id, fn($q, $id) => $q->where('pen_id', $id))
        ->when($request->date, fn($q, $date) => $q->whereDate('record_date', $date))
        ->latest();

    if ($request->format == 'excel') {
        return Excel::download(new RecordsExport($query), 'poultry_records.xlsx');
    }
    
    // ... PDF logic
}


public function update(Request $request, $id) {
    $record = Record::findOrFail($id);
    
    $validated = $request->validate([
        'pen_id' => 'required',
        'record_date' => 'required|date',
        'crates_produced' => 'required|integer', 
        'feed_consumed' => 'required|numeric',
    ]);

    $record->update([
        'pen_id' => $request->pen_id,
        'record_date' => $request->record_date,
        'eggs_collected' => $request->crates_produced, // Mapping again
        'cracks' => $request->cracks,
        'feed_given' => $request->feed_consumed,
        'cull' => $request->cull,
        'mortality' => $request->mortality,
        'water' => $request->water,
        'notes' => $request->note,
    ]);

    return response()->json(['success' => true]);
}

public function destroy($id)
{
    $record = Record::findOrFail($id);
    $record->delete();

    return response()->json([
        'success' => true
    ]);
}



}