<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            color: #1e293b;
        }

        /* Added header with profile and logout */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3b82f6;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            color: #64748b;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background: #f1f5f9;
            color: #3b82f6;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        /* Updated main container styling */
        .main-content {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .cart-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .cart-header {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .cart-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .cart-subtitle {
            opacity: 0.9;
            font-size: 1rem;
        }

        .cart-content {
            padding: 2rem;
        }

        /* Improved cart item design */
        .cart-item {
            display: grid;
            grid-template-columns: 120px 1fr auto auto auto;
            align-items: center;
            gap: 1.5rem;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fafafa;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }

        .cart-item:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.1);
        }

        .cart-item img {
            width: 120px;
            height: 120px;
            border-radius: 8px;
            object-fit: cover;
            background: white;
            border: 1px solid #e2e8f0;
        }

        .cart-details h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1e293b;
        }

        .cart-details p {
            color: #64748b;
            font-size: 0.875rem;
            line-height: 1.4;
        }

        /* Modern quantity input styling */
        .quantity-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-input {
            width: 60px;
            padding: 0.5rem;
            text-align: center;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .quantity-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .price {
            font-weight: 700;
            font-size: 1.25rem;
            color: #059669;
        }

        /* Updated remove button */
        .remove-btn {
            background: #fef2f2;
            color: #ef4444;
            border: 1px solid #fecaca;
            padding: 0.75rem;
            cursor: pointer;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-btn:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
        }

        /* Enhanced checkout section */
        .checkout-section {
            background: #f8fafc;
            padding: 2rem;
            border-top: 1px solid #e2e8f0;
            margin-top: 1rem;
        }

        .checkout-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
        }

        .checkout-btn {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .checkout-btn:hover {
            background: linear-gradient(135deg, #047857 0%, #065f46 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 15px -3px rgba(0, 0, 0, 0.2);
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .header-content {
                padding: 0 1rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .nav-link span {
                display: none;
            }

            .cart-item {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 1rem;
            }

            .checkout-container {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
<!-- Added header with navigation -->
<header class="header">
    <div class="header-content">
        <div class="logo">
            <i class="fas fa-store"></i> Магазин
        </div>
        <nav class="nav-links">
            <a href="/catalog" class="nav-link">
                <i class="fas fa-th-large"></i>
                <span>Каталог</span>
            </a>
            <a href="/profile" class="nav-link">
                <i class="fas fa-user"></i>
                <span>Мой профиль</span>
            </a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Выйти</span>
                </button>
            </form>
        </nav>
    </div>
</header>

<main class="main-content">
    <div class="cart-container">
        <!-- Enhanced cart header -->
        <div class="cart-header">
            <h1 class="cart-title">
                <i class="fas fa-shopping-cart"></i> Корзина
            </h1>
            <p class="cart-subtitle">Проверьте ваши товары перед оформлением заказа</p>
        </div>

        <div class="cart-content">
            @foreach($userProducts as $userProduct)
            <div class="cart-item">
                <img src="{{ $userProduct->product->image_url }}" alt="{{ $userProduct->product->name }}">
                <div class="cart-details">
                    <h3>{{ $userProduct->product->name }}</h3>
                    <p>{{ $userProduct->product->description }}</p>
                </div>
                <div class="quantity-container">
                    <input type="number" class="quantity-input" id="amount" value="{{ $userProduct->amount }}" min="1">
                </div>
                <div class="price">{{ $userProduct->product->price }}тг</div>
                <button class="remove-btn" title="Удалить товар">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            @endforeach
        </div>

        <!-- Enhanced checkout section -->
        <div class="checkout-section">
            <div class="checkout-container">
                <div class="total-price">
                    Итого: {{ $total }} тг
                </div>
                <button class="checkout-btn" onclick="window.location.href='/create-order'">
                    <i class="fas fa-credit-card"></i>
                    Оформить заказ
                </button>
            </div>
        </div>
    </div>
</main>
</body>
</html>
