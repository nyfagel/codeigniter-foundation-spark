<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Foundation Helper for CodeIgniter.
 *
 * See http://foundation.zurb.com/ for more information about Foundation.
 *
 * @package     helpers
 * @author      Jan Lindblom <jan@nyfagel.se>
 * @copyright   Copyright (c) 2012, Ny fågel.
 * @license     MIT
 * @version     0.6.1
 */


if ( ! function_exists('label')) {
	/**
	 * Create a Foundation label span element.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @access public
	 * @param string $data content of the label.
	 * @param string $class type of label, any combination of [round, radius] and
	 *        [secondary, alert, success].
     * @param string $id id of the label.
	 * @return string a string with the generated HTML.
	 */
	function label($data = '', $class = '', $id = '') {
		$class = ($class != '') ? $class.' ' : $class;
		$id = ($id != '') ? 'id="'.$id.'" ' : $id;
		return "<span ".$id."class=\"".$class."label\">".$data."</span>";
	}
}


if ( ! function_exists('button_anchor')) {
	/**
	* Create a Foundation button anchor element.
	 * 
	 * @link http://foundation.zurb.com/docs/buttons.php
	 * @access public
	 * @param string $title text of the button.
	 * @param string $uri the href of the anchor.
	 * @param string $type type of button, any combination of [tiny, small, medium, large],
	 *        [radius, round] and [success, alert, secondary].
	 * @param mixed $attributes additional attributes of the button anchor.
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
	/**
	 * Create a Foundation button group.
	 * 
	 * @link http://foundation.zurb.com/docs/buttons.php
	 * @access public
	 * @param array $data an array with the anchor elements (default: array()).
	 * @param string $class any additional classes (default: "").
	 * @return string a string with the generated button group.
	 */
	function button_group($data = array(), $class = '') {
		$class = ($class != '') ? $class.' ' : $class;
		if ( ! function_exists('ul')) {
			// The HTML Helper ul function is required, make the user load the helper.
			return "This Helper requires the html helper to be loaded!";
		}
		return ul($data,array('class'=>$class.'button-group'));
	}
}

if ( ! function_exists('link_list')) {
	/**
	 * Create a Foundation link list.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @access public
	 * @param array $data an array with the anchor elements (default: array()).
	 * @param string $class any additional classes (default: "").
	 * @return string a string with the generated link list.
	 */
	function link_list($data = array(), $class = "") {
		$class = ($class != '') ? $class.' ' : $class;
		if ( ! function_exists('ul')) {
			// The HTML Helper ul function is required, make the user load the helper.
			return "This Helper requires the html helper to be loaded!";
		}
		return ul($data,array('class'=>$class.'link-list'));
	}
}

if ( ! function_exists('button_bar')) {
	/**
	 * Create a Foundation button bar.
	 * 
	 * @link http://foundation.zurb.com/docs/buttons.php
	 * @access public
	 * @param string $data a string with the contents of the button bar.
	 * @param string $class any additional classes.
	 * @return string a string with the generated button bar.
	 */
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
	 * @access public
	 * @param string $text the text that's going to have a tooltip.
	 * @param string $tooltip the message of the tooltip.
	 * @param string $class any combination of [tip-top, tip-left, tip-right,
	 *        tip-bottom, noradius].
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
	 * @access public
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
	 * @access public
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
	 * @access public
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
	/**
	 * Create a Foundation panel element.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @access public
	 * @param string $content content of the panel.
	 * @param string $class any additional class of the panel,
	 *        any combination of [radius, callout].
	 * @return string the panel div element.
	 */
	function panel($content = '', $class = '') {
		$class = ($class != '') ? $class.' ' : $class;
		return "<div class=\"".$class." panel\">".$content."</div>";
	}
}

if ( ! function_exists('reveal_modal')) {
	/**
	 * Create a Foundation reveal modal element.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @access public
	 * @param string $content the content of the reveal modal.
	 * @param string $id the id of the modal.
	 * @param string $class any additional class.
	 * @return string the reveal modal div element.
	 */
	function reveal_modal($content = '', $id = '', $class = '',$append_close_anchor = true) {
		$class = ($class != '') ? $class.' ' : $class;
		$close_anchor = ($append_close_anchor) ? close_reveal_modal() : '';
		return "<div id=\"".$id."\" class=\"".$class." reveal-modal\">".$content.$close_anchor."</div>";
	}
}

