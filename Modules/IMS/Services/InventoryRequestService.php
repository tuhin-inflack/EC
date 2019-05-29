<?php


namespace Modules\IMS\Services;


use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Modules\HRM\Services\EmployeeServices;
use Modules\IMS\Entities\InventoryRequestDetail;
use Modules\IMS\Repositories\InventoryItemCategoryRepository;
use Modules\IMS\Repositories\InventoryRequestRepository;

class InventoryRequestService
{
    use CrudTrait;

    private $inventoryRequestRepository;
    private $inventoryItemCategoryRepository;
    private $employeeService;
    private $locationService;
    private $inventoryItemCategoryService;

    public function __construct(
        InventoryRequestRepository $inventoryRequestRepository,
        EmployeeServices $employeeService,
        InventoryLocationService $locationService,
        InventoryItemCategoryService $inventoryItemCategoryService
    )
    {
        $this->inventoryRequestRepository = $inventoryRequestRepository;
        $this->employeeService = $employeeService;
        $this->locationService = $locationService;
        $this->inventoryItemCategoryService = $inventoryItemCategoryService;
        $this->setActionRepository($inventoryRequestRepository);
    }

    public function store(array $data){
        return DB::transaction(function () use ($data) {

            $data['requester_id'] = Auth::user()->id;

            $inventoryRequest = $this->save($data);

            foreach ($data['category'] as $category) {
//                if (!$category['category_id'] && !$category['quantity'])
//                    continue;

                $inventoryRequestDetail = new InventoryRequestDetail([
                    'category_id' => $category['category_id'],
                    'quantity' => $category['quantity'],
                ]);

                $inventoryRequest->details()->save($inventoryRequestDetail);

            }

            if ($data['request_type'] == 'requisition') {

                if (isset($data['new-category'])) {
                    foreach ($data['new-category'] as $newCategory) {

                        // Create New Inventory Item Category
                        $inventoryItemCategory = $this->inventoryItemCategoryService->save($newCategory);

                        // Insert Into Inventory Request Details
                        if ($inventoryItemCategory) {
                            $inventoryRequestDetail = new InventoryRequestDetail([
                                'category_id' => $inventoryItemCategory->id,
                                'quantity' => $newCategory['quantity'],
                            ]);

                            $inventoryRequest->details()->save($inventoryRequestDetail);
                        }

                    }
                }

                if (isset($data['bought-category'])) {
                    foreach ($data['bought-category'] as $boughtCategory) {
                        $inventoryRequestDetail = new InventoryRequestDetail([
                            'category_id' => $boughtCategory['category_id'],
                            'quantity' => $boughtCategory['quantity'],
                        ]);

                        $inventoryRequest->details()->save($inventoryRequestDetail);
                    }
                }
            }

            return $inventoryRequest;

        });
    }

    public function prepareViews($type){

        switch ($type){
            case 'requisition':
                return $this->getViewDataForRequisition();
                break;
            case 'transfer':
                return $this->getViewDataForTransfer();
                break;
            case 'scrap':
                return $this->getViewDataForScrap();
                break;
            case 'abandon':
                return $this->getViewDataForAbandon();
                break;
        }
    }

    private function getViewDataForRequisition(){
        $departmentId = Auth::user()->employee->department_id;
        $employees['options'] = ['' => trans('labels.select')] + $this->employeeService->getEmployeesForDropdown(
            null, null,
            ['department_id' => $departmentId, 'is_divisional_director' => false]
        );
        $employees['required'] = 1;

        $fromLocations  = $this->locationService->getMainStoreLocation();
        $toLocations = ['' => trans('labels.select')] +
            $this->locationService->getLocationsForDropdown(
                null, null,
                [
                    'department_id' => $departmentId,
                    'is_default' => false
                ]
            );
        $categories['items'] = ['' => 'Select'] +
            $this->inventoryItemCategoryService->getItemCategoryForDropdown(
                null, null,
                [
                    'is_active' => true
                ]
            );
        $categories['bought'] = ['' => 'Select'] + $this->inventoryItemCategoryService->getItemCategoryForDropdown();

        return [
            ['category', 'new-category', 'bought-category'],
            $employees,
            $fromLocations,
            $toLocations,
            $categories
        ];
    }

    private function getViewDataForTransfer(){
        $departmentId = Auth::user()->employee->department_id;
        $employees['options'] = array();
        $employees['required'] = 0;
        $fromLocations  = ['' => trans('labels.select')] +
            $this->locationService->getLocationsForDropdown(
                null, null,
                [
                    'department_id' => $departmentId,
                    'is_default' => false
                ]
            );
        $toLocations = ['' => trans('labels.select')] +
            $this->locationService->getLocationsForDropdown(
                null, null,
                [
                    'department_id' => $departmentId,
                    'is_default' => false
                ]
            );
        $categories['items'] = ['' => 'Select'] + $this->inventoryItemCategoryService->getItemCategoryForDropdown();
        $categories['bought'] = 0;

        return [
            ['category'],
            $employees,
            $fromLocations,
            $toLocations,
            $categories
        ];
    }

    private function getViewDataForScrap(){
        $departmentId = Auth::user()->employee->department_id;
        $employees['options'] = array();
        $employees['required'] = 0;
        $fromLocations  = ['' => trans('labels.select')] +
            $this->locationService->getLocationsForDropdown(
                null, null,
                [
                    'department_id' => $departmentId,
                    'is_default' => false
                ]
            );
        $toLocations = $this->locationService->getScrapLocation();
        $categories['items'] = ['' => 'Select'] + $this->inventoryItemCategoryService->getItemCategoryForDropdown();
        $categories['bought'] = 0;

        return [
            ['category'],
            $employees,
            $fromLocations,
            $toLocations,
            $categories
        ];
    }

    private function getViewDataForAbandon(){
        $departmentId = Auth::user()->employee->department_id;
        $employees['options'] = array();
        $employees['required'] = 0;
        $fromLocations  = ['' => trans('labels.select')] +
            $this->locationService->getLocationsForDropdown(
                null, null,
                [
                    'department_id' => $departmentId,
                    'is_default' => false
                ]
            );
        $toLocations = $this->locationService->getAbandonLocation();
        $categories['items'] = ['' => 'Select'] + $this->inventoryItemCategoryService->getItemCategoryForDropdown();
        $categories['bought'] = 0;

        return [
            ['category'],
            $employees,
            $fromLocations,
            $toLocations,
            $categories
        ];
    }
}