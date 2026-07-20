<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Admin Login — Orthrex Life Care</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap"
    rel="stylesheet">

  <style>
    :root {
      --navy: #0e1f31;
      --navy-deep: #081522;
      --gold: #c8963f;
      --gold-soft: #e0b46a;
      --ivory: #f7f5f0;
      --steel: #7c8a9a;
      --border: #e2ddd2;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--ivory);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      color: var(--navy);
    }

    .card {
      width: 100%;
      max-width: 900px;
      min-height: 520px;
      display: grid;
      grid-template-columns: 0.9fr 1.1fr;
      background: #fff;
      border-radius: 22px;
      overflow: hidden;
      box-shadow: 0 25px 60px rgba(14, 31, 49, 0.12);
    }

    /* ============ LEFT: BLOB IMAGE PANEL ============ */
    .blob-panel {
      position: relative;
      background: linear-gradient(155deg, rgba(8, 21, 34, 0.90) 0%, rgba(14, 31, 49, 0.75) 55%, rgb(185 184 184 / 35%) 100%), url(http://localhost/laravel/OrthRex/public/assets/images/login-bg.jpg);
      background-size: cover;
      background-position: center;
      background-color: var(--navy-deep);
      border-radius: 0 130px 130px 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 48px 36px;
      text-align: center;
    }

    .blob-panel__mark {
      width: 64px;
      height: 64px;
      border: 2px solid var(--gold);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700;
      color: var(--gold-soft);
      font-size: 22px;
      margin-bottom: 18px;
      background: rgba(8, 21, 34, 0.4);
    }

    .blob-panel__name {
      font-family: 'Space Grotesk', sans-serif;
      color: #fff;
      font-weight: 600;
      font-size: 17px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      margin-bottom: 6px;
    }

    .blob-panel__name span {
      color: var(--gold-soft);
    }

    .blob-panel__tag {
      font-size: 12.5px;
      color: rgba(255, 255, 255, 0.75);
      letter-spacing: 0.5px;
      margin-bottom: 34px;
    }

    .blob-panel__stats {
      display: flex;
      gap: 26px;
      margin-bottom: 8px;
    }

    .blob-panel__stats div {
      text-align: center;
    }

    .blob-panel__stats strong {
      display: block;
      font-family: 'Space Grotesk', sans-serif;
      color: var(--gold-soft);
      font-size: 18px;
      font-weight: 600;
    }

    .blob-panel__stats span {
      font-size: 9.5px;
      color: rgba(255, 255, 255, 0.6);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /* ============ RIGHT: FORM PANEL ============ */
    .form-panel {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 56px 64px;
    }

    .form-panel__tag {
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--gold);
      font-weight: 600;
      margin-bottom: 10px;
    }

    .form-panel h2 {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 26px;
      font-weight: 600;
      color: var(--navy);
      margin-bottom: 8px;
    }

    .form-panel p.sub {
      font-size: 13.5px;
      color: var(--steel);
      margin-bottom: 32px;
    }

    /* ============ GENERAL / INVALID-CREDENTIALS ALERT ============ */
    .rp-alert {
      display: flex;
      align-items: center;
      gap: 10px;
      background: #fdecea;
      border: 1px solid #f3c1bb;
      color: #c0392b;
      font-size: 13px;
      font-weight: 500;
      padding: 12px 14px;
      border-radius: 8px;
      margin-bottom: 22px;
    }

    .rp-alert svg {
      width: 16px;
      height: 16px;
      flex-shrink: 0;
    }

    .rp-field {
      margin-bottom: 18px;
    }

    .rp-field label {
      display: block;
      font-size: 12px;
      font-weight: 600;
      color: var(--navy);
      margin-bottom: 8px;
    }

    .rp-field input {
      width: 100%;
      border: 1.5px solid var(--border);
      border-radius: 10px;
      background: #fdfcfa;
      padding: 13px 16px;
      font-size: 14.5px;
      color: var(--navy);
      font-family: 'Inter', sans-serif;
      transition: border-color 0.2s ease;
    }

    .rp-field input:focus {
      outline: none;
      border-color: var(--gold);
    }

    .rp-field input.is-invalid {
      border-color: #c0392b;
    }

    .rp-field .invalid-feedback {
      display: block;
      font-size: 12px;
      color: #c0392b;
      margin-top: 6px;
    }

    .rp-pass-wrap {
      position: relative;
    }

    .rp-pass-toggle {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: var(--steel);
      font-size: 16px;
    }

    .rp-submit {
      width: 100%;
      background: var(--navy);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 14px;
      font-family: 'Space Grotesk', sans-serif;
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 0.3px;
      cursor: pointer;
      margin-top: 10px;
      transition: background 0.2s ease;
    }

    .rp-submit:hover {
      background: var(--gold);
      color: var(--navy);
    }

    .form-panel__foot {
      margin-top: 26px;
      text-align: center;
      font-size: 11px;
      color: var(--steel);
      letter-spacing: 0.3px;
    }

    @media (max-width: 800px) {
      .card {
        grid-template-columns: 1fr;
        max-width: 420px;
      }

      .blob-panel {
        border-radius: 0 0 60px 60px;
        padding: 40px 24px;
      }

      .form-panel {
        padding: 40px 32px;
      }
    }
  </style>
</head>

<body>

  <div class="card">

    <div class="blob-panel">
      <div class="blob-panel__mark">OL</div>
      <div class="blob-panel__name">ORTH<span>REX</span></div>
      <p class="blob-panel__tag">Life Care — Admin Console</p>

      <!-- <div class="blob-panel__stats">
        <div><strong>500+</strong><span>Surgeons</span></div>
        <div><strong>20+</strong><span>Countries</span></div>
        <div><strong>ISO</strong><span>Certified</span></div>
      </div> -->
    </div>

    <div class="form-panel">

      <div class="form-panel__tag">Admin Login</div>
      <h2>Welcome back</h2>
      <p class="sub">Sign in with your Orthrex admin credentials to continue.</p>

      {{-- Invalid email / password or session flash alert --}}
      @if (session('error'))
        <div class="rp-alert">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
          </svg>
          <span>{{ session('error') }}</span>
        </div>
      @elseif (session('success'))
        <div class="rp-alert" style="background: #e8f8f5; border-color: #a3e4d7; color: #117a65;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
          </svg>
          <span>{{ session('success') }}</span>
        </div>
      @elseif ($errors->has('email'))
        <div class="rp-alert">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
          </svg>
          <span>{{ $errors->first('email') }}</span>
        </div>
      @endif

      <form id="formAuthentication" method="POST" action="{{ url('loginSubmit') }}">
        @csrf

        <div class="rp-field">
          <label for="email">Email Address</label>
          <input type="text" class="@error('email') is-invalid @enderror" id="email" name="email"
            placeholder="you@orthrexlifecare.com" value="{{ old('email') }}" required autocomplete="email" autofocus />
          @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="rp-field">
          <label for="password">Password</label>
          <div class="rp-pass-wrap">
            <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password"
              placeholder="Enter your password" required autocomplete="current-password" />
            <button type="button" class="rp-pass-toggle" id="togglePassword">👁</button>
          </div>
          @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit" class="rp-submit">Login</button>
      </form>

      <!-- <p class="form-panel__foot">ORTHREX LIFE CARE · ADMIN PANEL · SECURED ACCESS</p> -->

    </div>

  </div>

  <script>
    const toggle = document.getElementById('togglePassword');
    const pass = document.getElementById('password');
    if (toggle) {
      toggle.addEventListener('click', function () {
        pass.type = pass.type === 'password' ? 'text' : 'password';
      });
    }
  </script>

</body>

</html>