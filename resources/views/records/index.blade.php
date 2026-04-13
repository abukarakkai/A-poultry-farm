<x-app-layout>
    <section class="py-4 flex-1 overflow-auto">

            <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Daily Records</h2>
        <!-- Daily Record Form -->
            <button onclick="openRecordModal()"
                class="flex items-center gap-1 sm:gap-2 bg-yellow-600 text-white px-2 py-2 text-xs sm:px-4 sm:py-2 sm:text-base rounded-md hover:bg-yellow-700 transition">
                <span>+</span>
                <span class="hidden sm:inline">Add Record</span>
                <span class="sm:hidden">Add Record</span>
            </button>

            </div>

            <!-- <div id="addRecordModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

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
                            <input type="date" name="record_date" id="recordDate"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-gray-700 mb-1">Crates Produced</label>
                            <input type="number" name="crates_produced" id="cratesProduced"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-1">Cracks</label>
                            <input type="number" name="cracks" id="cracks"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>


                        <div>
                            <label class="block text-gray-700 mb-1">Feed Consumed (Sacks)</label>
                            <input type="number" name="feed_consumed" id="feedConsumed"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-1">Cull</label>
                            <input type="number" name="cull" id="cull"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>


                        <div>
                            <label class="block text-gray-700 mb-1">Mortality</label>
                            <input type="number" name="mortality" id="mortality"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-1">Water Consumed (ltr)</label>
                            <input type="number" name="water" id="water"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
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
            </div> -->
        <div id="addRecordModal" class="fixed inset-0 bg-black/60 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

            <!-- Added w-full and max-w-4xl to prevent the modal from being too wide or too narrow -->
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl max-h-[95vh] overflow-y-auto">
                
                <!-- Header with Close Button (Optional but recommended) -->
                <div class="px-6 py-4 border-b flex justify-between items-center sticky top-0 bg-white z-10">
                    <h2 class="text-xl font-bold text-gray-800">Add Daily Record</h2>
                    <button onclick="document.getElementById('addRecordModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">&times;</button>
                </div>

                <div class="p-6">
                    <!-- Adjusted grid: 2 columns on mobile/small, 4 on medium and up -->
                    <form id="dailyRecordForm" class="grid grid-cols-2 md:grid-cols-4 gap-x-3 gap-y-4 items-start">

                        <div class="col-span-2 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pen / Batch</label>
                            <select name="pen_id" id="pen_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                                @foreach($pens as $pen)
                                <option value="{{ $pen->id }}">{{ $pen->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                            <input type="date" name="record_date" id="recordDate"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                        </div>

                        <!-- Number inputs grouped visually -->
                        <div class="col-span-1">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Crates</label>
                            <input type="number" name="crates_produced" id="cratesProduced"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Cracks</label>
                            <input type="number" name="cracks" id="cracks"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>

                        <div class="col-span-1">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Feed (Sacks)</label>
                            <input type="number" name="feed_consumed" id="feedConsumed"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>

                        <div class="col-span-1">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Cull</label>
                            <input type="number" name="cull" id="cull"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>

                        <div class="col-span-1">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Mortality</label>
                            <input type="number" name="mortality" id="mortality"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>

                        <div class="col-span-1">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Water (ltr)</label>
                            <input type="number" name="water" id="water"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                        </div>

                        <div class="col-span-2 md:col-span-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Note</label>
                            <input type="text" name="note" id="note" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="short note...">
                        </div>

                        <div class="col-span-2 md:col-span-4 pt-2">
                            <button type="submit"
                                class="w-full md:w-auto bg-yellow-600 hover:bg-yellow-700 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-md active:scale-95">
                                Save Daily Record
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="bg-white rounded-lg shadow">

            <!-- FILTER -->
                <!-- your filter stays unchanged -->
            <div class="mb-4 sm:mb-6 bg-white p-4 sticky top-0 z-20">
                        <form action="{{ route('records.index') }}" method="GET"
                            class="flex items-end justify-between gap-3 overflow-x-hidden">

                            <div class="flex gap-3 flex-nowrap min-w-max">

                                <!-- Pen -->
                                <div class="min-w-[80px]">
                                    <label class="block text-[10px] font-semibold text-gray-500 uppercase mb-1">Pen</label>
                                    <select name="pen_id"
                                        class="w-full border border-yellow-500 rounded-lg px-3 py-1.5 text-xs">
                                        <option value="">All</option>
                                        @foreach($pens as $pen)
                                            <option value="{{ $pen->id }}" {{ request('pen_id')==$pen->id ? 'selected' : '' }}>
                                                {{ $pen->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Date -->
                                <div class="min-w-[80px]">
                                    <label class="block text-[10px] font-semibold text-gray-500 uppercase mb-1">Date</label>
                                    <input type="date" name="date" value="{{ request('date') }}"
                                        class="w-full border border-yellow-500 rounded-lg px-3 py-1.5 text-xs">
                                </div>

                            </div>

                            <!-- Buttons -->
                            <div class="flex gap-2 flex-shrink-0">
                                <button type="submit"
                                    class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition whitespace-nowrap">
                                    Filter
                                </button>

                                <a href="{{ route('records.index') }}"
                                    class="bg-gray-300 hover:bg-gray-200 text-gray-600 px-3 py-1.5 rounded-lg text-xs font-medium transition whitespace-nowrap">
                                    Clear
                                </a>
                            </div>

                        </form>
            </div>

            <!-- TABLE -->
                <div class="overflow-x-auto border  border-gray-200">
                    <!-- Reduced min-width and used table-auto to let columns hug the content -->
                    <table class="w-full table-auto text-[10px] sm:text-sm" id="recordTable">

                        <!-- HEADER: Tightened padding from px-4 to px-1.5/px-2 -->
                        <thead class="bg-yellow-50 text-gray-500 uppercase text-[8px] sm:text-xs sticky top-0 z-10 border-b">
                            <tr>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left w-6">#</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left">Date</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left">Pen</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left">Crates</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left hidden sm:table-cell">Cracks</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left">Feed</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left hidden md:table-cell">Cull</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left">Mort.</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-left hidden lg:table-cell">Notes</th>
                                <th class="px-1.5 py-4 sm:px-3 sm:py-6 text-center">Actions</th>
                            </tr>
                        </thead>

                        <!-- BODY -->
                        <tbody class="divide-y divide-gray-100 px-1 bg-white">
                            @foreach($records as $record)
                            <tr class="hover:bg-gray-50 transition-colors">

                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 text-gray-400">
                                    {{ $loop->iteration }}
                                </td>

                                <!-- whitespace-nowrap keeps the date on one line -->
                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 whitespace-nowrap font-medium">
                                    @if(\Carbon\Carbon::parse($record->record_date)->isToday())
                                        <span class="text-blue-600 font-bold">Today</span>
                                    @else
                                        {{ \Carbon\Carbon::parse($record->record_date)->format('M d') }}
                                    @endif
                                </td>

                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 font-medium text-gray-800">
                                    {{ $record->pen->name }}
                                </td>

                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 text-green-600 font-semibold">
                                    {{ $record->eggs_collected }}
                                </td>

                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 text-red-500 hidden sm:table-cell">
                                    {{ $record->cracks }}
                                </td>

                                <td class="px-1.5 py-4 sm:px-3 sm:py-6">
                                    {{ $record->feed_given }}
                                </td>

                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 text-red-600 hidden md:table-cell">
                                    {{ $record->cull }}
                                </td>

                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 text-red-600 font-medium">
                                    {{ $record->mortality }}
                                </td>

                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 text-gray-500 hidden lg:table-cell truncate max-w-[100px]"
                                    title="{{ $record->notes }}">
                                    {{ Str::limit($record->notes, 20) }}
                                </td>

                                <!-- Actions: Right aligned to push data closer together -->
                                <td class="px-1.5 py-4 sm:px-3 sm:py-6 text-right">
                                    <div class="flex justify-end gap-2 sm:gap-3">
                                        <button  onclick="viewRecord({{ $record->id }})" class="font-semibold  hover:underline text-blue-600 text-[10px] sm:text-sm">View</button>
                                        <button onclick="openEditModal({{ $record->id }})"  class="font-semibold  hover:underline text-yellow-600 text-[10px] sm:text-sm">Edit</button>
                                        <button onclick="openDeleteModal({{ $record->id }})" class="font-semibold  hover:underline text-red-600 text-[10px] sm:text-sm">Delete</button>
                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            <!-- PAGINATION -->
            <div class="sticky bottom-0 bg-white py-4 sm:py-4 flex justify-center gap-2 border-t z-20 text-xs sm:text-sm">
                <div id="recordPagination"></div>
            </div>

        </div>

    </section>

    @include('records.partials.modals')


        <!-- Daily Records Table -->
    <script>

        function openRecordModal() {
            document.getElementById('addRecordModal').classList.remove('hidden');
        }

        function closeRecordModal() {
            document.getElementById('addRecordModal').classList.add('hidden');
        }


        document.getElementById('dailyRecordForm').addEventListener('submit', function (e) {
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
                        setTimeout(() => {
                            form.reset();
                            location.reload();
                        }, 100);

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
                    if (record.mortality > 0) {
                        document.getElementById('viewMortality').classList.add('bg-red-100', 'text-red-600');
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

                    setTimeout(() => {
                        location.reload()
                    }, 1500)

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

                btn.className = `px-3 py-1 rounded ${i === currentPage
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
