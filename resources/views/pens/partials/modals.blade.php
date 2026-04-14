<!-- Add Pen Modal -->
<div id="penModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

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
<div id="viewPenModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-8 relative">

        <!-- Close -->
        <button onclick="closeViewModal()"
            class="absolute bg-red top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">
            ×
        </button>

        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            Pen Details
        </h2>

        <div class="grid grid-cols-2 gap-6 text-sm">

            <div>
                <p class="text-gray-500">Pen Name</p>
                <p id="viewName" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500">Bird Type</p>
                <p id="viewType" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500">Capacity</p>
                <p id="viewCapacity" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500">Current Birds</p>
                <p id="viewBirds" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500">Start Date</p>
                <p id="viewStartDate" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500">Status</p>
                <p id="viewStatus"
                   class="font-semibold px-2 py-1 rounded text-sm inline-block">
                </p>
            </div>

        </div>

        <div class="mt-6">
            <p class="text-gray-500">Notes</p>
            <p id="viewNotes" class="text-gray-700 mt-1"></p>
        </div>

    </div>
</div>


<!-- Edit Pen Modal -->
<!-- <div id="editPenModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">

<div class="bg-white p-6 rounded-xl w-full max-w-2xl shadow-lg">

<h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Pen</h2>

<input type="hidden" id="editPenId">

<div class="grid grid-cols-2 gap-4">

<div>
<label class="block text-gray-700 mb-1">Pen Name</label>
<input id="editPenName" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2">
</div>

<div>
<label class="block text-gray-700 mb-1">Bird Type</label>
<select id="editBirdType" class="w-full border border-gray-300 rounded-lg px-3 py-2">
<option value="Layers">Layers</option>
<option value="Broilers">Broilers</option>
</select>
</div>

<div>
<label class="block text-gray-700 mb-1">Capacity</label>
<input id="editCapacity" type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2">
</div>

<div>
<label class="block text-gray-700 mb-1">Current Birds</label>
<input id="editBirdCount" type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2">
</div>

<div>
<label class="block text-gray-700 mb-1">Start Date</label>
<input id="editStartDate" type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2">
</div>

<div>
<label class="block text-gray-700 mb-1">Status</label>
<select id="editStatus" class="w-full border border-gray-300 rounded-lg px-3 py-2">
<option value="Active">Active</option>
<option value="Empty">Empty</option>
<option value="Maintenance">Maintenance</option>
</select>
</div>

</div>

<div class="mt-4">
<label class="block text-gray-700 mb-1">Notes</label>
<textarea id="editNote" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
</div>

<div class="flex justify-end space-x-3 mt-6">

<button onclick="closeEditModal()"
class="px-4 py-2 bg-gray-400 text-white rounded-lg">
Cancel
</button>

<button onclick="updatePen()"
class="px-4 py-2 bg-yellow-600 text-white rounded-lg">
Update Pen
</button>

</div>

</div>
</div> -->

<div id="editPenModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

    <div class="bg-white p-6 rounded-xl w-full max-w-2xl shadow-lg max-h-[90vh] overflow-y-auto relative">

        <!-- Close Button -->
        <button onclick="closeEditModal()" class="absolute top-3 right-3 text-gray-600 text-xl">✕</button>

        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Pen</h2>

        <input type="hidden" id="editPenId">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label for="editPenName" class="block text-gray-700 mb-1">Pen Name</label>
                <input id="editPenName" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="editBirdType" class="block text-gray-700 mb-1">Bird Type</label>
                <select id="editBirdType" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="Layers">Layers</option>
                    <option value="Broilers">Broilers</option>
                </select>
            </div>

            <div>
                <label for="editCapacity" class="block text-gray-700 mb-1">Capacity</label>
                <input id="editCapacity" type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="editBirdCount" class="block text-gray-700 mb-1">Current Birds</label>
                <input id="editBirdCount" type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="editStartDate" class="block text-gray-700 mb-1">Start Date</label>
                <input id="editStartDate" type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="editStatus" class="block text-gray-700 mb-1">Status</label>
                <select id="editStatus" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="Active">Active</option>
                    <option value="Empty">Empty</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
            </div>

        </div>

        <div class="mt-4">
            <label for="editNote" class="block text-gray-700 mb-1">Notes</label>
            <textarea id="editNote" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
        </div>

        <div class="flex justify-end space-x-3 mt-6">
            <button onclick="closeEditModal()" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg transition">
                Cancel
            </button>

            <button onclick="updatePen()" class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg transition">
                Update Pen
            </button>
        </div>

    </div>
</div>

<div id="deletePenModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">

        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Delete Pen
        </h2>

        <p class="text-gray-600 mb-6">
            Are you sure you want to delete this pen? This action cannot be undone.
        </p>

        <input type="hidden" id="deletePenId">

        <div class="flex justify-end gap-3">
            <button onclick="closeDeleteModal()"
                class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                Cancel
            </button>

            <button onclick="deletePen()"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Delete
            </button>
        </div>

    </div>
</div>


<script>

  function editPen(id){

fetch(`/pens/${id}`)
.then(res => res.json())
.then(pen => {

document.getElementById('editPenId').value = pen.id
document.getElementById('editPenName').value = pen.name
document.getElementById('editBirdType').value = pen.type
document.getElementById('editCapacity').value = pen.capacity ?? ''
document.getElementById('editBirdCount').value = pen.initial_birds
document.getElementById('editStartDate').value = pen.start_date
document.getElementById('editStatus').value = pen.status ?? 'Active'
document.getElementById('editNote').value = pen.notes ?? ''

document.getElementById('editPenModal').classList.remove('hidden')

})
}


// update pen modal

function updatePen() {
    const id = document.getElementById('editPenId').value;

    fetch(`/pens/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            name: document.getElementById('editPenName').value,
            type: document.getElementById('editBirdType').value,
            capacity: document.getElementById('editCapacity').value,
            initial_birds: document.getElementById('editBirdCount').value,
            start_date: document.getElementById('editStartDate').value,
            status: document.getElementById('editStatus').value,
            notes: document.getElementById('editNote').value
        }) 
         })
    .then(res => res.json())
    .then(data => {
        showToast("Pen updated successfully")

        setTimeout(()=>{
        closeEditModal();
        location.reload()
        },1500)

    })
    .catch(err => console.error(err));
}
function closeEditModal(){

    document.getElementById('editPenModal').classList.add('hidden')

}



// delet modal
function openDeleteModal(id) {
    document.getElementById('deletePenId').value = id;
    document.getElementById('deletePenModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deletePenModal').classList.add('hidden');
}

// 


function deletePen() {

    let id = document.getElementById('deletePenId').value;

    fetch(`/pens/${id}`, {
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
        showToast("Pen deleted successfully", "red")

        setTimeout(()=>{
        location.reload()
        },1500)

        // Remove row from table
        document.getElementById("pen-row-" + id).remove();

    })
    .catch(error => {
        console.error(error);
    });

}

</script>
