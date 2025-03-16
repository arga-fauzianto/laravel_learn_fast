<div x-data="{ isOpen: false }" @keydown.escape="isOpen = false">
    <button @click="isOpen = true" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600 transition duration-200">Create Board</button>

    <div x-show="isOpen" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;" @click.away="isOpen = false">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
            <h2 class="text-2xl font-bold mb-4">Create a New Board</h2>
            <form action="{{ route('boards.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="boardName" class="block text-gray-700 font-semibold mb-2">Board Name</label>
                    <input type="text" id="boardName" name="name" required class="border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter board name">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea id="description" name="description" rows="3" class="border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter a brief description"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="isOpen = false" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2 hover:bg-gray-400 transition duration-200">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Create Board</button>
                </div>
            </form>
        </div>
    </div>
</div>
