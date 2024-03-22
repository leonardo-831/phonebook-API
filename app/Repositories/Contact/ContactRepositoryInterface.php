<?php
namespace App\Repositories\Contact;

interface ContactRepositoryInterface
{
    public function all();
    public function store(array $data);
    public function storePhone(array $data, $contact);
    public function update($data, $entity);
    public function delete($data);
    public function contactReport();
}
