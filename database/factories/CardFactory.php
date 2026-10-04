<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Card>
 */
class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition(): array
    {
        return [
            'card_id' => 'CARD-' . strtoupper(Str::random(8)),

            'name' => fake()->words(3, true),
            'manufacturer' => fake()->company(),
            'namemaufacturer_short' => strtoupper(
                fake()->lexify('????')
            ),

            'city' => fake()->city(),
            'country' => fake()->country(),

            'signetta' => fake()->optional()->word(),

            'year' => fake()->numberBetween(1950, 2026),

            'card_count' => fake()->numberBetween(32, 55),

            'joker' => fake()->numberBetween(0, 4),
            'extra_cards' => fake()->numberBetween(0, 5),

            'suit' => fake()->randomElement([
                'French',
                'German',
                'Italian',
                'Other',
            ]),

            'index' => (string) fake()->numberBetween(1, 100),

            'size' => fake()->randomElement([
                'Bridge',
                'Poker',
                'Tarot',
            ]),

            'type1' => fake()->randomElement([
                'Playing cards',
                'Collectible cards',
                'Tarot cards',
            ]),

            'type2' => fake()->optional()->randomElement([
                'Standard',
                'Luxury',
                'Vintage',
                'Limited edition',
            ]),

            'cover_image' => null,
        ];
    }
}

