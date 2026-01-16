<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customer Profile - Admin Dashboard</title>
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

                <a href="{{ route('admin.customers') }}" class="flex items-center space-x-3 px-4 py-3 bg-[#2B9DD1] text-white rounded-lg font-medium">
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

                    <!-- Dashboard Title -->
                    <div class="flex-1 flex justify-center lg:justify-end mr-4 lg:mr-8">
                        <h1 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-gray-800 bg-[#2B9DD1] text-white px-4 sm:px-6 md:px-8 py-2 rounded-lg md:rounded-r-full">
                            Customer Profile
                        </h1>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="px-4 sm:px-6 lg:px-8 pb-8">
                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ route('admin.customers') }}" class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 hover:text-[#2B9DD1] font-semibold rounded-lg shadow-sm border border-gray-200 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        <span>Back to Customer Profiles</span>
                    </a>
                </div>

                <!-- Customer Profile Section -->
                <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 lg:p-8 mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3 sm:mb-0">Customer Profile</h2>
                        <button onclick="toggleEditMode()" class="px-4 py-2 bg-[#2B9DD1] hover:bg-blue-600 text-white rounded-md font-semibold transition-colors w-full sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit Customer Info
                        </button>
                    </div>

                    <!-- Customer Information Form -->
                    <div class="space-y-6">
                        <!-- Contact Information Group -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Contact Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                <!-- Full Name -->
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                                    <input type="text" id="fullName" value="{{ $customer->name }}" disabled class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-700 disabled:opacity-75 focus:outline-none transition-colors">
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Phone Number <span class="text-red-500">*</span></label>
                                    <input type="text" id="phone" value="{{ $customer->phone }}" disabled class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-700 disabled:opacity-75 focus:outline-none transition-colors">
                                </div>
                            </div>
                        </div>

                        <!-- Location Information Group -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Location</h3>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Address <span class="text-red-500">*</span></label>
                                <input type="text" id="address" value="{{ $customer->address }}" disabled class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-700 disabled:opacity-75 focus:outline-none transition-colors">
                            </div>
                        </div>

                        <!-- Service Status Group -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Service Details</h3>
                            <div class="max-w-md">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Latest Service Status</label>
                                <input type="text" value="{{ $customer->latest_service_status ?? 'No Service Yet' }}" disabled class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-700 disabled:opacity-75 focus:outline-none transition-colors">
                            </div>
                        </div>
                    </div>

                    <!-- Save/Cancel Buttons (Hidden by default) -->
                    <div id="editActions" class="hidden mt-8 flex flex-col sm:flex-row gap-3">
                        <button onclick="saveChanges()" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors shadow-sm hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
                            </svg>
                            Save Changes
                        </button>
                        <button onclick="cancelEdit()" class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-semibold transition-colors shadow-sm hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            Cancel
                        </button>
                    </div>
                </div>

                <!-- Past Bookings Section -->
                <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 lg:p-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6">Past Bookings</h2>

                    <!-- Bookings Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Service Type</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($customer->bookings as $booking)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $booking->service_date ? \Carbon\Carbon::parse($booking->service_date)->format('M d, Y') : 'N/A' }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->service_type }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            @php
                                                $statusClass = match($booking->status) {
                                                    'Completed' => 'bg-green-100 text-green-800',
                                                    'Pending' => 'bg-yellow-100 text-yellow-800',
                                                    'Cancelled' => 'bg-red-100 text-red-800',
                                                    'In Progress' => 'bg-blue-100 text-blue-800',
                                                    default => 'bg-gray-100 text-gray-800'
                                                };
                                            @endphp
                                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ $statusClass }}">
                                                {{ $booking->status }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                            ₱{{ number_format($booking->total_amount, 2) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-8 text-center text-sm text-gray-500">
                                            No service bookings yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Empty State (Hidden when there are bookings) -->
                    <div class="hidden text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-500 text-lg">No bookings found for this customer.</p>
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

        // Edit Mode Functionality
        function toggleEditMode() {
            const fields = ['fullName', 'phone', 'address', 'serviceStatus'];
            const editActions = document.getElementById('editActions');

            fields.forEach(field => {
                const element = document.getElementById(field);
                element.disabled = false;
                element.classList.remove('bg-gray-50', 'disabled:opacity-75');
                element.classList.add('bg-white', 'focus:ring-2', 'focus:ring-blue-500');
            });

            editActions.classList.remove('hidden');
        }

        function cancelEdit() {
            const fields = ['fullName', 'phone', 'address', 'serviceStatus'];
            const editActions = document.getElementById('editActions');

            fields.forEach(field => {
                const element = document.getElementById(field);
                element.disabled = true;
                element.classList.add('bg-gray-50', 'disabled:opacity-75');
                element.classList.remove('bg-white', 'focus:ring-2', 'focus:ring-blue-500');
            });

            editActions.classList.add('hidden');
        }

        function saveChanges() {
            const customerId = {{ $customer->id }};
            const name = document.getElementById('fullName').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const address = document.getElementById('address').value.trim();

            // Validate inputs
            if (!name || !phone || !address) {
                alert('Please fill in all required fields');
                return;
            }

            // Send update request to API
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            fetch(`/api/customers/${customerId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    name: name,
                    phone: phone,
                    address: address
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success || data.id) {
                    alert('Changes saved successfully!');
                    cancelEdit();
                    // Optionally reload page to show updated data
                    // location.reload();
                } else {
                    alert('Error saving changes: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to save changes. Please try again.');
            });
        }
    </script>
</body>
</html>
