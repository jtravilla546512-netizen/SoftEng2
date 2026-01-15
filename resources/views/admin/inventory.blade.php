<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management Dashboard - CoolSystem Spec Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Lato', sans-serif;
            background: url("{{ asset('images/Background.png') }}") no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-[#F5EEE7]">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b">
                <img src="{{ asset('images/coolsystem-logo.png') }}" alt="CoolSystem Spec Admin" class="w-full">
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span class="font-medium" style="font-family: 'Roboto', sans-serif;">Sales Management</span>
                </a>

                <a href="{{ route('admin.inventory') }}" class="flex items-center space-x-3 px-4 py-3 bg-[#2B9DD1] text-white rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <span class="font-bold" style="font-family: 'Roboto', sans-serif;">Inventory Management</span>
                </a>

                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="font-medium" style="font-family: 'Roboto', sans-serif;">Customer Profiles</span>
                </a>

                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="font-medium" style="font-family: 'Roboto', sans-serif;">Reports and Analytics</span>
                </a>
            </nav>

            <!-- Log Out Button -->
            <div class="p-4 border-t">
                <a href="/#admin" class="block w-full px-4 py-3 text-left text-gray-700 hover:bg-gray-100 rounded-lg font-medium" style="font-family: 'Roboto', sans-serif;">
                    Log Out
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="py-6">
                <div class="inline-block bg-[#2B9DD1] text-white px-8 py-3 rounded-r-full shadow-lg">
                    <h1 class="text-2xl font-bold whitespace-nowrap" style="font-family: 'Roboto', sans-serif;">Inventory Management Dashboard</h1>
                </div>
            </header>

            <div class="p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-4 gap-6 mb-8">
                    <div class="bg-[#2B9DD1] text-white rounded-lg shadow-lg p-6">
                        <p class="text-sm opacity-90 mb-2" style="font-family: 'Lato', sans-serif;">Total Items</p>
                        <p class="text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">8</p>
                    </div>
                    <div class="bg-[#2B9DD1] text-white rounded-lg shadow-lg p-6">
                        <p class="text-sm opacity-90 mb-2" style="font-family: 'Lato', sans-serif;">Low Stock</p>
                        <p class="text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">1</p>
                    </div>
                    <div class="bg-[#2B9DD1] text-white rounded-lg shadow-lg p-6">
                        <p class="text-sm opacity-90 mb-2" style="font-family: 'Lato', sans-serif;">Out of Stock</p>
                        <p class="text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">0</p>
                    </div>
                    <div class="bg-[#2B9DD1] text-white rounded-lg shadow-lg p-6">
                        <p class="text-sm opacity-90 mb-2" style="font-family: 'Lato', sans-serif;">Total Value</p>
                        <p class="text-2xl font-bold" style="font-family: 'Roboto', sans-serif;">₱1,387,000.00</p>
                    </div>
                </div>

                <!-- Filters and Add Button -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4 flex-1">
                            <input type="text" placeholder="Search by name" class="border border-gray-300 rounded-lg px-4 py-2 w-80 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                            <select class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option>Search by Category</option>
                                <option>Aircon Unit</option>
                                <option>Spare Parts</option>
                                <option>Refrigerator Unit</option>
                            </select>
                            <select class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option>Search by Brand</option>
                                <option>Carrier</option>
                                <option>Samsung</option>
                                <option>LG</option>
                                <option>Daikin</option>
                            </select>
                        </div>
                        <button onclick="openAddItemModal()" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white font-semibold rounded-lg transition-colors flex items-center space-x-2" style="font-family: 'Roboto', sans-serif;">
                            <span class="text-lg">+</span>
                            <span>Add New Item</span>
                        </button>
                    </div>

                    <!-- Product Grid -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Product Card 1 -->
                        <div class="border border-gray-300 rounded-lg p-4 bg-white hover:shadow-lg transition-shadow">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center justify-center w-16 h-16 bg-gray-100 rounded-lg mb-3">
                                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-1" style="font-family: 'Lato', sans-serif;">Aircon Unit</p>
                                    <h3 class="font-bold text-gray-900 mb-2" style="font-family: 'Roboto', sans-serif;">Ceiling Cassette Air Conditioner 2HP</h3>
                                    <p class="text-sm text-gray-600 mb-3" style="font-family: 'Lato', sans-serif;">Brand: Carrier</p>
                                    <p class="text-2xl font-bold text-[#2B9DD1] mb-2" style="font-family: 'Roboto', sans-serif;">₱58,000.00</p>
                                    <p class="text-sm text-gray-700" style="font-family: 'Lato', sans-serif;">Stock: <span class="font-semibold">3</span> <span class="text-green-600">(In Stock)</span></p>
                                </div>
                                <div class="relative">
                                    <button onclick="toggleDropdown('dropdown1')" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                    <div id="dropdown1" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                                        <button onclick="openViewDetailsModal()" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">View Details</button>
                                        <button onclick="openEditModal()" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">Edit Info</button>
                                        <button onclick="confirmDelete()" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 2 -->
                        <div class="border border-gray-300 rounded-lg p-4 bg-white hover:shadow-lg transition-shadow">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center justify-center w-16 h-16 bg-gray-100 rounded-lg mb-3">
                                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-1" style="font-family: 'Lato', sans-serif;">Aircon Unit</p>
                                    <h3 class="font-bold text-gray-900 mb-2" style="font-family: 'Roboto', sans-serif;">Ceiling Cassette Air Conditioner 2HP</h3>
                                    <p class="text-sm text-gray-600 mb-3" style="font-family: 'Lato', sans-serif;">Brand: Carrier</p>
                                    <p class="text-2xl font-bold text-[#2B9DD1] mb-2" style="font-family: 'Roboto', sans-serif;">₱58,000.00</p>
                                    <p class="text-sm text-gray-700" style="font-family: 'Lato', sans-serif;">Stock: <span class="font-semibold">3</span> <span class="text-green-600">(In Stock)</span></p>
                                </div>
                                <div class="relative">
                                    <button onclick="toggleDropdown('dropdown2')" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                    <div id="dropdown2" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                                        <button onclick="openViewDetailsModal()" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">View Details</button>
                                        <button onclick="openEditModal()" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">Edit Info</button>
                                        <button onclick="confirmDelete()" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 3 -->
                        <div class="border border-gray-300 rounded-lg p-4 bg-white hover:shadow-lg transition-shadow">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center justify-center w-16 h-16 bg-gray-100 rounded-lg mb-3">
                                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-1" style="font-family: 'Lato', sans-serif;">Spare Parts</p>
                                    <h3 class="font-bold text-gray-900 mb-2" style="font-family: 'Roboto', sans-serif;">Refrigerant R410A 10kg</h3>
                                    <p class="text-sm text-gray-600 mb-3" style="font-family: 'Lato', sans-serif;">Brand: Carrier</p>
                                    <p class="text-2xl font-bold text-[#2B9DD1] mb-2" style="font-family: 'Roboto', sans-serif;">₱4,800.00</p>
                                    <p class="text-sm text-gray-700" style="font-family: 'Lato', sans-serif;">Stock: <span class="font-semibold">25</span> <span class="text-green-600">(In Stock)</span></p>
                                </div>
                                <div class="relative">
                                    <button onclick="toggleDropdown('dropdown3')" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                    <div id="dropdown3" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                                        <button onclick="openViewDetailsModal()" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">View Details</button>
                                        <button onclick="openEditModal()" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">Edit Info</button>
                                        <button onclick="confirmDelete()" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 4 -->
                        <div class="border border-gray-300 rounded-lg p-4 bg-white hover:shadow-lg transition-shadow">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center justify-center w-16 h-16 bg-gray-100 rounded-lg mb-3">
                                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-1" style="font-family: 'Lato', sans-serif;">Refrigerator Unit</p>
                                    <h3 class="font-bold text-gray-900 mb-2" style="font-family: 'Roboto', sans-serif;">Single Door Refrigerator 3.2 cu ft</h3>
                                    <p class="text-sm text-gray-600 mb-3" style="font-family: 'Lato', sans-serif;">Brand: Samsung</p>
                                    <p class="text-2xl font-bold text-[#2B9DD1] mb-2" style="font-family: 'Roboto', sans-serif;">₱16,500.00</p>
                                    <p class="text-sm text-gray-700" style="font-family: 'Lato', sans-serif;">Stock: <span class="font-semibold">6</span> <span class="text-green-600">(In Stock)</span></p>
                                </div>
                                <div class="relative">
                                    <button onclick="toggleDropdown('dropdown4')" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                    <div id="dropdown4" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                                        <button onclick="openViewDetailsModal()" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">View Details</button>
                                        <button onclick="openEditModal()" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">Edit Info</button>
                                        <button onclick="confirmDelete()" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition-colors" style="font-family: 'Lato', sans-serif;">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6 flex items-center justify-center space-x-2">
                        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100" style="font-family: 'Roboto', sans-serif;">1</button>
                        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100" style="font-family: 'Roboto', sans-serif;">2</button>
                        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100" style="font-family: 'Roboto', sans-serif;">3</button>
                        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100" style="font-family: 'Roboto', sans-serif;">4</button>
                        <button class="px-4 py-2 text-sm font-medium text-white bg-[#2B9DD1] rounded-md hover:bg-[#1e7ba8]" style="font-family: 'Roboto', sans-serif;">Next</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- View Details Modal -->
    <div id="viewDetailsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Ceiling Cassette Air Conditioner 2HP</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 200px);">
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <!-- Left Column - Item Details -->
                    <div class="border border-gray-300 rounded-lg p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-4" style="font-family: 'Roboto', sans-serif;">Item Details</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Name:</span>
                                <span class="text-gray-900" style="font-family: 'Lato', sans-serif;">Air Filter Set</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Category:</span>
                                <span class="text-gray-900" style="font-family: 'Lato', sans-serif;">Aircon Unit</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Brand:</span>
                                <span class="text-gray-900" style="font-family: 'Lato', sans-serif;">Daikin</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Stock Qty:</span>
                                <span class="text-gray-900" style="font-family: 'Lato', sans-serif;">50</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Threshold:</span>
                                <span class="text-gray-900" style="font-family: 'Lato', sans-serif;">50</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Item ID:</span>
                                <span class="text-gray-900" style="font-family: 'Lato', sans-serif;">50</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Created:</span>
                                <span class="text-gray-900" style="font-family: 'Lato', sans-serif;">Oct. 01, 2025</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Last Updated:</span>
                                <span class="text-gray-900" style="font-family: 'Lato', sans-serif;">Oct. 01, 2025</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-300">
                            <span class="text-gray-700 font-semibold block mb-2" style="font-family: 'Lato', sans-serif;">Description:</span>
                            <p class="text-sm text-gray-900" style="font-family: 'Lato', sans-serif;">A powerful and space-saving cooling solution ideal for offices, shops, and large rooms.</p>
                        </div>
                    </div>

                    <!-- Right Column - Pricing Value -->
                    <div class="border border-gray-300 rounded-lg p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-4" style="font-family: 'Roboto', sans-serif;">Pricing Value</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="text-center flex-1">
                                    <p class="text-sm text-gray-700 mb-1" style="font-family: 'Lato', sans-serif;">Unit Price</p>
                                    <p class="text-xl font-bold text-[#2B9DD1]" style="font-family: 'Roboto', sans-serif;">₱56,000.00</p>
                                </div>
                                <div class="text-center flex-1">
                                    <p class="text-sm text-gray-700 mb-1" style="font-family: 'Lato', sans-serif;">Selling Price</p>
                                    <p class="text-xl font-bold text-[#2B9DD1]" style="font-family: 'Roboto', sans-serif;">₱58,000.00</p>
                                </div>
                                <div class="text-center flex-1">
                                    <p class="text-sm text-gray-700 mb-1" style="font-family: 'Lato', sans-serif;">Profit Margin</p>
                                    <p class="text-xl font-bold text-green-600" style="font-family: 'Roboto', sans-serif;">₱2,000.00</p>
                                </div>
                            </div>
                            <div class="pt-4 border-t border-gray-300">
                                <div class="flex justify-between mb-2">
                                    <span class="text-sm text-gray-700" style="font-family: 'Lato', sans-serif;">Total Stock Value (Unit Price) :</span>
                                    <span class="text-sm font-bold text-gray-900" style="font-family: 'Lato', sans-serif;">₱168,000.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-700" style="font-family: 'Lato', sans-serif;">Total Stock Value (Selling) :</span>
                                    <span class="text-sm font-bold text-gray-900" style="font-family: 'Lato', sans-serif;">₱174,000.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-6 space-y-3">
                            <button onclick="openStockInModal()" class="w-full px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors flex items-center justify-center space-x-2" style="font-family: 'Roboto', sans-serif;">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <span>Stock In</span>
                            </button>
                            <button onclick="openStockOutModal()" class="w-full px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-lg transition-colors flex items-center justify-center space-x-2" style="font-family: 'Roboto', sans-serif;">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                </svg>
                                <span>Stock Out</span>
                            </button>
                            <button onclick="openUpdatePriceModal()" class="w-full px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white font-semibold rounded-lg transition-colors flex items-center justify-center space-x-2" style="font-family: 'Roboto', sans-serif;">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Update Price</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-start">
                <button onclick="closeViewDetailsModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
            </div>
        </div>
    </div>

    <!-- Add New Item Modal -->
    <div id="addItemModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Add New Item</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <!-- Basic Information -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Basic Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Item Name <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="Enter Item Name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Description</label>
                            <textarea rows="3" placeholder="Enter Item Description" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Product Image</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                <p class="text-sm text-gray-500 mb-2" style="font-family: 'Lato', sans-serif;">Current Image</p>
                                <p class="text-xs text-gray-400 mb-3" style="font-family: 'Lato', sans-serif;">Upload a new image to replace the one</p>
                                <input type="file" class="hidden" id="productImage" accept="image/*">
                                <label for="productImage" class="inline-block px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg cursor-pointer transition-colors text-sm font-medium" style="font-family: 'Lato', sans-serif;">
                                    Choose File
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categorization -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Categorization</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Category <span class="text-red-500">*</span></label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option>Select Aircon Unit</option>
                                <option>Aircon Unit</option>
                                <option>Spare Parts</option>
                                <option>Refrigerator Unit</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Brand <span class="text-red-500">*</span></label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option>Select Brand Name</option>
                                <option>Carrier</option>
                                <option>Daikin</option>
                                <option>LG</option>
                                <option>Samsung</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Pricing</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Cost Price <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-600" style="font-family: 'Lato', sans-serif;">₱</span>
                                <input type="number" placeholder="0.00" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Selling Price <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-600" style="font-family: 'Lato', sans-serif;">₱</span>
                                <input type="number" placeholder="0.00" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stock -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Stock</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Stock Quantity <span class="text-red-500">*</span></label>
                            <input type="number" placeholder="0" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Minimum Stock Level <span class="text-red-500">*</span></label>
                            <input type="number" placeholder="0" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeAddItemModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Add Item
                </button>
            </div>
        </div>
    </div>

    <!-- Edit Product Info Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Edit Inventory Item</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <!-- Basic Information -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Basic Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Item Name <span class="text-red-500">*</span></label>
                            <input type="text" value="Ceiling Cassette Air Conditioner 2HP" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Description</label>
                            <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">A powerful and space-saving cooling solution ideal for offices, shops, and large rooms.</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Product Image</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                <p class="text-sm text-gray-500 mb-2" style="font-family: 'Lato', sans-serif;">Current Image</p>
                                <p class="text-xs text-gray-400 mb-3" style="font-family: 'Lato', sans-serif;">Upload a new image to replace this one</p>
                                <input type="file" class="hidden" id="editProductImage" accept="image/*">
                                <label for="editProductImage" class="inline-block px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg cursor-pointer transition-colors text-sm font-medium" style="font-family: 'Lato', sans-serif;">
                                    Choose File
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categorization -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Categorization</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Category <span class="text-red-500">*</span></label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option selected>Aircon Unit</option>
                                <option>Spare Parts</option>
                                <option>Refrigerator Unit</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Brand <span class="text-red-500">*</span></label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option>Carrier</option>
                                <option selected>Daikin</option>
                                <option>LG</option>
                                <option>Samsung</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Minimum Stock Level -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Stock Settings</h3>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Minimum Stock Level <span class="text-red-500">*</span></label>
                        <input type="number" value="15" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        <p class="text-xs text-gray-500 mt-1" style="font-family: 'Lato', sans-serif;">System will alert when stock falls below this level</p>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeEditModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Edit Details
                </button>
            </div>
        </div>
    </div>

    <!-- Stock In Modal -->
    <div id="stockInModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-green-600 text-white px-6 py-4">
                <h2 class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Stock In - Add Inventory</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <!-- Product Info Display -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-3" style="font-family: 'Roboto', sans-serif;">Ceiling Cassette Air Conditioner 2HP</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600" style="font-family: 'Lato', sans-serif;">Category:</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">Aircon Unit</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600" style="font-family: 'Lato', sans-serif;">Current Stock:</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">50 units</span>
                        </div>
                    </div>
                </div>

                <!-- Stock In Form -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Quantity to Add <span class="text-red-500">*</span></label>
                        <input type="number" placeholder="0" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Supplier</label>
                        <input type="text" placeholder="Enter supplier name (optional)" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Cost Price per Unit</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-600" style="font-family: 'Lato', sans-serif;">₱</span>
                            <input type="number" placeholder="0.00" step="0.01" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        </div>
                        <p class="text-xs text-gray-500 mt-1" style="font-family: 'Lato', sans-serif;">Cost price for this batch only (won't update product's base price)</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Reference Number</label>
                        <input type="text" placeholder="PO#, Invoice#, or other reference" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Date</label>
                        <input type="date" value="2026-01-15" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Notes / Reason</label>
                        <textarea rows="3" placeholder="Additional notes (optional)" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;"></textarea>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeStockInModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Add Stock
                </button>
            </div>
        </div>
    </div>

    <!-- Stock Out Modal -->
    <div id="stockOutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-orange-500 text-white px-6 py-4">
                <h2 class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Stock Out - Remove Inventory</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <!-- Product Info Display -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-3" style="font-family: 'Roboto', sans-serif;">Ceiling Cassette Air Conditioner 2HP</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600" style="font-family: 'Lato', sans-serif;">Category:</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">Aircon Unit</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600" style="font-family: 'Lato', sans-serif;">Current Stock:</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">50 units</span>
                        </div>
                    </div>
                </div>

                <!-- Stock Out Form -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Quantity to Remove <span class="text-red-500">*</span></label>
                        <input type="number" placeholder="0" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Reason <span class="text-red-500">*</span></label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                            <option value="">Select reason</option>
                            <option>Used for Service</option>
                            <option>Damaged</option>
                            <option>Expired</option>
                            <option>Returned to Supplier</option>
                            <option>Lost/Stolen</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Reference Number</label>
                        <input type="text" placeholder="Booking ID, Ticket#, or other reference" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        <p class="text-xs text-gray-500 mt-1" style="font-family: 'Lato', sans-serif;">If used for customer service, enter the booking ID</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Date</label>
                        <input type="date" value="2026-01-15" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Notes</label>
                        <textarea rows="3" placeholder="Additional notes (optional)" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;"></textarea>
                    </div>
                </div>

                <!-- Warning Message -->
                <div class="mt-4 p-3 bg-orange-50 border border-orange-200 rounded-lg">
                    <p class="text-sm text-orange-800" style="font-family: 'Lato', sans-serif;">
                        <strong>Warning:</strong> This will reduce your inventory count. Make sure the information is accurate.
                    </p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeStockOutModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Remove Stock
                </button>
            </div>
        </div>
    </div>

    <!-- Update Price Modal -->
    <div id="updatePriceModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Update Price</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <!-- Product Info Display -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-3" style="font-family: 'Roboto', sans-serif;">Ceiling Cassette Air Conditioner 2HP</h3>
                    <div class="grid grid-cols-3 gap-4 text-sm">
                        <div class="text-center">
                            <span class="text-gray-600 block mb-1" style="font-family: 'Lato', sans-serif;">Category</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">Aircon Unit</span>
                        </div>
                        <div class="text-center">
                            <span class="text-gray-600 block mb-1" style="font-family: 'Lato', sans-serif;">Brand</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">Daikin</span>
                        </div>
                        <div class="text-center">
                            <span class="text-gray-600 block mb-1" style="font-family: 'Lato', sans-serif;">Current Stock</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">50 units</span>
                        </div>
                    </div>
                </div>

                <!-- Current Prices -->
                <div class="mb-6">
                    <h4 class="text-md font-bold text-gray-900 mb-3" style="font-family: 'Roboto', sans-serif;">Current Pricing</h4>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg text-center">
                            <p class="text-xs text-gray-600 mb-1" style="font-family: 'Lato', sans-serif;">Cost Price</p>
                            <p class="text-lg font-bold text-gray-900" style="font-family: 'Roboto', sans-serif;">₱56,000.00</p>
                        </div>
                        <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg text-center">
                            <p class="text-xs text-gray-600 mb-1" style="font-family: 'Lato', sans-serif;">Selling Price</p>
                            <p class="text-lg font-bold text-gray-900" style="font-family: 'Roboto', sans-serif;">₱58,000.00</p>
                        </div>
                        <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-center">
                            <p class="text-xs text-gray-600 mb-1" style="font-family: 'Lato', sans-serif;">Profit Margin</p>
                            <p class="text-lg font-bold text-green-600" style="font-family: 'Roboto', sans-serif;">₱2,000.00</p>
                        </div>
                    </div>
                </div>

                <!-- New Prices Form -->
                <div class="mb-6">
                    <h4 class="text-md font-bold text-gray-900 mb-3" style="font-family: 'Roboto', sans-serif;">New Pricing</h4>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">New Cost Price</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-600" style="font-family: 'Lato', sans-serif;">₱</span>
                                <input type="number" placeholder="56000.00" step="0.01" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" id="newCostPrice" oninput="calculateProfit()">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">New Selling Price</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-600" style="font-family: 'Lato', sans-serif;">₱</span>
                                <input type="number" placeholder="58000.00" step="0.01" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" id="newSellingPrice" oninput="calculateProfit()">
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-100 rounded-lg border border-gray-300">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-semibold text-gray-700" style="font-family: 'Lato', sans-serif;">New Profit Margin:</span>
                            <span class="text-xl font-bold text-green-600" style="font-family: 'Roboto', sans-serif;" id="newProfitMargin">₱0.00</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Effective Date</label>
                        <input type="date" value="2026-01-15" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Reason for Change <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="e.g., Supplier price increase, Market adjustment" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                    </div>
                </div>

                <!-- Info Notice -->
                <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                    <p class="text-sm text-blue-800" style="font-family: 'Lato', sans-serif;">
                        <strong>Note:</strong> Price change will be recorded in history. Previous prices will remain visible in transaction history.
                    </p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeUpdatePriceModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Update Price
                </button>
            </div>
        </div>
    </div>

    <script>
        // Toggle dropdown menu
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            // Close all other dropdowns
            document.querySelectorAll('[id^="dropdown"]').forEach(d => {
                if (d.id !== dropdownId) d.classList.add('hidden');
            });
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('button')) {
                document.querySelectorAll('[id^="dropdown"]').forEach(d => {
                    d.classList.add('hidden');
                });
            }
        });

        // Modal Functions
        function openAddItemModal() {
            document.getElementById('addItemModal').classList.remove('hidden');
        }

        function closeAddItemModal() {
            document.getElementById('addItemModal').classList.add('hidden');
        }

        function openViewDetailsModal() {
            document.querySelectorAll('[id^="dropdown"]').forEach(d => d.classList.add('hidden'));
            document.getElementById('viewDetailsModal').classList.remove('hidden');
        }

        function closeViewDetailsModal() {
            document.getElementById('viewDetailsModal').classList.add('hidden');
        }

        function openEditModal() {
            document.querySelectorAll('[id^="dropdown"]').forEach(d => d.classList.add('hidden'));
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function openStockInModal() {
            closeViewDetailsModal();
            document.getElementById('stockInModal').classList.remove('hidden');
        }

        function closeStockInModal() {
            document.getElementById('stockInModal').classList.add('hidden');
            openViewDetailsModal();
        }

        function openStockOutModal() {
            closeViewDetailsModal();
            document.getElementById('stockOutModal').classList.remove('hidden');
        }

        function closeStockOutModal() {
            document.getElementById('stockOutModal').classList.add('hidden');
            openViewDetailsModal();
        }

        function openUpdatePriceModal() {
            closeViewDetailsModal();
            document.getElementById('updatePriceModal').classList.remove('hidden');
        }

        function closeUpdatePriceModal() {
            document.getElementById('updatePriceModal').classList.add('hidden');
            openViewDetailsModal();
        }

        function confirmDelete() {
            if (confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                alert('Item deleted successfully!');
                // Add delete logic here
            }
        }

        // Calculate profit margin in Update Price modal
        function calculateProfit() {
            const costPrice = parseFloat(document.getElementById('newCostPrice').value) || 0;
            const sellingPrice = parseFloat(document.getElementById('newSellingPrice').value) || 0;
            const profit = sellingPrice - costPrice;
            document.getElementById('newProfitMargin').textContent = '₱' + profit.toFixed(2);
        }

        // Close modals when clicking outside
        document.addEventListener('click', function(event) {
            if (event.target.id === 'addItemModal') closeAddItemModal();
            if (event.target.id === 'viewDetailsModal') closeViewDetailsModal();
            if (event.target.id === 'editModal') closeEditModal();
            if (event.target.id === 'stockInModal') closeStockInModal();
            if (event.target.id === 'stockOutModal') closeStockOutModal();
            if (event.target.id === 'updatePriceModal') closeUpdatePriceModal();
        });
    </script>
</body>
</html>
