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
use Modules\TMS\Entities\RegisteredTraineeEducation;
use Modules\TMS\Entities\RegisteredTraineeEmergency;
use Modules\TMS\Entities\RegisteredTraineeGeneralInfo;
use Modules\TMS\Entities\RegisteredTraineePhysicalInfo;
use Modules\TMS\Entities\RegisteredTraineeServiceInfo;
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
        if (array_key_exists('photo', $data)) {
            $file = $data['photo'];
            $photoName = $file->getClientOriginalName();
            $path = $this->upload($file, 'registered-trainees');
            $data['photo'] = $path;
        }

        $trainee = $this->save($data);
        $this->saveTraineeGeneralInfo($data, $trainee);
        $this->saveTraineeServiceInfo($data, $trainee);
        $this->saveTraineeEmergencyContact($data, $trainee);
        $this->saveTraineeEducation($data, $trainee);
        $this->saveTraineePhysicalInfo($data, $trainee);
        return $trainee;
    }

    private function saveTraineeGeneralInfo($data, $trainee): void
    {
        $traineeGeneralInfo = new RegisteredTraineeGeneralInfo($data);
        $trainee->generalInfos()->save($traineeGeneralInfo);
    }

    private function saveTraineeServiceInfo($data, $trainee): void
    {
        $traineeServiceInfo = new RegisteredTraineeServiceInfo($data);
        $trainee->services()->save($traineeServiceInfo);
    }

    private function saveTraineeEmergencyContact($data, $trainee): void
    {
        $traineeEmergencyContact = new RegisteredTraineeEmergency($data);
        $trainee->emergencyContacts()->save($traineeEmergencyContact);
    }

    private function saveTraineeEducation($data, $trainee): void
    {
        $traineeEducation = new RegisteredTraineeEducation($data);
        $trainee->educations()->save($traineeEducation);
    }

    private function saveTraineePhysicalInfo($data, $trainee): void
    {
        $traineePhysicalInfo = new RegisteredTraineePhysicalInfo($data);
        $trainee->physicalInfos()->save($traineePhysicalInfo);
    }


}