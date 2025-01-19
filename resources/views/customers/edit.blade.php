<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Edit Customer</h1>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 border border-red-500 rounded-lg p-4 mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('customers.update', $customer) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Customer Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name', $customer->name) }}" 
                           class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Enter customer name">
                </div>

                <!-- Customer Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" 
                           value="{{ old('email', $customer->email) }}" 
                           class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Enter customer email">
                </div>

                <!-- Customer Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" 
                           value="{{ old('phone', $customer->phone) }}" 
                           class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Enter customer phone">
                </div>

                <!-- Customer Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" id="address" rows="4"
                              class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                              placeholder="Enter customer address">{{ old('address', $customer->address) }}</textarea>
                </div>

                <!-- Customer Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <select name="location" id="location" 
                            class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="Jakarta" {{ old('location', $customer->location) == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                        <option value="Bandung" {{ old('location', $customer->location) == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                        <option value="Surabaya" {{ old('location', $customer->location) == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                        <option value="Medan" {{ old('location', $customer->location) == 'Medan' ? 'selected' : '' }}>Medan</option>
                        <option value="Makassar" {{ old('location', $customer->location) == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                    </select>
                </div>

                <!-- Customer Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category" 
                            class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="Retail" {{ old('category', $customer->category) == 'Retail' ? 'selected' : '' }}>Retail</option>
                        <option value="Corporate" {{ old('category', $customer->category) == 'Corporate' ? 'selected' : '' }}>Corporate</option>
                        <option value="Individual" {{ old('category', $customer->category) == 'Individual' ? 'selected' : '' }}>Individual</option>
                        <option value="Wholesale" {{ old('category', $customer->category) == 'Wholesale' ? 'selected' : '' }}>Wholesale</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('customers.index') }}" 
                       class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                        Update Customer
                    </button>
                </div>
            </form>
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
