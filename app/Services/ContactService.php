<?php

namespace App\Services;

use App\Repositories\Contact\ContactRepositoryInterface;

class ContactService
{
    public function __construct(
        protected ContactRepositoryInterface $repository,
    ) {
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function store(array $data)
    {
        $contact = $this->repository->store($data);
        if ($contact && !is_null($data['phones'])) {
            $this->repository->storePhone($data['phones'], $contact);
        }
        return $contact;
    }

    public function update($data, $contact)
    {
        return $this->repository->update($data, $contact);
    }

    public function delete($contact)
    {
        return $this->repository->delete($contact);
    }

    public function contactReport()
    {
        dd('oi');
        return $this->repository->contactReport();
    }
}
