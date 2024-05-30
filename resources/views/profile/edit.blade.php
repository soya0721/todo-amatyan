<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Adjust margin as needed */
}

.button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Adjust margin as needed */
}

input[type="submit"], .cancel-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 10px; /* Adjust margin between buttons as needed */
}

input[type="submit"]:hover, .cancel-button:hover {
    background-color: #45a049;
}

.cancel-button {
    text-decoration: none;
}

        .password-container {
    position: relative;
}

.password-container input[type="password"] {
    padding-right: 30px; /* Adjust padding to accommodate the eye icon */
}

.password-container .toggle-password {
    position: absolute;
    top: 50%;
    right: 5px; /* Adjust right spacing as needed */
    transform: translateY(-50%);
    cursor: pointer;
}

.password-container .toggle-password i {
    color: #777; /* Eye icon color */
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
        <h1>Edit Profile</h1>
        <div class="profile-info">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Current Password:</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" >
                        <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <div class="password-container">
                        <input type="password" id="new_password" name="new_password" value="">
                        <span class="toggle-password" onclick="togglePasswordVisibility('new_password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password:</label>
                    <div class="password-container">
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" value="">
                        <span class="toggle-password" onclick="togglePasswordVisibility('new_password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="button-container">
                    <input type="submit" value="Submit">
                    <a href="{{ route('profile.myPage') }}" class="cancel-button">Cancel</a>
                </div>
                
               
            </form>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var toggleButton = passwordField.nextElementSibling;
    
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordField.type = "password";
                toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>
    
    
</body>
</html>
