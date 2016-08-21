<?php
/* autoload all classes */
function my_autoloader($class) {
    include 'classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

/* get data from the request */
$request = $_REQUEST;

/** Scrub
 *
 * Scrub the data to remove special characters
 * 
 * Receives: Array
 * Response: Array
**/
$scrub = new Scrub($request);
$data = $scrub->scrubData();

/** ValidateFactory
 *
 * Validate the data against business rules
 * 
 * Receives: Array
 * Response: Boolean
**/
$validateData = ValidateFactory::create($data);
$isValid = $validateData->validateData();

/* send a reply if it is invalid or move on */
if (!$isValid){
    $reply=ReplyFactory::create(0,'data','Your data is invalid', '');
    $reply->sendReply();
} else {
    /* set a session ID */
    $data['session_id'] = "1234567890";
    
    /** Publishers
     *
     * Get configuration for the publisher
     * 
     * Receives: String
     * Response: Array
    **/
    $publishers = new Publishers($data['pubID']);
    $pub = $publishers->getPub();
    
    /* if the publisher has a valid config, send data to the distribution */
    if (!empty($pub)) {
        if (!empty($pub['dist'])) {
            foreach ($pub['dist'] as $buyer){
                print "<p>{$buyer}<p>";
            }
        }
    } else {
        $reply=ReplyFactory::create(0,'pub','Your Pub ID is invalid',$data['session_id']);
        $reply->sendReply();
    }
}
?>