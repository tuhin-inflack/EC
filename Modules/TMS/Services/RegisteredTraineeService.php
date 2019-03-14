<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 3/14/19
 * Time: 4:22 PM
 */

namespace Modules\TMS\Services;

use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Modules\TMS\Entities\RegisteredTraineeGeneralInfo;
use Modules\TMS\Repositories\RegisteredTraineeRepository;

class RegisteredTraineeService
{
    use CrudTrait;
    use FileTrait;

    /**
     * @var RegisteredTraineeRepository
     */
    private $registeredTraineeRepository;

    public function __construct(RegisteredTraineeRepository $registeredTraineeRepository)
    {
        /** @var RegisteredTraineeRepository $registeredTraineeRepository */
        $this->registeredTraineeRepository = $registeredTraineeRepository;

        $this->setActionRepository($registeredTraineeRepository);
    }

    public function store(array $data)
    {
        if (isset($data['photo'])) {
            $file = $data['photo'];
            $photoName = $file->getClientOriginalName();
            $path = $this->upload($file, 'registered-trainees');
            $data['photo'] = $path;
        }

        $trainee = $this->save($data);
        $this->saveTraineeGeneralInfo($data, $trainee);
        return $trainee;
    }

    private function saveTraineeGeneralInfo($data, $trainee): void
    {
        $traineeGeneralInfo = new RegisteredTraineeGeneralInfo($data);
        $trainee->generalInfos()->save($traineeGeneralInfo);
    }


}