<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
        <h1 class="text-xl font-bold text-gray-700 text-center mb-6">Forgot Password</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form -->
        <form action="/sendOtp" method="POST">
            @csrf
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your email" required>
                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Send OTP</button>
        </form>

        <div class="text-center mt-4">
            <small class="text-gray-500">Remember your password? <a href="/login" class="text-blue-500">Go back to login</a></small>
        </div>
    </div>
</body>
</html>
