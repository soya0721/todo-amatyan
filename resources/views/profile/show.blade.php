<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .profile-info {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .profile-info h2 {
            margin-bottom: 10px;
        }
        .profile-info p {
            margin: 5px 0;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header class="bg-blue-300 p-4">
        <nav class="flex justify-between mxauto  items-center">
            <div class="text-4xl font-serif"><a href="{{ route('posts.index') }}">Amatyan</a></div>
            <div class="space-x-12 font-bold">
                <a href="{{ route('profile.myPage') }}" class="hover:text-green-200 transition-all durtaion-300">マイページ</a>
               
                    <a class="dropdown-item hover:text-green-200 transition-all durtaion-300" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        ログイン＆ログアウト
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                
                {{-- <a href="" class="hover:text-green-200 transition-all durtaion-300">ログイン＆ログアウト</a> --}}

            </div>
        </nav>
    </header>
    <div class="container">
       
        <h1>{{ $user->name }} Profile</h1>
        <div class="profile-info">
            <h2></h2>
         
            <form action="{{ route('profile.edit') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" disabled required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}"disabled required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="{{ $user->password }}" disabled>
                </div>
                <input type="submit" value="Edit Profile">
                
            </form>
        </div>
    </div>
</body>
</html>
