<?php
namespace TestApp\Controller\Component;

use Cake\Controller\Component;

/**
 * @property \Cake\Controller\Component\FlashComponent $Flash
 * @property \TestApp\Controller\Component\RequestHandlerComponent $RequestHandler
 * @property \Shim\Controller\Component\SessionComponent $Session
 */
class MyComponent extends Component {

	/**
	 * @var array
	 */
	public $components = ['Flash', 'RequestHandler', 'Shim.Session'];

}
