<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="https://www.envobyte.com/_next/image/?url=https%3A%2F%2Fadmin.envobyte.com%2Fhome%2F1727781091-logo.webp&w=256&q=75" alt="Logo" width="200" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    {{--/ Navbar --}}
    
    {{-- Main content container --}}
    <div class="container mt-4">
        @yield('content')
    </div>
    {{--/ Main content container --}}

    {{-- Footer --}}
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Khan Iftekher Ahemd</h5>
                    <p class="text-muted mb-0">
                        <a href="mailto:khankhaniftekherahmed@gmail.com" class="text-dark">khaniftekherahmed@gmail.com</a> | 
                        <a href="tel:+8801910117659" class="text-dark">01910117659</a>                        
                    </p>
                </div>
            </div>
        </div>
    </footer>
    {{--/ Footer --}}
    
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Page Js --}}
    @yield('page_js')
    {{--/ Page Js --}}
</body>
</html>
