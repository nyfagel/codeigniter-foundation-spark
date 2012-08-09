<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Foundation Helper for CodeIgniter.
 *
 * See http://foundation.zurb.com/ for more information about Foundation.
 *
 * @package     helpers
 * @author      Jan Lindblom <jan@powcorp.se>
 * @copyright   Copyright (c) 2012, POW! Corp.
 * @license     MIT
 * @version     0.4
 */


if ( ! function_exists('label')) {
	/**
	 * Create a Foundation label span element.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @param string $data content of the label.
	 * @param string $class type of label, any combination of [round, radius] and
	 *        [secondary, alert, success].
	 * @return string a string with the generated HTML.
	 */
	function label($data = '', $class = '') {
		$class = ($class != '') ? $class.' ' : $class;
		return "<span class=\"".$class."label\">".$data."</span>";
	}
}


if ( ! function_exists('button_anchor')) {
	/**
	* Create a Foundation button anchor element.
	 * 
	 * @link http://foundation.zurb.com/docs/buttons.php
	 * @param string $title text of the button.
	 * @param string $uri the href of the anchor.
	 * @param string $type type of button, any combination of [tiny, small, medium, large],
	 *        [radius, round] and [success, alert, secondary].
	 * @param array $attributes additional attributes of the button anchor.
	 * @return string a string with the generated anchor button.
	 */
	function button_anchor($uri = '', $title = '', $type = '', $attributes = '') {
		if (is_array($attributes)) {
			if (array_key_exists('class', $attributes)) {
				$attributes['class'] = $attributes['class'].' '.$type.' button';
			} else {
				$attributes['class'] = $type.' button';
			}
		} else {
			$attributes = array('class' => $type.' button');
		}
		
		return anchor($uri, $title, $attributes);
	}
}

if ( ! function_exists('button_group')) {
	function button_group($data = array(), $class = '') {
		$class = ($class != '') ? $class.' ' : $class;
		if ( ! function_exists('ul')) {
			// The HTML Helper ul function is required, make the user load the helper.
			return "This Helper requires the html helper to be loaded!";
		}
		$bg = ul($data,array('class'=>$class.'button-group'));
		return $bg;
	}
}

if ( ! function_exists('button_bar')) {
	function button_bar($data = '', $class = '') {
		$class = ($class != '') ? $class.' ' : $class;
		return '<div class="'.$class.'button-bar">'.$data.'</div>';
	}
}

if ( ! function_exists('tooltip')) {
	/**
	 * Create a Foundation tooltip span element.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @param string $text the text that's going to have a tooltip.
	 * @param string $tooltip the message of the tooltip.
	 * @param string $class any combination of 'tip-top', 'tip-left', 'tip-right',
	 *        'tip-bottom' and 'noradius'.
	 * @param int $datawidth defines the width of the tooltip.
	 * @return string a span element with a tooltip.
	 */
	function tooltip($tooltip = '', $class = '', $text = '', $datawidth = null) {
		$class = ($class != '') ? $class.' ' : $class;
		$datawidth = ($datawidth != null) ? " data-width=".$datawidth.' ' : $datawidth;
		return "<span class=\"".$class."has-tip\" title=\"".$tooltip."\"".$datawidth.">".$text."</span>";
	}
}

if ( ! function_exists('row')) {
	/**
	 * Create a Foundation row div element.
	 * 
	 * @link http://foundation.zurb.com/docs/grid.php
	 * @param string $content the content of the row.
	 * @param string $class any option class content of the row.
	 * @return string a div element with the class row.
	 */
	function row($content = '', $class = '') {
		$class = ($class != '') ? ' '.$class : $class;
		return "<div class=\"row".$class."\">".$content."</div>";
	}
}

if ( ! function_exists('columns')) {
	/**
	 * Create a Foundation columns div element.
	 * 
	 * @link http://foundation.zurb.com/docs/grid.php
	 * @param string $data the content of the columns element.
	 * @param int $number the number of columns, any number [1-12], defaults to 12.
	 * @param string $class any optional classes of the columns div.
	 * @param int $mobile an optional mobile columns setting, any number [1-4].
	 * @return string the columns div html.
	 */
	function columns($data = '', $number = 12, $class = '', $mobile = null) {
		$class = ($class != '') ? $class.' ' : $class;
		$number = _number_to_text($number).' ';
		$mobile = ($mobile != null) ? 'mobile-'._number_to_text($mobile).' ' : $mobile;
		return "<div class=\"".$class.$number.$mobile."columns\">".$data."</div>";
	}
}

if ( ! function_exists('accordion')) {
	/**
	 * Create a Foundation accordion element.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @param array $data the content of the accordion. An array with arrays on
	 *        the form: array('title' => 'title', 'content' => 'your content').
	 *        An array with the additional 'active'=>true entry will cause the
	 *        specified entry to become active.
	 * @param string $class any optional extra classes of the accordion.
	 * @return string the accordion element.
	 */
	function accordion($data = array(), $class = '') {
		$class = ($class != '') ? $class.' ' : $class;
		$accordion = '<ul class="'.$class.'accordion">'."\n";
		foreach ($data as $elem) {
			
			if ( (array_key_exists('active', $elem)) && (is_bool($elem['active'])) && ($elem['active'] == true) ) {
				$accordion .= "\t<li class=\"active\">\n";
			} else {
				$accordion .= "\t<li>\n";
			}
			$title = $elem['title'];
			$content = $elem['content'];
			$accordion .= "\t\t<div class=\"title\">".$title."</div>\n";
			$accordion .= "\t\t<div class=\"content\">\n\t\t\t".$content."\n\t\t</div>\n";
			$accordion .= "\t</li>\n";
		}
		$accordion .= "</ul>\n";
		return $accordion;
	}
}

if ( ! function_exists('panel')) {
	function panel($content = '', $class = '') {
		$class = ($class != '') ? $class.' ' : $class;
		return "<div class=\"".$class." panel\">".$content."</div>";
	}
}

if ( ! function_exists('close_reveal_modal')) {
	function close_reveal_modal() {
		return '<a class="close-reveal-modal">&#215;</a>';
	}
}

if ( ! function_exists('_number_to_text')) {
	function _number_to_text($number = 1) {
		$number = ($number ==  1) ? 'one'    : $number;
		$number = ($number ==  2) ? 'two'    : $number;
		$number = ($number ==  3) ? 'three'  : $number;
		$number = ($number ==  4) ? 'four'   : $number;
		$number = ($number ==  5) ? 'five'   : $number;
		$number = ($number ==  6) ? 'six'    : $number;
		$number = ($number ==  7) ? 'seven'  : $number;
		$number = ($number ==  8) ? 'eight'  : $number;
		$number = ($number ==  9) ? 'nine'   : $number;
		$number = ($number == 10) ? 'ten'    : $number;
		$number = ($number == 11) ? 'eleven' : $number;
		$number = ($number == 12) ? 'twelve' : $number;
		return $number;
	}
}

?>