<?php

namespace App\Repositories;

use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

class TranslationRepository
{
    public function create(array $data)
    {
        return Translation::create($data);
    }

    public function update($id, array $data)
    {
        $translation = Translation::find($id);

        if ($translation) {
            $translation->update($data);
        }

        return $translation;
    }

    public function find($id)
    {
        return Translation::find($id);
    }

    public function search(array $filters)
    {
        $query = Translation::query();

        if (isset($filters['key'])) {
            $query->where('key', 'LIKE', '%' . $filters['key'] . '%');
        }

        if (isset($filters['locale'])) {
            $query->where('locale', $filters['locale']);
        }

        if (isset($filters['tags'])) {
            $query->whereJsonContains('tags', $filters['tags']);
        }

        if (isset($filters['content'])) {
            $query->where('content', 'LIKE', '%' . $filters['content'] . '%');
        }

        return $query->get();
    }

    public function export($locale = null, $tags = null)
    {
        $cacheKey = 'translations_export_' . md5(json_encode([$locale, $tags]));

        $translations = Cache::remember($cacheKey, 60, function () use ($locale, $tags) {

            $query = Translation::query();

            if ($locale) {
                $query->where('locale', $locale);
            }

            if ($tags) {
                $query->whereJsonContains('tags', $tags);
            }

            $translations = $query->get();
            $result = [];

            foreach ($translations as $translation) {
                $result[$translation->locale][$translation->key] = $translation->content;
            }

            return $result;
        });

        return $translations;
    }
}
