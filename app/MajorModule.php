<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorModule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'major_module';

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
    protected $fillable = ['major_id', 'module_id'];

    
}
