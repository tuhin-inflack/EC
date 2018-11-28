<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 11/25/2018
 * Time: 6:03 PM
 */

namespace Modules\HRM\Services;


use App\Traits\CrudTrait;
use Modules\HRM\Repositories\InstituteRepository;

class InstituteService {
	use CrudTrait;
	private $instituteRepository;


	public function __construct( InstituteRepository $instituteRepository ) {
		$this->instituteRepository = $instituteRepository;
		$this->setActionRepository( $this->instituteRepository );
	}

	public function getInstitutes() {
		$institutes          = $this->instituteRepository->findAll()->pluck( 'name', 'id' )->toArray();
		$institutes['other'] = 'Other\'s';

		return $institutes;
	}

	public function storeInstitute( $data ) {
		$institute = $this->save( $data );
		return $institute;
	}

}