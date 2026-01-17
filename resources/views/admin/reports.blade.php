<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports and Analytics - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'lato': ['Lato', 'sans-serif'],
                        'roboto': ['Roboto', 'sans-serif'],
                    },
                    colors: {
                        'brand-blue': '#2B9DD1',
                    }
                }
            }
        }
    </script>
    <style>
        html, body {
            overflow-x: hidden;
            max-width: 100vw;
        }

        body {
            background-image: url("{{ asset('images/Background.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
<body class="font-roboto">
    <!-- Sidebar Overlay (Mobile/Tablet only) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <div class="flex h-screen overflow-hidden max-w-full">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:static top-0 left-0 h-full w-64 bg-white shadow-lg flex flex-col z-50 transform -translate-x-full lg:translate-x-0 overflow-y-auto">
            <!-- Logo -->
            <div class="p-6 border-b">
                <img src="{{ asset('images/coolsystem-logo.png') }}" alt="CoolSystem SpecAdmin" class="w-full h-auto">
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                    </svg>
                    <span>Sales Management</span>
                </a>

                <a href="{{ route('admin.inventory') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm9 4a1 1 0 10-2 0v6a1 1 0 102 0V7zm-3 2a1 1 0 10-2 0v4a1 1 0 102 0V9zm-3 3a1 1 0 10-2 0v1a1 1 0 102 0v-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Inventory Management</span>
                </a>

                <a href="{{ route('admin.customers') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <span>Customer Profiles</span>
                </a>

                <a href="{{ route('admin.technicians') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                    </svg>
                    <span>Technician Management</span>
                </a>

                <a href="{{ route('admin.reports') }}" class="flex items-center space-x-3 px-4 py-3 bg-[#2B9DD1] text-white rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                    </svg>
                    <span>Reports and Analytics</span>
                </a>

                <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    <span>Settings</span>
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="p-4 border-t">
                <a href="/#admin" class="block w-full px-4 py-3 text-left text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
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
                        <h1 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-center md:text-left whitespace-nowrap">Reports and Analytics Dashboard</h1>
                    </div>

                    <!-- Spacer removed for mobile center alignment -->
                </div>
            </header>

            <!-- Content Area -->
            <div class="px-4 sm:px-6 lg:px-8 pb-8">
                <!-- Tabs -->
                <div class="mb-6 bg-white rounded-lg shadow-sm overflow-hidden">
                    <nav class="flex border-b border-gray-200">
                        <button id="salesAnalyticsTab" onclick="switchTab('salesAnalytics')" class="flex-1 py-4 px-4 text-center border-b-3 border-[#2B9DD1] text-[#2B9DD1] bg-blue-50 font-semibold text-sm sm:text-base transition-all">
                            Sales Analytics
                        </button>
                        <button id="otherReportsTab" onclick="switchTab('otherReports')" class="flex-1 py-4 px-4 text-center border-b-3 border-transparent text-gray-600 hover:text-[#2B9DD1] hover:bg-gray-50 font-semibold text-sm sm:text-base transition-all">
                            Other Reports
                        </button>
                    </nav>
                </div>

                <!-- Sales Analytics Content -->
                <div id="salesAnalyticsContent" class="space-y-6">
                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
                        <!-- Daily Sales Card -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 bg-[#2B9DD1] text-white flex items-center justify-between">
                                <h3 class="font-semibold text-sm sm:text-base">Daily Sales Total</h3>
                                <button class="px-2 py-1 bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-xs font-semibold rounded transition-colors">
                                    Export PDF
                                </button>
                            </div>
                            <div class="p-4">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm">
                                        <thead class="border-b border-gray-200">
                                            <tr>
                                                <th class="py-2 text-left text-xs font-bold text-gray-700 uppercase">Day</th>
                                                <th class="py-2 text-right text-xs font-bold text-gray-700 uppercase">Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dailySalesTableBody" class="divide-y divide-gray-100">
                                            <tr>
                                                <td colspan="2" class="py-4 text-center text-gray-500">Loading...</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="border-t-2 border-gray-300">
                                            <tr>
                                                <td class="py-2 font-bold text-gray-900">Total</td>
                                                <td id="dailySalesTotal" class="py-2 text-right font-bold text-[#2B9DD1] text-lg">₱0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Weekly Sales Card -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 bg-[#2B9DD1] text-white flex items-center justify-between">
                                <h3 class="font-semibold text-sm sm:text-base">Weekly Sales Total</h3>
                                <button class="px-2 py-1 bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-xs font-semibold rounded transition-colors">
                                    Export PDF
                                </button>
                            </div>
                            <div class="p-4">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm">
                                        <thead class="border-b border-gray-200">
                                            <tr>
                                                <th class="py-2 text-left text-xs font-bold text-gray-700 uppercase">Week</th>
                                                <th class="py-2 text-right text-xs font-bold text-gray-700 uppercase">Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody id="weeklySalesTableBody" class="divide-y divide-gray-100">
                                            <tr>
                                                <td colspan="2" class="py-4 text-center text-gray-500">Loading...</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="border-t-2 border-gray-300">
                                            <tr>
                                                <td class="py-2 font-bold text-gray-900">Total</td>
                                                <td id="weeklySalesTotal" class="py-2 text-right font-bold text-[#2B9DD1] text-lg">₱0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Sales Card -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 bg-[#2B9DD1] text-white flex items-center justify-between">
                                <h3 class="font-semibold text-sm sm:text-base">Monthly Sales Total</h3>
                                <button class="px-2 py-1 bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-xs font-semibold rounded transition-colors">
                                    Export PDF
                                </button>
                            </div>
                            <div class="p-4">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm">
                                        <thead class="border-b border-gray-200">
                                            <tr>
                                                <th class="py-2 text-left text-xs font-bold text-gray-700 uppercase">Month</th>
                                                <th class="py-2 text-right text-xs font-bold text-gray-700 uppercase">Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody id="monthlySalesTableBody" class="divide-y divide-gray-100">
                                            <tr>
                                                <td colspan="2" class="py-4 text-center text-gray-500">Loading...</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="border-t-2 border-gray-300">
                                            <tr>
                                                <td class="py-2 font-bold text-gray-900">Total</td>
                                                <td id="monthlySalesTotal" class="py-2 text-right font-bold text-[#2B9DD1] text-lg">₱0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detailed Sales Transaction -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Detailed Sales Transaction</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Booking #</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Client</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Technician</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Request</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Amount</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="detailedSalesTableBody" class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">Loading...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="px-4 py-3 bg-white border-t flex items-center justify-center gap-2">
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1] hover:bg-[#1e7ba8] transition-colors">1</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">2</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">3</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">4</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Other Reports Content -->
                <div id="otherReportsContent" class="hidden">
                    <!-- Reports Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Most Used Parts -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 sm:px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Most Used Parts</h2>
                            <button class="px-3 sm:px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors">
                                Export PDF
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Part Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Category</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Usage Count</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Last Used</th>
                                    </tr>
                                </thead>
                                <tbody id="mostUsedPartsTableBody" class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td colspan="4" class="px-4 py-8 text-center text-gray-500">Loading...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="mostUsedPartsPagination" class="px-4 py-3 bg-white border-t flex items-center justify-center gap-2">
                            <!-- Pagination will be generated dynamically -->
                        </div>
                    </div>

                    <!-- Top Services of the Month -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 sm:px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Top Services of the Month</h2>
                            <button class="px-3 sm:px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors">
                                Export PDF
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Service Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Category</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Revenue</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Bookings</th>
                                    </tr>
                                </thead>
                                <tbody id="topServicesTableBody" class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">Loading...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="topServicesPagination" class="px-4 py-3 bg-white border-t flex items-center justify-center gap-2">
                            <!-- Pagination will be generated dynamically -->
                        </div>
                    </div>

                    <!-- Top Performing Technicians -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 sm:px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Top Performing Technicians</h2>
                            <button class="px-3 sm:px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors">
                                Export PDF
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Technician Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Revenue Generated</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Jobs Completed</th>
                                    </tr>
                                </thead>
                                <tbody id="topTechniciansTableBody" class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td colspan="3" class="px-4 py-3 text-center text-gray-500">Loading...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="topTechniciansPagination" class="px-4 py-3 bg-white border-t flex items-center justify-center gap-2">
                            <!-- Pagination will be generated dynamically -->
                        </div>
                    </div>

                    <!-- Customer Trends (Simplified - No Chart) -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 sm:px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Customer Trends</h2>
                            <button class="px-3 sm:px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded-lg transition-colors">
                                Export PDF
                            </button>
                        </div>
                        <div class="p-6">
                            <!-- Summary Cards -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                    <p class="text-xs text-blue-600 font-semibold uppercase tracking-wide mb-1">New Customers</p>
                                    <p class="text-3xl font-bold text-blue-700">847</p>
                                    <p class="text-xs text-blue-500 mt-1">This Month</p>
                                </div>
                                <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                                    <p class="text-xs text-green-600 font-semibold uppercase tracking-wide mb-1">Repeat Customers</p>
                                    <p class="text-3xl font-bold text-green-700">1,023</p>
                                    <p class="text-xs text-green-500 mt-1">This Month</p>
                                </div>
                            </div>

                            <!-- Monthly Breakdown Table -->
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Month</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">New</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Repeat</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">January</td>
                                            <td class="px-4 py-3 text-sm text-blue-600 font-semibold">210</td>
                                            <td class="px-4 py-3 text-sm text-green-600 font-semibold">245</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 font-bold">455</td>
                                        </tr>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">February</td>
                                            <td class="px-4 py-3 text-sm text-blue-600 font-semibold">195</td>
                                            <td class="px-4 py-3 text-sm text-green-600 font-semibold">268</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 font-bold">463</td>
                                        </tr>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">March</td>
                                            <td class="px-4 py-3 text-sm text-blue-600 font-semibold">223</td>
                                            <td class="px-4 py-3 text-sm text-green-600 font-semibold">182</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 font-bold">405</td>
                                        </tr>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">April</td>
                                            <td class="px-4 py-3 text-sm text-blue-600 font-semibold">142</td>
                                            <td class="px-4 py-3 text-sm text-green-600 font-semibold">215</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 font-bold">357</td>
                                        </tr>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">May</td>
                                            <td class="px-4 py-3 text-sm text-blue-600 font-semibold">278</td>
                                            <td class="px-4 py-3 text-sm text-green-600 font-semibold">155</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 font-bold">433</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-white border-t flex items-center justify-center gap-2">
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1] hover:bg-[#1e7ba8] transition-colors">1</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">2</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">3</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">4</button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Hamburger Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            // Load reports data when page loads
            loadReportsData();

            // Toggle sidebar
            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarOverlay.classList.toggle('hidden');
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

        // Tab Switching Function
        function switchTab(tab) {
            const salesAnalyticsTab = document.getElementById('salesAnalyticsTab');
            const otherReportsTab = document.getElementById('otherReportsTab');
            const salesAnalyticsContent = document.getElementById('salesAnalyticsContent');
            const otherReportsContent = document.getElementById('otherReportsContent');

            if (tab === 'salesAnalytics') {
                // Activate Sales Analytics tab
                salesAnalyticsTab.classList.remove('border-transparent', 'text-gray-600');
                salesAnalyticsTab.classList.add('border-[#2B9DD1]', 'text-[#2B9DD1]', 'bg-blue-50');

                // Deactivate Other Reports tab
                otherReportsTab.classList.remove('border-[#2B9DD1]', 'text-[#2B9DD1]', 'bg-blue-50');
                otherReportsTab.classList.add('border-transparent', 'text-gray-600');

                // Show/Hide content
                salesAnalyticsContent.classList.remove('hidden');
                otherReportsContent.classList.add('hidden');
            } else {
                // Activate Other Reports tab
                otherReportsTab.classList.remove('border-transparent', 'text-gray-600');
                otherReportsTab.classList.add('border-[#2B9DD1]', 'text-[#2B9DD1]', 'bg-blue-50');

                // Deactivate Sales Analytics tab
                salesAnalyticsTab.classList.remove('border-[#2B9DD1]', 'text-[#2B9DD1]', 'bg-blue-50');
                salesAnalyticsTab.classList.add('border-transparent', 'text-gray-600');

                // Show/Hide content
                salesAnalyticsContent.classList.add('hidden');
                otherReportsContent.classList.remove('hidden');

                // Load most used parts, top services, and top technicians when switching to Other Reports tab
                loadMostUsedParts(1);
                loadTopServicesOfMonth(1);
                loadTopPerformingTechnicians(1);
            }
        }

        // Load all reports data
        async function loadReportsData() {
            try {
                await Promise.all([
                    loadDailySales(),
                    loadWeeklySales(),
                    loadMonthlySales(),
                    loadCompletedBookings(),
                    loadOverallStats(),
                    loadRevenueData(),
                    loadServiceAnalytics(),
                    loadTechnicianPerformance()
                ]);
            } catch (error) {
                console.error('Error loading reports data:', error);
            }
        }

        // Load daily sales by day of week
        async function loadDailySales() {
            try {
                const response = await fetch('/api/reports/daily-sales');
                const data = await response.json();

                const tbody = document.getElementById('dailySalesTableBody');
                const totalElement = document.getElementById('dailySalesTotal');

                tbody.innerHTML = '';

                if (data.daily_sales && data.daily_sales.length > 0) {
                    data.daily_sales.forEach((item, index) => {
                        const isToday = new Date(item.date).toDateString() === new Date().toDateString();
                        const rowClass = isToday ? 'hover:bg-gray-50 bg-blue-50' : 'hover:bg-gray-50';
                        
                        const row = `
                            <tr class="${rowClass}">
                                <td class="py-2 text-gray-700">${item.day}</td>
                                <td class="py-2 text-right font-semibold text-gray-900">₱${parseFloat(item.revenue).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });

                    totalElement.textContent = '₱' + parseFloat(data.total).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                } else {
                    tbody.innerHTML = '<tr><td colspan="2" class="py-4 text-center text-gray-500">No sales data available</td></tr>';
                    totalElement.textContent = '₱0.00';
                }
            } catch (error) {
                console.error('Error loading daily sales:', error);
                const tbody = document.getElementById('dailySalesTableBody');
                tbody.innerHTML = '<tr><td colspan="2" class="py-4 text-center text-red-500">Failed to load daily sales</td></tr>';
            }
        }

        // Load weekly sales starting from current week as Week 1
        async function loadWeeklySales() {
            try {
                const response = await fetch('/api/reports/weekly-sales');
                const data = await response.json();

                const tbody = document.getElementById('weeklySalesTableBody');
                const totalElement = document.getElementById('weeklySalesTotal');

                tbody.innerHTML = '';

                if (data.weekly_sales && data.weekly_sales.length > 0) {
                    data.weekly_sales.forEach((item) => {
                        const rowClass = item.is_current_week ? 'hover:bg-gray-50 bg-blue-50' : 'hover:bg-gray-50';
                        
                        const row = `
                            <tr class="${rowClass}">
                                <td class="py-2 text-gray-700">${item.week_label}</td>
                                <td class="py-2 text-right font-semibold text-gray-900">₱${parseFloat(item.revenue).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });

                    totalElement.textContent = '₱' + parseFloat(data.total).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                } else {
                    tbody.innerHTML = '<tr><td colspan="2" class="py-4 text-center text-gray-500">No weekly sales data available</td></tr>';
                    totalElement.textContent = '₱0.00';
                }
            } catch (error) {
                console.error('Error loading weekly sales:', error);
                const tbody = document.getElementById('weeklySalesTableBody');
                tbody.innerHTML = '<tr><td colspan="2" class="py-4 text-center text-red-500">Failed to load weekly sales</td></tr>';
            }
        }

        // Load monthly sales starting from current month
        async function loadMonthlySales() {
            try {
                const response = await fetch('/api/reports/monthly-sales');
                const data = await response.json();

                const tbody = document.getElementById('monthlySalesTableBody');
                const totalElement = document.getElementById('monthlySalesTotal');

                tbody.innerHTML = '';

                if (data.monthly_sales && data.monthly_sales.length > 0) {
                    data.monthly_sales.forEach((item) => {
                        const rowClass = item.is_current_month ? 'hover:bg-gray-50 bg-blue-50' : 'hover:bg-gray-50';
                        
                        const row = `
                            <tr class="${rowClass}">
                                <td class="py-2 text-gray-700">${item.month_label}</td>
                                <td class="py-2 text-right font-semibold text-gray-900">₱${parseFloat(item.revenue).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });

                    totalElement.textContent = '₱' + parseFloat(data.total).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                } else {
                    tbody.innerHTML = '<tr><td colspan="2" class="py-4 text-center text-gray-500">No monthly sales data available</td></tr>';
                    totalElement.textContent = '₱0.00';
                }
            } catch (error) {
                console.error('Error loading monthly sales:', error);
                const tbody = document.getElementById('monthlySalesTableBody');
                tbody.innerHTML = '<tr><td colspan="2" class="py-4 text-center text-red-500">Failed to load monthly sales</td></tr>';
            }
        }

        // Load overall statistics
        async function loadOverallStats() {
            try {
                const response = await fetch('/api/reports/overall');
                const stats = await response.json();

                // Update stats display if needed
                console.log('Overall stats loaded:', stats);
            } catch (error) {
                console.error('Error loading overall stats:', error);
            }
        }

        // Load revenue data by period
        async function loadRevenueData() {
            try {
                // Load daily revenue
                const dailyResponse = await fetch('/api/reports/revenue?period=daily');
                const dailyData = await response.json();

                // Load weekly revenue
                const weeklyResponse = await fetch('/api/reports/revenue?period=weekly');
                const weeklyData = await weeklyResponse.json();

                // Load monthly revenue
                const monthlyResponse = await fetch('/api/reports/revenue?period=monthly');
                const monthlyData = await monthlyResponse.json();

                console.log('Revenue data loaded');
            } catch (error) {
                console.error('Error loading revenue data:', error);
            }
        }

        // Load service analytics
        async function loadServiceAnalytics() {
            try {
                const response = await fetch('/api/reports/services');
                const services = await response.json();

                console.log('Service analytics loaded:', services);
            } catch (error) {
                console.error('Error loading service analytics:', error);
            }
        }

        // Load technician performance
        async function loadTechnicianPerformance() {
            try {
                const response = await fetch('/api/reports/technicians');
                const technicians = await response.json();

                console.log('Technician performance loaded:', technicians);
            } catch (error) {
                console.error('Error loading technician performance:', error);
            }
        }

        // Load completed bookings for detailed sales table
        async function loadCompletedBookings() {
            try {
                const response = await fetch('/api/reports/completed-bookings?per_page=10');
                const data = await response.json();

                const tbody = document.getElementById('detailedSalesTableBody');
                tbody.innerHTML = '';

                if (data.data && data.data.length > 0) {
                    data.data.forEach(booking => {
                        const technicianName = booking.technician ? booking.technician.name : 'N/A';
                        const customerName = booking.customer ? booking.customer.name : 'N/A';
                        
                        const row = `
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900 font-medium">${booking.booking_number}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">${customerName}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">${technicianName}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">${booking.service_type}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱${parseFloat(booking.total_amount).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                                <td class="px-4 py-3 text-center">
                                    <button onclick="viewBookingDetails('${booking.id}')" class="px-3 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded-lg transition-colors">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });
                } else {
                    tbody.innerHTML = '<tr><td colspan="6" class="px-4 py-8 text-center text-gray-500">No completed bookings found</td></tr>';
                }
            } catch (error) {
                console.error('Error loading completed bookings:', error);
                const tbody = document.getElementById('detailedSalesTableBody');
                tbody.innerHTML = '<tr><td colspan="6" class="px-4 py-8 text-center text-red-500">Failed to load bookings</td></tr>';
            }
        }

        // Load most used parts with pagination
        let currentMostUsedPartsPage = 1;
        async function loadMostUsedParts(page = 1) {
            try {
                currentMostUsedPartsPage = page;
                const response = await fetch(`/api/reports/most-used-parts?per_page=5&page=${page}`);
                const data = await response.json();

                const tbody = document.getElementById('mostUsedPartsTableBody');
                tbody.innerHTML = '';

                if (data.data && data.data.length > 0) {
                    data.data.forEach(part => {
                        const lastUsed = part.last_used ? new Date(part.last_used).toLocaleDateString('en-US', {
                            month: 'short',
                            day: 'numeric',
                            year: 'numeric'
                        }) : 'N/A';
                        
                        const row = `
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">${part.name}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">${part.category}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-semibold">${part.usage_count}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">${lastUsed}</td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });

                    // Update pagination
                    renderMostUsedPartsPagination(data);
                } else {
                    tbody.innerHTML = '<tr><td colspan="4" class="px-4 py-8 text-center text-gray-500">No parts usage data available</td></tr>';
                    document.getElementById('mostUsedPartsPagination').innerHTML = '';
                }
            } catch (error) {
                console.error('Error loading most used parts:', error);
                const tbody = document.getElementById('mostUsedPartsTableBody');
                tbody.innerHTML = '<tr><td colspan="4" class="px-4 py-8 text-center text-red-500">Failed to load parts data</td></tr>';
            }
        }

        // Render pagination for most used parts
        function renderMostUsedPartsPagination(data) {
            const paginationDiv = document.getElementById('mostUsedPartsPagination');
            
            if (data.last_page <= 1) {
                paginationDiv.innerHTML = '';
                return;
            }

            let paginationHTML = '';

            // Previous button
            paginationHTML += `
                <button onclick="loadMostUsedParts(${data.current_page - 1})" 
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" 
                        ${data.current_page === 1 ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            // Page numbers
            for (let i = 1; i <= data.last_page; i++) {
                const activeClass = i === data.current_page 
                    ? 'text-white bg-[#2B9DD1] hover:bg-[#1e7ba8]' 
                    : 'text-gray-700 hover:bg-gray-50';
                
                paginationHTML += `
                    <button onclick="loadMostUsedParts(${i})" 
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium ${activeClass} transition-colors">
                        ${i}
                    </button>
                `;
            }

            // Next button
            paginationHTML += `
                <button onclick="loadMostUsedParts(${data.current_page + 1})" 
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" 
                        ${data.current_page === data.last_page ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            paginationDiv.innerHTML = paginationHTML;
        }

        // Load Top Services of the Month (with pagination)
        async function loadTopServicesOfMonth(page = 1) {
            try {
                const response = await fetch(`/api/reports/top-services-month?per_page=5&page=${page}`);
                const data = await response.json();

                const tbody = document.getElementById('topServicesTableBody');
                tbody.innerHTML = '';

                if (data.data && data.data.length > 0) {
                    data.data.forEach((service) => {
                        const row = `
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">${service.service_type || 'N/A'}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">${service.appliance || 'N/A'}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱${parseFloat(service.revenue).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">${service.bookings_count}</td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });

                    // Render pagination
                    renderTopServicesPagination(data);
                } else {
                    tbody.innerHTML = '<tr><td colspan="4" class="px-4 py-4 text-center text-gray-500">No services data available for this month</td></tr>';
                    document.getElementById('topServicesPagination').innerHTML = '';
                }
            } catch (error) {
                console.error('Error loading top services:', error);
                const tbody = document.getElementById('topServicesTableBody');
                tbody.innerHTML = '<tr><td colspan="4" class="px-4 py-4 text-center text-red-500">Failed to load top services</td></tr>';
            }
        }

        // Render pagination for Top Services of the Month
        function renderTopServicesPagination(data) {
            const paginationDiv = document.getElementById('topServicesPagination');
            
            if (data.last_page <= 1) {
                paginationDiv.innerHTML = '';
                return;
            }

            let paginationHTML = '';

            // Previous button
            paginationHTML += `
                <button onclick="loadTopServicesOfMonth(${data.current_page - 1})" 
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" 
                        ${data.current_page === 1 ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            // Page numbers
            for (let i = 1; i <= data.last_page; i++) {
                const activeClass = i === data.current_page 
                    ? 'text-white bg-[#2B9DD1] hover:bg-[#1e7ba8]' 
                    : 'text-gray-700 hover:bg-gray-50';
                
                paginationHTML += `
                    <button onclick="loadTopServicesOfMonth(${i})" 
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium ${activeClass} transition-colors">
                        ${i}
                    </button>
                `;
            }

            // Next button
            paginationHTML += `
                <button onclick="loadTopServicesOfMonth(${data.current_page + 1})" 
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" 
                        ${data.current_page === data.last_page ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            paginationDiv.innerHTML = paginationHTML;
        }

        // Load Top Performing Technicians (with pagination)
        async function loadTopPerformingTechnicians(page = 1) {
            try {
                const response = await fetch(`/api/reports/top-technicians?per_page=5&page=${page}`);
                const data = await response.json();

                const tbody = document.getElementById('topTechniciansTableBody');
                tbody.innerHTML = '';

                if (data.data && data.data.length > 0) {
                    data.data.forEach((technician) => {
                        const row = `
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">${technician.technician_name || 'N/A'}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱${parseFloat(technician.revenue_generated).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">${technician.jobs_completed}</td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });

                    // Render pagination
                    renderTopTechniciansPagination(data);
                } else {
                    tbody.innerHTML = '<tr><td colspan="3" class="px-4 py-4 text-center text-gray-500">No technician performance data available</td></tr>';
                    document.getElementById('topTechniciansPagination').innerHTML = '';
                }
            } catch (error) {
                console.error('Error loading top technicians:', error);
                const tbody = document.getElementById('topTechniciansTableBody');
                tbody.innerHTML = '<tr><td colspan="3" class="px-4 py-4 text-center text-red-500">Failed to load top technicians</td></tr>';
            }
        }

        // Render pagination for Top Performing Technicians
        function renderTopTechniciansPagination(data) {
            const paginationDiv = document.getElementById('topTechniciansPagination');
            
            if (data.last_page <= 1) {
                paginationDiv.innerHTML = '';
                return;
            }

            let paginationHTML = '';

            // Previous button
            paginationHTML += `
                <button onclick="loadTopPerformingTechnicians(${data.current_page - 1})" 
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" 
                        ${data.current_page === 1 ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            // Page numbers
            for (let i = 1; i <= data.last_page; i++) {
                const activeClass = i === data.current_page 
                    ? 'text-white bg-[#2B9DD1] hover:bg-[#1e7ba8]' 
                    : 'text-gray-700 hover:bg-gray-50';
                
                paginationHTML += `
                    <button onclick="loadTopPerformingTechnicians(${i})" 
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium ${activeClass} transition-colors">
                        ${i}
                    </button>
                `;
            }

            // Next button
            paginationHTML += `
                <button onclick="loadTopPerformingTechnicians(${data.current_page + 1})" 
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" 
                        ${data.current_page === data.last_page ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            paginationDiv.innerHTML = paginationHTML;
        }

        // View booking details (placeholder function)
        function viewBookingDetails(bookingId) {
            console.log('View booking details:', bookingId);
            // This can be implemented to show a modal with full booking details
            alert('Booking details feature - Coming soon!');
        }
    </script>
</body>
</html>
