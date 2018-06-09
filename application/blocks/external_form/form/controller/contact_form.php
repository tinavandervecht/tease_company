<?php
namespace Application\Block\ExternalForm\Form\Controller;

use Concrete\Core\Controller\AbstractController;
use Loader;
use Exception;
use stdClass;
use SendGrid;
use Page;

class ContactForm extends AbstractController
{

    //------------------------[ Setup Form Configuration Properties ]----------------------//

    protected $config;

    public function __construct()
    {
        $this->config = new stdClass();

        // Basic Form Properties
        $this->config->formName                 = "contact_form";
        $this->config->honeypotHandle           = "website";
        $this->config->successURL               = "/thank-you";

        // Database table name to store form results
        $this->config->tableForFormSubmissions   = "custom_form_submissions";
        $this->config->tableSchema               = "`id` int(11) NOT NULL AUTO_INCREMENT,
                                                    `name` varchar(255) DEFAULT NULL,
                                                    `subject` varchar(255) DEFAULT NULL,
                                                    `message` text DEFAULT NULL,
                                                    `honeypot` text DEFAULT NULL,
                                                    `recipients` text DEFAULT NULL,
                                                    `date_created` datetime DEFAULT NULL,
                                                    `page_name` varchar(255) DEFAULT NULL,
                                                    `page_url` varchar(255) DEFAULT NULL,
                                                    `form_name` varchar(255) DEFAULT NULL,
                                                    PRIMARY KEY (`id`)";

        // Mail config
        $this->config->emailSubject              = "Tease & Company - Contact Form";
        $this->config->emailTo                   = "teaseandcompany1@gmail.com";  //Note: if sending to an email provided via the submission data, that would be done like so: $this->post('email_address')
        $this->config->emailReplyTo              = "noreply@teaseandcompany.com";
        $this->config->emailFrom                 = "submission@teaseandcompany.com";
        $this->config->emailConfirmationSubject  = "Thanks for your Submission!";

        // Concrete5 Database Loader
        $this->db = Loader::db();

        // Built-in Concrete5 validation for strings. Useful for validating emails.
        $this->validation = Loader::helper('validation/strings');
    }


    //------------------------[ Default function to run on form initialization ]----------------------//

    public function on_start()
    {
        // This will prevent the submission from saving and sending the email more than once...
        $_SESSION[$this->config->formName]['sent'] = FALSE;
    }


    //---------------------------------[ Submission Preparation Functions ]--------------------------------//

    protected function getSubmissionData()
    {
        $dt = Loader::helper('form/date_time');
        $text = Loader::helper('text');

        $submission = array();
        foreach ($this->post() as $key => $value) {
            if ($key != 'submit') {
                if (!is_array($value)) {
                    if ($key == $this->config->honeypotHandle) {
                        $submission['honeypot'] = $text->sanitize(trim($value));
                    } else {
                        $submission[$key] = $text->sanitize(trim($value));
                    }
                } elseif (is_array($value) && count($value) > 0) {
                    $submission[$key] = $text->sanitize(trim(implode(",", $value)));
                }
            }
        }

        return $submission;
    }

    protected function setHiddenSubmissionData($submission)
    {
        $submission['recipients']   = $this->getEmailConfigValue('to');
        $submission['date_created'] = date('Y-m-d H:i:s');

        $nh = Loader::helper('navigation');
        $page = Page::getCurrentPage();
        $submission['page_name']    = $page->getCollectionName();
        $submission['page_url']     = $nh->getCollectionURL($page);
        $submission['form_name']    = $this->config->formName;

        return $submission;
    }

    private function prepareSubmission()
    {
        //get all $_POST submission data
        $submission = $this->getSubmissionData();

        //set hidden values
        $submission = $this->setHiddenSubmissionData($submission);

        return $submission;
    }


    //---------------------------------[ Email Preparation Functions ]--------------------------------//

    protected function getEmailBody()
    {
        $body = '';
        $body .= '<strong><i>Submitted Data:</i></strong><br>';
        $body .= '<strong>Name:</strong> '.$this->submission['name'].'<br>';
        $body .= '<strong>Subject:</strong> '.$this->submission['subject'].'<br>';
        $body .= '<strong>How can we help you?</strong><br />'.$this->submission['message'];
        $body .= '<br /><br />';
        $body .= '<strong>Submitted at:</strong> '.$this->submission['date_created'];

        return $body;
    }

    protected function getEmailConfirmationBody()
    {
        $body = "Thank you for your submission. We will get in touch with you as soon as possible.<br><br>";
        $body .= "Below is a copy of your submission:<br><br>";
        $body .= $this->getEmailBody();
        return $body;
    }

