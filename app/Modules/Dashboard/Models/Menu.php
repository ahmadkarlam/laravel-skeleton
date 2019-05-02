<?php

namespace App\Modules\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	/**
     * The attributes for table name.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'parent', 'name', 'display_name', 'icon', 'pattern', 'href', 'is_parent', 'type', 'position', 'description'
    ];

	/**
     * Function for get all menus.
     *
     * @param enum ['backend', 'frontend']
     * @return array
     */
    public function getMenus($type)
    {
    	$menus = $this->select('parent', 'name', 'display_name', 'icon', 'pattern', 'href', 'is_parent', 'type', 'position', 'description')->orderBy('position', 'asc')->get();
    	return $this->formatingMenus($menus);
    }

    /**
     * Function for mapping all menus.
     *
     * @param collection menus
     * @return array
     */
    private function formatingMenus($menus)
    {
    	$formatedMenus = array();
   		foreach ($menus as $key => $menu) {
   			$menu = $menu->makeHidden(['parent']);
   			if($menu->is_parent) {
   				$formatedMenus[$menu->pattern] = $menu->toArray();
   			} else {
   				$formatedMenus[$menu->pattern]['childs'] = $menu->toArray();
   			}
   		}
    	return $formatedMenus;
    }
}
