<?php

namespace Modules\RMS\Services;

use App\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\RMS\Entities\ResearchRequestAttachment;
use Modules\RMS\Entities\ResearchRequestReceiver;
use Modules\RMS\Repositories\ResearchRequestRepository;

class ResearchRequestService
{
    use CrudTrait;

    private $researchRequestRepository;


    public function __construct(ResearchRequestRepository $researchRequestRepository)
    {
        $this->researchRequestRepository = $researchRequestRepository;
        $this->setActionRepository($researchRequestRepository);
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $data['status'] = 'pending';

            $researchRequest = $this->save($data);

            foreach ($data['attachment'] as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('research-requests', $filename);

                $file = new ResearchRequestAttachment([
                    'attachments' => $filename,
                    'research_request_id' => $researchRequest->id
                ]);

                $researchRequest->researchRequestAttachments()->save($file);
            }

            foreach ($data['to'] as $receiver) {
                $receiver = new ResearchRequestReceiver([
                    'to' => $receiver,
                    'research_request_id' => $researchRequest->id
                ]);

                $researchRequest->researchRequestReceivers()->save($receiver);
            }

            return $researchRequest;
        });
    }
}