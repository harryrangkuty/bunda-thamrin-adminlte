<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Registration;
use Illuminate\Http\Request;

class PatientApiController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->query('from_date');
        $to = $request->query('to_date');

        $query = Patient::query();

        if ($from || $to) {
            $query->whereHas('registrations', function($q) use ($from, $to) {
                if ($from) {
                    $q->where('registration_date', '>=', $from);
                }
                if ($to) {
                    $q->where('registration_date', '<=', $to);
                }
            });
        }

        $patients = $query->get();

        return response()->json($patients);
    }

    public function registered()
    {
        $patients = Patient::whereHas('registrations')->get();

        return response()->json($patients);
    }
}
