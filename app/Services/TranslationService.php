<?php

namespace App\Services;

use App\Repositories\TranslationRepository;

class TranslationService
{
    protected $repository;

    public function __construct(TranslationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        $data['tags'] = json_encode($data['tags']);

        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        $data['tags'] = json_encode($data['tags']);

        return $this->repository->update($id, $data);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function search(array $filters)
    {
        return $this->repository->search($filters);
    }

    public function export($locale = null, $tags = null)
    {
        return $this->repository->export($locale, $tags);
    }
}
