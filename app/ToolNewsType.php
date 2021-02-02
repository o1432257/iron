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
class ToolNewsType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tool_news_types';

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

    public function toolNews(){
        return $this->hasMany('App\ToolNews','type_id','id');
    }

}
