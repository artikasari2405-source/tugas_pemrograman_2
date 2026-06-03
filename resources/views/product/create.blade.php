<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="card shadow">

        <div class="card-header">
            <h4 class="mb-0">Tambah Produk</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('product.store') }}" method="POST">
                @csrf

                {{-- Category --}}
                <div class="mb-3">
                    <label class="form-label">
                        Kategori
                    </label>

                    <select name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">

                        <option value="">
                            Pilih Kategori
                        </option>

                        @foreach($categorys as $category)

                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                {{ $category->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Kode Produk --}}
                <div class="mb-3">
                    <label class="form-label">
                        Kode Produk
                    </label>

                    <input type="text"
                           name="kode_produk"
                           value="{{ old('kode_produk') }}"
                           class="form-control @error('kode_produk') is-invalid @enderror">

                    @error('kode_produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Nama Produk --}}
                <div class="mb-3">
                    <label class="form-label">
                        Nama Produk
                    </label>

                    <input type="text"
                           name="nama_produk"
                           value="{{ old('nama_produk') }}"
                           class="form-control @error('nama_produk') is-invalid @enderror">

                    @error('nama_produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label class="form-label">
                        Harga
                    </label>

                    <input type="number"
                           name="harga"
                           value="{{ old('harga') }}"
                           class="form-control @error('harga') is-invalid @enderror">

                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Stok --}}
                <div class="mb-3">
                    <label class="form-label">
                        Stok
                    </label>

                    <input type="number"
                           name="stok"
                           value="{{ old('stok') }}"
                           class="form-control @error('stok') is-invalid @enderror">

                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('product.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</x-app>