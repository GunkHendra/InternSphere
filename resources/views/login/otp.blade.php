<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white w-full max-w-md rounded-lg shadow-md p-6 space-y-4">
        <h1 class="text-2xl font-bold text-gray-700 text-center">Enter OTP</h1>
        <p class="text-sm text-gray-600 text-center">
            Please enter the 6-digit code sent to your email.
        </p>
        @if (session('error'))
            <div class="bg-red-100 text-red-600 p-3 rounded">
                {{ session('error') }}
            </div>
        @endif
        <form action="/verifyOtp" method="POST" class="space-y-4">
            @csrf
            <div class="mb-6">
                <label for="otp" class="block text-sm font-medium text-gray-700 mb-2">OTP</label>
                <input type="text" id="otp" name="otp" maxlength="6"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="Enter the 6-digit OTP" required>
                @error('otp')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                Verify OTP
            </button>
        </form>
    </div>
</body>
</html>
