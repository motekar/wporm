<?php
namespace Motekar\WPORM\Model;

use Motekar\WPORM\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'comment_ID';

    /**
     * Post relation for a comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post()
    {
        return $this->hasOne('Motekar\WPORM\Model\Post');
    }
}
