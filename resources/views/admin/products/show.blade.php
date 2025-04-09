<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Product Details</h2>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Price:</strong> ₹{{ $product->price }}</p>

    <h4 class="mt-4 font-semibold">Images:</h4>
    <div class="grid grid-cols-4 gap-4 mt-2">
        @foreach ($product->images as $image)
            <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-32 object-cover border" />
        @endforeach
    </div>
</x-app-layout>