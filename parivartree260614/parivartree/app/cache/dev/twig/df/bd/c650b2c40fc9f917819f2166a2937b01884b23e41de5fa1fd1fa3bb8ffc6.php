<?php

/* TreeTreeBundle:User:blocklist.html.twig */
class __TwigTemplate_dfbdc650b2c40fc9f917819f2166a2937b01884b23e41de5fa1fd1fa3bb8ffc6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base_inner.html.twig");

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base_inner.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('body', $context, $blocks);
    }

    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"header-top-block\">

\t\t<div class=\"container\">

\t\t\t<div class=\"col-md-2\"><a href=\"#\"><img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo1.png"), "html", null, true);
        echo "\" ></a></div>

\t\t\t<div class=\"col-md-4 search-bar clear-both\">

\t\t\t\t<form class=\"navbar-form form-group\" method=\"post\" action=\"search-result.php\">

\t\t\t\t\t<input class=\"form-control\" type=\"text\" value=\"\" placeholder=\"Search People\" required=\"\" name=\"srch\">

\t\t\t\t</form>

\t\t\t</div>

\t\t\t<div class=\"col-md-2 profile-name\">

\t\t\t<span></span>

\t\t\t<h4>Profile Name</h4>

\t\t\t</div>



          <div class=\"col-md-2 mess-block\">

            <ul>

\t\t\t  <li class=\"active\"><a href=\"#\"><img src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/message.png"), "html", null, true);
        echo "\" ><span>16</span></a></li>

\t\t\t  <li><a href=\"#\"><img src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/notification.png"), "html", null, true);
        echo "\" ><span>2</span></a></li>

            </ul>

          </div>

\t\t  <div class=\"col-md-2 menu\">

\t\t  \t<ul>

\t\t\t\t<li><a href=\"#\">Tree View</a></li>

\t\t\t\t<li><a href=\"#\">Gallery</a></li>

\t\t\t\t<li><a href=\"#/\">Timeline</a></li>

\t\t\t</ul>

\t\t  </div>

\t\t</div>

\t\t

\t\t</div>

\t</div>


\t
<div class=\"container block-list-container innerpage\">

\t<div class=\"block-list-left col-md-2\">
\t\t<div class=\"block-list-cont\">
\t\t\t<h1>Blocking</h1>
\t\t\t<ul>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t\t<li>User 1</li>
\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"block-list-right col-md-10\">
\t<div class=\"page-header\">
<h4>Manage Blocking</h4>
</div>
\t\t\t<div class=\"block-user-list\">
\t\t\t<h1>User Block</h1>
\t\t\t<p>Once you block someone, that person can no longer see things you post on your timeline, tag you, invite you to events or groups, start a conversation with you, or add you as a friend. Note: Does not include apps, games or groups you both participate in.</p>
\t\t\t<div class=\"row control-group\">
\t\t\t\t<div class=\"col-md-3\">User details</div>
\t\t\t\t<div class=\"col-md-6\"><input type=\"text\" palceholder=\"User List\" ></div>
\t\t\t\t<div class=\"col-md-3\"><button class=\"btn btn-block btn-primary\">Block</button></div>
\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"block-user-list\">
\t\t\t<h1>Invites Block</h1>
\t\t\t<p>Once you block someone, that person can no longer see things you post on your timeline, tag you, invite you to events or groups, start a conversation with you, or add you as a friend. Note: Does not include apps, games or groups you both participate in.</p>
\t\t\t<div class=\"row control-group\">
\t\t\t\t<div class=\"col-md-3\">User details</div>
\t\t\t\t<div class=\"col-md-6\"><input type=\"text\" palceholder=\"User List\" ></div>
\t\t\t\t<div class=\"col-md-3\"><button class=\"btn btn-block btn-primary\">Block</button></div>
\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"block-user-list\">
\t\t\t<h1>Block event invites</h1>
\t\t\t<p>Once you block someone, that person can no longer see things you post on your timeline, tag you, invite you to events or groups, start a conversation with you, or add you as a friend. Note: Does not include apps, games or groups you both participate in.</p>
\t\t\t<div class=\"row control-group\">
\t\t\t\t<div class=\"col-md-3\">User details</div>
\t\t\t\t<div class=\"col-md-6\"><input type=\"text\" palceholder=\"User List\" ></div>
\t\t\t\t<div class=\"col-md-3\"><button class=\"btn btn-block btn-primary\">Block</button></div>
\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "TreeTreeBundle:User:blocklist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 26,  449 => 159,  431 => 146,  418 => 143,  414 => 142,  394 => 128,  386 => 123,  372 => 115,  364 => 113,  359 => 111,  351 => 109,  346 => 108,  343 => 107,  334 => 88,  328 => 82,  323 => 80,  315 => 75,  304 => 67,  297 => 63,  290 => 59,  286 => 58,  282 => 57,  279 => 56,  276 => 55,  250 => 197,  207 => 107,  190 => 92,  188 => 88,  174 => 52,  152 => 43,  137 => 38,  118 => 32,  114 => 31,  97 => 20,  90 => 18,  81 => 38,  76 => 36,  180 => 55,  172 => 101,  77 => 19,  53 => 18,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 157,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 144,  413 => 134,  409 => 132,  407 => 131,  402 => 133,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 114,  365 => 111,  362 => 110,  360 => 109,  355 => 110,  341 => 105,  337 => 89,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 39,  132 => 51,  128 => 49,  107 => 36,  61 => 23,  273 => 96,  269 => 94,  254 => 198,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 45,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 11,  67 => 26,  63 => 15,  59 => 14,  93 => 19,  88 => 6,  78 => 21,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 10,  56 => 12,  27 => 4,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 33,  117 => 44,  105 => 40,  91 => 27,  62 => 13,  49 => 17,  87 => 17,  46 => 7,  44 => 10,  25 => 3,  21 => 2,  31 => 4,  38 => 7,  26 => 1,  28 => 3,  24 => 4,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 10,  40 => 11,  37 => 10,  22 => 1,  246 => 196,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 18,  66 => 14,  55 => 15,  52 => 21,  50 => 11,  43 => 8,  41 => 6,  35 => 5,  32 => 4,  29 => 3,  209 => 161,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 84,  176 => 64,  173 => 65,  168 => 48,  164 => 59,  162 => 57,  154 => 58,  149 => 42,  147 => 58,  144 => 49,  141 => 48,  133 => 37,  130 => 36,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 28,  106 => 27,  103 => 35,  99 => 31,  95 => 28,  92 => 21,  86 => 22,  82 => 22,  80 => 41,  73 => 19,  64 => 17,  60 => 14,  57 => 23,  54 => 10,  51 => 22,  48 => 13,  45 => 17,  42 => 16,  39 => 9,  36 => 5,  33 => 7,  30 => 7,);
    }
}
