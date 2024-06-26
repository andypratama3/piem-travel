@extends('layouts.contentNavbarLayout')

@section('title', 'Access Page - Access')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary text-center">Edit permission</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.access.permissions.update', $permission->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{ $permission->slug }}">
                    <div class="form-group">
                        <label for="name" class="form-label text-primary">Name permission</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}" readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mt-3 text-primary">Role Permissions <code>*</code></h4>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input checkAll" id="checkAllCustom">
                                                            <label for="checkAllCustom" class="form-check-label">Pilih Semua</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                @foreach (['View', 'Create', 'Edit', 'Delete'] as $guardName)
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input check" id="check{{ $guardName }}" name="guard_name[]" value="{{ $guardName }}" {{ in_array($guardName, explode('-', $permission->guard_name)) ? 'checked' : '' }}>
                                                                <label for="check{{ $guardName }}" class="form-check-label">{{ $guardName }}</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Other fields or custom permissions -->

                    <div class="col-sm-12 mt-3">
                        <a href="{{ route('dashboard.access.permissions.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

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
    });
</script>

@endsection
