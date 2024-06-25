<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //check in
    public function checkin(Request $request)
    {
        // validate latlon
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // save new attendance
        $attendance = new Attendance;
        $attendance->user_id = $request->user()->id;
        $attendance->date =  date('Y-m-d');
        $attendance->time_in =  date('H:i:s');
        $attendance->latlon_in = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response(['message' => 'Checkin Success', 'attendance' => $attendance], 200);

        // check in
        $request->user()->attendance()->create(
            [
                'time_in' => now(),
                'lat' => $request->lat,
                'lon' => $request->lon,
            ]
        );

        return response(['message' => 'Checkin Success'], 200);

    }
}
