<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Order #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-6 px-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <p><strong>User ID:</strong> {{ $order->user_id }}</p>
            <p><strong>Total:</strong> ₹{{ $order->total }}</p>
            <p><strong>Payment ID:</strong> {{ $order->payment_id ?? 'N/A' }}</p>

            <h4 class="mt-4 mb-2 font-semibold">Items</h4>
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price (₹)</th>
                        <th>Subtotal (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name ?? 'N/A' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price * $item->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
