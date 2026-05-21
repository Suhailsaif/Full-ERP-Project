<?php

namespace App\Repositories\Eloquent;

use App\Models\Payroll;
use App\Repositories\Contracts\PayrollRepositoryInterface;

class PayrollRepository extends BaseRepository
    implements PayrollRepositoryInterface
{
    public function __construct(Payroll $model)
    {
        $this->model = $model;
    }

    /**
     * Employee payrolls
     */
    public function employeePayrolls(int $userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->latest()
            ->get();
    }

    /**
     * Monthly payroll
     */
    public function monthlyPayroll(
        int $month,
        int $year
    ) {
        return $this->model
            ->where('month', $month)
            ->where('year', $year)
            ->latest()
            ->get();
    }
}