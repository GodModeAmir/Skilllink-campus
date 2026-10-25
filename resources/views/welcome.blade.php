
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink Campus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { margin: 0; font-family: Arial, sans-serif; color: #172033; }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 22px 8%; border-bottom: 1px solid #e5e7eb; }
        .brand { font-size: 24px; font-weight: bold; color: #4f46e5; }
        nav a { margin-left: 18px; text-decoration: none; color: #374151; }
        .hero { padding: 85px 8%; background: #eef2ff; }
        .hero h1 { font-size: clamp(38px, 6vw, 64px); max-width: 750px; }
        .hero p { max-width: 650px; font-size: 19px; line-height: 1.7; color: #4b5563; }
        .btn { display: inline-block; padding: 13px 20px; margin: 10px 8px 0 0; border-radius: 8px; text-decoration: none; }
        .primary { background: #4f46e5; color: white; }
        .features { padding: 45px 8%; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; }
        .card { padding: 24px; border: 1px solid #e5e7eb; border-radius: 12px; }
        footer { padding: 25px 8%; background: #111827; color: white; }
    </style>
</head>
<body>
    <nav>
        <div class="brand">SkillLink Campus</div>
        <div>
            <a href="#features">Features</a>
            <a href="{{ route('login') }}">Log in</a>
            <a class="btn primary" href="{{ route('register') }}">Join now</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Learn together. Grow together.</h1>
        <p>Connect with student tutors, book study sessions, share resources, and build a stronger campus learning community.</p>
        <a class="btn primary" href="{{ route('register') }}">Get started</a>
        <a class="btn" href="{{ route('login') }}">Sign in</a>
    </section>

    <section class="features" id="features">
        <h2>Everything you need to learn together</h2>
        <div class="grid">
            <div class="card"><h3>🎓 Find a tutor</h3><p>Discover tutors by subject and explore their profiles.</p></div>
            <div class="card"><h3>📅 Book sessions</h3><p>Organize study sessions and manage your bookings.</p></div>
            <div class="card"><h3>👥 Study groups</h3><p>Connect with classmates and learn as a team.</p></div>
            <div class="card"><h3>📚 Learning resources</h3><p>Share useful study materials and links.</p></div>
        </div>
    </section>

    <footer>SkillLink Campus — Peer learning, connected.</footer>
</body>
</html>
