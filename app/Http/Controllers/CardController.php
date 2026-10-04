<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CardController extends Controller
{
    /**
     * Az összes kártya lekérése.
     */
    public function index()
    {
        return response()->json(
            Card::all()
        );
    }

    /**
     * Egy konkrét kártya lekérése azonosító alapján.
     */
    public function show(string $card_id)
    {
        $card = Card::find($card_id);

        if (!$card) {
            return response()->json([
                'message' => 'A kártya nem található.'
            ], 404);
        }

        return response()->json($card);
    }

    /**
     * Új kártya létrehozása.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_id' => [
                'required',
                'string',
                'max:255',
                'unique:cards,card_id',
            ],

            'name' => ['required', 'string', 'max:255'],

            'manufacturer' => ['nullable', 'string', 'max:255'],
            'namemaufacturer_short' => ['nullable', 'string', 'max:255'],

            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],

            'signetta' => ['nullable', 'string', 'max:255'],

            'year' => ['nullable', 'integer', 'min:0', 'max:65535'],

            'card_count' => ['nullable', 'integer', 'min:0'],
            'joker' => ['nullable', 'integer', 'min:0'],
            'extra_cards' => ['nullable', 'integer', 'min:0'],

            'suit' => ['nullable', 'string', 'max:255'],
            'index' => ['nullable', 'string', 'max:255'],

            'size' => ['nullable', 'string', 'max:255'],

            'type1' => ['nullable', 'string', 'max:255'],
            'type2' => ['nullable', 'string', 'max:255'],

            'cover_image' => ['nullable', 'string', 'max:255'],
        ]);

        $card = Card::create($validated);

        return response()->json([
            'message' => 'A kártya sikeresen létrejött.',
            'card' => $card,
        ], 201);
    }

    /**
     * Meglévő kártya módosítása.
     */
    public function update(Request $request, string $card_id)
    {
        $card = Card::find($card_id);

        if (!$card) {
            return response()->json([
                'message' => 'A kártya nem található.'
            ], 404);
        }

        $validated = $request->validate([
            'card_id' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('cards', 'card_id')->ignore(
                    $card->card_id,
                    'card_id'
                ),
            ],

            'name' => ['sometimes', 'required', 'string', 'max:255'],

            'manufacturer' => ['sometimes', 'nullable', 'string', 'max:255'],
            'namemaufacturer_short' => ['sometimes', 'nullable', 'string', 'max:255'],

            'city' => ['sometimes', 'nullable', 'string', 'max:255'],
            'country' => ['sometimes', 'nullable', 'string', 'max:255'],

            'signetta' => ['sometimes', 'nullable', 'string', 'max:255'],

            'year' => ['sometimes', 'nullable', 'integer', 'min:0', 'max:65535'],

            'card_count' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'joker' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'extra_cards' => ['sometimes', 'nullable', 'integer', 'min:0'],

            'suit' => ['sometimes', 'nullable', 'string', 'max:255'],
            'index' => ['sometimes', 'nullable', 'string', 'max:255'],

            'size' => ['sometimes', 'nullable', 'string', 'max:255'],

            'type1' => ['sometimes', 'nullable', 'string', 'max:255'],
            'type2' => ['sometimes', 'nullable', 'string', 'max:255'],

            'cover_image' => ['sometimes', 'nullable', 'string', 'max:255'],
        ]);

        $card->update($validated);

        return response()->json([
            'message' => 'A kártya sikeresen módosult.',
            'card' => $card->fresh(),
        ]);
    }

    /**
     * Kártya törlése.
     */
    public function destroy(string $card_id)
    {
        $card = Card::find($card_id);

        if (!$card) {
            return response()->json([
                'message' => 'A kártya nem található.'
            ], 404);
        }

        $card->delete();

        return response()->json([
            'message' => 'A kártya sikeresen törölve.'
        ]);
    }
}

