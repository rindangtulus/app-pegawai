@extends('master')
@section('title', 'Edit Data Absensi')

@section('content')

<div class="px-6 py-24 sm:py-32 lg:px-8">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Edit Data Absensi</h2>
        <p class="mt-2 text-lg/8 text-gray-600">Perbarui data absensi karyawan.</p>
    </div>

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

            <div>
                <label for="karyawan_id" class="block text-sm/6 font-semibold text-gray-900">Nama Karyawan</label>
                <div class="mt-2.5">
                    <select name="karyawan_id" id="karyawan_id" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        <option value="">Pilih Karyawan</option>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                            {{ $employee->nama_lengkap }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('karyawan_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal" class="block text-sm/6 font-semibold text-gray-900">Tanggal</label>
                <div class="mt-2.5">
                    <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('tanggal')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="waktu_masuk" class="block text-sm/6 font-semibold text-gray-900">Waktu Masuk</label>
                <div class="mt-2.5">
                    <input id="waktu_masuk" type="time" name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('waktu_masuk')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="waktu_keluar" class="block text-sm/6 font-semibold text-gray-900">Waktu Keluar</label>
                <div class="mt-2.5">
                    <input id="waktu_keluar" type="time" name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" />
                </div>
                @error('waktu_keluar')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="status_absensi" class="block text-sm/6 font-semibold text-gray-900">Status Absensi</label>
                <div class="mt-2.5">
                    <select name="status_absensi" id="status_absensi" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        <option value="">Pilih Status</Toption>
                        <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </div>
                @error('status_absensi')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-emerald-800 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-emerald-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                Update Absensi
            </button>
        </div>
    </form>
</div>
@endsection