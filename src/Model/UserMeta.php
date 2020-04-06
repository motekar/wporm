<?php
namespace Motekar\WPORM\Model;

use Motekar\WPORM\Eloquent\Model;

class UserMeta extends Model
{
    protected $table = 'usermeta';

    protected $primaryKey = 'meta_id';

    public $timestamps    = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
