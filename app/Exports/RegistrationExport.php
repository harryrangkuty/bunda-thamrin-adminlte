<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RegistrationExport implements FromView
{
    protected $registrations;

    public function __construct($registrations)
    {
        $this->registrations = $registrations;
    }

    public function view(): View
    {
        return view('exports.registrations_excel', [
            'registrations' => $this->registrations
        ]);
    }
}
