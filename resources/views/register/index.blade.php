<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - Posyandu</title>

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

    .register-container {
      width: 100%;
      max-width: 480px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      position: relative;
      z-index: 1;
      backdrop-filter: blur(10px);
    }

    .register-header {
      background: linear-gradient(135deg, #2E7D32 0%, #43A047 100%);
      padding: 30px;
      text-align: center;
      color: white;
      position: relative;
      overflow: hidden;
    }

    .register-header::before {
      content: '';
      position: absolute;
      width: 150px;
      height: 150px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      top: -70px;
      right: -30px;
    }

    .register-header .logo {
      font-size: 2.5rem;
      margin-bottom: 10px;
      position: relative;
      z-index: 1;
    }

    .register-header h1 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 5px;
      position: relative;
      z-index: 1;
    }

    .register-header p {
      font-size: 0.85rem;
      opacity: 0.9;
      position: relative;
      z-index: 1;
    }

    .register-body {
      padding: 35px;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .form-group label {
      font-weight: 500;
      color: #333;
      margin-bottom: 8px;
      display: block;
      font-size: 0.9rem;
    }

    .form-group .input-wrapper {
      position: relative;
    }

    .form-group .input-wrapper i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #43A047;
      font-size: 1rem;
    }

    .form-group input {
      width: 100%;
      padding: 14px 14px 14px 45px;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      font-size: 0.95rem;
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

    .form-group .error-text {
      color: #C62828;
      font-size: 0.8rem;
      margin-top: 5px;
      display: block;
    }

    .btn-register {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #2E7D32 0%, #43A047 100%);
      border: none;
      border-radius: 10px;
      color: white;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .btn-register:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(46, 125, 50, 0.35);
    }

    .login-link {
      text-align: center;
      margin-top: 20px;
      color: #666;
      font-size: 0.9rem;
    }

    .login-link a {
      color: #2E7D32;
      font-weight: 600;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 500px) {
      .register-container {
        margin: 10px;
      }

      .register-header {
        padding: 25px 20px;
      }

      .register-body {
        padding: 25px 20px;
      }
    }
  </style>
</head>

<body>
  <div class="register-container">
    <div class="register-header">
      <div class="logo">
        <i class="fas fa-user-plus"></i>
      </div>
      <h1>Daftar Akun Baru</h1>
      <p>Silakan isi form di bawah untuk mendaftar</p>
    </div>

    <div class="register-body">
      <form action="/register" method="POST">
        @csrf

        <div class="form-group">
          <label for="name">Nama Lengkap</label>
          <div class="input-wrapper">
            <i class="fas fa-user"></i>
            <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}"
              required>
          </div>
          @error('name')
            <small class="error-text">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <div class="input-wrapper">
            <i class="fas fa-at"></i>
            <input type="text" name="username" id="username" placeholder="Masukkan username"
              value="{{ old('username') }}" required>
          </div>
          @error('username')
            <small class="error-text">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-wrapper">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Masukkan email" value="{{ old('email') }}"
              required>
          </div>
          @error('email')
            <small class="error-text">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Masukkan password (min. 5 karakter)"
              required>
          </div>
          @error('password')
            <small class="error-text">{{ $message }}</small>
          @enderror
        </div>

        <button type="submit" class="btn-register">
          <i class="fas fa-user-plus"></i>
          <span>Daftar Sekarang</span>
        </button>
      </form>

      <p class="login-link">
        Sudah punya akun? <a href="/login">Login di sini</a>
      </p>
    </div>
  </div>
</body>

</html>