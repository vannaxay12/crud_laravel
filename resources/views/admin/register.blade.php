<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>User Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create New User</h1>
              </div>

              <!-- Registration Form -->
              <form action="{{ route('Adminregister.save') }}" method="POST" class="admins" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="form-group">
                  <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder=" Name">
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email Address">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Phone, Country -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="phone" type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" placeholder="Phone Number">
                    @error('phone')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input name="country" type="text" class="form-control form-control-user @error('country') is-invalid @enderror" placeholder="Country">
                    @error('country')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <!-- City, Date of Birth -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="city" type="text" class="form-control form-control-user @error('city') is-invalid @enderror" placeholder="City">
                    @error('city')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input name="dob" type="date" class="form-control form-control-user @error('dob') is-invalid @enderror" placeholder="Date of Birth">
                    @error('dob')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <!-- Profile Image Upload -->
      

                <!-- Password Fields -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input name="password_confirmation" type="password" class="form-control form-control-user" placeholder="Confirm Password">
                  </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('Adminlogin') }}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript (Optional for additional functionality) -->

</body>
</html>
