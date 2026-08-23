<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyShop')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --coral: #FF6B6B;
            --teal: #4ECDC4;
            --yellow: #FFD93D;
            --dark: #2D3142;
            --bg: #F8F9FC;
        }
        body { font-family: 'Inter', sans-serif; background: #F0FBFA; color: var(--dark); }
        h1, h2, h3, h4, .navbar-brand { font-family: 'Poppins', sans-serif; font-weight: 700; }

        .navbar { background: #fff !important; box-shadow: 0 4px 20px rgba(0,0,0,0.06); padding: 18px 0; }
        .navbar-brand { color: var(--coral) !important; font-size: 1.6rem; }
        .navbar .btn { border-radius: 50px; padding: 8px 22px; font-weight: 500; }
        .btn-primary { background: var(--coral); border: none; }
        .btn-primary:hover { background: #ff5252; transform: translateY(-2px); }
        .btn-outline-secondary { border-color: #ddd; color: var(--dark); }
        .btn-outline-secondary:hover { background: var(--teal); border-color: var(--teal); color: #fff; }

        .hero { background: linear-gradient(135deg, #FFF5F5 0%, #F0FFFE 100%); padding: 90px 0 70px; border-radius: 0 0 40px 40px; margin-bottom: 60px; }
        .hero h1 { font-size: 3rem; color: var(--dark); }
        .hero .highlight { color: var(--coral); }
        .hero p { font-size: 1.15rem; color: #6b7280; }

        .category-pill { border-radius: 50px; padding: 12px 28px; background: #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.06); font-weight: 500; transition: all 0.3s; cursor: pointer; border: 2px solid transparent; }
        .category-pill:hover { border-color: var(--teal); transform: translateY(-3px); }

        .card { border-radius: 18px; border: none; box-shadow: 0 8px 24px rgba(0,0,0,0.07); overflow: hidden; transition: all 0.35s ease; }
        .card:hover { transform: translateY(-8px); box-shadow: 0 16px 32px rgba(0,0,0,0.12); }
        .card-img-top { transition: transform 0.4s; }
        .card:hover .card-img-top { transform: scale(1.06); }
        .price-tag { color: var(--coral); font-weight: 700; font-size: 1.15rem; }
        .badge-category { background: var(--teal); color: #fff; font-weight: 500; border-radius: 50px; padding: 4px 14px; font-size: 0.75rem; }

        .section-title { font-size: 2rem; margin-bottom: 8px; }
        .section-sub { color: #6b7280; margin-bottom: 40px; }

        footer { background: var(--dark); color: #fff; padding: 30px 0; margin-top: 80px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🛍️ MyShop</a>
            <div class="ms-auto d-flex gap-2">
                <a href="{{ route('products.list') }}" class="btn btn-outline-secondary">Products</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="text-center">
        &copy; {{ date('Y') }} MyShop. All rights reserved.
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>