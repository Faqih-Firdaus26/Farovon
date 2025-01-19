<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-between">
        <main>
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-6">
                    <h1 class="text-3xl font-bold text-center text-gray-900 mb-6">Sales Report</h1>
                    
                    <!-- Filter Form -->
                    <form action="{{ route('sales.report') }}" method="GET" class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Filter by Start Date -->
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" name="start_date" id="start_date" 
                                       value="{{ request('start_date') }}" 
                                       class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                            </div>

                            <!-- Filter by End Date -->
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" name="end_date" id="end_date" 
                                       value="{{ request('end_date') }}" 
                                       class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                            </div>

                            <!-- Filter by Customer -->
                            <div>
                                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                                <select name="customer_id" id="customer_id" 
                                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                                    <option value="">All Customers</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" 
                                            {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit" 
                                    class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                                Apply Filters
                            </button>
                        </div>
                    </form>

                    <!-- Sales Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sale Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Price</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($sales as $sale)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->sale_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->customer->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->product }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $sale->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ number_format($sale->total_price, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No sales found for the selected filters.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $sales->links() }}
                    </div>

                    <!-- Back Button -->
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('customers.index') }}" 
                           class="px-6 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700">
                            Back to Customer List
                        </a>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white p-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 Sales Management. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
