<?php

namespace App\Repositories\Admin;

use App\Models\Admin\BlogComment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlogCommentRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @method BlogComment findWithoutFail($id, $columns = ['*'])
 * @method BlogComment find($id, $columns = ['*'])
 * @method BlogComment first($columns = ['*'])
*/
class BlogCommentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'comment',
        'blog_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BlogComment::class;
    }
}
