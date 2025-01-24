<!DOCTYPE html>
<html lang="id" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mendaftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="{{ asset('assets/img/sekolah/logo-smk.jpg') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Buat akun Anda</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-900">Nama Lengkap</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">Alamat email</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">Kata sandi</label>
                    <div class="mt-2 relative">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm"
                            placeholder="Enter your password">
                        <button type="button" id="togglePassword"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <i class="fa fa-eye text-gray-500"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Konfirmasi Kata
                        Sandi</label>
                    <div class="mt-2 relative">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            autocomplete="current-password" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm"
                            placeholder="Confirm your password">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <button type="button" id="togglePasswordConfirmation"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <i class="fa fa-eye text-gray-500"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Mendaftar
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Masuk
                    Disini</a>
            </p>
        </div>
    </div>
</body>

<script>
    // Toggle password visibility
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");

    togglePassword.addEventListener("click", function() {
        const type = passwordField.type === "password" ? "text" : "password";
        passwordField.type = type;

        const icon = togglePassword.querySelector("i");
        icon.classList.toggle("fa-eye");
        icon.classList.toggle("fa-eye-slash");
    });

    // Toggle password confirmation visibility
    const togglePasswordConfirmation = document.getElementById("togglePasswordConfirmation");
    const passwordConfirmationField = document.getElementById("password_confirmation");

    togglePasswordConfirmation.addEventListener("click", function() {
        const type = passwordConfirmationField.type === "password" ? "text" : "password";
        passwordConfirmationField.type = type;

        const icon = togglePasswordConfirmation.querySelector("i");
        icon.classList.toggle("fa-eye");
        icon.classList.toggle("fa-eye-slash");
    });
</script>

</html>
