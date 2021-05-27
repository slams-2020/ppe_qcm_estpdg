<?php

namespace Ubiquity\db\traits;

use Ubiquity\db\utils\DbTypes;

/**
 * Retreives metadatas from the database.
 *
 * Ubiquity\db\traits$DatabaseMetadatas
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.3
 *
 * @property \Ubiquity\db\providers\AbstractDbWrapper $wrapperObject
 */
trait DatabaseMetadatas {

	public function getTablesName() {
		return $this->wrapperObject->getTablesName ();
	}

	public function getPrimaryKeys($tableName) {
		return $this->wrapperObject->getPrimaryKeys ( $tableName );
	}

	public function getFieldsInfos($tableName) {
		return $this->wrapperObject->getFieldsInfos ( $tableName );
	}

	public function getForeignKeys($tableName, $pkName, $dbName = null) {
		return $this->wrapperObject->getForeignKeys ( $tableName, $pkName, $dbName );
	}

	public function getRowNum(string $tableName, string $pkName, string $condition): int {
		return $this->wrapperObject->getRowNum ( $tableName, $pkName, $condition );
	}

	public function getPHPType(string $dbType): string {
		return DbTypes::asPhpType($dbType);
	}
}

