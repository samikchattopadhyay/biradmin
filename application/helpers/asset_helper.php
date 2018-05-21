<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Sekati CodeIgniter Asset Helper
 *
 * @package		Sekati
 * @author		Jason M Horwitz
 * @copyright	Copyright (c) 2013, Sekati LLC.
 * @license		http://www.opensource.org/licenses/mit-license.php
 * @link		http://sekati.com
 * @version		v1.2.7
 * @filesource
 *
 * @usage 		$autoload['config'] = array('asset');
 * 				$autoload['helper'] = array('asset');
 * @example		<img src="<?=asset_url();?>imgs/photo.jpg" />
 * @example		<?=img('photo.jpg')?>
 *
 * @install		Copy config/asset.php to your CI application/config directory
 *				& helpers/asset_helper.php to your application/helpers/ directory.
 * 				Then add both files as autoloads in application/autoload.php:
 *
 *				$autoload['config'] = array('asset');
 * 				$autoload['helper'] = array('asset');
 *
 *				Autoload CodeIgniter's url_helper in application/config/autoload.php:
 *				$autoload['helper'] = array('url');
 *
 * @notes		Organized assets in the top level of your CodeIgniter 2.x app:
 *					- assets/
 *						-- css/
 *						-- download/
 *						-- img/
 *						-- js/
 *						-- less/
 *						-- swf/
 *						-- upload/
 *						-- xml/
 *					- application/
 * 						-- config/asset.php
 * 						-- helpers/asset_helper.php
 */

// ------------------------------------------------------------------------
// URL HELPERS

/**
 * Get asset URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('asset_url'))
{
    function asset_url()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        //return the full asset path
        return base_url() . $CI->config->item('asset_path');
    }
}

/**
 * Get css URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('css_url'))
{
    function css_url()
    {
        $CI =& get_instance();
        return '/' . $CI->config->item('css_path');
    }
}

/**
 * Get less URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('less_url'))
{
    function less_url()
    {
        $CI =& get_instance();
        return '/' . $CI->config->item('less_path');
    }
}

/**
 * Get js URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('js_url'))
{
    function js_url()
    {
        $CI =& get_instance();
        return '/' . $CI->config->item('js_path');
    }
}

/**
 * Get image URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('img_url'))
{
    function img_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('img_path');
    }
}

/**
 * Get SWF URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('swf_url'))
{
    function swf_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('swf_path');
    }
}

/**
 * Get Upload URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_url'))
{
    function upload_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('upload_path');
    }
}

/**
 * Get Download URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_url'))
{
    function download_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('download_path');
    }
}

/**
 * Get XML URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('xml_url'))
{
    function xml_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('xml_path');
    }
}


// ------------------------------------------------------------------------
// PATH HELPERS

/**
 * Get asset Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('asset_path'))
{
    function asset_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('asset_path');
    }
}

/**
 * Get CSS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('css_path'))
{
    function css_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('css_path');
    }
}

/**
 * Get LESS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('less_path'))
{
    function less_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('less_path');
    }
}

/**
 * Get JS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('js_path'))
{
    function js_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('js_path');
    }
}

/**
 * Get image Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('img_path'))
{
    function img_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('img_path');
    }
}

/**
 * Get SWF Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('swf_path'))
{
    function swf_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('swf_path');
    }
}

/**
 * Get XML Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('xml_path'))
{
    function xml_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('xml_path');
    }
}

/**
 * Get the Absolute Upload Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_path'))
{
    function upload_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('upload_path');
    }
}

/**
 * Get the Relative (to app root) Upload Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_path_relative'))
{
    function upload_path_relative()
    {
        $CI =& get_instance();
        return './' . $CI->config->item('upload_path');
    }
}

/**
 * Get the Absolute Download Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_path'))
{
    function download_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('download_path');
    }
}

/**
 * Get the Relative (to app root) Download Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_path_relative'))
{
    function download_path_relative()
    {
        $CI =& get_instance();
        return './' . $CI->config->item('download_path');
    }
}


// ------------------------------------------------------------------------
// EMBED HELPERS

/**
 * Load CSS
 * Creates the <link> tag that links all requested css file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('css'))
{
    function css($file, $media='all')
    {
        $elements = array();
        
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        
        // Get assets array
        $assetsArr = $CI->config->item('assets');
        
        // if $file found in key, then render that path
        if (isset($assetsArr[$file]['css'])) {
            foreach ($assetsArr[$file]['css'] as $css) {
                $src = isset($css['src']) ? $css['src'] : $css;
                $element = '<link rel="stylesheet" type="text/css" href="' . $src;
                if (isset($css['atts'])) {
                    foreach ( $atts as $key => $val ) {
                        $element .= ' ' . $key . '="' . $val . '"';
                    }
                }
                $element .= '">'."\n";
                $elements[] = $element;
            }
        }
        
        // else, render path using directory structure given
        else {
            $elements[] = '<link rel="stylesheet" type="text/css" href="' . css_url() . $file . '" media="' . $media . '">'."\n";
        }
        
        return implode('', $elements);
    }
}

/**
 * Load LESS
 * Creates the <link> tag that links all requested LESS file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('less'))
{
    function less($file)
    {
        return '<link rel="stylesheet/less" type="text/css" href="' . less_url() . $file . '">'."\n";
    }
}

/**
 * Load JS
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @param 	array 	$atts Optional, additional key/value attributes to include in the SCRIPT tag
 * @return  string
 */
