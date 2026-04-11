
<!-- View Sell Order Modal -->
<div id="viewSellModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4 overflow-y-auto">

  <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-6 relative animate-fadeIn">

    <!-- Close -->
    <button onclick="closeViewModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl">
      ✕
    </button>

    <!-- Header -->
    <div class="mb-6">
      <h2 class="text-2xl font-bold text-gray-800">Sale Details</h2>
      <p class="text-sm text-gray-500">View full transaction info</p>
    </div>

    <!-- Content -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

      <div>
        <p class="text-gray-500 text-sm">Customer</p>
        <p id="viewCustomer" class="font-semibold text-gray-800 text-lg"></p>
      </div>

      <div>
        <p class="text-gray-500 text-sm">Date</p>
        <p id="viewDate" class="font-semibold text-gray-800"></p>
      </div>

      <div>
        <p class="text-gray-500 text-sm">Income Type</p>
        <p id="viewType" class="font-semibold text-gray-800"></p>
      </div>

      <div>
        <p class="text-gray-500 text-sm">Payment Status</p>
        <span id="viewStatus" class="px-3 py-1 rounded-full text-sm font-medium"></span>
      </div>

      <div>
        <p class="text-gray-500 text-sm">Quantity</p>
        <p id="viewQty" class="font-semibold text-green-600"></p>
      </div>

      <div>
        <p class="text-gray-500 text-sm">Price</p>
        <p id="viewPrice" class="font-semibold text-green-600"></p>
      </div>

      <div class="md:col-span-2">
        <p class="text-gray-500 text-sm">Total Amount</p>
        <p id="viewTotal" class="text-2xl font-bold text-green-700"></p>
      </div>

      <div class="md:col-span-2">
        <p class="text-gray-500 text-sm">Note</p>
        <p id="viewNote" class="text-gray-700 bg-gray-50 p-3 rounded-lg"></p>
      </div>

    </div>

  </div>
</div>
<!-- Edit Sell Order Modal -->
<div id="editSellModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

  <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg md:max-w-2xl lg:max-w-3xl max-h-[95vh] overflow-y-auto p-5 sm:p-6 relative">

    <!-- Close Button -->
    <button onclick="closeEditSellModal()"  
      class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-500 hover:text-gray-700 text-lg font-bold">
      ✕
    </button>

    <!-- Header -->
    <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">
      Edit Sell Order
    </h2>

    <!-- FORM -->
    <form id="editSellForm" 
      onsubmit="event.preventDefault(); updateSale();" 
      class="grid grid-cols-1 sm:grid-cols-2 gap-4">

      <!-- Customer -->
      <div class="sm:col-span-2">
        <label class="block text-gray-700 mb-1 text-sm">Customer Name</label>
        <input type="text" name="customer_name" id="editCustomerName" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"
          placeholder="Customer name">
      </div>

      <!-- Date -->
      <div>
        <label class="block text-gray-700 mb-1 text-sm">Date</label>
        <input type="date" name="date" id="editSellDate" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
      </div>

      <!-- Type -->
      <div>
        <label class="block text-gray-700 mb-1 text-sm">Income Type</label>
        <select name="income_type" id="editIncomeType" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
          <option value="Egg">Egg</option>
          <option value="Empty Sacks">Empty Sacks</option>
          <option value="Manure">Manure</option>
        </select>
      </div>

      <!-- Quantity -->
      <div>
        <label class="block text-gray-700 mb-1 text-sm">Quantity</label>
        <input type="number" name="quantity" id="editQuantity" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"
          placeholder="0">
      </div>

      <!-- Price -->
      <div>
        <label class="block text-gray-700 mb-1 text-sm">Price Per Unit</label>
        <input type="number" name="price" id="editPricePerUnit" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"
          placeholder="0">
      </div>

      <!-- Total -->
      <div>
        <label class="block text-gray-700 mb-1 text-sm">Total Amount</label>
        <input type="number" name="total_amount" id="editTotalAmount" readonly
          class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 text-sm">
      </div>

      <!-- Status -->
      <div>
        <label class="block text-gray-700 mb-1 text-sm">Payment Status</label>
        <select name="payment_status" id="editPaymentStatus" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
          <option value="Paid">Paid</option>
          <option value="Pending">Pending</option>
        </select>
      </div>

      <!-- Note -->
      <div class="sm:col-span-2">
        <label class="block text-gray-700 mb-1 text-sm">Note</label>
        <textarea name="note" id="editSellNote"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"
          rows="3" placeholder="Short note..."></textarea>
      </div>

      <!-- Hidden ID -->
      <input type="hidden" id="editSaleId">

      <!-- Footer -->
      <div class="sm:col-span-2 flex flex-col sm:flex-row justify-end gap-3 mt-4">

        <button type="button" onclick="closeEditSellModal()"
          class="px-5 py-2 rounded-full border text-gray-600 hover:bg-gray-100">
          Cancel
        </button>

        <button type="submit"
          class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-full">
          Save Changes
        </button>

      </div>

    </form>
  </div>
