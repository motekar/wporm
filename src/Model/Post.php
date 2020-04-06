<?php
namespace Motekar\WPORM\Model;

use Motekar\WPORM\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

/**
 * Class Post
 *
 * @package Motekar\WPORM\Model
 */
class Post extends Model
{
    protected $postType = 'post';
    protected $primaryKey = 'ID';

    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';

    private $rules = [
        'post_title' => 'required'
    ];

    /**
     * Filter by post type
     *
     * @param $query
     * @param string $type
     *
     * @return mixed
     */
    public function scopeType($query, $type = 'post')
    {
        return $query->where('post_type', '=', $type);
    }

    /**
     * Filter by post status
     *
     * @param $query
     * @param string $status
     *
     * @return mixed
     */
    public function scopeStatus($query, $status = 'publish')
    {
        return $query->where('post_status', '=', $status);
    }

    /**
     * Filter by post author
     *
     * @param $query
     * @param null $author
     *
     * @return mixed
     */
    public function scopeAuthor($query, $author = null)
    {
        if ($author) {
            return $query->where('post_author', '=', $author);
        }
    }

    public function thumbnail()
    {
        return $this->hasOne('Motekar\WPORM\Model\PostMeta', 'post_id')
            ->where('meta_key', '_thumbnail_id');
    }

    /**
     * Get comments from the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Motekar\WPORM\Model\Comment', 'comment_post_ID');
    }

    /**
     * Get meta fields from the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meta()
    {
        return $this->hasMany('Motekar\WPORM\Model\PostMeta', 'post_id');
    }

    public function author()
    {
        return $this->hasOne('Motekar\WPORM\Model\User', 'ID', 'post_author');
    }

    public function save(array $options = [])
    {
        $user_id = get_current_user_id();

        $this->post_author = $this->post_author ?? $user_id;
        $this->post_type   = $this->post_type ?? $this->postType;
        $this->post_name   = sanitize_title($this->post_name ?? $this->post_title, $this->ID);
        $this->post_status = $this->post_status ?? 'draft';

        return parent::save($options);
    }
}