    private function prepareEmail()
    {
        $headers =
            "From:" . $this->config->emailFrom . "\r\n".
            "MIME-Version: 1.0\n".
            "Content-type: text/html; charset=iso-8859-1";

        $config = array(
            'to'          => $this->config->emailTo,
            'replyto'     => $this->config->emailReplyTo,
            'from'        => $this->config->emailFrom,
            'subject'     => $this->config->emailSubject,
            'body'        => $this->getEmailBody(),
            'headers'     => $headers
        );

        return $config;
    }

    private function getEmailConfigValue($property){
        $email = $this->prepareEmail();
        return $email[$property];
    }


    //---------------------------------[ Submit Type & Submit Function ]--------------------------------//

    public function action_submit($bID = false)
    {
        $this->config->submitType = 'default';
        $this->submit();
    }

    public function submit()
    {
        $this->submission = $this->prepareSubmission();

        $this->errors = $this->validateForm();

        if (count($this->errors) > 0) {
            $this->submissionFailure('Form validation failed.');
        } else {
            if ($this->post($this->config->honeypotHandle) == ''){
                if (isset($_SESSION[$this->config->formName]['sent']) && $_SESSION[$this->config->formName]['sent'] == TRUE) {
                    $this->submissionFailure('Form was recently submitted already.');
                } else {
                    $this->submissionSuccess();
                }
            }
        }
    }


    //-------------------------------------[ Submission Results ]--------------------------------------//

    protected function getSuccessURL()
    {
        return $this->config->successURL;
    }

    protected function getFailureURL($message = '')
    {
        $message = rtrim($message, '.');
        $url = $_SERVER['HTTP_REFERER'];
        $parsedURL = parse_url($url);
        $redirectURL = explode('?', $url);
        $redirectURL = $redirectURL[0];
        if (strpos($parsedURL['query'], 'submission') === FALSE) {
            $redirectURL .= (isset($parsedURL['query'])) ? '?'.$parsedURL['query'] : '';
            $redirectURL .= (strpos($redirectURL, '?') > 0) ? '&' : '?';
            $redirectURL .= 'submission=failure&form='.$this->config->formName.'&msg='.urlencode($message);
        } else {
            $redirectURL .= '?'.$parsedURL['query'];
        }
        return $redirectURL;
    }

    private function submissionSuccess()
    {
        //save this value into the session so the form can not be 'spammed' by sending it again
        $_SESSION[$this->config->formName]['sent'] = TRUE;

        //save these values into the session so the values can be accessed elsewhere
        $_SESSION[$this->config->formName]['submission'] = $this->submission;
        $_SESSION[$this->config->formName]['uploaded_files'] = $this->uploadedFiles;

        //clear all errors from this form
        if (isset($_SESSION[$this->config->formName]['errors'])) {
            unset($_SESSION[$this->config->formName]['errors']);
        }

        //save results to Database
        if ($this->config->tableForFormSubmissions != '') {
            $this->saveToDatabase();
        }

        //send the email
        $this->sendEmail();

        //redirect to success page
        $this->redirect($this->getSuccessURL());
    }

    private function submissionFailure(
        $message = 'Something went wrong with your submission',
        $disableUponSubmission = FALSE
    ) {
        //save these values into the session so the values can be accessed elsewhere
        $_SESSION[$this->config->formName]['error_msg'] = $message;
        $_SESSION[$this->config->formName]['errors'] = $this->errors;
        $_SESSION[$this->config->formName]['submission'] = $this->submission;
        $_SESSION[$this->config->formName]['uploaded_files'] = $this->uploadedFiles;

        //redirect to failure page
        if ($disableUponSubmission===TRUE) {
            $_SESSION[$this->config->formName]['disabled'] = TRUE;
        }
        header('Location: '.$this->getFailureURL($message));
    }

    //----------------------------------------[ Send Email ]-----------------------------------------//

    private function sendEmail()
    {
        //setup email config
        $email = $this->prepareEmail();
        $mh = Loader::helper('mail');

        //1. send email to client
        $mh->to($email['to']);
        $mh->from($email['from']);
        $mh->replyto($email['replyto']);
        $mh->setSubject($email['subject']);
        $mh->setBodyHTML($email['body']);
        $mh->sendMail();

        //2. send confirmation email to person who submitted the form
        if ($this->config->sendConfirmationEmail===TRUE && $this->config->emailConfirmationSubject != "") {
            $mh->reset(); //resets the class scope variables.
            $mh->to($email['replyto']);
            $mh->from($email['from']);
            $mh->setSubject($this->config->emailConfirmationSubject);
            $mh->setBodyHTML($this->getEmailConfirmationBody());
            $mh->sendMail();
        }
    }

    //-----------------------------------[ Save Results to Database ]------------------------------------//

