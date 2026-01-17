<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Technician Management - Admin Dashboard</title>
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

                <a href="{{ route('admin.technicians') }}" class="flex items-center space-x-3 px-4 py-3 bg-[#2B9DD1] text-white rounded-lg font-medium">
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
                        <h1 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-center md:text-left whitespace-nowrap">Technician Management Dashboard</h1>
                    </div>

                    <!-- Spacer removed for mobile center alignment -->
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-4 sm:p-6 md:p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <!-- Total Technicians -->
                    <div class="bg-white rounded-lg p-4 sm:p-6 shadow-lg border-l-4 border-[#2B9DD1]">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs sm:text-sm font-medium text-gray-500 mb-1 sm:mb-2">Total Technicians</div>
                                <div id="statTotalTechnicians" class="text-2xl sm:text-3xl font-bold text-gray-900">0</div>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-[#2B9DD1]" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Available -->
                    <div class="bg-white rounded-lg p-4 sm:p-6 shadow-lg border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs sm:text-sm font-medium text-gray-500 mb-1 sm:mb-2">Available</div>
                                <div id="statAvailableTechnicians" class="text-2xl sm:text-3xl font-bold text-gray-900">0</div>
                            </div>
                            <div class="bg-green-50 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Off Duty -->
                    <div class="bg-white rounded-lg p-4 sm:p-6 shadow-lg border-l-4 border-gray-400">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs sm:text-sm font-medium text-gray-500 mb-1 sm:mb-2">Off Duty</div>
                                <div id="statOffDutyTechnicians" class="text-2xl sm:text-3xl font-bold text-gray-900">0</div>
                            </div>
                            <div class="bg-gray-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Active Jobs -->
                    <div class="bg-white rounded-lg p-4 sm:p-6 shadow-lg border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs sm:text-sm font-medium text-gray-500 mb-1 sm:mb-2">Active Jobs</div>
                                <div id="statActiveJobs" class="text-2xl sm:text-3xl font-bold text-gray-900">0</div>
                            </div>
                            <div class="bg-yellow-50 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technicians Table -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Table Header with Actions -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-4 sm:px-6 py-4 border-b gap-4 sm:gap-0">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4 w-full sm:w-auto">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-900">Technicians List</h2>

                            <!-- Filter by Status -->
                            <select id="statusFilter" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                                <option value="all">All Status</option>
                                <option value="available">Available</option>
                                <option value="off">Off Duty</option>
                            </select>
                        </div>

                        <button onclick="openAddTechnicianModal()" class="w-full sm:w-auto text-center px-4 sm:px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm sm:text-base font-semibold rounded-lg shadow-md transition-colors inline-block">
                            + Add Technician
                        </button>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[800px]">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Technician ID</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Name</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Phone</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Specialization</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Status</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Jobs Completed</th>
                                    <th class="px-3 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Action</th>
                                </tr>
                            </thead>
                            <tbody id="techniciansTableBody" class="bg-white">
                                <!-- Technicians will be loaded dynamically -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div id="paginationContainer" class="flex items-center justify-center px-6 py-4 border-t border-gray-200 gap-2">
                        <!-- Pagination will be rendered dynamically -->
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Technician Modal -->
    <div id="addTechnicianModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4">
                <h2 class="text-xl font-bold">Add New Technician</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <form id="addTechnicianForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">First Name *</label>
                            <input type="text" id="addFirstName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" placeholder="Enter first name">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name *</label>
                            <input type="text" id="addLastName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" placeholder="Enter last name">
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" id="addPhone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" placeholder="+63912-345-6789">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                            <input type="email" id="addEmail" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" placeholder="email@example.com">
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Address *</label>
                            <input type="text" id="addAddress" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent" placeholder="Enter complete address">
                        </div>

                        <!-- Specialization -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Specialization *</label>
                            <div class="flex flex-wrap gap-4">
                                <label class="flex items-center">
                                    <input type="checkbox" id="addSpecAircon" class="w-4 h-4 text-[#2B9DD1] border-gray-300 rounded focus:ring-[#2B9DD1]" value="Aircon">
                                    <span class="ml-2 text-sm text-gray-700">Aircon</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" id="addSpecRefrigerator" class="w-4 h-4 text-[#2B9DD1] border-gray-300 rounded focus:ring-[#2B9DD1]" value="Refrigerator">
                                    <span class="ml-2 text-sm text-gray-700">Refrigerator</span>
                                </label>
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Initial Status *</label>
                            <select id="addStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                                <option value="Available">Available</option>
                                <option value="Off Duty">Off Duty</option>
                            </select>
                        </div>

                        <!-- Date Hired -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Date Hired *</label>
                            <input type="date" id="addDateHired" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeAddTechnicianModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
                <button onclick="saveTechnician()" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors">
                    Add Technician
                </button>
            </div>
        </div>
    </div>

    <!-- Edit Technician Modal (Similar structure to Add) -->
    <div id="editTechnicianModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4 flex items-center justify-between">
                <h2 class="text-xl font-bold">Edit Technician</h2>
                <span id="editTechCode" class="text-sm font-normal opacity-90">TECH001</span>
            </div>

            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 140px);">
                <form id="editTechnicianForm">
                    <input type="hidden" id="editTechId">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">First Name *</label>
                            <input type="text" id="editFirstName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name *</label>
                            <input type="text" id="editLastName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" id="editPhone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                            <input type="email" id="editEmail" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Address *</label>
                            <input type="text" id="editAddress" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                        </div>

                        <!-- Specialization -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Specialization *</label>
                            <div class="flex flex-wrap gap-4">
                                <label class="flex items-center">
                                    <input type="checkbox" id="editSpecAircon" class="w-4 h-4 text-[#2B9DD1] border-gray-300 rounded focus:ring-[#2B9DD1]" value="Aircon">
                                    <span class="ml-2 text-sm text-gray-700">Aircon</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" id="editSpecRefrigerator" class="w-4 h-4 text-[#2B9DD1] border-gray-300 rounded focus:ring-[#2B9DD1]" value="Refrigerator">
                                    <span class="ml-2 text-sm text-gray-700">Refrigerator</span>
                                </label>
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                            <select id="editStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                                <option value="Available">Available</option>
                                <option value="Off Duty">Off Duty</option>
                            </select>
                        </div>

                        <!-- Date Hired -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Date Hired</label>
                            <input type="date" id="editDateHired" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent bg-gray-50" readonly>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeEditTechnicianModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
                <button onclick="updateTechnician()" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-md transition-colors">
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <script>
        // Hamburger menu functionality
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Dynamic Data Loading
        const statusFilter = document.getElementById('statusFilter');
        const tableBody = document.getElementById('techniciansTableBody');
        let allTechnicians = [];
        let filteredTechnicians = [];
        let currentPage = 1;
        const itemsPerPage = 10;

        // Load technicians from API
        async function loadTechnicians() {
            try {
                const response = await fetch('/api/technicians');
                if (!response.ok) throw new Error('Failed to load technicians');

                allTechnicians = await response.json();
                filteredTechnicians = [...allTechnicians];

                displayTechnicians();
                updateTechnicianStats();
            } catch (error) {
                console.error('Error loading technicians:', error);
                showError('Failed to load technicians');
            }
        }

        // Update technician statistics
        async function updateTechnicianStats() {
            try {
                const response = await fetch('/api/technicians/stats');
                if (!response.ok) throw new Error('Failed to load stats');

                const stats = await response.json();

                document.getElementById('statTotalTechnicians').textContent = stats.total || allTechnicians.length;
                document.getElementById('statAvailableTechnicians').textContent = stats.available || 0;
                document.getElementById('statOffDutyTechnicians').textContent = stats.off_duty || 0;
                document.getElementById('statActiveJobs').textContent = stats.active_jobs || 0;
            } catch (error) {
                console.error('Error loading stats:', error);
                // Fallback to calculating from allTechnicians
                const total = allTechnicians.length;
                const available = allTechnicians.filter(t => t.status === 'Available').length;
                const offDuty = allTechnicians.filter(t => t.status === 'Off Duty').length;
                const activeJobs = allTechnicians.reduce((sum, t) => sum + (t.active_jobs || 0), 0);

                document.getElementById('statTotalTechnicians').textContent = total;
                document.getElementById('statAvailableTechnicians').textContent = available;
                document.getElementById('statOffDutyTechnicians').textContent = offDuty;
                document.getElementById('statActiveJobs').textContent = activeJobs;
            }
        }

        // Display technicians in table
        function displayTechnicians() {
            tableBody.innerHTML = '';

            if (filteredTechnicians.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            No technicians found
                        </td>
                    </tr>
                `;
                renderPagination();
                return;
            }

            // Calculate pagination
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginatedTechnicians = filteredTechnicians.slice(startIndex, endIndex);

            paginatedTechnicians.forEach(tech => {
                const statusClass = getStatusClass(tech.status);
                const statusDot = tech.status === 'Available' ? 'bg-green-500' : 'bg-gray-500';

                // Format specializations (it's an array)
                const specialization = tech.specializations && tech.specializations.length > 0
                    ? tech.specializations.join(', ')
                    : 'N/A';

                // Format technician code from ID
                const techCode = 'TECH' + String(tech.id).padStart(3, '0');

                const row = document.createElement('tr');
                row.className = 'border-b border-gray-200 hover:bg-gray-50';
                row.innerHTML = `
                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">${techCode}</td>
                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${tech.name}</td>
                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${tech.phone}</td>
                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${specialization}</td>
                    <td class="px-3 sm:px-6 py-4">
                        <span class="${statusClass} inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold">
                            <span class="w-2 h-2 ${statusDot} rounded-full mr-1.5"></span>
                            ${tech.status}
                        </span>
                    </td>
                    <td class="px-3 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${tech.jobs_completed || 0}</td>
                    <td class="px-3 sm:px-6 py-4">
                        <div class="flex items-center gap-2">
                            <button onclick="viewTechnicianDetails(${tech.id})" class="px-3 py-1.5 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-xs font-semibold rounded transition-colors">
                                View
                            </button>
                            <button onclick="openEditTechnicianModal(${tech.id})" class="px-3 py-1.5 bg-gray-600 hover:bg-gray-700 text-white text-xs font-semibold rounded transition-colors">
                                Edit
                            </button>
                        </div>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            renderPagination();
        }

        // Get status badge class
        function getStatusClass(status) {
            const statusClasses = {
                'Available': 'bg-green-100 text-green-800',
                'Off Duty': 'bg-gray-100 text-gray-800',
                'On Job': 'bg-blue-100 text-blue-800'
            };
            return statusClasses[status] || 'bg-gray-100 text-gray-800';
        }

        // Filter technicians
        function filterTechnicians() {
            const statusValue = statusFilter.value;

            filteredTechnicians = allTechnicians.filter(tech => {
                if (statusValue === 'all') return true;
                if (statusValue === 'available') return tech.status === 'Available';
                if (statusValue === 'off') return tech.status === 'Off Duty';
                return true;
            });

            currentPage = 1; // Reset to first page when filtering
            displayTechnicians();
        }

        // Render pagination controls
        function renderPagination() {
            const container = document.getElementById('paginationContainer');
            const totalPages = Math.ceil(filteredTechnicians.length / itemsPerPage);

            if (totalPages <= 1) {
                container.innerHTML = '';
                return;
            }

            let paginationHTML = '';

            // Previous button
            paginationHTML += `
                <button onclick="changePage(${currentPage - 1})" 
                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium ${currentPage === 1 ? 'text-gray-400 cursor-not-allowed' : 'text-gray-700 hover:bg-gray-50'} transition-colors"
                    ${currentPage === 1 ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    paginationHTML += `
                        <button onclick="changePage(${i})" 
                            class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium ${i === currentPage ? 'text-white bg-[#2B9DD1]' : 'text-gray-700 hover:bg-gray-50'} transition-colors">
                            ${i}
                        </button>
                    `;
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    paginationHTML += '<span class="px-2 text-gray-500">...</span>';
                }
            }

            // Next button
            paginationHTML += `
                <button onclick="changePage(${currentPage + 1})" 
                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium ${currentPage === totalPages ? 'text-gray-400 cursor-not-allowed' : 'text-gray-700 hover:bg-gray-50'} transition-colors"
                    ${currentPage === totalPages ? 'disabled' : ''}>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;

            container.innerHTML = paginationHTML;
        }

        // Change page
        function changePage(page) {
            const totalPages = Math.ceil(filteredTechnicians.length / itemsPerPage);
            if (page < 1 || page > totalPages) return;
            
            currentPage = page;
            displayTechnicians();
        }

        // Show error message
        function showError(message) {
            alert(message);
        }

        // Event listeners
        statusFilter.addEventListener('change', filterTechnicians);

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadTechnicians();
        });

        // Add Technician Modal
        function openAddTechnicianModal() {
            document.getElementById('addTechnicianModal').classList.remove('hidden');
        }

        function closeAddTechnicianModal() {
            document.getElementById('addTechnicianModal').classList.add('hidden');
            document.getElementById('addTechnicianForm').reset();
        }

        async function saveTechnician() {
            try {
                // Get form values
                const firstName = document.getElementById('addFirstName').value.trim();
                const lastName = document.getElementById('addLastName').value.trim();
                const phone = document.getElementById('addPhone').value.trim();
                const email = document.getElementById('addEmail').value.trim();
                const address = document.getElementById('addAddress').value.trim();
                const status = document.getElementById('addStatus').value;
                const dateHired = document.getElementById('addDateHired').value;

                // Get specializations
                const specializations = [];
                if (document.getElementById('addSpecAircon').checked) specializations.push('Aircon');
                if (document.getElementById('addSpecRefrigerator').checked) specializations.push('Refrigerator');

                // Validate
                if (!firstName || !lastName || !phone || !email || !address || !dateHired) {
                    alert('Please fill in all required fields');
                    return;
                }

                if (specializations.length === 0) {
                    alert('Please select at least one specialization');
                    return;
                }

                // Prepare data
                const data = {
                    name: `${firstName} ${lastName}`,
                    phone: phone,
                    email: email,
                    address: address,
                    specializations: specializations,
                    status: status,
                    date_hired: dateHired
                };

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

                // Send to API
                const response = await fetch('/api/technicians', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    alert('Technician added successfully!');
                    closeAddTechnicianModal();
                    await loadTechnicians();
                } else {
                    alert(result.message || 'Failed to add technician');
                }
            } catch (error) {
                console.error('Error adding technician:', error);
                alert('An error occurred while adding the technician');
            }
        }

        // Edit Technician Modal
        async function openEditTechnicianModal(techId) {
            try {
                // Fetch technician data
                const response = await fetch(`/api/technicians/${techId}`);
                if (!response.ok) throw new Error('Failed to load technician');

                const tech = await response.json();

                // Store current tech ID
                document.getElementById('editTechId').value = tech.id;

                // Update modal header
                const techCode = 'TECH' + String(tech.id).padStart(3, '0');
                document.getElementById('editTechCode').textContent = techCode;

                // Split name into first and last
                const nameParts = tech.name.split(' ');
                const lastName = nameParts.pop();
                const firstName = nameParts.join(' ');

                // Populate form fields
                document.getElementById('editFirstName').value = firstName;
                document.getElementById('editLastName').value = lastName;
                document.getElementById('editPhone').value = tech.phone;
                document.getElementById('editEmail').value = tech.email || '';
                document.getElementById('editAddress').value = tech.address;
                document.getElementById('editStatus').value = tech.status;
                document.getElementById('editDateHired').value = tech.date_hired;

                // Set specializations checkboxes
                document.getElementById('editSpecAircon').checked = tech.specializations?.includes('Aircon') || false;
                document.getElementById('editSpecRefrigerator').checked = tech.specializations?.includes('Refrigerator') || false;

                // Show modal
                document.getElementById('editTechnicianModal').classList.remove('hidden');
            } catch (error) {
                console.error('Error loading technician:', error);
                alert('Failed to load technician data');
            }
        }

        function closeEditTechnicianModal() {
            document.getElementById('editTechnicianModal').classList.add('hidden');
        }

        async function updateTechnician() {
            try {
                const techId = document.getElementById('editTechId').value;

                // Get form values
                const firstName = document.getElementById('editFirstName').value.trim();
                const lastName = document.getElementById('editLastName').value.trim();
                const phone = document.getElementById('editPhone').value.trim();
                const email = document.getElementById('editEmail').value.trim();
                const address = document.getElementById('editAddress').value.trim();
                const status = document.getElementById('editStatus').value;

                // Get specializations
                const specializations = [];
                if (document.getElementById('editSpecAircon').checked) specializations.push('Aircon');
                if (document.getElementById('editSpecRefrigerator').checked) specializations.push('Refrigerator');

                // Validate
                if (!firstName || !lastName || !phone || !address) {
                    alert('Please fill in all required fields');
                    return;
                }

                if (specializations.length === 0) {
                    alert('Please select at least one specialization');
                    return;
                }

                // Prepare data
                const data = {
                    name: `${firstName} ${lastName}`,
                    phone: phone,
                    email: email,
                    address: address,
                    specializations: specializations,
                    status: status
                };

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

                // Send to API
                const response = await fetch(`/api/technicians/${techId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    alert('Technician updated successfully!');
                    closeEditTechnicianModal();
                    await loadTechnicians();
                } else {
                    alert(result.message || 'Failed to update technician');
                }
            } catch (error) {
                console.error('Error updating technician:', error);
                alert('An error occurred while updating the technician');
            }
        }

        // View Technician Details
        function viewTechnicianDetails(techId) {
            window.location.href = '{{ route("admin.technicians") }}/' + techId;
        }

        // Status Filter
        document.getElementById('statusFilter').addEventListener('change', function() {
            const filterValue = this.value;
            // Add filtering logic here
            console.log('Filtering by:', filterValue);
        });
    </script>
</body>
</html>
