@extends('layouts/contentNavbarLayout')

@section('title', 'Product - Edit')

@section('vendor-style')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
@endsection

@section('content')
<div class="col-12 col-lg-12">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-tile mb-0">Edit Product</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.list.product.update', $product->slug) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="slug" value="{{ $product->slug }}">
            <div class="mb-3">
                <label class="form-label" for="product-name">Name <code>*</code></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="product-name" placeholder="Product title" name="productTitle" aria-label="Product title" value="{{ old('name', $product->name) }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="product-name">Type <code>*</code></label>
                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="product-type" placeholder="Product Type" aria-label="Product Type" value="{{ old('type', $product->type) }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="stock">Stock <code>*</code></label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Stock" name="stock" aria-label="ProductStock" value="{{ old('stock', $product->stock) }}">
                    @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="productPrice">Price <code>*</code></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="0 " id="productPrice" name="price" aria-label="Product Price " value="{{ old('price', $product->price) }}">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <label class="form-label" for="productImage">Image <code>*</code></label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="productImage" name="image" value="{{ old('image', $product->image) }}" aria-label="Product Image">
                        <a href="{{ asset('storage/images/products/' . $product->image) }}" target="__blank" class="input-group-text">Lihat Foto</a>
                    </div>
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="category">Category <code>*</code></label>
                <select class="form-select select2 @error('category') is-invalid @enderror" multiple id="category-select2" name="category[]" aria-label="Product Category" >
                    <option disabled>Select category</option>
                    @foreach ($product->category as $category)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @endforeach
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}" {{ old('category', $product->category) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="status">Status <code>*</code></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" aria-label="Product Status">
                    <option selected value="{{ $product->status }}">{{ $product->status == 0 ? 'Inactive' : 'Active' }}</option>
                    <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="status">Periode <code>*</code></label>
                <input type="month" class="form-control" name="periode" value="{{ old('periode', $product->periode) }}">
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- Description product -->
            <div>
                <label class="form-label" for="description">Description <code>*</code></label>
                <div id="quill-editor">
                    @error('description')
                    <p class="span span-danger" style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <textarea name="description" id="description" class="d-none @error('description') is-invalid @enderror"
                    readonly>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mt-2">
                <a href="{{ route('dashboard.list.product.index') }}" class="btn btn-danger btn-sm">Back</a>
                <button class="btn btn-primary btn-sm float-end">Submit</button>
            </div>
            </form>
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

        let price = $('#price').val();

        $('#price').on('keyup', function () {
        let price = $(this).val();
            price = price.replace(/[^0-9.]/g, '');
            price = formatRupiah(price);
            $(this).val(price);
        });

        $('#price').val(formatRupiah(price));
    });
</script>
@endsection
@endsection

