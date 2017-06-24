<?php

namespace Pavlyshyn\Product\Model;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attributes';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function products() {
        return $this->belongsToMany(\Pavlyshyn\Product\Model\Product::class);
    }

}
