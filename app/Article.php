<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article';
    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        //$this->table = 'article';

        parent::__construct($attributes);
    }
}
