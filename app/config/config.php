<?php
return array (
		"siteUrl" => "http://pdg-est-2.sts-sio-caen.info",
		"database" => array (
				"type" => "mysql",
				"dbName" => "qcm",
				"serverName" => "127.0.0.1",
				"port" => 3306,
				"user" => "sio2a",
				"password" => "sio2a",
				"options" => array (),
				"cache" => false,
				"wrapper" => "Ubiquity\\db\\providers\\pdo\\PDOWrapper"
		),
		"sessionName" => null,
		"namespaces" => array (),
		"templateEngine" => "Ubiquity\\views\\engine\\Twig",
		"templateEngineOptions" => array (
				"cache" => false
		),
		"test" => false,
		"debug" => true,
		"logger" => function () {
			return new \Ubiquity\log\libraries\UMonolog ( array (
					'host' => '127.0.0.1',
					'port' => 8090,
					'sessionName' => 's5fc4a2ec7c61e'
			) ['sessionName'], \Monolog\Logger::INFO );
		},
		"di" => array (
				"@exec" => array (
						"jquery" => function ($controller) {
							return \Ubiquity\core\Framework::diSemantic ( $controller ) ;
						}
				)
		),
		"cache" => array (
				"directory" => "cache/",
				"system" => "Ubiquity\\cache\\system\\ArrayCache",
				"params" => array ()
		),
		"mvcNS" => array (
				"models" => "models",
				"controllers" => "controllers",
				"rest" => ""
		),
		"isRest" => function () {
			return \Ubiquity\utils\http\URequest::getUrlParts () [0] === "rest";
		}
);