if (! function_exists('reveal_jquery')) {
	/**
	 * Create a javascript to display a reveal modal.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @access public
	 * @param string $anchor the id of the element that will trigger the modal.
	 * @param string $modal the id of the modal that will be displayed.
	 * @param boolean $with_script_tags whether or not to include the script tags
	 *        of the script or just the script contents. Defaults to true.
	 * @return string the generated javascript.
	 */
	function reveal_jquery($anchor = '', $modal = '', $with_script_tags = true) {
		$script = '';
		$script .= ($with_script_tags) ? "<script type=\"text/javascript\">\n" : '';
		$script .= "  $(document).ready(function() {
    $('#".$anchor."').click(function() {
      $('#".$modal."').reveal();
    });
  });";
  		$script .= ($with_script_tags) ? "</script>" : '';
		return $script;
	}
}

if ( ! function_exists('close_reveal_modal')) {
	/**
	 * Create a Foundation close reveal anchor element.
	 * 
	 * @link http://foundation.zurb.com/docs/elements.php
	 * @return string an anchor close-reveal-modal class.
	 */
	function close_reveal_modal() {
		return '<a class="close-reveal-modal">&#215;</a>';
	}
}

if ( ! function_exists('sub_nav')) {
	/**
	 * Generate a Foundation sub nav element.
	 * 
	 * @link http://foundation.zurb.com/docs/navigation.php
	 * @access public
	 * @param array $entries the entries of the sub nav (default: array()).
	 * @param string $active the active entry (default: '').
	 * @param string $title the title of the sub nav (default: '').
	 * @param string $class any additional class (default: '').
	 * @return string a string with the generated sub nav.
	 */
	function sub_nav($entries = array(), $active = '', $title = '', $class = '') {
		$class = ($class != '') ? $class.' ' : $class;
		$title = ($title != '') ? '<dt>'.$title.'</dt>' : $title;
		$nav = '<dl class="'.$class.'sub-nav">';
		$nav .= $title;
		foreach ($entries as $id => $entry) {
			if ($active == $id) {
				$nav .= '<dd id="'.$id.'" class="active">'.$entry.'</dd>';
			} else {
				$nav .= '<dd id="'.$id.'">'.$entry.'</dd>';
			}
		}
		$nav .= '</dl>';
		return $nav;
	}
}

if (! function_exists('custom_dropdown')) {
	/**
	 * Generate a Foundation custom dropdown, optionally with a label.
	 * 
	 * @link http://foundation.zurb.com/docs/forms.php
	 * @access public
	 * @param string $name the name of the dropdown (default: '').
	 * @param array $elements the elements of the dropdown (default: array()).
	 * @param array $preselected any preselected entry/ies (default: array()).
	 * @param string $extras an extra options, like a onchange="" (default: '').
	 * @param bool $with_label whether or not to include a label (default: false).
	 * @param string $label_text the text of the optional label (default: '').
	 * @return string a string with the generated dropdown.
	 */
	function custom_dropdown($name = '', $elements = array(), $preselected = array(), $extras = '', $with_label = false, $label_text = '') {
		$dropdown = '';
		$label = '';
		if ($with_label) {
			$label .= '<label for="'.$name.'">'.$label_text.'</label>';
		}
		$dropdown .= $label;
		$dropdown .= form_dropdown($name,$elements,$preselected,$extras);
		return $dropdown;
	}
}

if ( ! function_exists('pill_tabs')) {
	/**
	 * Generate Foundation pill tabs.
	 * 
	 * @link http://foundation.zurb.com/docs/tabs.php
	 * @access public
	 * @param array $content an array with the contents of the pill tabs. Should
	 *        be a list of entries on the following form:
	 *        'id' => array('title' => 'title', 'content' => 'content').
	 * @param string $active a string with the id of the tab to set as active.
	 * @return array an array with the generated pill tabs on the following form:
	 *         'tabs' => '<the pill tabs>', 'content' => '<the tab contents>'.
	 */
	function pill_tabs($content = array(), $active = '') {
		$tabs = '<dl class="tabs pill">';
		$tabscontent = '<ul class="tabs-content">';
		foreach ($content as $id => $contents) {
			$tabs .= "<dd";
			$tabscontent .= '<li';
			$tabs .= ($id == $active) ? ' class="active">' : '>';
			$tabscontent .= ($id == $active) ? ' class="active" ' : ' ';
			$tabs .= '<a href="#'.$id.'" id="'.$id.'">'.$contents['title'].'</a></dd>';
			$tabscontent .= 'id="'.$id.'Tab">'.$contents['content'].'</li>';
		}
		$tabs .= '</dl>';
		$tabscontent .= '</ul>';
		$pilltabs = array('tabs' => $tabs, 'content' => $tabscontent);
		return $pilltabs;
	}
}

if ( ! function_exists('_number_to_text')) {
	/**
	 * Convert numbers to text.
	 * 
	 * @access private
	 * @param int $number the number to convert to text (default: 1).
	 * @return a string with the textual representation of the number.
	 */
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