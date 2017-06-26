<?php

namespace Pavlyshyn\Product\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'purchase',
        'amount',
        'discount',
        'code',
        'is_publish'
    ];

    public function categories() {
        return $this->belongsToMany(\Pavlyshyn\Product\Model\Category::class);
    }

    public function attributes() {
        return $this->belongsToMany(\Pavlyshyn\Product\Model\Attribute::class);
    }

}
