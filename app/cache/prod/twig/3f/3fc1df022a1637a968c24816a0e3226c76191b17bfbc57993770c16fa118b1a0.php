<?php

/* DownlImgBundle:Default:index.html.twig */
class __TwigTemplate_86d399127c481ad7cf239adccae63985c96818c935a6f9a0462be0e06d9ac656 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<head>
\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
\t<link href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/DownlImg/elem/1419281141_363179.ico"), "html", null, true);
        echo "\" rel=\"shortcut icon\" type=\"image/x-icon\" />
\t<title>Makmak</title>
\t<link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/DownlImg/indexcss.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\">
\t<script language=\"javascript\" type=\"text/javascript\"  src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/DownlImg/uploadtxt.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>
\t
</head>
<body onunload=\"myunload1()\" onresize=\"drsize()\">
\t<script>
\t\t//testajax( \"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("downl_img_homepage");
        echo "\" );
\t</script>
\t
\t <!--<iframe src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/DownlImg/inputtxt.html"), "html", null, true);
        echo "\" id=\"myframe\" frameborder=\"no\" scrolling=\"no\" seamless >-->
\t <iframe src=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("inputtxt_html_twig");
        echo "\" id=\"myframe\" >\t<!-- frameborder=\"no\" scrolling=\"yes\" seamless-->\t
\t</iframe>
\t<div id=\"content\">
\t\t<!--<img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("/imagesw/z_Cento Per Cento-IMOLA CERAMICA-1.jpg"), "html", null, true);
        echo "\">-->
\t</div>
\t<br>
\t<div id=\"myajax\">
\t\t<img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/DownlImg/elem/a79.jpg"), "html", null, true);
        echo "\">
\t</div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "DownlImgBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 25,  65 => 21,  59 => 18,  55 => 17,  49 => 14,  41 => 9,  37 => 8,  33 => 7,  29 => 6,  24 => 4,  19 => 1,);
    }
}
/* <html>*/
/* <head>*/
/* 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">*/
/* 	<link href="{{ asset('bundles/DownlImg/elem/1419281141_363179.ico') }}" rel="shortcut icon" type="image/x-icon" />*/
/* 	<title>Makmak</title>*/
/* 	<link href="{{ asset('bundles/DownlImg/indexcss.css') }}" type="text/css" rel="stylesheet">*/
/* 	<script language="javascript" type="text/javascript"  src="{{ asset('bundles/DownlImg/uploadtxt.js') }}"></script>*/
/* 	<script src="{{ asset('bundles/fosjsrouting/js/router.js') }}"></script>*/
/* 	<script src="{{ path('fos_js_routing_js', {'callback': 'fos.Router.setData'}) }}"></script>*/
/* 	*/
/* </head>*/
/* <body onunload="myunload1()" onresize="drsize()">*/
/* 	<script>*/
/* 		//testajax( "{{ path('downl_img_homepage') }}" );*/
/* 	</script>*/
/* 	*/
/* 	 <!--<iframe src="{{ asset('bundles/DownlImg/inputtxt.html') }}" id="myframe" frameborder="no" scrolling="no" seamless >-->*/
/* 	 <iframe src="{{ path('inputtxt_html_twig') }}" id="myframe" >	<!-- frameborder="no" scrolling="yes" seamless-->	*/
/* 	</iframe>*/
/* 	<div id="content">*/
/* 		<!--<img src="{{ asset('/imagesw/z_Cento Per Cento-IMOLA CERAMICA-1.jpg') }}">-->*/
/* 	</div>*/
/* 	<br>*/
/* 	<div id="myajax">*/
/* 		<img src="{{ asset('bundles/DownlImg/elem/a79.jpg') }}">*/
/* 	</div>*/
/* </body>*/
/* </html>*/
/* */
