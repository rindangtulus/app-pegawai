<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;

use Illuminate\Http\Request;


class SalariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->get();

        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10',
            'gaji_pokok'  => 'required|numeric|min:0',
            'tunjangan'   => 'nullable|numeric|min:0',
            'potongan'    => 'nullable|numeric|min:0',
        ]);

        $gaji_pokok = $validatedData['gaji_pokok'];
        $tunjangan  = $request->input('tunjangan', 0);
        $potongan   = $request->input('potongan', 0);

        $validatedData['total_gaji'] = $gaji_pokok + $tunjangan - $potongan;

        $validatedData['tunjangan'] = $tunjangan;
        $validatedData['potongan'] = $potongan;

        Salary::create($validatedData);
        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $employees = Employee::all();

        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10',
            'gaji_pokok'  => 'required|numeric|min:0',
            'tunjangan'   => 'nullable|numeric|min:0',
            'potongan'    => 'nullable|numeric|min:0',
        ]);

        $gaji_pokok = $validatedData['gaji_pokok'];
        $tunjangan  = $request->input('tunjangan', 0);
        $potongan   = $request->input('potongan', 0);

        $validatedData['total_gaji'] = $gaji_pokok + $tunjangan - $potongan;

        $validatedData['tunjangan'] = $tunjangan;
        $validatedData['potongan'] = $potongan;

        $salary->update($validatedData);

        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil dihapus.');
    }
}
