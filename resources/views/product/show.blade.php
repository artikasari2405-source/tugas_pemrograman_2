<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="card shadow">

        <div class="card-header">
            <h4 class="mb-0">Detail Produk</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="30%">Kode Produk</th>
                    <td>{{ $product->kode_produk }}</td>
                </tr>

                <tr>
                    <th>Nama Produk</th>
                    <td>{{ $product->nama_produk }}</td>
                </tr>

                <tr>
                    <th>Kategori</th>
                    <td>{{ $product->category->nama_kategori }}</td>
                </tr>

                <tr>
                    <th>Harga</th>
                    <td>
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th>Stok</th>
                    <td>{{ $product->stok }}</td>
                </tr>

                <tr>
                    <th>Deskripsi Kategori</th>
                    <td>{{ $product->category->deskripsi }}</td>
                </tr>

            </table>

            <a href="{{ route('product.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('product.edit', $product) }}"
               class="btn btn-warning">
                Edit
            </a>

        </div>

    </div>

</x-app>