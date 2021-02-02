<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $type_id
 * @property int $author_id
 * @property string $title
 * @property string $en_title
 * @property string $content
 * @property string $en_content
 * @property string $keyword
 * @property string $en_keyword
 * @property string $img
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 */
class IronmanNews extends Model
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
    protected $fillable = ['type_id', 'author_id', 'title', 'en_title','preview', 'en_preview', 'content', 'en_content', 'keyword', 'en_keyword', 'img', 'date', 'created_at', 'updated_at'];

    public function ironmanNewsType(){
        return $this->hasOne('App\IronmanNewsType','id','type_id');
    }

    public function newsAuthor(){
        return $this->hasOne('App\NewsAuthor','id','author_id');
    }


}
