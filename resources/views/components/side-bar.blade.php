<div 
    x-show="sidebarOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-x-full"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform -translate-x-full"
    @click.away="sidebarOpen = false"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg overflow-y-auto"
>
    <div class="flex flex-col h-full">
        {{-- Workspace Header --}}
        <div class="p-5 border-b flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-8 h-8">
                <span class="poppins text-sm ml-2">Daily Management</span> <!-- Added margin-left -->
            </div>
            <button 
                @click="sidebarOpen = false"
                class="text-gray-600 hover:bg-gray-200 p-1 rounded"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Sidebar Content --}}
        <nav class="flex-grow overflow-y-auto">
            <div class="p-4">
                <h3 class="text-xs uppercase text-gray-500 mb-2">Boards</h3>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('boards.index') }}" class="flex items-center p-2 hover:bg-gray-100 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                            </svg>
                            Board
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 hover:bg-gray-100 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h16M3 8h16M3 12h16M3 16h16M3 20h16" />
                            </svg>
                            Project Tracker
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Upgrade Section --}}
        <div class="p-4 border-t">
            <div class="bg-blue-50 p-3 rounded-lg text-center">
                <p class="text-sm text-blue-800 mb-2">Upgrade to Premium</p>
                <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                    Try Free
                </button>
            </div>
        </div>
    </div>
</div>


<!-- resources/views/components/sidebar.blade.php -->
<div x-show="sidebarOpen" class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-black opacity-50" @click="sidebarOpen = false"></div>
    <div class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-800">
        <div class="absolute top-0 right-0 -mr-12 pt-2">
            <button @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                <span class="sr-only">Close sidebar</span>
                <!-- Close Icon -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex-1 h-0 pt-5 overflow-y-auto">
            <nav class="mt-5 px-2 space-y-1">
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Settings</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Profile</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Logout</a>
            </nav>
        </div>
    </div>
</div>
