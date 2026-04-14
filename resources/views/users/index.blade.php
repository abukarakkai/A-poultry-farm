<x-app-layout>



<div class="py-10 px-6 bg-white rounded-xl shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-bold">Users</h2>

        <button onclick="openCreateModal()" 
            class="bg-green-600 text-white px-4 py-2 rounded-lg">
            + Add User
        </button>
    </div>

<div class="bg-white rounded-xl shadow">

    <!-- ================= MOBILE CARDS ================= -->
    <div class="sm:hidden space-y-3">

        @foreach($users as $user)
        <div class="border rounded-xl p-3 shadow-sm bg-white hover:bg-yellow-50">

            <!-- Top: Name + Role -->
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-semibold text-sm">
                    {{ $user->name }}
                </h3>

                <span class="px-2 py-0.5 rounded text-[10px]
                    {{ $user->role === 'super_admin' ? 'bg-red-500 text-white' : 'bg-gray-300 text-gray-700' }}">
                    {{ str_replace('_', ' ', $user->role) }}
                </span>
            </div>

            <!-- Email -->
            <p class="text-xs text-gray-500 truncate" title="{{ $user->email }}">
                {{ $user->email }}
            </p>

            <!-- Actions -->
            <div class="flex justify-end gap-3 mt-3">

                <button 
                    onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')" 
                    class="text-blue-600 text-xs font-medium">
                    ✏️ Edit
                </button>

                <button 
                    onclick="openDeleteModal({{ $user->id }}, '{{ $user->name }}')" 
                    class="text-red-600 text-xs font-medium">
                    🗑️ Delete
                </button>

            </div>

        </div>
        @endforeach

    </div>


    <!-- ================= DESKTOP TABLE ================= -->
    <div class="hidden sm:block overflow-x-auto">

        <table class="w-full text-sm border">

            <thead class="bg-yellow-50 text-xs uppercase text-gray-600">
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Role</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr class="border-t hover:bg-gray-50">

                    <td class="px-4 py-2 font-medium">
                        {{ $user->name }}
                    </td>

                    <td class="px-4 py-2">
                        {{ $user->email }}
                    </td>

                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded text-xs
                            {{ $user->role === 'super_admin' ? 'bg-red-500 text-white' : 'bg-gray-300 text-gray-700' }}">
                            {{ str_replace('_', ' ', $user->role) }}
                        </span>
                    </td>

                    <td class="px-2 py-2">
                        <div class="flex gap-3">
                            <button 
                                onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')" 
                                class="text-blue-600 hover:underline">
                                Edit
                            </button>

                            <button 
                                onclick="openDeleteModal({{ $user->id }}, '{{ $user->name }}')" 
                                class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>
            <div class="py-10" >
                <span> </span>
            </div>


</div>


<div id="createUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    
    <div class="bg-white p-6 rounded-xl w-full max-w-md">
        <h2 class="text-lg font-bold mb-4">Create User</h2>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Name </label>
                <input name="name" placeholder="Name"   class="w-full border border-yellow-500 rounded-lg px-4 py-2 text-sm" >
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Email </label>
                <input name="email" placeholder="Email" class="w-full border border-yellow-500 rounded-lg px-4 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Password </label>
                <input type="password" name="password" placeholder="Password" class="w-full border border-yellow-500 rounded-lg px-4 py-2 text-sm">

            </div>

            <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Role </label>

            <select name="role" class="w-full border border-yellow-500 rounded-lg px-4 py-2 text-sm">
                <option value="user">User</option>
                <option value="super_admin">Super Admin</option>
            </select>

            </div>

            <div class="flex justify-end gap-2 py-4">
                <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button class="px-4 py-2 bg-green-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<div id="editUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    
    <div class="bg-white p-6 rounded-xl w-full max-w-md">
        <h2 class="text-lg font-bold mb-4">Edit User</h2>

        <form method="POST" id="editUserForm">
            @csrf
            @method('PUT')

            <input id="editName" name="name" class="w-full border p-2 mb-3">
            <input id="editEmail" name="email" class="w-full border p-2 mb-3">

            <input type="password" name="password" placeholder="New Password (optional)"
                class="w-full border p-2 mb-3">

            <select id="editRole" name="role" class="w-full border p-2 mb-3">
                <option value="user">User</option>
                <option value="super_admin">Super Admin</option>
            </select>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>

<div id="deleteUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">

    <div class="bg-white p-6 rounded-xl w-full max-w-md">
        <h2 class="text-lg font-bold mb-4 text-red-600">Delete User</h2>

        <p class="mb-4">
            Are you sure you want to delete 
            <span id="deleteUserName" class="font-semibold"></span>?
        </p>

        <form method="POST" id="deleteUserForm">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeDeleteModal()" 
                    class="px-4 py-2 bg-gray-300 rounded">
                    Cancel
                </button>

                <button class="px-4 py-2 bg-red-600 text-white rounded">
                    Yes, Delete
                </button>
            </div>
        </form>
    </div>


</div>

<!-- <div id="deleteUserId" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">

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

            <button onclick="deleteUser()"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Delete
            </button>
        </div>

    </div>
</div> -->


<script>
function openCreateModal() {
    document.getElementById('createUserModal').classList.remove('hidden');
}

function closeCreateModal() {
    document.getElementById('createUserModal').classList.add('hidden');
}

function openEditModal(id, name, email, role) {
    document.getElementById('editUserModal').classList.remove('hidden');

    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('editRole').value = role;

    document.getElementById('editUserForm').action = `/users/${id}`;
}

function closeEditModal() {
    document.getElementById('editUserModal').classList.add('hidden');
}

function openDeleteModal(id, name) {
    document.getElementById('deleteUserModal').classList.remove('hidden');

    document.getElementById('deleteUserName').innerText = name;

    document.getElementById('deleteUserForm').action = `/users/${id}`;
}

function closeDeleteModal() {
    document.getElementById('deleteUserModal').classList.add('hidden');
}

</script>

</x-app-layout>