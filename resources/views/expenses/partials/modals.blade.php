<!-- Add Pen Modal -->
<div id="recordModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">

  <div class="bg-white p-6 rounded-xl w-full max-w-2xl shadow-lg">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add New Pen</h2>

    <div class="grid grid-cols-2 gap-4">

      <!-- Pen Name -->
      <div>
        <label class="block text-gray-700 mb-1">Pen Name</label>
        <input id="penName" type="text"
          class="w-full border border-gray-300 rounded-lg px-3 py-2"
          placeholder="Pen 1">
      </div>

      <!-- Bird Type -->
      <div>
        <label class="block text-gray-700 mb-1">Bird Type</label>
        <select id="birdType"
          class="w-full border border-gray-300 rounded-lg px-3 py-2">
          <option value="Layers">Layers</option>
          <option value="Broilers">Broilers</option>
        </select>
      </div>

      <!-- Capacity -->
      <div>
        <label class="block text-gray-700 mb-1">Pen Capacity</label>
        <input id="capacity" type="number"
          class="w-full border border-gray-300 rounded-lg px-3 py-2"
          placeholder="1000">
      </div>

      <!-- Current Birds -->
      <div>
        <label class="block text-gray-700 mb-1">Current Bird Count</label>
        <input id="birdCount" type="number"
          class="w-full border border-gray-300 rounded-lg px-3 py-2"
          placeholder="950">
      </div>

      <!-- Start Date -->
      <div>
        <label class="block text-gray-700 mb-1">Start Date</label>
        <input type="date" id="startDate"
          class="w-full border border-gray-300 rounded-lg px-3 py-2">
      </div>

      <!-- Status -->
      <div>
        <label class="block text-gray-700 mb-1">Status</label>
        <select id="status"
          class="w-full border border-gray-300 rounded-lg px-3 py-2">
          <option value="Active">Active</option>
          <option value="Empty">Empty</option>
          <option value="Maintenance">Maintenance</option>
        </select>
      </div>

    </div>

    <!-- Notes -->
    <div class="mt-4">
      <label class="block text-gray-700 mb-1">Notes</label>
      <textarea id="note"
        class="w-full border border-gray-300 rounded-lg px-3 py-2"
        rows="3"
        placeholder="Optional notes"></textarea>
    </div>

    <!-- Buttons -->
    <div class="flex justify-end space-x-3 mt-6">

      <button onclick="closePenModal()"
        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
        Cancel
      </button>

      <button onclick="savePen()" type="button"
        class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
        Save Pen
      </button>

    </div>

  </div>
</div>

<!-- View Pen Modal -->
<div id="viewExpenseModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md sm:max-w-xl md:max-w-2xl lg:max-w-3xl 
                max-h-[95vh] overflow-y-auto p-5 sm:p-6 relative">

        <!-- Close -->
        <button onclick="closeExpenseModal()"
            class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">
            ✕
        </button>

        <!-- Header -->
        <h2 class="text-lg sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-800">
            Exoense Details
        </h2>

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 text-sm">

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Expense Date</p>
                <p id="date" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Title</p>
                <p id="title" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Category</p>
                <p id="category" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Description</p>
                <p id="description" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Unit price</p>
                <p id="price" class="w-full font-bold text-green-700 text-sm"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Quantity</p>
                <p id="quantity" class="w-full font-bold text-green-700 text-sm"></p>
            </div>


            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Amount</p>
                <p id="amount" class="w-full font-bold text-green-700 text-sm"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Payment Method</p>
                <p id="paymentMethod" class="font-semibold text-gray-800"></p>
            </div>

        </div>

    </div>
</div>

<!-- Edit Pen Modal -->

<div id="editExpenseModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg sm:max-w-xl md:max-w-3xl lg:max-w-4xl max-h-[95vh] overflow-y-auto p-5 sm:p-8 relative">

        <!-- Close -->
        <button onclick="closeEditModal()" class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">
            ×
        </button>

        <h2 class="text-lg sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-800">
            Expenses
        </h2>

        <!-- Form: 2 columns on mobile, 4 columns on desktop -->
        <form id="editExpenseForm" onsubmit="event.preventDefault(); updateExpense();" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 items-end">

            <!-- Hidden ID field -->
            <input type="hidden" id="edit_id">

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Title</label>
                <input type="text" id="editExpenseTitle" name="title" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>


            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Date</label>
                <input type="date" id="editExpenseDate" name="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>


                    <div>
                        <label class="block text-gray-700 mb-1">Category</label>
                        <select id="editExpenseCategory" name="category" class="w-full border border-gray-300 rounded-lg px-3 py-2">
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
                            <input type="number" name="unit_price" id="editUnitPrice" step="0.01"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="0">
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label class="block text-gray-700 mb-1">Quantity</label>
                            <input type="number" name="quantity" id="editQuantity"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                placeholder="0">
                        </div>


                    <div>
                        <label class="block text-gray-700 mb-1">Amount</label>
                        <input type="number" name="amount" id="editExpenseAmount" readonly
                            class="w-full bg-gray-100 border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Payment Method</label>
                        <select id="editPaymentMethod" name="paymentMethod" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                            <option value="Credit">Credit</option>
                        </select>

                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700 mb-1">Description</label>
                        <input type="text" name="description" id="editExpenseDescription"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Expense details">
                    </div>


            <div class="col-span-2 sm:col-span-2 md:col-span-4 flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="bg-gray-200 px-6 py-2 rounded-full text-sm sm:text-base">Cancel</button>
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-full text-sm sm:text-base">Update Expense</button>
            </div>

        </form>
    </div>
