<!-- resources/views/profile/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="custom-bg-color">
    @include("navigation bar/topnavbarLoggedin")

    <div class="container text-center p-4 border rounded bg-white mt-5">
        <div class="text-left">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <h1>Your Profile</h1>

            <div class="form-group row align-items-center">
                <label for="first_name" class="col-sm-3 col-form-label text-right"><strong>Name:</strong></label>
                <div class="col-sm-6">
                    <p class="form-control-static">{{ $user->first_name }} {{ $user->last_name }}</p>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="email" class="col-sm-3 col-form-label text-right"><strong>Email:</strong></label>
                <div class="col-sm-6">
                    <p class="form-control-static">{{ $user->email }}</p>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="role" class="col-sm-3 col-form-label text-right"><strong>Role:</strong></label>
                <div class="col-sm-6">
                    <p class="form-control-static">{{ ucfirst($user->role) }}</p>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="created_at" class="col-sm-3 col-form-label text-right"><strong>Account Created:</strong></label>
                <div class="col-sm-6">
                    <p class="form-control-static">{{ $user->created_at->format('F d, Y') }}</p>
                </div>
            </div>

            @if ($user->email_verified_at)
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label text-right"><strong>Email Verified:</strong></label>
                <div class="col-sm-6">
                    <p class="form-control-static">Yes</p>
                </div>
            </div>
            @else
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label text-right"><strong>Email Verified:</strong></label>
                <div class="col-sm-6">
                    <p class="form-control-static">No</p>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-6">
                    <button type="submit" class="btn btn-primary" >
                        Resend Verification Email
                    </button>
                </div>
            </div>
            @endif

            @if ($user->phone_number)
            <div class="form-group row align-items-center">
                <label for="phone_number" class="col-sm-3 col-form-label text-right"><strong>Phone Number:</strong></label>
                <div class="col-sm-6">
                    <p class="form-control-static">{{ $user->phone_number }}</p>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary"
                        data-toggle="modal" data-target="#changePhoneNumberModal">
                        Change Phone Number
                    </button>
                </div>
            </div>
            @else
            <form method="POST" action="{{ route('profile.updatePhoneNumber') }}" class="mb-3">
                @method('PATCH')
                @csrf
                <div class="form-group row align-items-center">
                    <label for="phone_number" class="col-sm-3 col-form-label text-right"><strong>Phone Number:</strong></label>
                    <div class="col-sm-6">
                        <input type="tel" name="phone_number" pattern="[0-9]{11}" class="form-control" required>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Enter</button>
                    </div>
                </div>
            </form>
            @endif

            @if ($user->address)
            <div class="form-group row align-items-center">
                <label for="address" class="col-sm-3 col-form-label text-right"><strong>Address:</strong></label>
                <div class="col-sm-6">
                    <p class="form-control-static">{{ $user->address }}</p>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary"
                        data-toggle="modal" data-target="#changeAddressModal">
                        Change Address
                    </button>
                </div>
            </div>
            @else
            <form method="POST" action="{{ route('profile.updateAddress') }}" class="mb-3">
                @csrf
                @method('PATCH')
                <div class="form-group row align-items-center">
                    <label for="address" class="col-sm-3 col-form-label text-right"><strong>Address:</strong></label>
                    <div class="col-sm-6">
                        <input type="text" name="address" value="{{ old('address', $user->address) }}"
                            class="form-control" required>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Update Address</button>
                    </div>
                </div>
            </form>
            @endif

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#changePasswordModal">
                    Change Password
                </button>
            </div>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This is where you can implement your change password functionality.</p>
                    <!-- Add your change password form or content here -->
                    <form id="changePasswordForm" method="POST" action="{{ route('profile.changePassword') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="old_password" class="col-sm-4 col-form-label text-right">Old Password:</label>
                            <div class="col-sm-8">
                                <input type="password" name="old_password" class="form-control" required>
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-4 col-form-label text-right">New Password:</label>
                            <div class="col-sm-8">
                                <input type="password" name="new_password" class="form-control" required>
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-4 col-form-label text-right">Confirm
                                Password:</label>
                            <div class="col-sm-8">
                                <input type="password" name="confirm_password" class="form-control" required>
                                @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('changePasswordForm').submit();">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Address Modal -->
    <div class="modal fade" id="changeAddressModal" tabindex="-1" role="dialog"
        aria-labelledby="changeAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeAddressModalLabel">Change Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This is where you can implement your change address functionality.</p>
                    <form id="changeAddressForm" method="POST" action="{{ route('profile.updateAddress') }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label text-right">New Address:</label>
                            <div class="col-sm-8">
                                <input type="text" name="address" class="form-control" required>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('changeAddressForm').submit();">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    .custom-bg-color {
        background-color: #560000;
        height: 100vh;
    }

    .login-text {
        cursor: pointer;
        color: #007bff;
        /* Blue color for link */
        text-decoration: none;
    }

    .login-text:hover {
        text-decoration: underline;
    }
    .btn {
    background-color: #943b00;
    border: 1px solid #943b00;
    transition: background-color 0.3s ease, border 0.3s ease; /* Smooth transition for background and border */
    }

    .btn:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(255, 165, 0, 0.5);
        background-color: #b66025; 
        border: 1px solid #943b00;
    }

    html body .btn:active {
        background-color: #b66025 !important; 
        border-color: #943b00 !important;
        color: #fff !important;
        box-shadow: none !important; 
    }

    html body .btn:active:focus {
        outline: none !important;
        box-shadow: 0 0 0 2px rgba(255, 165, 0, 0.5) !important; 
    }

        .btn:hover {
            background-color: #b66025; 
            border: 1px solid #943b00;
    }

</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</html>
