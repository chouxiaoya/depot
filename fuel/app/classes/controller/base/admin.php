<?php
/**
 * Part of Fuel Depot.
 *
 * @package    FuelDepot
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2012 Fuel Development Team
 * @link       http://depot.fuelphp.com
 */

class Controller_Base_Admin extends Controller_Base_Template
{
	/**
	 * @param   none
	 * @throws  none
	 * @returns	void
	 */
	public function before()
	{
		// users need to be logged in to access this controller
		if ( ! \Auth::check())
		{
			\Messages::error('You can not access that page. Please login first');
			\Response::redirect('/users/login');
		}

		elseif ( ! Auth::has_access('access.admin'))
		{
			\Messages::error('Access denied. You need to be an administrator to access that page');
			\Response::redirect('/');
		}

		// set the admin template layout
		$this->template = \Theme::instance()->view('templates/admin');

		parent::before();
	}
}
