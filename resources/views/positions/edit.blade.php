@extends('master')
@section('title', 'Edit Data Jabatan')

@section('content')

{{-- Latar belakang blur dan Judul dari style baru --}}
<div class="px-6 py-24 sm:py-32 lg:px-8">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Edit Data Jabatan</h2>
        <p class="mt-2 text-lg/8 text-gray-600">Perbarui rincian data jabatan.</p>
    </div>

    {{-- Form dengan style baru, action ke 'positions.update' --}}
    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
        @csrf
        @method('PUT') {{-- Method PUT untuk update --}}

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

            {{-- Field Nama Jabatan (dibuat full-width) --}}
            <div class="sm:col-span-2">
                <label for="nama_jabatan" class="block text-sm/6 font-semibold text-gray-900">Nama Jabatan</label>
                <div class="mt-2.5">
                    <input id="nama_jabatan"
                        type="text"
                        name="nama_jabatan"
                        {{-- Value diisi dengan data $position yang ada --}}
                        value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('nama_jabatan')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Field Gaji Pokok (dibuat full-width) --}}
            <div class="sm:col-span-2">
                <label for="gaji_pokok" class="block text-sm/6 font-semibold text-gray-900">Gaji Pokok</label>
                <div class="mt-2.5">
                    <input id="gaji_pokok"
                        type="number"
                        name="gaji_pokok"
                        {{-- Value diisi dengan data $position yang ada --}}
                        value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                        step="0.01"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('gaji_pokok')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>

        {{-- Tombol Submit (warna emerald-800) --}}
        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-emerald-800 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-emerald-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                Update Jabatan
            </button>
        </div>
    </form>
</div>
@endsection