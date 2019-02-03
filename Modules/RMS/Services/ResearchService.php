<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 1/24/19
 * Time: 6:36 PM
 */
namespace Modules\RMS\Services;

use App\Services\TaskService;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Modules\RMS\Repositories\ResearchRepository;


class ResearchService{

    use CrudTrait;
    /**
     * @var ResearchRepository
     */
    private $researchRepository;
    /**
     * @var TaskService
     */
    private $taskService;

    /**
     * ResearchService constructor.
     * @param ResearchRepository $researchRepository
     */
    public function __construct(ResearchRepository $researchRepository)
    {
        $this->researchRepository = $researchRepository;
        $this->setActionRepository($researchRepository);
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $research = $this->save($data);
            return $research;
        });
    }

    public function getAll()
    {
        return $this->researchRepository->findAll();
    }
}