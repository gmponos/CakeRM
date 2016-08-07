<?php

/**
 * Copyright 2014, George Mponos
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2014, George Mponos
 * @author    George Mponos, <gmponos@gmail.com>
 * @link      http://github.com/gmponos/CakeTwitterBootstrap
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Class ElementHelper
 *
 * @property BootstrapHtmlHelper $Html
 * @property BootstrapFormHelper $Form
 */
class ElementHelper extends AppHelper
{

	/**
	 * Helpers array
	 */
	public $helpers = [
		'Html' => [
			'className' => 'BootstrapHtml',
		],
		'Form' => [
			'className' => 'BootstrapForm',
		],
	];

	/**
	 * btnLinkAdd
	 *
	 * @param array  $url the url
	 * @param string $title
	 * @param array  $options
	 * @return string
	 */
	public function btnToolbarAdd(array $url = [], $title = '', array $options = []) {

		if ($title == '') {
			$title = __('Add');
		}
		if (empty($url)) {
			$url = ['action' => 'add'];
		}
		$options = array_merge([
			'class' => 'btn btn-success btn-sm',
			'icon' => ['class' => 'fa fa-plus fa-fw'],
		], $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * btnToolbarReturn
	 *
	 * @param array  $url the url
	 * @param string $title
	 * @param array  $options
	 * @return string
	 */
	public function btnToolbarReturn(array $url = [], $title = '', array $options = []) {

		if ($title == '') {
			$title = __('Return');
		}
		if (empty($url)) {
			$url = ['action' => 'index'];
		}
		$options = array_merge([
			'class' => 'btn btn-warning btn-sm',
			'icon' => ['class' => 'fa fa-arrow-left fa-fw'],
		], $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * btnLinkAdd
	 *
	 * @param array  $url the url
	 * @param string $title
	 * @param array  $options
	 * @return string
	 */
	public function btnToolbarMail($url, $title = '', array $options = []) {

		if ($title == '') {
			$title = __('Mail');
		}
		if (!is_array($url)) {
			$url = ['admin' => false, 'action' => 'mail', $url];
		}
		$options = array_merge([
			'class' => 'btn btn-primary btn-sm',
			'icon' => ['class' => 'fa fa-envelope fa-fw'],
			'data-toggle' => 'email',
		], $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * btnLinkEdit
	 *
	 * @param integer|array $url Insert the id or the url
	 * @param string        $title
	 * @param array         $options
	 * @return string
	 */
	public function btnToolbarEdit($url, $title = '', array $options = []) {

		if (!is_array($url)) {
			$url = ['action' => 'edit', $url];
		}
		if ($title == '') {
			$title = __('Edit');
		}
		$options = Hash::merge([
			'class' => ['btn btn-primary btn-sm'],
			'icon' => ['class' => 'fa fa-pencil fa-fw'],
		], $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * btnLinkAdd
	 *
	 * @param integer|array $url Insert the id or the url
	 * @param string        $title
	 * @param array         $options
	 * @return string
	 */
	public function btnLinkAdd($url, $title = '', $options = []) {

		if (empty($url)) {
			$url = ['action' => 'add'];
		}
		$options = Hash::merge([
			'class' => 'btn btn-success btn-xs',
			'icon' => 'plus',
		], $options);

		return $this->Html->link($title, $url, $options);
	}

	/**
	 * btnLinkEdit
	 *
	 * @param integer|array $url Insert the id or the url
	 * @param string        $title
	 * @param array         $options
	 * @return string
	 */
	public function btnLinkEdit($url, $title = '', array $options = []) {

		if (!is_array($url)) {
			$url = ['action' => 'edit', $url];
		}
		$options = Hash::merge([
			'class' => ['btn', 'btn-primary', 'btn-xs'],
			'icon' => 'edit',
		], $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * btnLinkView
	 *
	 * @param integer|array $url Insert the id or the url
	 * @param string        $title
	 * @param array         $options
	 * @return string
	 */
	public function btnLinkView($url, $title = '', $options = []) {

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

	/**
	 * btnLinkMail
	 *
	 * @param integer|array $url Insert the id or the url
	 * @param string        $title
	 * @param array         $options
	 * @return string
	 */
	public function btnLinkMail($url, $title = '', array $options = []) {

		$defaults = [
			'class' => 'btn btn-primary btn-xs',
			'icon' => 'envelope',
			'data-toggle' => 'email',
		];
		if (!is_array($url)) {
			$url = ['admin' => false, 'action' => 'mail', $url];
		}
		$options = array_merge($defaults, $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * btnLinkDelete
	 *
	 * @param integer|array $url Insert the id or the url
	 * @param string        $title
	 * @param array         $options
	 * @return string
	 */
	public function btnLinkDelete($url, $title = '', $options = []) {

		$defaults = [
			'class' => 'btn btn-danger btn-xs',
			'icon' => 'times',
			'data-toggle' => 'delete',
		];
		if (!is_array($url)) {
			$url = ['action' => 'delete', $url];
		}
		$options = array_merge($defaults, $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * Create a List Item redirecting to an add action
	 *
	 * @param string $title
	 * @param array  $options
	 * @return string
	 */
	public function listItemLinkAdd($title = '', $options = []) {

		$defaults = [
			'class' => 'list-group-item',
			'icon' => ['class' => 'fa fa-plus fa-fw'],
		];
		if (empty($title)) {
			$title = __('Add');
		}
		$options = array_merge($defaults, $options);
		return $this->Html->link($title, ['action' => 'add'], $options);
	}

	/**
	 * @param array  $url
	 * @param string $title
	 * @param array  $options
	 * @return string
	 */
	public function listItemLinkEdit($url, $title = '', $options = []) {

		$defaults = [
			'class' => 'list-group-item',
			'icon' => ['class' => 'fa fa-pencil fa-fw'],
		];
		if (!is_array($url)) {
			$url = ['action' => 'edit', $url];
		}
		if (empty($title)) {
			$title = __('Edit');
		}
		$options = array_merge($defaults, $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * listItemLinkMail
	 *
	 * @param array  $url
	 * @param string $title
	 * @param array  $options
	 * @return string
	 */
	public function listItemLinkMail($url, $title = '', $options = []) {

		$defaults = [
			'class' => 'list-group-item',
			'icon' => ['class' => 'fa fa-envelope fa-fw'],
			'data-toggle' => 'email',
		];
		if (!is_array($url)) {
			$url = ['action' => 'mail', $url];
		}
		if (empty($title)) {
			$title = __('Mail');
		}
		$options = array_merge($defaults, $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * listItemLinkDelete
	 *
	 * @param array  $url
	 * @param string $title
	 * @param array  $options
	 * @return string
	 */
	public function listItemLinkDelete($url, $title = '', $options = []) {

		$defaults = [
			'class' => 'list-group-item',
			'icon' => ['class' => 'fa fa-times fa-fw'],
		];
		if (!is_array($url)) {
			$url = ['action' => 'delete', $url];
		}
		if (empty($title)) {
			$title = __('Delete');
		}
		$options = array_merge($defaults, $options);
		return $this->Html->link($title, $url, $options);
	}

	/**
	 * Create a List Item redirecting to an index action
	 *
	 * @param string $url
	 * @param string $title
	 * @param array  $options
	 * @return string
	 */
	public function listItemLinkReturn($url = '', $title = '', $options = []) {

		$defaults = [
			'class' => 'list-group-item',
			'icon' => ['class' => 'fa fa-reply fa-fw'],
		];
		if (!is_array($url)) {
			$url = ['action' => 'index', $url];
		}
		if (empty($title)) {
			$title = __('Return');
		}
		$options = array_merge($defaults, $options);
		return $this->Html->link($title, $url, $options);
	}

}
