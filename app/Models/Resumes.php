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
class Resumes extends Model
{

    public function information()
    {
        return $this->hasMany(\App\Models\Informations::class);
    }

    public function experience()
    {
        return $this->hasMany(\App\Models\Experiences::class);
    }

    public function education()
    {
        return $this->hasMany(\App\Models\Educations::class);
    }

    public function skill()
    {
        return $this->hasMany(\App\Models\Skills::class);
    }

    public function interest()
    {
        return $this->hasMany(\App\Models\Interests::class);
    }

    public function award()
    {
        return $this->hasMany(\App\Models\Awards::class);
    }

    public function users()
    {
        return $this->belongsTo(\App\Models\Users::class);
    }

}