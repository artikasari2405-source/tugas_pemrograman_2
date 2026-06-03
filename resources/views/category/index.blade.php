<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    {{-- Search Form --}}
    <form method="GET" action="{{ route('category.index') }}" class="d-flex gap-2 mb-3">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Cari kategori..." class="form-control w-25">
        <button type="submit" class="btn btn-success">Search</button>
    </form>

    <a class="btn btn-primary mb-3" href="{{ route('category.create') }}" role="button">Create</a>

    <table class="table table-bordered border-primary">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorys as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_kategori }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                    <td style="white-space: nowrap;">
                        <a class="btn btn-info btn-sm" href="{{ route('category.show', $item) }}" role="button">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('category.edit', $item) }}" role="button">Edit</a>
                        <form action="{{ route('category.destroy', $item) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus kategori ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Tidak ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    {{ $categorys->links() }}

</x-app>