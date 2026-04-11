<x-app-layout>
<div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-lg font-bold mb-4">Create User</h2>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <input name="name" placeholder="Name" class="w-full border p-2 mb-3">
        <input name="email" placeholder="Email" class="w-full border p-2 mb-3">
        <input type="password" name="password" placeholder="Password" class="w-full border p-2 mb-3">

        <select name="role" class="w-full border p-2 mb-3">
            <option value="user">User</option>
            <option value="super_admin">Super Admin</option>
        </select>

        <button class="bg-green-600 text-white px-4 py-2 rounded-lg w-full">
            Create User
        </button>
    </form>

</div>


</x-app-layout>