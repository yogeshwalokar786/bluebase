<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Bluebase Technologies</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: #060913;
      color: #ffffff;
      font-family: 'Inter', -apple-system, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
      position: relative;
      overflow: hidden;
    }
    .bg-glow {
      position: absolute;
      width: 600px;
      height: 600px;
      background: radial-gradient(circle, rgba(0, 80, 231, 0.25) 0%, rgba(6, 9, 19, 0) 70%);
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      pointer-events: none;
      z-index: 1;
    }
    .login-card {
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 440px;
      background: rgba(14, 22, 45, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 20px;
      padding: 40px 36px;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.6);
    }
    .login-logo {
      display: flex;
      justify-content: center;
      margin-bottom: 28px;
    }
    .login-logo img {
      height: 38px;
      width: auto;
    }
    .login-title {
      font-size: 1.45rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 6px;
      color: #ffffff;
    }
    .login-subtitle {
      font-size: 0.88rem;
      color: rgba(255, 255, 255, 0.6);
      text-align: center;
      margin-bottom: 28px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-label {
      display: block;
      font-size: 0.82rem;
      font-weight: 600;
      color: rgba(255, 255, 255, 0.85);
      margin-bottom: 8px;
      letter-spacing: 0.02em;
    }
    .form-input {
      width: 100%;
      padding: 12px 16px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.14);
      border-radius: 10px;
      color: #ffffff;
      font-size: 0.95rem;
      transition: all 0.2s ease;
    }
    .form-input:focus {
      outline: none;
      border-color: #0050E7;
      background: rgba(0, 80, 231, 0.08);
      box-shadow: 0 0 0 3px rgba(0, 80, 231, 0.25);
    }
    .form-meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.82rem;
      margin-bottom: 24px;
      color: rgba(255, 255, 255, 0.7);
    }
    .checkbox-wrap {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
    }
    .btn-submit {
      width: 100%;
      padding: 13px;
      background: #0050E7;
      color: #ffffff;
      border: none;
      border-radius: 10px;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 4px 16px rgba(0, 80, 231, 0.4);
    }
    .btn-submit:hover {
      background: #0043c4;
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(0, 80, 231, 0.5);
    }
    .demo-creds {
      margin-top: 24px;
      padding: 14px 16px;
      background: rgba(0, 80, 231, 0.1);
      border: 1px dashed rgba(0, 80, 231, 0.35);
      border-radius: 10px;
      font-size: 0.82rem;
      color: rgba(255, 255, 255, 0.85);
      line-height: 1.6;
    }
    .demo-creds strong { color: #60A5FA; }
    .alert-box {
      padding: 12px 16px;
      background: rgba(239, 68, 68, 0.15);
      border: 1px solid rgba(239, 68, 68, 0.4);
      border-radius: 10px;
      color: #FCA5A5;
      font-size: 0.85rem;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="bg-glow"></div>

  <div class="login-card">
    <div class="login-logo">
      <img src="{{ asset('images/logo-bluebase-white.png') }}" alt="Bluebase Technologies">
    </div>

    <h1 class="login-title">Administrator Portal</h1>
    <p class="login-subtitle">Sign in to manage inquiries, leads &amp; dynamic content</p>

    @if ($errors->any())
      <div class="alert-box">
        {{ $errors->first() }}
      </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
      @csrf
      
      <div class="form-group">
        <label class="form-label" for="email">Work Email</label>
        <input type="email" id="email" name="email" class="form-input" value="{{ old('email', 'admin@bluebase.com') }}" required autofocus placeholder="admin@bluebase.com">
      </div>

      <div class="form-group">
        <label class="form-label" for="password">Password</label>
        <input type="password" id="password" name="password" class="form-input" value="password123" required placeholder="Enter password">
      </div>

      <div class="form-meta">
        <label class="checkbox-wrap">
          <input type="checkbox" name="remember" checked>
          <span>Keep me signed in</span>
        </label>
        <a href="{{ route('home') }}" style="color: #60A5FA; text-decoration: none;">&larr; View Website</a>
      </div>

      <button type="submit" class="btn-submit">Sign In to Dashboard &rarr;</button>
    </form>

    <div class="demo-creds">
      <div><strong>Pre-Configured Admin Credentials:</strong></div>
      <div>Email: <code>admin@bluebase.com</code></div>
      <div>Password: <code>password123</code></div>
    </div>
  </div>
</body>
</html>
