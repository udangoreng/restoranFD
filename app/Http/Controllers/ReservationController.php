<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //User
    public function index()
    {
        $userdata = Auth::user();
        return view('reservasi', compact('userdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'salutation'=>'required',
            'first_name'=>'required|string|max:20',
            'last_name'=>'required|string|max:20',
            'phone'=>'required',
            'email'=>'required|email',
            'person_attend'=>'required|numeric|max:10',
            'booking_date'=>'required|date',
            'time_in'=>'required',
            'request'=>'nullable|string',
            'allergies'=>'nullable|string|max:100',
            'message'=>'nullable|string|max:255',
        ]);

        $carbon_time = Carbon::parse($request->time_in);
        $time_out = $carbon_time->addMinutes(150);
        $queue = Reservation::whereDate('created_at', Carbon::today())->count();

        $res_id = '#RSV-'.Carbon::Now()->format('Ymd').'-'.($queue+1);

        
        $data = $request->merge([
            'reservation_code'=>$res_id,
            'status'=>'Created',
            'time_out'=> $time_out->format('H:i'),
        ]);

        Reservation::create($data->all());
        return redirect()->route('menu')->with('success', 'Reservation created successfully.');
    }

    //Admin

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $reservations = Reservation::all();
        return view('admin.reservation', compact('reservations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
