<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date,
                $request->end_date,
            ]);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('medrec_number', 'like', '%' . $request->search . '%');
            });
        }

        $patients = $query->paginate(10)->withQueryString();

        return view('pages.patient.index', compact('patients'));
    }

    public function create()
    {
        return view('pages.patient.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required|in:M,F',
            'email' => 'nullable|email|unique:patients,email',
            'address' => 'nullable',
            'phone' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'gender', 'email', 'address', 'phone']);

        // Generate No.RM
        $prefix = now()->format('ymd');
        $last = Patient::where('medrec_number', 'like', $prefix . '%')->latest('medrec_number')->first();
        $number = $last ? intval(substr($last->medrec_number, 6)) + 1 : 1;
        $data['medrec_number'] = $prefix . str_pad($number, 3, '0', STR_PAD_LEFT);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('patients', 'public');
        }

        Patient::create($data);

        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil ditambahkan.');
    }

    public function show(Patient $patient)
    {
        return view('pages.patient.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('pages.patient.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required|in:M,F',
            'email' => 'nullable|email|unique:patients,email,' . $patient->id,
            'address' => 'nullable',
            'phone' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'gender', 'email', 'address', 'phone']);

        if ($request->hasFile('photo')) {
            if ($patient->photo) {
                Storage::disk('public')->delete($patient->photo);
            }
            $data['photo'] = $request->file('photo')->store('patients', 'public');
        }

        $patient->update($data);

        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil diperbarui.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil dihapus.');
    }
}