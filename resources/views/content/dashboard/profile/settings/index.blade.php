@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')


@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account /</span> Settings
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.profile.index') }}"><i class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('dashboard.profile.settings.index') }}"><i class="mdi mdi-cog-outline mdi-20px me-1"></i>Account Settings</a></li>
    </ul>
    <div class="card mb-4">
      <h4 class="card-header">Profile Settings</h4>
      <!-- Account -->
      <form action="{{ route('user-profile-information.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
            @if(Auth::user()->profile_photo_path != null)
            <img src="{{ asset('storage/images/'. Auth::user()->profile_photo_path)}}" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
            @else
            <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
            @endif

            <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" name="photo" hidden accept="image/png, image/jpeg" />
                </label>
                <button type="button" class="btn btn-outline-danger account-image-reset mb-3">
                <i class="mdi mdi-reload d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
                </button>
                <button type="button" class="btn btn-outline-warning account-image-delete mb-3" data-id="{{ Auth::user()->id }}">
                    <i class="mdi mdi-delete d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Delete Photo Profile</span>
                </button>
                <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
            </div>
            </div>
        </div>
        <div class="card-body pt-2 mt-1">
            <div class="row mt-2 gy-4">
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" autofocus />
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="john.doe@example.com" />
                    <label for="email">E-mail</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Input Number Phone" value="{{ old('phone', Auth::user()->phone) }}" />
                    <label for="phone">Phone Number</label>
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address">{{ old('address', Auth::user()->address) }}</textarea>
                    <label for="address">Address</label>
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input class="form-control @error('city') is-invalid @enderror" type="text" id="city" name="city" placeholder="City" value="{{ old('city', Auth::user()->city) }}" />
                    <label for="city">City</label>
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" placeholder="231465" maxlength="6" value="{{ old('postal_code', Auth::user()->postal_code) }}" />
                    <label for="postal_code">Postal Code</label>
                    @error('postal_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <select id="country" class="select2 form-select @error('country') is-invalid @enderror" name="country">
                    <option disabled selected>Select Country</option>
                    <option value="United States" {{ old('country', Auth::user()->country) == 'United States' ? 'selected' : '' }}>United States</option>
                    </select>
                    <label for="country">Country</label>
                    @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2" id="btnSubmit">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
        </div>
        <!-- /Account -->
      </div>
      </form>
    </div>
    <div class="card">
      <h5 class="card-header fw-normal">Delete Account</h5>
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
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger">Deactivate Account</button>
        </form>
      </div>
    </div>
  </div>
</div>
@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.card-body').on('click','.account-image-delete', function () {
            let user_id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('dashboard.profile.photo.delete') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        cache: false,
                        success: function (response) {
                            if(response.status == 200)
                            {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            })
        });
    });
</script>
<script>
</script>
@endsection
@endsection
