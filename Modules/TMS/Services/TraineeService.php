<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 12/24/18
 * Time: 7:24 PM
 */

namespace Modules\TMS\Services;

use App\Traits\CrudTrait;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\TMS\Entities\Trainee;
use Modules\TMS\Repositories\TraineeRepository;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class TraineeService
{
    use CrudTrait;

    private $traineeRepository;

    public function __construct(TraineeRepository $traineeRepository)
    {
        $this->traineeRepository = $traineeRepository;

        $this->setActionRepository($traineeRepository);
    }

    public function updateTrainee($id, array $data)
    {
        $trainee = $this->findOrFail($id);

        DB::transaction(function () use ($trainee, $data) {
            return $this->update($trainee, $data);
        });
    }

    public function fetchTraineesWithID($trainingId)
    {
        $trainees = $this->traineeRepository->fetchTrainees($trainingId);

        return $trainees;
    }

    public function fetchSingle($traineeId)
    {
        $trainee = $this->traineeRepository->fetchSingleTrainee($traineeId);

        return $trainee;
    }

    public function importCSV(Request $data)
    {
        $arr_file = explode('.', $data->file('import_file')->getClientOriginalName());
        $extension = end($arr_file);

        if('csv' == $extension) {
            $reader = new Csv();
        } else {
            $reader = new Xlsx();
        }
        $spreadsheet = $reader->load($data->file('import_file')->getPathname());
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        return $sheetData;
    }

    public function traineeListValidator(array $list)
    {
        $errList = array();
        foreach ($list as $key=>$item)
        {
            $chkErr = 0;
            if($item[0] == "" || $item[1] =="") $chkErr = 1;
            if(!in_array(ucwords($item[2]) , array('Male', 'Female', 'Others'))) $chkErr = 1;

            $mobile = $item[3]; $mobileLen = strlen($mobile); $chkOperator = substr($mobile, 0,3);
            if(!in_array($chkOperator, array('017', '013', '015', '016', '018', '019')) || $mobileLen != 11) $chkErr =1;
            if($chkErr) $errList[] = $key;
        }

        return $errList;
    }

    public function assignedTraineeNo($trainingId)
    {
        $traineeNo = $this->traineeRepository->fetchAssignedTraineeNo($trainingId);

        return $traineeNo;
    }

}
