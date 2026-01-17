<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CoolSystem SpecAdmin - Sales Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
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

        /* Hide scrollbar for mobile sidebar */
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
                <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-[#2B9DD1] text-white rounded-lg font-medium">
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

                <a href="{{ route('admin.reports') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
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
                        <h1 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-center md:text-left whitespace-nowrap">Sales Management Dashboard</h1>
                    </div>

                    <!-- Spacer removed for mobile center alignment -->
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-4 sm:p-6 md:p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <!-- Pending Bookings -->
                    <div class="bg-[#2B9DD1] text-white rounded-lg p-4 sm:p-6 shadow-lg">
                        <div class="text-xs sm:text-sm font-medium opacity-90 mb-1 sm:mb-2">Pending Bookings</div>
                        <div id="statPendingBookings" class="text-3xl sm:text-4xl font-bold mb-1 sm:mb-2">0</div>
                        <div class="flex items-center text-xs sm:text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span id="statPendingChange">%0 vs last week</span>
                        </div>
                    </div>

                    <!-- Services Completed -->
                    <div class="bg-[#2B9DD1] text-white rounded-lg p-4 sm:p-6 shadow-lg">
                        <div class="text-xs sm:text-sm font-medium opacity-90 mb-1 sm:mb-2">Services Completed</div>
                        <div id="statServicesCompleted" class="text-3xl sm:text-4xl font-bold mb-1 sm:mb-2">0</div>
                        <div class="flex items-center text-xs sm:text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span id="statCompletedChange">%0 vs last week</span>
                        </div>
                    </div>

                    <!-- Today's Revenue -->
                    <div class="bg-[#2B9DD1] text-white rounded-lg p-4 sm:p-6 shadow-lg">
                        <div class="text-xs sm:text-sm font-medium opacity-90 mb-1 sm:mb-2">Today's Revenue</div>
                        <div id="statTodayRevenue" class="text-3xl sm:text-4xl font-bold mb-1 sm:mb-2">₱0.00</div>
                        <div class="flex items-center text-xs sm:text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span id="statTodayChange">%0 vs yesterday</span>
                        </div>
                    </div>

                    <!-- Total Revenue -->
                    <div class="bg-[#2B9DD1] text-white rounded-lg p-4 sm:p-6 shadow-lg">
                        <div class="text-xs sm:text-sm font-medium opacity-90 mb-1 sm:mb-2">Total Revenue</div>
                        <div id="statTotalRevenue" class="text-3xl sm:text-4xl font-bold mb-1 sm:mb-2">₱0.00</div>
                        <div class="flex items-center text-xs sm:text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>%12 vs last month</span>
                        </div>
                    </div>
                </div>

                <!-- Bookings Table -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Tabs and New Booking Button -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-4 sm:px-6 py-4 border-b gap-4 sm:gap-0">
                        <div class="flex space-x-4 sm:space-x-6 overflow-x-auto w-full sm:w-auto">
                            <button id="pendingTab" class="px-3 sm:px-4 py-2 text-sm sm:text-base text-gray-900 font-semibold relative border-b-4 border-[#2B9DD1] whitespace-nowrap">
                                Pending Bookings <span id="pendingCount" class="ml-1 sm:ml-2 bg-yellow-400 text-white px-2 sm:px-2.5 py-0.5 rounded-full text-xs font-bold">0</span>
                            </button>
                            <button id="completedTab" class="px-3 sm:px-4 py-2 text-sm sm:text-base text-gray-900 font-semibold relative whitespace-nowrap">
                                Completed Transactions
                            </button>
                            <button id="cancelledTab" class="px-3 sm:px-4 py-2 text-sm sm:text-base text-gray-900 font-semibold relative whitespace-nowrap">
                                Cancelled Bookings <span id="cancelledCount" class="ml-1 sm:ml-2 bg-red-500 text-white px-2 sm:px-2.5 py-0.5 rounded-full text-xs font-bold">0</span>
                            </button>
                        </div>
                        <div class="flex gap-2 w-full sm:w-auto">
                            <button onclick="refreshData()" class="px-3 sm:px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm sm:text-base font-semibold rounded-lg shadow-md transition-colors flex items-center" title="Refresh Data">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <span class="hidden sm:inline ml-1">Refresh</span>
                            </button>
                            <a href="/" class="text-center px-4 sm:px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm sm:text-base font-semibold rounded-lg shadow-md transition-colors inline-block">
                                + New Booking
                            </a>
                        </div>
                    </div>

                    <!-- Completed Transactions Table (Hidden by default) -->
                    <div id="completedContent" class="overflow-x-auto hidden">
                        <table class="w-full min-w-[900px]" id="completedBookingsTable">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Booking #</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Customer</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Service Type</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Technician</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Location</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Date Completed</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Total Amount</th>
                                    <th class="px-3 sm:px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                        Loading bookings...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Cancelled Bookings Table (Hidden by default) -->
                    <div id="cancelledContent" class="overflow-x-auto hidden">
                        <table class="w-full min-w-[900px]" id="cancelledBookingsTable">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Booking #</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Customer</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Service Type</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Technician</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Location</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Date Cancelled</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Cancellation Reason</th>
                                    <th class="px-3 sm:px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                        No cancelled bookings yet
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pending Bookings Table -->
                    <div id="pendingContent" class="overflow-x-auto">
                        <table class="w-full min-w-[900px]" id="pendingBookingsTable">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Booking #</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Name</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Request</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Technician</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Location</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Time</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Date</th>
                                    <th class="px-3 sm:px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                        Loading bookings...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div id="mainTablePagination" class="px-4 sm:px-6 py-4 bg-gray-50 border-t flex items-center justify-center">
                        <!-- Dynamic pagination will be rendered here -->
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Assign Technician Modal -->
    <div id="assignTechModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold">Assign Technician</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <!-- Service Information -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Service Information</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-semibold text-gray-700">Service Type:</span>
                            <span class="text-gray-900 ml-2" id="assignServiceType">Repair</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Booking ID:</span>
                            <span class="text-gray-900 ml-2" id="assignBookingNumber">RP001</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Customer:</span>
                            <span class="text-gray-900 ml-2" id="assignCustomerName">Robin Scherbatsky</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Appliance:</span>
                            <span class="text-gray-900 ml-2" id="assignAppliance">Aircon</span>
                        </div>
                    </div>
                </div>

                <!-- Technicians Table -->
                <div class="border border-gray-300 rounded-lg overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b border-gray-300">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-bold text-gray-900">Technician's Name</th>
                                <th class="px-4 py-3 text-left text-sm font-bold text-gray-900">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="technician" value="James Caraan" class="mr-3 w-4 h-4 text-[#2B9DD1] focus:ring-[#2B9DD1]">
                                        <span class="text-sm text-gray-900">James Caraan</span>
                                    </label>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">Available</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="technician" value="GB Labrador" class="mr-3 w-4 h-4 text-[#2B9DD1] focus:ring-[#2B9DD1]">
                                        <span class="text-sm text-gray-900">GB Labrador</span>
                                    </label>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">Available</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="technician" value="Nonong Balinan" class="mr-3 w-4 h-4 text-[#2B9DD1] focus:ring-[#2B9DD1]">
                                        <span class="text-sm text-gray-900">Nonong Balinan</span>
                                    </label>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">Available</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="technician" value="Ryan Rems" class="mr-3 w-4 h-4 text-[#2B9DD1] focus:ring-[#2B9DD1]" disabled>
                                        <span class="text-sm text-gray-500">Ryan Rems</span>
                                    </label>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500">Off</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="technician" value="Muman Reyes" class="mr-3 w-4 h-4 text-[#2B9DD1] focus:ring-[#2B9DD1]">
                                        <span class="text-sm text-gray-900">Muman Reyes</span>
                                    </label>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">Available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div id="assignTechPagination" class="flex items-center justify-center mt-6 gap-2">
                    <!-- Dynamic pagination will be rendered here -->
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeAssignTechModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
                <button onclick="confirmAssignment()" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors">
                    Assign Technician
                </button>
            </div>
        </div>
    </div>

    <!-- Cancel Booking Modal -->
    <div id="cancelBookingModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-md w-full">
            <!-- Modal Header -->
            <div class="bg-red-600 text-white px-6 py-4">
                <h2 class="text-xl font-bold">Cancel Booking</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6">
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Booking Information</h3>
                    <div class="text-sm space-y-2">
                        <div>
                            <span class="font-semibold text-gray-700">Booking ID:</span>
                            <span class="text-gray-900 ml-2" id="cancelBookingNumber">RP001</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Customer:</span>
                            <span class="text-gray-900 ml-2" id="cancelCustomerName">Robin Scherbatsky</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Service Type:</span>
                            <span class="text-gray-900 ml-2" id="cancelServiceType">Repair</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cancellation Reason</label>
                    <select id="cancellationReason" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="" disabled selected>Select reason...</option>
                        <option value="customer_request">Customer Request</option>
                        <option value="no_show">Customer No-Show</option>
                        <option value="parts_unavailable">Parts Unavailable</option>
                        <option value="technician_unavailable">Technician Unavailable</option>
                        <option value="scheduling_conflict">Scheduling Conflict</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="mb-6">
                    <p class="text-sm text-gray-600">Are you sure you want to cancel this booking? This action cannot be undone.</p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end space-x-3 px-6 py-4 bg-gray-50">
                <button onclick="closeCancelModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button onclick="confirmCancelBooking()" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                    Cancel Booking
                </button>
            </div>
        </div>
    </div>

    <!-- Record Details Modal -->
    <div id="recordDetailsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold">Record Details</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <div class="grid grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div>
                        <!-- Service Information -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Service Information</h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Service Type:</span>
                                    <span class="text-gray-900 font-semibold" id="recordServiceType">Repair</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Booking ID:</span>
                                    <span class="text-gray-900 font-semibold" id="recordBookingNumber">RP001</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Customer:</span>
                                    <span class="text-gray-900 font-semibold" id="recordCustomerName">Robin Scherbatsky</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Appliance:</span>
                                    <span class="text-gray-900 font-semibold" id="recordAppliance">Aircon</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Labor Cost:</span>
                                    <span class="text-gray-900 font-semibold" id="recordLaborCost">₱80.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Spare Parts -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Spare Parts</h3>
                            <div class="space-y-3" id="partsList" style="min-height: 400px;">
                                <!-- Air Filter -->
                                <div class="flex items-center justify-between py-2 border-b border-gray-200" data-part-id="air-filter" data-part-name="Air Filter" data-part-price="25.00">
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm text-gray-900">Air Filter</div>
                                        <div class="text-xs text-gray-600">Unit: ₱ 25.00</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button onclick="decrementPart('air-filter')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">-</button>
                                        <input type="text" value="2" class="part-qty w-12 h-7 text-center border border-gray-300 rounded text-sm" readonly>
                                        <button onclick="incrementPart('air-filter')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">+</button>
                                    </div>
                                </div>

                                <!-- Refrigerant R32 -->
                                <div class="flex items-center justify-between py-2 border-b border-gray-200" data-part-id="refrigerant-r32" data-part-name="Refrigerant R32" data-part-price="45.50">
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm text-gray-900">Refrigerant R32</div>
                                        <div class="text-xs text-gray-600">Unit: ₱ 45.50</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button onclick="decrementPart('refrigerant-r32')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">-</button>
                                        <input type="text" value="0" class="part-qty w-12 h-7 text-center border border-gray-300 rounded text-sm" readonly>
                                        <button onclick="incrementPart('refrigerant-r32')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">+</button>
                                    </div>
                                </div>

                                <!-- Capacitor -->
                                <div class="flex items-center justify-between py-2 border-b border-gray-200" data-part-id="capacitor" data-part-name="Capacitor" data-part-price="30.00">
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm text-gray-900">Capacitor</div>
                                        <div class="text-xs text-gray-600">Unit: ₱ 30.00</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button onclick="decrementPart('capacitor')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">-</button>
                                        <input type="text" value="1" class="part-qty w-12 h-7 text-center border border-gray-300 rounded text-sm" readonly>
                                        <button onclick="incrementPart('capacitor')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">+</button>
                                    </div>
                                </div>

                                <!-- Condenser Coil -->
                                <div class="flex items-center justify-between py-2 border-b border-gray-200" data-part-id="condenser-coil" data-part-name="Condenser Coil" data-part-price="120.00">
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm text-gray-900">Condenser Coil</div>
                                        <div class="text-xs text-gray-600">Unit: ₱ 120.00</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button onclick="decrementPart('condenser-coil')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">-</button>
                                        <input type="text" value="0" class="part-qty w-12 h-7 text-center border border-gray-300 rounded text-sm" readonly>
                                        <button onclick="incrementPart('condenser-coil')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">+</button>
                                    </div>
                                </div>

                                <!-- Drainage Pump 1 -->
                                <div class="flex items-center justify-between py-2 border-b border-gray-200" data-part-id="drainage-pump-1" data-part-name="Drainage Pump" data-part-price="55.00">
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm text-gray-900">Drainage Pump</div>
                                        <div class="text-xs text-gray-600">Unit: ₱ 55.00</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button onclick="decrementPart('drainage-pump-1')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">-</button>
                                        <input type="text" value="0" class="part-qty w-12 h-7 text-center border border-gray-300 rounded text-sm" readonly>
                                        <button onclick="incrementPart('drainage-pump-1')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">+</button>
                                    </div>
                                </div>

                                <!-- Evaporator Fan -->
                                <div class="flex items-center justify-between py-2 border-b border-gray-200" data-part-id="evaporator-fan" data-part-name="Evaporator Fan" data-part-price="65.00">
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm text-gray-900">Evaporator Fan</div>
                                        <div class="text-xs text-gray-600">Unit: ₱ 65.00</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button onclick="decrementPart('evaporator-fan')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">-</button>
                                        <input type="text" value="1" class="part-qty w-12 h-7 text-center border border-gray-300 rounded text-sm" readonly>
                                        <button onclick="incrementPart('evaporator-fan')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">+</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination - Dynamically generated -->
                            <div id="partsPagination" class="mt-4"></div>
                        </div>
                    </div>

                    <!-- Right Column - Receipt Summary -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Receipt Summary</h3>
                        <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                            <!-- Parts List -->
                            <div class="space-y-2 text-sm" id="receiptPartsList">
                                <!-- Parts will be dynamically added here -->
                            </div>

                            <div class="border-t border-gray-300 pt-3 space-y-2 text-sm">
                                <div class="flex justify-between py-1">
                                    <span class="text-gray-700">Parts Subtotal:</span>
                                    <span class="text-gray-900 font-semibold" id="partsSubtotal">₱ 0.00</span>
                                </div>
                                <div class="flex justify-between py-1">
                                    <span class="text-gray-700">Labor Cost:</span>
                                    <span class="text-gray-900 font-semibold">₱ 80.00</span>
                                </div>
                            </div>

                            <div class="border-t-2 border-gray-400 pt-3">
                                <div class="flex justify-between text-lg font-bold">
                                    <span class="text-gray-900">Grand Total:</span>
                                    <span class="text-gray-900" id="grandTotal">₱ 0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeRecordDetailsModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    Back
                </button>
                <button onclick="openReceiptConfirmModal()" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors">
                    Generate Receipt
                </button>
            </div>
        </div>
    </div>

    <!-- Receipt Confirmation Modal -->
    <div id="receiptConfirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-md w-full">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4 rounded-t-lg">
                <h2 class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Record Details</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4" style="font-family: 'Roboto', sans-serif;">Receipt Summary</h3>
                <div class="bg-white space-y-3">
                    <!-- Parts List -->
                    <div class="space-y-2 text-sm" id="confirmReceiptPartsList">
                        <!-- Parts will be dynamically added here -->
                    </div>

                    <div class="border-t border-gray-300 pt-3 space-y-2 text-sm">
                        <div class="flex justify-between py-1">
                            <span class="text-gray-700" style="font-family: 'Lato', sans-serif;">Parts Subtotal:</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;" id="confirmPartsSubtotal">₱ 0.00</span>
                        </div>
                        <div class="flex justify-between py-1">
                            <span class="text-gray-700" style="font-family: 'Lato', sans-serif;">Labor Cost:</span>
                            <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">₱ 80.00</span>
                        </div>
                    </div>

                    <div class="border-t-2 border-gray-400 pt-3">
                        <div class="flex justify-between text-lg font-bold">
                            <span class="text-gray-900" style="font-family: 'Roboto', sans-serif;">Grand Total:</span>
                            <span class="text-gray-900" style="font-family: 'Roboto', sans-serif;" id="confirmGrandTotal">₱ 0.00</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-gray-900 font-semibold text-base" style="font-family: 'Roboto', sans-serif;">Continue generating receipt?</p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 pb-6 flex justify-center space-x-3">
                <button onclick="closeReceiptConfirmModal()" class="px-8 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
                <button onclick="confirmGenerateReceipt()" class="px-8 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <!-- Completed Transaction Details Modal -->
    <div id="completedDetailsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold" style="font-family: 'Roboto', sans-serif;">Completed Transaction Details</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <div class="grid grid-cols-12 gap-6">
                    <!-- Left Column - Booking Information -->
                    <div class="col-span-4 space-y-4">
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Booking ID:</span>
                            <span id="completedBookingNumber" class="text-gray-700" style="font-family: 'Lato', sans-serif;">RP001</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Customer Name:</span>
                            <span id="completedCustomerName" class="text-gray-700" style="font-family: 'Lato', sans-serif;">Robin Scherbatsky</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Location</span>
                            <span id="completedLocation" class="text-gray-700" style="font-family: 'Lato', sans-serif;">Mandaluyong City</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Contact Number:</span>
                            <span id="completedContactNumber" class="text-gray-700" style="font-family: 'Lato', sans-serif;">+63912-345-6789</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Landmark:</span>
                            <span id="completedLandmark" class="text-gray-700" style="font-family: 'Lato', sans-serif;">N/A</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Description of Issue:</span>
                            <span id="completedIssueDescription" class="text-gray-700" style="font-family: 'Lato', sans-serif;">RP001</span>
                        </div>
                    </div>

                    <!-- Middle Column - Service Details -->
                    <div class="col-span-4 space-y-4">
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Appliance Type:</span>
                            <span id="completedAppliance" class="text-gray-700" style="font-family: 'Lato', sans-serif;">Air Conditioner</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Service Type:</span>
                            <span id="completedServiceType" class="text-gray-700" style="font-family: 'Lato', sans-serif;">Repair</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Date:</span>
                            <span id="completedServiceDate" class="text-gray-700" style="font-family: 'Lato', sans-serif;">October 6, 2025</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1" style="font-family: 'Roboto', sans-serif;">Time:</span>
                            <span id="completedServiceTime" class="text-gray-700" style="font-family: 'Lato', sans-serif;">11:00 AM</span>
                        </div>
                    </div>

                    <!-- Right Column - Receipt Summary -->
                    <div class="col-span-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-4" style="font-family: 'Roboto', sans-serif;">Receipt Summary</h3>
                        <div class="bg-white space-y-3">
                            <!-- Parts List -->
                            <div id="completedPartsList" class="space-y-2 text-sm">
                                <div class="flex justify-between py-1">
                                    <span class="text-gray-700" style="font-family: 'Lato', sans-serif;">Air Filter (x2)</span>
                                    <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">$ 50.00</span>
                                </div>
                                <div class="flex justify-between py-1">
                                    <span class="text-gray-700" style="font-family: 'Lato', sans-serif;">Capacitor (x1)</span>
                                    <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">$ 30.00</span>
                                </div>
                                <div class="flex justify-between py-1">
                                    <span class="text-gray-700" style="font-family: 'Lato', sans-serif;">Evaporator Fan (x1)</span>
                                    <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">$ 65.00</span>
                                </div>
                            </div>

                            <div class="border-t border-gray-300 pt-3 space-y-2 text-sm">
                                <div class="flex justify-between py-1">
                                    <span class="text-gray-700" style="font-family: 'Lato', sans-serif;">Parts Subtotal:</span>
                                    <span id="completedPartsSubtotal" class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">$ 145.00</span>
                                </div>
                                <div class="flex justify-between py-1">
                                    <span class="text-gray-700" style="font-family: 'Lato', sans-serif;">Labor Cost:</span>
                                    <span id="completedLaborCost" class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">$ 80.00</span>
                                </div>
                            </div>

                            <div class="border-t-2 border-gray-400 pt-3">
                                <div class="flex justify-between text-lg font-bold">
                                    <span class="text-gray-900" style="font-family: 'Roboto', sans-serif;">Grand Total:</span>
                                    <span id="completedGrandTotal" class="text-gray-900" style="font-family: 'Roboto', sans-serif;">$ 225.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-start">
                <button onclick="closeCompletedDetailsModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors" style="font-family: 'Roboto', sans-serif;">
                    Back
                </button>
            </div>
        </div>
    </div>

    <!-- Booking Details Modal -->
    <div id="bookingDetailsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold">Booking Details</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <div class="grid grid-cols-2 gap-x-8 gap-y-4 text-sm">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Booking ID:</span>
                            <span class="text-gray-700" id="detailBookingNumber">RP001</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Customer Name:</span>
                            <span class="text-gray-700" id="detailCustomerName">Robin Scherbatsky</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Location</span>
                            <span class="text-gray-700" id="detailLocation">Mandaluyong City</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Contact Number:</span>
                            <span class="text-gray-700" id="detailContactNumber">+63912-345-6789</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Landmark:</span>
                            <span class="text-gray-700" id="detailLandmark">N/A</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Description of Issue:</span>
                            <span class="text-gray-700 block break-words" id="detailIssueDescription">RP001</span>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Appliance Type:</span>
                            <span class="text-gray-700" id="detailAppliance">Air Conditioner</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Service Type:</span>
                            <span class="text-gray-700" id="detailServiceType">Repair</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Date:</span>
                            <span class="text-gray-700" id="detailServiceDate">October 6, 2025</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Time:</span>
                            <span class="text-gray-700" id="detailServiceTime">11:00 AM</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-center">
                <button onclick="closeBookingDetailsModal()" class="px-8 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    Back
                </button>
            </div>
        </div>
    </div>

    <script>
        // Pagination variables
        let allPendingBookings = [];
        let allCompletedBookings = [];
        let allCancelledBookings = [];
        let allTechnicians = [];
        let currentPendingPage = 1;
        let currentCompletedPage = 1;
        let currentCancelledPage = 1;
        let currentTechPage = 1;
        const bookingsPerPage = 5;
        const techniciansPerPage = 5;

        // Update dashboard statistics
        async function updateDashboardStats() {
            try {
                const response = await fetch('/api/bookings/stats');
                const stats = await response.json();

                document.getElementById('statPendingBookings').textContent = stats.pending_count || 0;
                document.getElementById('statServicesCompleted').textContent = stats.completed_count || 0;
                document.getElementById('statTodayRevenue').textContent = '₱' + (stats.today_revenue ? parseFloat(stats.today_revenue).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '0.00');
                document.getElementById('statTotalRevenue').textContent = '₱' + (stats.total_revenue ? parseFloat(stats.total_revenue).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '0.00');
            } catch (error) {
                console.error('Error updating dashboard stats:', error);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Update stats on page load
            updateDashboardStats();

            // Hamburger Menu Toggle
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

            // Tab switching functionality
            const pendingTab = document.getElementById('pendingTab');
            const completedTab = document.getElementById('completedTab');
            const cancelledTab = document.getElementById('cancelledTab');
            const pendingContent = document.getElementById('pendingContent');
            const completedContent = document.getElementById('completedContent');
            const cancelledContent = document.getElementById('cancelledContent');

            pendingTab.addEventListener('click', function() {
                // Show pending content
                pendingContent.classList.remove('hidden');
                completedContent.classList.add('hidden');
                cancelledContent.classList.add('hidden');

                // Update tab styles
                pendingTab.classList.add('border-b-4', 'border-[#2B9DD1]');
                completedTab.classList.remove('border-b-4', 'border-[#2B9DD1]');
                cancelledTab.classList.remove('border-b-4', 'border-[#2B9DD1]');
            });

            completedTab.addEventListener('click', function() {
                // Show completed content
                completedContent.classList.remove('hidden');
                pendingContent.classList.add('hidden');
                cancelledContent.classList.add('hidden');

                // Update tab styles
                completedTab.classList.add('border-b-4', 'border-[#2B9DD1]');
                pendingTab.classList.remove('border-b-4', 'border-[#2B9DD1]');
                cancelledTab.classList.remove('border-b-4', 'border-[#2B9DD1]');

                // Render pagination for completed bookings
                renderTablePagination(currentCompletedPage, allCompletedBookings.length, bookingsPerPage, 'mainTablePagination', 'changeCompletedPage');
            });

            cancelledTab.addEventListener('click', function() {
                // Show cancelled content
                cancelledContent.classList.remove('hidden');
                pendingContent.classList.add('hidden');
                completedContent.classList.add('hidden');

                // Update tab styles
                cancelledTab.classList.add('border-b-4', 'border-[#2B9DD1]');
                pendingTab.classList.remove('border-b-4', 'border-[#2B9DD1]');
                completedTab.classList.remove('border-b-4', 'border-[#2B9DD1]');

                // Render pagination for cancelled bookings
                renderTablePagination(currentCancelledPage, allCancelledBookings.length, bookingsPerPage, 'mainTablePagination', 'changeCancelledPage');
            });

            pendingTab.addEventListener('click', function() {
                // Show pending content
                pendingContent.classList.remove('hidden');
                completedContent.classList.add('hidden');

                // Update tab styles
                pendingTab.classList.add('border-b-4', 'border-[#2B9DD1]');
                completedTab.classList.remove('border-b-4', 'border-[#2B9DD1]');

                // Render pagination for pending bookings
                renderTablePagination(currentPendingPage, allPendingBookings.length, bookingsPerPage, 'mainTablePagination', 'changePendingPage');
            });
        });

        // Handle action dropdown change
        function handleActionChange(selectElement, bookingId, isAssigned) {
            const value = selectElement.value;

            if (value === 'assign' || value === 'change') {
                openAssignTechModal(bookingId, isAssigned);
            } else if (value === 'complete') {
                openRecordDetailsModal(bookingId);
            } else if (value === 'view') {
                openBookingDetailsModal(bookingId);
            } else if (value === 'cancel') {
                openCancelBookingModal(bookingId);
            }

            // Reset dropdown to default "Action" text
            selectElement.selectedIndex = 0;
        }

        // Open Assign Tech Modal
        let currentBookingId = null;
        let currentIsReassignment = false;

        function openAssignTechModal(bookingId = null, isReassignment = false) {
            currentBookingId = bookingId;
            currentIsReassignment = isReassignment;
            document.getElementById('assignTechModal').classList.remove('hidden');
        }

        // Close Assign Tech Modal
        function closeAssignTechModal() {
            document.getElementById('assignTechModal').classList.add('hidden');
            currentBookingId = null;
            currentIsReassignment = false;
            // Reset radio button selection
            const radios = document.querySelectorAll('input[name="technician"]');
            radios.forEach(radio => radio.checked = false);
        }

        // Cancel Booking Modal Functions
        let currentCancelBookingId = null;

        function openCancelBookingModal(bookingId) {
            currentCancelBookingId = bookingId;

            // Find the booking data
            const booking = allPendingBookings.find(b => b.id == bookingId);
            if (booking) {
                document.getElementById('cancelBookingNumber').textContent = booking.booking_number;
                document.getElementById('cancelCustomerName').textContent = booking.customer.name;
                document.getElementById('cancelServiceType').textContent = booking.service_type;
            }

            // Reset reason selection
            document.getElementById('cancellationReason').selectedIndex = 0;

            document.getElementById('cancelBookingModal').classList.remove('hidden');
        }

        function closeCancelModal() {
            document.getElementById('cancelBookingModal').classList.add('hidden');
            currentCancelBookingId = null;
            document.getElementById('cancellationReason').selectedIndex = 0;
        }

        function confirmCancelBooking() {
            const reason = document.getElementById('cancellationReason').value;

            if (!reason) {
                alert('Please select a cancellation reason.');
                return;
            }

            if (!currentCancelBookingId) {
                alert('No booking selected for cancellation.');
                return;
            }

            // Show loading state
            const confirmBtn = event.target;
            const originalText = confirmBtn.textContent;
            confirmBtn.textContent = 'Cancelling...';
            confirmBtn.disabled = true;

            // Make API call to cancel booking
            fetch(`/api/bookings/${currentCancelBookingId}/cancel`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    cancellation_reason: reason
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message || 'Booking cancelled successfully!');
                    closeCancelModal();

                    // Refresh both pending and completed bookings to reflect the change
                    refreshData();
                } else {
                    alert(data.message || 'Failed to cancel booking.');
                }
            })
            .catch(error => {
                console.error('Error cancelling booking:', error);
                alert('An error occurred while cancelling the booking.');
            })
            .finally(() => {
                confirmBtn.textContent = originalText;
                confirmBtn.disabled = false;
            });
        }

        // Confirm Technician Assignment
        function confirmAssignment() {
            const selectedTech = document.querySelector('input[name="technician"]:checked');

            if (!selectedTech) {
                alert('Please select a technician');
                return;
            }

            const technicianName = selectedTech.value;

            // Update the booking row if we have a bookingId
            if (currentBookingId) {
                const row = document.querySelector(`tr[data-booking-id="${currentBookingId}"]`);
                if (row) {
                    // Update technician cell with blue badge
                    const technicianCell = row.cells[3]; // 4th column (0-indexed)
                    technicianCell.innerHTML = `
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                            ${technicianName}
                        </span>
                    `;

                    // Update data-assigned attribute
                    row.setAttribute('data-assigned', 'true');

                    // Update action dropdown options
                    const actionSelect = row.querySelector('.action-select');
                    if (actionSelect) {
                        actionSelect.innerHTML = `
                            <option value="" selected disabled hidden>Action</option>
                            <option value="change">Change Technician</option>
                            <option value="complete">Complete Job</option>
                            <option value="view">View Details</option>
                        `;
                        // Update onchange to pass new parameters
                        actionSelect.setAttribute('onchange', `handleActionChange(this, '${currentBookingId}', true)`);
                    }
                }
            }

            // Show success message
            if (currentIsReassignment) {
                alert(`Technician changed to ${technicianName} successfully!`);
            } else {
                alert(`${technicianName} has been assigned successfully!`);
            }

            closeAssignTechModal();
        }

        // Close Record Details Modal
        function closeRecordDetailsModal() {
            document.getElementById('recordDetailsModal').classList.add('hidden');
        }

        // Open Booking Details Modal - Load real data from API
        async function openBookingDetailsModal(bookingId = null) {
            try {
                currentBookingId = bookingId;
                const response = await fetch(`/api/bookings/${bookingId}`);
                const booking = await response.json();

                // Populate Booking Information
                document.getElementById('detailBookingNumber').textContent = booking.booking_number;
                document.getElementById('detailCustomerName').textContent = booking.customer.name;
                document.getElementById('detailLocation').textContent = booking.location;
                document.getElementById('detailContactNumber').textContent = booking.customer.phone;
                document.getElementById('detailLandmark').textContent = booking.customer.address || 'N/A';
                document.getElementById('detailIssueDescription').textContent = booking.issue_description || 'N/A';

                // Populate Service Details
                document.getElementById('detailAppliance').textContent = booking.appliance;
                document.getElementById('detailServiceType').textContent = booking.service_type;
                const serviceDate = new Date(booking.service_date).toLocaleDateString('en-US', {
                    year: 'numeric', month: 'long', day: '2-digit'
                });
                document.getElementById('detailServiceDate').textContent = serviceDate;

                // Format time
                const formatTime = (timeStr) => {
                    if (!timeStr) return 'N/A';
                    const [hours, minutes] = timeStr.split(':');
                    const hour = parseInt(hours);
                    const ampm = hour >= 12 ? 'PM' : 'AM';
                    const displayHour = hour % 12 || 12;
                    return `${displayHour}:${minutes} ${ampm}`;
                };
                document.getElementById('detailServiceTime').textContent = formatTime(booking.service_time);

                document.getElementById('bookingDetailsModal').classList.remove('hidden');
            } catch (error) {
                console.error('Error loading booking details:', error);
                alert('Failed to load booking details. Please try again.');
            }
        }

        // Close Booking Details Modal
        function closeBookingDetailsModal() {
            document.getElementById('bookingDetailsModal').classList.add('hidden');
        }

        // Open Completed Details Modal
        function openCompletedDetailsModal() {
            document.getElementById('completedDetailsModal').classList.remove('hidden');
        }

        // Close Completed Details Modal
        function closeCompletedDetailsModal() {
            document.getElementById('completedDetailsModal').classList.add('hidden');
        }

        // Open Receipt Confirmation Modal
        function openReceiptConfirmModal() {
            // Copy receipt data to confirmation modal
            const receiptPartsList = document.getElementById('receiptPartsList').innerHTML;
            const partsSubtotal = document.getElementById('partsSubtotal').textContent;
            const grandTotal = document.getElementById('grandTotal').textContent;

            document.getElementById('confirmReceiptPartsList').innerHTML = receiptPartsList;
            document.getElementById('confirmPartsSubtotal').textContent = partsSubtotal;
            document.getElementById('confirmGrandTotal').textContent = grandTotal;

            document.getElementById('receiptConfirmModal').classList.remove('hidden');
        }

        // Close Receipt Confirmation Modal
        function closeReceiptConfirmModal() {
            document.getElementById('receiptConfirmModal').classList.add('hidden');
        }

        // Confirm Generate Receipt
        function confirmGenerateReceipt() {
            // Handle receipt generation logic here
            alert('Receipt generated successfully!');
            closeReceiptConfirmModal();
            closeRecordDetailsModal();
        }

        // Close modal when clicking outside
        document.getElementById('assignTechModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeAssignTechModal();
            }
        });

        document.getElementById('recordDetailsModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeRecordDetailsModal();
            }
        });

        document.getElementById('bookingDetailsModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeBookingDetailsModal();
            }
        });

        document.getElementById('receiptConfirmModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeReceiptConfirmModal();
            }
        });

        document.getElementById('completedDetailsModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeCompletedDetailsModal();
            }
        });

        // Parts Management Functions - Track quantities across all pages
        let partQuantities = {}; // Store quantities for all parts

        function incrementPart(partId) {
            const partDiv = document.querySelector(`[data-part-id="${partId}"]`);
            const qtyInput = partDiv.querySelector('.part-qty');
            const maxQty = parseInt(partDiv.dataset.maxQty);
            let currentQty = parseInt(qtyInput.value);

            if (currentQty < maxQty) {
                currentQty++;
                qtyInput.value = currentQty;
                partQuantities[partId] = currentQty;
                updateReceipt();
            }
        }

        function decrementPart(partId) {
            const partDiv = document.querySelector(`[data-part-id="${partId}"]`);
            const qtyInput = partDiv.querySelector('.part-qty');
            let currentQty = parseInt(qtyInput.value);
            if (currentQty > 0) {
                currentQty--;
                qtyInput.value = currentQty;
                partQuantities[partId] = currentQty;
                updateReceipt();
            }
        }

        function updateReceipt() {
            const receiptList = document.getElementById('receiptPartsList');
            let partsSubtotal = 0;

            // Clear current receipt
            receiptList.innerHTML = '';

            // Add each part with quantity > 0 from all pages
            allPartsData.forEach(part => {
                const qty = partQuantities[part.id] || 0;
                if (qty > 0) {
                    const partPrice = parseFloat(part.selling_price);
                    const lineTotal = qty * partPrice;
                    partsSubtotal += lineTotal;

                    const lineItem = document.createElement('div');
                    lineItem.className = 'flex justify-between py-1';
                    lineItem.innerHTML = `
                        <span class="text-gray-700">${part.name} (x${qty})</span>
                        <span class="text-gray-900 font-semibold">₱ ${lineTotal.toFixed(2)}</span>
                    `;
                    receiptList.appendChild(lineItem);
                }
            });

            // Update subtotal
            document.getElementById('partsSubtotal').textContent = `₱ ${partsSubtotal.toFixed(2)}`;

            // Update grand total (parts + labor ₱80.00)
            const laborCost = 80.00;
            const grandTotal = partsSubtotal + laborCost;
            document.getElementById('grandTotal').textContent = `₱ ${grandTotal.toFixed(2)}`;
        }

        // Auto-refresh variables
        let refreshInterval;
        let isRefreshing = false;

        // Initialize receipt on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateReceipt();
            loadPendingBookings();
            loadCompletedBookings();
            loadCancelledBookings();
            updateDashboardStats();

            // Start auto-refresh every 30 seconds
            refreshInterval = setInterval(refreshData, 30000);
        });

        // Check if auto-refresh should be paused
        function shouldPauseAutoRefresh() {
            // Check if any modal is open
            const modals = [
                document.getElementById('assignTechModal'),
                document.getElementById('recordDetailsModal'),
                document.getElementById('receiptConfirmModal'),
                document.getElementById('completedDetailsModal')
            ];

            const isModalOpen = modals.some(modal => modal && !modal.classList.contains('hidden'));

            // Check if user is actively interacting with dropdowns or forms
            const activeDropdowns = document.querySelectorAll('select:focus, input:focus, textarea:focus');
            const isUserInteracting = activeDropdowns.length > 0;

            // Check if there's an ongoing API request (assign/complete operations)
            const loadingButtons = document.querySelectorAll('button:disabled');
            const isAPICallInProgress = Array.from(loadingButtons).some(btn =>
                btn.textContent.includes('Assigning') ||
                btn.textContent.includes('Completing') ||
                btn.textContent.includes('Loading')
            );

            return isModalOpen || isUserInteracting || isAPICallInProgress;
        }

        // Manual refresh function
        async function refreshData() {
            if (isRefreshing) return;

            // Skip auto-refresh if user is actively interacting
            if (shouldPauseAutoRefresh()) {
                console.log('Auto-refresh paused - user is interacting with the system');
                return;
            }

            isRefreshing = true;
            try {
                // Show loading indicator if available
                const refreshBtn = document.querySelector('button[onclick="refreshData()"]');
                if (refreshBtn) {
                    refreshBtn.disabled = true;
                    refreshBtn.innerHTML = '<svg class="animate-spin h-4 w-4" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg><span class="hidden sm:inline ml-1">Refreshing...</span>';
                }

                // Refresh all data
                await Promise.all([
                    loadPendingBookings(),
                    loadCompletedBookings(),
                    loadCancelledBookings(),
                    updateDashboardStats()
                ]);

            } catch (error) {
                console.error('Error refreshing data:', error);
            } finally {
                isRefreshing = false;

                // Restore refresh button
                const refreshBtn = document.querySelector('button[onclick="refreshData()"]');
                if (refreshBtn) {
                    refreshBtn.disabled = false;
                    refreshBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg><span class="hidden sm:inline ml-1">Refresh</span>';
                }
            }
        }

        // Clear interval when page unloads
        window.addEventListener('beforeunload', function() {
            if (refreshInterval) {
                clearInterval(refreshInterval);
            }
        });

        // Render pagination for tables
        function renderTablePagination(currentPage, totalItems, itemsPerPage, containerId, changePageFunction) {
            const container = document.getElementById(containerId);
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            if (totalPages <= 1) {
                container.innerHTML = '';
                return;
            }

            let html = '<div class="flex items-center gap-2">';

            // Previous button
            html += `
                <button onclick="${changePageFunction}(${currentPage - 1})"
                    ${currentPage === 1 ? 'disabled' : ''}
                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (i === currentPage) {
                    html += `<button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1] hover:bg-[#1e7ba8] transition-colors">${i}</button>`;
                } else {
                    html += `<button onclick="${changePageFunction}(${i})" class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">${i}</button>`;
                }
            }

            // Next button
            html += `
                <button onclick="${changePageFunction}(${currentPage + 1})"
                    ${currentPage === totalPages ? 'disabled' : ''}
                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            html += '</div>';
            container.innerHTML = html;
        }

        // Change pending bookings page
        function changePendingPage(page) {
            const totalPages = Math.ceil(allPendingBookings.length / bookingsPerPage);
            if (page >= 1 && page <= totalPages) {
                currentPendingPage = page;
                renderPendingBookings();
            }
        }

        // Change completed bookings page
        function changeCompletedPage(page) {
            const totalPages = Math.ceil(allCompletedBookings.length / bookingsPerPage);
            if (page >= 1 && page <= totalPages) {
                currentCompletedPage = page;
                renderCompletedBookings();
            }
        }

        // Change cancelled bookings page
        function changeCancelledPage(page) {
            const totalPages = Math.ceil(allCancelledBookings.length / bookingsPerPage);
            if (page >= 1 && page <= totalPages) {
                currentCancelledPage = page;
                renderCancelledBookings();
            }
        }

        // Change technician page
        function changeTechPage(page) {
            const totalPages = Math.ceil(allTechnicians.length / techniciansPerPage);
            if (page >= 1 && page <= totalPages) {
                currentTechPage = page;
                renderTechnicians();
            }
        }

        // Render pending bookings
        function renderPendingBookings() {
            const tbody = document.querySelector('#pendingBookingsTable tbody');
            tbody.innerHTML = '';

            if (allPendingBookings.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" class="px-6 py-8 text-center text-gray-500">No pending bookings at the moment</td></tr>';

                // Only render pagination if pending tab is currently active
                const pendingTab = document.getElementById('pendingTab');
                const isPendingTabActive = pendingTab && pendingTab.classList.contains('border-b-4');

                if (isPendingTabActive) {
                    renderTablePagination(1, 0, bookingsPerPage, 'mainTablePagination', 'changePendingPage');
                }
                return;
            }

            const startIdx = (currentPendingPage - 1) * bookingsPerPage;
            const endIdx = startIdx + bookingsPerPage;
            const pageBookings = allPendingBookings.slice(startIdx, endIdx);

            pageBookings.forEach(booking => {
                const isAssigned = booking.technician_id !== null;
                const technicianDisplay = isAssigned
                    ? `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        ${booking.technician.name}
                    </span>`
                    : `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        Not Assigned
                    </span>`;

                const actionOptions = isAssigned
                    ? `<option value="" selected disabled hidden>Action</option>
                       <option value="change">Change Technician</option>
                       <option value="complete">Record Details</option>
                       <option value="view">View Details</option>
                       <option value="cancel">Cancel Booking</option>`
                    : `<option value="" selected disabled hidden>Action</option>
                       <option value="assign">Assign Technician</option>
                       <option value="view">View Details</option>
                       <option value="cancel">Cancel Booking</option>`;

                const serviceDate = new Date(booking.service_date).toLocaleDateString('en-US', {
                    year: 'numeric', month: 'short', day: '2-digit'
                });

                const formatTime = (timeStr) => {
                    if (!timeStr) return 'N/A';
                    const [hours, minutes] = timeStr.split(':');
                    const hour = parseInt(hours);
                    const ampm = hour >= 12 ? 'PM' : 'AM';
                    const displayHour = hour % 12 || 12;
                    return `${displayHour}:${minutes} ${ampm}`;
                };
                const formattedTime = formatTime(booking.service_time);

                const row = `
                    <tr class="border-b border-gray-200 hover:bg-gray-50" data-booking-id="${booking.id}" data-assigned="${isAssigned}">
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.booking_number}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.customer.name}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.service_type}</td>
                        <td class="px-6 py-4 text-sm">${technicianDisplay}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.location}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${formattedTime}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${serviceDate}</td>
                        <td class="px-6 py-4 text-sm">
                            <select class="action-select px-3 py-1.5 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-[#2B9DD1]"
                                    onchange="handleActionChange(this, '${booking.id}', ${isAssigned})">
                                ${actionOptions}
                            </select>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });

            // Only render pagination if pending tab is currently active
            const pendingTab = document.getElementById('pendingTab');
            const isPendingTabActive = pendingTab && pendingTab.classList.contains('border-b-4');

            if (isPendingTabActive) {
                renderTablePagination(currentPendingPage, allPendingBookings.length, bookingsPerPage, 'mainTablePagination', 'changePendingPage');
            }

            // Update pending bookings count in tab
            const pendingCount = document.getElementById('pendingCount');
            if (pendingCount) {
                pendingCount.textContent = allPendingBookings.length;
            }
        }

        // Render completed bookings
        function renderCompletedBookings() {
            const tbody = document.querySelector('#completedBookingsTable tbody');
            tbody.innerHTML = '';

            if (allCompletedBookings.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" class="px-6 py-8 text-center text-gray-500">No completed bookings yet</td></tr>';

                // Only render pagination if completed tab is currently active
                const completedTab = document.getElementById('completedTab');
                const isCompletedTabActive = completedTab && completedTab.classList.contains('border-b-4');

                if (isCompletedTabActive) {
                    renderTablePagination(1, 0, bookingsPerPage, 'mainTablePagination', 'changeCompletedPage');
                }
                return;
            }

            const startIdx = (currentCompletedPage - 1) * bookingsPerPage;
            const endIdx = startIdx + bookingsPerPage;
            const pageBookings = allCompletedBookings.slice(startIdx, endIdx);

            pageBookings.forEach(booking => {
                // Handle different completion dates for completed vs cancelled bookings
                const isCompleted = booking.status === 'Completed';
                const isCancelled = booking.status === 'Cancelled';

                let dateDisplay = 'N/A';
                if (isCompleted && booking.completed_at) {
                    dateDisplay = new Date(booking.completed_at).toLocaleDateString('en-US', {
                        year: 'numeric', month: 'short', day: '2-digit'
                    });
                } else if (isCancelled && booking.cancelled_at) {
                    dateDisplay = new Date(booking.cancelled_at).toLocaleDateString('en-US', {
                        year: 'numeric', month: 'short', day: '2-digit'
                    });
                }

                // Create status badge for cancelled bookings
                const statusBadge = isCancelled ?
                    '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Cancelled</span>' :
                    '';

                const row = `
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.booking_number}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            ${booking.customer.name}
                            ${statusBadge}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.service_type}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.technician ? booking.technician.name : 'N/A'}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${dateDisplay}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">₱${parseFloat(booking.total_amount || 0).toFixed(2)}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.location}</td>
                        <td class="px-6 py-4 text-sm">
                            <button onclick="viewCompletedDetails('${booking.id}')" class="px-3 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded-md transition-colors">
                                View Details
                            </button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });

            // Only render pagination if completed tab is currently active
            const completedTab = document.getElementById('completedTab');
            const isCompletedTabActive = completedTab && completedTab.classList.contains('border-b-4');

            if (isCompletedTabActive) {
                renderTablePagination(currentCompletedPage, allCompletedBookings.length, bookingsPerPage, 'mainTablePagination', 'changeCompletedPage');
            }
        }

        // Render cancelled bookings
        function renderCancelledBookings() {
            const tbody = document.querySelector('#cancelledBookingsTable tbody');
            tbody.innerHTML = '';

            if (allCancelledBookings.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" class="px-6 py-8 text-center text-gray-500">No cancelled bookings yet</td></tr>';

                // Only render pagination if cancelled tab is currently active
                const cancelledTab = document.getElementById('cancelledTab');
                const isCancelledTabActive = cancelledTab && cancelledTab.classList.contains('border-b-4');

                if (isCancelledTabActive) {
                    renderTablePagination(1, 0, bookingsPerPage, 'mainTablePagination', 'changeCancelledPage');
                }
                return;
            }

            const startIdx = (currentCancelledPage - 1) * bookingsPerPage;
            const endIdx = startIdx + bookingsPerPage;
            const pageBookings = allCancelledBookings.slice(startIdx, endIdx);

            pageBookings.forEach(booking => {
                const cancelledDate = booking.cancelled_at ? new Date(booking.cancelled_at).toLocaleDateString('en-US', {
                    year: 'numeric', month: 'short', day: '2-digit'
                }) : 'N/A';

                // Format cancellation reason for display
                const reasonDisplay = booking.cancellation_reason ?
                    booking.cancellation_reason.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase()) :
                    'N/A';

                const row = `
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.booking_number}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.customer.name}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.service_type}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.technician ? booking.technician.name : 'N/A'}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${booking.location}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${cancelledDate}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${reasonDisplay}</td>
                        <td class="px-6 py-4 text-sm">
                            <button onclick="viewCancelledDetails('${booking.id}')" class="px-3 py-1.5 bg-gray-600 hover:bg-gray-700 text-white text-xs font-semibold rounded-md transition-colors">
                                View Details
                            </button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });

            // Only render pagination if cancelled tab is currently active
            const cancelledTab = document.getElementById('cancelledTab');
            const isCancelledTabActive = cancelledTab && cancelledTab.classList.contains('border-b-4');

            if (isCancelledTabActive) {
                renderTablePagination(currentCancelledPage, allCancelledBookings.length, bookingsPerPage, 'mainTablePagination', 'changeCancelledPage');
            }
        }

        // Load Pending Bookings from API
        async function loadPendingBookings() {
            try {
                const response = await fetch('/api/bookings/pending');
                const bookings = await response.json();

                allPendingBookings = bookings;
                currentPendingPage = 1;
                renderPendingBookings();
            } catch (error) {
                console.error('Error loading pending bookings:', error);
                const tbody = document.querySelector('#pendingBookingsTable tbody');
                tbody.innerHTML = '<tr><td colspan="8" class="px-6 py-8 text-center text-red-500">Failed to load bookings. Please refresh the page.</td></tr>';
            }
        }

        // Load Completed Bookings from API
        async function loadCompletedBookings() {
            try {
                const response = await fetch('/api/bookings/completed');
                const bookings = await response.json();

                allCompletedBookings = bookings;
                currentCompletedPage = 1;
                renderCompletedBookings();
            } catch (error) {
                console.error('Error loading completed bookings:', error);
            }
        }

        // Load Cancelled Bookings from API
        async function loadCancelledBookings() {
            try {
                const response = await fetch('/api/bookings/cancelled');
                const bookings = await response.json();

                allCancelledBookings = bookings;
                currentCancelledPage = 1;
                renderCancelledBookings();

                // Update cancelled count badge
                const cancelledCount = document.getElementById('cancelledCount');
                if (cancelledCount) {
                    cancelledCount.textContent = bookings.length;
                }
            } catch (error) {
                console.error('Error loading cancelled bookings:', error);
            }
        }

        // View Completed Transaction Details
        async function viewCompletedDetails(bookingId) {
            try {
                const response = await fetch(`/api/bookings/${bookingId}`);
                const booking = await response.json();

                // Populate Booking Information
                document.getElementById('completedBookingNumber').textContent = booking.booking_number;
                document.getElementById('completedCustomerName').textContent = booking.customer.name;
                document.getElementById('completedLocation').textContent = booking.location;
                document.getElementById('completedContactNumber').textContent = booking.customer.phone;
                document.getElementById('completedLandmark').textContent = booking.customer.address || 'N/A';
                document.getElementById('completedIssueDescription').textContent = booking.issue_description || 'N/A';

                // Populate Service Details
                document.getElementById('completedAppliance').textContent = booking.appliance;
                document.getElementById('completedServiceType').textContent = booking.service_type;
                const serviceDate = new Date(booking.service_date).toLocaleDateString('en-US', {
                    year: 'numeric', month: 'long', day: '2-digit'
                });
                document.getElementById('completedServiceDate').textContent = serviceDate;

                // Format time to 12-hour format
                const formatTime = (timeStr) => {
                    if (!timeStr) return 'N/A';
                    const [hours, minutes] = timeStr.split(':');
                    const hour = parseInt(hours);
                    const ampm = hour >= 12 ? 'PM' : 'AM';
                    const displayHour = hour % 12 || 12;
                    return `${displayHour}:${minutes} ${ampm}`;
                };
                document.getElementById('completedServiceTime').textContent = formatTime(booking.service_time);

                // Populate Receipt Summary
                const partsList = document.getElementById('completedPartsList');
                partsList.innerHTML = '';

                let partsSubtotal = 0;
                booking.booking_parts.forEach(part => {
                    const lineTotal = parseFloat(part.subtotal);
                    partsSubtotal += lineTotal;

                    const partItem = document.createElement('div');
                    partItem.className = 'flex justify-between py-1';
                    partItem.innerHTML = `
                        <span class="text-gray-700" style="font-family: 'Lato', sans-serif;">${part.inventory_item.name} (x${part.quantity})</span>
                        <span class="text-gray-900 font-semibold" style="font-family: 'Lato', sans-serif;">₱ ${lineTotal.toFixed(2)}</span>
                    `;
                    partsList.appendChild(partItem);
                });

                document.getElementById('completedPartsSubtotal').textContent = `₱ ${partsSubtotal.toFixed(2)}`;
                document.getElementById('completedLaborCost').textContent = `₱ ${parseFloat(booking.labor_cost).toFixed(2)}`;
                document.getElementById('completedGrandTotal').textContent = `₱ ${parseFloat(booking.total_amount).toFixed(2)}`;

                openCompletedDetailsModal();
            } catch (error) {
                console.error('Error loading booking details:', error);
                alert('Failed to load booking details. Please try again.');
            }
        }

        // View Cancelled Booking Details
        function viewCancelledDetails(bookingId) {
            const booking = allCancelledBookings.find(b => b.id == bookingId);
            if (booking) {
                const cancelledDate = booking.cancelled_at ? new Date(booking.cancelled_at).toLocaleDateString('en-US', {
                    year: 'numeric', month: 'long', day: '2-digit'
                }) : 'N/A';

                const reasonDisplay = booking.cancellation_reason ?
                    booking.cancellation_reason.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase()) :
                    'N/A';

                alert(`Booking Details:\n\nBooking #: ${booking.booking_number}\nCustomer: ${booking.customer.name}\nService: ${booking.service_type}\nLocation: ${booking.location}\nCancelled: ${cancelledDate}\nReason: ${reasonDisplay}`);
            } else {
                alert('Booking details not found.');
            }
        }

        // Render technicians with pagination
        function renderTechnicians() {
            const tbody = document.querySelector('#assignTechModal tbody');
            tbody.innerHTML = '';

            if (allTechnicians.length === 0) {
                tbody.innerHTML = '<tr><td colspan="2" class="px-4 py-8 text-center text-gray-500">No technicians available</td></tr>';
                renderTablePagination(1, 0, techniciansPerPage, 'assignTechPagination', 'changeTechPage');
                return;
            }

            const startIdx = (currentTechPage - 1) * techniciansPerPage;
            const endIdx = startIdx + techniciansPerPage;
            const pageTechs = allTechnicians.slice(startIdx, endIdx);

            pageTechs.forEach(tech => {
                const isAvailable = tech.status === 'Available';
                const isOffDuty = tech.status === 'Off Duty';
                const isOnJob = tech.status === 'On Job';
                const row = `
                    <tr class="border-b border-gray-200 ${isAvailable ? 'hover:bg-gray-50' : ''}">
                        <td class="px-4 py-3">
                            <label class="flex items-center ${isAvailable ? 'cursor-pointer' : 'cursor-not-allowed'}">
                                <input type="radio" name="technician" value="${tech.id}" data-name="${tech.name}"
                                       class="mr-3 w-4 h-4 text-[#2B9DD1] focus:ring-[#2B9DD1]"
                                       ${!isAvailable ? 'disabled' : ''}>
                                <span class="text-sm ${isAvailable ? 'text-gray-900' : 'text-gray-400'}">${tech.name}</span>
                            </label>
                        </td>
                        <td class="px-4 py-3 text-sm ${isAvailable ? 'text-gray-900' : 'text-gray-400'}">
                            ${isAvailable ? 'Available' : isOffDuty ? 'Off Duty' : 'On Job'}
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });

            renderTablePagination(currentTechPage, allTechnicians.length, techniciansPerPage, 'assignTechPagination', 'changeTechPage');
        }

        // Override openAssignTechModal to load all technicians
        const originalOpenAssignTechModal = openAssignTechModal;
        async function openAssignTechModal(bookingId = null, isReassignment = false) {
            currentBookingId = bookingId;
            currentIsReassignment = isReassignment;

            try {
                // Load booking details
                const bookingResponse = await fetch(`/api/bookings/${bookingId}`);
                const booking = await bookingResponse.json();

                // Populate service information
                document.getElementById('assignServiceType').textContent = booking.service_type;
                document.getElementById('assignBookingNumber').textContent = booking.booking_number;
                document.getElementById('assignCustomerName').textContent = booking.customer.name;
                document.getElementById('assignAppliance').textContent = booking.appliance;

                // Load ALL technicians (not filtered by appliance or status)
                const techResponse = await fetch(`/api/technicians`);
                allTechnicians = await techResponse.json();
                currentTechPage = 1;

                renderTechnicians();
                document.getElementById('assignTechModal').classList.remove('hidden');
            } catch (error) {
                console.error('Error loading technicians:', error);
                alert('Failed to load technicians. Please try again.');
            }
        }

        // Override confirmAssignment to call API
        async function confirmAssignment() {
            const selectedTech = document.querySelector('input[name="technician"]:checked');

            if (!selectedTech) {
                alert('Please select a technician');
                return;
            }

            const technicianId = selectedTech.value;
            const technicianName = selectedTech.dataset.name;

            try {
                const response = await fetch(`/api/bookings/${currentBookingId}/assign`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                    },
                    body: JSON.stringify({ technician_id: technicianId })
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    // Show success message
                    if (currentIsReassignment) {
                        alert(`Technician changed to ${technicianName} successfully!`);
                    } else {
                        alert(`${technicianName} has been assigned successfully!`);
                    }

                    // Reload pending bookings table
                    await loadPendingBookings();
                    await updateDashboardStats();
                    closeAssignTechModal();
                } else {
                    alert(result.message || 'Failed to assign technician');
                }
            } catch (error) {
                console.error('Error assigning technician:', error);
                alert('An error occurred. Please try again.');
            }
        }

        // Override openRecordDetailsModal to load available parts with pagination
        let allPartsData = [];
        let currentPartsPage = 1;
        const partsPerPage = 5;

        async function openRecordDetailsModal(bookingId = null) {
            currentBookingId = bookingId;
            currentPartsPage = 1;
            partQuantities = {}; // Reset quantities

            try {
                // Load booking details
                const bookingResponse = await fetch(`/api/bookings/${bookingId}`);
                const booking = await bookingResponse.json();

                // Populate service information
                document.getElementById('recordServiceType').textContent = booking.service_type;
                document.getElementById('recordBookingNumber').textContent = booking.booking_number;
                document.getElementById('recordCustomerName').textContent = booking.customer.name;
                document.getElementById('recordAppliance').textContent = booking.appliance;
                document.getElementById('recordLaborCost').textContent = '₱' + parseFloat(booking.labor_cost).toFixed(2);

                // Load available parts for this booking
                const partsResponse = await fetch(`/api/bookings/${bookingId}/parts`);
                allPartsData = await partsResponse.json();

                renderPartsPage();
                updateReceipt();
                document.getElementById('recordDetailsModal').classList.remove('hidden');
            } catch (error) {
                console.error('Error loading parts:', error);
                alert('Failed to load parts. Please try again.');
            }
        }

        function renderPartsPage() {
            const startIdx = (currentPartsPage - 1) * partsPerPage;
            const endIdx = startIdx + partsPerPage;
            const pageParts = allPartsData.slice(startIdx, endIdx);

            // Populate parts list
            const partsList = document.getElementById('partsList');
            partsList.innerHTML = '';

            pageParts.forEach(part => {
                const savedQty = partQuantities[part.id] || 0;
                const partDiv = `
                    <div class="flex items-center justify-between py-2 border-b border-gray-200"
                         data-part-id="${part.id}"
                         data-part-name="${part.name}"
                         data-part-price="${part.selling_price}"
                         data-max-qty="${part.quantity}">
                        <div class="flex-1">
                            <div class="font-semibold text-sm text-gray-900">${part.name}</div>
                            <div class="text-xs text-gray-600">Unit: ₱ ${parseFloat(part.selling_price).toFixed(2)} (Stock: ${part.quantity})</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button onclick="decrementPart('${part.id}')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">-</button>
                            <input type="text" value="${savedQty}" class="part-qty w-12 h-7 text-center border border-gray-300 rounded text-sm" readonly>
                            <button onclick="incrementPart('${part.id}')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">+</button>
                        </div>
                    </div>
                `;
                partsList.innerHTML += partDiv;
            });

            // Update pagination controls
            const totalPages = Math.ceil(allPartsData.length / partsPerPage);
            const paginationDiv = document.getElementById('partsPagination');

            if (totalPages > 1) {
                let paginationHTML = `<div class="flex items-center justify-center gap-2">`;

                // Previous button
                paginationHTML += `
                    <button onclick="changePartsPage(${currentPartsPage - 1})"
                            ${currentPartsPage === 1 ? 'disabled' : ''}
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                `;

                // Page number buttons
                for (let i = 1; i <= totalPages; i++) {
                    if (i === currentPartsPage) {
                        paginationHTML += `
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1] hover:bg-[#1e7ba8] transition-colors">
                                ${i}
                            </button>
                        `;
                    } else {
                        paginationHTML += `
                            <button onclick="changePartsPage(${i})"
                                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                ${i}
                            </button>
                        `;
                    }
                }

                // Next button
                paginationHTML += `
                    <button onclick="changePartsPage(${currentPartsPage + 1})"
                            ${currentPartsPage === totalPages ? 'disabled' : ''}
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                `;

                paginationHTML += `</div>`;
                paginationDiv.innerHTML = paginationHTML;
            } else {
                paginationDiv.innerHTML = '';
            }
        }

        function changePartsPage(newPage) {
            const totalPages = Math.ceil(allPartsData.length / partsPerPage);
            if (newPage >= 1 && newPage <= totalPages) {
                currentPartsPage = newPage;
                renderPartsPage();
            }
        }

        // Override confirmGenerateReceipt to call complete API
        async function confirmGenerateReceipt() {
            try {
                // Collect parts data from partQuantities object
                const parts = [];

                Object.keys(partQuantities).forEach(partId => {
                    const qty = partQuantities[partId];
                    if (qty > 0) {
                        parts.push({
                            inventory_item_id: partId,
                            quantity: qty
                        });
                    }
                });

                if (parts.length === 0) {
                    alert('Please select at least one part');
                    return;
                }

                const response = await fetch(`/api/bookings/${currentBookingId}/complete`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                    },
                    body: JSON.stringify({ parts: parts })
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    alert('Job completed successfully! Inventory has been updated.');

                    // Reload both tables
                    await loadPendingBookings();
                    await loadCompletedBookings();
                    await updateDashboardStats();

                    closeReceiptConfirmModal();
                    closeRecordDetailsModal();
                } else {
                    alert(result.message || 'Failed to complete job');
                }
            } catch (error) {
                console.error('Error completing job:', error);
                alert('An error occurred. Please try again.');
            }
        }
    </script>
</body>
</html>
