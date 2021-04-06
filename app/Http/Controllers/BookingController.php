<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Dotenv\Validator;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking=booking::all();
        return view('admin.booking.booking')->with('booking',$booking);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.booking.booking-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'home_id'=>'required|integer',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:bookings|max:255',
            'service_id'=>'required|integer',
            'amount'=>'required|numeric',
            'address'=>'required'
        ]);
        if(booking::create($request->all())){
            echo 'Success';
        }else{
            echo 'Not';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        echo $booking['id'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        print_r($booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        $request->validate([
            'home_id'=>'required|integer',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:bookings|max:255',
            'service_id'=>'required|integer',
            'amount'=>'required|numeric',
            'address'=>'required'
        ]);
        if(booking::update($request->all())){
            echo 'Success';
        }else{
            echo 'Not';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {

    }
}
