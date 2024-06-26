@extends('layouts/contentNavbarLayout')

@section('title', 'Access Page - Access')


@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">Access / Permissions List
            <a href="{{ route('dashboard.access.permissions.create') }}" class="btn btn-primary btn-sm float-end"><i class="mdi mdi-plus"></i> Create</a>
        </h4>
        <p class="mb-4">Each category (Basic, Professional, and Business) includes the four predefined roles shown
            below.</p>

        <!-- Permission Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-permissions table border-top">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a href="{{ route('dashboard.access.permissions.edit', $permission->name) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-pen"></i> Edit</a>
                                    <a href="#" data-id="{{ $permission->name }}"  class="btn btn-danger btn-sm btn-delete"><i class="mdi mdi-delete"></i> Delete</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
