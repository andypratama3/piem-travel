@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Product')

@section('vendor-style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection
@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Product /</span> List
    {{-- <a href="{{ route('dashboard.kategori.create') }}" class="btn btn-primary btn-sm float-end"><i
        class="mdi mdi-plus"></i> Create</a> --}}
</h4>

<div class="col-md-12">
    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h6 class="mb-2">In-store Sales</h6>
                                <h4 class="mb-2">$5,345.43</h4>
                                <p class="mb-0"><span class="text-muted me-2">5k orders</span><span
                                        class="badge bg-label-success">+5.7%</span></p>
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
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                            <div>
                                <h6 class="mb-2">Website Sales</h6>
                                <h4 class="mb-2">$674,347.12</h4>
                                <p class="mb-0"><span class="text-muted me-2">21k orders</span><span
                                        class="badge bg-label-success">+12.4%</span></p>
                            </div>
                            <div class="avatar me-lg-4">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-laptop bx-sm"></i>
                                </span>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                            <div>
                                <h6 class="mb-2">Discount</h6>
                                <h4 class="mb-2">$14,235.12</h4>
                                <p class="mb-0 text-muted">6k orders</p>
                            </div>
                            <div class="avatar me-sm-4">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-gift bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-2">Affiliate</h6>
                                <h4 class="mb-2">$8,345.23</h4>
                                <p class="mb-0"><span class="text-muted me-2">150 orders</span><span
                                        class="badge bg-label-danger">-3.5%</span></p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-wallet bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Filter</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 product_status">
                    <select id="ProductStatus" class="form-select text-capitalize">
                        <option value="">Status</option>
                        <option value="Scheduled">Scheduled</option>
                        <option value="Publish">Publish</option>
                        <option value="Inactive">Inactive</option>
                    </select></div>
                <div class="col-md-4 product_category"><select id="ProductCategory" class="form-select text-capitalize">
                        <option value="">Category</option>
                        <option value="Household">Household</option>
                        <option value="Office">Office</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Shoes">Shoes</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Game">Game</option>
                    </select></div>
                <div class="col-md-4 product_stock">
                    <select id="ProductStock" class="form-select text-capitalize">
                        <option value=""> Stock </option>
                        <option value="Out_of_Stock">Out of Stock</option>
                        <option value="In_Stock">In Stock</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-datatable table-responsive">
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
<script>
    jQuery(document).ready(function () {
        $('.datatables-products').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('dashboard.product.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'category', name: 'category'},
                {data: 'stock', name: 'stock'},
                {
                    data: 'image', name: 'image'
                    , render: function (data) {
                        return `<img src="${data}" width="50" height="50" />`
                    }
                },
                {data: 'price', name: 'price'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "columnDefs": [{
                "targets": 0,
                "orderable": false
            }]
        });

    })
</script>


@endsection
@endsection
