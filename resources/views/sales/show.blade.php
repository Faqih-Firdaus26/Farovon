<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Sale Details</h1>
            
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Sale Date:</h2>
                <p class="text-gray-900">{{ $sale->sale_date }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Product:</h2>
                <p class="text-gray-900">{{ $sale->product }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Quantity:</h2>
                <p class="text-gray-900">{{ $sale->quantity }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Total Price:</h2>
                <p class="text-gray-900">{{ $sale->total_price }}</p>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('sales.index') }}" 
                   class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</body>
</html>
