<?php

namespace Monitor\ReusableCodes\Helpers;

/**
 * @author Jackson Chegenye {chegenyejackson@gmail.com}
 * @link https://github.com/jchegenye
 * 
 */
class CommonHelper
{

    /**
     * Abbreviate a string using PHP. 
     * This function returns a string containing only the 
     * first letters of each word in an input string capitalized.
     * 
     * USAGE
     * ---
     * 
     * (1). Add 'AbbreviateStringHelper' => Monitor\ReusableCodes\Helpers\AbbreviateStringHelper::class
     * to your config file.
     * 
     * (2). Add this {{ AbbreviateStringHelper::abbreviate("Hello World") }} to your view files.
     *
     * @return string (Abbriviated)
     * 
     * For example: 
     * echo abbreviate("Hello World"); 
     * Output: HW
     */
    public static function abbreviate($string)
    {

        $abbreviation = "";
        $string = ucwords($string);
        $words = explode(" ", "$string");
            foreach($words as $word){
                $abbreviation .= $word[0];
            }

       return $abbreviation;

    }

    /**
     * Custome app name from settings.
     *
     * @return string
     * 
     */
    public static function custom_app_name()
    {

        $name = "Legibra Hosting" ." ". config('app.name', 'Monitor');
        return $name;
        
    }
    

}