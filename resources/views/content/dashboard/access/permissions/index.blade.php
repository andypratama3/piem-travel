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
                            <th></th>
                            <th></th>
                            <th>Name</th>
                            <th>Assigned To</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
