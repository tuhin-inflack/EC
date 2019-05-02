<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 5/2/19
 * Time: 3:59 PM
 */

namespace Modules\IMS\Services;

use App\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\IMS\Repositories\ProductRepository;

class ProductService
{
    use CrudTrait;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        /** @var ProductRepository $productRepository */
        $this->productRepository = $productRepository;
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['date'] = Carbon::createFromFormat("j F, Y", $data['date']);
            $product = $this->productRepository->save($data);
            return $product;
        });
    }
}