    private function saveToDatabase(
        $table = '',
        $data = array(),
        $id = FALSE,
        $returnNewID = FALSE
    ){
        $table = $table != '' ? $table : $this->config->tableForFormSubmissions;
        $data = !empty($data) ? $data : $this->submission;

        if (!$this->checkIfTableExists($table)) {
            $this->CREATE_TABLE($table);
        }

        if ($id === FALSE) {
            $save = $this->INSERT($table, $data, $returnNewID);
        } else {
            $save = $this->UPDATE($table, $data, $id);
        }

        return $save;
    }

    private function INSERT($table, $data, $returnNewID)
    {
        $fields = '';
        $emptyValues = '';
        $arrayOfValues = array();
        $data = $this->getSubmissionDataToSaveForDatabase($data);
        foreach ($data as $key => $val){
            $fields .= $key.',';
            $emptyValues .= '?,';
            array_push($arrayOfValues, $val);
        }
        $fields = rtrim($fields, ',');
        $emptyValues = rtrim($emptyValues, ',');

        $result = $this->db->Execute("INSERT INTO ".$table."(".$fields.") VALUES(".$emptyValues.")", $arrayOfValues);

        if ($returnNewID===FALSE) {
            return $result;
        } else {
            return $this->db->insert_id();
        }
    }

    private function UPDATE($table, $data, $id = FALSE, $primaryKey = 'id')
    {
        $fields = '';
        $arrayOfValues = array();
        $data = $this->getSubmissionDataToSaveForDatabase($data);
        foreach ($data as $key => $val){
            $fields .= $key.'=?,';
            array_push($arrayOfValues, $val);
        }
        $fields = rtrim($fields, ',');

        if ($id !== FALSE) {
            return $this->db->Execute("UPDATE ".$table." SET ".$fields." WHERE ".$primaryKey."='".$id."'", $arrayOfValues);
        }
    }

    private function CREATE_TABLE($table = '', $tableSchema = '') {
        $table = $table != '' ? $table : $this->config->tableForFormSubmissions;
        $tableSchema = $tableSchema != '' ? $tableSchema : $this->config->tableSchema;
        if ($table != '' && $tableSchema != '') {
            $this->db->Execute("CREATE TABLE `".$table."` (" . $tableSchema . ") ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");
        }
    }

    private function getSubmissionDataToSaveForDatabase($data) {
        foreach ($data as $key => $value){
            if ($this->checkIfFieldIsSavingToDatabase($key) === FALSE) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    private function checkIfFieldIsSavingToDatabase($fieldName = '') {
        if ($fieldName == '') {
            throw new Exception("Variable \$fieldName requires a value to be set. Error occured in Application\Controller\ArcaneExternalFormController::formatStringFromKeyName()");
        }
        //continue...
        if (!empty($this->config->fieldsToIgnoreForDatabase)) {
            foreach ($this->config->fieldsToIgnoreForDatabase as $fieldToIgnore) {
                if ($fieldName == $fieldToIgnore) {
                    return FALSE;
                    break;
                }
            }
        } else {
            return TRUE;
        }
    }

    private function checkIfTableExists($table = '') {
        $table = $table != '' ? $table : $this->config->tableForFormSubmissions;
        if ($table != '') {
            $result = $this->db->GetAll('SHOW TABLES LIKE "'.$table.'"');
            return (empty($result)) ? FALSE : TRUE;
        }
    }


    //---------------------------------------[ Backend Validation Functions ]---------------------------------------//

    protected function validateForm()
    {
        $errors = array();

        // Validate all fields which have the "required" attribute from on the form template
        if ($this->submission['name'] == '') {
            $errors['name']['empty'] = "This field is required.";
        }
        if ($this->submission['subject'] == '') {
            $errors['subject']['empty'] = "This field is required.";
        }
        if ($this->submission['message'] == '') {
            $errors['message']['empty'] = "This field is required.";
        }

        return $errors;
    }

    //---------------------------------------[ Helper Functions ]---------------------------------------//

    private function formatStringFromKeyName($str = '', $formatting = NULL) {
        if ($str == '') {
            throw new Exception("Variable \$str requires a value to be set. Error occured in Application\Controller\ArcaneExternalFormController::formatStringFromKeyName()");
        }

        $camelCaseWords = preg_split('/(?<=[a-z])(?=[A-Z])/x', $str);
        // Is a camelCase variable, convert to human readable
        if (count($camelCaseWords) > 1) {
            $str = $this->convertFromCamelCase($str);
        }

        // Strip out any underscores or hyphens
        $str = str_replace('_', ' ', $str);
        $str = str_replace('-', ' ', $str);

        if ($formatting != NULL) {
            return $formatting($str);
        } else {
            return $str;
        }
    }

    private function convertFromCamelCase($str = '') {
        $words = preg_split('/(?<=[a-z])(?=[A-Z])/x', $str);
        return implode(' ', $words);
    }

}
