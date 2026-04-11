<x-app-layout>
        <section class="p-4 flex-1 overflow-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Daily Records</h2>
            <!-- Daily Record Form -->
            <div class="bg-white p-6 rounded-2xl shadow mb-8">
                <form id="dailyRecordForm" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

                    <div>
                        <label class="block text-gray-700 mb-1">Pen / Batch</label>
                    <select name="pen_id" id="pen_id" class="w-full border border-gray-300 rounded-lg px-3 py-2"> 
                            @foreach($pens as $pen)
                                <option value="{{ $pen->id }}">{{ $pen->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Date</label>
                        <input type="date" name ="record_date" id="recordDate" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Crates Produced</label>
                        <input type="number" name = "crates_produced" id="cratesProduced"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Cracks</label>
                        <input type="number" name="cracks" id="cracks" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                            placeholder="0">
                    </div>


                    <div>
                        <label class="block text-gray-700 mb-1">Feed Consumed (Sacks)</label>
                        <input type="number" name ="feed_consumed" id="feedConsumed"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Cull</label>
                        <input type="number" name="cull" id="cull" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                            placeholder="0">
                    </div>


                    <div>
                        <label class="block text-gray-700 mb-1">Mortality</label>
                        <input type="number" name="mortality" id="mortality" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                            placeholder="0">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Water Consumed (ltr)</label>
                        <input type="number" name="water" id="water" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                            placeholder="0">
                    </div>

                    <div class="md:col-span-4">
                        <label class="block text-gray-700 mb-1">Note</label>
                        <input type="text" name="note" id="note" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                            placeholder="short note...">
                    </div>

                    <div class="md:col-span-4">
                        <button type="submit"
                            class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-full mt-3">Save
                            Record</button>
                    </div>

                </form>
            </div>

            <!-- Daily Records Table -->
            <div class="bg-white rounded-2xl shadow overflow-x-auto">
                <!-- <div class="bg-white p-4 rounded-2xl shadow mb-6 flex flex-col md:flex-row gap-4 items-end">

                    <div>
                        <label class="block text-gray-700 mb-1">From Date</label>
                        <input type="date" id="filterFromDate" class="border border-gray-300 rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">To Date</label>
                        <input type="date" id="filterToDate" class="border border-gray-300 rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <button id="filterBtn"
                            class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-full">
                            Filter
                        </button>

                        <button id="resetFilterBtn"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-full ml-2">
                            Reset
                        </button>
                    </div>

                </div> -->

<div class="mb-6 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
    <!-- justify-between pushes the two main groups apart -->
    <form action="{{ route('records.index') }}" method="GET" class="flex flex-wrap items-end justify-between gap-4">
        
        <!-- Left Group: Inputs -->
        <div class="flex flex-wrap gap-4 flex-1">
            <!-- Filter by Pen -->
            <div class="min-w-[200px]">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Pen / Batch</label>
                <select name="pen_id" class="w-full border border-yellow-500 rounded-lg px-4 py-2 text-sm">
                    <option value="">All Pens</option>
                    @foreach($pens as $pen)
                        <option value="{{ $pen->id }}" {{ request('pen_id') == $pen->id ? 'selected' : '' }}>
                            {{ $pen->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter by Date -->
            <div class="min-w-[200px]">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Date</label>
                <input type="date" name="date" value="{{ request('date') }}" 
                       class="w-full border border-yellow-500 rounded-lg px-4 py-2 text-sm">
            </div>
        </div>

        <!-- Right Group: Action Buttons -->
<!-- Right Group: Action Buttons -->
    <div class="flex gap-2">
        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition">
            Filter
        </button>
        
        <!-- New Export Buttons -->
        <!-- <button type="button" onclick="exportData('excel')" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
            Excel
        </button>
        <button type="button" onclick="exportData('pdf')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
            PDF
        </button>
 -->
        <a href="{{ route('records.index') }}" class="bg-gray-300 hover:bg-gray-200 text-gray-600 px-6 py-2 rounded-lg text-sm font-medium transition flex items-center justify-center">
            Clear
        </a>

                        <!-- Pagination -->


    </div>

    </form>
</div>

                
                <table class="min-w-full text-sm" id="recordTable">
                    <thead class="bg-yellow-50 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left">Pen</th>
                            <th class="px-6 py-3 text-left">Crates Produced</th>
                            <th class="px-6 py-3 text-left">Cracks</th>
                            <th class="px-6 py-3 text-left">Feed (Sacks)</th>
                            <th class="px-6 py-3 text-left">Cull</th>
                            <th class="px-6 py-3 text-left">Mortality</th>
                            <th class="px-6 py-3 text-left">Notes</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y" id="dailyRecordTableBody">
                        <!-- Example row -->
                         @foreach($records as $record)

                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-400">{{ $loop->iteration }}</td>
      
                            <td class="px-6 py-4">
                                @if(\Carbon\Carbon::parse($record->record_date)->isToday())
                                    <span class="text-blue-600 font-bold">Today</span>
                                @else
                                    {{ \Carbon\Carbon::parse($record->record_date)->format('M d, Y') }}
                                @endif
                            </td>
                            <!-- <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($record->record_date)->format('l, F jS, Y') }}
                            </td> -->
                            <td class="px-6 py-4 font-medium">{{ $record->pen->name }}</td>
                            <td class="px-6 py-4 text-green-600">{{ $record->eggs_collected }} </td>
                            <td class="px-6 py-4 text-red-600">{{ $record->cracks }}</td>
                            <td class="px-6 py-4">{{ $record->feed_given }}</td>
                            <td class="px-6 py-4 text-red-600">{{ $record->cull }}</td>
                            <td class="px-6 py-4 text-red-600">{{ $record->mortality }}</td>
                            <!-- <td class="px-6 py-4 text-yellow-600">{{ $record->notes }}</td> -->
                            <td class="px-6 py-4 text-yellow-600 text-sm" title="{{ $record->notes }}">
                                {{ Str::limit($record->notes, 25, '...') }}
                            </td>

                            <td class="px-6 py-4 flex gap-2">
                                <button
                                    onclick="viewRecord({{ $record->id }})"
                                    class="text-blue-600 hover:underline">
                                    View
                                </button>
                                <!-- <button class="text-blue-600 hover:underline view-btn">View</button> -->
                                <button onclick="openEditModal({{ $record->id }})" class="text-yellow-600 hover:underline edit-btn">Edit</button>
                                <button onclick="openDeleteModal({{ $record->id }})" class="text-red-600 hover:underline delete-btn">Delete</button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div id="recordPagination" class="flex justify-center py-4 gap-2 mt-4"></div>
            </div>
        </section>

            @include('records.partials.modals')




<script>

// Export data script
// function exportData(type) {
//     const form = document.querySelector('form[action="{{ route("records.index") }}"]');
//     const originalAction = form.action;

//     // Change action to the export route
//     form.action = "{{ route('records.export') }}";
    
//     // Add a hidden input to tell the controller the format
//     const formatInput = document.createElement('input');
//     formatInput.type = 'hidden';
//     formatInput.name = 'format';
//     formatInput.value = type;
//     form.appendChild(formatInput);

//     form.submit();

//     // Reset form for normal filtering after a short delay
//     setTimeout(() => {
//         form.action = originalAction;
//         formatInput.remove();
//     }, 500);
// }




document.getElementById('dailyRecordForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevents the data from staying in the search bar

    const form = this;
    const formData = new FormData(form);
    
    // Convert FormData to JSON object
    const data = Object.fromEntries(formData.entries());

    fetch("{{ route('records.store') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            // This catches validation errors (422)
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(result => {
        if (result.success) {
            showToast("Record saved successfully!");
            setTimeout(()=>{
                form.reset();
                location.reload();
            },100);

        }
    })
.catch(error => {
    console.error("Full Error Object:", error);
    // If Laravel returned a validation error (422)
    if (error.errors) {
        alert("Validation Error: " + JSON.stringify(error.errors));
    } else {
        // This will now show you the actual SQL or PHP error message
        alert("System Error: " + (error.message || "Check browser console"));
    }
});
});





// view modal 

function viewRecord(id) {
    fetch(`/records/${id}`)
    .then(res => {
        if (!res.ok) throw new Error('Record not found');
        return res.json();
    })
    .then(record => {
        // Map exactly to your database column names
        document.getElementById('viewRecordDate').innerText = record.record_date;
        
        // Use record.pen.name because we loaded the relationship in the controller
        document.getElementById('viewName').innerText = record.pen ? record.pen.name : 'N/A';
        
        document.getElementById('viewEggs').innerText = record.eggs_collected ?? '-';
        document.getElementById('viewFeed').innerText = record.feed_given ?? '-';
        document.getElementById('viewCracks').innerText = record.cracks ?? '-';
        document.getElementById('viewCull').innerText = record.cull ?? '-';
        if(record.mortality > 0){
            document.getElementById('viewMortality').classList.add('bg-red-100','text-red-600');
        }
        document.getElementById('viewMortality').innerText = record.mortality ?? '-';
        document.getElementById('viewWater').innerText = record.water ?? '-';

        
        // Note: Check if your table has a 'water' column
        // const waterEl = document.getElementById('viewWater');
        // if(waterEl) waterEl.innerText = record.water ?? '-';

        document.getElementById('viewNotes').innerText = record.notes ?? '-';

        // Show the modal
        const modal = document.getElementById('viewRecordModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    })
    .catch(err => {
        console.error(err);
        alert("Could not load record details.");
    });
}

function closeViewModal() {
    const modal = document.getElementById('viewRecordModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}




function openDeleteModal(id) {
    document.getElementById('deleteRecordId').value = id;
    document.getElementById('deleteRecordId').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteRecordId').classList.add('hidden');
}

// 


function deleteRecord() {

    let id = document.getElementById('deleteRecordId').value;

    fetch(`/records/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            "Content-Type": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {

        closeDeleteModal();

        // showAlert("Pen deleted successfully", "red");
        showToast("Record deleted successfully", "red")

        setTimeout(()=>{
        location.reload()
        },1500)

        // Remove row from table
        document.getElementById("record-row-" + id).remove();

    })
    .catch(error => {
        console.error(error);
    });

}


const table = document.getElementById("recordTable");
const rows = Array.from(table.querySelectorAll("tbody tr"));

const paginationContainer = document.getElementById("recordPagination");

let currentPage = 1;
const rowsPerPage = 10;

// No filter (since Laravel already filters via form)
function filterRows() {
    return rows;
}

// function renderTable() {
//     const filtered = filterRows();

//     rows.forEach(row => row.style.display = "none");

//     const start = (currentPage - 1) * rowsPerPage;
//     const paginatedRows = filtered.slice(start, start + rowsPerPage);

//     paginatedRows.forEach(row => row.style.display = "");

//     renderPagination(filtered.length);
// }

// function renderPagination(totalRows) {
//     paginationContainer.innerHTML = "";
//     const totalPages = Math.ceil(totalRows / rowsPerPage);

//     if (totalPages <= 1) return; // no pagination needed

//     // Prev
//     const prev = document.createElement("button");
//     prev.innerText = "Prev";
//     prev.className = "px-3 py-1 rounded bg-gray-200";
//     prev.disabled = currentPage === 1;

//     prev.onclick = () => {
//         currentPage--;
//         renderTable();
//     };

//     paginationContainer.appendChild(prev);

//     // Numbers
//     for (let i = 1; i <= totalPages; i++) {
//         const btn = document.createElement("button");
//         btn.innerText = i;

//         btn.className = `px-3 py-1 rounded ${
//             i === currentPage
//                 ? "bg-yellow-600 text-white"
//                 : "bg-gray-200"
//         }`;

//         btn.onclick = () => {
//             currentPage = i;
//             renderTable();
//         };

//         paginationContainer.appendChild(btn);
//     }

//     // Next
//     const next = document.createElement("button");
//     next.innerText = "Next";
//     next.className = "px-3 py-1 rounded bg-gray-200";
//     next.disabled = currentPage === totalPages;

//     next.onclick = () => {
//         currentPage++;
//         renderTable();
//     };

//     paginationContainer.appendChild(next);
// }



// Initialize
// renderTable();

function renderTable() {
    const filtered = filterRows();

    rows.forEach(row => row.style.display = "none");

    const start = (currentPage - 1) * rowsPerPage;
    const paginatedRows = filtered.slice(start, start + rowsPerPage);

    paginatedRows.forEach(row => row.style.display = "");

    renderPagination(filtered.length);
}

function renderPagination(totalRows) {
    paginationContainer.innerHTML = "";

    const totalPages = Math.ceil(totalRows / rowsPerPage);

    if (totalPages <= 1) return; // no pagination needed

    // 🔹 PREV BUTTON
    const prev = document.createElement("button");
    prev.innerText = "Prev";
    prev.className = "px-3 py-1 rounded bg-gray-200";
    prev.disabled = currentPage === 1;

    prev.onclick = () => {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
        }
    };

    paginationContainer.appendChild(prev);


    // 🔹 LIMIT TO MAX 5 PAGE NUMBERS
    let startPage = Math.max(currentPage - 2, 1);
    let endPage = Math.min(startPage + 4, totalPages);

    // Adjust if less than 5 visible
    if (endPage - startPage < 4) {
        startPage = Math.max(endPage - 4, 1);
    }

    // 🔹 PAGE NUMBERS
    for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement("button");
        btn.innerText = i;

        btn.className = `px-3 py-1 rounded ${
            i === currentPage
                ? "bg-yellow-600 text-white"
                : "bg-gray-200"
        }`;

        btn.onclick = () => {
            currentPage = i;
            renderTable();
        };

        paginationContainer.appendChild(btn);
    }


    // 🔹 NEXT BUTTON
    const next = document.createElement("button");
    next.innerText = "Next";
    next.className = "px-3 py-1 rounded bg-gray-200";
    next.disabled = currentPage === totalPages;

    next.onclick = () => {
        if (currentPage < totalPages) {
            currentPage++;
            renderTable();
        }
    };

    paginationContainer.appendChild(next);
}

// Initialize
renderTable();

</script>

</x-app-layout>
