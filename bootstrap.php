<?php

class Autoloader {

	public function includeFile($nameSpace) {
		$path = str_replace('_', '/', $nameSpace) . '.php';
		$fileExists = self::fileExists($nameSpace);

		$skip = array(
			'PHPUnit.*'
		);

		foreach ($skip as $pattern) {
			if (preg_match('~'.$pattern.'~i', $nameSpace)) {
				return false;
			}
		}

		if (false === $fileExists) {
			self::throwException($nameSpace);
		}

		include_once $path;
	}

	private static function throwException($nameSpace) {
		$msg = 'The file to class-name: "' . $nameSpace . '" does not exists in our supported environment include paths.';
		throw new Autoloader_Exception($msg);
	}

	public static function fileExists($nameSpace) {
		$path = str_replace('_', '/', $nameSpace) . '.php';

		// check of valid file
		$fileExists = false;
		$includePaths = explode(':', get_include_path());
		foreach ($includePaths as $currentPath) {
			$testFile = $currentPath . '/' . $path;

			if (is_readable($testFile)) {
				$fileExists = true;
				break;
			}
		}

		return $fileExists;
	}
}

class Autoloader_Exception extends Exception {
}

$strIncludePath = get_include_path() . ':' . dirname(__FILE__) . DIRECTORY_SEPARATOR;
set_include_path($strIncludePath);

spl_autoload_register(array(
	new Autoloader(),
	'includeFile'
));