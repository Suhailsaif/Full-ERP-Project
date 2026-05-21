<?php

namespace App\Repositories\Eloquent;

use App\Models\Attendance;
use App\Repositories\Contracts\AttendanceRepositoryInterface;

class AttendanceRepository extends BaseRepository
    implements AttendanceRepositoryInterface
{
    public function __construct(Attendance $model)
    {
        $this->model = $model;
    }

    /**
     * Today attendance
     */
    public function todayAttendance(int $userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->whereDate(
                'attendance_date',
                now()->toDateString()
            )
            ->first();
    }

    /**
     * Monthly attendance
     */
    public function monthlyAttendance(
        int $userId,
        int $month,
        int $year
    ) {
        return $this->model
            ->where('user_id', $userId)
            ->whereMonth('attendance_date', $month)
            ->whereYear('attendance_date', $year)
            ->get();
    }
}