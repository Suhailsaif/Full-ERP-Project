
<?php 
class ClientDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $company_name,
        public readonly ?string $tax_number,
        public readonly ?string $website,
        public readonly ?string $address,
        public readonly ?string $city,
        public readonly ?string $country,
        public readonly string $status,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'] ?? null,
            $data['phone'] ?? null,
            $data['company_name'] ?? null,
            $data['tax_number'] ?? null,
            $data['website'] ?? null,
            $data['address'] ?? null,
            $data['city'] ?? null,
            $data['country'] ?? null,
            $data['status'] ?? 'active',
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}