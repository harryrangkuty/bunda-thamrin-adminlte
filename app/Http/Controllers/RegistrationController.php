<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Patient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegistrationExport;
use PDF;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
       $query = Registration::with('patient')->latest('registration_date');
       
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('registration_date', [
                $request->start_date,
                $request->end_date,
            ]);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('medrec_number', 'like', '%' . $request->search . '%')
                ->orWhere('registration_number', 'like', '%' . $request->search . '%');
            });
        }

        $registrations = $query->paginate(10)->withQueryString();

        return view('pages.registration.index', compact('registrations'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        return view('pages.registration.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'registration_date' => 'required|date',
            'medrec_number' => 'required|exists:patients,medrec_number',
        ]);

        // Generate No.Pendaftaran
        $date = \Carbon\Carbon::parse($request->registration_date)->format('ymd');
        $last = Registration::where('registration_number', 'like', $date . '%')
                            ->latest('registration_number')
                            ->first();
        $number = $last ? intval(substr($last->registration_number, 6)) + 1 : 1;
        $registration_number = $date . str_pad($number, 6, '0', STR_PAD_LEFT);

        Registration::create([
            'registration_date' => $request->registration_date,
            'medrec_number' => $request->medrec_number,
            'registration_number' => $registration_number,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Data Pendaftaran berhasil ditambahkan.');
    }

    public function show(Registration $registration)
    {
        $registration->load('patient');
        return view('pages.registration.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        $patients = Patient::orderBy('name')->get();
        return view('pages.registration.edit', compact('registration', 'patients'));
    }

    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'registration_date' => 'required|date',
            'medrec_number' => 'required|exists:patients,medrec_number',
        ]);

        $registration->update([
            'registration_date' => $request->registration_date,
            'medrec_number' => $request->medrec_number,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Data Pendaftaran berhasil diperbarui.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('registrations.index')->with('success', 'Data Pendaftaran berhasil dihapus.');
    }

    public function exportExcel(Request $request)
    {
        $registrations = $this->getFilteredRegistrations($request)->get();

        return $registrations->isEmpty()
            ? back()->with('error', 'Tidak ada data yang bisa diekspor.')
            : Excel::download(new RegistrationExport($registrations), 'registrations.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $registrations = $this->getFilteredRegistrations($request)->get();

        return $registrations->isEmpty()
            ? back()->with('error', 'Tidak ada data yang bisa diekspor.')
            : PDF::loadView('exports.registrations_pdf', compact('registrations'))->download('registrations.pdf');
    }

    protected function getFilteredRegistrations(Request $request)
    {
        $query = Registration::with('patient')->latest();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('registration_date', [
                $request->start_date,
                $request->end_date,
            ]);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('medrec_number', 'like', '%' . $request->search . '%')
                ->orWhere('registration_number', 'like', '%' . $request->search . '%');
            });
        }

        return $query;
    }
}