<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Url
 * @package App
 *
 * @property string url
 * @property string md5
 * @property integer clicks
 * @property boolean will_expires
 */
class Url extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'md5',
        'url',
        'will_expires',
        'clicks',
    ];
}
