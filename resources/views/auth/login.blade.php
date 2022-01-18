    <link  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet" />
    <link href="{{ URL::asset('css/login/style.css') }}" type="text/css" rel="stylesheet">
    <div style="text-align: -webkit-center">
        <a href="/">
            <img src="../images/Imagger.png" alt="Home page logo" width="150">
        </a>
    </div>
    <div class="container" style="margin-top: 71px;">
      <div class="top-header">
        <h3>Welcome back</h3>
        <p>Enter your credentials to access your account</p>
      </div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="user">
            <i class="bx bxl-gmail"></i>
            <input type="text" name="email" placeholder="Enter your email" style="font-size: x-small;"/>
           
          </div>
          <div class="pass">
            <i class="bx bxs-lock-alt"></i>
            <input type="password" name="password" placeholder="Enter your password" style="font-size: x-small;"/>
            
          </div>
        <div class="btn">
        <button>Sign in</button>
      </div>
      @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        @error('password')
        <p class="error" >{{ $message }}</p>
        @enderror
    </form>
    </div>
    <p class="last">Forgot your password? <a href="{{ route('forget.password.get') }}"> Reset Password </a></p>
    <p class="last">New here. Click <a href="/register">Register </a></p>
