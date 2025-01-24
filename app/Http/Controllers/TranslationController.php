<?php

namespace App\Http\Controllers;

use App\Services\TranslationService;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    protected $service;

    public function __construct(TranslationService $service)
    {
        $this->service = $service;
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string',
            'locale' => 'required|string',
            'content' => 'required|string',
            'tags' => 'nullable|array',
        ]);

        return $this->service->create($data);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'key' => 'string',
            'locale' => 'string',
            'content' => 'string',
            'tags' => 'array',
        ]);

        return $this->service->update($id, $data);
    }

    public function find($id)
    {
        return $this->service->find($id);
    }

    public function search(Request $request)
    {
        return $this->service->search($request->all());
    }

    public function export(Request $request)
    {
        return $this->service->export($request->get('locale'), $request->get('tags'));
    }
}
