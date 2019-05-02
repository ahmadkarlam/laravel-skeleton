<?php
use Illuminate\Contracts\Encryption\Encrypter;

if (! function_exists('getNamedRoutes')) {
	/**
	* Function get all named routes.
	*
	* @return array
	*/
	function getNamedRoutes()
	{
        return array_filter(array_map(function (\Illuminate\Routing\Route $route) {
            return isset($route->action['as']) ? $route->action['as'] : null;
        }, (array) Route::getRoutes()->getIterator()));
	}
}

if (! function_exists('userInfo')) {
	/**
	* Function get current user.
	*
	* @return \App\User
	*/
	function userInfo()
	{
		return auth()->user();
	}
}

if (! function_exists('userRoles')) {
	/**
	* Function get current user role.
	*
	* @return Collection
	*/
	function userRoles()
	{
		return userInfo()->getRoleNames();
	}
}

if (! function_exists('userPermissions')) {
	/**
	* Function get current user permissions.
	*
	* @return Collection
	*/
	function userPermissions()
	{
		return userInfo()->getPermissionsViaRoles()->pluck('name');
	}
}

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
