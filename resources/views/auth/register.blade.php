<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: black url('https://images.unsplash.com/photo-1721041879210-c2580ae0a8ed?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
            background-attachment: fixed;
            background-size: cover;
        }
        .glass-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            width: 400px;
            text-align: center;
            color: #fff;
        }
        .glass-container h2 { margin-bottom: 30px; font-weight: 800; font-size: 40px; }
        .input-group { margin-bottom: 20px; text-align: left; }
        .input-group label { display: block; margin-bottom: 8px; font-size: 17px; font-weight: 500; }
        .input-group input {
            width: 100%; padding: 12px; border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05); color: #fff; box-sizing: border-box; outline: none; transition: 0.3s;
        }
        .input-group input:focus { background: rgba(255, 255, 255, 0.15); border-color: rgba(255, 255, 255, 0.4); }
        .btn-register {
            width: 100%; padding: 14px; border: none; border-radius: 8px; background: #fff; color: #4e54c8;
            font-weight: 600; font-size: 16px; cursor: pointer; transition: 0.3s; margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="glass-container">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="name">User Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
                @error('name') <span style="color: #ff8e8e; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                @error('email') <span style="color: #ff8e8e; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Min 8 characters" required>
                @error('password') <span style="color: #ff8e8e; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" required>
            </div>
            <button type="submit" class="btn-register">Create Account</button>
        </form>
    </div>
</body>
</html>