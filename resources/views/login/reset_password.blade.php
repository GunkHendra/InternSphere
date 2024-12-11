<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
        <h1 class="text-xl font-bold text-gray-700 text-center mb-6">Reset Password</h1>

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
        <form action="/resetPassword" method="POST">
            @csrf
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                    placeholder="Enter new password"
                    minlength="8"
                    required
                >
                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                    placeholder="Confirm your new password"
                    minlength="8"
                    required
                >
                @error('password_confirmation')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Reset Password</button>
        </form>

        <div class="text-center mt-4">
            <small class="text-gray-500">Remember your password? <a href="/login" class="text-blue-500">Go back to login</a></small>
        </div>
    </div>
</body>
</html>
