<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('customers.create') }}" role="button">Create</a>

    <table class="table table-bordered border-primary">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Umur</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($customers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_customer }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->status }}</td>
                    <td><a class="btn btn-warning btn-sm" href="{{ route('customers.edit', $item) }}" role="button">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app>