@extends('layouts/contentNavbarLayout')

@section('title', 'Access Page - Access')


@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Access /</span> Role
</h4>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Role List</h5>
                <p class="card-text">Manajemen Role For Access User Page</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        @foreach ($roles as $role)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="fw-normal">Total 4 User</h5>
                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                            <img class="rounded-circle" src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar">
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            title="Allen Rieske" class="avatar avatar-sm pull-up">
                            <img class="rounded-circle" src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar">
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            title="Julee Rossignol" class="avatar avatar-sm pull-up">
                            <img class="rounded-circle" src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar">
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            title="Kaith D'souza" class="avatar avatar-sm pull-up">
                            <img class="rounded-circle" src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar">
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            title="John Doe" class="avatar avatar-sm pull-up">
                            <img class="rounded-circle" src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar">
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading">
                        <h4 class="mb-1">{{ $role->name }}</h4>
                    </div>
                </div>
                <a href="#" class="btn btn-warning btn-sm float-end"><i class="mdi mdi-pen"></i> Edit</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading">
                        <h4 class="mb-1"> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#backDropModal">
                                <i class="mdi mdi-plus"></i> Add New Role
                            </button></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="role-title">Add New Role</h3>
            <p>Set role permissions</p>
          </div>
          <!-- Add role form -->
          <form id="addRoleForm" class="row g-3" onsubmit="return false">
            <div class="col-12 mb-4">
              <label class="form-label" for="modalRoleName">Role Name</label>
              <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="Enter a role name" tabindex="-1" />
            </div>
            <div class="col-12">
              <h4>Role Permissions</h4>
              <!-- Permission table -->
              <div class="table-responsive">
                <table class="table table-flush-spacing">
                  <tbody>
                    <tr>
                      <td class="text-nowrap fw-medium">Administrator Access <i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="selectAll" />
                          <label class="form-check-label" for="selectAll">
                            Select All
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-nowrap fw-medium">Payroll</td>
                      <td>
                        <div class="d-flex">
                          <div class="form-check me-3 me-lg-5">
                            <input class="form-check-input" type="checkbox" id="payrollRead" />
                            <label class="form-check-label" for="payrollRead">
                              Read
                            </label>
                          </div>
                          <div class="form-check me-3 me-lg-5">
                            <input class="form-check-input" type="checkbox" id="payrollWrite" />
                            <label class="form-check-label" for="payrollWrite">
                              Write
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="payrollCreate" />
                            <label class="form-check-label" for="payrollCreate">
                              Create
                            </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- Permission table -->
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
          <!--/ Add role form -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
