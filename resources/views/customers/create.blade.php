<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nama_customer" class="form-label">Nama Customer</label>
            <input type="text"
                class="form-control @error('nama_customer') is-invalid @enderror"
                id="nama_customer"
                name="nama_customer"
                value="{{ old('nama_customer') }}">

            @error('nama_customer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea
                class="form-control @error('alamat') is-invalid @enderror"
                id="alamat"
                name="alamat"
                rows="3">{{ old('alamat') }}</textarea>

            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text"
                class="form-control @error('nomor_telepon') is-invalid @enderror"
                id="nomor_telepon"
                name="nomor_telepon"
                value="{{ old('nomor_telepon') }}">

            @error('nomor_telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number"
                class="form-control @error('umur') is-invalid @enderror"
                id="umur"
                name="umur"
                value="{{ old('umur') }}">

            @error('umur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select
                class="form-select @error('status') is-invalid @enderror"
                id="status"
                name="status">

                <option value="">-- Pilih Status --</option>
                <option value="Member" {{ old('status') == 'Member' ? 'selected' : '' }}>
                    Member
                </option>
                <option value="Non Member" {{ old('status') == 'Non Member' ? 'selected' : '' }}>
                    Non Member
                </option>
            </select>

            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('customers.index') }}" role="button">
            Cancel
        </a>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>

</x-app>