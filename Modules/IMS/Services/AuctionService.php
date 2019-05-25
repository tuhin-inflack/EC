<?php 

/**
 * Created By- Imran Hossain - 25-05-2019
 */

 namespace Modules\IMS\Services;
 use App\Traits\CrudTrait;
 use Modules\IMS\Repositories\AuctionRepository;
 use Illuminate\Support\Facades\DB;
 use Carbon\Carbon;

class AuctionService{

    use CrudTrait;

    private $_auctionRepository;

    public function __construct(AuctionRepository $auctionRepository)
    {
        $this->_auctionRepository=$auctionRepository;
        $this->setActionRepository($this->_auctionRepository);
    }

    public function AuctionStore(array $data)
    {

        // dd($data);
        return DB::transaction(function () use ($data) {
            $auctionArray['title']=$data['auction_title'];
            $auctionArray['date'] = Carbon::createFromFormat('d/m/Y', $data['auction_date']);
            $this->save($auctionArray);
            // $collectionOfAuctionDetails = collect($data['scrap_products']);

        });

    }






}