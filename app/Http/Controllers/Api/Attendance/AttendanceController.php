<?php

namespace App\Http\Controllers\API\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Attendance\AttendanceService;
use App\Http\Requests\Attendance\PunchAttendanceRequest;
use App\Http\Resources\Attendance\AttendanceResource;

class AttendanceController extends Controller
{
    public function __construct(
        protected AttendanceService $service
    ) {}

    /**
     * Punch In
     */
public function punchIn(
    PunchAttendanceRequest $request
) {
    $attendance = $this->service->punchIn(
        $request->validated()
    );

    return response()->json([
        'success' => true,
        'message' => 'Punch in successful',
        'data' => new AttendanceResource($attendance)
    ]);
}

public function punchOut(
    PunchAttendanceRequest $request
) {
    $attendance = $this->service->punchOut(
        $request->validated()
    );

    return response()->json([
        'success' => true,
        'message' => 'Punch out successful',
        'data' => new AttendanceResource($attendance)
    ]);
}
}