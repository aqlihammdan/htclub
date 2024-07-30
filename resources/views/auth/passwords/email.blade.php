<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reset &mdash; HTClub</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
              <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                  <div class="login-brand">
                    <img src="{{ url('photo/logo.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                  </div>
      
                  <div class="card card-primary">
                    <div class="card-header"><h4>Reset Password</h4></div>
      
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      <p class="text-muted">We will send a link to reset your password</p>
                      <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                          <label for="email">{{ __('Email Address') }}</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" tabindex="1" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
      
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            {{ __('Send Password Reset Link') }}
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="simple-footer">
                    Copyright &copy; 2023 <div class="bullet"></div> By <a href="https://github.com/aqlihammdan">Aqli Hamdan</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/modules/popper.js') }}"></script>
    <script src="{{ url('assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    @stack('js-lib')

    <!-- Page Specific JS File -->
    @stack('js')

    <!-- Template JS File -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>
</body>

</html>
