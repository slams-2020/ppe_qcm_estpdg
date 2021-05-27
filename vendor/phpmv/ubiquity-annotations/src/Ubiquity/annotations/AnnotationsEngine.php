<?php
namespace Ubiquity\annotations;

use Ubiquity\annotations\items\JoinColumnAnnotation;
use Ubiquity\annotations\items\ManyToManyAnnotation;
use Ubiquity\annotations\items\OneToManyAnnotation;
use mindplay\annotations\AnnotationCache;
use mindplay\annotations\AnnotationManager;
use mindplay\annotations\Annotations;

class AnnotationsEngine implements AnnotationsEngineInterface {

	/**
	 *
	 * @var array array of annotations name/class
	 */
	protected static $registry;

	public function start(string $cacheDirectory): void {
		self::$registry = [
			'id' => 'Ubiquity\annotations\items\IdAnnotation',
			'manyToOne' => 'Ubiquity\annotations\items\ManyToOneAnnotation',
			'oneToMany' => 'Ubiquity\annotations\items\OneToManyAnnotation',
			'manyToMany' => 'Ubiquity\annotations\items\ManyToManyAnnotation',
			'joinColumn' => 'Ubiquity\annotations\items\JoinColumnAnnotation',
			'table' => 'Ubiquity\annotations\items\TableAnnotation',
			'database' => 'Ubiquity\annotations\items\DatabaseAnnotation',
			'transient' => 'Ubiquity\annotations\items\TransientAnnotation',
			'column' => 'Ubiquity\annotations\items\ColumnAnnotation',
			'validator' => 'Ubiquity\annotations\items\ValidatorAnnotation',
			'transformer' => 'Ubiquity\annotations\items\TransformerAnnotation',
			'joinTable' => 'Ubiquity\annotations\items\JoinTableAnnotation',
			'requestMapping' => 'Ubiquity\annotations\items\router\RouteAnnotation',
			'route' => 'Ubiquity\annotations\items\router\RouteAnnotation',
			'get' => 'Ubiquity\annotations\items\router\GetAnnotation',
			'getMapping' => 'Ubiquity\annotations\items\router\GetAnnotation',
			'post' => 'Ubiquity\annotations\items\router\PostAnnotation',
			'postMapping' => 'Ubiquity\annotations\items\router\PostAnnotation',
			'put' => 'Ubiquity\annotations\items\router\PutAnnotation',
			'putMapping' => 'Ubiquity\annotations\items\router\PutAnnotation',
			'patch' => 'Ubiquity\annotations\items\router\PatchAnnotation',
			'patchMapping' => 'Ubiquity\annotations\items\router\PatchAnnotation',
			'delete' => 'Ubiquity\annotations\items\router\DeleteAnnotation',
			'deleteMapping' => 'Ubiquity\annotations\items\router\DeleteAnnotation',
			'options' => 'Ubiquity\annotations\items\router\OptionsAnnotation',
			'optionsMapping' => 'Ubiquity\annotations\items\router\OptionsAnnotation',
			'var' => 'mindplay\annotations\standard\VarAnnotation',
			'yuml' => 'Ubiquity\annotations\items\YumlAnnotation',
			'rest' => 'Ubiquity\annotations\items\rest\RestAnnotation',
			'authorization' => 'Ubiquity\annotations\items\rest\AuthorizationAnnotation',
			'injected' => 'Ubiquity\annotations\items\di\InjectedAnnotation',
			'autowired' => 'Ubiquity\annotations\items\di\AutowiredAnnotation'
		];
		Annotations::$config['cache'] = new AnnotationCache($cacheDirectory . '/annotations');
		self::register(Annotations::getManager());
	}

	public function registerAnnotations(array $nameClasses): void {
		$annotationManager = Annotations::getManager();
		foreach ($nameClasses as $name => $class) {
			self::$registry[$name] = $class;
			$annotationManager->registry[$name] = $class;
		}
	}

	protected function register(AnnotationManager $annotationManager) {
		$annotationManager->registry = \array_merge($annotationManager->registry, self::$registry);
	}

	public function getAnnotsOfClass(string $class, ?string $annotationType = null): array {
		return Annotations::ofClass($class, $this->getAnnotationByKey($annotationType));
	}

	public function getAnnotationByKey(?string $key = null): ?string {
		if ($key !== null) {
			if (\array_key_exists($key, self::$registry)) {
				return '@' . \ltrim($key, '@');
			}
		}
		return null;
	}

	public function getAnnotsOfProperty(string $class, string $property, ?string $annotationType = null): array {
		return Annotations::ofProperty($class, $property, $this->getAnnotationByKey($annotationType));
	}

	public function getAnnotsOfMethod(string $class, string $method, ?string $annotationType = null): array {
		return Annotations::ofMethod($class, $method, $this->getAnnotationByKey($annotationType));
	}

	public function getAnnotation(?object $container, string $key, array $parameters = []): ?object {
		if (isset(self::$registry[$key])) {
			$classname = self::$registry[$key];
			$annot = new $classname();
			$annot->initAnnotation($parameters);
			return $annot;
		}
		return null;
	}

	public function getAnnotationsStr(array $annotations, string $prefix = "\t"): string {
		$annotationsStr = '';
		$size = \count($annotations);
		if ($size > 0) {
			$annotationsStr = $prefix . "/**";
			\array_walk($annotations, function ($item) {
				return $item . '';
			});
			if ($size > 1) {
				$annotationsStr .= "\n{$prefix} * " . implode("\n{$prefix} * ", $annotations);
			} else {
				$annotationsStr .= "\n{$prefix} * " . \end($annotations);
			}
			$annotationsStr .= "\n{$prefix} */";
		}

		return $annotationsStr;
	}

	public static function isManyToOne(object $annotation): bool {
		return $annotation instanceof JoinColumnAnnotation;
	}

	public static function isMany(object $annotation): bool {
		return ($annotation instanceof OneToManyAnnotation) || ($annotation instanceof ManyToManyAnnotation);
	}

	public function is(string $key, object $annotation): bool {
		$class = self::$registry[$key] ?? null;
		if ($class !== null) {
			return $annotation instanceof $class;
		}
		return false;
	}

	public function getUses(): array {
		return [];
	}
	
	public function registerAcls():void {
		self::registerAnnotations([
			'allow' => \Ubiquity\annotations\items\acl\AllowAnnotation::class,
			'resource' => \Ubiquity\annotations\items\acl\ResourceAnnotation::class,
			'permission' => \Ubiquity\annotations\items\acl\PermissionAnnotation::class
		]);
	}
}

