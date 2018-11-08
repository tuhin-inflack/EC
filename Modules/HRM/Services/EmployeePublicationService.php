<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 11/5/2018
 * Time: 11:31 AM
 */

namespace Modules\HRM\Services;


use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeePublicationRepository;

class EmployeePublicationService {
	use CrudTrait;
	protected $employeePublicationRepository;

	public function __construct( EmployeePublicationRepository $employeePublicationRepository ) {
		$this->employeePublicationRepository = $employeePublicationRepository;
		$this->setActionRepository( $this->employeePublicationRepository );
	}

	public function storeEmployeePublication( $publications ) {
		foreach ( $publications as $publication ) {
			$publication = $this->employeePublicationRepository->save( $publication );

		}

		return $publication;
	}

}