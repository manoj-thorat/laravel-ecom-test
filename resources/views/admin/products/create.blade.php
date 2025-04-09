<x-app-layout>
    <div class="container mt-4">
        <h2>Add New Product</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Images</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>

            <button type="submit" class="btn btn-success">Save Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</x-app-layout>
