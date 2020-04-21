<?php

defined( '_JEXEC' ) or die;
require "lessc.inc.php";

// begin function compress
function compress($buffer) 
{
	// remove comments
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	// remove tabs, spaces, new lines, etc.
	$buffer = str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),'',$buffer);
	// remove unnecessary spaces
	$buffer = str_replace('{ ', '{', $buffer);
	$buffer = str_replace(' }', '}', $buffer);
	$buffer = str_replace('; ', ';', $buffer);
	$buffer = str_replace(', ', ',', $buffer);
	$buffer = str_replace(' {', '{', $buffer);
	$buffer = str_replace('} ', '}', $buffer);
	$buffer = str_replace(': ', ':', $buffer);
	$buffer = str_replace(' ,', ',', $buffer);
	$buffer = str_replace(' ;', ';', $buffer);
	$buffer = str_replace(';}', '}', $buffer);

	return $buffer;
}

$uri = $this->baseurl.'/templates/'.$this->template;
// less compiler
$lesspath = __DIR__;
require_once $lesspath . '/less.php';
$less_files = array( $lesspath . '/../../less/template.less' => $uri);
$options = array( 'cache_dir' => $lesspath.'/cache/' );
$css_file_name = Less_Cache::Get( $less_files, $options );
$compiled = file_get_contents( $lesspath.'/cache/'.$css_file_name );

if (file_exists($lesspath.'/cache/'.$css_file_name))
{
	// merge files
	$compiled = file_get_contents( $lesspath.'/cache/'.$css_file_name );
	$compiled .= file_get_contents(JPATH_THEMES.'/system/css/general.css');

	$less = new lessc;
	$app = JFactory::getApplication('site');
	$template = $app->getTemplate(true);

	$bgcolor1 = $template->params->get('bgcolor1');
	$bgcolor2 = $template->params->get('bgcolor2');
	$bgcolor3 = $template->params->get('bgcolor3');
	$bgcolor4 = $template->params->get('bgcolor4');
	$bgcolor5 = $template->params->get('bgcolor5');
	$compiled .= $less->compile(".bg-color1 { background-color:$bgcolor1; }");
	$compiled .= $less->compile(".bg-color2 { background-color:$bgcolor2; }");
	$compiled .= $less->compile(".bg-color3 { background-color:$bgcolor3; }");
	$compiled .= $less->compile(".bg-color4 { background-color:$bgcolor4; }");
	$compiled .= $less->compile(".bg-color5 { background-color:$bgcolor5; }");


	$paddingnone = $template->params->get('paddingnone');
	$paddingnormal = $template->params->get('paddingnormal');
	$paddinglarge = $template->params->get('paddinglarge');
	$compiled .= $less->compile(".padding-none { padding-bottom:$paddingnone; padding-top:$paddingnone; }");
	$compiled .= $less->compile(".padding-normal { padding-bottom:$paddingnormal; padding-top:$paddingnormal; }");
	$compiled .= $less->compile(".padding-large { padding-bottom:$paddinglarge; padding-top:$paddinglarge; }");

	$headingfont = $template->params->get('headingfont');
	$headingfontweight = $template->params->get('headingfontweight');
	$headingfont = current(explode(':', $headingfont));
	$headingfont = str_replace('+', ' ', $headingfont);
	$compiled .= $less->compile("h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 { font-family: $headingfont; font-weight: $headingfontweight; }");

	$contentfont = $template->params->get('contentfont');
	$contentfontsize = $template->params->get('contentfontsize');
	$contentfontweight = $template->params->get('contentfontweight');
	$contentfont = current(explode(':', $contentfont));
	$contentfont = str_replace('+', ' ', $contentfont);
	$compiled .= $less->compile("body { font-family: $contentfont;font-weight: $contentfontweight;font-size: $contentfontsize; }");

	$headingcolordark = $template->params->get('headingcolordark');
	$headingcolorlight = $template->params->get('headingcolorlight');
	$contentcolordark = $template->params->get('contentcolordark');
	$contentcolorlight = $template->params->get('contentcolorlight');
	$compiled .= $less->compile(".fontcolor-dark { color:$contentcolordark; h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {color: $headingcolordark;}}");
	$compiled .= $less->compile(".fontcolor-light { color:$contentcolorlight; h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {color: $headingcolorlight;}}");

	$linkcolor = $template->params->get('linkcolor');
	$compiled .= $less->compile("a { color:$linkcolor }");
	$linkcolorhover = $template->params->get('linkcolorhover');
	$compiled .= $less->compile("a:hover, a:focus, a:active { color:$linkcolorhover }");

	$navbarfont = $template->params->get('navbarfont');
	$navbarfontsize = $template->params->get('navbarfontsize');
	$navbarfontweight = $template->params->get('navbarfontweight');
	$navbarfont = current(explode(':', $navbarfont));
	$navbarfont = str_replace('+', ' ', $navbarfont);
	$compiled .= $less->compile("#navbar { font-family: $navbarfont;font-weight: $navbarfontweight;font-size: $navbarfontsize; }");

	$compressed = compress($compiled);
	
	file_put_contents($lesspath.'/../../css/template.css', $compressed);
}