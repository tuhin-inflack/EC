<?php 

/**
 * Created By- Imran Hossain - 25-05-2019
 */

 namespace Modules\IMS\Services;
 use App\Traits\CrudTrait;
 use Modules\IMS\Repositories\AuctionRepository;

class AuctionService{

    use CrudTrait;


    private $_auctionRepository;

    public function __construct(AuctionRepository $auctionRepository)
    {
        $this->_auctionRepository=$auctionRepository;

    }





}