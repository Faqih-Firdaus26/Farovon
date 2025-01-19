<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Create New Customer</h1>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 border border-green-500 rounded-lg p-4 mb-6">
                        {{ session('success') }}
                    </div>
                @endif

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

                <form action="{{ route('customers.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name') }}"
                               class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Enter customer name"
                               required>
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               value="{{ old('email') }}"
                               class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Enter customer email"
                               required>
                    </div>

                    <!-- Phone Input -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" 
                               name="phone" 
                               id="phone" 
                               value="{{ old('phone') }}"
                               class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Enter customer phone number"
                               required>
                    </div>

                    <!-- Address Input -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="address" 
                                  id="address" 
                                  rows="3"
                                  class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                  placeholder="Enter customer address"
                                  required>{{ old('address') }}</textarea>
                    </div>

                    <!-- Location Select -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <select name="location" 
                                id="location"
                                class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="" disabled selected>Select Location</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Medan">Medan</option>
                            <option value="Makassar">Makassar</option>
                        </select>
                    </div>

                    <!-- Category Select -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category" 
                                id="category"
                                class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="" disabled selected>Select Category</option>
                            <option value="Retail">Retail</option>
                            <option value="Corporate">Corporate</option>
                            <option value="Individual">Individual</option>
                            <option value="Wholesale">Wholesale</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('customers.index') }}" 
                           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                            Create Customer
                        </button>
                    </div>
                </form>
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
