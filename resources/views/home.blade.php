<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner {
            background-image: url('{{ asset('images/bgimg.webp') }}'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 100px 0;
        }

        .banner h1 {
            font-size: 3em;
            font-weight: bold;
            color:#fff;
        }

        .banner p {
            font-size: 1.25em;
            color:#fff;
        }

        .product-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
        }

        .contact-form {
            background-color: #f4f4f4;
            padding: 40px;
            border-radius: 8px;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .footer a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }

        .nav-link{
            color:#264a9f;
        }
    </style>
</head>
<body>

    <header class="bg-white text-white">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 150px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#banner">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#gallery">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section id="banner" class="banner">
        <div class="container">
            <h1>Welcome to Our Store!</h1>
            <p>Discover amazing products at the best prices.</p>
        </div>
    </section>

    <section id="gallery" class="container my-5">
        <h2 class="text-center mb-4">Our Products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                    <img 
    src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/placeholder.webp') }}" 
    class="card-img-top" 
    alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->detail, 100) }}</p>
                            <p class="card-text"><strong>${{ number_format($product->price, 2) }}</strong></p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact" class="container my-5">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 contact-form">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 My Website. All Rights Reserved.</p>
        <p>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </p>
    </footer>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
