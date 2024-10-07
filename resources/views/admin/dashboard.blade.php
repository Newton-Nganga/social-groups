@props(['analytics'=>[]])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>social-groups</title>
    <link rel="stylesheet" href="styles/dashboard.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .navbar {
            background-color: #007bff;
            color: white;
            display: flex;
            justify-content: space-between;
            padding: 1rem 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar h1 {
            font-size: 1.5rem;
        }

        .profile-icon {
            position: relative;
            cursor: pointer;
        }

        .profile-icon img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .dropdown {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            z-index: 1000;
        }

        .dropdown ul {
            list-style: none;
            padding: 1rem;
        }

        .dropdown ul li {
            margin-bottom: 0.5rem;
        }

        .dropdown ul li a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        .dropdown ul li a:hover {
            color: green;
        }

        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 1rem;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 1rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 1rem;
            text-align: center;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: green;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        .main-content h2 {
            margin-bottom: 1rem;
            color: #007bff;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-bottom: 1rem;
            color: #333;
        }

        .card p {
            color: #666;
        }

        .logout {
            color: red;
            cursor: pointer;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .logout:hover {
            color: darkred;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Admin Dashboard</h1>
        <div class="profile-icon" onclick="toggleDropdown()">
            <img src="images/whatsapp.png" alt="Profile Icon">
            <div class="dropdown" id="dropdown">
                <ul>
                    <li><strong>Name:</strong> John Doe</li>
                    <li><strong>Email:</strong> johndoe@example.com</li>
                    <li><a href="#" onclick="resetPassword()">Reset Password</a></li>
                    <li><a href="/logout" class="logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sidebar">
        
        <ul>
            <li><a href="{{ route('admin.groups.index') }}">All Groups</a></li>
            <li><a href="{{ route('admin.create_script') }}">Scripts</a></li>
            <li><a href="{{ route('whatsapp') }}">WhatsApp</a></li>
            <li><a href="{{ route('facebook') }}">Facebook</a></li>
            <li><a href="{{ route('telegram') }}">Telegram</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('groups.create') }}">Add Group</a></li>
            <li><a href="{{route('analytics.index')}}">Analytics</a></li>
            <li><a href="{{route('home')}}">logout</a></li>
        </ul>
    </div>

    <div class="main-content">
    <h2>Welcome, Admin!</h2>
    <div class="card">
        <h3>Recent Activities</h3>
        <p>Here you can view the recent activities of the social groups.</p>
    </div>
    <div class="card">
        <h3>Manage Groups</h3>
        <p>View, edit, and delete groups as needed.</p>
    </div>
    <div class="card">
        <h3>User Management</h3>
        <p>Manage user accounts and permissions.</p>
    </div>

    <!-- User Device Analytics Section -->
    <div class="card">
        <h3>User Device Analytics</h3>
        <table>
            <thead>
                <tr>
                    <th>Device Type</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($analytics as $data)
                <tr>
                    <td>{{ $data->device_type }}</td>
                    <td>{{ $data->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


{{-- @include('layouts.footer') --}}