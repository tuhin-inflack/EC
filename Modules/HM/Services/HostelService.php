<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/11/18
 * Time: 6:43 PM
 */

namespace Modules\HM\Services;


use Modules\HM\Entities\Hostel;
use Modules\HM\Repositories\HostelRepository;

class HostelService
{
    private $hostelRepository;

    /**
     * HostelService constructor.
     * @param HostelRepository $hostelRepository
     */
    public function __construct(HostelRepository $hostelRepository)
    {
        $this->hostelRepository = $hostelRepository;
    }

    public function getAll()
    {
        return $this->hostelRepository->findAll();
    }

    public function store(array $data)
    {
        return $this->hostelRepository->save($data);
    }

    public function update(Hostel $hostel, array $data)
    {
        return $this->hostelRepository->update($hostel, $data);
    }

    public function delete(Hostel $hostel)
    {
        return $this->hostelRepository->delete($hostel);
    }
}