</div>
<!-- Delete Sell Order Modal -->
<div id="deleteSellModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl shadow-lg w-11/12 md:w-96 p-6 relative">
    <!-- Close Button -->
    <button id="closeDeleteSellModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-lg font-bold">✕</button>

    <h2 class="text-xl font-semibold text-gray-800 mb-4">Delete Sell Order</h2>
    <p class="text-gray-600 mb-6">Are you sure you want to delete this sell order? This action cannot be undone.</p>

    <div class="flex justify-end gap-3">
      <button id="cancelDeleteSell" class="px-4 py-2 rounded-full border border-gray-300 text-gray-700 hover:bg-gray-100">
        Cancel
      </button>
      <button id="confirmDeleteSell" class="px-4 py-2 rounded-full bg-red-600 hover:bg-red-700 text-white">
        Delete
      </button>
    </div>
  </div>
</div>



<script>
  // view modal
function viewSale(id){

    fetch(`/sales/${id}`)
    .then(res => res.json())
    .then(sale => {

        document.getElementById('viewCustomer').innerText = sale.customer_name;
        document.getElementById('viewDate').innerText = sale.date;
        document.getElementById('viewType').innerText = sale.income_type;
        document.getElementById('viewQty').innerText = sale.quantity;
        document.getElementById('viewPrice').innerText = "₦" + Number(sale.price).toLocaleString();
        document.getElementById('viewTotal').innerText = "₦" + Number(sale.total_amount).toLocaleString();
        document.getElementById('viewNote').innerText = sale.note ?? 'No note';

        // Status badge styling
        let statusEl = document.getElementById('viewStatus');
        statusEl.innerText = sale.payment_status;

        if(sale.payment_status === 'Paid'){
            statusEl.className = "px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-600";
        } else {
            statusEl.className = "px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-600";
        }

        document.getElementById('viewSellModal').classList.remove('hidden');
        document.getElementById('viewSellModal').classList.add('flex');
    })
}

function closeViewModal(){
    const modal = document.getElementById('viewSellModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}



// edit modal
  function editSale(id){

    fetch(`/sales/${id}`)
    .then(res => res.json())
    .then(sale => {

        document.getElementById('editSaleId').value = sale.id
        document.getElementById('editCustomerName').value = sale.customer_name
        document.getElementById('editSellDate').value = sale.date
        document.getElementById('editIncomeType').value = sale.income_type
        document.getElementById('editQuantity').value = sale.quantity
        document.getElementById('editPricePerUnit').value = sale.price
        document.getElementById('editTotalAmount').value = sale.total_amount
        document.getElementById('editPaymentStatus').value = sale.payment_status
        document.getElementById('editSellNote').value = sale.note ?? ''

        document.getElementById('editSellModal').classList.remove('hidden')
    })
}
function updateSale(){

    let id = document.getElementById('editSaleId').value

    fetch(`/sales/${id}`, {

        method:'PUT',

        headers:{
            'Content-Type':'application/json',
            'Accept':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },

        body:JSON.stringify({

            customer_name:document.getElementById('editCustomerName').value,
            date:document.getElementById('editSellDate').value,
            income_type:document.getElementById('editIncomeType').value,
            quantity:document.getElementById('editQuantity').value,
            price:document.getElementById('editPricePerUnit').value,
            total_amount:document.getElementById('editTotalAmount').value,
            payment_status:document.getElementById('editPaymentStatus').value,
            note:document.getElementById('editSellNote').value

        })

    })
    .then(res=>res.json())
    .then(data=>{

        closeEditSellModal()

       showToast("Order Updated successfully", "green");

        setTimeout(()=>{
        location.reload()
        },500)

    })
     .catch(error => {
        console.error(error);
    });
}

function closeEditSellModal(){
    document.getElementById('editSellModal').classList.add('hidden')
}

const eqty = document.getElementById('editQuantity');
const eprice = document.getElementById('editPricePerUnit');
const etotal = document.getElementById('editTotalAmount');

function calcEditTotal(){
    etotal.value = (eqty.value || 0) * (eprice.value || 0)
}

eqty.addEventListener('input', calcEditTotal)
eprice.addEventListener('input', calcEditTotal)



let saleToDelete = null;

/* =========================
   OPEN MODAL
========================= */
function openDeleteModal(id){
    saleToDelete = id;
    document.getElementById('deleteSellModal').classList.remove('hidden');
}

/* =========================
   CLOSE MODAL
========================= */
function closeDeleteModal(){
    document.getElementById('deleteSellModal').classList.add('hidden');
    saleToDelete = null;
}

/* Close buttons */
document.getElementById('closeDeleteSellModal').onclick = closeDeleteModal;
document.getElementById('cancelDeleteSell').onclick = closeDeleteModal;


/* =========================
   CONFIRM DELETE
========================= */
document.getElementById('confirmDeleteSell').addEventListener('click', function(){

    if(!saleToDelete) return;

    fetch(`/sales/${saleToDelete}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(res => {
        if(!res.ok){
            throw new Error("Delete failed");
        }
        return res.json();
    })
    .then(data => {

        closeDeleteModal();

        showToast("Sale deleted successfully", "red");

        setTimeout(()=>{
            location.reload();
        },500);

    })
    .catch(err => {
        console.error(err);
        showToast("Delete failed", "red");
    });

});
</script>