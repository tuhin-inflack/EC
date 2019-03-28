<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 1/27/19
 * Time: 12:06 PM
 */

namespace Modules\PMS\Services;

use App\Constants\DesignationShortName;
use App\Entities\Attribute;
use App\Entities\Organization\Organization;
use App\Services\UserService;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
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
     * ProjectService constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->setActionRepository($projectRepository);
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
        if ($this->isFacultyMember($user)) {
            return $this->projectRepository->findBy(['submitted_by' => $user->id]);
        } else {
            return $this->projectRepository->findAll();
        }
    }

    public function getTotalMembersByGender(Project $project, $gender)
    {
        return $project->organizations->reduce(function ($carry, Organization $organization) use ($gender) {
            return $carry + $organization->members->where('gender', $gender)->count();
        }, 0);
    }

    /**
     * @param User $user
     * @return bool
     */
    private function isFacultyMember(User $user): bool
    {
        return $user->employee->designation->short_name == DesignationShortName::FM;
    }
}