<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-center text-gray-900">Customer Management</h1>

            <!-- Search and Filter Section -->
            <div class="mt-4 bg-white rounded-lg shadow p-6">
                <form action="{{ route('customers.index') }}" method="GET" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Search Field -->
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                            <input type="text" 
                                   name="search" 
                                   id="search"
                                   placeholder="Search by name or email" 
                                   value="{{ request('search') }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Filter by Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <select name="location" id="location"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="">All Locations</option>
                                <option value="Jakarta" {{ request('location') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                <option value="Bandung" {{ request('location') == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                <option value="Surabaya" {{ request('location') == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                <option value="Medan" {{ request('location') == 'Medan' ? 'selected' : '' }}>Medan</option>
                                <option value="Makassar" {{ request('location') == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                            </select>
                        </div>

                        <!-- Filter by Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category" id="category"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="">All Categories</option>
                                <option value="Retail" {{ request('category') == 'Retail' ? 'selected' : '' }}>Retail</option>
                                <option value="Corporate" {{ request('category') == 'Corporate' ? 'selected' : '' }}>Corporate</option>
                                <option value="Individual" {{ request('category') == 'Individual' ? 'selected' : '' }}>Individual</option>
                                <option value="Wholesale" {{ request('category') == 'Wholesale' ? 'selected' : '' }}>Wholesale</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Customer List -->
            <div class="mt-6 bg-white rounded-lg shadow overflow-hidden">
                <div class="flex justify-between items-center p-6 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Customer List</h2>
                    <div class="flex space-x-4">
                        <a href="{{ route('customers.create') }}" 
                           class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Add New Customer
                        </a>
                        <a href="{{ route('sales.report') }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            View Sales Report
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($customers as $customer)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->location }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->category }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('customers.show', $customer) }}" 
                                           class="flex items-center px-2 py-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h7m0 0l-3-3m3 3l-3 3m-6 0a9 9 0 110-18 9 9 0 010 18z" />
                                            </svg>
                                            View
                                        </a>
                                        <a href="{{ route('customers.edit', $customer) }}" 
                                           class="flex items-center px-2 py-1 bg-green-100 text-green-600 rounded hover:bg-green-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('customers.destroy', $customer) }}" 
                                              method="POST" 
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="flex items-center px-2 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200"
                                                    onclick="return confirm('Are you sure you want to delete this customer?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Customer Management. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
