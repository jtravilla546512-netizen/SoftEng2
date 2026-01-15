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

                <a href="{{ route('admin.reports') }}" class="flex items-center space-x-3 px-4 py-3 bg-[#2B9DD1] text-white rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                    </svg>
                    <span>Reports and Analytics</span>
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
                                        <tbody class="divide-y divide-gray-100">
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Monday</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱2,100</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Tuesday</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱2,250</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Wednesday</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱2,500</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Thursday</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱2,350</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Friday</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱1,950</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Saturday</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱2,450</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50 bg-blue-50">
                                                <td class="py-2 text-gray-700">Sunday</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱2,750</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="border-t-2 border-gray-300">
                                            <tr>
                                                <td class="py-2 font-bold text-gray-900">Total</td>
                                                <td class="py-2 text-right font-bold text-[#2B9DD1] text-lg">₱16,350</td>
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
                                        <tbody class="divide-y divide-gray-100">
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Week 32</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱16,200</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Week 33</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱17,850</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">Week 34</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱16,750</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50 bg-blue-50">
                                                <td class="py-2 text-gray-700">Week 35</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱18,500</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="border-t-2 border-gray-300">
                                            <tr>
                                                <td class="py-2 font-bold text-gray-900">Total</td>
                                                <td class="py-2 text-right font-bold text-[#2B9DD1] text-lg">₱69,300</td>
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
                                        <tbody class="divide-y divide-gray-100">
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">April</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱68,200</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">May</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱71,850</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">June</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱69,500</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">July</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱66,750</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">August</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱67,200</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-2 text-gray-700">September</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱70,450</td>
                                            </tr>
                                            <tr class="hover:bg-gray-50 bg-blue-50">
                                                <td class="py-2 text-gray-700">October</td>
                                                <td class="py-2 text-right font-semibold text-gray-900">₱72,300</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="border-t-2 border-gray-300">
                                            <tr>
                                                <td class="py-2 font-bold text-gray-900">Total</td>
                                                <td class="py-2 text-right font-bold text-[#2B9DD1] text-lg">₱486,250</td>
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
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900 font-medium">RP001</td>
                                        <td class="px-4 py-3 text-sm text-gray-900">Robin Scherbatsky</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">James Caraan</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Repair</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱225.00</td>
                                        <td class="px-4 py-3 text-center">
                                            <button class="px-3 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded-lg transition-colors">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900 font-medium">INS001</td>
                                        <td class="px-4 py-3 text-sm text-gray-900">Ted Mosby</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Ryan Rems</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Installation</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱80.00</td>
                                        <td class="px-4 py-3 text-center">
                                            <button class="px-3 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded-lg transition-colors">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900 font-medium">MN001</td>
                                        <td class="px-4 py-3 text-sm text-gray-900">Marshall Eriksen</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Nonong Ballman</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Maintenance</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱125.00</td>
                                        <td class="px-4 py-3 text-center">
                                            <button class="px-3 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded-lg transition-colors">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900 font-medium">RP002</td>
                                        <td class="px-4 py-3 text-sm text-gray-900">Lily Aldrin</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">James Caraan</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Repair</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱350.00</td>
                                        <td class="px-4 py-3 text-center">
                                            <button class="px-3 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded-lg transition-colors">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900 font-medium">CL001</td>
                                        <td class="px-4 py-3 text-sm text-gray-900">Barney Stinson</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">GB Labrador</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Cleaning</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱150.00</td>
                                        <td class="px-4 py-3 text-center">
                                            <button class="px-3 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded-lg transition-colors">
                                                View Details
                                            </button>
                                        </td>
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
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Compressor Unit(2HP)</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Air Conditioner</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">85</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Oct. 12, 2025</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Fan Motor</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Refrigerator</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">52</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Oct. 10, 2025</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Capacitor 45uF</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Air Conditioner</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">42</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Oct. 13, 2025</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Thermostat Sensor</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Refrigerator</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">37</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Oct. 09, 2025</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Filter Dryer</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Refrigerator</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">25</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Oct. 08, 2025</td>
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
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">AC General Cleaning</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Air Conditioner</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱125,000.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">300</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Refrigerator Repair</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Refrigerator</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱92,500.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">220</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">AC Installation</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Air Conditioner</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱85,992.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">195</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">AC Repair</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Air Conditioner</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱73,293.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">180</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Refrigerator Cleaning</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Refrigerator</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱69,203.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">90</td>
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
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">James Caraan</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱125,000.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">52</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Nonong Ballman</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱92,500.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">47</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">GB Labrador</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱85,992.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">43</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Ryan Rems</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱73,293.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">39</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-900">Muman Reyes</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">₱69,203.00</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">35</td>
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
            }
        }
    </script>
</body>
</html>
