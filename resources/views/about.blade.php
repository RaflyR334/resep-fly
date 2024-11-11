<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Makanan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Reset Margin dan Padding */
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
            background-color: #333;
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

        /* About Section */
        .about-section {
            padding: 60px 20px;
            background-color: #f7f7f7;
            color: #333;
        }
        .about-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ff5722;
        }
        .about-section p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        .about-section h3 {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #e64a19;
        }
        .about-section ul {
            font-size: 1.2rem;
            line-height: 1.8;
            text-align: left;
            margin: auto;
            max-width: 600px;
            padding-left: 20px;
        }
        .about-section li {
            margin-bottom: 10px;
        }
        .about-section p.italic {
            font-size: 1.2rem;
            font-style: italic;
            color: #ff5722;
            margin-top: 40px;
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

    <!-- About Section -->
    <section id="about-section" class="about-section">
        <div class="container" style="max-width: 800px; margin: auto; text-align: center;">
            <h2>Tentang Kami</h2>
            <p>
                Selamat datang di <strong>Situs Resep Kami</strong> – tempat di mana inspirasi memasak bertemu dengan bahan-bahan yang Anda miliki! Kami berdedikasi untuk membantu Anda menemukan resep-resep lezat dan praktis yang bisa Anda buat dengan mudah, langsung dari dapur Anda.
            </p>
            <p>
                Di situs ini, kami memahami bahwa setiap masakan memiliki cerita, setiap resep membawa kenangan, dan setiap hidangan adalah hasil cinta dan kreasi. Dengan koleksi resep yang kami miliki, kami ingin menjadi panduan Anda dalam mengeksplorasi berbagai hidangan dari seluruh penjuru dunia.
            </p>

            <h3>Misi Kami</h3>
            <p>
                Misi kami adalah untuk mempermudah Anda menemukan inspirasi memasak setiap hari. Kami menyediakan fitur pencarian berdasarkan bahan yang Anda miliki, sehingga Anda bisa memasak tanpa harus repot mencari bahan yang sulit didapat.
            </p>

            <h3>Mengapa Memilih Kami?</h3>
            <ul>
                <li><strong>Resep Terpercaya:</strong> Setiap resep kami melalui seleksi dan diulas oleh tim kuliner untuk memastikan rasa dan kualitas.</li>
                <li><strong>Pencarian Berbasis Bahan:</strong> Hanya punya beberapa bahan di dapur? Gunakan fitur pencarian kami untuk menemukan resep yang cocok!</li>
                <li><strong>Komunitas & Inspirasi:</strong> Dapatkan inspirasi dari berbagai resep yang dibagikan, dan jangan ragu untuk bereksperimen dengan kreasi baru.</li>
            </ul>

            <h3>Hubungi Kami</h3>
            <p>
                Kami senang mendengar cerita dan pengalaman memasak Anda! Jangan ragu untuk menghubungi kami atau mengikuti kami di media sosial untuk mendapatkan update resep terbaru, tips, dan trik memasak.
            </p>

            <p class="italic">
                Selamat memasak, dan semoga dapur Anda dipenuhi oleh aroma kelezatan dan kebahagiaan!
            </p>
        </div>
    </section>

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
