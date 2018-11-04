<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 11/4/2018
 * Time: 7:51 PM
 */

namespace Modules\HRM\Services;


use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeeTrainingRepository;

class EmployeeTrainingService {
	use CrudTrait;
	protected $employeeTrainingRepository;

	public function __construct( EmployeeTrainingRepository $employeeTrainingRepository ) {
		$this->employeeTrainingRepository = $employeeTrainingRepository;
		$this->setActionRepository( $this->employeeTrainingRepository );
	}

	public function StoreTrainingInfo( $trainings ) {
		foreach ( $trainings as $training ) {
			$trainingInfo = $this->employeeTrainingRepository->save( $training );
		}

		return $trainingInfo;
	}

}