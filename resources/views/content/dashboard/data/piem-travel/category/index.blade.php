@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Kategori')


@section('content')
<h4 class="py-3 mb-4 p-4">
    <span class="text-muted fw-light">Product /</span> Category List
    <a href="{{ route('dashboard.list.kategori.create') }}" class="btn btn-primary btn-sm float-end"><i class="mdi mdi-plus"></i> Create</a>
</h4>

<div class="app-ecommerce-category">
    <!-- Category List Table -->
    <div class="card">
        <div class="card-table table-responsive">
            <table class="tables-category-list table border-top">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-lg-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $item)
                    <tr>
                        <td>{{ ++$no}}</td>
                        <td class="text-body text-wrap fw-medium color-black">{{ $item->name }}</td>
                        <td>{!! Str::words($item->description, 5) !!}</td>
                        <td class="text-lg-center">
                            <a href="{{ route('dashboard.list.kategori.edit', $item->slug) }}" class="btn btn-sm btn-icon btn-primary">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <a href="#" data-id="{{ $item->slug }}"  class="btn btn-sm btn-icon btn-delete btn-danger">
                                <form action="{{ route('dashboard.list.kategori.destroy', $item->slug) }}" method="POST" id="delete-{{ $item->slug }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex mt-2">
                <div class="row">
                        <p style="margin-left: 20px;">Showing {{ $kategoris->firstItem() }} to {{ $kategoris->lastItem() }} of {{ $kategoris->total() }} entries</p>
                </div>
                    <div class="col-md-3">
                        {{ $kategoris->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
