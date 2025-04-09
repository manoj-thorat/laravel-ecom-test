<x-app-layout>
    <div class="container mt-4">
        <h2>Edit Product</h2>

        <div class="row">
            <div class="col-md-6">
                <!-- ✅ Product Update Form -->
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    @method('PUT')

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

                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Back</a>
                </form>
            </div>

            <div class="col-md-6">
                <!-- ✅ Separated Image Delete Section -->
                <div class="mb-3 mt-3">
                    <label class="form-label">Existing Images</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($product->images as $img)
                            <div class="position-relative border rounded p-1" style="width: 80px;">
                                <img src="{{ asset('storage/' . $img->image_path) }}" width="100%" height="60" class="rounded">
                                
                                <form action="{{ route('admin.product-images.delete', $img->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this image?')"
                                    style="position: absolute; top: -8px; right: -8px;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger rounded-circle p-1" type="submit">&times;</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
