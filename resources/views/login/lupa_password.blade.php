<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
        <h1 class="text-xl font-bold text-gray-700 text-center mb-6">Forgot Password</h1>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="/forgot-password" method="POST">
            @csrf
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your email" required>
                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                Send Reset Link
            </button>
        </form>
    </div>
</body>
</html>
