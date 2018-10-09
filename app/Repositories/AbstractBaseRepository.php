<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 10/8/18
 * Time: 5:24 PM
 */

namespace App\Repositories;


use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


abstract class AbstractBaseRepository implements RepositoryInterface
{
    /**
     * Name of the Model with absolute namespace
     *
     * @var string
     */
    protected $modelName;

    /**
     * Instance that extends Illuminate\Database\Eloquent\Model
     *
     * @var Model
     */
    protected $model;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Instantiate Model
     *
     * @throws \Exception
     */
    public function setModel()
    {
        //check if the class exists
        if (class_exists($this->modelName)) {
            $this->model = new $this->modelName;

            //check object is a instanceof Illuminate\Database\Eloquent\Model
            if (!$this->model instanceof Model) {
                throw new \Exception("{$this->modelName} must be an instance of Illuminate\Database\Eloquent\Model");
            }

        } else {
            throw new \Exception('No model name defined');
        }
    }

    /**
     * Get Model instance
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Find a resource by id
     *
     * @param $id
     * @return Model|null
     */
    public function findOne($id)
    {
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * Find a resource by criteria
     *
     * @param array $criteria
     * @return Model|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->model->where($criteria)->first();
    }

    /**
     * Search All resources by criteria
     *
     * @param array $searchCriteria
     * @return Collection
     */
    public function findBy(array $searchCriteria = [])
    {
        $limit = !empty($searchCriteria['per_page']) ? (int)$searchCriteria['per_page'] : 15; // it's needed for pagination

        $queryBuilder = $this->model->where(function ($query) use ($searchCriteria) {

            $this->applySearchCriteriaInQueryBuilder($query, $searchCriteria);
        }
        );

        return $queryBuilder->paginate($limit);
    }

    /**
     * Search All resources by any values of a key
     *
     * @param string $key
     * @param array $values
     * @return Collection
     */
    public function findIn($key, array $values)
    {
        return $this->model->whereIn($key, $values)->get();
    }

    /**
     * Save a resource
     *
     * @param array $data
     * @return Model
     */
    public function save(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a resource
     *
     * @param Model $model
     * @param array $data
     */
    public function update(Model $model, array $data)
    {
        $fillAbleProperties = $this->model->getFillable();

        foreach ($data as $key => $value) {
            // update only fillAble properties
            if (in_array($key, $fillAbleProperties)) {
                $model->$key = $value;
            }
        }

        // update the model
        $model->save();
    }

    /**
     * Delete a resource
     *
     * @param Model $model
     * @return mixed
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }
}
