<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 1/27/19
 * Time: 12:06 PM
 */

namespace Modules\PMS\Services;

use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Modules\PMS\Repositories\ProjectRepository;

class ProjectService
{
    use CrudTrait;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->setActionRepository($projectRepository);
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $project = $this->save($data);
            return $project;
        });
    }

    public function getAll()
    {
        return $this->projectRepository->findAll();
    }
}