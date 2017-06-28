<?php

namespace Pavlyshyn\Product\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Media extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media';

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
        'path',
        'file_name',
        'title'
    ];

    public function publicPath() {
        return str_replace('/public/', '/', \URL::asset($this->path));
    }

}
