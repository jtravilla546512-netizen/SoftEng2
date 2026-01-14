<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        body {
            background-image: url("{{ asset('images/Background.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="font-roboto">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg flex flex-col">
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

                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm9 4a1 1 0 10-2 0v6a1 1 0 102 0V7zm-3 2a1 1 0 10-2 0v4a1 1 0 102 0V9zm-3 3a1 1 0 10-2 0v1a1 1 0 102 0v-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Inventory Management</span>
                </a>

                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <span>Customer Profiles</span>
                </a>

                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
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
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="py-6">
                <div class="inline-block bg-[#2B9DD1] text-white px-8 py-3 rounded-r-full shadow-lg">
                    <h1 class="text-2xl font-bold whitespace-nowrap">Sales Management Dashboard</h1>
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Pending Bookings -->
                    <div class="bg-[#2B9DD1] text-white rounded-lg p-6 shadow-lg">
                        <div class="text-sm font-medium opacity-90 mb-2">Pending Bookings</div>
                        <div class="text-4xl font-bold mb-2">6</div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>%18 vs last week</span>
                        </div>
                    </div>

                    <!-- Services Completed -->
                    <div class="bg-[#2B9DD1] text-white rounded-lg p-6 shadow-lg">
                        <div class="text-sm font-medium opacity-90 mb-2">Services Completed</div>
                        <div class="text-4xl font-bold mb-2">9</div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>%18 vs last week</span>
                        </div>
                    </div>

                    <!-- Today's Revenue -->
                    <div class="bg-[#2B9DD1] text-white rounded-lg p-6 shadow-lg">
                        <div class="text-sm font-medium opacity-90 mb-2">Today's Revenue</div>
                        <div class="text-4xl font-bold mb-2">₱0.00</div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>%12 vs yesterday</span>
                        </div>
                    </div>

                    <!-- Total Revenue -->
                    <div class="bg-[#2B9DD1] text-white rounded-lg p-6 shadow-lg">
                        <div class="text-sm font-medium opacity-90 mb-2">Total Revenue</div>
                        <div class="text-4xl font-bold mb-2">₱99,999.99</div>
                        <div class="flex items-center text-sm">
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
                    <div class="flex items-center justify-between px-6 py-4 border-b">
                        <div class="flex space-x-6">
                            <button id="pendingTab" class="px-4 py-2 text-gray-900 font-semibold relative border-b-4 border-[#2B9DD1]">
                                Pending Bookings <span class="ml-2 bg-yellow-400 text-white px-2.5 py-0.5 rounded-full text-xs font-bold">6</span>
                            </button>
                            <button id="completedTab" class="px-4 py-2 text-gray-900 font-semibold relative">
                                Completed Transactions
                            </button>
                        </div>
                        <a href="/" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white font-semibold rounded-lg shadow-md transition-colors inline-block">
                            + New Booking
                        </a>
                    </div>

                    <!-- Completed Transactions Table (Hidden by default) -->
                    <div id="completedContent" class="overflow-x-auto hidden">
                        <table class="w-full">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Booking #</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Client</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Technician</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Request</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Amount</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">RP001</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Robin Scherbatsky</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">James Caraan</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Repair</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">₱225.00</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="px-4 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">INS001</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Ted Mosby</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Ryan Rems</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Installation</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">₱80.00</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="px-4 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">MN001</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Marshall Eriksen</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Nonong Balinan</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Maintenance</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">₱125.00</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="px-4 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">RP002</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Barnabas Stinson</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">James Caraan, GB Labrador</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Repair</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">₱275.00</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="px-4 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">RP003</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Lily Aldrin</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">GB Labrador, Muman Reyes</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Repair</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">₱340.00</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="px-4 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded transition-colors">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pending Bookings Table -->
                    <div id="pendingContent" class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Booking #</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Name</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Request</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Location</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Number</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Time</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Date</th>
                                    <th class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">RP001</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Robin Scherbatsky</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Repair</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Barangay 1-A</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+63912-345-6789</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">10:00 AM</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Oct. 01, 2025</td>
                                    <td class="px-6 py-4 text-sm">
                                        <select class="action-select border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="assign">Assign Tech</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">INS001</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Ted Mosby</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Installation</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Barangay 2-A</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+63912-345-6789</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">12:00 PM</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Oct. 01, 2025</td>
                                    <td class="px-6 py-4 text-sm">
                                        <select class="action-select border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="assign">Assign Tech</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">RP002</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Marshall Eriksen</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Repair</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Barangay 3-A</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+63912-345-6789</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">01:00 PM</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Oct. 01, 2025</td>
                                    <td class="px-6 py-4 text-sm">
                                        <select class="action-select border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="assign">Assign Tech</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">MN001</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Barnabas Stinson</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Maintenance</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Barangay 4-A</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+63912-345-6789</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">10:00 AM</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Oct. 02, 2025</td>
                                    <td class="px-6 py-4 text-sm">
                                        <select class="action-select border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this)">
                                            <option value="" selected disabled hidden>Action</option>
                                            <option value="assign">Assign Tech</option>
                                            <option value="view">View Details</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-900">RP003</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Lily Aldrin</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Repair</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Barangay 5-A</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+63912-345-6789</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">11:00 AM</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Oct. 02, 2025</td>
                                    <td class="px-6 py-4 text-sm">
                                        <select class="action-select border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" onchange="handleActionChange(this)">
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
                    <div class="px-6 py-4 bg-gray-50 border-t flex items-center justify-center">
                        <div class="flex items-center space-x-2">
                            <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                                Prev
                            </button>
                            <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                                1
                            </button>
                            <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                                2
                            </button>
                            <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                                3
                            </button>
                            <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                                4
                            </button>
                            <button class="px-4 py-2 bg-[#2B9DD1] text-white rounded-md text-sm font-medium hover:bg-[#1e7ba8]">
                                Next
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
                <div class="flex items-center justify-center mt-6 space-x-2">
                    <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                        Prev
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                        1
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                        2
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                        3
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                        4
                    </button>
                    <button class="px-4 py-2 bg-[#2B9DD1] text-white rounded-md text-sm font-medium hover:bg-[#1e7ba8]">
                        Next
                    </button>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeAssignTechModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    Back
                </button>
                <button class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors">
                    Record Details
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
        document.addEventListener('DOMContentLoaded', function() {
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
        function handleActionChange(selectElement) {
            const value = selectElement.value;
            
            if (value === 'assign') {
                openAssignTechModal();
            } else if (value === 'view') {
                openBookingDetailsModal();
            }
            
            // Reset dropdown to default "Action" text
            selectElement.selectedIndex = 0;
        }

        // Open Assign Tech Modal
        function openAssignTechModal() {
            document.getElementById('assignTechModal').classList.remove('hidden');
        }

        // Close Assign Tech Modal
        function closeAssignTechModal() {
            document.getElementById('assignTechModal').classList.add('hidden');
        }

        // Open Booking Details Modal
        function openBookingDetailsModal() {
            document.getElementById('bookingDetailsModal').classList.remove('hidden');
        }

        // Close Booking Details Modal
        function closeBookingDetailsModal() {
            document.getElementById('bookingDetailsModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('assignTechModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeAssignTechModal();
            }
        });

        document.getElementById('bookingDetailsModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeBookingDetailsModal();
            }
        });
    </script>
</body>
</html>
