<?php


App::uses('AppHelper', 'View/Helper');

/**
 * Class ButtonsHelper
 *
 * @property BootstrapHtmlHelper $Html
 * @property BootstrapFormHelper $Form
 */
class ButtonsHelper extends AppHelper
{

	public $helpers = [
		'Html',
		'Form',
	];

	public function add($title = '', $url = [], $options = []) {

		if (empty($title)) {
			$title = __('Add');
		}
		return $this->Html->link($title, ['action' => 'add'], [
			'class' => 'btn btn-success',
			'icon' => 'plus',
		]);
	}

	public function export($title = '', $url = [], $options = []) {

		if (empty($title)) {
			$title = __('Add');
		}
		return $this->Html->link($title, ['action' => 'add'], [
			'class' => 'btn btn-success',
			'icon' => 'plus',
		]);
	}

	/**
	 * btnLinkView
	 *
	 * @param integer|array $url Insert the id or the url
	 * @param string        $title
	 * @param array         $options
	 * @return string
	 */
	public function view($url, $title = '', $options = []) {

		$defaults = [
			'class' => 'btn btn-primary btn-xs',
			'icon' => 'search',
		];
		if (!is_array($url)) {
			$url = ['action' => 'view', $url];
		}
		$options = array_merge($defaults, $options);
		return $this->Html->link($title, $url, $options);
	}
}
