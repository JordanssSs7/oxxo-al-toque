<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OXXO Al Toque</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f9fafb; color: #111; }

        /* NAVBAR */
        nav {
            background: #dc2626;
            display: flex; align-items: center;
            justify-content: space-between;
            padding: 0 2rem; height: 64px;
            position: sticky; top: 0; z-index: 100;
            box-shadow: 0 2px 12px rgba(0,0,0,0.15);
        }
        .nav-logo {
            display: flex; align-items: center; gap: 0.5rem;
            text-decoration: none;
        }
        .nav-logo img { height: 36px; width: auto; }
        .nav-links { display: flex; gap: 1.6rem; }
        .nav-links a {
            color: rgba(255,255,255,0.88); font-size: 0.82rem;
            font-weight: 500; text-decoration: none; letter-spacing: 0.02em;
            transition: opacity 0.2s;
        }
        .nav-links a:hover { opacity: 0.65; }
        .nav-actions { display: flex; gap: 0.75rem; align-items: center; }
        .btn-outline {
            color: white; border: 1px solid rgba(255,255,255,0.6);
            padding: 0.4rem 1.1rem; border-radius: 6px;
            font-size: 0.78rem; font-weight: 500;
            text-decoration: none; transition: background 0.2s;
        }
        .btn-outline:hover { background: rgba(255,255,255,0.15); }
        .btn-solid {
            background: white; color: #dc2626;
            padding: 0.4rem 1.1rem; border-radius: 6px;
            font-size: 0.78rem; font-weight: 600;
            text-decoration: none; transition: opacity 0.2s;
        }
        .btn-solid:hover { opacity: 0.9; }

        /* HERO */
        .hero {
            background: #dc2626;
            padding: 5rem 2rem 6rem;
            text-align: center;
            position: relative; overflow: hidden;
        }
        .hero::after {
            content: '';
            position: absolute; bottom: -2px; left: 0; right: 0;
            height: 60px;
            background: #f9fafb;
            clip-path: ellipse(55% 100% at 50% 100%);
        }
        .hero h1 {
            font-size: clamp(2.8rem, 6vw, 5rem);
            font-weight: 900; color: white;
            line-height: 1.1; margin-bottom: 1.2rem;
            letter-spacing: -0.02em;
        }
        .hero p {
            color: rgba(255,255,255,0.82);
            font-size: 1.05rem; font-weight: 300;
            max-width: 480px; margin: 0 auto 2.5rem;
            line-height: 1.65;
        }
        .hero-btn {
            display: inline-block;
            background: white; color: #dc2626;
            font-weight: 700; font-size: 0.9rem;
            padding: 0.85rem 2.4rem; border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .hero-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(0,0,0,0.2); }

        /* CARDS */
        .section {
            padding: 5rem 2rem;
            max-width: 1100px; margin: 0 auto;
        }
        .section-title {
            text-align: center; font-size: 1.9rem;
            font-weight: 700; margin-bottom: 0.6rem; color: #111;
        }
        .section-sub {
            text-align: center; color: #6b7280;
            font-size: 0.95rem; margin-bottom: 3rem;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
        }
        .card {
            background: white; border-radius: 14px;
            padding: 2rem 1.5rem; text-align: center;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
            border: 1px solid #f0f0f0;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover { transform: translateY(-4px); box-shadow: 0 8px 32px rgba(0,0,0,0.11); }
        .card-icon-wrap {
            width: 56px; height: 56px; border-radius: 50%;
            background: #fee2e2; display: flex;
            align-items: center; justify-content: center;
            margin: 0 auto 1.2rem;
        }
        .card-icon-wrap svg { color: #dc2626; }
        .card h3 { font-size: 1rem; font-weight: 700; margin-bottom: 0.5rem; color: #111; }
        .card p { font-size: 0.83rem; color: #6b7280; line-height: 1.6; }

        /* FOOTER */
        footer {
            background: #111; color: white;
            padding: 3rem 2rem 1.5rem;
        }
        .footer-grid {
            max-width: 1100px; margin: 0 auto;
            display: grid; grid-template-columns: 1fr 1fr 1fr;
            gap: 2rem; margin-bottom: 2.5rem;
        }
        .footer-logo img { height: 36px; width: auto; margin-bottom: 0.75rem; }
        .footer-logo p { font-size: 0.78rem; color: #9ca3af; line-height: 1.6; }
        .footer-col h4 { font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem; color: white; }
        .footer-col p, .footer-col a {
            font-size: 0.78rem; color: #9ca3af;
            line-height: 1.9; text-decoration: none; display: block;
        }
        .footer-col a:hover { color: white; }
        .social-icons { display: flex; gap: 1rem; margin-top: 0.5rem; }
        .social-icons a { color: #9ca3af; line-height: 0; }
        .social-icons a:hover { color: white; }
        .footer-bottom {
            border-top: 1px solid #1f2937;
            padding-top: 1.5rem; text-align: center;
            font-size: 0.75rem; color: #4b5563;
        }

        @media (max-width: 640px) {
            .nav-links { display: none; }
            .footer-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav>
        <a href="/" class="nav-logo">
            <img src="{{ asset('images/logo-oxxo.png') }}" alt="OXXO Al Toque">
        </a>

        <div class="nav-links">
            <a href="#">Sobre Nosotros</a>
            <a href="{{ route('productos.index') }}">Productos</a>
            <a href="#">Contáctanos</a>
        </div>

        <div class="nav-actions">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-solid">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-outline">Iniciar Sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-solid">Registrarse</a>
                @endif
            @endauth
        </div>
    </nav>

    {{-- HERO --}}
    <section class="hero">
        <h1>OXXO Al Toque</h1>
        <p>Sistema integral de gestión para tu tienda de conveniencia. Controla todo desde un solo lugar.</p>
        @auth
            <a href="{{ route('dashboard') }}" class="hero-btn">Ir al Panel de Control</a>
        @else
            <a href="{{ route('login') }}" class="hero-btn">Comenzar ahora</a>
        @endauth
    </section>

    {{-- CARDS --}}
    <section class="section">
        <h2 class="section-title">¿Qué puedes gestionar?</h2>
        <p class="section-sub">Todo lo que necesitas para administrar tu tienda en un solo sistema.</p>

        <div class="cards">
            <div class="card">
                <div class="card-icon-wrap">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2zM16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z"/>
                    </svg>
                </div>
                <h3>Productos</h3>
                <p>Catálogo completo con precios, descripción y alertas de stock mínimo.</p>
            </div>

            <div class="card">
                <div class="card-icon-wrap">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2zM9 22V12h6v10"/>
                    </svg>
                </div>
                <h3>Sucursales</h3>
                <p>Gestión de locales, dirección y control del estado operativo de cada tienda.</p>
            </div>

            <div class="card">
                <div class="card-icon-wrap">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                    </svg>
                </div>
                <h3>Inventario</h3>
                <p>Control de cantidades disponibles por sucursal en tiempo real.</p>
            </div>

            <div class="card">
                <div class="card-icon-wrap">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <h3>Promociones</h3>
                <p>Administra descuentos y ofertas vigentes aplicables al carrito de ventas.</p>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-grid">
            <div class="footer-logo">
                <img src="{{ asset('images/logo-oxxo.png') }}" alt="OXXO">
                <p>Sistema de gestión integral para tiendas de conveniencia.</p>
            </div>
            <div class="footer-col">
                <h4>Atención al cliente</h4>
                <p>+51 908 721 547</p>
                <p>Lunes a Viernes 9:00 - 6:00 p.m.</p>
            </div>
            <div class="footer-col">
                <h4>Redes sociales</h4>
                <div class="social-icons">
                    <a href="#">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                    </a>
                    <a href="#">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            OXXO &copy; Derechos reservados {{ date('Y') }}
        </div>
    </footer>

</body>
</html>
