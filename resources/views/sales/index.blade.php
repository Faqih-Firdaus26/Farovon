<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Sales List</h1>
                <a href="{{ route('sales.create') }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Add Sale
                </a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sale Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($sales as $sale)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $sale->sale_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $sale->product }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $sale->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $sale->total_price }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('sales.', $sale) }}" 
                                    class="text-blue-600 hover:text-blue-900">View</a>
                                    <a href="{{ route('sales.edit', $sale) }}" 
                                       class="text-green-600 hover:text-green-900">Edit</a>
                                    <form action="{{ route('sales.destroy', $sale) }}" 
                                          method="POST" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Are you sure?')">
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
</body>
</html>
