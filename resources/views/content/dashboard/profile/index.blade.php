@extends('layouts/contentNavbarLayout')

@section('title', 'Account Profile - Account')


@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Account /</span> Profile
</h4>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
            <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                        class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.profile.settings.index') }}"><i
                        class="mdi mdi-cog-outline mdi-20px me-1"></i>Account Settings</a></li>
        </ul>
        <div class="card mb-4">
            <h4 class="card-header">Profile Details</h4>
            <!-- Account -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="d-flex align-items-start align-items-sm-center">
                                    @if(Auth::user()->profile_photo_path != null)
                                    <img src="{{ asset('storage/images/'. Auth::user()->profile_photo_path)}}"
                                        class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
                                    @else
                                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar"
                                        class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstName"
                                                value="{{ Auth::user()->name }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email"
                                                value="{{ Auth::user()->email }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phoneNumber"
                                                value="{{ Auth::user()->phone }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control" id="city"
                                                value="{{ Auth::user()->city }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address"
                                                value="{{ Auth::user()->address }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="postal_code" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" id="postal_code"
                                                value="{{ Auth::user()->postal_code }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">country</label>
                                            <input type="text" class="form-control" id="country"
                                                value="{{ Auth::user()->country }}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <a href="{{ route('dashboard.profile.settings.index') }}" class="btn btn-primary btn-sm">
                                        <i class="mdi mdi-cog-outline"></i>
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-md-4">
                        <div class="text-md-end text-start mt-md-0 mt-3">
                            <a href="{{ route('dashboard.profile.settings.index') }}" class="btn btn-primary">Edit
                    Profile</a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<div class="card">
    <h5 class="card-header fw-normal">Confirmation Email Account</h5>
    <div class="card-body">
        <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
                <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
            <div class="form-check mb-3 ms-3">
                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                <label class="form-check-label" for="accountActivation">I confirm my account
                    deactivation</label>
            </div>
            <button type="submit" class="btn btn-danger">Deactivate Account</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection
