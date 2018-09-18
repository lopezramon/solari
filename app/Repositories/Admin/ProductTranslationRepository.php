<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductTranslation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductTranslationRepository
 * @package App\Repositories\Admin
 * @version August 28, 2018, 11:02 pm CEST
 *
 * @method ProductTranslation findWithoutFail($id, $columns = ['*'])
 * @method ProductTranslation find($id, $columns = ['*'])
 * @method ProductTranslation first($columns = ['*'])
*/
class ProductTranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductTranslation::class;
    }

    /**
     * Applies the given where conditions to the model.
     *
     * @param array $where
     * @return void
     */
    protected function applyConditions(array $where)
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->orWhere($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }
}
