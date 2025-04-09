<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4">Cart Items</h2>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            @if($item->product->images->first())
                                <img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}"
                                     width="50" height="50" class="rounded" />
                            @endif
                        </td>
                        <td>₹{{ $item->product->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ $item->product->price * $item->quantity }}</td>
                    </tr>
                @endforeach
                <tr class="table-active fw-bold">
                    <td colspan="4" class="text-end">Total</td>
                    <td>₹{{ $total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
