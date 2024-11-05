<!DOCTYPE html>
<html>
<head>
    <title>Welcome to ExpenseEase</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .hero-section {
            background: url('/images/hero-bg.jpg') no-repeat center center;
            background-size: cover;
            padding: 100px 0;
            color: #fff;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
        }
        .features-section {
            padding: 50px 0;
        }
        .features-section h2 {
            margin-bottom: 40px;
            text-align: center;
        }
        .features-section .feature-item {
            margin-bottom: 30px;
        }
        .features-section .feature-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">ExpenseEase</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="hero-section">
        <div class="container">
            <h1>Welcome to ExpenseEase</h1>
            <p>Your personal finance tracker.</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success btn-lg">Register</a>
        </div>
    </div>
    <div class="container features-section">
        <h2>About ExpenseEase</h2>
        <div class="row">
            <div class="col-md-4 text-center feature-item">
                <div class="feature-icon text-primary">
                    <i class="fas fa-wallet"></i>
                </div>
                <h4>Expense Tracking</h4>
                <p>Easily keep track of your expenses and manage your finances effectively.</p>
            </div>
            <div class="col-md-4 text-center feature-item">
                <div class="feature-icon text-success">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h4>Budget Management</h4>
                <p>Set budgets for different categories and stay on top of your spending.</p>
            </div>
            <div class="col-md-4 text-center feature-item">
                <div class="feature-icon text-warning">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h4>Financial Goals</h4>
                <p>Set financial goals and track your progress to achieve your dreams.</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
