<?php

/* AdminAdminBundle:Admin:headerw.html.twig */
class __TwigTemplate_f32706e43e58465c79558aa9a1992c7031fa8accf945e505c9ae69bbce23391a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
                <link href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
                <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
                <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
\t\t\t\t  <script src=\"http://code.jquery.com/jquery-1.10.2.min.js\"></script>
\t\t\t\t  <script type=\"text/javascript\"> \$(document).ready(function () { \$('.dropdown-toggle').dropdown(); }); </script>
                       
                        <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script> <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "
              
                     



<div class=\"header-top-block\">
                <div class=\"container\">
                        <div class=\"col-md-2\"><a href=\"#\"><img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo1.png"), "html", null, true);
        echo "\" ></a></div>
                        

                        <div class=\"col-md-10 clear-both admin-menu\">
                <div class=\"navbar\" role=\"navigation\">
        <div class=\"container-fluid\">
          <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
              <span class=\"sr-only\">Toggle navigation</span>
              <span class=\"icon-bar\"></span>
              <span class=\"icon-bar\"></span>
              <span class=\"icon-bar\"></span>
            </button>
         </div>
          <div class=\"navbar-collapse collapse clear-both\">
            <ul class=\"nav navbar-nav navbar-right notification\">
              <li><a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("admin_admin_dashboard");
        echo "\">Dashboard</a></li>
              <li><a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("admin_admin_userdetails");
        echo "\">Users</a></li>
\t\t\t \t
\t\t\t\t
\t\t\t\t
\t\t\t\t\t<li class=\"dropdown master\" > <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Master<b class=\"caret\"></b></a>
\t\t\t\t\t  <ul class=\"dropdown-menu\">
\t\t\t\t\t\t  <li><a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("admin_admin_religion");
        echo "\">Religion</a></li>
\t\t\t\t\t\t  <li><a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("admin_admin_community");
        echo "\">Community</a></li>
\t\t\t\t\t\t  <li><a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("admin_admin_gothra");
        echo "\">Gothra</a></li>
\t\t\t\t\t  </ul>
       \t\t\t </li>\t
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
</div>
</div>

