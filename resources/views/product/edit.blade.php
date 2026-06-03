<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="card shadow">

        <div class="card-header">
            <h4 class="mb-0">Edit Produk</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('product.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Category --}}
                <div class="mb-3">
                    <label class="form-label">Kategori</label>

                    <select name="category_id" class="form-select">

                        @foreach($categorys as $category)

                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>

                                {{ $category->nama_kategori }}

                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- Kode Produk --}}
                <div class="mb-3">
                    <label class="form-label">Kode Produk</label>

                    <input type="text"
                        name="kode_produk"
                        class="form-control"
                        value="{{ old('kode_produk', $product->kode_produk) }}">
                </div>

                {{-- Nama Produk --}}
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>

                    <input type="text"
                        name="nama_produk"
                        class="form-control"
                        value="{{ old('nama_produk', $product->nama_produk) }}">
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label class="form-label">Harga</label>

                    <input type="number"
                        name="harga"
                        class="form-control"
                        value="{{ old('harga', $product->harga) }}">
                </div>

                {{-- Stok --}}
                <div class="mb-3">
                    <label class="form-label">Stok</label>

                    <input type="number"
                        name="stok"
                        class="form-control"
                        value="{{ old('stok', $product->stok) }}">
                </div>

                <button type="submit" class="btn btn-warning">
                    Update
                </button>

                <a href="{{ route('product.index') }}"
                    class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</x-app>