<?php
namespace Motekar\WPORM\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Model Class
 *
 * @package Motekar\WPORM\Eloquent
 *
 * @author Fadlul Alim <fad.lee@hotmail.com>
 */
class Model extends Eloquent
{
	/**
	 * @param array $attributes
	 */
	public function __construct( array $attributes = array() ) {
		static::$resolver = new Resolver();

		parent::__construct( $attributes );
	}
}
