<?php

namespace Ubiquity\annotations\items\rest;

use Ubiquity\annotations\items\BaseAnnotation;

/**
 * Annotation Rest.
 * usages :
 * - rest
 * - rest("resource"=>"modelClassname")
 *
 * @author jc
 * @version 1.0.0.1
 * @usage('class'=>true, 'inherited'=>true)
 */
class RestAnnotation extends BaseAnnotation {
	public $resource;
}
