<?php

namespace App\Repositories\Phone;

use App\Models\Phone;

class PhoneRepository implements PhoneRepositoryInterface
{
    public function __construct(
        protected Phone $model
    ) {
    }

    public function update($data, $entity)
    {
        $entity->fill((array) $data);
        $entity->save();
        return $entity;
    }

    public function delete($entity)
    {
        return $entity->delete();
    }
}