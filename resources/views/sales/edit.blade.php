<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sale</title>
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
                Sales Management
            </h1>
        </div>
    </header>
    <div class="min-h-screen flex flex-col justify-between">
        <main>
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Edit Sale</h1>
                    
                    <form action="{{ route('sales.update', $sale) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Sale Date -->
                        <div class="mb-4">
                            <label for="sale_date" class="block text-sm font-medium text-gray-700 mb-1">Sale Date</label>
                            <input type="date" name="sale_date" id="sale_date" 
                                   value="{{ old('sale_date', $sale->sale_date) }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   required>
                        </div>

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label for="product" class="block text-sm font-medium text-gray-700 mb-1">Product</label>
                            <input type="text" name="product" id="product" 
                                   value="{{ old('product', $sale->product) }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter product name" required>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                            <input type="number" name="quantity" id="quantity" 
                                   value="{{ old('quantity', $sale->quantity) }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter quantity" required>
                        </div>

                        <!-- Total Price -->
                        <div class="mb-4">
                            <label for="total_price" class="block text-sm font-medium text-gray-700 mb-1">Total Price</label>
                            <input type="number" step="0.01" name="total_price" id="total_price" 
                                   value="{{ old('total_price', $sale->total_price) }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter total price" required>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('customers.show', $sale->customer_id) }}" 
                               class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

                     <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Sales Management. All rights reserved.</p>
        </div>
    </footer>
    </div>
</body>
</html>
