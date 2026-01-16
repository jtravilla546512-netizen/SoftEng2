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
                                Pending Bookings <span class="ml-1 sm:ml-2 bg-yellow-400 text-white px-2 sm:px-2.5 py-0.5 rounded-full text-xs font-bold">6</span>
                            </button>
                            <button id="completedTab" class="px-3 sm:px-4 py-2 text-sm sm:text-base text-gray-900 font-semibold relative whitespace-nowrap">
                                Completed Transactions
                            </button>
                        </div>
                        <a href="/" class="w-full sm:w-auto text-center px-4 sm:px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm sm:text-base font-semibold rounded-lg shadow-md transition-colors inline-block">
                            + New Booking
                        </a>
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
                                <tr class="border-b border-gray-200">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">RP001</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Robin Scherbatsky</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">James Caraan</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Repair</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">₱225.00</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <button onclick="openCompletedDetailsModal()" class="px-3 sm:px-4 py-1.5 sm:py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">INS001</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Ted Mosby</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Ryan Rems</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Installation</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">₱80.00</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <button onclick="openCompletedDetailsModal()" class="px-3 sm:px-4 py-1.5 sm:py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">MN001</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Marshall Eriksen</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Nonong Balinan</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Maintenance</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">₱125.00</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <button onclick="openCompletedDetailsModal()" class="px-3 sm:px-4 py-1.5 sm:py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">RP002</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Barnabas Stinson</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">James Caraan, GB Labrador</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Repair</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">₱275.00</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <button onclick="openCompletedDetailsModal()" class="px-3 sm:px-4 py-1.5 sm:py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">RP003</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Lily Aldrin</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">GB Labrador, Muman Reyes</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Repair</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">₱340.00</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <button onclick="openCompletedDetailsModal()" class="px-3 sm:px-4 py-1.5 sm:py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded transition-colors">
                                            View Details
                                        </button>
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
                                <!-- Row 1: Assigned Technician -->
                                <tr class="border-b border-gray-200 hover:bg-gray-50" data-booking-id="RP001" data-assigned="true">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">RP001</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Robin Scherbatsky</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Repair</td>
                                    <td class="px-3 sm:px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                            </svg>
                                            James Caraan
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Barangay 1-A</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">10:00 AM</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Oct. 01, 2025</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <select class="action-select w-44 border border-gray-300 rounded px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this, 'RP001', true)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="change">Change Technician</option>
                                            <option value="complete">Complete Job</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>

                                <!-- Row 2: Unassigned -->
                                <tr class="border-b border-gray-200 hover:bg-gray-50" data-booking-id="INS001" data-assigned="false">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">INS001</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Ted Mosby</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Installation</td>
                                    <td class="px-3 sm:px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                            Unassigned
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Barangay 2-A</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">12:00 PM</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Oct. 01, 2025</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <select class="action-select w-44 border border-gray-300 rounded px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this, 'INS001', false)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="assign">Assign Tech</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>

                                <!-- Row 3: Assigned Technician -->
                                <tr class="border-b border-gray-200 hover:bg-gray-50" data-booking-id="RP002" data-assigned="true">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">RP002</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Marshall Eriksen</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Repair</td>
                                    <td class="px-3 sm:px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                            </svg>
                                            GB Labrador
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Barangay 3-A</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">01:00 PM</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Oct. 01, 2025</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <select class="action-select w-44 border border-gray-300 rounded px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this, 'RP002', true)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="change">Change Technician</option>
                                            <option value="complete">Complete Job</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>

                                <!-- Row 4: Unassigned -->
                                <tr class="border-b border-gray-200 hover:bg-gray-50" data-booking-id="MN001" data-assigned="false">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">MN001</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Barnabas Stinson</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Maintenance</td>
                                    <td class="px-3 sm:px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                            Unassigned
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Barangay 4-A</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">10:00 AM</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Oct. 02, 2025</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <select class="action-select w-44 border border-gray-300 rounded px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this, 'MN001', false)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="assign">Assign Tech</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>

                                <!-- Row 5: Unassigned -->
                                <tr class="border-b border-gray-200 hover:bg-gray-50" data-booking-id="RP003" data-assigned="false">
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">RP003</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Lily Aldrin</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Repair</td>
                                    <td class="px-3 sm:px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                            Unassigned
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Barangay 5-A</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">11:00 AM</td>
                                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">Oct. 02, 2025</td>
                                    <td class="px-3 sm:px-6 py-4 text-sm">
                                        <select class="action-select w-44 border border-gray-300 rounded px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this, 'RP003', false)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="assign">Assign Tech</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-4 sm:px-6 py-4 bg-gray-50 border-t flex items-center justify-center">
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1] hover:bg-[#1e7ba8] transition-colors">
                                1
                            </button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                2
                            </button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                3
                            </button>
                            <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                4
                            </button>
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
                            <span class="text-gray-900 ml-2">Repair</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Booking ID:</span>
                            <span class="text-gray-900 ml-2">RP001</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Customer:</span>
                            <span class="text-gray-900 ml-2">Robin Scherbatsky</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Labor Cost:</span>
                            <span class="text-gray-900 ml-2">₱80.00</span>
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
                <div class="flex items-center justify-center mt-6 gap-2">
                    <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1] hover:bg-[#1e7ba8] transition-colors">
                        1
                    </button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        2
                    </button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        3
                    </button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        4
                    </button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
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
                                    <span class="text-gray-900 font-semibold">Repair</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Booking ID:</span>
                                    <span class="text-gray-900 font-semibold">RP001</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Customer:</span>
                                    <span class="text-gray-900 font-semibold">Robin Scherbatsky</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Labor Cost:</span>
                                    <span class="text-gray-900 font-semibold">₱80.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Air-con Parts -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Air-con Parts</h3>
                            <div class="space-y-3" id="partsList">
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

                            <!-- Pagination -->
                            <div class="flex items-center justify-center mt-4 space-x-1">
                                <button class="px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">&lt;&lt;</button>
                                <button class="px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">&lt;</button>
                                <button class="px-3 py-1 text-sm bg-gray-200 text-gray-900 rounded font-semibold">1</button>
                                <button class="px-3 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">2</button>
                                <button class="px-3 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">3</button>
                                <button class="px-3 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">4</button>
                                <button class="px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">&gt;</button>
                                <button class="px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">&gt;&gt;</button>
                            </div>
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
                            <span class="text-gray-700">RP001</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Customer Name:</span>
                            <span class="text-gray-700">Robin Scherbatsky</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Location</span>
                            <span class="text-gray-700">Mandaluyong City</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Contact Number:</span>
                            <span class="text-gray-700">+63912-345-6789</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Landmark:</span>
                            <span class="text-gray-700">N/A</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Description of Issue:</span>
                            <span class="text-gray-700 block break-words">RP001</span>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Appliance Type:</span>
                            <span class="text-gray-700">Air Conditioner</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Service Type:</span>
                            <span class="text-gray-700">Repair</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Date:</span>
                            <span class="text-gray-700">October 6, 2025</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-900 block mb-1">Time:</span>
                            <span class="text-gray-700">11:00 AM</span>
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
            const pendingContent = document.getElementById('pendingContent');
            const completedContent = document.getElementById('completedContent');

            pendingTab.addEventListener('click', function() {
                // Show pending content
                pendingContent.classList.remove('hidden');
                completedContent.classList.add('hidden');

                // Update tab styles
                pendingTab.classList.add('border-b-4', 'border-[#2B9DD1]');
                completedTab.classList.remove('border-b-4', 'border-[#2B9DD1]');
            });

            completedTab.addEventListener('click', function() {
                // Show completed content
                completedContent.classList.remove('hidden');
                pendingContent.classList.add('hidden');

                // Update tab styles
                completedTab.classList.add('border-b-4', 'border-[#2B9DD1]');
                pendingTab.classList.remove('border-b-4', 'border-[#2B9DD1]');
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

        // Open Record Details Modal
        function openRecordDetailsModal(bookingId = null) {
            currentBookingId = bookingId;
            document.getElementById('recordDetailsModal').classList.remove('hidden');
        }

        // Close Record Details Modal
        function closeRecordDetailsModal() {
            document.getElementById('recordDetailsModal').classList.add('hidden');
        }

        // Open Booking Details Modal
        function openBookingDetailsModal(bookingId = null) {
            currentBookingId = bookingId;
            document.getElementById('bookingDetailsModal').classList.remove('hidden');
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

        // Parts Management Functions
        function incrementPart(partId) {
            const partDiv = document.querySelector(`[data-part-id="${partId}"]`);
            const qtyInput = partDiv.querySelector('.part-qty');
            let currentQty = parseInt(qtyInput.value);
            currentQty++;
            qtyInput.value = currentQty;
            updateReceipt();
        }

        function decrementPart(partId) {
            const partDiv = document.querySelector(`[data-part-id="${partId}"]`);
            const qtyInput = partDiv.querySelector('.part-qty');
            let currentQty = parseInt(qtyInput.value);
            if (currentQty > 0) {
                currentQty--;
                qtyInput.value = currentQty;
                updateReceipt();
            }
        }

        function updateReceipt() {
            const partItems = document.querySelectorAll('#partsList > div');
            const receiptList = document.getElementById('receiptPartsList');
            let partsSubtotal = 0;

            // Clear current receipt
            receiptList.innerHTML = '';

            // Add each part with quantity > 0
            partItems.forEach(item => {
                const qty = parseInt(item.querySelector('.part-qty').value);
                if (qty > 0) {
                    const partName = item.dataset.partName;
                    const partPrice = parseFloat(item.dataset.partPrice);
                    const lineTotal = qty * partPrice;
                    partsSubtotal += lineTotal;

                    const lineItem = document.createElement('div');
                    lineItem.className = 'flex justify-between py-1';
                    lineItem.innerHTML = `
                        <span class="text-gray-700">${partName} (x${qty})</span>
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

        // Initialize receipt on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateReceipt();
            loadPendingBookings();
            loadCompletedBookings();
            updateDashboardStats();
        });

        // Load Pending Bookings from API
        async function loadPendingBookings() {
            try {
                const response = await fetch('/api/bookings/pending');
                const bookings = await response.json();

                const tbody = document.querySelector('#pendingBookingsTable tbody');
                tbody.innerHTML = '';

                bookings.forEach(booking => {
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
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            Unassigned
                        </span>`;

                    const actionOptions = isAssigned
                        ? `<option value="" selected disabled hidden>Action</option>
                           <option value="change">Change Technician</option>
                           <option value="complete">Complete Job</option>
                           <option value="view">View Details</option>`
                        : `<option value="" selected disabled hidden>Action</option>
                           <option value="assign">Assign Tech</option>
                           <option value="view">View Details</option>`;

                    const serviceDate = new Date(booking.service_date).toLocaleDateString('en-US', {
                        year: 'numeric', month: 'short', day: '2-digit'
                    });

                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-50" data-booking-id="${booking.id}" data-assigned="${isAssigned}">
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">${booking.booking_number}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${booking.customer.name}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${booking.service_type}</td>
                            <td class="px-3 sm:px-6 py-4">${technicianDisplay}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${booking.location}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${booking.service_time}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${serviceDate}</td>
                            <td class="px-3 sm:px-6 py-4 text-sm">
                                <select class="action-select w-44 border border-gray-300 rounded px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent"
                                        onchange="handleActionChange(this, ${booking.id}, ${isAssigned})">
                                    ${actionOptions}
                                </select>
                            </td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
            } catch (error) {
                console.error('Error loading pending bookings:', error);
            }
        }

        // Load Completed Bookings from API
        async function loadCompletedBookings() {
            try {
                const response = await fetch('/api/bookings/completed');
                const bookings = await response.json();

                const tbody = document.querySelector('#completedBookingsTable tbody');
                tbody.innerHTML = '';

                bookings.forEach(booking => {
                    const completedDate = new Date(booking.completed_at).toLocaleDateString('en-US', {
                        year: 'numeric', month: 'short', day: '2-digit'
                    });

                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">${booking.booking_number}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${booking.customer.name}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${booking.service_type}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${booking.technician.name}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${booking.location}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${completedDate}</td>
                            <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">₱ ${parseFloat(booking.total_amount).toFixed(2)}</td>
                            <td class="px-3 sm:px-6 py-4 text-sm">
                                <button onclick="viewCompletedDetails(${booking.id})"
                                        class="px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs sm:text-sm font-semibold rounded transition-colors">
                                    View
                                </button>
                            </td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
            } catch (error) {
                console.error('Error loading completed bookings:', error);
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
                document.getElementById('completedServiceTime').textContent = booking.service_time;

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

        // Override openAssignTechModal to load available technicians
        const originalOpenAssignTechModal = openAssignTechModal;
        async function openAssignTechModal(bookingId = null, isReassignment = false) {
            currentBookingId = bookingId;
            currentIsReassignment = isReassignment;

            try {
                // Load booking details
                const bookingResponse = await fetch(`/api/bookings/${bookingId}`);
                const booking = await bookingResponse.json();

                // Load available technicians for this appliance
                const techResponse = await fetch(`/api/technicians?appliance=${booking.appliance}`);
                const technicians = await techResponse.json();

                // Populate technician list
                const tbody = document.querySelector('#assignTechModal tbody');
                tbody.innerHTML = '';

                technicians.forEach(tech => {
                    const isAvailable = tech.status === 'Available';
                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="technician" value="${tech.id}" data-name="${tech.name}"
                                           class="mr-3 w-4 h-4 text-[#2B9DD1] focus:ring-[#2B9DD1]"
                                           ${!isAvailable ? 'disabled' : ''}>
                                    <span class="text-sm ${isAvailable ? 'text-gray-900' : 'text-gray-500'}">${tech.name}</span>
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm ${isAvailable ? 'text-gray-900' : 'text-gray-500'}">
                                ${tech.status === 'Available' ? 'Available' : tech.status === 'Off Duty' ? 'Off' : 'On Job'}
                            </td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });

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

        // Override openRecordDetailsModal to load available parts
        async function openRecordDetailsModal(bookingId = null) {
            currentBookingId = bookingId;

            try {
                // Load available parts for this booking
                const response = await fetch(`/api/bookings/${bookingId}/parts`);
                const parts = await response.json();

                // Populate parts list
                const partsList = document.getElementById('partsList');
                partsList.innerHTML = '';

                parts.forEach(part => {
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
                                <input type="text" value="0" class="part-qty w-12 h-7 text-center border border-gray-300 rounded text-sm" readonly>
                                <button onclick="incrementPart('${part.id}')" class="w-7 h-7 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded text-gray-700 font-bold">+</button>
                            </div>
                        </div>
                    `;
                    partsList.innerHTML += partDiv;
                });

                updateReceipt();
                document.getElementById('recordDetailsModal').classList.remove('hidden');
            } catch (error) {
                console.error('Error loading parts:', error);
                alert('Failed to load parts. Please try again.');
            }
        }

        // Update incrementPart to check stock
        function incrementPart(partId) {
            const partDiv = document.querySelector(`[data-part-id="${partId}"]`);
            const qtyInput = partDiv.querySelector('.part-qty');
            const maxQty = parseInt(partDiv.dataset.maxQty);
            let currentQty = parseInt(qtyInput.value);

            if (currentQty < maxQty) {
                currentQty++;
                qtyInput.value = currentQty;
                updateReceipt();
            } else {
                alert('Insufficient stock available');
            }
        }

        // Override confirmGenerateReceipt to call complete API
        async function confirmGenerateReceipt() {
            try {
                // Collect parts data
                const partItems = document.querySelectorAll('#partsList > div');
                const parts = [];

                partItems.forEach(item => {
                    const qty = parseInt(item.querySelector('.part-qty').value);
                    if (qty > 0) {
                        parts.push({
                            inventory_item_id: item.dataset.partId,
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
