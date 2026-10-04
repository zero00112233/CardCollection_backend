<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;
     protected $primaryKey = 'card_id';

    public $incrementing = false;

    protected $keyType = 'string';
    protected $fillable=[
        'card_id',
        'name',
        'manufacturer',
        'maufacturer_short',
        'city',
        'country',
        'signetta',
        'year',
        'card_count',
        'joker',
        'extra_cards',
        'suit',
        'index',
        'size',
        'type1',
        'type2',
        'cover_image',
    ];
}
