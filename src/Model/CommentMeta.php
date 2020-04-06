<?php
namespace Motekar\WPORM\Model;

use Motekar\WPORM\Eloquent\Model;

class CommentMeta extends Model
{
    protected $table = 'commentmeta';
    protected $primaryKey = 'meta_id';

    /**
     * @var array
     */
    protected $fillable = ['meta_key', 'meta_value', 'comment_id'];

    public $timestamps    = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
