<?php

PerchSystem::register_feather('Bootstrap');

class PerchFeather_Bootstrap extends PerchFeather
{
	const VERSION = '3.0.2';

	private function _merge_options($defaults, $options, $defaultKey='version')
	{
		if(!empty($options))
		{			
			if(!is_array($options)) {
				$options = array( $defaultKey => is_string($options)? $options : $defaults[$defaultKey] );
			}
			foreach($defaults as $key => $default) {
				if(array_key_exists($key, $options)) $defaults[$key] = $options[$key];
			}
		}
		return $defaults;
	}

	protected $components = array(
		'css' => 'bootstrap',
		'js' => 'bootstrap-js'
	);
	
	protected function get_options(&$opts)
	{
		$options = $this->_merge_options(array(
			'theme' => null,
			'version' => PerchFeather_Bootstrap::VERSION
		), $opts['bootstrap'], 'theme');

		$this->components['css'] = empty($options['theme'])? 'bootstrap' : 'bootswatch-'.$options['theme'];

		return $options;
	}

	public function get_css($opts, $index, $count)
	{
		$out = array();
		
		/* Main component: bootstrap/bootswatch-THEME */

		$options = $this->get_options($opts);

		if(!$this->component_registered($this->components['css']))
		{
			$out[] = $this->_link_tag(array(
				'rel' => 'stylesheet',
				'href' => $options['theme']
					? '//netdna.bootstrapcdn.com/bootswatch/'.$options['version'].'/'.$options['theme'].'/bootstrap.min.css'
					: '//netdna.bootstrapcdn.com/bootstrap/'.$options['version'].'/css/bootstrap.min.css'
			));
			$this->register_component($this->components['css']);
		}
		
		/* Optional components */
		
		// font-awesome
		if(!empty($opts['font-awesome'])
		&& !$this->component_registered('font-awesome'))
		{
			$options = $this->_merge_options(array(
				'version' => '4.0.2'
			), $opts['font-awesome']);
			//$version = is_string($options['font-awesome'])? $options['font-awesome'] : '4.0.2';

			$out[] = $this->_link_tag(array(
				'rel' => 'stylesheet',
				'href' => '//netdna.bootstrapcdn.com/font-awesome/'.$options['version'].'/css/font-awesome.min.css'
			));
			$this->component_registered('font-awesome');
		}

		return join("\n", $out);
	}
	
	public function get_javascript($opts, $index, $count)
	{
		$out = array();
		
		/* Pre-requisite components */

		// jquery
		if(!$this->component_registered('jquery'))
		{
			$options = $this->_merge_options(array(
				'version' => ''
			), $opts['jquery']);

			$out[] = $this->_script_tag(array(
				'src'=>'//code.jquery.com/jquery'.(empty($options['version'])? '' : '-'.$options['version']).'.min.js'
			));
			$this->register_component('jquery');
		}
		
		/* Main component: bootstrap-js */
		
		$options = $this->get_options($opts);

		if(!$this->component_registered($this->components['js']))
		{
			$out[] = $this->_script_tag(array(
				'src' => '//netdna.bootstrapcdn.com/bootstrap/'.$options['version'].'/js/bootstrap.min.js',
				'async' => true
			));
			$this->register_component('bootstrap-js');
		}

		return join("\n", $out);
	}
}
