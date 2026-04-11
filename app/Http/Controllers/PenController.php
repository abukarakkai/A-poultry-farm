<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pen;

class PenController extends Controller
{
    public function index()
    {
        $pens = Pen::all(); // fetch all pens
        return view('pens.index', compact('pens'));
    }

    
public function store(Request $request)
{
    $validated = $request->validate([
        'penName' => 'required|string|max:255',
        'birdType' => 'required|string',
        'capacity' => 'required|integer',
        'birdCount' => 'required|integer',
        'startDate' => 'required|date',
        'status' => 'required|string',
        'note' => 'nullable|string',
    ]);

    Pen::create([
        'name' => $request->penName,
        'capacity' => $request->capacity,
        'initial_birds' => $request->birdCount,
        'start_date' => $request->startDate,
        'type' => $request->birdType,
        'status' => $request->status,
        'notes' => $request->note
    ]);

    return response()->json(['success' => true]);
}
    public function show(Pen $pen)
    {
        return response()->json($pen);
    }


public function update(Request $request, $id)
{
    $pen = Pen::findOrFail($id);

    // ✅ Validate using DB field names
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string',
        'capacity' => 'required|integer',
        'initial_birds' => 'required|integer',
        'start_date' => 'nullable|date',
        'status' => 'required|string',
        'notes' => 'nullable|string'
    ]);

    // ✅ Direct update (clean)
    $pen->update($validated);

    return response()->json([
        'message' => 'Pen updated successfully!'
    ]);
}

    public function destroy($id)
{
    $pen = Pen::findOrFail($id);
    $pen->delete();

    return response()->json([
        'success' => true
    ]);
}

public function records()
{
    return $this->hasMany(\App\Models\Record::class, 'pen_id');
}


    // public function destroy(Pen $pen)
    // {
    //     $pen->delete();

    //     return response()->json(['success' => true]);
    // }
}
// namespace App\Http\Controllers;

// use App\Models\Pen;
// use Illuminate\Http\Request;

// class PenController extends Controller
// {
//     public function index()
//     {
//         $pens = Pen::latest()->get();
//         return view('pens.index', compact('pens'));
//     }

//     public function create()
//     {
//         return view('pens.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'initial_birds' => 'required|integer',
//             'start_date' => 'required|date',
//             'type' => 'required'
//         ]);


        




//         Pen::create($request->all());

//         return redirect()->route('pens.index')
//             ->with('success', 'Pen created successfully');
//     }


//     public function edit(Pen $pen)
// {
//     return view('pens.edit', compact('pen'));
// }

// public function update(Request $request, Pen $pen)
// {
//     $request->validate([
//         'name' => 'required',
//         'initial_birds' => 'required|integer',
//         'start_date' => 'required|date',
//         'type' => 'required'
//     ]);

//     $pen->update($request->all());

//     return redirect()->route('pens.index')
//         ->with('success', 'Pen updated successfully');
// }

// public function destroy(Pen $pen)
// {
//     $pen->delete();

//     return redirect()->route('pens.index')
//         ->with('success', 'Pen deleted successfully');
// }
    
// }