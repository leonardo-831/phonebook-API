<?php
namespace App\Repositories\Phone;

interface PhoneRepositoryInterface
{
    public function update($data, $entity);
    public function delete($data);
}
