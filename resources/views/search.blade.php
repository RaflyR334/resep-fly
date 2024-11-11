<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Terpilih</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            gap: 30px;
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

        /* Styling for Login and Register buttons */
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

        /* Main Content */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .container img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .container h3 {
            color: #ff5722;
            font-size: 1.5rem;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .container ul {
            list-style-type: none;
            padding-left: 0;
        }

        .container ul li {
            font-size: 1.1rem;
            color: #555;
            padding: 5px 0;
        }

        .container p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #ff5722, #e64a19);
            color: white;
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
            color: white;
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
                <a class="nav-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Resep Terpilih: {{ $randomResep->nama_resep }}</h1>

       <!-- Resep Image -->
       <img src="{{ asset('storage/reseps/' . $randomResep->image) }}" alt="Gambar {{ $randomResep->nama_resep }}">


        <p>{{ $randomResep->description }}</p>

        <!-- Bahan Section -->
        <h3>Bahan:</h3>
        <ul>
            @foreach(explode(',', $randomResep->bahan->nama_bahan) as $bahan)
                <li>{{ $bahan }}</li>
            @endforeach
        </ul>

        <!-- Langkah-langkah Section -->
        <h3>Langkah-langkah:</h3>
        <p>{{ $randomResep->langkah }}</p>
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
    <p class="copyright">&copy; 2024 Situs Resep Kami. All rights reserved.</p>
</div>
</body>
</html>
