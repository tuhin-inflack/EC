<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/24/18
 * Time: 7:31 PM
 */

namespace Modules\Accounts\Services;


use Modules\Accounts\Repositories\AccountHeadRepository;
use Modules\Accounts\Repositories\AccountLedgerRepository;

class AccountService
{
    protected $accountHeadRepository;
    protected $accountLedgerRepository;

    /**
     * AccountHeadServices constructor.
     */
    public function __construct(AccountHeadRepository $accountHeadRepository, AccountLedgerRepository $accountLedgerRepository)
    {
        $this->accountHeadRepository = $accountHeadRepository;
        $this->accountLedgerRepository = $accountLedgerRepository;
    }

    public function getAllAccountList(){
        $string = '';

        $mainHeads = $this->accountHeadRepository->getMainParentHeads();

        foreach ($mainHeads as $mainHead){

            $string .= '<tr class="active">' .
                '<td><strong>' . $mainHead->name . ' - ' . $mainHead->code . '</strong></th>' .
                '<td><strong>Group</strong></td>' .
                '<td>-</td>' .
                '<td>&nbsp;</td>' .
                '</tr>';

            foreach ($ledgers = $this->accountLedgerRepository->getLedgersOfHead($mainHead->id) as $ledger) {

                $ledgerRowAction = '<div align="center">' .
                    '<a tabindex="-1" href="' . url('account/edit_ledger/' . $ledger->id) . '" title="Edit" class="popup-link"><i class="la la-pencil-square-o text-info" aria-hidden="true"></i></a>' .
                    '<a tabindex="-1" href="' . url('account/delete_ledger/' . $ledger->id) . '" title="Delete" onclick="return confirm(\'Sure to delete ?\')"><i class="la la-trash-o text-danger" aria-hidden="true"></i></a>' .
                    '</div>';

                $string .= '<tr>' .
                    '<td>&nbsp;&nbsp;' . $ledger->name . ' - ' . $ledger->code .'</th>' .
                    '<td>Ledger</td>' .
                    '<td>' . $ledger->opening_balance . '</td>' .
                    '<td>' . $ledgerRowAction . '</td>' .
                    '</tr>';
            }

            $string .= $this->getAllChildAccountList($mainHead->id);
        }

        return $string;
    }

    /**
     * @param $head
     * @return String
     */
    private function getAllChildAccountList($head, $space = '')
    {
        $string = '';

        $space .= $space . '&nbsp;&nbsp;&nbsp;&nbsp;';

        foreach ($childGroups = $this->accountHeadRepository->getChildHead($head) as $childGroup)
        {
            $headRowAction = '<div align="center">' .
                '<a tabindex="-1" href="' . url('account/edit_group/' . $childGroup->id) . '" title="Edit" class="popup-link"><i class="fa fa-edit text-info" aria-hidden="true"></i></a>' .
                '<a tabindex="-1" href="' . url('account/delete_group/' . $childGroup->id) . '" title="Delete" onclick="return confirm(\'Sure to delete ?\')"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>' .
                '</div>';

            $string .= '<tr>' .
                '<td>' . $space . ' <strong>' . $childGroup->name . '</strong></th>' .
                '<td><strong>Group</strong></td>' .
                '<td>-</td>' .
                '<td>' . $headRowAction . '</td>' .
                '</tr>';

            foreach ($ledgers = $this->accountLedgerRepository->getLedgersOfHead($childGroup->id) as $ledger) {

                $ledgerRowAction = '<div align="center">' .
                    '<a tabindex="-1" href="' . url('account/edit_ledger/' . $ledger->id) . '" title="Edit" class="popup-link"><i class="la la-pencil-square-o text-info" aria-hidden="true"></i></a>' .
                    '<a tabindex="-1" href="' . url('account/delete_ledger/' . $ledger->id) . '" title="Delete" onclick="return confirm(\'Sure to delete ?\')"><i class="la la-trash-o text-danger" aria-hidden="true"></i></a>' .
                    '</div>';

                $string .= '<tr>' .
                    '<td>&nbsp;&nbsp;' . $ledger->name . ' - ' . $ledger->code .'</th>' .
                    '<td>Ledger</td>' .
                    '<td>' . $ledger->opening_balance . '</td>' .
                    '<td>' . $ledgerRowAction . '</td>' .
                    '</tr>';
            }


            $string .= $this->getAllChildAccountList($childGroup->id, $space);

        }


        return $string;
    }

}