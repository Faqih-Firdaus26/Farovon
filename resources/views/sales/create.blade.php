<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Sale</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-between">
        <main>
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Add New Sale</h1>
                    
                    <form action="{{ route('sales.store', $customer) }}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">

                        <!-- Sale Date -->
                        <div class="mb-4">
                            <label for="sale_date" class="block text-sm font-medium text-gray-700 mb-1">Sale Date</label>
                            <input type="date" name="sale_date" id="sale_date" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   required>
                        </div>

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label for="product" class="block text-sm font-medium text-gray-700 mb-1">Product</label>
                            <input type="text" name="product" id="product" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter product name" required>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                            <input type="number" name="quantity" id="quantity" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter quantity" required>
                        </div>

                        <!-- Total Price -->
                        <div class="mb-4">
                            <label for="total_price" class="block text-sm font-medium text-gray-700 mb-1">Total Price</label>
                            <input type="number" step="0.01" name="total_price" id="total_price" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter total price" required>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('customers.show', $customer) }}" 
                               class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                                Save
                            </button>
                        </div>
                    </form>
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
