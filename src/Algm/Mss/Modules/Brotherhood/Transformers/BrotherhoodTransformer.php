<?php namespace Algm\Mss\Modules\Brotherhood\Transformers;

use \Brotherhood;
use League\Fractal\TransformerAbstract;

class BrotherhoodTransformer extends TransformerAbstract {

	public function transform(Brotherhood $brotherhood) {
		return [
			'id' => $brotherhood->id,
			'name' => $brotherhood->name
		];
	}
}