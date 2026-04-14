<x-app-layout>
    <style>
.tab-btn {
    padding: 8px 12px;
    border-bottom: 2px solid transparent;
}

.tab-btn:hover {
    border-color: #f59e0b;
}
</style>
<section class="py-6 flex-1 overflow-auto ">

    @if(session('success'))
    <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
        {{ session('success') }}
    </div>
    @endif
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-2xl shadow">


        <h2 class="text-xl font-bold mb-6">Settings</h2>
        <!-- Tabs -->
        <div class="flex gap-4 border-b mb-6">
            <button onclick="showTab('farm')" class="tab-btn">Farm Info</button>
            <button onclick="showTab('profile')" class="tab-btn">Profile</button>
            <button onclick="showTab('system')" class="tab-btn">System</button>
        </div>

        <!-- FARM INFO -->
        <div id="farm" class="tab-content">
            <form method="POST" action="{{ route('settings.system') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <input name="farm_name" value="{{ $setting->farm_name ?? '' }}" placeholder="Farm Name"
                        class="border rounded-lg px-3 py-2">

                    <input name="phone" value="{{ $setting->phone ?? '' }}" placeholder="Phone"
                        class="border rounded-lg px-3 py-2">

                    <input name="address" value="{{ $setting->address ?? '' }}" placeholder="Address"
                        class="border rounded-lg px-3 py-2 md:col-span-2">

                    <!-- Logo -->
            <div>
        <label class="text-sm">Logo</label>
        <input type="file" name="logo" id="logoInput" class="block mt-1">

        <img id="logoPreview"
            src="{{ $setting && $setting->logo ? asset('storage/'.$setting->logo) : '' }}"
            class="h-16 mt-2 rounded border">
    </div>


            </div>

            <button class="mt-4 bg-yellow-600 text-white px-6 py-2 rounded-lg">
                Save
            </button>
        </form>
    </div>

    <!-- PROFILE -->
    <div id="profile" class="tab-content hidden">
        <form method="POST" action="{{ route('settings.profile') }}">
            @csrf

            <div class="grid gap-4">

                <input name="name" value="{{ $user->name }}" class="border px-3 py-2 rounded-lg">
                <input name="email" value="{{ $user->email }}" class="border px-3 py-2 rounded-lg">

                <input type="password" name="password" placeholder="New Password (optional)"
                    class="border px-3 py-2 rounded-lg">

            </div>

            <button class="mt-4 bg-green-600 text-white px-6 py-2 rounded-lg">
                Update Profile
            </button>
        </form>
    </div>

    <!-- SYSTEM -->
    <!-- <div id="system" class="tab-content hidden">
        <form method="POST" action="{{ route('settings.system') }}">
            @csrf

            <div class="grid grid-cols-2 gap-4">

                <input name="currency" value="{{ $setting->currency ?? '₦' }}"
                    class="border px-3 py-2 rounded-lg">

                <input type="number" name="rows_per_page" value="{{ $setting->rows_per_page ?? 5 }}"
                    class="border px-3 py-2 rounded-lg">

            </div>

            <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg">
                Save Preferences
            </button>
        </form>
    </div> -->
    <!-- SYSTEM -->
        <div id="system" class="tab-content hidden">
            <form method="POST" action="{{ route('settings.system') }}">
                @csrf

                <h3 class="text-lg font-semibold mb-4">System Preferences</h3>

                <!-- Theme Selection -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Theme</label>

                    <div class="flex gap-4">

                        <!-- Light -->
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="theme" value="light"
                                {{ ($setting->theme ?? 'light') === 'light' ? 'checked' : '' }}>
                            <span>🌞 Light</span>
                        </label>

                        <!-- Dark -->
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="theme" value="dark"
                                {{ ($setting->theme ?? 'light') === 'dark' ? 'checked' : '' }}>
                            <span>🌙 Dark</span>
                        </label>

                    </div>
                </div>

                <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg">
                    Save Preferences
                </button>
            </form>
        </div>


</div> 


</section>

<script>

document.getElementById('logoInput')?.addEventListener('change', function(e) {
    const [file] = e.target.files;
    if (file) {
        document.getElementById('logoPreview').src = URL.createObjectURL(file);
    }
});

function showTab(tab) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.getElementById(tab).classList.remove('hidden');
}
</script>

</x-app-layout>