<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CardFilterService;
use Illuminate\Http\Request;

class CardFilterController extends Controller
{
    public function __invoke(
        Request $request,
        CardFilterService $filterService
    ) {
        $filters = $request->validate([
            'short_manufacturer' => ['sometimes', 'nullable', 'string'],
            'city'               => ['sometimes', 'nullable', 'string'],
            'country'            => ['sometimes', 'nullable', 'string'],
            'card_count'         => ['sometimes', 'nullable', 'integer'],
            'joker'              => ['sometimes', 'nullable'],
            'extra_cards'        => ['sometimes', 'nullable'],
            'suit'               => ['sometimes', 'nullable', 'string'],
            'index'              => ['sometimes', 'nullable'],
            'type1'              => ['sometimes', 'nullable', 'string'],
        ]);

        $cards = $filterService->filter($filters);

        return response()->json([
            'success' => true,
            'count' => $cards->count(),
            'data' => $cards,
        ]);
    }
}
