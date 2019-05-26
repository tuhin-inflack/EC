<?php 

/**
 * Created By- Imran Hossain - 25-05-2019
 */

 namespace Modules\IMS\Services;
 use App\Traits\CrudTrait;
 use Modules\IMS\Entities\AuctionDetails;
 use Modules\IMS\Entities\Auction;
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

    /**
     * Store Auction Data and Auction Detail Data
     */
    public function auctionStore(array $data)
    {
        return DB::transaction(function () use ($data) {
            $auctionArray['title']=$data['auction_title'];
            $auctionArray['date'] = Carbon::createFromFormat('d/m/Y', $data['auction_date']);
            $auction=$this->save($auctionArray);
            $collectionOfAuctionDetails = collect($data['scrap_product']);
            // convert to model and save it in the db using save many
            $auctionDetails=$collectionOfAuctionDetails->map(function($auctionDetail) use ($auction){
                     $auctionDetail['auction_id']=$auction->id;
                     return new AuctionDetails($auctionDetail);

            }); 
            return $auction->details()->saveMany($auctionDetails);
        
        });

    }
    /**
     * Update Auction Data and Auction Detail Data
     */
    public function auctionUpdate(Auction $auction,array $data)
    {
        return DB::transaction(function () use ($auction,$data) {
           
            $auctionArray['title']=$data['auction_title'];
            $auctionArray['date'] = Carbon::createFromFormat('d/m/Y', $data['auction_date']);
            $this->update($auction,$auctionArray);
            
            // $auction->update($auctionArray);
            if(isset($data['scrap_product']))
            {
                $collectionOfAuctionDetails = collect($data['scrap_product']);
                // convert to model and update it 
                $newCollectionOfAuctionDetails=$collectionOfAuctionDetails->map(function($auctionDetail) use ($auction){
                    $auction->details()->UpdateOrCreate(
                        [
                            'id' => $auctionDetail['id'],
                        ], [
                            'auction_id' => $auction->id,
                            'category_id' => $auctionDetail['category_id'],
                            'quantity' => $auctionDetail['quantity']
                        ]
                    );
                });
                return $newCollectionOfAuctionDetails; 
            }
            
        });

    }






}