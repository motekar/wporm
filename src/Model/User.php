<?php
namespace Motekar\WPORM\Model;

use Motekar\WPORM\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'ID';
    protected $timestamp = false;

    public function meta()
    {
        return $this->hasMany('Motekar\WPORM\Model\UserMeta', 'user_id');
    }

    public function posts()
    {
    	return $this->hasMany('Motekar\WPORM\Model\Post', 'post_author');
    }
}
