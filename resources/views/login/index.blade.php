<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Posyandu</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">

  <style>
    * {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      background: url('/images/bg-login.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      position: relative;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(34, 139, 34, 0.85) 0%, rgba(46, 125, 50, 0.9) 100%);
      z-index: 0;
    }

    .login-container {
      width: 100%;
      max-width: 450px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      position: relative;
      z-index: 1;
      backdrop-filter: blur(10px);
    }

    .login-header {
      background: linear-gradient(135deg, #2E7D32 0%, #43A047 100%);
      padding: 40px 30px;
      text-align: center;
      color: white;
      position: relative;
      overflow: hidden;
    }

    .login-header::before {
      content: '';
      position: absolute;
      width: 200px;
      height: 200px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      top: -100px;
      right: -50px;
    }

    .login-header::after {
      content: '';
      position: absolute;
      width: 150px;
      height: 150px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 50%;
      bottom: -70px;
      left: -30px;
    }

    .login-header .logo {
      font-size: 3rem;
      margin-bottom: 10px;
      position: relative;
      z-index: 1;
    }

    .login-header h1 {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 5px;
      position: relative;
      z-index: 1;
    }

    .login-header p {
      font-size: 0.9rem;
      opacity: 0.9;
      position: relative;
      z-index: 1;
    }

    .login-body {
      padding: 40px 35px;
    }

    .form-group {
      margin-bottom: 25px;
      position: relative;
    }

    .form-group label {
      font-weight: 500;
      color: #333;
      margin-bottom: 10px;
      display: block;
      font-size: 0.95rem;
    }

    .form-group .input-wrapper {
      position: relative;
    }

    .form-group .input-wrapper i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #43A047;
      font-size: 1.1rem;
    }

    .form-group input {
      width: 100%;
      padding: 16px 16px 16px 50px;
      border: 2px solid #e0e0e0;
      border-radius: 12px;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: #fafafa;
    }

    .form-group input:focus {
      border-color: #43A047;
      outline: none;
      box-shadow: 0 0 0 4px rgba(67, 160, 71, 0.15);
      background: white;
    }

    .form-group input::placeholder {
      color: #aaa;
    }

    .btn-login {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, #2E7D32 0%, #43A047 100%);
      border: none;
      border-radius: 12px;
      color: white;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(46, 125, 50, 0.35);
    }

    .btn-login:active {
      transform: translateY(-1px);
    }

    .register-link {
      text-align: center;
      margin-top: 25px;
      color: #666;
      font-size: 0.95rem;
    }

    .register-link a {
      color: #2E7D32;
      font-weight: 600;
      text-decoration: none;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

    .alert {
      padding: 14px 18px;
      border-radius: 12px;
      margin-bottom: 20px;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .alert-success {
      background: #E8F5E9;
      color: #2E7D32;
      border: 1px solid #A5D6A7;
    }

    .alert-danger {
      background: #FFEBEE;
      color: #C62828;
      border: 1px solid #EF9A9A;
    }

    .icon-group {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 15px;
      position: relative;
      z-index: 1;
    }

    .icon-group i {
      font-size: 1.3rem;
      opacity: 0.8;
    }

    @media (max-width: 500px) {
      .login-container {
        margin: 10px;
      }

      .login-header {
        padding: 30px 20px;
      }

      .login-body {
        padding: 30px 25px;
      }
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-header">
      <div class="logo">
        <i class="fas fa-heartbeat"></i>
      </div>
      <h1>POSYANDU</h1>
      <p>Sistem Informasi Pelayanan Kesehatan</p>
      <div class="icon-group">
        <i class="fas fa-baby"></i>
        <i class="fas fa-syringe"></i>
        <i class="fas fa-stethoscope"></i>
        <i class="fas fa-users"></i>
      </div>
    </div>

    <div class="login-body">
      @if(session()->has('success'))
        <div class="alert alert-success">
          <i class="fas fa-check-circle"></i>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      @if(session()->has('loginError'))
        <div class="alert alert-danger">
          <i class="fas fa-exclamation-circle"></i>
          <span>{{ session('loginError') }}</span>
        </div>
      @endif

      <form action="/login" method="POST">
        @csrf

        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-wrapper">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Masukkan email Anda" value="{{ old('email') }}"
              required autofocus>
          </div>
          @error('email')
            <small style="color: #C62828; margin-top: 5px; display: block;">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
          </div>
        </div>

        <button type="submit" class="btn-login">
          <i class="fas fa-sign-in-alt"></i>
          <span>Masuk</span>
        </button>

        <div class="register-link">
          Belum punya akun? <a href="/register">Daftar sebagai Orang Tua</a>
        </div>
      </form>

    </div>
  </div>
</body>

</html>