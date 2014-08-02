<?php namespace Algm\Mss\Modules\Brotherhood\Controllers;

use Algm\Mss\Modules\Brotherhood\Repositories\BrotherhoodRepository as Repo;
use Algm\Mss\Modules\Brotherhood\Transformers\BrotherhoodTransformer;
use League\Fractal\Manager;

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
}
