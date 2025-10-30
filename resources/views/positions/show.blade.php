@extends('master')
@section('title', 'Detail Jabatan')

@section('content')

<div class="px-6 py-24 sm:py-32 lg:px-8">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Detail Jabatan</h2>
        <p class="mt-2 text-lg/8 text-gray-600">Rincian data untuk jabatan yang dipilih.</p>
    </div>

    <div class="mx-auto mt-16 max-w-xl sm:mt-20">
        <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg">
            <dl class="grid grid-cols-1 gap-y-6">
                <div>
                    <dt class="block text-sm/6 font-semibold text-gray-900">Nama Jabatan</dt>
                    <dd class="mt-2.5 text-2xl font-bold text-emerald-600">
                        {{ $position->nama_jabatan }}
                    </dd>
                </div>

                <div>
                    <dt class="block text-sm/6 font-semibold text-gray-900">Gaji Pokok</Tdt>
                    <dd class="mt-2.5 text-xl font-semibold text-gray-700">
                        Rp. {{ number_format($position->gaji_pokok, 2, ',', '.') }}
                    </dd>
                </div>
            </dl>

            <div class="mt-10 flex justify-end gap-x-4">
                <a href="{{ route('positions.index') }}"
                    class="rounded-md bg-gray-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                    Kembali
                </a>

                <a href="{{ route('positions.edit', $position->id) }}"
                    class="block rounded-md bg-emerald-800 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-emerald-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                    Edit Jabatan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection