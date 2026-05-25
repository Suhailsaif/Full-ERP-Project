<?php

namespace App\Services\Attendance;

use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Services\BaseService;
use App\Repositories\Contracts\AttendanceRepositoryInterface;

class AttendanceService extends BaseService
{

protected AttendanceRepositoryInterface $repository;

public function __construct(
    AttendanceRepositoryInterface $repository
) {
    $this->repository = $repository;
}
    public function punchIn(array $data)
    {
        return $this->transaction(function () use ($data) {

            $attendance = Attendance::firstOrCreate([
                'company_id'=>auth()->user()->company_id,
                'user_id'=>auth()->id(),
                'date'=>today(),
            ],[
                'status'=>'present'
            ]);

            AttendanceLog::create([
                'attendance_id'=>$attendance->id,
                'type'=>'in',
                'logged_at'=>now(),
                'latitude'=>$data['latitude'] ?? null,
                'longitude'=>$data['longitude'] ?? null,
                'device'=>$data['device'] ?? null,
                'ip_address'=>request()->ip(),
            ]);

            return $attendance;
        });
    }

    public function punchOut(array $data)
    {
        $attendance = Attendance::where('user_id',auth()->id())
            ->whereDate('date',today())
            ->first();

        AttendanceLog::create([
            'attendance_id'=>$attendance->id,
            'type'=>'out',
            'logged_at'=>now(),
            'latitude'=>$data['latitude'] ?? null,
            'longitude'=>$data['longitude'] ?? null,
            'device'=>$data['device'] ?? null,
            'ip_address'=>request()->ip(),
        ]);

        return $attendance;
    }
}