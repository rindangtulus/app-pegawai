@extends('master')
@section('title', 'Detail Gaji')
@section('content')

<div class="mt-32 py-16 bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">

    <div class="pb-4 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-gray-900">Detail Gaji Karyawan</h1>
        <p class="mt-1 text-sm text-gray-500">
            Rincian gaji untuk bulan {{ $salary->bulan }}
        </p>
    </div>

    <div class="mt-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">

            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">Nama Karyawan</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $salary->employee->nama_lengkap }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Gaji Pokok</dt>
                <dd class="mt-1 text-md text-gray-900">Rp. {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Tunjangan</dt>
                <dd class="mt-1 text-md text-gray-900">Rp. {{ number_format($salary->tunjangan, 2, ',', '.') }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Potongan</dt>
                <dd class="mt-1 text-md text-red-600">Rp. {{ number_format($salary->potongan, 2, ',', '.') }}</dd>
            </div>

        </dl>
    </div>

    <hr class="my-6 border-gray-200">

    <div class="bg-gray-50 p-4 rounded-lg">
        <dl>
            <dt class="text-md font-medium text-gray-600">Total Gaji Diterima</dt>
            <dd class="mt-1 text-2xl font-bold text-emerald-600">Rp. {{ number_format($salary->total_gaji, 2, ',', '.') }}</dd>
        </dl>
    </div>

    <div class="flex justify-end gap-3 mt-6 border-t border-gray-200 pt-5">
        <a href="{{ route('salaries.index') }}"
            class="rounded-lg bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-300">
            Kembali
        </a>
        <a href="{{ route('salaries.edit', $salary->id) }}"
            class="inline-flex items-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">
            Edit Data Ini
        </a>
    </div>

</div>
@endsection