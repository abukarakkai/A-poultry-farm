<x-app-layout>


        <section class="p-0 flex-1 overflow-auto">
            <h2 class="text-2xl font-bold mb-6">Farm Expenses</h2>

            <div class="bg-white p-6 rounded-2xl shadow mb-8">
                <!-- <form id="expenseForm" class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <div>
                        <label class="block text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" id="expenseTitle" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Title">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Date</label>
                        <input type="date" name="date" id="expenseDate" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Category</label>
                        <select id="expenseCategory" name="category" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="Feed">Feed</option>
                            <option value="Medication">Medication</option>
                            <option value="Staff Salary">Staff Salary</option>
                            <option value="Transport">Transport</option>
                            <option value="Utilities">Utilities</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Amount</label>
                        <input type="number" name="amount" id="expenseAmount"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Description</label>
                        <input type="text" name="description" id="expenseDescription"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Expense details">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Payment Method</label>
                        <select id="paymentMethod" name="paymentMethod" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                            <option value="Credit">Credit</option>
                        </select>
                    </div>

                    <div class="md:col-span-3 text-right mt-4">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full">
                            Save Expense
                        </button>
                    </div>

                </form> -->
                    <form id="expenseForm" class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <!-- Title -->
                        <div>
                            <label class="block text-gray-700 mb-1">Title</label>
                            <input type="text" name="title" id="expenseTitle"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="Title">
                        </div>

                        <!-- Date -->
                        <div>
                            <label class="block text-gray-700 mb-1">Date</label>
                            <input type="date" name="date" id="expenseDate"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-gray-700 mb-1">Category</label>
                            <select name="category" id="expenseCategory"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2">
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
                        <div>
                            <label class="block text-gray-700 mb-1">Unit Price (₦)</label>
                            <input type="number" name="unit_price" id="unitPrice" step="0.01"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="0">
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label class="block text-gray-700 mb-1">Quantity</label>
                            <input type="number" name="quantity" id="quantity"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="0">
                        </div>

                        <!-- Amount (Auto) -->
                        <div>
                            <label class="block text-gray-700 mb-1">Total Amount (₦)</label>
                            <input type="number" name="amount" id="expenseAmount" readonly
                                class="w-full bg-gray-100 border border-gray-300 rounded-lg px-3 py-2">
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-3">
                            <label class="block text-gray-700 mb-1">Description</label>
                            <input type="text" name="description" id="expenseDescription"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="Expense details">
                        </div>

                        <!-- Payment -->
                        <div>
                            <label class="block text-gray-700 mb-1">Payment Method</label>
                            <select name="paymentMethod" id="paymentMethod"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                                <option value="Credit">Credit</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="md:col-span-3 text-right mt-4">
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full">
                                Save Expense
                            </button>
                        </div>

                    </form>
            </div>

            <div class="bg-white rounded-2xl shadow overflow-hidden">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 p-4">

                        <!-- Search -->
                         <div class="min-w-[200px]"> 
                            <select id="categoryFilter" class="border  border-yellow-300 rounded-lg px-8 py-2 text-sm font-medium transition">
                                <option value="">All Categories</option>
                                <option>Feed</option>
                                <option>Medication</option>
                                <option>Staff Salary</option>
                                <option>Transport</option>
                                <option>Utilities</option>
                                <option>Maintenance</option>
                                <option>Other</option>
                            </select>

                            <input type="date" id="dateFilter"
                                class="border  border-yellow-500 rounded-lg px-3 py-2 text-sm font-medium transition">
                    
                        </div>

                        <!-- Filters -->
                        <div class="flex gap-2">
                                <input type="text" id="expenseSearch" placeholder="Search expenses..."
                            class="border border-yellow-500 rounded-lg px-4 py-2 w-full md:w-64 text-sm font-medium transition">


                        </div>

                        <!-- Pagination -->

                    </div>

                    
                <div class="max-h-96 overflow-y-auto overflow-x-auto">
                    <table class="min-w-full text-sm" id="expensesTable">
                        <thead class="bg-yellow-50 sticky top-0 text-gray-600 uppercase text-xm">
                            <tr>
                                <th class="px-3 md:px-6 py-3 text-left">#</th>
                                <th class="px-3 md:px-6 py-3 text-left">Title</th>
                                <th class="px-3 md:px-6 py-3 text-left">Date</th>
                                <th class="px-3 md:px-6 py-3 text-left">Amount</th>
                                <th class="px-3 md:px-6 py-3 text-left">Category</th>
                                <th class="px-3 md:px-6 py-3 text-left">Description</th>
                                <th class="px-3 md:px-6 py-3 text-left">Method</th>
                                <th class="px-3 md:px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($expenses as $expense)
                            <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-400">{{ $loop->iteration }}</td>

                                <td class="px-6 py-4">{{ $expense->title }}</td>
                                <td class="px-6 py-4">
                                     
                                {{ \Carbon\Carbon::parse($expense->date)->format('F jS, Y') }}
                            
                                </td>
                                <td class="px-6 py-4 text-red-600 font-semibold"> ₦{{ number_format($expense->amount) }}</td>

                                <td class="px-6 py-4">{{ $expense->category }}</td>
                                <td class="px-6 py-4"> {{ $expense->description }}</td>
                                <td class="px-6 py-4">{{ $expense->paymentMethod }}</td>
                                <td class="px-6 py-4 flex gap-3">
                                    <button onclick="openExpenseModal({{ $expense->id }})" class="text-blue-600 hover:underline view-expense-btn">View</button>
                                    <button onclick="editExpenseModal({{ $expense->id }})" class="text-yellow-600 hover:underline edit-expense-btn">Edit</button>
                                    <button onclick="openDeleteModal({{ $expense->id }})" class="text-red-600 hover:underline delete-expense-btn">Delete</button>
                                </td>
                            </tr>
                            @endforeach

                            <tr id="noResults" class="hidden">
                                <td colspan="7" class="text-center py-4 text-gray-500">
                                    No expenses found
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <div id="expensePagination" class="gap-2 py-4 text-center"></div>


            </div>
        </section>

        @include('expenses.partials.modals')


<script>

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


    document.getElementById('expenseForm').addEventListener('submit', function(e) {
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


const rows = Array.from(document.querySelectorAll("#expensesTable tbody tr"));
const searchInput = document.getElementById("expenseSearch");
const categoryFilter = document.getElementById("categoryFilter");
const dateFilter = document.getElementById("dateFilter");
const paginationContainer = document.getElementById("expensePagination");

let currentPage = 1;
const rowsPerPage = 20;

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



        </script>
</x-app-layout>