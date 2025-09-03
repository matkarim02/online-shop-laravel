<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            color: #334155;
        }

        .header {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: #0f172a;
        }

        .logout-btn {
            background: #dc2626;
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .logout-btn:hover {
            background: #b91c1c;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2rem;
            text-align: center;
        }

        .card-deck {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            transition: box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: #ef4444;
            color: white;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            text-align: center;
            position: absolute;
            top: 1rem;
            right: 1rem;
            border-radius: 20px;
            z-index: 10;
        }

        .card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            background: #f8fafc;
            padding: 1rem;
        }

        .card-body {
            padding: 1.5rem;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-text {
            font-size: 1.25rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 0.5rem;
        }

        .card-title {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 1rem;
            line-height: 1.4;
            flex-grow: 1;
        }

        .card-footer {
            background: #f1f5f9;
            padding: 1rem 1.5rem;
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            color: #059669;
        }

        .product-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .form-button {
            width: 40px;
            height: 40px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1.25rem;
            font-weight: 600;
            color: #374151;
            background: white;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-button:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }

        .amount-field {
            width: 60px;
            text-align: center;
            padding: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: white;
            color: #374151;
        }

        .go-to-cart {
            padding: 1rem 1.5rem;
            background: white;
        }

        .go-to-cart .form-button {
            width: 100%;
            height: 48px;
            border-radius: 6px;
            background: #3b82f6;
            color: white;
            border: none;
            font-size: 1rem;
        }

        .go-to-cart .form-button:hover {
            background: #2563eb;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                padding: 0 1rem;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .container {
                padding: 1rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .card-deck {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .product-controls {
                gap: 0.5rem;
                padding: 0.75rem;
            }

            .form-button {
                width: 36px;
                height: 36px;
                font-size: 1rem;
            }

            .amount-field {
                width: 50px;
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>
<header class="header">
    <div class="header-content">
        <div class="nav-links">
            <a href="/profile">Мой профиль</a>
            <a href="/cart">Корзина</a>
        </div>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Выйти</button>
        </form>
    </div>
</header>

<div class="container">
    <h1 class="page-title">Каталог товаров</h1>
    <div class="card-deck">
        @foreach($newProducts as $product)
            <div class="card">
                <div class="card-header">Hit!</div>
                <img class="card-img-top" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                <div class="card-body">
                    <h2 class="card-text">{{ $product->name }}</h2>
                    <p class="card-title">{{ $product->description }}</p>
                </div>
                <div class="card-footer">
                    {{ $product->price }}
                </div>

                <div class="product-controls">
                    <form class="cart-decreaser" method="POST" onsubmit="return false">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="amount" class="amount-field" value="1">
                        <button type="submit" class="form-button">−</button>
                    </form>

                    <span class="amount-field">{{ $product->user_product->amount }}</span>

                    <form class="cart-increase" method="POST" onsubmit="return false">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="amount" class="amount-field" value="1">
                        <button type="submit" class="form-button">+</button>
                    </form>
                </div>

                <div class="go-to-cart">
                    <form action="/product" method="POST">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="form-button">Перейти</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // console.log($(this).serialize());

        $('.cart-increase').submit(function(e) {
            e.preventDefault(); // предотвращаем перезагрузку страницы

            $.ajax({
                type: "POST",
                url: "/cart-increase",
                data: $(this).serialize(), // например: product_id=1&amount=10
                dataType: 'json',
                success: function(response) {
                    console.log('test');
                    // Обновляем количество товаров в бейдже корзины
                    $('.amount-field').text(response.amount);
                },
                error: function(xhr, status, error) {
                    console.error('Ошибка при добавлении товара:', error);
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        // console.log($(this).serialize());

        $('.cart-decreaser').submit(function(e) {
            e.preventDefault(); // предотвращаем перезагрузку страницы

            $.ajax({
                type: "POST",
                url: "/cart-decrease",
                data: $(this).serialize(), // например: product_id=1&amount=10
                dataType: 'json',
                success: function(response) {
                    console.log('test');
                    // Обновляем количество товаров в бейдже корзины
                    $('.amount-field').text(response.amount);
                },
                error: function(xhr, status, error) {
                    console.error('Ошибка при добавлении товара:', error);
                }
            });
        });
    });
</script>

</body>
</html>





