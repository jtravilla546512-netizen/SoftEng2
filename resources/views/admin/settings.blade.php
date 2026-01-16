<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Settings - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed h-full overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-[#2B9DD1] rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">EMMAN</h1>
                        <p class="text-xs text-gray-500">Admin Panel</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span class="font-medium">Sales Management</span>
                    </a>

                    <a href="{{ route('admin.inventory') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                        </svg>
                        <span class="font-medium">Inventory Management</span>
                    </a>

                    <a href="{{ route('admin.customers') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        <span class="font-medium">Customer Profiles</span>
                    </a>

                    <a href="{{ route('admin.technicians') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">Technician Management</span>
                    </a>

                    <a href="{{ route('admin.reports') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                        </svg>
                        <span class="font-medium">Reports and Analytics</span>
                    </a>

                    <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-3 bg-[#2B9DD1] text-white rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">Settings</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-6 sm:p-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Settings</h1>
                        <p class="text-sm text-gray-500">Configure system settings and pricing</p>
                    </div>
                    <div class="mt-4 sm:mt-0 flex items-center space-x-4">
                        <span class="text-sm text-gray-600">Admin</span>
                        <div class="w-10 h-10 bg-[#2B9DD1] rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">A</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Labor Cost Configuration Card -->
            <div class="bg-white rounded-lg shadow-md mb-6">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-bold text-gray-900">Labor Cost Configuration</h2>
                    <p class="text-sm text-gray-500 mt-1">Update service labor costs</p>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Repair Labor Cost -->
                        <div class="bg-gray-50 border-2 border-gray-200 rounded-lg p-6 hover:border-[#2B9DD1] transition-colors" data-service="Repair">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-600">Repair Service</h3>
                                        <p class="text-xs text-gray-500">Current Rate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <p id="repairCost" class="text-3xl font-bold text-gray-900">₱80.00</p>
                            </div>
                            <button onclick="openEditModal('Repair')" class="w-full px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-lg transition-colors">
                                Edit Rate
                            </button>
                        </div>

                        <!-- Installation Labor Cost -->
                        <div class="bg-gray-50 border-2 border-gray-200 rounded-lg p-6 hover:border-[#2B9DD1] transition-colors" data-service="Installation">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-600">Installation Service</h3>
                                        <p class="text-xs text-gray-500">Current Rate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <p id="installationCost" class="text-3xl font-bold text-gray-900">₱150.00</p>
                            </div>
                            <button onclick="openEditModal('Installation')" class="w-full px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-lg transition-colors">
                                Edit Rate
                            </button>
                        </div>

                        <!-- Maintenance Labor Cost -->
                        <div class="bg-gray-50 border-2 border-gray-200 rounded-lg p-6 hover:border-[#2B9DD1] transition-colors" data-service="Maintenance">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-600">Maintenance Service</h3>
                                        <p class="text-xs text-gray-500">Current Rate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <p id="maintenanceCost" class="text-3xl font-bold text-gray-900">₱60.00</p>
                            </div>
                            <button onclick="openEditModal('Maintenance')" class="w-full px-4 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-lg transition-colors">
                                Edit Rate
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Price Change History -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-bold text-gray-900">Price Change History</h2>
                    <p class="text-sm text-gray-500 mt-1">Track all labor cost modifications</p>
                </div>

                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[800px]">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Date & Time</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Service Type</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Previous Rate</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">New Rate</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Change</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-bold text-gray-900">Modified By</th>
                                </tr>
                            </thead>
                            <tbody id="priceHistoryTable" class="bg-white">
                                <!-- Price history will be loaded dynamically -->
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Edit Labor Cost Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-md w-full">
            <!-- Modal Header -->
            <div class="bg-[#2B9DD1] text-white px-6 py-4 rounded-t-lg">
                <h2 class="text-xl font-bold" id="modalTitle">Edit Labor Cost</h2>
            </div>

            <!-- Modal Content -->
            <div class="p-6">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Service Type</label>
                    <input type="text" id="serviceType" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-700 font-semibold" readonly>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Current Rate</label>
                    <input type="text" id="currentRate" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600" readonly>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">New Rate <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-600 font-semibold">₱</span>
                        <input type="number" id="newRate" step="0.01" min="0" placeholder="0.00" class="w-full pl-8 pr-4 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2B9DD1] focus:border-transparent text-gray-900 font-semibold">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Enter the new labor cost for this service</p>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 flex-shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-yellow-800">Important Notice</p>
                            <p class="text-xs text-yellow-700 mt-1">This change will apply to all future bookings. Existing completed transactions will remain unchanged.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t border-gray-200 px-6 py-4 flex justify-end space-x-3">
                <button onclick="closeEditModal()" class="px-6 py-2 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
                <button onclick="saveNewRate()" class="px-6 py-2 bg-[#2B9DD1] hover:bg-[#1e7ba8] text-white text-sm font-semibold rounded-lg transition-colors">
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <script>
        let currentService = '';
        let laborCosts = {};

        // Load labor costs when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadLaborCosts();
            loadPriceHistory();
        });

        // Load labor costs from API
        async function loadLaborCosts() {
            try {
                const response = await fetch('/api/settings/labor-costs');
                const costs = await response.json();

                console.log('Labor costs loaded:', costs); // Debug

                // Store in object for easy access
                costs.forEach(cost => {
                    laborCosts[cost.service_type] = cost;

                    // Update display - handle case variations
                    const serviceType = cost.service_type.toLowerCase();
                    let elementId;

                    if (serviceType.includes('repair')) {
                        elementId = 'repairCost';
                    } else if (serviceType.includes('installation')) {
                        elementId = 'installationCost';
                    } else if (serviceType.includes('maintenance')) {
                        elementId = 'maintenanceCost';
                    }

                    const element = document.getElementById(elementId);
                    if (element) {
                        element.textContent = '₱' + parseFloat(cost.cost).toFixed(2);
                    }
                });
            } catch (error) {
                console.error('Error loading labor costs:', error);
                alert('Failed to load labor costs');
            }
        }

        // Load price history from API
        async function loadPriceHistory() {
            try {
                const response = await fetch('/api/settings/price-history');
                const history = await response.json();

                const tbody = document.getElementById('priceHistoryTable');
                tbody.innerHTML = '';

                if (history.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="6" class="px-4 py-8 text-center text-gray-500">No price change history yet</td></tr>';
                    return;
                }

                history.forEach(record => {
                    const change = parseFloat(record.cost) - parseFloat(record.previous_cost || 0);
                    const isIncrease = change >= 0;
                    const changeText = (isIncrease ? '+' : '') + '₱' + Math.abs(change).toFixed(2);
                    const changeColor = isIncrease ? 'text-green-600' : 'text-red-600';
                    const arrowIcon = isIncrease ?
                        '<path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />' :
                        '<path fill-rule="evenodd" d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z" clip-rule="evenodd" />';

                    const serviceTypeColors = {
                        'Repair': 'bg-blue-100 text-blue-800',
                        'Installation': 'bg-green-100 text-green-800',
                        'Maintenance': 'bg-purple-100 text-purple-800'
                    };

                    const serviceColor = serviceTypeColors[record.service_type] || 'bg-gray-100 text-gray-800';

                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">
                                ${record.effective_date ? new Date(record.effective_date).toLocaleString('en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric',
                                    hour: 'numeric',
                                    minute: '2-digit',
                                    hour12: true
                                }) : 'N/A'}
                            </td>
                            <td class="px-4 sm:px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold ${serviceColor}">
                                    ${record.service_type}
                                </span>
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">₱${parseFloat(record.previous_cost || 0).toFixed(2)}</td>
                            <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm font-semibold text-gray-900">₱${parseFloat(record.cost).toFixed(2)}</td>
                            <td class="px-4 sm:px-6 py-4">
                                <span class="inline-flex items-center text-xs font-semibold ${changeColor}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        ${arrowIcon}
                                    </svg>
                                    ${changeText}
                                </span>
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm text-gray-900">${record.modified_by || 'System'}</td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
            } catch (error) {
                console.error('Error loading price history:', error);
                document.getElementById('priceHistoryTable').innerHTML = '<tr><td colspan="6" class="px-4 py-8 text-center text-red-500">Failed to load price history</td></tr>';
            }
        }

        function openEditModal(serviceType) {
            currentService = serviceType;

            // Find the cost by service type (case insensitive)
            const cost = Object.values(laborCosts).find(c =>
                c.service_type.toLowerCase().includes(serviceType.toLowerCase())
            );

            console.log('Opening modal for:', serviceType, 'Found cost:', cost); // Debug

            document.getElementById('serviceType').value = serviceType;
            document.getElementById('currentRate').value = '₱' + (cost ? parseFloat(cost.cost).toFixed(2) : '0.00');
            document.getElementById('newRate').value = '';
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        async function saveNewRate() {
            const newRate = document.getElementById('newRate').value;

            if (!newRate || parseFloat(newRate) <= 0) {
                alert('Please enter a valid rate');
                return;
            }

            // Find the cost by service type (case insensitive)
            const cost = Object.values(laborCosts).find(c =>
                c.service_type.toLowerCase().includes(currentService.toLowerCase())
            );

            if (!cost) {
                alert('Service type not found: ' + currentService);
                console.log('Available costs:', laborCosts); // Debug
                return;
            }

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                const response = await fetch(`/api/settings/labor-costs/${cost.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        cost: parseFloat(newRate),
                        modified_by: 'Admin User'
                    })
                });

                const result = await response.json();

                if (result.success || response.ok) {
                    alert(`${currentService} labor cost updated to ₱${parseFloat(newRate).toFixed(2)} successfully!`);
                    closeEditModal();
                    loadLaborCosts(); // Reload to show updated cost
                    loadPriceHistory(); // Reload price history
                } else {
                    alert('Error updating labor cost: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error saving labor cost:', error);
                alert('Failed to update labor cost. Please try again.');
            }
        }

        // Close modal when clicking outside
        document.getElementById('editModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>
</body>
</html>
