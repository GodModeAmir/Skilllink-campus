<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in · SkillLink Campus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root{
            --ink:#14151a;
            --muted:#6f7480;
            --brand:#4f46e5;
            --brand-dark:#4338ca;
            --orange:#f47b20;
            --green:#0e9f6e;
            --line:#e9e9ee;
        }
        *{box-sizing:border-box}
        body{margin:0;font-family:'Nunito',Arial,sans-serif;color:var(--ink);background:#fff;min-height:100vh;position:relative;overflow-x:hidden;-webkit-font-smoothing:antialiased}
        a{color:inherit}

        /* ===== Top bar ===== */
        .topbar{display:flex;align-items:center;gap:16px;padding:18px 26px;position:relative;z-index:2}
        .round-btn{width:44px;height:44px;border-radius:50%;border:1px solid var(--line);background:#fff;display:grid;place-items:center;flex-shrink:0;transition:border-color .15s}
        .round-btn:hover{border-color:#111}
        .round-btn svg{width:18px;height:18px}
        .steps{flex:1;display:flex;justify-content:center;align-items:center;gap:12px;font-size:13.5px;font-weight:800;list-style:none;margin:0;padding:0}
        .steps li{display:flex;align-items:center;gap:7px;white-space:nowrap}
        .steps .tick{width:16px;height:16px;flex-shrink:0}
        .steps .dot{width:11px;height:11px;border-radius:50%;background:var(--orange);flex-shrink:0}
        .steps .sep{font-weight:400}

        /* ===== Layout ===== */
        .split{position:relative;z-index:1;display:grid;grid-template-columns:1.05fr .95fr;gap:48px;align-items:start;max-width:1150px;margin:0 auto;padding:34px 26px 130px}
        .pitch{align-self:center}
        .pitch h1{font-size:clamp(30px,3.6vw,44px);line-height:1.32;font-weight:800;letter-spacing:-.3px;max-width:560px;margin:0}
        .pitch-actions{display:flex;gap:12px;margin-top:26px}
        .btn-pill{display:inline-block;background:var(--brand);color:#fff;border-radius:999px;padding:13px 26px;font-size:14.5px;font-weight:800;text-decoration:none;transition:background .15s,border-color .15s}
        .btn-pill:hover{background:var(--brand-dark)}
        .btn-pill.ghost{background:#fff;color:var(--ink);border:1.5px solid var(--line)}
        .btn-pill.ghost:hover{background:#fff;border-color:#111}

        /* ===== Auth card ===== */
        .auth-card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:30px 28px;box-shadow:0 1px 2px rgba(16,24,40,.05);max-width:440px;width:100%;justify-self:center}
        .auth-card h2{margin:0;text-align:center;font-size:30px;font-weight:800}
        .switch{text-align:center;font-size:13.5px;color:var(--muted);margin:10px 0 20px}
        .switch a{color:var(--orange);font-weight:800;text-decoration:underline}

        .field{position:relative;display:block;border:1.5px solid var(--line);border-radius:14px;padding:9px 44px 9px 16px;margin-bottom:14px;transition:border-color .15s,box-shadow .15s}
        .field:focus-within{border-color:var(--brand);box-shadow:0 0 0 3px rgba(79,70,229,.12)}
        .field .flabel{display:block;font-size:11.5px;font-weight:700;color:var(--muted);margin-bottom:1px}
        .field input{display:block;width:100%;border:0;outline:0;background:transparent;font:inherit;font-size:14.5px;font-weight:600;color:var(--ink);padding:0}
        .field .check{position:absolute;right:15px;top:50%;transform:translateY(-50%);width:18px;height:18px;color:var(--green);opacity:0;transition:opacity .15s}
        .field.filled .check{opacity:1}
        .field.has-eye{padding-right:78px}
        .field.has-eye .check{right:46px}
        .eye{position:absolute;right:12px;top:50%;transform:translateY(-50%);width:32px;height:32px;display:grid;place-items:center;background:none;border:0;cursor:pointer;color:var(--ink)}
        .eye svg{width:20px;height:20px}
        .eye .eye-on{display:none}
        .eye.showing .eye-on{display:block}
        .eye.showing .eye-off{display:none}

        .error{color:#dc2626;font-size:12.5px;font-weight:700;margin:-8px 2px 12px}
        .forgot{display:inline-block;margin:2px 0 16px;color:var(--orange);font-size:13.5px;font-weight:800;text-decoration:underline}

        .terms{display:flex;gap:10px;align-items:flex-start;font-size:13px;line-height:1.55;color:#4b5563;margin-bottom:20px;cursor:pointer}
        .terms input{width:16px;height:16px;margin-top:2px;accent-color:var(--brand);flex-shrink:0}
        .terms a{color:var(--brand);font-weight:700;text-decoration:underline}

        .submit{width:100%;background:var(--brand);color:#fff;border:0;border-radius:999px;padding:14px;font:inherit;font-size:15px;font-weight:800;cursor:pointer;transition:background .15s}
        .submit:hover{background:var(--brand-dark)}

        .socials{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-top:16px}
        .social{height:44px;border-radius:999px;display:grid;place-items:center;transition:opacity .15s}
        .social:hover{opacity:.85}
        .social svg{width:20px;height:20px}
        .social.apple{background:#8e8e93;color:#fff}
        .social.fb{background:#aecbfa;color:#1e4fb8}
        .social.discord{background:#5865f2;color:#fff}
        .social.google{background:#fff;border:1px solid var(--line)}

        /* ===== Illustration ===== */
        .scene{position:absolute;left:0;bottom:0;width:min(520px,55vw);height:auto;pointer-events:none;z-index:0}

        /* ===== Responsive ===== */
        @media (max-width:960px){
            .split{grid-template-columns:1fr;gap:30px;padding-bottom:80px}
            .scene{display:none}
        }
        @media (max-width:640px){
            .steps li:not(.current),.steps .sep{display:none}
            .steps{justify-content:flex-end}
            .topbar{padding:14px 16px}
            .split{padding:20px 16px 60px}
        }
    </style>
</head>
<body>

    <header class="topbar">
        <a class="round-btn" href="/" aria-label="Go back">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 5.5L8 12l6.5 6.5"/></svg>
        </a>

        <ol class="steps">
            <li>
                <svg class="tick" viewBox="0 0 24 24" fill="none" stroke="#0e9f6e" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg>
                Choose subjects
            </li>
            <li class="sep">•</li>
            <li>
                <svg class="tick" viewBox="0 0 24 24" fill="none" stroke="#0e9f6e" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg>
                Find tutors
            </li>
            <li class="sep">•</li>
            <li class="current"><span class="dot"></span> Create account</li>
        </ol>

        <a class="round-btn" href="/" aria-label="Close">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M6 6l12 12M18 6L6 18"/></svg>
        </a>
    </header>

    <main class="split">
        <section class="pitch">
            <h1>Create an account to book study sessions and unlock 3 months of SkillLink Campus for free.</h1>
            <div class="pitch-actions">
                <a class="btn-pill" href="{{ route('register') }}">Sign up for free</a>
            </div>
        </section>

        <section class="auth-card">
            <h2>Log in</h2>
            <p class="switch">New to SkillLink Campus? <a href="{{ route('register') }}">Sign up for free</a></p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label class="field">
                    <span class="flabel">Email address*</span>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
                    <svg class="check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg>
                </label>
                @error('email')<p class="error">{{ $message }}</p>@enderror

                <label class="field has-eye">
                    <span class="flabel">Password (8+ characters)*</span>
                    <input type="password" name="password" id="password" required autocomplete="current-password">
                    <svg class="check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg>
                    <button type="button" class="eye" aria-label="Show password">
                        <svg class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3.5 11.5c2.2 3.2 5.1 4.8 8.5 4.8s6.3-1.6 8.5-4.8"/><path d="M6.2 14.6l-1.7 2.6M12 16.6v2.9M17.8 14.6l1.7 2.6"/></svg>
                        <svg class="eye-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </label>
                @error('password')<p class="error">{{ $message }}</p>@enderror

                <a class="forgot" href="{{ route('password.request') }}">Forgot password?</a>

                <label class="terms">
                    <input type="checkbox" name="terms" required>
                    <span>I agree to SkillLink Campus's <a href="#">Terms &amp; Conditions</a> and acknowledge the <a href="#">Privacy Policy</a>.</span>
                </label>

                <button class="submit" type="submit">Log in</button>
            </form>

            <div class="socials">
                <a class="social apple" href="#" aria-label="Continue with Apple">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.09 3.792 3.03 1.52-.065 2.09-.987 3.935-.987 1.831 0 2.35.987 3.96.948 1.637-.026 2.676-1.48 3.676-2.948 1.156-1.688 1.636-3.325 1.662-3.415-.039-.013-3.256-1.251-3.288-4.943-.026-3.09 2.52-4.57 2.639-4.643-1.438-2.117-3.66-2.36-4.425-2.41-1.932-.156-3.56 1.052-4.429 1.052zM15.53 3.83c.843-1.012 1.4-2.427 1.245-3.83-1.207.052-2.662.805-3.532 1.818-.78.896-1.454 2.338-1.273 3.714 1.338.104 2.715-.688 3.559-1.701"/></svg>
                </a>
                <a class="social fb" href="#" aria-label="Continue with Facebook">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a class="social discord" href="#" aria-label="Continue with Discord">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.317 4.37a19.79 19.79 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.865-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.736 19.736 0 003.677 4.37a.07.07 0 00-.032.028C.533 9.046-.32 13.58.099 18.058a.082.082 0 00.031.056 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028 14.09 14.09 0 001.226-1.994.076.076 0 00-.041-.106 13.107 13.107 0 01-1.872-.892.077.077 0 01-.008-.128 10.2 10.2 0 00.372-.291.074.074 0 01.077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 01.078.009c.12.099.246.198.373.292a.077.077 0 01-.006.127 12.3 12.3 0 01-1.873.892.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.84 19.84 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.06.06 0 00-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/></svg>
                </a>
                <a class="social google" href="#" aria-label="Continue with Google">
                    <svg viewBox="0 0 24 24"><path fill="#4285F4" d="M23.49 12.27c0-.79-.07-1.54-.19-2.27H12v4.51h6.47c-.29 1.48-1.14 2.73-2.4 3.58v3h3.86c2.26-2.09 3.56-5.17 3.56-8.82z"/><path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.86-3c-1.08.72-2.45 1.16-4.07 1.16-3.13 0-5.78-2.11-6.73-4.96H1.29v3.09C3.26 21.3 7.31 24 12 24z"/><path fill="#FBBC05" d="M5.27 14.29c-.25-.72-.38-1.49-.38-2.29s.14-1.57.38-2.29V6.62H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.38l3.98-3.09z"/><path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.31 0 3.26 2.7 1.29 6.62l3.98 3.09C6.22 6.86 8.87 4.75 12 4.75z"/></svg>
                </a>
            </div>
        </section>
    </main>

    <svg class="scene" viewBox="0 0 560 320" aria-hidden="true">
        <path fill="#fbe3ea" d="M-30 320 C-30 246 34 222 84 238 C96 196 168 188 196 224 C248 210 292 242 286 282 C314 288 326 304 326 320 Z"/>
        <path fill="#4f46e5" d="M150 320 C142 252 196 208 266 214 C334 220 362 272 352 320 Z"/>
        <path fill="none" stroke="#14151a" stroke-width="5" stroke-linecap="round" d="M228 254 q13 14 26 0"/>
        <path fill="none" stroke="#14151a" stroke-width="5" stroke-linecap="round" d="M280 254 q13 14 26 0"/>
        <path fill="none" stroke="#14151a" stroke-width="5" stroke-linecap="round" d="M236 278 q26 22 52 0"/>
        <path fill="#fbd9e4" d="M330 118 C332 94 358 86 374 96 C382 78 412 78 420 96 C442 92 454 110 446 124 C420 132 356 132 330 118 Z"/>
        <path fill="#f9c23c" d="M120 44 C123 58 126 61 140 64 C126 67 123 70 120 84 C117 70 114 67 100 64 C114 61 117 58 120 44 Z"/>
        <path fill="#f6a1b8" d="M58 118 C60 128 62 130 72 132 C62 134 60 136 58 146 C56 136 54 134 44 132 C54 130 56 128 58 118 Z"/>
        <circle cx="44" cy="92" r="5" fill="#f6a1b8"/>
        <circle cx="352" cy="176" r="4" fill="#f9c23c"/>
        <g fill="#8b5cf6">
            <circle cx="470" cy="200" r="15"/><circle cx="470" cy="230" r="15"/>
            <circle cx="455" cy="215" r="15"/><circle cx="485" cy="215" r="15"/>
            <circle cx="470" cy="215" r="13"/>
        </g>
        <circle cx="470" cy="215" r="5" fill="#fff"/>
    </svg>

    <script>
        // Green check appears once a field has content
        document.querySelectorAll('.field input').forEach(function (input) {
            var update = function () {
                input.closest('.field').classList.toggle('filled', input.value.trim() !== '');
            };
            input.addEventListener('input', update);
            update();
        });

        // Show / hide password toggle
        document.querySelectorAll('.eye').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var input = btn.closest('.field').querySelector('input');
                var show = input.type === 'password';
                input.type = show ? 'text' : 'password';
                btn.classList.toggle('showing', show);
            });
        });
    </script>
</body>
</html>