<?php namespace Algm\Mss\Modules\Brotherhood\Controllers;

use Algm\Mss\Modules\Brotherhood\Repositories\BrotherhoodRepository as Repo;
use Algm\Mss\Modules\Brotherhood\Transformers\BrotherhoodTransformer;
use League\Fractal\Manager;
use Way\Tests\Factory;
use \Input;

/**
 *
 */
class BrotherhoodsApiController extends \Algm\Mss\Controllers\ApiController {

	public function __construct(Repo $brotherhood) {
		parent::__construct(new Manager);

		$this->Brotherhood = $brotherhood;
	}

	public function index() {
		$brotherhoods = $this->Brotherhood->user();

		return $this->outputCollection($brotherhoods, new BrotherhoodTransformer);
	}

	public function show($id = null) {
		$brotherhood = $this->Brotherhood->get($id);

		if (empty($brotherhood)) {
			return $this->notFound('Hermandad no encontrada');
		}

		return $this->outputItem($brotherhood, new BrotherhoodTransformer);
	}

	public function store() {
		list($result, $brotherhood) = $this->Brotherhood->create(Input::json()->all());

		if (!$result) {
			//dd($brotherhood->errors());
			if (!empty($brotherhood->errors())) {
				return $this->setStatusCode(400)->outputError($brotherhood->errors()->toArray(), 'MSS-INVALIDDATA');
			}

			return $this->internalError('No se pudo crear la hermandad debido a un error interno.');
			/*Notification::error('No se ha podido efectuar el registro, por favor comprueba los errores e inténtalo de nuevo.');
			return Redirect::action('UsersController@create')->withErrors($brotherhood->errors());*/
		}

		return $this->outputItem($brotherhood, new BrotherhoodTransformer);
	}
}