</div>
";
        // line 57
        $this->displayBlock('body', $context, $blocks);
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "\t\t\t\t\t
                
        ";
    }

    // line 57
    public function block_body($context, array $blocks = array())
    {
        // line 58
        echo "
";
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Admin:headerw.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 58,  195 => 89,  146 => 64,  58 => 20,  757 => 345,  751 => 341,  742 => 339,  738 => 338,  734 => 337,  728 => 334,  724 => 333,  710 => 325,  703 => 321,  696 => 317,  674 => 304,  667 => 300,  659 => 295,  645 => 290,  639 => 287,  635 => 286,  630 => 284,  566 => 222,  559 => 220,  553 => 217,  548 => 215,  543 => 214,  537 => 212,  531 => 210,  529 => 209,  525 => 208,  517 => 207,  512 => 204,  506 => 200,  501 => 198,  496 => 197,  490 => 195,  484 => 193,  482 => 192,  470 => 190,  459 => 183,  443 => 178,  412 => 166,  396 => 161,  390 => 159,  388 => 158,  329 => 139,  324 => 136,  274 => 109,  260 => 104,  256 => 103,  244 => 101,  222 => 94,  216 => 90,  206 => 87,  200 => 85,  127 => 54,  100 => 53,  350 => 191,  342 => 189,  284 => 112,  271 => 136,  267 => 135,  228 => 108,  215 => 104,  211 => 88,  178 => 76,  165 => 69,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 322,  762 => 347,  754 => 316,  745 => 310,  740 => 308,  723 => 293,  717 => 329,  711 => 291,  708 => 290,  695 => 284,  689 => 313,  681 => 308,  673 => 279,  664 => 277,  661 => 276,  658 => 275,  655 => 294,  651 => 272,  649 => 291,  646 => 270,  642 => 268,  640 => 267,  636 => 266,  631 => 265,  629 => 264,  626 => 263,  622 => 261,  619 => 260,  603 => 254,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 240,  549 => 239,  546 => 238,  530 => 232,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 181,  451 => 209,  447 => 207,  441 => 205,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 184,  371 => 153,  335 => 169,  318 => 164,  302 => 152,  293 => 157,  377 => 4,  354 => 192,  338 => 186,  330 => 183,  313 => 174,  308 => 161,  262 => 105,  242 => 116,  237 => 97,  231 => 96,  225 => 115,  223 => 114,  198 => 107,  194 => 83,  192 => 82,  155 => 69,  134 => 64,  129 => 63,  124 => 46,  110 => 57,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 191,  468 => 223,  465 => 187,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 156,  370 => 198,  349 => 144,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 166,  321 => 135,  317 => 134,  311 => 162,  303 => 165,  296 => 163,  275 => 154,  249 => 139,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 26,  449 => 180,  431 => 174,  418 => 170,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 190,  343 => 142,  334 => 88,  328 => 82,  323 => 80,  315 => 163,  304 => 67,  297 => 116,  290 => 115,  286 => 58,  282 => 57,  279 => 110,  276 => 137,  250 => 102,  207 => 102,  190 => 92,  188 => 81,  174 => 52,  152 => 67,  137 => 65,  118 => 42,  114 => 9,  97 => 39,  90 => 33,  81 => 50,  76 => 36,  180 => 55,  172 => 101,  77 => 19,  53 => 21,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 206,  440 => 148,  437 => 176,  435 => 175,  430 => 201,  427 => 200,  423 => 173,  413 => 134,  409 => 132,  407 => 164,  402 => 163,  398 => 129,  393 => 126,  387 => 187,  384 => 157,  381 => 120,  379 => 119,  374 => 182,  368 => 180,  365 => 149,  362 => 195,  360 => 147,  355 => 146,  341 => 141,  337 => 140,  322 => 165,  314 => 99,  312 => 98,  309 => 97,  305 => 160,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 107,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 80,  169 => 75,  140 => 53,  132 => 51,  128 => 49,  107 => 56,  61 => 21,  273 => 96,  269 => 151,  254 => 198,  243 => 88,  240 => 14,  238 => 85,  235 => 112,  230 => 11,  227 => 10,  224 => 107,  221 => 8,  219 => 105,  217 => 75,  208 => 92,  204 => 72,  179 => 69,  159 => 72,  143 => 67,  135 => 53,  119 => 42,  102 => 37,  71 => 27,  67 => 24,  63 => 15,  59 => 14,  93 => 53,  88 => 44,  78 => 33,  94 => 28,  89 => 20,  85 => 33,  75 => 37,  68 => 31,  56 => 21,  27 => 4,  201 => 92,  196 => 90,  183 => 83,  171 => 77,  166 => 71,  163 => 74,  158 => 70,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 52,  121 => 51,  117 => 10,  105 => 40,  91 => 36,  62 => 13,  49 => 17,  87 => 32,  46 => 13,  44 => 9,  25 => 4,  21 => 1,  31 => 4,  38 => 8,  26 => 2,  28 => 3,  24 => 3,  19 => 1,  79 => 38,  72 => 16,  69 => 17,  47 => 14,  40 => 11,  37 => 10,  22 => 1,  246 => 138,  157 => 56,  145 => 46,  139 => 60,  131 => 52,  123 => 57,  120 => 40,  115 => 48,  111 => 37,  108 => 36,  101 => 55,  98 => 31,  96 => 46,  83 => 31,  74 => 18,  66 => 14,  55 => 15,  52 => 20,  50 => 18,  43 => 8,  41 => 21,  35 => 5,  32 => 8,  29 => 5,  209 => 161,  203 => 108,  199 => 67,  193 => 73,  189 => 86,  187 => 84,  182 => 80,  176 => 79,  173 => 74,  168 => 48,  164 => 73,  162 => 57,  154 => 61,  149 => 68,  147 => 57,  144 => 66,  141 => 48,  133 => 57,  130 => 36,  125 => 60,  122 => 43,  116 => 41,  112 => 58,  109 => 45,  106 => 38,  103 => 42,  99 => 36,  95 => 54,  92 => 45,  86 => 35,  82 => 40,  80 => 30,  73 => 27,  64 => 25,  60 => 14,  57 => 23,  54 => 19,  51 => 22,  48 => 19,  45 => 17,  42 => 13,  39 => 16,  36 => 7,  33 => 7,  30 => 7,);
    }
}
