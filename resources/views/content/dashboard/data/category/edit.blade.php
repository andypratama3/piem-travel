@extends('layouts/contentNavbarLayout')

@section('title', 'Kategori - Edit')

@section('vendor-style')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

@endsection

@section('content')
<div class="col-12 col-lg-12">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-tile mb-0">Edit Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.list.kategori.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="hidden" name="slug" value="{{ $category->slug }}">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category Title"
                        value="{{ old('name', $category->name) }}" aria-label="Category Title">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <div id="quill-editor">
                        {!! $category->description !!}
                    </div>
                    @error('description')
                        <p class="span span-danger" style="color: red;">{{ $message }}</p>
                    @enderror
                    <textarea  name="description" id="description" class="d-none @error('description') is-invalid @enderror" readonly>{{ old('description', $category->description) }}</textarea>
                </div>
                <div class="mt-2">
                    <a href="{{ route('dashboard.list.kategori.index') }}" class="btn btn-danger btn-sm">Back</a>
                    <button class="btn btn-primary btn-sm float-end">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

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
    });
    </script>
@endsection
@endsection

