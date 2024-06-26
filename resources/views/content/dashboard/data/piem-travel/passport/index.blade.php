@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Passport')

@section('vendor-style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
@endsection
@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Passport /</span> List
</h4>

<div class="col-md-12">
    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h6 class="mb-2">Total Passport</h6>
                                <h4 class="mb-2">{{ $passport_count }}</h4>
                            </div>
                            <div class="avatar me-sm-4">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-store-alt bx-sm"></i>
                                </span>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-2">Total Pending</h6>
                                <h4 class="mb-2">{{ $passport_coutn_pending }}</h4>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-wallet bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-2">Total Sukses</h6>
                                <h4 class="mb-2">{{ $passport_coutn_approved }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="status">Status</label>
                        <select id="status" class="form-select text-capitalize">
                            <option selected disabled>Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="success">Success</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">

        <div class="card-datatable table-responsive table-bordered mx-2">
            <table class="datatables-products table border-top">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>



@section('page-script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    jQuery(document).ready(function () {
        $('.datatables-products').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: true,
            paging: 'basic_numbers',
            ajax: {
                'url' : "{{ route('dashboard.piem-travel.passport.datatable') }}",
                'data': function (data) {
                    data.status = $('#status').val();
                    data.category = $('#ProductCategory').val();
                    // data.stock = $('#ProductStock').val();
                }
            },

            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'category', name: 'category'},
                {data: 'stock', name: 'stock'},
                {
                    data: 'image', name: 'image'
                    , render: function (data) {
                        return `<a href="${data}" target="_blank"><img src="${data}" width="50" height="50" /></a>`
                    }
                },
                {data: 'price', name: 'price'},
                {
                    data: 'status', name: 'status',
                    render: function (data) {
                        if (data == 1) {
                            return `<span class="badge bg-label-success">Active</span>`
                        } else {
                            return `<span class="badge bg-label-danger">Inactive</span>`
                        }
                    }
                },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "columnDefs": [{
                "targets": 0,
                "orderable": false
            }],
        });

        $('.datatables-products').on('click', '#btn-delete', function () {
            let slug = $(this).data('id');
            url = "{{ route('dashboard.list.product.destroy', ':slug') }}".replace(':slug', slug);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _method: 'DELETE', // Laravel method spoofing
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            if(response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                );
                                reloadTable();
                            }
                        }
                    });
                }
            });
        });
        $('#status').on('change', function() {
            reloadTable();
        });
        $('#ProductCategory').on('change', function() {
            reloadTable();
        });


        jQuery(document).ready(function () {
            jQuery('#ProductCategory').select2( {
                placeholder: 'Select category',
                allowClear: true
            });
        });
    });
</script>


@endsection
@endsection
