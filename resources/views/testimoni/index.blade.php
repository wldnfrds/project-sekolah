<x-layout>
    <x-header></x-header>

    <div class="container my-5">
        <h1 class="mb-4 text-center">Berikan Testimoni Anda</h1>

        <form action="{{ route('testimoni.store') }}" method="POST" class="p-4 mx-auto rounded shadow-sm"
            style="max-width: 600px;">
            @csrf
            <div class="mb-3">
                <label for="author_name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name"
                    name="author_name" value="{{ old('author_name') }}" placeholder="Nama Anda">
                @error('author_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Isi Testimoni</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4"
                    placeholder="Tulis testimoni Anda di sini...">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="rating" id="rating1" value="1"
                        {{ old('rating') == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating1">
                        <i class="bi bi-star-fill text-warning"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="rating" id="rating2" value="2"
                        {{ old('rating') == 2 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="rating" id="rating3" value="3"
                        {{ old('rating') == 3 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="rating" id="rating4" value="4"
                        {{ old('rating') == 4 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating4">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="rating" id="rating5" value="5"
                        {{ old('rating') == 5 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rating5">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </label>
                </div>
                @error('rating')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary w-100">Kirim Testimoni</button>
        </form>
    </div>

    <x-footer></x-footer>
</x-layout>
