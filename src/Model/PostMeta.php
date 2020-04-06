<?php
namespace Motekar\WPORM\Model;

use Motekar\WPORM\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'postmeta';

    protected $primaryKey = 'meta_id';

    public $timestamps    = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
