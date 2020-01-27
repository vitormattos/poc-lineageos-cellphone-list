<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $page->title }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ $page->baseUrl }}{{ mix('css/main.css', 'assets/build') }}">
        <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
            <div class="container">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
              <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ $page->baseUrl }}/"><strong> <i class="fa fa-bars"></i> &nbsp;  Home</strong></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ $page->baseUrl }}/about">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ $page->baseUrl }}/login">Login</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        <section class="section-pagetop bg">
            <div class="container">
                <h2 class="title-page">Cell phones with LineageOS</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ $page->baseUrl }}/" aria-current="page">Home</a></li>
                        @if ($page->getPath() != '/')
                            <li class="breadcrumb-item">
                                {{ $page->title }}
                            </li>
                        @endif
                    </ol>
                </nav>
            </div>
        </section>

        @yield('body')
        <footer class="section-footer border-top bg">
            <div class="container">
                <section class="footer-top  padding-y">
                    <div class="row">
                        <aside class="col-md col-6">
                            <h6 class="title">Brands</h6>
                            <ul class="list-unstyled">
                                <li> <a href="#">Adidas</a></li>
                                <li> <a href="#">Puma</a></li>
                                <li> <a href="#">Reebok</a></li>
                                <li> <a href="#">Nike</a></li>
                            </ul>
                        </aside>
                        <aside class="col-md col-6">
                            <h6 class="title">Company</h6>
                            <ul class="list-unstyled">
                                <li> <a href="#">About us</a></li>
                                <li> <a href="#">Career</a></li>
                                <li> <a href="#">Find a store</a></li>
                                <li> <a href="#">Rules and terms</a></li>
                                <li> <a href="#">Sitemap</a></li>
                            </ul>
                        </aside>
                        <aside class="col-md col-6">
                            <h6 class="title">Help</h6>
                            <ul class="list-unstyled">
                                <li> <a href="#">Contact us</a></li>
                                <li> <a href="#">Money refund</a></li>
                                <li> <a href="#">Order status</a></li>
                                <li> <a href="#">Shipping info</a></li>
                                <li> <a href="#">Open dispute</a></li>
                            </ul>
                        </aside>
                        <aside class="col-md col-6">
                            <h6 class="title">Account</h6>
                            <ul class="list-unstyled">
                                <li> <a href="#"> User Login </a></li>
                                <li> <a href="#"> User register </a></li>
                                <li> <a href="#"> Account Setting </a></li>
                                <li> <a href="#"> My Orders </a></li>
                            </ul>
                        </aside>
                        <aside class="col-md">
                            <h6 class="title">Social</h6>
                            <ul class="list-unstyled">
                                <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
                                <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
                                <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
                                <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
                            </ul>
                        </aside>
                    </div>
                </section>
                <section class="footer-bottom row">
                    <div class="col-md-4">
                        <p class="text-muted"> © {{ date('Y')}} Vitor Mattos </p>
                    </div>
                    <div class="col-md-8 text-md-center">
                        <span class="px-2">Content usage terms <a target="_blank" href="https://creativecommons.org/licenses/by-sa/3.0/deed.pt_BR">CC-BY-SA</a></span>
                        <span class="px-2">Made with ❤️ using <a href="https://jigsaw.tighten.co" target="_blank">Jigsaw</a> and
                        <a target="_blank" href="https://getbootstrap.com/">Bootstrap</a></span>
                    </div>
                </section>
            </div>
        </footer>
        <script src="{{ $page->baseUrl }}{{ mix('js/main.js', 'assets/build') }}"></script>
        @yield('js')
    </body>
</html>
