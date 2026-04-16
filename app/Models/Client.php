<?php 


class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'phone',
        'company_name',
        'tax_number',
        'website',
        'address',
        'city',
        'country',
        'status',
    ];
}