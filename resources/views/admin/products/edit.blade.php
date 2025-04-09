<x-app-layout>
    <div class="container mt-4">
        <h2>Edit Product</h2>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Add More Images</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>

            <div class="mb-3">
                <label class="form-label">Existing Images</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($product->images as $img)
                        <img src="{{ asset('storage/' . $img->image_path) }}" width="60" height="60" class="rounded border">
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>
</x-app-layout>
