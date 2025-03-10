<?php

namespace App\Services;

use App\DTO\EmployeeDTO;
use App\Repositories\Contracts\EmployeeRepositoryInterface;
use App\Models\Employee;

class EmployeeService
{
    public function __construct(private readonly EmployeeRepositoryInterface $repository) {}

    public function createEmployee(EmployeeDTO $dto): Employee
    {
        return $this->repository->create($dto->mapToDb());
    }


}
