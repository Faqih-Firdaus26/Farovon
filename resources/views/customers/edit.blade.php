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
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Customer</h1>
            
            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Customer Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name', $customer->name) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Customer Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" 
                           value="{{ old('email', $customer->email) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Customer Phone -->
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" 
                           value="{{ old('phone', $customer->phone) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Customer Address -->
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" id="address" rows="4" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('address', $customer->address) }}</textarea>
                </div>

               <!-- Customer Location -->
               <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <select name="location" id="location" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="Jakarta" {{ old('location', $customer->location) == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                    <option value="Bandung" {{ old('location', $customer->location) == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                    <option value="Surabaya" {{ old('location', $customer->location) == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                    <option value="Medan" {{ old('location', $customer->location) == 'Medan' ? 'selected' : '' }}>Medan</option>
                    <option value="Makassar" {{ old('location', $customer->location) == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                </select>
            </div>

            <!-- Customer Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="Retail" {{ old('category', $customer->category) == 'Retail' ? 'selected' : '' }}>Retail</option>
                    <option value="Corporate" {{ old('category', $customer->category) == 'Corporate' ? 'selected' : '' }}>Corporate</option>
                    <option value="Individual" {{ old('category', $customer->category) == 'Individual' ? 'selected' : '' }}>Individual</option>
                    <option value="Wholesale" {{ old('category', $customer->category) == 'Wholesale' ? 'selected' : '' }}>Wholesale</option>
                </select>
            </div>

                <!-- Actions -->
                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Update
                    </button>
                    <a href="{{ route('customers.index') }}" 
                       class="ml-4 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
