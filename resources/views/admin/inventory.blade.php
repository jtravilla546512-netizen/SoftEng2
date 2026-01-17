<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inventory Management Dashboard - CoolSystem Spec Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html, body {
            overflow-x: hidden;
            max-width: 100vw;
        }

        body {
            font-family: 'Lato', sans-serif;
            background: url("{{ asset('images/Background.png') }}") no-repeat center center fixed;
            background-size: cover;
        }

        /* Sidebar transition */
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }

        /* Overlay */
        #sidebarOverlay {
            transition: opacity 0.3s ease-in-out;
        }

        /* Custom scrollbar for mobile sidebar */
        #sidebar::-webkit-scrollbar {
            width: 4px;
        }

        #sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #sidebar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 2px;
        }

        #sidebar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body class="bg-[#F5EEE7]">
    <!-- Sidebar Overlay (Mobile/Tablet only) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <div class="flex h-screen overflow-hidden max-w-full">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:static top-0 left-0 h-full w-64 bg-white shadow-lg flex flex-col z-50 transform -translate-x-full lg:translate-x-0 overflow-y-auto">
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

                <a href="{{ route('admin.customers') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="font-medium" style="font-family: 'Roboto', sans-serif;">Customer Profiles</span>
                </a>

                <a href="{{ route('admin.technicians') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                    </svg>
                    <span class="font-medium" style="font-family: 'Roboto', sans-serif;">Technician Management</span>
                </a>

                <a href="{{ route('admin.reports') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="font-medium" style="font-family: 'Roboto', sans-serif;">Reports and Analytics</span>
                </a>

                <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="font-medium" style="font-family: 'Roboto', sans-serif;">Settings</span>
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
        <main class="flex-1 overflow-y-auto overflow-x-hidden max-w-full">
            <!-- Header -->
            <header class="py-4 sm:py-6">
                <div class="flex items-center justify-between px-2 sm:px-0 gap-2">
                    <!-- Hamburger Menu Button (Mobile/Tablet only) -->
                    <button id="hamburgerBtn" class="lg:hidden ml-4 p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#2B9DD1]">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Title -->
                    <div class="bg-[#2B9DD1] text-white px-4 sm:px-6 md:px-8 py-3 rounded-lg md:rounded-r-full shadow-lg mx-auto md:mx-0 md:inline-block">
                        <h1 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-center md:text-left whitespace-nowrap" style="font-family: 'Roboto', sans-serif;">Inventory Management Dashboard</h1>
                    </div>

                    <!-- Spacer removed for mobile center alignment -->
                </div>
            </header>

            <div class="p-4 sm:p-6 md:p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <div class="bg-[#2B9DD1] text-white rounded-lg shadow-lg p-4 sm:p-6">
                        <p class="text-xs sm:text-sm opacity-90 mb-1 sm:mb-2" style="font-family: 'Lato', sans-serif;">Total Items</p>
                        <p id="statTotalItems" class="text-2xl sm:text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">0</p>
                    </div>
                    <div class="bg-[#2B9DD1] text-white rounded-lg shadow-lg p-4 sm:p-6">
                        <p class="text-xs sm:text-sm opacity-90 mb-1 sm:mb-2" style="font-family: 'Lato', sans-serif;">Low Stock</p>
                        <p id="statLowStock" class="text-2xl sm:text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">0</p>
                    </div>
                    <div class="bg-[#2B9DD1] text-white rounded-lg shadow-lg p-4 sm:p-6">
                        <p class="text-xs sm:text-sm opacity-90 mb-1 sm:mb-2" style="font-family: 'Lato', sans-serif;">Out of Stock</p>
                        <p id="statOutOfStock" class="text-2xl sm:text-3xl font-bold" style="font-family: 'Roboto', sans-serif;">0</p>
                    </div>
                    <div class="bg-[#2B9DD1] text-white rounded-lg shadow-lg p-4 sm:p-6">
                        <p class="text-xs sm:text-sm opacity-90 mb-1 sm:mb-2" style="font-family: 'Lato', sans-serif;">Total Value</p>
                        <p id="statTotalValue" class="text-lg sm:text-2xl font-bold" style="font-family: 'Roboto', sans-serif;">₱0.00</p>
                    </div>
                </div>

                <!-- Filters and Add Button -->
                <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 mb-6">
                    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 mb-6">
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4 w-full lg:flex-1">
                            <input type="text" id="searchInput" placeholder="Search by name" onkeyup="filterInventory()" class="border border-gray-300 rounded-lg px-3 sm:px-4 py-2 w-full sm:w-64 lg:w-80 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                            <select id="categoryFilter" onchange="filterInventory()" class="border border-gray-300 rounded-lg px-3 sm:px-4 py-2 w-full sm:flex-1 lg:w-64 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option value="">All Categories</option>
                                <option>Aircon Unit</option>
                                <option>Aircon Spare Parts</option>
                                <option>Refrigerator Unit</option>
                                <option>Refrigerator Spare Parts</option>
                            </select>
                            <select id="brandFilter" onchange="filterInventory()" class="border border-gray-300 rounded-lg px-3 sm:px-4 py-2 w-full sm:flex-1 lg:w-64 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option value="">All Brands</option>
                                <option>Carrier</option>
                                <option>Samsung</option>
                                <option>LG</option>
                                <option>Daikin</option>
                            </select>
                            <select id="statusFilter" onchange="filterInventory()" class="border border-gray-300 rounded-lg px-3 sm:px-4 py-2 w-full sm:flex-1 lg:w-64 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option value="">All Status</option>
                                <option value="In Stock">In Stock</option>
                                <option value="Low Stock">Low Stock</option>
                                <option value="Out of Stock">Out of Stock</option>
                            </select>
                        </div>
                        <button onclick="openAddItemModal()" class="w-full lg:w-auto px-4 sm:px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm sm:text-base font-semibold rounded-lg transition-colors flex items-center justify-center space-x-2" style="font-family: 'Roboto', sans-serif;">
                            <span class="text-lg">+</span>
                            <span>Add New Item</span>
                        </button>
                    </div>

                    <!-- Product Grid -->
                    <div id="inventoryGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
                        <!-- Items will be loaded dynamically -->
                    </div>

                    <!-- Pagination -->
                    <div id="paginationContainer" class="mt-6 flex items-center justify-center gap-2">
                        <!-- Pagination will be dynamically generated -->
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
                <h2 id="viewItemName" class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Item Name</h2>
                <p id="viewItemBrand" class="text-sm opacity-90" style="font-family: 'Lato', sans-serif;">Brand</p>
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
                                <span id="viewDetailName" class="text-gray-900" style="font-family: 'Lato', sans-serif;">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Category:</span>
                                <span id="viewDetailCategory" class="text-gray-900" style="font-family: 'Lato', sans-serif;">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Brand:</span>
                                <span id="viewDetailBrand" class="text-gray-900" style="font-family: 'Lato', sans-serif;">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Stock Qty:</span>
                                <span id="viewDetailStock" class="text-gray-900" style="font-family: 'Lato', sans-serif;">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Threshold:</span>
                                <span id="viewDetailThreshold" class="text-gray-900" style="font-family: 'Lato', sans-serif;">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Item ID:</span>
                                <span id="viewDetailItemCode" class="text-gray-900" style="font-family: 'Lato', sans-serif;">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700 font-semibold" style="font-family: 'Lato', sans-serif;">Status:</span>
                                <span id="viewDetailStatus" class="text-gray-900" style="font-family: 'Lato', sans-serif;">-</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-300">
                            <span class="text-gray-700 font-semibold block mb-2" style="font-family: 'Lato', sans-serif;">Description:</span>
                            <p id="viewDetailDescription" class="text-sm text-gray-900" style="font-family: 'Lato', sans-serif;">-</p>
                        </div>
                    </div>

                    <!-- Right Column - Pricing Value -->
                    <div class="border border-gray-300 rounded-lg p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-4" style="font-family: 'Roboto', sans-serif;">Pricing Value</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="text-center flex-1">
                                    <p class="text-sm text-gray-700 mb-1" style="font-family: 'Lato', sans-serif;">Unit Price</p>
                                    <p id="viewDetailCostPrice" class="text-xl font-bold text-[#2B9DD1]" style="font-family: 'Roboto', sans-serif;">₱0.00</p>
                                </div>
                                <div class="text-center flex-1">
                                    <p class="text-sm text-gray-700 mb-1" style="font-family: 'Lato', sans-serif;">Selling Price</p>
                                    <p id="viewDetailSellingPrice" class="text-xl font-bold text-[#2B9DD1]" style="font-family: 'Roboto', sans-serif;">₱0.00</p>
                                </div>
                                <div class="text-center flex-1">
                                    <p class="text-sm text-gray-700 mb-1" style="font-family: 'Lato', sans-serif;">Profit Margin</p>
                                    <p id="viewDetailProfitMargin" class="text-xl font-bold text-green-600" style="font-family: 'Roboto', sans-serif;">₱0.00</p>
                                </div>
                            </div>
                            <div class="pt-4 border-t border-gray-300">
                                <div class="flex justify-between mb-2">
                                    <span class="text-sm text-gray-700" style="font-family: 'Lato', sans-serif;">Total Stock Value (Unit Price):</span>
                                    <span id="viewDetailTotalCost" class="text-sm font-bold text-gray-900" style="font-family: 'Lato', sans-serif;">₱0.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-700" style="font-family: 'Lato', sans-serif;">Total Stock Value (Selling):</span>
                                    <span id="viewDetailTotalSelling" class="text-sm font-bold text-gray-900" style="font-family: 'Lato', sans-serif;">₱0.00</span>
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
            <form id="addItemForm">
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <!-- Basic Information -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Basic Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Item Name <span class="text-red-500">*</span></label>
                            <input type="text" id="itemName" placeholder="Enter Item Name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Description</label>
                            <textarea rows="3" id="description" placeholder="Enter Item Description" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Product Image</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                <div id="addImagePreview" class="hidden mb-3">
                                    <img id="addPreviewImg" src="" alt="Preview" class="max-h-32 mx-auto rounded-lg">
                                </div>
                                <svg id="addImageIcon" xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p id="addImageText" class="text-sm text-gray-600 mb-2" style="font-family: 'Lato', sans-serif;">Click to upload image</p>
                                <p id="addImageHint" class="text-xs text-gray-500 mb-3" style="font-family: 'Lato', sans-serif;">PNG, JPG, GIF up to 2MB</p>
                                <input type="file" class="hidden" id="productImage" accept="image/*" onchange="previewAddImage(this)">
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
                            <select id="category" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                                <option value="">Select Category</option>
                                <option value="Aircon Unit">Aircon Unit</option>
                                <option value="Aircon Spare Parts">Aircon Spare Parts</option>
                                <option value="Refrigerator Unit">Refrigerator Unit</option>
                                <option value="Refrigerator Spare Parts">Refrigerator Spare Parts</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Brand <span class="text-red-500">*</span></label>
                            <input type="text" id="brand" placeholder="Enter Brand Name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
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
                                <input type="number" id="costPrice" placeholder="0.00" step="0.01" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Selling Price <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-600" style="font-family: 'Lato', sans-serif;">₱</span>
                                <input type="number" id="sellingPrice" placeholder="0.00" step="0.01" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stock -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Stock</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Initial Stock <span class="text-red-500">*</span></label>
                            <input type="number" id="initialStock" placeholder="0" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Minimum Stock Level <span class="text-red-500">*</span></label>
                            <input type="number" id="minStock" placeholder="0" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button type="button" onclick="closeAddItemModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button type="button" onclick="saveNewItem()" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Add Item
                </button>
            </div>
            </form>
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
                            <input type="text" id="editItemName" value="Ceiling Cassette Air Conditioner 2HP" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Description</label>
                            <textarea rows="3" id="editDescription" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">A powerful and space-saving cooling solution ideal for offices, shops, and large rooms.</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Product Image</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                <div id="editImagePreview" class="mb-3">
                                    <img id="editPreviewImg" src="" alt="Current Image" class="max-h-32 mx-auto rounded-lg">
                                </div>
                                <p class="text-xs text-gray-400 mb-3" style="font-family: 'Lato', sans-serif;">Upload a new image to replace this one</p>
                                <input type="file" class="hidden" id="editProductImage" accept="image/*" onchange="previewEditImage(this)">
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
                            <select id="editCategory" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                                <option value="Aircon Unit">Aircon Unit</option>
                                <option value="Aircon Spare Parts">Aircon Spare Parts</option>
                                <option value="Refrigerator Unit">Refrigerator Unit</option>
                                <option value="Refrigerator Spare Parts">Refrigerator Spare Parts</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Brand <span class="text-red-500">*</span></label>
                            <input type="text" id="editBrand" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        </div>
                    </div>
                </div>

                <!-- Minimum Stock Level -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#2B9DD1] mb-4" style="font-family: 'Roboto', sans-serif;">Stock Settings</h3>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Minimum Stock Level <span class="text-red-500">*</span></label>
                        <input type="number" id="editMinStock" value="15" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        <p class="text-xs text-gray-500 mt-1" style="font-family: 'Lato', sans-serif;">System will alert when stock falls below this level</p>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button type="button" onclick="closeEditModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button type="button" onclick="saveEditedItem()" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Save Changes
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
                    <h3 id="stockInItemName" class="text-lg font-bold text-gray-900 mb-3" style="font-family: 'Roboto', sans-serif;">Item Name</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-600" style="font-family: 'Lato', sans-serif;">Category:</span>
                            <span id="stockInCategory" class="text-gray-900 font-semibold ml-2" style="font-family: 'Lato', sans-serif;">-</span>
                        </div>
                        <div>
                            <span class="text-gray-600" style="font-family: 'Lato', sans-serif;">Current Stock:</span>
                            <span id="stockInCurrentStock" class="text-gray-900 font-semibold ml-2" style="font-family: 'Lato', sans-serif;">0 units</span>
                        </div>
                    </div>
                </div>

                <!-- Stock In Form -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Quantity to Add <span class="text-red-500">*</span></label>
                        <input type="number" id="stockInQuantity" placeholder="0" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Reason for Stock In <span class="text-red-500">*</span></label>
                        <select id="stockInReasonSelect" onchange="toggleCustomStockInReason()" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                            <option value="">Select a reason...</option>
                            <option value="Restock">Restock - Regular inventory replenishment</option>
                            <option value="New Delivery">New Delivery - Fresh supplier delivery</option>
                            <option value="Return from Customer">Return from Customer - Customer returned item</option>
                            <option value="Found Stock">Found Stock - Discovered missing inventory</option>
                            <option value="Transfer In">Transfer In - From another location/warehouse</option>
                            <option value="Damaged Item Replaced">Damaged Item Replaced - Insurance/warranty replacement</option>
                            <option value="Other">Other - Specify custom reason</option>
                        </select>
                    </div>

                    <div id="stockInCustomReasonDiv" class="hidden">
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Custom Reason</label>
                        <textarea rows="2" id="stockInCustomReason" placeholder="Please specify the custom reason..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Additional Notes (Optional)</label>
                        <textarea rows="2" id="stockInNotes" placeholder="e.g., Purchase order #12345, Supplier: ABC Company" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;"></textarea>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button type="button" onclick="closeStockInModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button type="button" onclick="confirmStockIn()" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
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
                    <h3 id="stockOutItemName" class="text-lg font-bold text-gray-900 mb-3" style="font-family: 'Roboto', sans-serif;">Item Name</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-600" style="font-family: 'Lato', sans-serif;">Category:</span>
                            <span id="stockOutCategory" class="text-gray-900 font-semibold ml-2" style="font-family: 'Lato', sans-serif;">-</span>
                        </div>
                        <div>
                            <span class="text-gray-600" style="font-family: 'Lato', sans-serif;">Current Stock:</span>
                            <span id="stockOutCurrentStock" class="text-gray-900 font-semibold ml-2" style="font-family: 'Lato', sans-serif;">0 units</span>
                        </div>
                    </div>
                </div>

                <!-- Stock Out Form -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Quantity to Remove <span class="text-red-500">*</span></label>
                        <input type="number" id="stockOutQuantity" placeholder="0" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Booking ID (Optional)</label>
                        <input type="text" id="stockOutBookingId" placeholder="Enter booking ID if used for service" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;">
                        <p class="text-xs text-gray-500 mt-1" style="font-family: 'Lato', sans-serif;">Link this stock movement to a specific booking</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Reason for Stock Out <span class="text-red-500">*</span></label>
                        <select id="stockOutReasonSelect" onchange="toggleCustomStockOutReason()" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;" required>
                            <option value="">Select a reason...</option>
                            <option value="Defective Item">Defective Item - Item is damaged/broken</option>
                            <option value="Return to Supplier">Return to Supplier - Sending back to vendor</option>
                            <option value="Used in Service">Used in Service - Consumed during job</option>
                            <option value="Lost/Missing">Lost/Missing - Cannot locate item</option>
                            <option value="Expired/Obsolete">Expired/Obsolete - Past useful life</option>
                            <option value="Transfer Out">Transfer Out - Moved to another location</option>
                            <option value="Theft/Damage">Theft/Damage - Security/accident loss</option>
                            <option value="Other">Other - Specify custom reason</option>
                        </select>
                    </div>

                    <div id="stockOutCustomReasonDiv" class="hidden">
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Custom Reason</label>
                        <textarea rows="2" id="stockOutCustomReason" placeholder="Please specify the custom reason..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2" style="font-family: 'Lato', sans-serif;">Additional Notes (Optional)</label>
                        <textarea rows="2" id="stockOutNotes" placeholder="e.g., More details about the stock removal..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent" style="font-family: 'Lato', sans-serif;"></textarea>
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
                <button type="button" onclick="closeStockOutModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button type="button" onclick="confirmStockOut()" class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
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
        // Hamburger Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            // Toggle sidebar
            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarOverlay.classList.toggle('hidden');
            }

            // Open sidebar
            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.remove('hidden');
            }

            // Close sidebar
            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }

            // Event listeners
            if (hamburgerBtn) {
                hamburgerBtn.addEventListener('click', toggleSidebar);
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar);
            }

            // Close sidebar when clicking on a navigation link (mobile only)
            const navLinks = sidebar.querySelectorAll('nav a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        closeSidebar();
                    }
                });
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                }
            });
        });

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

            // Reset form
            const form = document.getElementById('addItemForm');
            if (form) form.reset();

            // Clear image preview
            const preview = document.getElementById('addImagePreview');
            const icon = document.getElementById('addImageIcon');
            const text = document.getElementById('addImageText');
            const hint = document.getElementById('addImageHint');

            if (preview) preview.classList.add('hidden');
            if (icon) icon.classList.remove('hidden');
            if (text) text.classList.remove('hidden');
            if (hint) hint.classList.remove('hidden');
            document.getElementById('addPreviewImg').src = '';
        }

        function openViewDetailsModal() {
            document.querySelectorAll('[id^="dropdown"]').forEach(d => d.classList.add('hidden'));
            document.getElementById('viewDetailsModal').classList.remove('hidden');
        }

        function closeViewDetailsModal() {
            document.getElementById('viewDetailsModal').classList.add('hidden');
        }

        function openEditModal() {
            // Fetch current item details first
            if (!currentItemId) {
                alert('No item selected');
                return;
            }

            // Open modal first
            document.querySelectorAll('[id^="dropdown"]').forEach(d => d.classList.add('hidden'));
            closeViewDetailsModal();
            document.getElementById('editModal').classList.remove('hidden');

            // Then fetch and populate data
            fetch(`/api/inventory/${currentItemId}`)
                .then(response => response.json())
                .then(item => {
                    document.getElementById('editItemName').value = item.name;
                    document.getElementById('editBrand').value = item.brand || '';
                    document.getElementById('editCategory').value = item.category;
                    document.getElementById('editDescription').value = item.description || '';
                    document.getElementById('editMinStock').value = item.minimum_stock;
                })
                .catch(error => {
                    console.error('Error loading item for editing:', error);
                    alert('Failed to load item for editing.');
                    closeEditModal();
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Toggle custom reason fields
        function toggleCustomStockInReason() {
            const select = document.getElementById('stockInReasonSelect');
            const customDiv = document.getElementById('stockInCustomReasonDiv');
            const customTextarea = document.getElementById('stockInCustomReason');

            if (select.value === 'Other') {
                customDiv.classList.remove('hidden');
                customTextarea.required = true;
            } else {
                customDiv.classList.add('hidden');
                customTextarea.required = false;
                customTextarea.value = '';
            }
        }

        function toggleCustomStockOutReason() {
            const select = document.getElementById('stockOutReasonSelect');
            const customDiv = document.getElementById('stockOutCustomReasonDiv');
            const customTextarea = document.getElementById('stockOutCustomReason');

            if (select.value === 'Other') {
                customDiv.classList.remove('hidden');
                customTextarea.required = true;
            } else {
                customDiv.classList.add('hidden');
                customTextarea.required = false;
                customTextarea.value = '';
            }
        }

        function openStockInModal() {
            // Fetch current item details first
            if (currentItemId) {
                fetch(`/api/inventory/${currentItemId}`)
                    .then(response => response.json())
                    .then(item => {
                        document.getElementById('stockInItemName').textContent = item.name;
                        document.getElementById('stockInCategory').textContent = item.category;
                        document.getElementById('stockInCurrentStock').textContent = item.stock_quantity + ' units';
                    });
            }

            closeViewDetailsModal();
            document.getElementById('stockInModal').classList.remove('hidden');
        }

        function closeStockInModal() {
            document.getElementById('stockInModal').classList.add('hidden');
            currentItemId = null;

            // Clear form
            document.getElementById('stockInQuantity').value = '';
            document.getElementById('stockInReasonSelect').value = '';
            document.getElementById('stockInCustomReason').value = '';
            document.getElementById('stockInNotes').value = '';

            // Hide custom reason field
            document.getElementById('stockInCustomReasonDiv').classList.add('hidden');
            document.getElementById('stockInCustomReason').required = false;
        }

        function openStockOutModal() {
            // Fetch current item details first
            if (currentItemId) {
                fetch(`/api/inventory/${currentItemId}`)
                    .then(response => response.json())
                    .then(item => {
                        document.getElementById('stockOutItemName').textContent = item.name;
                        document.getElementById('stockOutCategory').textContent = item.category;
                        document.getElementById('stockOutCurrentStock').textContent = item.stock_quantity + ' units';
                        document.getElementById('stockOutQuantity').setAttribute('max', item.stock_quantity);
                    });
            }

            closeViewDetailsModal();
            document.getElementById('stockOutModal').classList.remove('hidden');
        }

        function closeStockOutModal() {
            document.getElementById('stockOutModal').classList.add('hidden');
            currentItemId = null;

            // Clear form
            document.getElementById('stockOutQuantity').value = '';
            document.getElementById('stockOutBookingId').value = '';
            document.getElementById('stockOutReasonSelect').value = '';
            document.getElementById('stockOutCustomReason').value = '';
            document.getElementById('stockOutNotes').value = '';

            // Hide custom reason field
            document.getElementById('stockOutCustomReasonDiv').classList.add('hidden');
            document.getElementById('stockOutCustomReason').required = false;
        }

        async function confirmStockOut() {
            try {
                const quantity = parseInt(document.getElementById('stockOutQuantity').value);
                const bookingId = document.getElementById('stockOutBookingId').value;
                const reasonSelect = document.getElementById('stockOutReasonSelect').value;
                const customReason = document.getElementById('stockOutCustomReason').value;
                const notes = document.getElementById('stockOutNotes').value;

                // Validate required fields
                if (!quantity || quantity <= 0) {
                    alert('Please enter a valid quantity');
                    return;
                }

                if (!reasonSelect) {
                    alert('Please select a reason for stock out');
                    return;
                }

                if (reasonSelect === 'Other' && !customReason.trim()) {
                    alert('Please specify the custom reason');
                    return;
                }

                // Build reason string
                let finalReason = reasonSelect;
                if (reasonSelect === 'Other') {
                    finalReason = customReason.trim();
                } else {
                    // Remove description part, keep only the main reason
                    finalReason = reasonSelect.split(' - ')[0];
                }

                // Add notes if provided
                if (notes.trim()) {
                    finalReason += ` | Notes: ${notes.trim()}`;
                }

                const data = {
                    quantity,
                    reason: finalReason
                };

                if (bookingId) {
                    data.booking_id = parseInt(bookingId);
                }

                const response = await fetch(`/api/inventory/${currentItemId}/remove-stock`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    alert(`Stock removed successfully! New quantity: ${result.item.stock_quantity}`);
                    closeStockOutModal();
                    await loadInventory();
                } else {
                    alert('Failed to remove stock: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error removing stock:', error);
                alert('Failed to remove stock.');
            }
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

        // ========== INVENTORY API INTEGRATION ==========
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let currentItemId = null;
        let allInventoryItems = []; // Store all items for filtering
        let filteredItems = []; // Store filtered items for pagination
        let currentPage = 1;
        const itemsPerPage = 12;

        // Filter inventory based on search and filters
        function filterInventory() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const categoryFilter = document.getElementById('categoryFilter').value;
            const brandFilter = document.getElementById('brandFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;

            filteredItems = allInventoryItems.filter(item => {
                const matchesSearch = item.name.toLowerCase().includes(searchTerm);
                const matchesCategory = !categoryFilter || item.category === categoryFilter;
                const matchesBrand = !brandFilter || item.brand === brandFilter;
                const matchesStatus = !statusFilter || item.status === statusFilter;

                return matchesSearch && matchesCategory && matchesBrand && matchesStatus;
            });

            // Reset to page 1 when filtering
            currentPage = 1;

            // Update display with filtered items
            renderInventoryItems(filteredItems);
            renderPagination(filteredItems);
            updateStats(filteredItems);
        }

        // Render inventory items to grid
        function renderInventoryItems(items) {
            const grid = document.getElementById('inventoryGrid');
            grid.innerHTML = '';

            if (items.length === 0) {
                grid.innerHTML = '<div class="col-span-full text-center py-8 text-gray-500">No items found matching your filters</div>';
                return;
            }

            // Pagination: slice items for current page
            const startIdx = (currentPage - 1) * itemsPerPage;
            const endIdx = startIdx + itemsPerPage;
            const paginatedItems = items.slice(startIdx, endIdx);

            paginatedItems.forEach(item => {
                const statusColor = item.status === 'In Stock' ? 'green' : item.status === 'Low Stock' ? 'yellow' : 'red';
                const statusText = item.status === 'In Stock' ? 'text-green-700' : item.status === 'Low Stock' ? 'text-yellow-700' : 'text-red-700';
                const statusBg = item.status === 'In Stock' ? 'bg-green-100' : item.status === 'Low Stock' ? 'bg-yellow-100' : 'bg-red-100';

                // Category badge colors - consistent per category
                let categoryBg = 'bg-gray-100';
                let categoryText = 'text-gray-700';
                if (item.category === 'Aircon Unit') {
                    categoryBg = 'bg-yellow-100';
                    categoryText = 'text-yellow-700';
                } else if (item.category === 'Aircon Spare Parts') {
                    categoryBg = 'bg-blue-100';
                    categoryText = 'text-blue-700';
                } else if (item.category === 'Refrigerator Unit') {
                    categoryBg = 'bg-purple-100';
                    categoryText = 'text-purple-700';
                } else if (item.category === 'Refrigerator Spare Parts') {
                    categoryBg = 'bg-green-100';
                    categoryText = 'text-green-700';
                }

                const card = `
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-4 sm:p-6">
                            <div class="flex justify-between items-start mb-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full ${categoryBg} ${categoryText}">${item.category}</span>
                                <div class="relative">
                                    <button onclick="toggleDropdown('dropdown${item.id}')" class="p-1 hover:bg-gray-100 rounded-lg transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                    <div id="dropdown${item.id}" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10 border border-gray-200">
                                        <a href="#" onclick="viewItemDetails(${item.id}); return false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">View Details</a>
                                        <a href="#" onclick="openEditItemModal(${item.id}); return false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">Edit</a>
                                        <a href="#" onclick="confirmDeleteItem(${item.id}); return false;" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-50 transition-colors">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <div class="w-20 h-20 mx-auto mb-3 flex items-center justify-center bg-gray-100 rounded-full overflow-hidden">
                                    ${item.image ?
                                        '<img src="' + item.image + '" alt="' + item.name + '" class="w-full h-full object-cover">' :
                                        '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>'
                                    }
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800">${item.name}</h3>
                                <p class="text-sm text-gray-500">${item.brand || 'Generic'}</p>
                            </div>
                            <div class="space-y-2 border-t pt-4">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Price:</span>
                                    <span class="font-semibold text-gray-800">₱${parseFloat(item.price).toFixed(2)}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Stock:</span>
                                    <span class="font-semibold ${statusText}">${item.stock_quantity} units</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                grid.innerHTML += card;
            });
        }

        // Update statistics cards
        async function updateStats(items = null) {
            try {
                // If items not provided, fetch stats from API
                if (!items) {
                    const response = await fetch('/api/inventory/stats');
                    const stats = await response.json();

                    document.getElementById('statTotalItems').textContent = stats.total_items || 0;
                    document.getElementById('statLowStock').textContent = stats.low_stock_count || 0;
                    document.getElementById('statOutOfStock').textContent = stats.out_of_stock_count || 0;
                    document.getElementById('statTotalValue').textContent = '₱' + (stats.total_value ? parseFloat(stats.total_value).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '0.00');
                } else {
                    // Calculate from provided items
                    const totalItems = items.length;
                    const lowStock = items.filter(item => item.status === 'Low Stock').length;
                    const outOfStock = items.filter(item => item.status === 'Out of Stock').length;
                    const totalValue = items.reduce((sum, item) => sum + (parseFloat(item.price) * item.stock_quantity), 0);

                    document.getElementById('statTotalItems').textContent = totalItems;
                    document.getElementById('statLowStock').textContent = lowStock;
                    document.getElementById('statOutOfStock').textContent = outOfStock;
                    document.getElementById('statTotalValue').textContent = '₱' + totalValue.toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                }
            } catch (error) {
                console.error('Error updating stats:', error);
            }
        }

        // Load inventory items
        async function loadInventory() {
            try {
                const response = await fetch('/api/inventory');
                const items = await response.json();

                allInventoryItems = items; // Store for filtering
                filteredItems = items; // Initialize filtered items
                currentPage = 1; // Reset to page 1
                renderInventoryItems(items);
                renderPagination(items);
                updateStats(items);
                updateBrandFilter(items); // Add this to populate brand options
            } catch (error) {
                console.error('Error loading inventory:', error);
                document.getElementById('inventoryGrid').innerHTML = '<div class="col-span-full text-center py-8 text-red-500">Failed to load inventory items</div>';
            }
        }

        // Update brand filter with available brands
        function updateBrandFilter(items) {
            const brandFilter = document.getElementById('brandFilter');
            const currentSelection = brandFilter.value;

            // Get unique brands from items
            const brands = [...new Set(items.map(item => item.brand).filter(brand => brand && brand !== 'Generic'))].sort();

            // Keep current options and add new ones
            const existingOptions = Array.from(brandFilter.options).map(opt => opt.value).slice(1); // Skip "All Brands"

            // Clear existing options except "All Brands"
            brandFilter.innerHTML = '<option value="">All Brands</option>';

            // Add all available brands
            brands.forEach(brand => {
                const option = document.createElement('option');
                option.value = brand;
                option.textContent = brand;
                brandFilter.appendChild(option);
            });

            // Add Generic option if any items have it
            if (items.some(item => item.brand === 'Generic' || !item.brand)) {
                const option = document.createElement('option');
                option.value = 'Generic';
                option.textContent = 'Generic';
                brandFilter.appendChild(option);
            }

            // Restore previous selection if still valid
            if (currentSelection && brands.includes(currentSelection)) {
                brandFilter.value = currentSelection;
            }
        }

        // Render pagination controls
        function renderPagination(items) {
            const container = document.getElementById('paginationContainer');
            const totalPages = Math.ceil(items.length / itemsPerPage);

            if (totalPages <= 1) {
                container.innerHTML = '';
                return;
            }

            let html = '';

            // Previous button
            html += `
                <button onclick="changePage(${currentPage - 1})"
                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                    ${currentPage === 1 ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (i === currentPage) {
                    html += `
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1] hover:bg-[#1e7ba8] transition-colors">
                            ${i}
                        </button>
                    `;
                } else {
                    html += `
                        <button onclick="changePage(${i})" class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            ${i}
                        </button>
                    `;
                }
            }

            // Next button
            html += `
                <button onclick="changePage(${currentPage + 1})"
                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                    ${currentPage === totalPages ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            container.innerHTML = html;
        }

        // Change page
        function changePage(page) {
            currentPage = page;
            renderInventoryItems(filteredItems);
            renderPagination(filteredItems);
            // Smooth scroll to top of inventory grid
            document.getElementById('inventoryGrid').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // View item details
        async function viewItemDetails(itemId) {
            try {
                currentItemId = itemId;
                const response = await fetch(`/api/inventory/${itemId}`);
                const item = await response.json();

                console.log('Item data:', item); // Debug log

                // Populate modal header
                document.getElementById('viewItemName').textContent = item.name;
                document.getElementById('viewItemBrand').textContent = item.brand || 'Generic';

                // Populate left column - Item Details
                document.getElementById('viewDetailName').textContent = item.name;
                document.getElementById('viewDetailCategory').textContent = item.category;
                document.getElementById('viewDetailBrand').textContent = item.brand || 'Generic';
                document.getElementById('viewDetailStock').textContent = item.stock_quantity;
                document.getElementById('viewDetailThreshold').textContent = item.minimum_stock;
                document.getElementById('viewDetailItemCode').textContent = item.item_code || 'N/A';
                document.getElementById('viewDetailStatus').textContent = item.status;
                document.getElementById('viewDetailDescription').textContent = item.description || 'No description available';

                // Populate right column - Pricing Value
                const costPrice = parseFloat(item.cost_price);
                const sellingPrice = parseFloat(item.price);
                const profitMargin = sellingPrice - costPrice;
                const totalCost = costPrice * item.stock_quantity;
                const totalSelling = sellingPrice * item.stock_quantity;

                document.getElementById('viewDetailCostPrice').textContent = '₱' + costPrice.toFixed(2);
                document.getElementById('viewDetailSellingPrice').textContent = '₱' + sellingPrice.toFixed(2);
                document.getElementById('viewDetailProfitMargin').textContent = '₱' + profitMargin.toFixed(2);
                document.getElementById('viewDetailTotalCost').textContent = '₱' + totalCost.toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('viewDetailTotalSelling').textContent = '₱' + totalSelling.toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2});

                openViewDetailsModal();
            } catch (error) {
                console.error('Error loading item details:', error);
                alert('Failed to load item details.');
            }
        }

        // Open edit modal
        async function openEditItemModal(itemId) {
            try {
                currentItemId = itemId;
                const response = await fetch(`/api/inventory/${itemId}`);
                const item = await response.json();

                // Open modal first
                openEditModal();

                // Populate edit form
                document.getElementById('editItemName').value = item.name;
                document.getElementById('editBrand').value = item.brand || '';
                document.getElementById('editCategory').value = item.category;
                document.getElementById('editDescription').value = item.description || '';
                document.getElementById('editMinStock').value = item.minimum_stock;

                // Show current image if exists
                const editPreviewImg = document.getElementById('editPreviewImg');
                if (item.image) {
                    editPreviewImg.src = item.image;
                    editPreviewImg.style.display = 'block';
                } else {
                    editPreviewImg.style.display = 'none';
                }
            } catch (error) {
                console.error('Error loading item for edit:', error);
                alert('Failed to load item for editing.');
            }
        }

        // Save edited item
        async function saveEditedItem() {
            try {
                const formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('name', document.getElementById('editItemName').value);
                formData.append('brand', document.getElementById('editBrand').value);
                formData.append('category', document.getElementById('editCategory').value);
                formData.append('description', document.getElementById('editDescription').value);
                formData.append('minimum_stock', parseInt(document.getElementById('editMinStock').value));

                // Add image if selected
                const imageFile = document.getElementById('editProductImage').files[0];
                if (imageFile) {
                    formData.append('image', imageFile);
                }

                const response = await fetch(`/api/inventory/${currentItemId}`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    alert('Item updated successfully!');
                    closeEditModal();
                    await loadInventory();
                } else {
                    alert('Failed to update item: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error updating item:', error);
                alert('Failed to update item.');
            }
        }

        // Delete item
        async function confirmDeleteItem(itemId) {
            if (!confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                return;
            }

            try {
                const response = await fetch(`/api/inventory/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    alert('Item deleted successfully!');
                    await loadInventory();
                } else {
                    alert('Failed to delete item: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error deleting item:', error);
                alert('Failed to delete item.');
            }
        }

        // Add stock in
        async function confirmStockIn() {
            try {
                const quantity = parseInt(document.getElementById('stockInQuantity').value);
                const reasonSelect = document.getElementById('stockInReasonSelect').value;
                const customReason = document.getElementById('stockInCustomReason').value;
                const notes = document.getElementById('stockInNotes').value;

                // Validate required fields
                if (!quantity || quantity <= 0) {
                    alert('Please enter a valid quantity');
                    return;
                }

                if (!reasonSelect) {
                    alert('Please select a reason for stock in');
                    return;
                }

                if (reasonSelect === 'Other' && !customReason.trim()) {
                    alert('Please specify the custom reason');
                    return;
                }

                // Build reason string
                let finalReason = reasonSelect;
                if (reasonSelect === 'Other') {
                    finalReason = customReason.trim();
                } else {
                    // Remove description part, keep only the main reason
                    finalReason = reasonSelect.split(' - ')[0];
                }

                // Add notes if provided
                if (notes.trim()) {
                    finalReason += ` | Notes: ${notes.trim()}`;
                }

                const response = await fetch(`/api/inventory/${currentItemId}/add-stock`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ quantity, reason: finalReason })
                });

                const result = await response.json();

                if (response.ok) {
                    alert(`Stock added successfully! New quantity: ${result.item.stock_quantity}`);
                    closeStockInModal();
                    await loadInventory();
                    await viewItemDetails(currentItemId);
                } else {
                    alert('Failed to add stock: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error adding stock:', error);
                alert('Failed to add stock.');
            }
        }

        // Add new item
        async function saveNewItem() {
            try {
                const formData = new FormData();
                formData.append('name', document.getElementById('itemName').value);
                formData.append('brand', document.getElementById('brand').value);
                formData.append('category', document.getElementById('category').value);
                formData.append('description', document.getElementById('description').value);
                formData.append('cost_price', parseFloat(document.getElementById('costPrice').value));
                formData.append('price', parseFloat(document.getElementById('sellingPrice').value));
                formData.append('stock_quantity', parseInt(document.getElementById('initialStock').value));
                formData.append('minimum_stock', parseInt(document.getElementById('minStock').value));

                // Add image if selected
                const imageFile = document.getElementById('productImage').files[0];
                if (imageFile) {
                    formData.append('image', imageFile);
                }

                const response = await fetch('/api/inventory', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    alert('Item added successfully!');
                    closeAddItemModal();
                    document.getElementById('addItemForm').reset();
                    await loadInventory();
                } else {
                    alert('Failed to add item: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error adding item:', error);
                alert('Failed to add item.');
            }
        }

        // Image preview functions
        function previewAddImage(input) {
            const preview = document.getElementById('addImagePreview');
            const previewImg = document.getElementById('addPreviewImg');
            const icon = document.getElementById('addImageIcon');
            const text = document.getElementById('addImageText');
            const hint = document.getElementById('addImageHint');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (icon) icon.classList.add('hidden');
                    if (text) text.classList.add('hidden');
                    if (hint) hint.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewEditImage(input) {
            const previewImg = document.getElementById('editPreviewImg');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Load inventory on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadInventory();
        });
    </script>
</body>
</html>
