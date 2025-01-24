<!DOCTYPE html>
<html lang="id" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="h-full">
    <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="w-auto h-10 mx-auto" src="{{ asset('assets/img/sekolah/logo-smk.jpg') }}"
                alt="Smks Pasundan Cijulang">
            <h2 class="mt-10 text-2xl font-bold tracking-tight text-center text-gray-900">Masuk ke akun Anda</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- Success Alert -->
            @if (session('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8Zm0-14a6 6 0 1 0 6 6 6 6 0 0 0-6-6Z"></path>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            @if ($errors->any())
                <div class="mt-1 text-sm text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">Alamat email</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm"
                            placeholder="Enter your email">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-900">Kata sandi</label>

                    </div>
                    <div class="relative mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm"
                            placeholder="Enter your password">
                        <button type="button" id="togglePassword"
                            class="absolute transform -translate-y-1/2 right-3 top-1/2">
                            <i class="text-gray-500 fa fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Masuk
                    </button>
                </div>
            </form>

            <p class="mt-10 text-sm text-center text-gray-500">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Mendaftar
                    Di Sini</a>
            </p>
        </div>
    </div>
</body>

<script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");

    togglePassword.addEventListener("click", function() {
        // Toggle the type attribute
        const type = passwordField.type === "password" ? "text" : "password";
        passwordField.type = type;

        // Toggle the eye icon
        const icon = togglePassword.querySelector("i");
        icon.classList.toggle("fa-eye");
        icon.classList.toggle("fa-eye-slash");
    });
</script>

</html>
