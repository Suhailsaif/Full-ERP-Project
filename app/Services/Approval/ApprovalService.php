<?php

namespace App\Services\Approval;

use App\Models\ApprovalRequest;

class ApprovalService
{
    public function sendForApproval($model, $action)
    {
        return ApprovalRequest::create([
            'company_id'  => auth()->user()->company_id,
            'model_type'  => get_class($model),
            'model_id'    => $model->id,
            'requested_by'=> auth()->id(),
            'action'      => $action,
            'status'      => 'pending',
        ]);
    }

    public function approve(ApprovalRequest $approval)
    {
        $approval->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return true;
    }

    public function reject(ApprovalRequest $approval)
    {
        $approval->update([
            'status' => 'rejected',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return true;
    }
}