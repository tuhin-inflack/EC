<?php 
/**
 *  Created By - Imran Hossain - 25-05-2019
 */
namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class AuctionDetails extends Model
{

    protected $table = 'auction_details';
    protected $fillable = ['auction_id', 'category_id', 'quantity' ];

   

}