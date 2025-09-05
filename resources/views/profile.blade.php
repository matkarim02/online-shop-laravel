<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e293b;
            --accent-color: #3b82f6;
            --bg-color: #f8fafc;
            --card-color: #ffffff;
            --text-color: #334155;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --border-radius: 16px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Added navigation header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: var(--accent-color);
        }

        .nav-link.active {
            color: var(--accent-color);
        }

        /* Updated main container layout */
        .main-container {
            max-width: 500px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .profile-container {
            background: var(--card-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 3rem;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        /* Enhanced profile image styling */
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--accent-color);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
            margin-bottom: 1.5rem;
        }

        h2 {
            color: var(--primary-color);
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .user-status {
            color: var(--text-muted);
            font-size: 0.875rem;
            margin-bottom: 2rem;
        }

        /* Improved profile info section */
        .profile-info {
            text-align: left;
            margin: 2rem 0;
            background: var(--bg-color);
            border-radius: 12px;
            padding: 1.5rem;
        }

        .info-item {
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-item:first-child {
            padding-top: 0;
        }

        .info-label {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .info-value {
            font-size: 0.875rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Enhanced button styling */
        .btn {
            display: block;
            width: 100%;
            text-decoration: none;
            padding: 0.875rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 0.75rem;
            border: none;
            text-align: center;
        }

        .primary-btn {
            background: var(--accent-color);
            color: white;
        }

        .primary-btn:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.2);
        }

        .logout-btn {
            background: transparent;
            color: #dc2626;
            border: 1px solid #fecaca;
            width: 100%;
            padding: 0.875rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: #fef2f2;
            border-color: #fca5a5;
            transform: translateY(-1px);
        }

        /* Added responsive design */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 1rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .main-container {
                margin: 2rem auto;
                padding: 0 1rem;
            }

            .profile-container {
                padding: 2rem;
            }

            .profile-img {
                width: 100px;
                height: 100px;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<!-- Added navigation header -->
<header class="header">
    <div class="nav-container">
        <!-- Заменил "Каталог" на логотип компании -->
        <a href="/" class="logo">FurnitureShop</a>
        <nav class="nav-links">
            <!-- Заменил "Главная" на "Каталог" -->
            <a href="/catalog" class="nav-link">Каталог</a>
            <a href="/cart" class="nav-link">Корзина</a>
            <a href="/profile" class="nav-link active">Профиль</a>
        </nav>
    </div>
</header>

<!-- Updated main container structure -->
<div class="main-container">
    <div class="profile-container">
        <img src="https://img.freepik.com/free-photo/portrait-white-man-isolated_53876-40306.jpg" alt="Фото профиля" class="profile-img">
        <h2>{{ $user->name }}</h2>
        <div class="user-status">Активный пользователь</div>

        <div class="profile-info">
            <div class="info-item">
                <span class="info-label">Email адрес</span>
                <span class="info-value">{{ $user->email }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Статус аккаунта</span>
                <span class="info-value">Активный</span>
            </div>
            <div class="info-item">
                <span class="info-label">Дата регистрации</span>
                <span class="info-value">{{ $user->created_at->format('d.m.Y') }}</span>
            </div>
        </div>

        <a href="/editProfile" class="btn primary-btn">Редактировать профиль</a>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Выйти из аккаунта</button>
        </form>
    </div>
</div>
</body>
</html>
