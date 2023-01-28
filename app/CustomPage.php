<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CustomPage extends Model
{
    use HasTranslations;

    public $translatable = ['title'];

    public function toArray()
    {
        $attributes = parent::toArray();

        foreach ($this->getTranslatableAttributes() as $name) {
            $attributes[$name] = $this->getTranslation($name, app()->getLocale());
        }

        return $attributes;
    }

    protected $fillable = [
        'title',
        'in_show_menu',
        'detail_ru',
        'slug',
        'is_active',
        'detail_kz'

    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu')->withDefault();
    }

}
