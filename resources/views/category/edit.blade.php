<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="card shadow">

        <div class="card-header">
            <h4 class="mb-0">Edit Kategori</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('category.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Kode Kategori --}}
                <div class="mb-3">
                    <label class="form-label">Kode Kategori</label>

                    <input
                        type="text"
                        name="kode_kategori"
                        class="form-control @error('kode_kategori') is-invalid @enderror"
                        value="{{ old('kode_kategori', $category->kode_kategori) }}">

                    @error('kode_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Nama Kategori --}}
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>

                    <input
                        type="text"
                        name="nama_kategori"
                        class="form-control @error('nama_kategori') is-invalid @enderror"
                        value="{{ old('nama_kategori', $category->nama_kategori) }}">

                    @error('nama_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $category->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">
                    Update
                </button>

                <a href="{{ route('category.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>
</x-app>