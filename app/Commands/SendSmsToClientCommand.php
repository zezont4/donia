<?php namespace App\Commands;

use Illuminate\Bus\Dispatcher;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Contract;
use App\MyHelper;

class SendSmsToClientCommand extends Command implements SelfHandling {

    public $contract_id;
    public $msg_id;

    public function __construct($contract_id, $msg_id)
    {
        $this->contract_id = $contract_id;
        $this->msg_id = $msg_id;
    }


    public function handle(Dispatcher $dispatcher)
    {
        $contract = Contract::with('client')->findOrFail($this->contract_id);

        $mobile_no = '966' . substr($contract->client->mobile_no, 1, 9);

        $msgContent = getSMSMessageByID($this->msg_id);
        $convertedSMSMessage = convertSMSVariables($msgContent, $this->contract_id);

        $dispatcher->dispatch(new SendSMSCommand($mobile_no, $convertedSMSMessage));
    }
}