<?php

/* DownlImgBundle:Default:inputtxt.html.twig */
class __TwigTemplate_61e8cc0a34083f0b1ac4c963b09a49b28ef4eb807f3ba9d505ac0732c49f0d39 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/DownlImg/indexcss.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\">
<!--\t<script language=\"javascript\" type=\"text/javascript\"  src=\"uploadtxt.js\"></script>\t\t-->
</head>
<body>
\t<form enctype=\"multipart/form-data\" action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("uploadtxt_php");
        echo "\" method=\"post\">
\t\t<div class=\"inputtxt\">
\t\t\t<div class=\"input_button_style\">
\t\t\t\t<div class=\"input_font_style\">Выбрать файл txt</div>
\t\t\t\t<input type=\"file\" name=\"filetxt\" id=\"filetxt\" size=\"1\" onchange='submit(); window.parent.document.getElementById(\"myajax\").style.display=\"block\";' class=\"input_input_style\"><br>
\t\t\t</div>
\t\t</div>
\t</form>
\t<div id=\"myerror\">Принудительная полос прокр</div>
\t<script>
\t\twindow.parent.uploadstart(\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["myscript"]) ? $context["myscript"] : null), "html", null, true);
        echo "\");
\t</script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "DownlImgBundle:Default:inputtxt.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 18,  31 => 8,  24 => 4,  19 => 1,);
    }
}
/* <html>*/
/* <head>*/
/* 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">*/
/* 	<link href="{{ asset('bundles/DownlImg/indexcss.css') }}" type="text/css" rel="stylesheet">*/
/* <!--	<script language="javascript" type="text/javascript"  src="uploadtxt.js"></script>		-->*/
/* </head>*/
/* <body>*/
/* 	<form enctype="multipart/form-data" action="{{ path('uploadtxt_php') }}" method="post">*/
/* 		<div class="inputtxt">*/
/* 			<div class="input_button_style">*/
/* 				<div class="input_font_style">Выбрать файл txt</div>*/
/* 				<input type="file" name="filetxt" id="filetxt" size="1" onchange='submit(); window.parent.document.getElementById("myajax").style.display="block";' class="input_input_style"><br>*/
/* 			</div>*/
/* 		</div>*/
/* 	</form>*/
/* 	<div id="myerror">Принудительная полос прокр</div>*/
/* 	<script>*/
/* 		window.parent.uploadstart("{{ myscript }}");*/
/* 	</script>*/
/* </body>*/
/* </html>*/
/* */
