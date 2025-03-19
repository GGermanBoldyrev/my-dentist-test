<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\Contracts\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function all(): Collection
    {
        return Employee::with('tasks')->get();
    }

    public function find(int $id): ?Employee
    {
        return Employee::with('tasks')->find($id);
    }

    public function create(array $data): Employee
    {
        return Employee::create($data);
    }

    public function update(Employee $model, array $data): bool
    {
        return $model->update($data);
    }

    public function delete(Employee $model): bool
    {
        return $model->delete();
    }
}

