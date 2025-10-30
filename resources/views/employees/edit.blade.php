@extends('master')
@section('title', 'Edit Data Pegawai')

@section('content')

<div class="py-6 sm:py-16 lg:px-8 max-w-4xl mx-auto mt-5">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Edit Data Pegawai</h2>
        <p class="mt-2 text-lg/8 text-gray-600">Perbarui data pegawai di bawah ini.</p>
    </div>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

            <div>
                <label for="nama_lengkap" class="block text-sm/6 font-semibold text-gray-900">Nama lengkap</label>
                <div class="mt-2.5">
                    <input id="nama_lengkap" type="text" name="nama_lengkap"
                        {{-- Value diisi dengan data $employee --}}
                        value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('nama_lengkap') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="tanggal_lahir" class="block text-sm/6 font-semibold text-gray-900">Tanggal lahir</label>
                <div class="mt-2.5">
                    <input id="tanggal_lahir" type="date"
                        name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('tanggal_lahir') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                <div class="mt-2.5">
                    <input id="email" type="email" name="email"
                        value="{{ old('email', $employee->email) }}"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="nomor_telepon" class="block text-sm/6 font-semibold text-gray-900">Nomor telepon</label>
                <div class="mt-2.5">
                    <input id="nomor_telepon" type="text" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                        placeholder="081234567890"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('nomor_telepon') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="alamat" class="block text-sm/6 font-semibold text-gray-900">Alamat</label>
                <div class="mt-2.5">
                    {{-- Value untuk textarea ada di dalam tag --}}
                    <textarea id="alamat" name="alamat" rows="4"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">{{ old('alamat', $employee->alamat) }}</textarea>
                </div>
                @error('alamat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="departemen_id" class="block text-sm/6 font-semibold text-gray-900">Departemen</label>
                <div class="mt-2.5">
                    <select name="departemen_id" id="departemen_id" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        <option value="">Pilih Departemen</option>
                        @foreach($departments as $department)
                        {{-- Logika 'selected' untuk data yang sudah tersimpan --}}
                        <option value="{{ $department->id }}" {{ old('departemen_id', $employee->departemen_id) == $department->id ? 'selected' : '' }}>
                            {{ $department->nama_departemen }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('departemen_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="jabatan_id" class="block text-sm/6 font-semibold text-gray-900">Jabatan</label>
                <div class="mt-2.5">
                    <select name="jabatan_id" id="jabatan_id" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        <option value="">Pilih Jabatan</option>
                        @foreach($positions as $position)
                        {{-- Logika 'selected' untuk data yang sudah tersimpan --}}
                        <option value="{{ $position->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                            {{ $position->nama_jabatan }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('jabatan_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="tanggal_masuk" class="block text-sm/6 font-semibold text-gray-900">Tanggal Masuk</label>
                <div class="mt-2.5">
                    <input id="tanggal_masuk" type="date" name="tanggal_masuk"
                        value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('tanggal_masuk') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="status" class="block text-sm/6 font-semibold text-gray-900">Status</label>
                <div class="mt-2.5">
                    <select name="status" id="status" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        {{-- Logika 'selected' untuk data yang sudah tersimpan --}}
                        <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status', $employee->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                @error('status') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

        </div>

        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-emerald-800 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-emerald-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update Pegawai
            </button>
        </div>
    </form>
</div>
@endsection