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
<div id="viewRecordModal"
     class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md sm:max-w-xl md:max-w-2xl lg:max-w-3xl 
                max-h-[95vh] overflow-y-auto p-5 sm:p-6 relative">

        <!-- Close -->
        <button onclick="closeViewModal()"
            class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">
            ✕
        </button>

        <!-- Header -->
        <h2 class="text-lg sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-800">
            Record Details
        </h2>

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 text-sm">

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Record Date</p>
                <p id="viewRecordDate" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Pen Name</p>
                <p id="viewName" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Egg Collected</p>
                <p id="viewEggs" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Cracks</p>
                <p id="viewCracks" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Feed Consumed</p>
                <p id="viewFeed" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Cull</p>
                <p id="viewCull" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Mortality</p>
                <p id="viewMortality"
                   class="font-semibold px-2 py-1 rounded text-xs sm:text-sm inline-block">
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Water Consumed (ltr)</p>
                <p id="viewWater"
                   class="font-semibold px-2 py-1 rounded text-xs sm:text-sm inline-block">
                </p>
            </div>

        </div>

        <!-- Notes -->
        <div class="mt-5 sm:mt-6">
            <p class="text-gray-500 text-xs sm:text-sm">Notes</p>
            <p id="viewNotes" class="text-gray-700 mt-1 text-sm leading-relaxed"></p>
        </div>

    </div>
</div>

<!-- Edit Pen Modal -->

<div id="editRecordModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-3 sm:p-6 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg sm:max-w-xl md:max-w-3xl lg:max-w-4xl max-h-[95vh] overflow-y-auto p-5 sm:p-8 relative">

        <!-- Close -->
        <button onclick="closeEditModal()" class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">
            ×
        </button>

        <h2 class="text-lg sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-800">
            Edit Daily Record
        </h2>

        <!-- Form: 2 columns on mobile, 4 columns on desktop -->
        <form id="editRecordForm" onsubmit="event.preventDefault(); updateRecord();" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 items-end">

            <!-- Hidden ID field -->
            <input type="hidden" id="edit_id">

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Pen / Batch</label>
                <select id="edit_pen_id" name="pen_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
                    @foreach($pens as $pen)
                        <option value="{{ $pen->id }}">{{ $pen->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Date</label>
                <input type="date" id="edit_recordDate" name="record_date" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Crates Produced</label>
                <input type="number" id="edit_cratesProduced" name="crates_produced" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Cracks</label>
                <input type="number" id="edit_cracks" name="cracks" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Feed (Sacks)</label>
                <input type="number" id="edit_feedConsumed" name="feed_consumed" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Cull</label>
                <input type="number" id="edit_cull" name="cull" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Mortality</label>
                <input type="number" id="edit_mortality" name="mortality" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Water (ltr)</label>
                <input type="number" id="edit_water" name="water" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>

            <div class="col-span-2 sm:col-span-2 md:col-span-4">
                <label class="block text-gray-700 mb-1 text-xs sm:text-sm">Note</label>
                <input type="text" id="edit_note" name="note" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
            </div>

            <div class="col-span-2 sm:col-span-2 md:col-span-4 flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="bg-gray-200 px-6 py-2 rounded-full text-sm sm:text-base">Cancel</button>
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-full text-sm sm:text-base">Update Record</button>
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


function openEditModal(id) {
    fetch(`/records/${id}`)
    .then(res => res.json())
    .then(record => {
        document.getElementById('edit_id').value = record.id;
        document.getElementById('edit_pen_id').value = record.pen_id;
        document.getElementById('edit_recordDate').value = record.record_date;
        document.getElementById('edit_cratesProduced').value = record.eggs_collected; // Mapping
        document.getElementById('edit_cracks').value = record.cracks ?? 0;
        document.getElementById('edit_feedConsumed').value = record.feed_given;
        document.getElementById('edit_cull').value = record.cull ?? 0;
        document.getElementById('edit_mortality').value = record.mortality ?? 0;
        document.getElementById('edit_water').value = record.water ?? 0;
        document.getElementById('edit_note').value = record.notes ?? '';

        document.getElementById('editRecordModal').classList.replace('hidden', 'flex');
    });
}

function closeEditModal() {
    document.getElementById('editRecordModal').classList.replace('flex', 'hidden');
}


function updateRecord(){

    let id = document.getElementById('edit_id').value;

    const data = {
        pen_id: document.getElementById('edit_pen_id').value,
        record_date: document.getElementById('edit_recordDate').value,
        crates_produced: document.getElementById('edit_cratesProduced').value,
        cracks: document.getElementById('edit_cracks').value,
        feed_consumed: document.getElementById('edit_feedConsumed').value,
        cull: document.getElementById('edit_cull').value,
        mortality: document.getElementById('edit_mortality').value,
        water: document.getElementById('edit_water').value,
        note: document.getElementById('edit_note').value
    };

    // 🔒 Basic validation
    if(!data.pen_id || !data.record_date){
        showToast("Pen and Date are required", "red");
        return;
    }

    fetch(`/records/${id}`, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify(data)
    })
    .then(res => {
        if(!res.ok){
            throw new Error("Update failed");
        }
        return res.json();
    })
    .then(result => {

        closeEditModal();

        showToast("Record updated successfully", "green");

        setTimeout(()=>{
            location.reload();
        },500);

    })
    .catch(err => {
        console.error(err);
        showToast("Update failed", "red");
    });
}
</script>