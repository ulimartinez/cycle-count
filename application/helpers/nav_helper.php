<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @desc Simple function to check if current page is equal to nav list element.
 *       This case return "active" as class name for the list element.
 * @param String $pageID
 * @param String $linkID
 * @return String/Null
 */
function isActive($pageID,$linkID){
    if($pageID == $linkID){
        return "active";
    }
}

/**
 * Takes a needle and haystack (just like in_array()) and does a wildcard search on it's values.
 *
 * @param    string        $string        Needle to find
 * @param    array        $array        Haystack to look through
 * @result    array                    Returns the elements that the $string was found in
 */
function wildcard_in_array ($string, $array = array ())
{       
    foreach ($array as $value) {
        if (strpos($string, $value) !== false) {
            return true;
        }
    }       
    return false;
}

function remove_http($url) {
   $disallowed = array('http://', 'https://');
   foreach($disallowed as $d) {
      if(strpos($url, $d) === 0) {
         return str_replace($d, '', $url);
      }
   }
   return $url;
}

?>