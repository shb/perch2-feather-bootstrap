<?php

PerchSystem::register_feather('Bootstrap');

class PerchFeather_Bootstrap extends PerchFeather
{
	public function get_css($opts, $index, $count)
	{
		$theme = !empty($opts) && array_key_exists('bootswatch', $opts)
			? $opts['bootswatch'] : null;
			
		$out = array();

		$out[] = $this->_link_tag(array(
			'rel' => 'stylesheet',
			'href' => $theme
				? '//netdna.bootstrapcdn.com/bootswatch/3.0.1/'.$theme.'/bootstrap.min.css'
				: '//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css'
		));

		return join("\n", $out);
	}
	
	public function get_javascript($opts, $index, $count)
	{
		$out = array();

		if (!$this->component_registered('jquery')) {
			$out[] = $this->_script_tag(array(
				'src'=>'//code.jquery.com/jquery.min.js'
			));
			$this->register_component('jquery');
		}

		$out[] = $this->_script_tag(array(
			'src' => '//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js',
			'async' => true
		));
		
		return join("\n", $out);
	}
}
