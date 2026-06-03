<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search & Filter --}}
    <form method="GET" action="{{ route('product.index') }}" class="row mb-3">

        <div class="col-md-4">
            <input type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Cari Produk...">
        </div>

        <div class="col-md-3">
            <select name="category_id" class="form-select">
                <option value="">Semua Kategori</option>

                @foreach($categorys as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-auto">
            <button type="submit" class="btn btn-success">
                Search
            </button>
        </div>
    </form>

    <a class="btn btn-primary mb-3"
       href="{{ route('product.create') }}">
        Create
    </a>

    <table class="table table-bordered border-primary">

        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($products as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->kode_produk }}</td>

                    <td>{{ $item->nama_produk }}</td>

                    <td>{{ $item->category->nama_kategori }}</td>

                    <td>
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </td>

                    <td>{{ $item->stok }}</td>

                    <td style="white-space: nowrap;">

                        <a class="btn btn-info btn-sm"
                           href="{{ route('product.show', $item) }}">
                            Detail
                        </a>

                        <a class="btn btn-warning btn-sm"
                           href="{{ route('product.edit', $item) }}">
                            Edit
                        </a>

                        <form action="{{ route('product.destroy', $item) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin?')">
                                Delete
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Tidak ada data produk.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    {{-- Pagination --}}
    {{ $products->links() }}

</x-app>