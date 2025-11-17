@extends('layouts.main')

@section('title', 'MUMS | Contact Us')

@section('content')

<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #1a0a3b, #0c0c2c);
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

/* Main wrapper */
.contact-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 20px;
    flex-direction: column;
}

/* Unique MMUS Info Box */
.contact-info-box {
    background: rgba(30, 10, 60, 0.85);
    border-radius: 25px;
    padding: 25px 30px;
    box-shadow: 0 15px 40px rgba(100,100,255,0.3), inset 0 0 10px rgba(100,150,255,0.1);
    margin-bottom: 40px;
    width: 90%;
    max-width: 800px;
    text-align: center;
}
.contact-info-box h3 {
    color: #f2b400;
    font-size: 22px;
    margin-bottom: 15px;
}
.contact-info-box p {
    color: #ccc;
    font-size: 15px;
    margin: 5px 0;
}

/* Form card 3D */
.contact-box-3d {
    background: rgba(20, 5, 30, 0.85);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(100, 150, 255, 0.2);
    border-radius: 25px;
    box-shadow: 0 20px 50px rgba(50,50,200,0.25), inset 0 0 15px rgba(100,150,255,0.1);
    width: 90%;
    max-width: 700px;
    padding: 35px 45px;
    text-align: center;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.contact-box-3d:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 30px 60px rgba(50,50,200,0.35), inset 0 0 20px rgba(100,150,255,0.15);
}

h2 {
    font-weight: 700;
    color: #f2b400;
    text-transform: uppercase;
    font-size: 28px;
    margin-bottom: 5px;
}
p.subtitle {
    color: #ccc;
    font-size: 15px;
    margin-bottom: 25px;
}

/* Inputs 3D */
.form-control-3d {
    width: 100%;
    padding: 12px 15px;
    border-radius: 12px;
    border: 1px solid rgba(100,150,255,0.4);
    background: rgba(20,5,30,0.85);
    color: #fff;
    box-shadow: inset 2px 2px 8px rgba(0,0,50,0.2), inset -2px -2px 8px rgba(255,255,255,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    margin-bottom: 12px;
}
.form-control-3d:focus {
    outline: none;
    transform: translateY(-2px);
    box-shadow: inset 2px 2px 10px rgba(0,0,50,0.3), inset -2px -2px 10px rgba(255,255,255,0.1);
    background: rgba(30,10,60,0.9);
}

/* Button 3D */
.submit-btn-3d {
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
.submit-btn-3d:hover {
    background: linear-gradient(135deg, #6b5bff, #3b3bff);
    box-shadow: 0 8px 20px rgba(75,75,255,0.4);
    transform: translateY(-3px) scale(1.02);
}

@media (max-width: 992px) {
    .contact-info-box, .contact-box-3d {
        width: 95%;
        padding: 25px;
    }
}
</style>

<!-- Bubble Background -->
<div class="bubble-bg" id="bubble-bg"></div>

<div class="contact-wrapper">

    <!-- Unique MMUS Contact Info -->
    <div class="contact-info-box" data-tilt>
        <h3>Contact MMUS</h3>
        <p>📍 123 MUMS Avenue, City, State, 456789</p>
        <p>📧 support@mumsportal.com</p>
        <p>📞 +91 98765 43210</p>
        <p>We are here to assist you 24/7. Reach out to us anytime!</p>
    </div>

    <!-- Contact Form -->
    <div class="contact-box-3d" data-tilt>
        <h2>Send a Message</h2>
        <p class="subtitle">Have a question? Fill out the form below and we’ll get back to you soon.</p>

        @if(session('success'))
        <div class="bg-success bg-opacity-25 text-success border border-success p-2 rounded mb-3 small">
            {{ session('success') }}
        </div>
        @endif

        <form action="#" method="POST" class="mt-3">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control-3d" required>
                </div>

                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control-3d" required>
                </div>

                <div class="col-md-12">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control-3d" required>
                </div>

                <div class="col-md-12">
                    <label>Message</label>
                    <textarea name="message" rows="5" class="form-control-3d" required></textarea>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="submit-btn-3d">Send Message</button>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.3/dist/vanilla-tilt.min.js"></script>
<script>
VanillaTilt.init(document.querySelectorAll("[data-tilt]"), {
    max: 10,
    speed: 400,
    glare: true,
    "max-glare": 0.2,
});

/* Generate bubbles */
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
