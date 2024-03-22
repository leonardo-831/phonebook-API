<?php

namespace App\Repositories\Contact;

use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function __construct(
        protected Contact $model
    ) {
    }

    public function all()
    {
        return $this->model->all();
    }

    public function store(array $data)
    {
        return $this->model->create((array) $data);
    }

    public function update($data, $entity)
    {
        $entity->fill((array) $data);
        $entity->save();
        return $entity;
    }

    public function storePhone($data, $contact)
    {
        $contact->phones()->createMany((array) $data);
    }

    public function delete($entity)
    {
        return $entity->delete();
    }

    public function contactReport()
    {
        return $this->model->select('name')->get();
    }
}