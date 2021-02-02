<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $en_name
 * @property string $created_at
 * @property string $updated_at
 */
class IronmanNewsType extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'en_name', 'created_at', 'updated_at'];

    public function ironmanNews(){
        return $this->hasMany('App\IronmanNews','type_id','id');
    }
}
