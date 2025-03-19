<?php

namespace App\DTO;

readonly class TaskDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public int    $status_id
    ) {}
}
