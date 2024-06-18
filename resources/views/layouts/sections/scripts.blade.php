<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- <script src="{{ asset(mix('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js ')) }}"></script> --}}
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
<script>
    $(document).ready(function () {
        $('.navbar').on('click','.swal-logout',function (e) {
        slug = e.target.dataset.id;
        swal({
                title: 'Yakin ingin keluar?',
                text: 'Anda akan dialihkan ke beranda.',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willLogout) => {
                if (willLogout) {
                    $(`#logout-form`).submit();
                } else {
                    // Do Nothing
                }
            });
        });
        $('.table').on('click','.btn-delete',function (e) {
            let slug = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't Delete this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,

                    }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#delete-${slug}`).submit();
                    }else{
                        Swal.fire({
                        title: "Cancelled!",
                        text: "Your Data Cancel deleted.",
                        icon: "error",
                        });
                    }
                });
            });
    });
    function reloadTable() {
            $('.datatables-products').DataTable().ajax.reload();
        }
</script>
