<?php

namespace App\Services;

use App\Repositories\Phone\PhoneRepositoryInterface;

class PhoneService
{
    public function __construct(
        protected PhoneRepositoryInterface $repository,
    ) {
    }

    public function update($data, $phone)
    {
        return $this->repository->update($data, $phone);
    }

    public function delete($phone)
    {
        if ($this->repository->delete($phone) == true)
            return "deletado!!";
    }
}
