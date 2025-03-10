<?php

namespace App\DTO;


readonly class EmployeeDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public ?int $statusId
    ) {}

    public function mapToDb(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'status_id' => $this->statusId,
        ];
    }
}
