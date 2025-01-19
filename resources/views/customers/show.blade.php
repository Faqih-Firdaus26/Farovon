<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

        <!-- Header -->
        <header class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-6 shadow-md">
            <div class="container mx-auto px-4">
                <h1 class="text-3xl font-bold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a4 4 0 00-8 0v2m8 0a4 4 0 01-8 0m8 0v6a4 4 0 01-8 0V9m8 0H7" />
                    </svg>
                    Customer Management
                </h1>
            </div>
        </header>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-5xl mx-auto space-y-8">

            <!-- Customer Details Section -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Customer Details</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Name</h3>
                        <p class="mt-1 text-lg font-semibold text-gray-800">{{ $customer->name }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Email</h3>
                        <p class="mt-1 text-lg font-semibold text-gray-800">{{ $customer->email }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Phone</h3>
                        <p class="mt-1 text-lg font-semibold text-gray-800">{{ $customer->phone }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Location</h3>
                        <p class="mt-1 text-lg font-semibold text-gray-800">{{ $customer->location }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Category</h3>
                        <p class="mt-1 text-lg font-semibold text-gray-800">{{ $customer->category }}</p>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-sm font-medium text-gray-500">Address</h3>
                        <p class="mt-1 text-lg font-semibold text-gray-800">{{ $customer->address }}</p>
                    </div>
                </div>
            </div>

            <div >
                <a href="{{ route('customers.index') }}" 
                   class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                    Back to List
                </a>
            </div>

            <!-- Contacts Section -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">Contact List</h2>
                    <a href="{{ route('customers.contacts.create', $customer) }}" 
                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Add Contact
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($customer->contacts as $contact)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $contact->name }}</td>
                                <td class="px-6 py-4">{{ $contact->email }}</td>
                                <td class="px-6 py-4">{{ $contact->phone }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('contacts.edit', $contact) }}" 
                                           class="px-2 py-1 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-2 py-1 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 flex items-center"
                                                    onclick="return confirm('Are you sure?')">
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
            </div>

            <!-- Sales Section -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">Sales History</h2>
                    <a href="{{ route('customers.sales.create', $customer) }}" 
                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Add Sale
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($customer->sales as $sale)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $sale->sale_date }}</td>
                                <td class="px-6 py-4">{{ $sale->product }}</td>
                                <td class="px-6 py-4">{{ $sale->quantity }}</td>
                                <td class="px-6 py-4">{{ number_format($sale->total_price, 2) }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('sales.edit', $sale) }}" 
                                           class="px-2 py-1 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('sales.destroy', $sale) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-2 py-1 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 flex items-center"
                                                    onclick="return confirm('Are you sure?')">
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
            </div>
        </div>
    </div>

           <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Customer Management. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
