<?php

class Model_Book
{
	private $_dbTable;

	public function __construct() {
		$this->_dbTable = new Model_DbTable_Books();
	}

	public function listBooks() {
		return $this->_dbTable->fetchAll(
			$this->_dbTable->select()
			);
	}


}

