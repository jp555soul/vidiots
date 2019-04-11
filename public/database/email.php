<?php
//ConstantContact
require_once '../database/vendor/Ctct/autoload.php';
require_once '../database/vendor/autoload.php';

use Ctct\ConstantContact;
use Ctct\Components\Contacts\Contact;
use Ctct\Exceptions\CtctException;

define("APIKEY", "av583a9yzucgz8x8stcp7awn");
define("ACCESS_TOKEN", "12800515-861c-4bba-ab3c-6b8e6cf482f3");
$fail = "../fail";
$success = "../success";
$listID = "1669099080";

$cc = new ConstantContact(APIKEY);

try {
    $lists = $cc->listService->getLists(ACCESS_TOKEN);

} catch (CtctException $ex) {
    foreach ($ex->getErrors() as $error) {
        print_r($error);
    }
    if (!isset($lists)) {
        $lists = null;
    }
}

if(isset($_POST['email'])) {
    $day = date('n/j/Y');
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $data = $day . " - " .$_POST['email'] . "\r\n";

    if (check_email_address($email)) {
        $response = $cc->contactService->getContacts(ACCESS_TOKEN, array("email" => $email));


        if (empty($response->results)) {
            $action = "Creating Contact";

            $contact = new Contact();
            $contact->addEmail($email);
            $contact->addList($listID);
            $contact->first_name = $first_name;
            $contact->last_name = $last_name;

            /*
             * The third parameter of addContact defaults to false, but if this were set to true it would tell Constant
             * Contact that this action is being performed by the contact themselves, and gives the ability to
             * opt contacts back in and trigger Welcome/Change-of-interest emails.
             *
             * See: http://developer.constantcontact.com/docs/contacts-api/contacts-index.html#opt_in
             */
            $returnContact = $cc->contactService->addContact(ACCESS_TOKEN, $contact);

            // update the existing contact if address already existed
        } else {
            $action = "Updating Contact";

            $contact = $response->results[0];
            if ($contact instanceof Contact) {
                $contact->addList($listID);
                $contact->first_name = $first_name;
                $contact->last_name = $last_name;

                /*
                 * The third parameter of updateContact defaults to false, but if this were set to true it would tell
                 * Constant Contact that thatis action is being performed by the contact themselves, and gives the ability to
                 * opt contacts back in and trigger Welcome/Change-of-interest emails.
                 *
                 * See: http://developer.constantcontact.com/docs/contacts-api/contacts-index.html#opt_in
                 */
                $returnContact = $cc->contactService->updateContact(ACCESS_TOKEN, $contact);
            } else {
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$fail.'">';
                exit;
            }
        }
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$success.'">';
        exit;
    } else {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$fail.'?etc=invalid">';
        exit;
    }
} else {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$fail.'">';
    exit;
}





function check_email_address($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                return false;
            }
        }
    }

    return true;
}


?>