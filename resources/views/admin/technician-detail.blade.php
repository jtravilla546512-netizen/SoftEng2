<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Details - Admin Dashboard</title>
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
                        <h1 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-center md:text-left whitespace-nowrap">Technician Details</h1>
                    </div>

                    <!-- Spacer removed for mobile center alignment -->
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-4 sm:p-6 md:p-8">
                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ route('admin.technicians') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 shadow-sm transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back to Technician List
                    </a>
                </div>

                <!-- Technician Profile Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                    <div class="bg-[#2B9DD1] px-6 py-4">
                        <h2 class="text-xl font-bold text-white">Technician Profile</h2>
                    </div>

                    <div class="p-6">
                        <div class="flex flex-col md:flex-row md:items-start md:space-x-8">
                            <!-- Profile Avatar -->
                            <div class="flex-shrink-0 mb-6 md:mb-0">
                                <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="mt-4 text-center">
                                    @php
                                        $statusClass = match($technician->status) {
                                            'Available' => 'bg-green-100 text-green-800',
                                            'Off Duty' => 'bg-gray-100 text-gray-800',
                                            'On Job' => 'bg-blue-100 text-blue-800',
                                            default => 'bg-gray-100 text-gray-800'
                                        };
                                        $dotClass = match($technician->status) {
                                            'Available' => 'bg-green-500',
                                            'Off Duty' => 'bg-gray-500',
                                            'On Job' => 'bg-blue-500',
                                            default => 'bg-gray-500'
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $statusClass }}">
                                        <span class="w-2 h-2 {{ $dotClass }} rounded-full mr-2"></span>
                                        {{ $technician->status }}
                                    </span>
                                </div>
                            </div>

                            <!-- Profile Information -->
                            <div class="flex-1">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-500 mb-1">Technician ID</label>
                                        <p class="text-base font-semibold text-gray-900">TECH{{ str_pad($technician->id, 3, '0', STR_PAD_LEFT) }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-500 mb-1">Full Name</label>
                                        <p class="text-base text-gray-900">{{ $technician->name }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-500 mb-1">Phone Number</label>
                                        <p class="text-base text-gray-900">{{ $technician->phone }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-500 mb-1">Email</label>
                                        <p class="text-base text-gray-900">{{ $technician->email ?? 'N/A' }}</p>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-semibold text-gray-500 mb-1">Address</label>
                                        <p class="text-base text-gray-900">{{ $technician->address }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-500 mb-1">Specialization</label>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            @if(is_array($technician->specializations))
                                                @foreach($technician->specializations as $spec)
                                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full">{{ $spec }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-base text-gray-900">N/A</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-500 mb-1">Date Hired</label>
                                        <p class="text-base text-gray-900">{{ $technician->date_hired->format('F d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance Statistics -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6">
                    <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-[#2B9DD1]">
                        <div class="text-sm font-medium text-gray-500 mb-2">Total Jobs Completed</div>
                        <div class="text-3xl font-bold text-gray-900">{{ $technician->jobs_completed }}</div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-yellow-500">
                        <div class="text-sm font-medium text-gray-500 mb-2">Active Jobs</div>
                        <div class="text-3xl font-bold text-gray-900">{{ $technician->active_jobs }}</div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-green-500">
                        <div class="text-sm font-medium text-gray-500 mb-2">Average Rating</div>
                        <div class="text-3xl font-bold text-gray-900">{{ number_format($technician->average_rating, 1) }}</div>
                        <div class="flex items-center mt-2">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="ml-1 text-sm text-gray-600">(45 reviews)</span>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-purple-500">
                        <div class="text-sm font-medium text-gray-500 mb-2">Total Revenue Generated</div>
                        <div class="text-3xl font-bold text-gray-900">₱{{ number_format($technician->total_revenue, 2) }}</div>
                    </div>
                </div>

                <!-- Job History -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">Recent Job History</h2>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[600px]">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Booking ID</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Customer</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Service Type</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Date</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Status</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-900">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse($technician->completedBookings as $booking)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $booking->booking_number }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $booking->customer->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $booking->service_type }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $booking->completed_at ? $booking->completed_at->format('M. d, Y') : ($booking->service_date ? $booking->service_date->format('M. d, Y') : 'N/A') }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $booking->status }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">₱{{ number_format($booking->total_amount, 2) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        No completed jobs yet
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">₱420.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-center px-6 py-4 border-t border-gray-200 gap-2">
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed disabled:opacity-50" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-white bg-[#2B9DD1]">
                            1
                        </button>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            2
                        </button>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
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
    </script>
</body>
</html>
