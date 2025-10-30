@extends('master')
@section('title', 'Edit Data Gaji')
@section('content')

<div class="py-6 sm:py-16 lg:px-8 max-w-4xl mx-auto mt-5">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Edit Data Gaji</h2>
        <p class="mt-2 text-lg/8 text-gray-600">Perbarui rincian gaji di bawah ini.</p>
    </div>

    <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

            <div>
                <label for="karyawan_id" class="block text-sm/6 font-semibold text-gray-900">Nama Karyawan</label>
                <div class="mt-2.5">
                    <select name="karyawan_id"
                        id="karyawan_id"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        <option value="">Pilih Karyawan</option>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                            {{ $employee->nama_lengkap }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('karyawan_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="bulan" class="block text-sm/6 font-semibold text-gray-900">Bulan (cth: 10-2025)</label>
                <div class="mt-2.5">
                    <input type="text"
                        name="bulan"
                        id="bulan"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                        value="{{ old('bulan', $salary->bulan) }}"
                        placeholder="MM-YYYY">
                </div>
                @error('bulan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="gaji_pokok" class="block text-sm/6 font-semibold text-gray-900">Gaji Pokok</label>
                <div class="mt-2.5">
                    <input type="number"
                        name="gaji_pokok"
                        id="gaji_pokok"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                        value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
                        step="0.01"
                        placeholder="5000000">
                </div>
                @error('gaji_pokok') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="tunjangan" class="block text-sm/6 font-semibold text-gray-900">Tunjangan</label>
                <div class="mt-2.5">
                    <input type="number"
                        name="tunjangan"
                        id="tunjangan"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                        value="{{ old('tunjangan', $salary->tunjangan) }}"
                        step="0.01">
                </div>
                @error('tunjangan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="potongan" class="block text-sm/6 font-semibold text-gray-900">Potongan</label>
                <div class="mt-2.5">
                    <input type="number"
                        name="potongan"
                        id="potongan"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                        value="{{ old('potongan', $salary->potongan) }}"
                        step="0.01">
                </div>
                @error('potongan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-emerald-800 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-emerald-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update Gaji
            </button>
        </div>

    </form>
</div>
@endsection