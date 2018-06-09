<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: S.D Subrata
 * Date: 5/23/2018
 * Time: 9:23 PM
 */


    function RandomString()
    {
        $length = 12;

        $randomString = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTWXYZ987654321"), 0, $length);


        return $randomString;
    }

    function sitename(){
        $data = DB::table('setting')->find(1);
        $site = $data->sitename;
        return $site;
    }


function sms_send($to,$txt){

    $sendtext = urlencode("$txt");

    $data = DB::table('setting')->find(1);

    $appi = $data->sms_api;
    $appi = str_replace("{{number}}",$to,$appi);
    $appi = str_replace("{{text}}",$sendtext,$appi);

    $result = file_get_contents($appi);

}

/////////////////////--------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>




function mail_send($to,$subject,$uname,$txt)
{

    $data = DB::table('setting')->find(1);


    $headers = "From: $data->sitename <$data->email_id> \r\n";
    $headers .= "Reply-To: $data->sitename <$data->email_id> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


    $mm = str_replace("{{name}}", $uname, $data->emailtemp);
    $message = str_replace("{{message}}", $txt, $mm);


    if (mail($to, $subject, $message, $headers)) {
        //   echo 'Your message has been sent.';
    } else {
        // echo 'There was a problem sending the email.';
    }
}





class ago_time extends DateTime {

    protected $strings = array(
        'y' => array('1 year ago', '%d years ago'),
        'm' => array('1 month ago', '%d months ago'),
        'd' => array('1 day ago', '%d days ago'),
        'h' => array('1 hour ago', '%d hours ago'),
        'i' => array('1 minute ago', '%d minutes ago'),
        's' => array('now', '%d secons ago'),
    );

    /**
     * Returns the difference from the current time in the format X time ago
     * @return string
     */
    public function __toString() {
        $now = new DateTime('now');
        $diff = $this->diff($now);

        foreach($this->strings as $key => $value){
            if( ($text = $this->getDiffText($key, $diff)) ){
                return $text;
            }
        }
        return '';
    }

    /**
     * Try to construct the time diff text with the specified interval key
     * @param string $intervalKey A value of: [y,m,d,h,i,s]
     * @param DateInterval $diff
     * @return string|null
     */
    protected function getDiffText($intervalKey, $diff){
        $pluralKey = 1;
        $value = $diff->$intervalKey;
        if($value > 0){
            if($value < 2){
                $pluralKey = 0;
            }
            return sprintf($this->strings[$intervalKey][$pluralKey], $value);
        }
        return null;
    }

}
function tt(){
    $uss = DB::table('trxes')->where('user_id', Auth::user()->id )->get();
    foreach ($uss as $dd)
        if ($dd->user_id > 0 ) {


           return $dd->id;

   }



}


