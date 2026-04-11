    
<x-app-layout>
        <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow">

            <h2 class="text-lg font-bold mb-4">Edit User</h2>

            <form method="POST" action="{{ route('users.update', $user) }}">
                @csrf @method('PUT')

                <input name="name" value="{{ $user->name }}" class="w-full border p-2 mb-3">
                <input name="email" value="{{ $user->email }}" class="w-full border p-2 mb-3">

                <input type="password" name="password" placeholder="New Password (optional)" 
                    class="w-full border p-2 mb-3">

                <select name="role" class="w-full border p-2 mb-3">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                </select>

                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full">
                    Update User
                </button>
            </form>

        </div>

</x-app-layout>
