<!-- Navbar Start -->
<style>
    .navbar-premium {
      position: sticky;
      top: 0;
      z-index: 1050;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(18px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 4px 25px rgba(0, 255, 255, 0.1);
      transition: all 0.4s ease-in-out;
      padding: 0.8rem 2rem;
    }

    .navbar-premium.scrolled {
      background: rgba(255, 255, 255, 0.2);
      box-shadow: 0 4px 25px rgba(0, 255, 255, 0.25);
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 1.8rem;
      background: linear-gradient(90deg, #00eaff, #ff73f1);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-transform: uppercase;
      letter-spacing: 1px;
      text-shadow: 0 0 10px rgba(0, 238, 255, 0.3);
    }

    .nav-link {
      color: #f0f0f0 !important;
      font-weight: 500;
      font-size: 15px;
      margin-right: 1.2rem;
      letter-spacing: 0.5px;
      position: relative;
      transition: all 0.3s ease;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0%;
      height: 2px;
      background: linear-gradient(90deg, #00eaff, #ff73f1);
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .nav-link:hover {
      color: #00eaff !important;
      transform: translateY(-2px);
    }

    .btn-premium {
      background: linear-gradient(135deg, #00eaff, #ff73f1);
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 30px;
      padding: 0.5rem 1.3rem;
      box-shadow: 0 0 15px rgba(0, 238, 255, 0.3);
      transition: all 0.3s ease;
    }

    .btn-premium:hover {
      background: linear-gradient(135deg, #ff73f1, #00eaff);
      transform: translateY(-2px) scale(1.05);
      box-shadow: 0 0 25px rgba(255, 115, 241, 0.5);
    }

    .navbar-toggler {
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .navbar-toggler-icon {
      filter: invert(100%) brightness(200%);
    }

    @media (max-width: 992px) {
      .navbar-premium {
        padding: 0.6rem 1rem;
      }
      .nav-link {
        margin-right: 0;
        padding: 10px 0;
      }
    }
  </style>

  <nav class="navbar navbar-expand-lg navbar-premium">
    <div class="container">
      <a class="navbar-brand" href="{{ route('index') }}">MUMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMUMS" aria-controls="navbarMUMS" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMUMS">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('features') }}">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
          <li class="nav-item">
            <a class="btn btn-premium ms-lg-3" href="{{ route('login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script>
    // Add scroll effect for navbar
    window.addEventListener('scroll', function () {
      const navbar = document.querySelector('.navbar-premium');
      if (window.scrollY > 10) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>
  <!-- Navbar End -->
