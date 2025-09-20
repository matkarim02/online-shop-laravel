<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --background-gradient: linear-gradient(135deg, #6d28d9, #4f46e5, #2563eb);
            --background-color: #f9fafb;
            --text-color: #1f2937;
            --error-color: #ef4444;
            --border-color: #e5e7eb;
            --box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background: var(--background-gradient);
        }

        .container {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--box-shadow);
            padding: 40px;
            width: 100%;
            max-width: 460px;
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-color);
            font-size: 28px;
            text-align: center;
        }

        p {
            color: #6b7280;
            margin-bottom: 24px;
            font-size: 15px;
            text-align: center;
        }

        hr {
            border: none;
            height: 1px;
            background-color: var(--border-color);
            margin: 20px 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #374151;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            font-size: 15px;
            background-color: #f9fafb;
            transition: var(--transition);
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
            background-color: white;
        }

        input::placeholder {
            color: #9ca3af;
        }

        .error {
            color: var(--error-color);
            font-size: 13px;
            margin-top: 6px;
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
        }

        a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        .registerbtn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--radius);
            padding: 14px 24px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            font-weight: 500;
            transition: var(--transition);
        }

        .registerbtn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(79, 70, 229, 0.3);
        }

        .signin {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: #6b7280;
        }

        @media (max-width: 480px) {
            .container {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
<form action="{{route('post.signUp')}}" method="POST">
    @csrf

    <div class="container">
        <h1>Регистрация</h1>
        <p>Создайте аккаунт за пару секунд</p>
        <hr>

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" placeholder="Введите имя" id="name" required>
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input type="email" name="email" placeholder="Введите email" id="email" required>
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="psw">Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль" id="password" required>
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="psw_repeat">Повторите пароль</label>
            <input type="password" name="password_confirmation" placeholder="Повторите пароль" id="password_confirmation" required>
        </div>

        <hr>
        <p>Создавая аккаунт, вы соглашаетесь с нашими <a href="#">Правилами и Политикой конфиденциальности</a>.</p>
        <button type="submit" class="registerbtn">Зарегистрироваться</button>

        <div class="signin">
            <p>Уже есть аккаунт? <a href="/login">Войти</a></p>
        </div>
    </div>
</form>
</body>
</html>
