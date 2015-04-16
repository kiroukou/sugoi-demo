<?php

class php_db__PDO_PHPNativeStrategy extends php_db__PDO_TypeStrategy {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("php.db._PDO.PHPNativeStrategy::new");
		$__hx__spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function map($data) {
		$GLOBALS['%s']->push("php.db._PDO.PHPNativeStrategy::map");
		$__hx__spos = $GLOBALS['%s']->length;
		if(!isset($data["native_type"])) {
			if(isset($data["precision"])) {
				$GLOBALS['%s']->pop();
				return "int";
			} else {
				$GLOBALS['%s']->pop();
				return "string";
			}
		}
		$pdo_type_str = PDO::PARAM_STR;
		$pdo_type = $data["pdo_type"];
		$type = $data["native_type"];
		$type = strtolower($type);
		switch($type) {
		case "float":case "decimal":case "double":case "newdecimal":{
			$GLOBALS['%s']->pop();
			return "float";
		}break;
		case "date":case "datetime":case "timestamp":{
			$GLOBALS['%s']->pop();
			return "date";
		}break;
		case "bool":case "tinyint(1)":{
			$GLOBALS['%s']->pop();
			return "bool";
		}break;
		case "int":case "int24":case "int32":case "long":case "longlong":case "short":case "tiny":{
			$GLOBALS['%s']->pop();
			return "int";
		}break;
		case "blob":{
			if($pdo_type === $pdo_type_str) {
				$GLOBALS['%s']->pop();
				return "string";
			} else {
				$GLOBALS['%s']->pop();
				return "blob";
			}
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return "string";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'php.db._PDO.PHPNativeStrategy'; }
}