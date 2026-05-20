<?php

namespace App\Http\Controllers\API\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Payroll\PayrollService;
use App\Http\Resources\Payroll\PayrollResource;
use App\Http\Requests\Payroll\GeneratePayrollRequest;
class PayrollController extends Controller
{
    public function __construct(
        protected PayrollService $service
    ) {}

    /**
     * Generate Payroll
     */
    // public function generate(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required',
    //         'month' => 'required',
    //         'year' => 'required',
    //         'gross_salary' => 'required|numeric',
    //     ]);

    //     $payroll = $this->service->generate(
    //         $request->all()
    //     );

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Payroll generated successfully',
    //         'data' => $payroll
    //     ]);
    // }

public function generate(
    GeneratePayrollRequest $request
) {
    $payroll = $this->service->generate(
        $request->validated()
    );

    return response()->json([
        'success' => true,
        'message' => 'Payroll generated successfully',
        'data' => new PayrollResource($payroll)
    ]);
}
}