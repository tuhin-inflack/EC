<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 1/27/19
 * Time: 12:06 PM
 */

namespace Modules\PMS\Services;

use App\Entities\Attribute;
use App\Entities\Organization\Organization;
use App\Services\UserService;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Modules\PMS\Entities\Project;
use Modules\PMS\Repositories\ProjectRepository;

class ProjectService
{
    use CrudTrait;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * ProjectService constructor.
     * @param ProjectRepository $projectRepository
     * @param UserService $userService
     */
    public function __construct(ProjectRepository $projectRepository, UserService $userService)
    {
        $this->projectRepository = $projectRepository;
        $this->setActionRepository($projectRepository);
        $this->userService = $userService;
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $project = $this->save($data);

            $project->attributes()->saveMany([
                new Attribute([
                    'name' => 'Deposit',
                    'unit' => 'tk',
                ]),
                new Attribute([
                    'name' => 'Loan',
                    'unit' => 'tk',
                ]),
                new Attribute([
                    'name' => 'Share',
                    'unit' => 'share',
                ]),
            ]);

            return $project;
        });
    }

    public function getProjectsForUser(User $user)
    {
        if ($this->userService->isProjectDivisionUser($user) || $this->userService->isDirectorGeneral()) {
            return $this->projectRepository->findAll();
        } else {
            return $this->projectRepository->findBy(['submitted_by' => $user->id]);
        }
    }

    public function getTotalMembersByGender(Project $project, $gender)
    {
        return $project->organizations->reduce(function ($carry, Organization $organization) use ($gender) {
            return $carry + $organization->members->where('gender', $gender)->count();
        }, 0);
    }
}