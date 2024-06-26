@extends('layouts/contentNavbarLayout')

@section('title', 'Product - Show')

@section('vendor-style')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
@endsection

@section('content')
<div class="col-12 col-lg-12">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-tile mb-0">Product Details</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="product-name">Name <code>*</code></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="product-name" placeholder="Product title" name="productTitle" aria-label="Product title" value="{{ $product->name }}" readonly>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="stock">Stock <code>*</code></label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Stock" name="stock" aria-label="ProductStock" value="{{ $product->stock }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label" for="productPrice">Price <code>*</code></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="0 " id="productPrice" name="price" aria-label="Product Price " value="{{ $product->price }}" readonly>
                    </div>
                </div>
                <div class="col">
                    <label class="form-label" for="productImage">Image <code>*</code></label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('image') is-invalid @enderror" id="productImage" name="image" value="{{ $product->image }}" aria-label="Product Image" readonly>
                        <a href="{{ asset('storage/images/products/' . $product->image) }}" target="__blank" class="input-group-text">Lihat Foto</a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="category">Category <code>*</code></label>
                <select class="form-select select2 @error('category') is-invalid @enderror" multiple id="category-select2" name="category[]" aria-label="Product Category" >
                    @foreach ($product->category as $category)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="status">Status <code>*</code></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" aria-label="Product Status" readonly>
                    <option value="{{ $product->status }}">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</option>
                </select>
            </div>
            <!-- Description product -->
            <div>
                <label class="form-label" for="description">Description <code>*</code></label>
                <div id="quill-editor">
                    {!! $product->description !!}
                </div>
                <textarea name="description" id="description" class="d-none @error('description') is-invalid @enderror"
                readonly>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mt-2">
                <a href="{{ route('dashboard.list.product.index') }}" class="btn btn-danger btn-sm">Back</a>
            </div>
        </div>
    </div>
</div>
@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let quill = new Quill('#quill-editor', {
            theme: 'snow',
        });

        quill.on('text-change', function () {
            let html = quill.root.innerHTML;
            document.querySelector('#description').value = html;
        });

        quill.root.innerHTML = document.querySelector('#description').value;

        jQuery(document).ready(function () {
            jQuery('#category-select2').select2({
                placeholder: 'Select category',
                allowClear: true
            });

            jQuery('#category-select2').select2();
        });
    });
</script>
@endsection
@endsection

