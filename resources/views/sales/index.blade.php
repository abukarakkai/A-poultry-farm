<x-app-layout>
    <!-- DASHBOARD CONTENT -->

    <section class="py-4 flex-1 overflow-auto">

        <div class="flex justify-between py-4 px-3 items-center mb-6 rounded-2xl bg-white shadow">
            <h2 class="text-2xl font-bold mb-6">Create Sell Order</h2>

            <!-- Daily Record Form -->
            <button onclick="openSaleModal()"
                class="flex items-center gap-1 sm:gap-2 bg-yellow-600 text-white px-2 py-2 text-xs sm:px-4 sm:py-2 sm:text-base rounded-md hover:bg-yellow-700 transition">
                <span>+</span>
                <span class="hidden sm:inline">Add Order</span>
                <span class="sm:hidden">Add Order</span>
            </button>

        </div>



            <div id="addSaleModal" class="fixed inset-0 bg-black/60 hidden z-50 flex items-center justify-center p-3 sm:p-6">
                
                <!-- Modal Container: Added w-full, max-w, and max-height for mobile safety -->
                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[95vh] overflow-hidden flex flex-col">
                    
                    <!-- Header: Sticky to remain visible while scrolling form -->
                    <div class="px-6 py-4 border-b flex justify-between items-center bg-white sticky top-0 z-10">
                        <h2 class="text-xl font-bold text-gray-800">Add Sale Order</h2>
                        <button onclick="document.getElementById('addSaleModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                    </div>

                    <!-- Form Body: Scrollable area -->
                    <div class="p-4 sm:p-6 overflow-y-auto">
                        <!-- Grid: 2 cols on mobile, 3 cols on md+ -->
                        <form id="sellOrderForm" class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">

                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                <input type="date" name="date" id="sellDate"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none" required>
                            </div>

                            <div class="col-span-2 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Customer Name</label>
                                <input type="text" name="customer_name" id="customerName"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none" placeholder="Enter customer name" required>
                            </div>

                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Income Type</label>
                                <select name="income_type" id="incomeType"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none" required>
                                    <option value="">Select Type</option>
                                    <option value="Egg">Egg</option>
                                    <option value="Manure">Manure</option>
                                    <option value="Sack">Empty Sack</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="col-span-1 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Qty Sold</label>
                                <input type="number" name="quantity" id="cratesSold"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0" required>
                            </div>

                            <div class="col-span-1 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Price/Unit</label>
                                <input type="number" name="price" id="pricePerCrate"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0" required>
                            </div>

                            <div class="col-span-1 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Total Amount</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-2 text-gray-500">₦</span>
                                    <input type="number" name="total_amount" id="totalAmount"
                                        class="w-full border border-gray-300 rounded-lg pl-7 pr-3 py-2 bg-gray-50 font-bold text-green-700" readonly>
                                </div>
                            </div>

                            <div class="col-span-1 md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select name="payment_status" id="paymentStatus"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 font-semibold" required>
                                    <option value="Paid" class="text-green-600">Paid</option>
                                    <option value="Pending" class="text-yellow-600">Pending</option>
                                </select>
                            </div>

                            <div class="col-span-2 md:col-span-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Note (Optional)</label>
                                <textarea name="note" id="sellNote" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                    rows="2" placeholder="Extra details..."></textarea>
                            </div>

                            <div class="col-span-2 md:col-span-3 pt-4 border-t mt-2">
                                <div class="flex flex-col sm:flex-row justify-end gap-3">
                                    <button type="button" onclick="document.getElementById('addSaleModal').classList.add('hidden')"
                                        class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 order-2 sm:order-1">
                                        Cancel
                                    </button>
                                    <button type="submit" 
                                        class="px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-bold shadow-md transition-all active:scale-95 order-1 sm:order-2">
                                        Save Sell Order
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>



        <!-- <div class="bg-white rounded-2xl shadow overflow-hidden"> -->


        <div class="bg-white rounded-lg shadow border border-gray-100">
            <!-- Filter Bar: Stacks on mobile, inline on desktop -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3 p-3 sm:p-4 border-b">
                
                <div class="flex flex-wrap items-center gap-2">
                    <!-- Category Filter -->
                    <select id="catFilter"
                        class="border border-yellow-300 rounded-lg px-2 py-2 text-xs sm:text-sm font-medium focus:ring-2 focus:ring-yellow-400 outline-none transition">
                        <option value="">All Categories</option>
                        <option>Egg</option>
                        <option>Manure</option>
                        <option>Empty Sack</option>
                        <option>Other</option>
                    </select>

                    <!-- Date Filter -->
                    <input type="date" id="filterDate"
                        class="border border-yellow-500 rounded-lg px-2 py-2 text-xs sm:text-sm font-medium focus:ring-2 focus:ring-yellow-400 outline-none transition">
                </div>

                <!-- Search Bar -->
                <div class="w-full lg:w-64">
                    <input type="text" id="saleSearch" placeholder="Search sale orders..."
                        class="border border-yellow-500 rounded-lg px-4 py-2 w-full text-xs sm:text-sm font-medium focus:ring-2 focus:ring-yellow-400 outline-none transition">
                </div>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-[11px] sm:text-sm" id="saleTable">
                    <thead class="bg-yellow-50 text-gray-500 uppercase text-[9px] sm:text-xs border-b">
                        <tr>
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-left w-6">#</th>
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-left whitespace-nowrap">Date</th>
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-left">Customer</th>
                            <!-- Hidden on smal4 screens sm:py-6 -->
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-left hidden md:table-cell">Desc.</th>
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-left hidden sm:table-cell">Qty</th>
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-left hidden lg:table-cell">Price</th>
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-left">Total</th>
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-left">Status</th>
                            <th class="px-2 py-4 sm:px-4 sm:py-6 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach($sales as $sale)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-400 font-medium">{{ $loop->iteration }}</td>
                            
                            <td class="px-2 py-4 sm:px-4 sm:py-6 whitespace-nowrap font-medium text-gray-700">
                                {{ \Carbon\Carbon::parse($sale->date)->format('M d, y') }}
                            </td>
                            
                            <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-800 font-medium">
                                <div class="truncate max-w-[80px] sm:max-w-[150px]" title="{{ $sale->customer_name }}">
                                    {{ $sale->customer_name }}
                                </div>
                            </td>

                            <!-- Description hidden on mobile -->
                            <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-600 hidden md:table-cell">
                                {{ $sale->income_type }}
                            </td>

                            <!-- Quantity hidden on mobile -->
                            <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-700 hidden sm:table-cell">
                                {{ $sale->quantity }}
                            </td>

                            <!-- Unit Price hidden until large screens -->
                            <td class="px-2 py-4 sm:px-4 sm:py-6 text-gray-600 hidden lg:table-cell">
                                {{ number_format($sale->price) }}
                            </td>

                            <td class="px-2 py-4 sm:px-4 sm:py-6 text-green-700 font-bold">
                                ₦{{ number_format($sale->total_amount) }}
                            </td>

                            <td class="px-2 py-4 sm:px-4 sm:py-6">
                                @if($sale->payment_status == 'Paid')
                                    <span class="px-1.5 py-0.5 text-[9px] sm:text-[10px] font-bold rounded-full bg-green-100 text-green-700">PAID</span>
                                @else
                                    <span class="px-1.5 py-0.5 text-[9px] sm:text-[10px] font-bold rounded-full bg-yellow-100 text-yellow-700">PENDING</span>
                                @endif
                            </td>

                            <td class="px-2 py-3 sm:px-4 sm:py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="text-blue-600 font-bold hover:underline" onclick="viewSale({{ $sale->id }})">View</button>
                                    <button class="text-yellow-600 font-bold hover:underline sm:inline" onclick="editSale({{ $sale->id }})">Edit</button>
                                    <button class="text-red-600 hover:underline sm:inline" onclick="openDeleteModal({{ $sale->id }})" >Delete</button>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        @if($sales->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center py-10 text-gray-400 italic">No sales record yet</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div id="salePagination" class="flex justify-center py-4 border-t border-gray-50"></div>
            
            <div class="py-6">
                <span> </span>
            </div>


        </div>


    </section>

    @include('sales.partials.modal')


    <script>

        function openSaleModal() {
            document.getElementById('addSaleModal').classList.remove('hidden');
        }

        function closeSaleModal() {
            document.getElementById('addSaleModal').classList.add('hidden');
        }



        /* =========================
           GLOBAL SETUP
        ========================= */
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        /* =========================
           CREATE SALE (FORM SUBMIT)
        ========================= */
        const sellForm = document.getElementById('sellOrderForm');

        if (sellForm) {
            sellForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(sellForm);
                const data = Object.fromEntries(formData.entries());

                fetch("{{ route('sales.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": token
                    },
                    body: JSON.stringify(data)
                })
                    .then(res => res.json())
                    .then(result => {

                        showToast("Sale saved successfully");
                        sellForm.reset();
                        closeSaleModal()
                        location.reload();
                    })
                    .catch(err => console.error(err));
            });
        }


        /* =========================
           AUTO TOTAL (CREATE FORM)
        ========================= */
        const qty = document.getElementById('cratesSold');
        const price = document.getElementById('pricePerCrate');
        const total = document.getElementById('totalAmount');

        function calcTotal() {
            if (qty && price && total) {
                total.value = (qty.value || 0) * (price.value || 0);
            }
        }

        if (qty && price) {
            qty.addEventListener('input', calcTotal);
            price.addEventListener('input', calcTotal);
        }










        const rows = Array.from(document.querySelectorAll("#saleTable tbody tr"));
        const searchInput = document.getElementById("saleSearch");
        const categoryFilter = document.getElementById("catFilter");
        const dateFilter = document.getElementById("filterDate");
        const paginationContainer = document.getElementById("salePagination");

        let currentPage = 1;
        const rowsPerPage = 10;

        function filterRows() {
            const search = searchInput.value.toLowerCase();
            const category = categoryFilter.value.toLowerCase();
            const date = dateFilter.value;

            return rows.filter(row => {
                const text = row.innerText.toLowerCase();
                const rowCategory = row.children[2]?.innerText.toLowerCase();
                const rowDate = row.children[0]?.innerText;

                return (
                    text.includes(search) &&
                    (!category || rowCategory.includes(category)) &&
                    (!date || rowDate.includes(new Date(date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })))
                );
            });
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

        //     for (let i = 1; i <= totalPages; i++) {
        //         const btn = document.createElement("button");
        //         btn.innerText = i;
        //         btn.className = `px-3 py-1 rounded ${i === currentPage ? 'bg-yellow-600 text-white' : 'bg-gray-200'}`;

        //         btn.onclick = () => {
        //             currentPage = i;
        //             renderTable();
        //         };

        //         paginationContainer.appendChild(btn);
        //     }
        // }
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









        // const table = document.getElementById("saleTable");
        // const rows = Array.from(table.querySelectorAll("tbody tr"));

        // const paginationContainer = document.getElementById("salePagination");

        // let currentPage = 1;
        // const rowsPerPage = 5;

        // // No filter (since Laravel already filters via form)
        // function filterRows() {
        //     return rows;
        // }

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

        // // Initialize
        // renderTable();


    </script>

</x-app-layout>