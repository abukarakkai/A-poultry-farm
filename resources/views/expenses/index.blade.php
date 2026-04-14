<x-app-layout>


    <section class="p-0 flex-1 overflow-auto">
        <div class="flex justify-between py-4 px-3 items-center mb-6 rounded-2xl bg-white shadow">
            <h2 class="text-2xl font-bold mb-6">Farm Expenses</h2>

            <!-- Daily Record Form -->
            <button onclick="openExpenseModal()"
                class="flex items-center gap-1 sm:gap-2 bg-yellow-600 text-white px-2 py-2 text-xs sm:px-4 sm:py-2 sm:text-base rounded-md hover:bg-yellow-700 transition">
                <span>+</span>
                <span class="hidden sm:inline">Add Expense</span>
                <span class="sm:hidden">Add Expense</span>
            </button>

        </div>


<div id="addExpenseModal" class="fixed inset-0 bg-black/60 hidden z-50 flex items-center justify-center p-3 sm:p-6">
    
    <!-- Modal Container -->
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[95vh] flex flex-col overflow-hidden">
        
        <!-- Header -->
        <div class="px-6 py-4 border-b flex justify-between items-center bg-white sticky top-0 z-10">
            <h2 class="text-xl font-bold text-gray-800">Add New Expense</h2>
            <button onclick="document.getElementById('addExpenseModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>

        <!-- Form Body -->
        <div class="p-4 sm:p-6 overflow-y-auto">
            <!-- Grid: 2 columns on mobile, 3 on desktop -->
            <form id="expenseForm" class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">

                <!-- Title -->
                <div class="col-span-2 md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" id="expenseTitle"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 outline-none" placeholder="e.g. Starter Feed">
                </div>

                <!-- Date -->
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="date" id="expenseDate"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 outline-none">
                </div>

                <!-- Category -->
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="category" id="expenseCategory"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 outline-none">
                        <option value="Feed">Feed</option>
                        <option value="Medication">Medication</option>
                        <option value="Staff Salary">Staff Salary</option>
                        <option value="Transport">Transport</option>
                        <option value="Utilities">Utilities</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Unit Price -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price (₦)</label>
                    <input type="number" name="unit_price" id="unitPrice" step="0.01"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                </div>

                <!-- Quantity -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Qty</label>
                    <input type="number" name="quantity" id="quantity"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                </div>

                <!-- Amount (Auto) -->
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1 font-bold text-red-600">Total (₦)</label>
                    <input type="number" name="amount" id="expenseAmount" readonly
                        class="w-full bg-red-50 border border-red-200 text-red-700 font-bold rounded-lg px-3 py-2" placeholder="0">
                </div>

                <!-- Payment Method -->
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                    <select name="paymentMethod" id="paymentMethod"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                        <option value="Credit">Credit</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="col-span-2 md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <input type="text" name="description" id="expenseDescription"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Extra details...">
                </div>

                <!-- Actions -->
                <div class="col-span-2 md:col-span-3 pt-4 border-t mt-2">
                    <div class="flex flex-col sm:flex-row justify-end gap-3">
                        <button type="button" onclick="document.getElementById('addExpenseModal').classList.add('hidden')"
                            class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 order-2 sm:order-1">
                            Cancel
                        </button>
                        <button type="submit" 
                            class="px-6 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold shadow-md transition-all active:scale-95 order-1 sm:order-2">
                            Save Expense
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

            <div class="bg-white rounded-2xl shadow border border-gray-100 overflow-hidden">
                <!-- Filter Bar: Optimized for wrapping on small screens -->
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3 p-3 sm:p-4 border-b">
                    
                    <div class="flex flex-wrap items-center gap-2">
                        <!-- Category Filter -->
                        <select id="categoryFilter"
                            class="border border-yellow-300 rounded-lg px-2 py-2 text-[11px] sm:text-sm font-medium focus:ring-2 focus:ring-yellow-400 outline-none transition">
                            <option value="">All Categories</option>
                            <option>Feed</option>
                            <option>Medication</option>
                            <option>Staff Salary</option>
                            <option>Transport</option>
                            <option>Utilities</option>
                            <option>Maintenance</option>
                            <option>Other</option>
                        </select>

                        <!-- Date Filter -->
                        <input type="date" id="dateFilter"
                            class="border border-yellow-500 rounded-lg px-2 py-2 text-[11px] sm:text-sm font-medium focus:ring-2 focus:ring-yellow-400 outline-none transition">
                    </div>

                    <!-- Search Bar -->
                    <div class="w-full lg:w-64">
                        <input type="text" id="expenseSearch" placeholder="Search expenses..."
                            class="border border-yellow-500 rounded-lg px-4 py-2 w-full text-[11px] sm:text-sm font-medium focus:ring-2 focus:ring-yellow-400 outline-none transition">
                    </div>
                </div>

                <!-- Table Container -->
                <div class="max-h-96 overflow-y-auto overflow-x-auto">
                    <table class="w-full table-auto text-[11px] sm:text-sm" id="expensesTable">
                        <thead class="bg-yellow-50 sticky top-0 z-10 text-gray-500 uppercase text-[9px] sm:text-xs border-b">
                            <tr>
                                <th class="px-2 py-4 sm:py-6 sm:px-4 text-left w-6">#</th>
                                <th class="px-2 py-4 sm:py-6 sm:px-4 text-left whitespace-nowrap">Date</th>
                                <th class="px-2 py-4 sm:py-6 sm:px-4 text-left">Title</th>
                                <th class="px-2 py-4 sm:py-6 sm:px-4 text-left">Amount</th>
                                <th class="px-2 py-4 sm:py-6 sm:px-4 text-left hidden sm:table-cell">Category</th>
                                <th class="px-2 py-4 sm:py-6 sm:px-4 text-left hidden md:table-cell">Description</th>
                                <th class="px-2 py-4 sm:py-6 sm:px-4 text-left hidden lg:table-cell">Method</th>
                                <th class="px-2 py-4 sm:py-6 sm:px-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($expenses as $expense)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-400 font-medium">{{ $loop->iteration }}</td>
                                
                                <td class="px-2 py-4 sm:px-4 sm:py-6 whitespace-nowrap text-gray-600">
                                    {{ \Carbon\Carbon::parse($expense->date)->format('M d, y') }}
                                </td>

                                <td class="px-2 py-4 sm:px-4 sm:py-6 font-bold text-gray-800">
                                    <div class="truncate max-w-[100px] sm:max-w-none" title="{{ $expense->title }}">
                                        {{ $expense->title }}
                                    </div>
                                </td>

                                <td class="px-2 py-4 sm:px-4 sm:py-6 text-red-600 font-bold">
                                    ₦{{ number_format($expense->amount) }}
                                </td>

                                <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-600 hidden sm:table-cell">{{ $expense->category }}</td>
                                
                                <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-500 italic hidden md:table-cell">
                                    <div class="truncate max-w-[150px]">{{ $expense->description }}</div>
                                </td>

                                <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-600 hidden lg:table-cell">{{ $expense->paymentMethod }}</td>

                                <td class="px-2 py-4 sm:px-4 sm:py-6 text-right">
                                    <div class="flex justify-end gap-2 sm:gap-3">
                                        <button onclick="openExpenseModal({{ $expense->id }})" class="text-blue-600 font-bold hover:underline">View</button>
                                        <button onclick="editExpenseModal({{ $expense->id }})" class="text-yellow-600 font-bold hover:underline sm:inline">Edit</button>
                                        <button onclick="openDeleteModal({{ $expense->id }})" class="text-red-600 hover:underline">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            <tr id="noResults" class="hidden">
                                <td colspan="8" class="text-center py-10 text-gray-400 italic">No expenses found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div id="expensePagination" class="py-4 border-t border-gray-50 text-center"></div>
            </div>


    </section>

    @include('expenses.partials.modals')


    <script>

        function openExpenseModal() {
            document.getElementById('addExpenseModal').classList.remove('hidden');
        }

        function closeExpenseModal() {
            document.getElementById('addSaleModal').classList.add('hidden');
        }



        const unitPrice = document.getElementById('unitPrice');
        const quantity = document.getElementById('quantity');
        const amount = document.getElementById('expenseAmount');

        function calculateAmount() {
            const price = parseFloat(unitPrice.value) || 0;
            const qty = parseFloat(quantity.value) || 0;

            amount.value = (price * qty).toFixed(2);
        }

        unitPrice.addEventListener('input', calculateAmount);
        quantity.addEventListener('input', calculateAmount);


        document.getElementById('expenseForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevents the data from staying in the search bar

            const form = this;
            const formData = new FormData(form);

            // Convert FormData to JSON object
            const data = Object.fromEntries(formData.entries());

            fetch("{{route('expenses.store') }}", {
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
                        showToast("Expenses saved successfully!");
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


        const rows = Array.from(document.querySelectorAll("#expensesTable tbody tr"));
        const searchInput = document.getElementById("expenseSearch");
        const categoryFilter = document.getElementById("categoryFilter");
        const dateFilter = document.getElementById("dateFilter");
        const paginationContainer = document.getElementById("expensePagination");

        let currentPage = 1;
        const rowsPerPage = 10;

        function filterRows() {
            const search = searchInput.value.toLowerCase();
            const category = categoryFilter.value.toLowerCase();
            const date = dateFilter.value;

            return rows.filter(row => {
                const text = row.innerText.toLowerCase();
                const rowCategory = row.children[3]?.innerText.toLowerCase();
                const rowDate = row.children[1]?.innerText;

                return (
                    text.includes(search) &&
                    (!category || rowCategory.includes(category)) &&
                    (!date || rowDate.includes(new Date(date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })))
                );
            });
        }

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

            // 🔹 PREV BUTTON
            const prevBtn = document.createElement("button");
            prevBtn.innerText = "Prev";
            prevBtn.className = "px-3 py-1 rounded bg-gray-200";

            if (currentPage === 1) {
                prevBtn.disabled = true;
                prevBtn.style.opacity = "0.5";
            } else {
                prevBtn.onclick = () => {
                    currentPage--;
                    renderTable();
                };
            }

            paginationContainer.appendChild(prevBtn);


            // 🔹 PAGE NUMBER LOGIC (MAX 5)
            let startPage = Math.max(currentPage - 2, 1);
            let endPage = Math.min(startPage + 4, totalPages);

            // Adjust if less than 5 pages shown
            if (endPage - startPage < 4) {
                startPage = Math.max(endPage - 4, 1);
            }

            for (let i = startPage; i <= endPage; i++) {
                const btn = document.createElement("button");
                btn.innerText = i;

                btn.className = `px-3 py-1 rounded ${i === currentPage
                        ? 'bg-yellow-600 text-white'
                        : 'bg-gray-200'
                    }`;

                btn.onclick = () => {
                    currentPage = i;
                    renderTable();
                };

                paginationContainer.appendChild(btn);
            }


            // 🔹 NEXT BUTTON
            const nextBtn = document.createElement("button");
            nextBtn.innerText = "Next";
            nextBtn.className = "px-3 py-1 rounded bg-gray-200";

            if (currentPage === totalPages) {
                nextBtn.disabled = true;
                nextBtn.style.opacity = "0.5";
            } else {
                nextBtn.onclick = () => {
                    currentPage++;
                    renderTable();
                };
            }

            paginationContainer.appendChild(nextBtn);
        }

        // Event listeners
        searchInput.addEventListener("input", () => {
            currentPage = 1;
            renderTable();
        });

        categoryFilter.addEventListener("change", () => {
            currentPage = 1;
            renderTable();
        });

        dateFilter.addEventListener("change", () => {
            currentPage = 1;
            renderTable();
        });

        // Initial load
        renderTable();


        document.getElementById("noResults").style.display =
            filtered.length === 0 ? "" : "none";



    </script>
</x-app-layout>