<?php
function asset_url($asset_name, $asset_type = NULL) {
    $obj = & get_instance();
    $base_url = $obj->config->item('base_url');
    $asset_root = '/assets/';
    $asset_location = $base_url . $asset_root;

	if (is_array($asset_name))
	{
		$cachename = md5(serialize($asset_name));
		$asset_location .= 'cache/' . $cachename . '.' . $asset_type;
		if(!is_file($asset_root . 'cache/' . $cachename . '.' . $asset_type))
		{
			$out = fopen($asset_root . 'cache/' . $cachename . '.' . $asset_type, "w");
			foreach($asset_name as $file)
			{
				$file_content = file_get_contents($asset_root . $asset_type . '/' . $file);
				fwrite($out, $file_content);
			}
			fclose($out);
		}
	}
	else
	{
		$asset_location .= $asset_type . '/' . $asset_name;
	}
    return $asset_location;
}
function css_asset($asset_name,$attributes = array()) {
	$attribute_str = _parse_asset_html($attributes);
	return '<link href="' . asset_url($asset_name,'css') . '" rel="stylesheet" type="text/css"' . $attribute_str . ' />';
}
function js_asset($asset_name) {
	return '<script type="text/javascript" src="' . asset_url($asset_name,'js') . '"></script>';
}
function image_asset($asset_name, $module_name = '', $attributes = array()) {
	$attribute_str = _parse_asset_html($attributes);
	return '<img src="' . asset_url($asset_name,'img') . '"' . $attribute_str . ' />';
}
function _parse_asset_html($attributes = NULL)
{
	if (is_array($attributes)):
		$attribute_str = '';
		foreach ($attributes as $key => $value):
			$attribute_str .= ' ' . $key . '="' . $value . '"';
		endforeach;
		return $attribute_str;
	endif;
	return '';
}
?>
