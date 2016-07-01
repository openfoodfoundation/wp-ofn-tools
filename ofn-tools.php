<?php
/*
  Plugin Name: OFN Tools
  Description: Tools for integration with the Open Food Network
  Version: 0.0.1
  Author: Rohan Mitchell
  Author URI: https://github.com/RohanM
  Plugin URI: http://openfoodnetwork.org
*/
/*  Copyright 2016 Open Food Foundation

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/


function ofn_tools_search_form($atts) {
    $a = shortcode_atts(array('target' => 'producers'), $atts);
    $js = ofn_tools_search_form_js($a['target']);

    return <<<EOD
<form onsubmit="$js">
  <input type="text" name="query" />
  <input type="submit" value="Search" />
</form>
EOD;
}
add_shortcode('ofn_search_form', 'ofn_tools_search_form');

function ofn_tools_search_form_js($target) {
    $js = <<<EOD
var query=jQuery(this).find('input[name=\\'query\\']').val();
window.location='http://openfoodnetwork.org.au/$target#/?query='+query;
return false;
EOD;

    return str_replace("\n", "", $js);
}
