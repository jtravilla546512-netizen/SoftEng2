<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoolSystem SpecAdmin - Customer Profile Dashboard</title>
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

                <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-[#2B9DD1] text-white rounded-lg font-medium">
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
                        <h1 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-center md:text-left whitespace-nowrap">Customer Profile Dashboard</h1>
                    </div>

                    <!-- Spacer removed for mobile center alignment -->
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-4 sm:p-6 md:p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <div class="bg-gradient-to-r from-[#1e7ba8] to-[#5ec4f0] text-white rounded-lg shadow-lg p-4 sm:p-6">
                        <p class="text-xs sm:text-sm opacity-90 mb-1 sm:mb-2">Total Customers</p>
                        <p id="statTotalCustomers" class="text-2xl sm:text-3xl font-bold">0</p>
                    </div>
                    <div class="bg-gradient-to-r from-[#1e7ba8] to-[#5ec4f0] text-white rounded-lg shadow-lg p-4 sm:p-6">
                        <p class="text-xs sm:text-sm opacity-90 mb-1 sm:mb-2">Pending Services</p>
                        <p id="statPendingServices" class="text-2xl sm:text-3xl font-bold">0</p>
                    </div>
                    <div class="bg-gradient-to-r from-[#1e7ba8] to-[#5ec4f0] text-white rounded-lg shadow-lg p-4 sm:p-6">
                        <p class="text-xs sm:text-sm opacity-90 mb-1 sm:mb-2">Completed Services</p>
                        <p id="statCompletedServices" class="text-2xl sm:text-3xl font-bold">0</p>
                    </div>
                    <div class="bg-gradient-to-r from-[#1e7ba8] to-[#5ec4f0] text-white rounded-lg shadow-lg p-4 sm:p-6">
                        <p class="text-xs sm:text-sm opacity-90 mb-1 sm:mb-2">Cancelled Services</p>
                        <p id="statCancelledServices" class="text-2xl sm:text-3xl font-bold">0</p>
                    </div>
                </div>

                <!-- Customer Table -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Filter Toolbar -->
                    <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                        <div class="flex flex-col lg:flex-row gap-3 sm:gap-4">
                            <!-- Search Bar -->
                            <div class="relative flex-1">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" id="searchInput" placeholder="Find customer by name" class="w-full pl-10 pr-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg text-sm sm:text-base focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent">
                            </div>

                            <!-- Status Filter -->
                            <select id="statusFilter" class="px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg text-sm sm:text-base focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent bg-white">
                                <option value="">All Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>

                            <!-- Clear Filters -->
                            <button onclick="clearFilters()" class="px-4 sm:px-6 py-2 sm:py-2.5 border border-gray-300 rounded-lg text-sm sm:text-base font-medium text-gray-700 hover:bg-gray-100 transition-colors">
                                Clear
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[600px]">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs sm:text-sm font-bold text-gray-700 uppercase tracking-wider">Customer Name</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs sm:text-sm font-bold text-gray-700 uppercase tracking-wider">Phone</th>
                                    <th class="px-3 sm:px-6 py-4 text-left text-xs sm:text-sm font-bold text-gray-700 uppercase tracking-wider">Service Status</th>
                                    <th class="px-3 sm:px-6 py-4 text-center text-xs sm:text-sm font-bold text-gray-700 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody id="customersTableBody" class="bg-white divide-y divide-gray-200">
                                <!-- Customers will be loaded dynamically -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-4 sm:px-6 py-4 border-t bg-white">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <!-- Results Info -->
                            <div class="text-sm text-gray-700">
                                Showing <span class="font-semibold" id="showingStart">1</span> to <span class="font-semibold" id="showingEnd">9</span> of <span class="font-semibold" id="totalResults">9</span> customers
                            </div>

                            <!-- Pagination Controls -->
                            <div class="flex items-center gap-2">
                                <button id="prevPage" class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Page Numbers -->
                                <div id="pageNumbers" class="flex gap-1">
                                    <button class="page-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1]">1</button>
                                </div>

                                <button id="nextPage" class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Empty State (Hidden by default) -->
                    <div id="emptyState" class="hidden px-6 py-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <p class="text-gray-500 text-lg font-medium">No customers found</p>
                        <p class="text-gray-400 text-sm mt-1">Try adjusting your search or filter criteria</p>
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

        // Filter and Search Functionality
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const tableBody = document.getElementById('customersTableBody');
        const emptyState = document.getElementById('emptyState');

        // Pagination variables
        let currentPage = 1;
        const rowsPerPage = 5;
        let allCustomers = [];
        let filteredCustomers = [];

        // Load customers from API
        async function loadCustomers() {
            try {
                const response = await fetch('/api/customers');
                if (!response.ok) throw new Error('Failed to load customers');

                allCustomers = await response.json();
                filteredCustomers = [...allCustomers];

                displayCustomers();
                updateCustomerStats();
            } catch (error) {
                console.error('Error loading customers:', error);
                showError('Failed to load customers');
            }
        }

        // Update customer statistics
        async function updateCustomerStats() {
            try {
                const response = await fetch('/api/customers/stats');
                if (!response.ok) throw new Error('Failed to load stats');

                const stats = await response.json();

                document.getElementById('statTotalCustomers').textContent = stats.total || allCustomers.length;
                document.getElementById('statPendingServices').textContent = stats.pending || 0;
                document.getElementById('statCompletedServices').textContent = stats.completed || 0;
                document.getElementById('statCancelledServices').textContent = stats.cancelled || 0;
            } catch (error) {
                console.error('Error loading stats:', error);
                // Fallback to calculating from allCustomers
                const total = allCustomers.length;
                const pending = allCustomers.filter(c => c.latest_service_status === 'Pending').length;
                const completed = allCustomers.filter(c => c.latest_service_status === 'Completed').length;
                const cancelled = allCustomers.filter(c => c.latest_service_status === 'Cancelled').length;

                document.getElementById('statTotalCustomers').textContent = total;
                document.getElementById('statPendingServices').textContent = pending;
                document.getElementById('statCompletedServices').textContent = completed;
                document.getElementById('statCancelledServices').textContent = cancelled;
            }
        }

        // Display customers in table
        function displayCustomers() {
            tableBody.innerHTML = '';

            if (filteredCustomers.length === 0) {
                emptyState.classList.remove('hidden');
                tableBody.parentElement.classList.add('hidden');
                document.querySelector('.border-t.bg-white').classList.add('hidden');
                return;
            }

            emptyState.classList.add('hidden');
            tableBody.parentElement.classList.remove('hidden');
            document.querySelector('.border-t.bg-white').classList.remove('hidden');

            // Calculate pagination
            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;
            const pageCustomers = filteredCustomers.slice(startIndex, endIndex);

            // Render customer rows
            pageCustomers.forEach(customer => {
                const statusClass = getStatusClass(customer.latest_service_status);

                const row = document.createElement('tr');
                row.className = 'customer-row hover:bg-gray-50';
                row.innerHTML = `
                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-xs sm:text-sm text-gray-900">${customer.name}</td>
                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-xs sm:text-sm text-gray-900">${customer.phone}</td>
                    <td class="px-4 sm:px-6 py-3 sm:py-4">
                        <span class="${statusClass} px-2 py-1 text-xs font-medium rounded-full">
                            ${customer.latest_service_status || 'No Service'}
                        </span>
                    </td>
                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-xs sm:text-sm">
                        <a href="/admin/customers/${customer.id}"
                           class="text-[#2B9DD1] hover:text-[#1e7ba8] font-medium transition-colors">
                            View Details
                        </a>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            updatePaginationInfo();
            updatePagination();
        }

        // Get status badge class
        function getStatusClass(status) {
            const statusClasses = {
                'Completed': 'bg-green-100 text-green-800',
                'Pending': 'bg-yellow-100 text-yellow-800',
                'Cancelled': 'bg-red-100 text-red-800',
                'In Progress': 'bg-blue-100 text-blue-800'
            };
            return statusClasses[status] || 'bg-gray-100 text-gray-800';
        }

        function filterCustomers() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;

            filteredCustomers = allCustomers.filter(customer => {
                const matchesSearch = customer.name.toLowerCase().includes(searchTerm) ||
                                    customer.phone.includes(searchTerm);
                const matchesStatus = !statusValue || customer.latest_service_status === statusValue;

                return matchesSearch && matchesStatus;
            });

            currentPage = 1;
            displayCustomers();
        }

        function updatePaginationInfo() {
            const totalPages = Math.ceil(filteredCustomers.length / rowsPerPage);
            const startIndex = (currentPage - 1) * rowsPerPage + 1;
            const endIndex = Math.min(currentPage * rowsPerPage, filteredCustomers.length);

            document.getElementById('showingStart').textContent = filteredCustomers.length > 0 ? startIndex : 0;
            document.getElementById('showingEnd').textContent = endIndex;
            document.getElementById('totalResults').textContent = filteredCustomers.length;

            // Update prev/next buttons
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages || totalPages === 0;
        }

        function updatePagination() {
            const totalPages = Math.ceil(filteredCustomers.length / rowsPerPage);
            const pageNumbers = document.getElementById('pageNumbers');
            pageNumbers.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const pageBtn = document.createElement('button');
                pageBtn.className = i === currentPage
                    ? 'page-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1]'
                    : 'page-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors';
                pageBtn.textContent = i;
                pageBtn.addEventListener('click', () => {
                    currentPage = i;
                    displayCustomers();
                });
                pageNumbers.appendChild(pageBtn);
            }
        }

        // Show error message
        function showError(message) {
            alert(message);
        }

        // Event listeners for filtering
        searchInput.addEventListener('input', filterCustomers);
        statusFilter.addEventListener('change', filterCustomers);

        // Pagination controls
        document.getElementById('prevPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                displayCustomers();
            }
        });

        document.getElementById('nextPage').addEventListener('click', () => {
            const totalPages = Math.ceil(filteredCustomers.length / rowsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                displayCustomers();
            }
        });

        // Clear filters function
        function clearFilters() {
            searchInput.value = '';
            statusFilter.value = '';
            filterCustomers();
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadCustomers();
        });
    </script>
</body>
</html>
