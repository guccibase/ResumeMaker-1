<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * @author Amir Eslamdoust <amireslamdoust@gmail.com>
 * @version 1.0.0
 * @uses
 *
 * @see
 *
 */
class Users extends Model
{

    protected $guarded = array(
        'password'
    );

    public function resumes()
    {
        return $this->hasMany(\App\Models\Resumes::class);
    }

}