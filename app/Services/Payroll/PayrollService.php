<?php

namespace App\Services\Payroll;

use App\Models\Payroll;
use App\Models\PayrollItem;
use App\Services\BaseService;

class PayrollService extends BaseService
{
    public function generate(array $data)
    {
        return $this->transaction(function () use ($data) {

            $gross = $data['gross_salary'];

            $deductions = collect($data['deductions'])->sum('amount');

            $net = $gross - $deductions;

            $payroll = Payroll::create([
                'company_id'=>auth()->user()->company_id,
                'user_id'=>$data['user_id'],
                'month'=>$data['month'],
                'year'=>$data['year'],
                'gross_salary'=>$gross,
                'total_deductions'=>$deductions,
                'net_salary'=>$net,
                'status'=>'draft',
                'generated_at'=>now(),
            ]);

            foreach ($data['deductions'] as $item) {
                PayrollItem::create([
                    'payroll_id'=>$payroll->id,
                    'type'=>'deduction',
                    'label'=>$item['label'],
                    'amount'=>$item['amount'],
                ]);
            }

            return $payroll;
        });
    }
}