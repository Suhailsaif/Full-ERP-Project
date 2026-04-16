<?php
use Illuminate\Database\Eloquent\Model;




class StoreClientRequest extends Model
{
    protected $table = 'store_client_requests';

    protected $fillable = [
        'client_id',
        'request_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'request_date' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
}