<?php
/**
 * Virtuemart Card Gate Plus payment extension
 *
 * NOTICE OF LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author      Paul Saparov, <support@cardgate.com>
 * @copyright   Copyright (c) 2012 Card Gate Plus B.V. - All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

defined('DS') or define('DS', DIRECTORY_SEPARATOR);

// Require the base controller
require_once( JPATH_COMPONENT.DS.'controller.php' );

// Require specific controller if requested
if ($controller = JRequest::getWord('controller')) {
    
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';

	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}
$method = JFactory::getApplication()->input->get('task');
// Create the controller
$classname	= 'CgpController'.$controller;

$controller	= new $classname();
// Perform the Request task
$controller->execute($method);
// Redirect if set by the controller
$controller->redirect();

