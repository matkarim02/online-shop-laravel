<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница продукта</title>
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

        /* Added modern header with navigation like other pages */
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

        /* Completely redesigned main container with modern styling */
        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .product-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .product-header {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .product-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .product-header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .product-content {
            padding: 2rem;
        }

        .product-main {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .product-image-wrapper {
            background: #f8fafc;
            border-radius: 16px;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 400px;
            border: 1px solid #e2e8f0;
        }

        .product-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 12px;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .product-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .rating-section {
            background: #fef3c7;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            border-left: 4px solid #f59e0b;
        }

        .average-rating {
            font-size: 1.125rem;
            font-weight: 600;
            color: #92400e;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stars {
            color: #f59e0b;
            font-size: 1.25rem;
        }

        .product-description {
            font-size: 1.125rem;
            color: #64748b;
            line-height: 1.7;
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        /* Modern reviews section design */
        .reviews-section {
            background: #f8fafc;
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
        }

        .reviews-section h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .review {
            background: white;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-left: 4px solid #3b82f6;
            transition: all 0.2s ease;
        }

        .review:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }

        .review-author {
            font-weight: 600;
            color: #1e293b;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .review-date {
            font-weight: 400;
            font-size: 0.875rem;
            color: #64748b;
        }

        .review-text {
            font-size: 1rem;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .review-rating {
            font-size: 1rem;
            color: #f59e0b;
            font-weight: 500;
        }

        /* Modern review form with enhanced styling */
        .review-form {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
        }

        .review-form h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .review-form input,
        .review-form textarea,
        .review-form select {
            width: 100%;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .review-form input:focus,
        .review-form textarea:focus,
        .review-form select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .review-form textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            font-size: 1.125rem;
            font-weight: 600;
            padding: 0.875rem 2rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 15px -3px rgba(0, 0, 0, 0.2);
        }

        /* Added responsive design for mobile devices */
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

            .product-main {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .product-header h1 {
                font-size: 2rem;
            }

            .product-title {
                font-size: 1.5rem;
            }

            .main-content {
                padding: 0 0.5rem;
            }

            .product-content {
                padding: 1.5rem;
            }

            .reviews-section {
                padding: 1.5rem;
            }

            .review-form {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
<!-- Added header with navigation matching other pages -->
<header class="header">
    <div class="header-content">
        <div class="logo">
            <i class="fas fa-store"></i> FurnitureShop
        </div>
        <nav class="nav-links">
            <a href="/catalog" class="nav-link">
                <i class="fas fa-th-large"></i>
                <span>Каталог</span>
            </a>
            <a href="/cart" class="nav-link">
                <i class="fas fa-shopping-cart"></i>
                <span>Корзина</span>
            </a>
            <a href="/profile" class="nav-link">
                <i class="fas fa-user"></i>
                <span>Мой профиль</span>
            </a>
            <form action="/logout" method="POST">
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
    <div class="product-container">
        <!-- Added modern product header -->
        <div class="product-header">
            <h1><i class="fas fa-box-open"></i> Детали товара</h1>
            <p>Подробная информация о выбранном товаре</p>
        </div>

        <div class="product-content">
            <!-- Redesigned product layout with grid -->
            <div class="product-main">
                <div class="product-image-wrapper">
                    <img src="{{ $product->image_url }}" alt="Изображение товара" class="product-image">
                </div>

                <div class="product-info">
                    <h1 class="product-title">{{ $product->name }}</h1>

                    <div class="rating-section">
                        <div class="average-rating">
                            <i class="fas fa-star"></i>
                            Средняя оценка:
                            <span class="stars">
                                @php $avg = round($avgRating); @endphp
                                {{ str_repeat('★', $avg) }}
                                {{ str_repeat('☆', 5 - $avg) }}
                            </span>
                            ({{ number_format($avgRating, 1) }}/5)
                        </div>
                    </div>

                    <div class="product-description">
                        {{ $product->description }}
                    </div>
                </div>
            </div>

            <!-- Enhanced reviews section with modern design -->
            <div class="reviews-section">
                <h2><i class="fas fa-comments"></i> Отзывы покупателей</h2>

                @foreach ($product_reviews as $review)
                    <div class="review">
                        <div class="review-author">
                            <strong><i class="fas fa-user-circle"></i> {{ $review->author }}</strong>
                            <span class="review-date">
                            <i class="fas fa-calendar-alt"></i> {{ $review->created_at }}
                        </span>
                        </div>
                        <div class="review-text">{{ $review->text }}</div>
                        <div class="review-rating">
                            <i class="fas fa-star"></i> Оценка:
                            <span class="stars">
                            {{ str_repeat('★', $review->rating) }}
                                {{ str_repeat('☆', 5 - $review->rating) }}
                        </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modern review form with better UX -->
            <div class="review-form">
                <h3><i class="fas fa-edit"></i> Оставить отзыв</h3>
                <form action="/add-review" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="author" class="form-label">Ваше имя</label>
                        <input type="text" id="author" name="author" placeholder="Введите ваше имя" required>
                    </div>

                    <div class="form-group">
                        <label for="text" class="form-label">Ваш отзыв</label>
                        <textarea id="text" name="text" placeholder="Поделитесь своим мнением о товаре..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="rating" class="form-label">Ваша оценка</label>
                        <select name="rating" id="rating" required>
                            <option value="">Выберите оценку</option>
                            <option value="5">★★★★★ 5 — Отлично</option>
                            <option value="4">★★★★☆ 4 — Хорошо</option>
                            <option value="3">★★★☆☆ 3 — Нормально</option>
                            <option value="2">★★☆☆☆ 2 — Плохо</option>
                            <option value="1">★☆☆☆☆ 1 — Ужасно</option>
                        </select>
                    </div>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        Отправить отзыв
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
