<x-app-layout>


        <!-- DASHBOARD CONTENT -->

        <section class="p-4 flex-1 overflow-auto">
            <h2 class="text-2xl font-bold mb-6">Create Sell Order</h2>

            
            <div class="bg-white p-6 rounded-2xl shadow mb-8">
         
<form id="sellOrderForm" class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div>
        <label class="block text-gray-700 mb-1">Date</label>
        <input type="date" name="date" id="sellDate"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required >
    </div>

    <div>
        <label class="block text-gray-700 mb-1">Customer Name</label>
        <input type="text" name="customer_name" id="customerName"
            class="w-full border border-gray-300 rounded-lg px-3 py-2"
            placeholder="Customer name" required>
    </div>

    <div>
        <label class="block text-gray-700 mb-1">Income Type</label>
        <select name="income_type" id="incomeType"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
            <option value="">Select Type</option>
            <option value="Egg">Egg</option>
            <option value="Manure">Manure</option>
            <option value="Sack">Empty Sack</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div>
        <label class="block text-gray-700 mb-1">Quantity Sold</label>
        <input type="number" name="quantity" id="cratesSold"
            class="w-full border border-gray-300 rounded-lg px-3 py-2"
            placeholder="0" required>
    </div>

    <div>
        <label class="block text-gray-700 mb-1">Price Per Crate</label>
        <input type="number" name="price" id="pricePerCrate"
            class="w-full border border-gray-300 rounded-lg px-3 py-2"
            placeholder="0" required>
    </div>

    <div>
        <label class="block text-gray-700 mb-1">Total Amount</label>
        <input type="number" name="total_amount" id="totalAmount"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100"
            readonly>
    </div>

    <div>
        <label class="block text-gray-700 mb-1">Payment Status</label>
        <select name="payment_status" id="paymentStatus"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
            <option value="Paid">Paid</option>
            <option value="Pending">Pending</option>
        </select>
    </div>

    <div class="md:col-span-3">
        <label class="block text-gray-700 mb-1">Note</label>
        <textarea name="note" id="sellNote"
            class="w-full border border-gray-300 rounded-lg px-3 py-2"
            rows="2"></textarea>
    </div>

    <div class="md:col-span-3 text-right mt-4">
        <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full">
            Save Sell Order
        </button>
    </div>

</form>

            </div>


            <!-- <div class="bg-white rounded-2xl shadow overflow-hidden"> -->

            <div class="bg-white rounded-lg shadow overflow-x-auto">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 p-4">

                        <!-- Search -->
                         <div class="min-w-[200px]"> 
                            <select id="catFilter" class="border  border-yellow-300 rounded-lg px-8 py-2 text-sm font-medium transition">
                                <option value="">All Categories</option>
                                <option>Egg</option>
                                <option>Manure</option>
                                <option>Empty Sack</option>
                                <option>Other</option>
                            </select>

                            <input type="date" id="filterDate"
                                class="border  border-yellow-500 rounded-lg px-3 py-2 text-sm font-medium transition">
                    
                        </div>

                        <!-- Filters -->
                        <div class="flex gap-2">
                                <input type="text" id="saleSearch" placeholder="Search sale orders..."
                            class="border border-yellow-500 rounded-lg px-4 py-2 w-full md:w-64 text-sm font-medium transition">


                        </div>

                        <!-- Pagination -->

                    </div>
                <table class="min-w-full text-sm" id="saleTable">
                    <thead class="bg-yellow-50 text-gray-600 uppercase text-xs">
                        <tr>       
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left">Customer</th>
                            <th class="px-6 py-3 text-left">Description</th>
                            <th class="px-6 py-3 text-left">Crates/Sacks</th>
                            <th class="px-6 py-3 text-left">Price</th>
                            <th class="px-6 py-3 text-left">Total</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>

                   <tbody>

@foreach($sales as $sale)
<tr class="hover:bg-gray-50">

    <td class="px-6 py-4 font-medium text-gray-400">{{ $loop->iteration }}</td>
    <td class="px-6 py-4 text-gray-700 font-medium"> {{ \Carbon\Carbon::parse($sale->date)->format('F jS, Y') }}</td>
    <td class="px-6 py-4 text-gray-700">{{ $sale->customer_name }}</td>

    <td class="px-6 py-4 text-gray-700">{{ $sale->income_type }}</td>

    <td class="px-6 py-4 text-green-600 font-semibold">
        {{ $sale->quantity }}
    </td>

    <td class="px-6 py-4 text-green-600 font-semibold">
        {{ number_format($sale->price) }}
    </td>

    <td class="px-6 py-4 text-green-600 font-semibold">
        ₦{{ number_format($sale->total_amount) }}
    </td>

    <td class="px-6 py-4">
        @if($sale->payment_status == 'Paid')
            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">
                Paid
            </span>
        @else
            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-600">
                Pending
            </span>
        @endif
    </td>

    <td class="px-6 py-4 flex gap-2">
        <button class="text-blue-600 hover:underline view-btn" onclick="viewSale({{ $sale->id }})">View</button>
        <button class="text-yellow-600 hover:underline edit-btn" onclick="editSale({{ $sale->id }})">Edit</button>
        <button onclick="openDeleteModal({{ $sale->id }})" class="text-red-600 hover:underline">Delete</button>
    </td>
</tr>
@endforeach
@if($sales->isEmpty())
<tr>
    <td colspan="8" class="text-center py-6 text-gray-500">
        No sales record yet
    </td>
</tr>
@endif
</tbody>


                </table>
                                        

                                <div id="salePagination" class="flex justify-center py-4 gap-2 mt-4"></div>

                <!-- </div> -->

            </div>
        </section>

@include('sales.partials.modal')


<script>




/* =========================
   GLOBAL SETUP
========================= */
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

/* =========================
   CREATE SALE (FORM SUBMIT)
========================= */
const sellForm = document.getElementById('sellOrderForm');

if (sellForm) {
    sellForm.addEventListener('submit', function(e) {
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

        btn.className = `px-3 py-1 rounded ${
            i === currentPage
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