</div>




<div id="deleteRecordId" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">

    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">

        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Delete Record
        </h2>

        <p class="text-gray-600 mb-6">
            Are you sure you want to delete this Record? This action cannot be undone.
        </p>

        <input type="hidden" id="deleteRecordId">

        <div class="flex justify-end gap-3">
            <button onclick="closeDeleteModal()"
                class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                Cancel
            </button>

            <button onclick="deleteRecord()"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Delete
            </button>
        </div>

    </div>
</div>

<script>
    const editUnitPrice = document.getElementById('editUnitPrice');
    const editQuantity = document.getElementById('editQuantity');
    const editExpenseAmount = document.getElementById('editExpenseAmount');

    function calculateAmount() {
        const price = parseFloat(editUnitPrice.value) || 0;
        const qty = parseFloat(editQuantity.value) || 0;

        editExpenseAmount.value = (price * qty).toFixed(2);
    }

    editUnitPrice.addEventListener('input', calculateAmount);
    editQuantity.addEventListener('input', calculateAmount);



function editExpenseModal(id) {
    fetch(`/expenses/${id}`)
    .then(res => res.json())
    .then(expense => {

        document.getElementById('edit_id').value = expense.id
        document.getElementById('editExpenseTitle').value = expense.title
        document.getElementById('editExpenseCategory').value = expense.category
        document.getElementById('editExpenseDate').value = expense.date
        document.getElementById('editExpenseDescription').value = expense.description
        document.getElementById('editUnitPrice').value = expense.unit_price
        document.getElementById('editQuantity').value = expense.quantity
        document.getElementById('editExpenseAmount').value = expense.amount
        document.getElementById('editPaymentMethod').value = expense.paymentMethod

        document.getElementById('editExpenseModal').classList.replace('hidden', 'flex')
    })
}
function updateExpense(){

    let id = document.getElementById('edit_id').value

    fetch(`/expenses/${id}`, {

        method:'PUT',

        headers:{
            'Content-Type':'application/json',
            'Accept':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },

        body:JSON.stringify({

            title:document.getElementById('editExpenseTitle').value,
            date:document.getElementById('editExpenseDate').value,
            category:document.getElementById('editExpenseCategory').value,
            description:document.getElementById('editExpenseDescription').value,
            unit_price:document.getElementById('editUnitPrice').value,
            quantity:document.getElementById('editQuantity').value,
            amount:document.getElementById('editExpenseAmount').value,
            paymentMethod:document.getElementById('editPaymentMethod').value

        })

    })
    .then(res=>res.json())
    .then(data=>{

        editExpenseModal()

       showToast("Expenses Updated successfully", "green");

        setTimeout(()=>{
        location.reload()
        },500)

    })
     .catch(error => {
        console.error(error);
    });
}



function closeEditModal() {
    document.getElementById('editExpenseModal').classList.replace('flex', 'hidden');
}


// function updateRecord(){

//     let id = document.getElementById('edit_id').value;

//     const data = {
//         pen_id: document.getElementById('edit_pen_id').value,
//         record_date: document.getElementById('edit_recordDate').value,
//         crates_produced: document.getElementById('edit_cratesProduced').value,
//         cracks: document.getElementById('edit_cracks').value,
//         feed_consumed: document.getElementById('edit_feedConsumed').value,
//         cull: document.getElementById('edit_cull').value,
//         mortality: document.getElementById('edit_mortality').value,
//         water: document.getElementById('edit_water').value,
//         note: document.getElementById('edit_note').value
//     };

//     // 🔒 Basic validation
//     if(!data.pen_id || !data.record_date){
//         showToast("Pen and Date are required", "red");
//         return;
//     }

//     fetch(`/expenses/${id}`, {
//         method: "PUT",
//         headers: {
//             "Content-Type": "application/json",
//             "Accept": "application/json",
//             "X-CSRF-TOKEN": "{{ csrf_token() }}"
//         },
//         body: JSON.stringify(data)
//     })
//     .then(res => {
//         if(!res.ok){
//             throw new Error("Update failed");
//         }
//         return res.json();
//     })
//     .then(result => {

//         closeEditModal();

//         showToast("Record updated successfully", "green");

//         setTimeout(()=>{
//             location.reload();
//         },1200);

//     })
//     .catch(err => {
//         console.error(err);
//         showToast("Update failed", "red");
//     });
// }



function openExpenseModal(id) {

    fetch(`/expenses/${id}`)
    .then(res => res.json())
    .then(expense => {

        document.getElementById('date').innerText = expense.date;
        document.getElementById('title').innerText = expense.title;
        document.getElementById('category').innerText = expense.category;
        document.getElementById('description').innerText = expense.description ?? 'No decription';
        document.getElementById('paymentMethod').innerText = expense.paymentMethod;
        document.getElementById('quantity').innerText = expense.quantity;
        document.getElementById('price').innerText = "₦" + Number(expense.unit_price).toLocaleString();
        document.getElementById('amount').innerText = "₦" + Number(expense.amount).toLocaleString();


    document.getElementById('viewExpenseModal').value = id;
    document.getElementById('viewExpenseModal').classList.remove('hidden');
})
}

function closeExpenseModal() {
    document.getElementById('viewExpenseModal').classList.add('hidden');
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

    fetch(`/expenses/${id}`, {
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
        showToast("Expense deleted successfully", "red")

        setTimeout(()=>{
        location.reload()
        },1500)

        
    })
    .catch(error => {
        console.error(error);
    });

}

</script>