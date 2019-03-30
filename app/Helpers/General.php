<?php
use Illuminate\Contracts\Encryption\Encrypter;

if (! function_exists('encrypt')) {
	/**
	* Function for encrypt string.
	*
	* @param String
	* @return String
	*/
	function encrypt($string)
	{
		return Encrypter::encrypt($string);
	}
}

if (! function_exists('decrypt')) {
    /**
     * Function for decrypt string.
     *
     * @param String
     * @return string
     */
    function decrypt($string)
    {
        return Encrypter::decrypt($string);
    }
}
