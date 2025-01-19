<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
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
                Contact Management
            </h1>
        </div>
    </header>
    <div class="min-h-screen flex flex-col justify-between">
        <main>
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Edit Contact</h1>
                    
                    <form action="{{ route('contacts.update', $contact) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Contact Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" name="name" id="name" 
                                   value="{{ old('name', $contact->name) }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter contact name" required>
                        </div>

                        <!-- Contact Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="email" 
                                   value="{{ old('email', $contact->email) }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter email address" required>
                        </div>

                        <!-- Contact Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text" name="phone" id="phone" 
                                   value="{{ old('phone', $contact->phone) }}" 
                                   class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                                   placeholder="Enter phone number" required>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('customers.show', $contact->customer) }}" 
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
            <p>&copy; 2025 Contact Management. All rights reserved.</p>
        </div>
    </footer>
    </div>
</body>
</html>
