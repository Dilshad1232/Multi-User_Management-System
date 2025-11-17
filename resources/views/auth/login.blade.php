@extends('layouts.main')

@section('title', 'Login')

@section('content')

<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #1a0a3b, #0c0c2c); /* dark-purple to deep blue */
    overflow-x: hidden;
}

/* Bubble Background */
.bubble-bg {
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
}

.bubble {
    position: absolute;
    bottom: -100px;
    border-radius: 50%;
    animation: rise 20s linear infinite;
}

@keyframes rise {
    0% { transform: translateY(0) scale(0.5); opacity: 0.5; }
    50% { opacity: 0.8; }
    100% { transform: translateY(-120vh) scale(1); opacity: 0; }
}

/* Login wrapper */
.login-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
}

/* Login card 3D style */
.login-box-3d {
    background: rgba(20, 5, 30, 0.85); /* semi-transparent dark */
    backdrop-filter: blur(12px);
    border: 1px solid rgba(100, 150, 255, 0.2);
    border-radius: 25px;
    box-shadow: 0 20px 50px rgba(50,50,200,0.25), inset 0 0 15px rgba(100,150,255,0.1);
    width: 90%;
    max-width: 480px;
    padding: 45px 40px;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.login-box-3d:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 30px 60px rgba(50,50,200,0.35), inset 0 0 20px rgba(100,150,255,0.15);
}

h2 {
    font-weight: 700;
    color: #f2b400;
    text-transform: uppercase;
    font-size: 24px;
    text-align: center;
}
p {
    color: #ccc;
    font-size: 14px;
    text-align: center;
}

/* Form Inputs 3D */
.form-control-3d {
    width: 100%;
    padding: 15px 20px;
    border-radius: 12px;
    border: 1px solid rgba(100,150,255,0.4);
    background: rgba(20,5,30,0.85);
    color: #fff;
    box-shadow: inset 2px 2px 8px rgba(0,0,50,0.2), inset -2px -2px 8px rgba(255,255,255,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
}
.form-control-3d:focus {
    outline: none;
    transform: translateY(-2px);
    box-shadow: inset 2px 2px 10px rgba(0,0,50,0.3), inset -2px -2px 10px rgba(255,255,255,0.1);
    background: rgba(30,10,60,0.9);
}

/* Button 3D */
.login-btn-3d {
    background: linear-gradient(135deg, #4b3bff, #2b2bff);
    border: none;
    color: #fff;
    font-weight: 600;
    border-radius: 12px;
    padding: 15px 20px;
    width: 100%;
    font-size: 16px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.login-btn-3d:hover {
    background: linear-gradient(135deg, #6b5bff, #3b3bff);
    box-shadow: 0 8px 20px rgba(75,75,255,0.4);
    transform: translateY(-3px) scale(1.02);
}

.text-small {
    font-size: 14px;
    text-align: center;
}

@media (max-width: 992px) {
    .login-box-3d {
        padding: 30px 25px;
        width: 95%;
    }
}
</style>

<!-- Bubble Background -->
<div class="bubble-bg" id="bubble-bg"></div>

<div class="login-wrapper">
    <div class="login-box-3d mt-5" data-tilt>
        <h2>Login</h2>
        <p>Access your account</p>

        @if($errors->any())
            <div class="bg-danger bg-opacity-25 text-danger border border-danger p-2 rounded mb-3 small">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="mt-3">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control-3d" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control-3d" required>
            </div>

            <button type="submit" class="login-btn-3d">Login</button>
        </form>

        <p class="text-small mt-3">
            Don't have an account?
            <a href="{{ url('/register') }}" class="text-warning text-decoration-none fw-bold">Register</a>
        </p>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.3/dist/vanilla-tilt.min.js"></script>
<script>
VanillaTilt.init(document.querySelectorAll("[data-tilt]"), {
    max: 10,
    speed: 400,
    glare: true,
    "max-glare": 0.2,
});

/* Generate bubbles with gradient neon colors */
const bubbleContainer = document.getElementById('bubble-bg');
for(let i=0;i<35;i++){
    let bubble = document.createElement('div');
    bubble.classList.add('bubble');
    let size = Math.random() * 50 + 10;
    bubble.style.width = size + 'px';
    bubble.style.height = size + 'px';
    bubble.style.left = Math.random() * 100 + '%';
    bubble.style.animationDuration = (Math.random() * 15 + 10) + 's';
    let colorR = 50 + Math.floor(Math.random() * 100);
    let colorG = 50 + Math.floor(Math.random() * 100);
    let colorB = 200 + Math.floor(Math.random() * 55);
    bubble.style.backgroundColor = `rgba(${colorR},${colorG},${colorB},${Math.random()*0.3 + 0.1})`;
    bubbleContainer.appendChild(bubble);
}
</script>

@endsection
