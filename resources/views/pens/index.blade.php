<x-app-layout>
    <!-- Page Header -->
    <section class="flex-1 p-4 bg-gray-50 min-h-screen">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Pen / Batch Management</h1>
            <button onclick="openPenModal()"
                class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 transition">
                + Add New Pen
            </button>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-5 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Total Active Pens</p>
                <h2 class="text-xl font-bold text-yellow-600">4</h2>
            </div>
            <div class="bg-white p-5 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Total Birds Alive</p>
                <h2 class="text-xl font-bold text-yellow-600">3,150</h2>
            </div>
            <div class="bg-white p-5 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Total Farm Production</p>
                <h2 class="text-xl font-bold text-yellow-600">1,240 Crates</h2>
            </div>
        </div>

        

        <!-- Pen Table -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-yellow-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Pen</th>
                        <th class="px-6 py-3 text-left">Capacity</th>
                        <th class="px-6 py-3 text-left">Birds Count</th>
                        <th class="px-6 py-3 text-left">Bird Type</th>
                        <th class="px-6 py-3 text-left">Starting Date</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
<tbody class="divide-y">

@foreach($pens as $pen)

<tr id="pen-row-{{ $pen->id }} class="hover:bg-gray-50">
<td class="px-6 py-4 font-medium text-gray-400">{{ $loop->iteration }}</td>
<td class="px-6 py-4 font-medium">
    {{ $pen->name }}
</td>
<td class="px-6 py-4">
    {{ $pen->capacity }}
</td>

<td class="px-6 py-4">
    {{ $pen->initial_birds }}
</td>

<td class="px-6 py-4 text-red-600">
    {{ $pen->type }}
</td>

<td class="px-6 py-4 text-green-600">
 {{ $pen->start_date }}</td>


<!-- <td class="px-6 py-4">
    <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">
        {{ $pen->status }}
    </span>
</td> -->
<td class="px-6 py-4">

@if($pen->status == 'Active')
<span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">
Active
</span>

@elseif($pen->status == 'Maintenance')
<span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">
Maintenance
</span>

@else
<span class="px-2 py-1 text-xs bg-gray-200 text-gray-600 rounded-full">
Empty
</span>
@endif

</td>

<td class="px-6 py-4 flex gap-2">

<!-- <button
class="text-blue-600 hover:underline view-btn"
data-id="{{ $pen->id }}">
View
</button> -->

<button
    onclick="viewPen({{ $pen->id }})"
    class="text-blue-600 hover:underline">
    View
</button>

<!-- <button
class="text-yellow-600 hover:underline edit-btn"
data-id="{{ $pen->id }}">
Edit
</button> -->
<button onclick="editPen({{ $pen->id }})"
class="text-yellow-600 hover:underline">
Editing
</button>

<!-- <button
class="text-red-600 hover:underline delete-btn"
data-id="{{ $pen->id }}">
Delete
</button> -->

<button onclick="openDeleteModal({{ $pen->id }})"
    class="text-red-600 hover:text-red-800">
    Delete
</button>

</td>

</tr>

@endforeach

</tbody>            </table>
        </div>
    </section>

    <!-- Modals -->
    @include('pens.partials.modals')

    <!-- Scripts -->
    <script>
        // Pen modal functions
        function openPenModal() {
            document.getElementById('penModal').classList.remove('hidden');
        }

        function closePenModal() {
            document.getElementById('penModal').classList.add('hidden');
        }


        function savePen() {

    const data = {
        penName: document.getElementById('penName').value,
        birdType: document.getElementById('birdType').value,
        capacity: document.getElementById('capacity').value,
        birdCount: document.getElementById('birdCount').value,
        startDate: document.getElementById('startDate').value,
        status: document.getElementById('status').value,
        note: document.getElementById('note').value
    };

    fetch("{{ route('pens.store') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {

        if(data.success){

            closePenModal();

            // alert("Pen saved successfully");

            // location.reload();
            showToast("Pen created successfully");

setTimeout(()=>{
    location.reload();
},1500);

        }

    })
    .catch(error => {
        console.error("Error:", error);
    });
}


function viewPen(id){

fetch(`/pens/${id}`)

.then(res => res.json())

.then(pen => {

document.getElementById('viewName').innerText = pen.name
document.getElementById('viewType').innerText = pen.type
document.getElementById('viewCapacity').innerText = pen.capacity ?? '-'
document.getElementById('viewBirds').innerText = pen.initial_birds
document.getElementById('viewStartDate').innerText = pen.start_date
document.getElementById('viewNotes').innerText = pen.notes ?? '-'

let statusEl = document.getElementById('viewStatus')
statusEl.innerText = pen.status ?? 'Active'

if(pen.status === 'Active'){
statusEl.className = "bg-green-100 text-green-600 px-2 py-1 rounded"
}
else if(pen.status === 'Maintenance'){
statusEl.className = "bg-yellow-100 text-yellow-700 px-2 py-1 rounded"
}
else{
statusEl.className = "bg-gray-200 text-gray-700 px-2 py-1 rounded"
}

document.getElementById('viewPenModal').classList.remove('hidden')
document.getElementById('viewPenModal').classList.add('flex')

})

}

function closeViewModal(){

document.getElementById('viewPenModal').classList.add('hidden')

}

</script>
</x-app-layout>