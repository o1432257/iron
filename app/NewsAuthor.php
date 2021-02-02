<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $en_name
 * @property string $company
 * @property string $en_company
 * @property string $companySummary
 * @property string $en_companySummary
 * @property string $companyWebsite
 * @property string $created_at
 * @property string $updated_at
 */
class NewsAuthor extends Model
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
    protected $fillable = ['name', 'en_name', 'company', 'en_company', 'companySummary', 'en_companySummary', 'companyWebsite', 'created_at', 'updated_at','catalogue_url','catalogue_name'];

    public function IronmanNews(){
        return $this->hasMany('App/IronmanNews','author_id','id');
    }

    public function toolNews(){
        return $this->hasMany('App/ToolNews','author_id','id');
    }

}
