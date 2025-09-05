<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование профиля</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #f5f7fa;
            --card-color: #ffffff;
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --text-color: #333;
            --light-text: #667085;
            --border-color: #e4e7ec;
            --error-color: #f44336;
            --success-color: #10b981;
            --focus-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.5;
            min-height: 100vh;
        }

        /* Added header navigation styles */
        .header {
            background: var(--card-color);
            border-bottom: 1px solid var(--border-color);
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .logo {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--light-text);
            font-size: 14px;
        }

        .logout-btn {
            background: none;
            border: 1px solid var(--border-color);
            color: var(--text-color);
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background-color: var(--bg-color);
        }

        /* Updated main content to account for header */
        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 64px);
            padding: 20px;
        }

        .profile-container {
            background: var(--card-color);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 32px;
            width: 100%;
            max-width: 450px;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 32px;
        }

        .profile-img-container {
            position: relative;
            margin-bottom: 16px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .upload-overlay {
            position: absolute;
            bottom: 0;
            right: 0;
            background: var(--primary-color);
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .form-section {
            margin-bottom: 24px;
        }

        h2 {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
            color: var(--light-text);
        }

        input {
            width: 100%;
            padding: 12px 14px;
            font-size: 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.2s ease;
            color: var(--text-color);
            background-color: var(--card-color);
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: var(--focus-shadow);
        }

        input::placeholder {
            color: #a0aec0;
        }

        .error-message {
            font-size: 13px;
            color: var(--error-color);
            margin-top: 6px;
        }

        .section-divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 24px 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 12px 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .cancel-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: var(--light-text);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .cancel-link:hover {
            color: var(--text-color);
        }

        .icon {
            font-size: 18px;
        }
    </style>
</head>
<body>
<!-- Added navigation header -->
<header class="header">
    <nav class="nav-container">
        <a href="/" class="logo">FurnitureShop</a>
        <ul class="nav-links">
            <li><a href="/">Каталог</a></li>
            <li><a href="/cart">Корзина</a></li>
        </ul>
        <div class="user-menu">
            <div class="user-info">
                <span>Мой профиль</span>
            </div>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Выйти из аккаунта</button>
            </form>
        </div>
    </nav>
</header>

<!-- Wrapped form in main-content container -->
<main class="main-content">
    <form class="profile-container" action="/editProfile" method="POST">
        @csrf
        <div class="profile-header">
            <div class="profile-img-container">
                <img src="https://img.freepik.com/free-photo/portrait-white-man-isolated_53876-40306.jpg" alt="Фото профиля" class="profile-img">
                <div class="upload-overlay" title="Загрузить новое фото">
                    <span class="icon">+</span>
                </div>
            </div>
            <h2>Редактирование профиля</h2>
        </div>

        <div class="form-section">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" >
                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" >
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="section-divider"></div>

        <div class="form-section">
            <div class="form-group">
                <label for="password">Новый пароль (необязательно)</label>
                <input type="password" id="password" name="password" placeholder="Введите новый пароль">
                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_rpt">Повторите новый пароль</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Повторите новый пароль">
            </div>
        </div>

        <button type="submit" class="btn">Сохранить изменения</button>
        <a href="/profile" class="cancel-link">Отмена</a>
    </form>
</main>
</body>
</html>
