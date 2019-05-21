<?php
    namespace App;
    
    use Sober\Controller\Controller;

    //Using a class for this for when it expands to have more fields
class BusinessName extends Controller
{
    public $name;

    /**
         * @param string $template    template for the business name where {} will be replaced by the key word
         * @param string $keyWord     key word being used to generate the name.
         */
    public function __construct($template, $keyWord) {
        $this->name = str_replace("{}", $keyWord, $template);
    }
}
