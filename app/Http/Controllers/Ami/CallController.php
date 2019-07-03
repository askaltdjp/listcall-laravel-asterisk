<?php

namespace App\Http\Controllers\Ami;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\HstList;
use Artisan;
use Redirect;

class CallController extends Controller
{ 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        /**
         * Find phone number
         */
        $get = HstList::where(['id' => Input::get('callid')])->firstOrFail();

        /**
         * Open new socker
         */
        $fp = fsockopen(env("SERVERIP", "127.0.0.1"), 5038, $errno, $errstr, 10);      

        /**
         * If error
         */
        if (!$fp) { 

            /**
             * show why
             */
            echo ''.$errstr.' ('.$errno.')';

        } else {

            /**
             * Login Ami user
             */
            fputs($fp, "Action: Login\r\n");
            fputs($fp, "UserName: dialer\r\n");
            fputs($fp, "Secret: 12345678\r\n\r\n");

            /**
             * Call
             */
            fputs($fp, "Action: Originate\r\n");
            fputs($fp, "Channel: SIP/".$get->phonenumber."\r\n");
            fputs($fp, "Context: phones\r\n");
            fputs($fp, "Exten: 1000\r\n");
            fputs($fp, "Priority: 1\r\n\r\n");  
            fputs($fp, "Timeout: 30000\r\n\r\n");   

            /**
             * Loop through respons
             */
            while (!feof($fp)){

                /**
                 * Show error
                 */
                $output = fgets($fp);   

                /**
                 * Read output
                 */
                if (strpos($output, 'Event: RTCPReceived') !== false) {

                    /**
                     * Close connection
                     */
                    fclose($fp);

                    /** 
                     * Hangup
                     */
                    return Redirect::back()->withErrors(['You are currently calling with the customer.']);
                    
                }

                /**
                 * Check if hangup
                 */
                if (strpos($output, 'Event: Hangup') !== false) {

                    /**
                     * Close connection
                     */
                    fclose($fp);

                    /**
                     * Hangup
                     */
                    return Redirect::back()->withErrors(['The customer has hanged up.']);

                }

                /**
                 * Check if dail ends
                 */
                if (strpos($output, 'Event: DialEnd') !== false) {

                    /**
                     * Close connection
                     */
                    fclose($fp);
 
                    /**
                     * Hangup
                     */
                    return Redirect::back()->withErrors(['The customer has not picked up.']);

                }

                /**
                 * Check if dail ends
                 */
                if (strpos($output, 'Event: InvalidAccountID') !== false) {

                    /**
                     * Close connection
                     */
                    fclose($fp);
 
                    /**
                     * Hangup
                     */
                    return Redirect::back()->withErrors(['This phonenumber doesnt exists']);

                }

                /**
                 * Check if dail ends
                 */
                if (strpos($output, 'Event: RequestBadFormat') !== false) {

                    /**
                     * Close connection
                     */
                    fclose($fp);
 
                    /**
                     * Hangup
                     */
                    return Redirect::back()->withErrors(['This number doesnt exists.']);

                }

            }

        }

    }

}
