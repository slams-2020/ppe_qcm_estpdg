<?php

namespace Ubiquity\controllers\rest\formatters;

use Ubiquity\orm\OrmUtils;
use Ubiquity\utils\http\URequest;

/**
 * Ubiquity\controllers\rest\formatters$JsonApiRequestFormatter
 * This class is part of Ubiquity
 *
 * @author jc
 * @version 1.0.0
 *
 */
class JsonApiRequestFormatter extends RequestFormatter {

	public function getDatas(?string $model = null): array {
		$datas = URequest::getRealInput ();
		if (\count ( $datas ) > 0) {
			$datas = \current ( array_keys ( $datas ) );
			$datas = \json_decode ( $datas, true );
			$attributes = $datas ['data'] ['attributes'] ?? [ ];
			if (isset ( $datas ['data'] ['id'] )) {
				$key = OrmUtils::getFirstKey ( $this->model );
				$attributes [$key] = $datas ['data'] ['id'];
			}
			$this->loadRelationshipsDatas ( $datas, $attributes );
			return $attributes;
		}
	}

	protected function loadRelationshipsDatas($datas, &$attributes) {
		if (isset ( $datas ['data'] ['relationships'] )) {
			$relationShips = $datas ['data'] ['relationships'];
			foreach ( $relationShips as $member => $data ) {
				if (isset ( $data ['data'] ['id'] )) {
					$m = OrmUtils::getJoinColumnName ( $this->model, $member );
					$attributes [$m] = $data ['data'] ['id'];
				}
			}
		}
	}
}