<?php

namespace App\Services;

use App\DTO\EmployeeDTO;
use App\Repositories\Contracts\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    public function __construct(private readonly EmployeeRepositoryInterface $repository) {}

    public function createEmployee(EmployeeDTO $dto): Employee
    {
        return $this->repository->create($dto->mapToDb());
    }

    public function getAllEmployees(): Collection
    {
        return $this->repository->all();
    }

    public function getEmployeeById(int $id): ?Employee
    {
        return $this->repository->find($id);
    }

    public function updateEmployee(int $id, EmployeeDTO $dto): ?Employee
    {
        $employee = $this->repository->find($id);

        if (!$employee) {
            return null;
        }

        if ($this->repository->update($employee, $dto->mapToDb())) {
            return $this->repository->find($id);
        }

        return null;
    }

    public function deleteEmployee(int $id): bool
    {
        $employee = $this->repository->find($id);

        if (!$employee) {
            return false;
        }

        return $this->repository->delete($employee);
    }
}
