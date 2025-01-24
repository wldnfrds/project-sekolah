<x-layout>
    <x-header></x-header>
    <div class="flex justify-center mt-5">
        <table class="table table-bordered border-primary mx-auto w-50">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama lengkap</th>
                    <th>Alamat</th>
                    <th>Asal Sekolah</th>
                    <th>No Telepon</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $formSubmit)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $formSubmit->full_name }}</td>
                        <td>{{ $formSubmit->address }}</td>
                        <td>{{ $formSubmit->previous_school }}</td>
                        <td>{{ $formSubmit->phone_number }}</td>
                        <td>{{ $formSubmit->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-footer></x-footer>
</x-layout>
