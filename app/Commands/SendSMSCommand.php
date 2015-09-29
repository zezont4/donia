<?php
namespace App\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

//use Illuminate\Contracts\Queue\ShouldBeQueued;

//use Illuminate\Queue\SerializesModels;

class SendSMSCommand extends Command implements SelfHandling {

    //    use SerializesModels;
//    use InteractsWithQueue;


    public $numbers;
    public $msgText;

    public function __construct($numbers, $msgText)
    {
        $this->numbers = $numbers;
        $this->msgText = urlencode($msgText);
    }

    public function handle()
    {
//        if (true)
//        {
//            $this->release(5);
//        }

        $respond = $this->sendSMS($this->numbers, $this->msgText);
        if ($respond->Code == 100) {
            $respond->MessageIs = 'تم إرسالة رسالة نصية بنجاح . SMS Message sent  successfully';
            Session::flash('info99', $respond->MessageIs);
        } else {
            $msg = 'عفوا... لم يتم إرسال رسالة نصية للسبب التالي : ' . $respond->MessageIs;
            Log::warning($msg . "\r\n" . $this->numbers . "\r\n" . $this->msgText);
            Session::flash('warning99', $msg);
        }
    }


    /**
     * Send SMS message
     * @return array
     */
    public function sendSMS()
    {
        $username = env('SMS_USERNAME');
        $password = env('SMS_PASSWORD');
        $senderName = env('SMS_SENDER_NAME');

        $url = "http://www.fss-sms.com/smartsms/api/sendsms.php?username=$username&password=$password&numbers=$this->numbers&message=$this->msgText&sender=$senderName&unicode=E&lang=ar&Rmduplicated=1&return=json";


        if ($respond = @file_get_contents($url)) {
            return json_decode(nl2br($respond));
        } else {
            Log::warning('عفوا.. يوجد خلل في موقع الرسائل' . "\n" . $url);

            return json_decode('{"MessageIs" : " يوجد خلل في موقع الرسائل","Code":"error"}');
        }
    }
}
