<?php
namespace Ubiquity\annotations\items;

use mindplay\annotations\Annotation;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\utils\base\UArray;

/**
 * Base class for annotations.
 *
 * @usage('property'=>true, 'inherited'=>true)
 */
class BaseAnnotation extends Annotation {
use BaseAnnotationTrait;

	public function initAnnotation(array $properties) {
		foreach ( $properties as $name => $value ) {
			if (\is_array ( $this->$name )) {
				if (\is_array ( $value )) {
					foreach ( $value as $k => $v ) {
						$this->$name [$k] = $v;
					}
				} else {
					$this->$name [] = $value;
				}
			} else {
				$this->$name = $value;
			}
		}
	}
	
	protected function getDefaultParameters():array{
		$r=new \ReflectionClass($this);
		return $r->getDefaultProperties();
	}
	
	public function asAnnotation() {
		return "/**\n * ".$this."\n */";
	}

	public function __toString() {
		$fields = $this->getPropertiesAndValues ();
		$extsStr = UArray::asPhpArray ( $fields );
		$className = (new \ReflectionClass( $this ))->getShortName();
		$annotName = \substr ( $className, 0, \strlen ( $className ) - \strlen ( "Annotation" ) );
		return '@' . \lcfirst ( $annotName ) . $extsStr;
	}
}
