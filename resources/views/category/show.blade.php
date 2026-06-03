<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="card shadow mb-4">

        <div class="card-header">
            <h4 class="mb-0">Detail Kategori</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="25%">Kode Kategori</th>
                    <td>{{ $category->kode_kategori }}</td>
                </tr>

                <tr>
                    <th>Nama Kategori</th>
                    <td>{{ $category->nama_kategori }}</td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $category->deskripsi }}</td>
                </tr>

            </table>

            <a href="{{ route('category.index') }}"
                class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

    {{-- Produk yang Berelasi --}}
    <div class="card shadow">

        <div class="card-header">
            <h5 class="mb-0">
                Daftar Produk pada Kategori
                "{{ $category->nama_kategori }}"
            </h5>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($category->products as $product)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $product->kode_produk }}</td>

                            <td>{{ $product->nama_produk }}</td>

                            <td>
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </td>

                            <td>{{ $product->stok }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada produk pada kategori ini.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app>