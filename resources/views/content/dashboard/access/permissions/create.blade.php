@extends('layouts/contentNavbarLayout')

@section('title', 'Access Page - Access')


@section('content')

<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary text-center">Create permission</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.access.permissions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label text-primary">Name permission </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Nama permission">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mt-3 text-primary">Role Permissions <code>*</code></h4>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input checkAll"
                                                            id="checkAllCustom">
                                                        <label for="checkAllCustom"
                                                            class="form-check-label">Pilih
                                                            Semua</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input check"
                                                            id="checkLihat" name="guard_name[]" value="View">
                                                        <label for="checkLihat"
                                                            class="form-check-label">Lihat</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input check"
                                                            id="checkTambah" name="guard_name[]" value="Create">
                                                        <label for="checkTambah"
                                                            class="form-check-label">Tambah</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input check"
                                                            id="checkUbah" name="guard_name[]" value="Edit">
                                                        <label for="checkUbah"
                                                            class="form-check-label">Ubah</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input check"
                                                            id="checkHapus" name="guard_name[]" value="Delete">
                                                        <label for="checkHapus"
                                                            class="form-check-label">Hapus</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-flush text-center" id="dynamicAddRemove">
                                <tr>
                                    <th class="w-75">Custom Permission</th>
                                    <th class="w-25"><button type="button" id="dynamic-ar"
                                            class="btn btn-sm btn-primary"><i class="mdi mdi-plus"></i></button></th>
                                </tr>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <a href="{{ route('dashboard.access.permissions.index') }}" class="btn btn-danger ">Back</a>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('page-script')

<script>
    $(document).ready(function () {
        $(".checkAll").on('change', function () {
            if ($(this).is(':checked')) {
                $(".check").prop('checked', true);
            } else {
                $(".check").prop('checked', false);
            }
        });

        var i = 5;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(`
                <tr>
                    <td>
                        <input type="text" class="form-control" name="permissions[${i}]" placeholder="Masukkan Custom Permission">
                    </td>
                    <td colspan="2">
                        <button type="button" class="btn btn-sm btn-danger remove-input-field"><i class="mdi mdi-delete"></i></button>
                    </td>
                </tr>
            `);
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
            --i;
        });
    });
</script>
@endsection

@endsection
