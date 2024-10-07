<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Links</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/floating.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
        }

        header {
            background-color: whitesmoke;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header-left a {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: #00BFFF;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
        }

        nav ul li a {
            text-decoration: none;
            color: black;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #00BFFF;
        }

        .header-right .add-group-btn {
            background-color: #00BFFF;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .header-right .add-group-btn:hover {
            background-color: green;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 1rem;
            }

            header {
                flex-direction: column;
                text-align: center;
            }

            .header-right {
                margin-top: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="header-left">
            <a href="{{ route('home') }}">Social groups</a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('scripts') }}">Scripts</a></li>
                <li><a href="{{ route('whatsapp') }}">WhatsApp</a></li>
                <li><a href="{{ route('facebook') }}">Facebook</a></li>
                <li><a href="{{ route('telegram') }}">Telegram</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>

            </ul>
        </nav>
        <div class="header-right">
            < <a href="{{ route('groups.create') }}" class="add-group-btn" class="add-group-btn">Add My Group</a>
        </div>
    </header>
</body>

</html>
