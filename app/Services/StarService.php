<?php

namespace App\Services;

use App\Models\Star;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Gate;

class StarService
{
    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return Star::query()
            ->latest()
            ->paginate(20)
            ->through(function (Star $star): array {
                return [
                    ...$star->toArray(),
                    'can' => [
                        'edit'   => Gate::check('update', $star),
                        'delete' => Gate::check('delete', $star),
                    ],
                ];
            });
    }

    /**
     * @return array
     */
    public static function getValidationRules(): array
    {
        return [
            'firstname'        => [
                'required',
                'string',
                'max:255',
            ],
            'lastname'     => [
                'required',
                'string',
                'max:255',
            ],
            'image_url'   => [
                'required',
                'url',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
            ],
        ];
    }
}
