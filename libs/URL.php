<?php
class URL
{
	public static function createLink($module, $controller, $action, $params = null)
	{
		$linkParams = '';
		if (!empty($params)) {
			foreach ($params as $key => $value) {
				if (!empty($value)) {
					$linkParams .= "&{$key}={$value}";
				}
			}
		}
		return sprintf(ROOT_URL . 'index.php?module=%s&controller=%s&action=%s%s', $module, $controller, $action, $linkParams);
	}

	public static function direct($module = 'backend', $controller = 'group', $action = 'index', $params = null)
	{
		$linkParams = '';
		if (!empty($params)) {
			foreach ($params as $key => $value) {
				if (!empty($value)) {
					$linkParams .= "&{$key}={$value}";
				}
			}
		}
		header(sprintf("location: index.php?module=%s&controller=%s&action=%s%s", $module, $controller, $action, $linkParams));
		exit();
	}
}
