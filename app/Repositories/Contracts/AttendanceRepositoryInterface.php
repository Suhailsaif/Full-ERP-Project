<?php

namespace App\Repositories\Contracts;

interface AttendanceRepositoryInterface
    extends BaseRepositoryInterface
{
    public function todayAttendance(int $userId);

    public function monthlyAttendance(
        int $userId,
        int $month,
        int $year
    );
}