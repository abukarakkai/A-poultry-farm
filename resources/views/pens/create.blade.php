<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-6">

        <h2 class="text-2xl font-bold mb-6">Create New Pen</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pens.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Pen Name</label>
                <input type="text" name="name"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium">Type</label>
                <select name="type"
                        class="w-full border rounded px-3 py-2"
                        required>
                    <option value="">Select Type</option>
                    <option value="Layers">Layers</option>
                    <option value="Broilers">Broilers</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Initial Birds</label>
                <input type="number" name="initial_birds"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium">Start Date</label>
                <input type="date" name="start_date"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium">Notes</label>
                <textarea name="notes"
                          class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div class="flex gap-4">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save Pen
                </button>

                <a href="{{ route('pens.index') }}"
                   class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</x-app-layout>