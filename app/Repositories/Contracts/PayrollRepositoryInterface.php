<?php

namespace App\Repositories\Contracts;

interface PayrollRepositoryInterface
    extends BaseRepositoryInterface
{
    public function employeePayrolls(int $userId);

    public function monthlyPayroll(
        int $month,
        int $year
    );
}