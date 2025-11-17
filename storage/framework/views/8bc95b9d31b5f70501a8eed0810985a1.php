<!-- Footer Start -->
<style>
    footer {
      background: rgba(15, 15, 25, 0.85);
      backdrop-filter: blur(14px);
      border-top: 1px solid rgba(255, 255, 255, 0.15);
      color: #d8e8ff;
      padding: 70px 20px 40px;
      box-shadow: 0 -4px 30px rgba(0, 255, 255, 0.15);
    }

    footer h4, footer h5 {
      background: linear-gradient(90deg, #00eaff, #ff73f1);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 700;
      margin-bottom: 1.2rem;
    }

    footer p {
      color: #b8c5d9;
      line-height: 1.7;
      font-size: 0.95rem;
    }

    footer ul {
      list-style: none;
      padding: 0;
    }

    footer ul li {
      margin-bottom: 0.6rem;
    }

    footer a {
      color: #d8e8ff;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    footer a:hover {
      color: #00eaff;
      text-shadow: 0 0 8px rgba(0, 255, 255, 0.4);
    }

    .social-icons a {
      display: inline-block;
      font-size: 1.4rem;
      margin-right: 12px;
      color: #d8e8ff;
      transition: all 0.3s ease;
    }

    .social-icons a:hover {
      color: #ff73f1;
      transform: translateY(-3px);
      text-shadow: 0 0 10px rgba(255, 115, 241, 0.5);
    }

    footer hr {
      border-color: rgba(255, 255, 255, 0.2);
      margin: 40px 0;
    }

    .footer-bottom {
      text-align: center;
      color: #b8c5d9;
      font-size: 0.9rem;
      letter-spacing: 0.5px;
    }

    .newsletter input {
      border: none;
      outline: none;
      padding: 10px 14px;
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      width: 70%;
      transition: all 0.3s ease;
    }

    .newsletter input:focus {
      background: rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 10px rgba(0, 255, 255, 0.4);
    }

    .newsletter button {
      background: linear-gradient(135deg, #00eaff, #ff73f1);
      border: none;
      border-radius: 25px;
      color: #fff;
      padding: 10px 18px;
      font-weight: 600;
      margin-left: 8px;
      transition: all 0.3s ease;
    }

    .newsletter button:hover {
      background: linear-gradient(135deg, #ff73f1, #00eaff);
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(255, 115, 241, 0.4);
    }

    @media (max-width: 992px) {
      footer {
        text-align: center;
      }
      .newsletter input {
        width: 100%;
        margin-bottom: 10px;
      }
    }
  </style>

  <footer>
    <div class="container">
      <div class="row g-5">
        <div class="col-md-4">
          <h4>MUMS</h4>
          <p>
            A futuristic multi-user management system built to simplify operations,
            boost productivity, and bring teams together on one smart platform.
          </p>
        </div>

        <div class="col-md-4">
          <h5>Explore</h5>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">Terms & Privacy</a></li>
          </ul>
        </div>

        <div class="col-md-4">
          <h5>Join Our Newsletter</h5>
          <p>Get exclusive updates and feature releases directly in your inbox.</p>
          <form class="newsletter d-flex align-items-center justify-content-center">
            <input type="email" placeholder="Your Email Address" required>
            <button type="submit">Subscribe</button>
          </form>
          <div class="social-icons mt-4">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

      <hr>
      <div class="footer-bottom">
        &copy; 2025 <strong>MUMS</strong> — Crafted with ❤️ by the Dev Team. All Rights Reserved.
      </div>
    </div>
  </footer>
  <!-- Footer End -->
<?php /**PATH D:\laravel all\myapp\resources\views/layouts/footer.blade.php ENDPATH**/ ?>