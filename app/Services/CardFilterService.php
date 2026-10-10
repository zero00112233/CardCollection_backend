<?php

namespace App\Services;

use App\Models\Card;
use Illuminate\Database\Eloquent\Builder;

class CardFilterService
{
    private array $filterFields = [
        'short_manufacturer',
        'city',
        'country',
        'card_count',
        'joker',
        'extra_cards',
        'suit',
        'index',
        'type1',
    ];

    public function filter(array $filters)
    {
        $query = Card::query();

        foreach ($this->filterFields as $field) {
            $value = $filters[$field] ?? null;

            if (
                $value === null ||
                $value === '' ||
                $value === 0 ||
                $value === '0'
            ) {
                continue;
            }

            $query->where($field, $value);
        }

        return $query->get();
    }
}
