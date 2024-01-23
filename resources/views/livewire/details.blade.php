<head>
    <style>
        /* Add custom styles here */
        .product-image {
            transition: transform 0.3s ease-in-out;
        }

        .product-image:hover {
            transform: scale(1.1);
        }
    </style>
    <title>Product Details</title>
</head>
<div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-2xl bg-white p-8 rounded-md shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">{{ $data->name }}</h2>
            <span class="text-gray-600">GH₵ {{ $data->cost }}</span>
        </div>
        <img src="{{ $data->images}}" alt="Product Image" class="w-full h-64 object-cover product-image">

        <p class="mt-4 text-gray-700">{{ $data->details }}</p>

        <div class="flex justify-between items-center mt-6">
            <button class="bg-blue-500 w-72 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">Fix
                Product</button>
            <div class="flex items-center space-x-2 ">

                {{-- <input type="number" class="border rounded-md px-2 py-1 focus:outline-none focus:border-blue-500"> --}}
            </div>
        </div>
    </div>
</div>