if ( ! function_exists('js'))
{
    function js($file, $atts = array())
    {
        $elements = array();
        
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        
        // Get assets array
        $assetsArr = $CI->config->item('assets');
        
        // if $file found in key, then render that path
        if (isset($assetsArr[$file]['js'])) {
            foreach ($assetsArr[$file]['js'] as $js) {
                $src = isset($js['src']) ? $js['src'] : $js;
                $element = '<script type="text/javascript" src="' . $src . '"';
                if (isset($js['atts'])) {
                    foreach ( $atts as $key => $val ) {
                        $element .= ' ' . $key . '="' . $val . '"';
                    }
                }
                $element .= '></script>'."\n";
                $elements[] = $element;
            }
        }
        
        // else, render path using directory structure given
        else {
            $element = '<script type="text/javascript" src="' . js_url() . $file . '"';
            foreach ( $atts as $key => $val ) {
    			$element .= ' ' . $key . '="' . $val . '"';
            }
    		$element .= '></script>'."\n";
    		$elements[] = $element;
        }
        
        return implode('', $elements);
    }
}

/**
 * Load Image
 * Creates an <img> tag with src and optional attributes
 * @access  public
 * @param   string
 * @param 	array 	$atts Optional, additional key/value attributes to include in the IMG tag
 * @return  string
 */
if ( ! function_exists('img'))
{
    function img($file,  $atts = array())
    {
		$url = '<img src="' . img_url() . $file . '"';
		foreach ( $atts as $key => $val )
			$url .= ' ' . $key . '="' . $val . '"';
		$url .= " />\n";
        return $url;
    }
}

/**
 * Load Minified JQuery CDN w/ failover
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('jquery'))
{
    function jquery($version='')
    {
    	// Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline
  		$out = '<script src="//ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js"></script>'."\n";
  		$out .= '<script>window.jQuery || document.write(\'<script src="'.js_url().'jquery-'.$version.'.min.js"><\/script>\')</script>'."\n";
        return $out;
    }
}

/**
 * Load Google Analytics
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('google_analytics'))
{
    function google_analytics($ua='')
    {
    	// Change UA-XXXXX-X to be your site's ID
	    $out = "<!-- Google Webmaster Tools & Analytics -->\n";
	    $out .='<script type="text/javascript">';
		$out .='	var _gaq = _gaq || [];';
		$out .="    _gaq.push(['_setAccount', '$ua']);";
		$out .="    _gaq.push(['_trackPageview']);";
		$out .='    (function() {';
		$out .="      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
		$out .="      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
		$out .="      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
		$out .="    })();";
	    $out .="</script>";
        return $out;
    }
}


if ( ! function_exists('cdn_css'))
{
    function cdn_css($which)
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        
        //return the full asset path
        $cdnArr = $CI->config->item('cdn_libs');
        
        if (isset($cdnArr[$which]['css'])) {
            foreach ($cdnArr[$which]['css'] as $cssArr) {
                if (is_array($cssArr)) {
                    $attrArr = [];
                    foreach ($cssArr as $attr => $val) {
                        $attrArr[] = "{$attr}='{$val}'";
                    }
                    $attrArr = implode(' ', $attrArr);
                    $cssStr[] = '<link rel="stylesheet" type="text/css" ' . $attrArr . '>'."\n";
                } else {
                    $cssStr[] = '<link rel="stylesheet" type="text/css" href="' . $cssArr . '">'."\n";
                }
            }
            
            return implode('', $cssStr);
        }
        
        return '';
    }
}

if ( ! function_exists('cdn_js'))
{
    function cdn_js($which)
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        
        //return the full asset path
        $cdnArr = $CI->config->item('cdn_libs');
        
        if (isset($cdnArr[$which]['js'])) {
            foreach ($cdnArr[$which]['js'] as $jsArr) {
                if (is_array($jsArr)) {
                    $attrArr = [];
                    foreach ($jsArr as $attr => $val) {
                        $attrArr[] = "{$attr}='{$val}'";
                    }
                    $attrArr = implode(' ', $attrArr);
                    $jsStr[] = '<script type="text/javascript" ' . $attrArr . '></script>'."\n";
                } else {
                    $jsStr[] = '<script type="text/javascript" src=" ' . $jsArr . '"></script>'."\n";
                }
            }
            
            return implode('', $jsStr);
        }
        
        return '';
    }
}
/* End of file asset_helper.php */



if ( ! function_exists('respondjs'))
{
    function respondjs()
    {
        $out = "";
        
        $out .= "<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->" . "\n";
        $out .= "<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->" . "\n";
        $out .= "<!--[if lt IE 9]>";
        $out .= '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>' . "\n";
        $out .= '<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>' . "\n";
        $out .= "<![endif]-->" . "\n";

        return $out;
    }
}

if ( ! function_exists('assets'))
{
    function assets($type, $assets)
    {
        foreach ($assets as $asset) {
            if ($type == 'css') {
                echo css($asset);
            } elseif ($type == 'js') {
                echo js($asset);
            }
        }
    }
}

