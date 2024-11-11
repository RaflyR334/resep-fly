<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Makanan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: rgba(51, 51, 51, 0.9);
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar .nav-left {
            display: flex;
            align-items: center;
            gap: 30px
        }

        .nav-left img {
            width: 80px;
            height: auto;
        }

        .navbar .nav-right {
            display: flex;
            align-items: center;
        }

        .navbar .nav-left a, .navbar .nav-right .nav-item {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s, background-color 0.3s;
        }
        .navbar .nav-left a:hover, .navbar .nav-right .nav-item:hover {
            color: #ff5722;
        }

        .navbar .nav-right .nav-item {
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            transition: background-color 0.3s, transform 0.3s;
        }
        .navbar .nav-right .nav-item:hover {
            background-color: rgba(255, 87, 34, 0.8);
            color: white;
            transform: scale(1.1);
        }

        /* Jumbotron */
        .jumbotron {
            background-image: url({{asset('front/assets/img/jumbotron.jpg')}});
            background-size: cover;
            background-position: center;
            height: calc(100vh - 80px); /* Adjust to avoid overlap with navbar */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            padding: 20px;
        }
        .jumbotron .container {
            max-width: 800px;
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .jumbotron p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Search Form */
        .search-form {
            display: flex;
            justify-content: center;
            width: 100%;
            max-width: 600px;
            margin-top: 20px;
        }
        .search-form input[type="text"] {
            flex: 1;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px 0 0 5px;
            outline: none;
        }
        .search-form button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #ff5722;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-form button:hover {
            background-color: #e64a19;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #ffffff, #ffffff);
            color: #ff5722;
            text-align: center;
            padding: 30px 0;
            margin-top: 40px;
        }
        .footer h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        .footer p {
            font-size: 1rem;
            margin-bottom: 20px;
        }
        .footer .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 15px;
        }
        .footer .social-icons a {
            color: #ff5722;
            font-size: 1.5rem;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer .social-icons a:hover {
            color: #ffeb3b;
        }
        .footer .copyright {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="nav-left">
        <a href="{{url('')}}"><img src="{{asset('front/assets/img/logoo.png')}}" alt="logo"></a>
        <a href="{{url('')}}">Home</a>
        <a href="{{url('about')}}">About</a>
    </div>
    <div class="nav-right">
        @guest
            <a class="nav-item" href="{{ url('login') }}">Login</a>
            <a class="nav-item" href="{{ url('register') }}">Register</a>
        @else
            <a class="nav-item" href="{{ route('logout') }} "
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</div>

<!-- Content -->
<div class="jumbotron">
    <div class="container">
        <h1>Selamat datang di Situs Resep Kami</h1>
        <p>Temukan resep lezat berdasarkan bahan yang Anda miliki!</p>
        <!-- Search Form -->
        <form class="search-form" action="{{ route('resep.search') }}" method="GET">
            <input type="text" name="query" placeholder="Telusuri resep..." required>
            <button type="submit">Search</button>
        </form>
        <script>
            function checkLogin() {
                @guest
                    alert('Anda harus login terlebih dahulu untuk melakukan pencarian!');
                    window.location.href = "{{ url('login') }}";
                    return false; // Prevent form submission
                @endguest
                return true; // Allow form submission
            }
        </script>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <h3>Dari Kami</h3>
    <p>Ikuti kami di media sosial untuk mendapatkan resep dan update terbaru!</p>
    <div class="social-icons">
        <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook"></a>
        <a href="https://twitter.com" target="_blank" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com" target="_blank" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com" target="_blank" class="fab fa-linkedin"></a>
    </div>
    <p class="copyright">&copy; 2024 Situs Resep Kami. Uhuyyyyy.</p>
</div>

</body>
</html>
