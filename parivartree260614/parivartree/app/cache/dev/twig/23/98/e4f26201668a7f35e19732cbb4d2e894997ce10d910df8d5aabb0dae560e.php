<?php

/* TreeTreeBundle:Home:kubulunode.html.twig */
class __TwigTemplate_2398e4f26201668a7f35e19732cbb4d2e894997ce10d910df8d5aabb0dae560e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
\t<div class=\"header-top-block\">
\t\t<div class=\"container\">
\t\t\t<div class=\"col-md-2\"><a href=\"#\"><img src=\"";
        // line 7
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
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/message.png"), "html", null, true);
        echo "\" ><span>16</span></a></li>
\t\t\t  <li><a href=\"#\"><img src=\"";
        // line 21
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
<div id=\"notification-left\" class=\"col-md-3\">
      <div class=\"notification-item-block\">
\t  \t\t<h1>Family Notification</h1>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t  </div>
\t   <div class=\"notification-item-block\">
\t  \t\t<h1>Activity Stream</h1>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t\t\t<p>eee eee eeeeeee eeeeee eee</p>
\t  </div>
\t  
</div>
    <div id=\"right\">
        <div id=\"menubar\">
            <div id=\"button\">
                Menu
            </div>
        </div>
            <div>eeeeeeeeeeeeeeeeeeeeeeeeeeeeeee </div>
    </div>
\t
\t<script>
\t\t\$('#button').toggle( 
    function() {
        \$('#right').animate({ left: 250 }, 'slow', function() {
            \$('#button').html('Less');
        });
    }, 
    function() {
        \$('#right').animate({ left: 0 }, 'slow', function() {
            \$('#button').html('More');
        });
    }
);
\t</script>

     


";
    }

    public function getTemplateName()
    {
        return "TreeTreeBundle:Home:kubulunode.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  350 => 191,  342 => 189,  284 => 139,  271 => 136,  267 => 135,  228 => 108,  215 => 104,  211 => 103,  178 => 76,  165 => 69,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 322,  762 => 319,  754 => 316,  745 => 310,  740 => 308,  723 => 293,  717 => 292,  711 => 291,  708 => 290,  695 => 284,  689 => 281,  681 => 280,  673 => 279,  664 => 277,  661 => 276,  658 => 275,  655 => 274,  651 => 272,  649 => 271,  646 => 270,  642 => 268,  640 => 267,  636 => 266,  631 => 265,  629 => 264,  626 => 263,  622 => 261,  619 => 260,  603 => 254,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 240,  549 => 239,  546 => 238,  530 => 232,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 210,  451 => 209,  447 => 207,  441 => 205,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 184,  371 => 181,  335 => 169,  318 => 164,  302 => 152,  293 => 157,  377 => 4,  354 => 192,  338 => 186,  330 => 183,  313 => 174,  308 => 161,  262 => 128,  242 => 116,  237 => 119,  231 => 117,  225 => 115,  223 => 114,  198 => 107,  194 => 105,  192 => 104,  155 => 69,  134 => 64,  129 => 63,  124 => 46,  110 => 57,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 231,  468 => 223,  465 => 222,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 198,  370 => 198,  349 => 173,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 166,  321 => 173,  317 => 172,  311 => 162,  303 => 165,  296 => 163,  275 => 154,  249 => 139,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 26,  449 => 159,  431 => 146,  418 => 143,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 190,  343 => 170,  334 => 88,  328 => 82,  323 => 80,  315 => 163,  304 => 67,  297 => 150,  290 => 59,  286 => 58,  282 => 57,  279 => 56,  276 => 137,  250 => 121,  207 => 102,  190 => 92,  188 => 88,  174 => 52,  152 => 43,  137 => 65,  118 => 42,  114 => 31,  97 => 20,  90 => 33,  81 => 50,  76 => 36,  180 => 55,  172 => 101,  77 => 19,  53 => 18,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 206,  440 => 148,  437 => 147,  435 => 146,  430 => 201,  427 => 200,  423 => 144,  413 => 134,  409 => 132,  407 => 131,  402 => 133,  398 => 129,  393 => 126,  387 => 187,  384 => 121,  381 => 120,  379 => 119,  374 => 182,  368 => 180,  365 => 179,  362 => 195,  360 => 109,  355 => 110,  341 => 105,  337 => 89,  322 => 165,  314 => 99,  312 => 98,  309 => 97,  305 => 160,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 85,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 112,  140 => 53,  132 => 51,  128 => 49,  107 => 56,  61 => 22,  273 => 96,  269 => 151,  254 => 198,  243 => 88,  240 => 14,  238 => 85,  235 => 112,  230 => 11,  227 => 10,  224 => 107,  221 => 8,  219 => 105,  217 => 75,  208 => 111,  204 => 72,  179 => 69,  159 => 45,  143 => 67,  135 => 53,  119 => 42,  102 => 37,  71 => 27,  67 => 26,  63 => 15,  59 => 14,  93 => 53,  88 => 52,  78 => 33,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 26,  56 => 21,  27 => 4,  201 => 92,  196 => 90,  183 => 121,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 52,  121 => 61,  117 => 44,  105 => 40,  91 => 27,  62 => 13,  49 => 17,  87 => 32,  46 => 7,  44 => 17,  25 => 4,  21 => 2,  31 => 4,  38 => 7,  26 => 1,  28 => 3,  24 => 3,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 14,  40 => 11,  37 => 10,  22 => 1,  246 => 138,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 59,  111 => 37,  108 => 36,  101 => 55,  98 => 31,  96 => 31,  83 => 31,  74 => 18,  66 => 14,  55 => 15,  52 => 20,  50 => 18,  43 => 8,  41 => 11,  35 => 5,  32 => 8,  29 => 5,  209 => 161,  203 => 108,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 84,  176 => 64,  173 => 74,  168 => 48,  164 => 59,  162 => 57,  154 => 61,  149 => 68,  147 => 57,  144 => 49,  141 => 48,  133 => 37,  130 => 36,  125 => 44,  122 => 43,  116 => 41,  112 => 58,  109 => 39,  106 => 38,  103 => 35,  99 => 36,  95 => 54,  92 => 21,  86 => 35,  82 => 34,  80 => 30,  73 => 19,  64 => 25,  60 => 14,  57 => 23,  54 => 19,  51 => 22,  48 => 18,  45 => 17,  42 => 16,  39 => 16,  36 => 7,  33 => 7,  30 => 7,);
    }
}
