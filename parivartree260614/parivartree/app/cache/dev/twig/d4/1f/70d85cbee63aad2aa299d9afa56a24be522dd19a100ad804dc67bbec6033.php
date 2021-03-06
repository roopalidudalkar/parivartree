<?php

/* WebProfilerBundle:Collector:router.html.twig */
class __TwigTemplate_d41f70d85cbee63aad2aa299d9afa56a24be522dd19a100ad804dc67bbec6033 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@WebProfiler/Profiler/layout.html.twig");

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
    }

    // line 6
    public function block_menu($context, array $blocks = array())
    {
        // line 7
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABDlBMVEU/Pz////////////////////////////////////////////////////////////////////+qqqr///////////+kpKT///////////////////////////////////+Kior///////////+Ghob///////9kZGT///////////////////////9bW1v///9aWlpZWVn////t7e3////m5ub///9cXFxZWVn////////////////////KysrNzc3///9tbW1WVlZTU1NwcHCnp6dgYGCBgYGZmZl3d3dLS0tMTEyNjY2Tk5NJSUlFRUVERERZWVlCQkJVVVVAQEBCQkJUVFRVVVU/Pz9ERER+LwjMAAAAWHRSTlMAAQIDBQYHCAkLDQ4VFhscHyAiIiMlJjAyNDY3ODk9P0BAREpMTlBdXl9rb3BzdHl6gICChIyPlaOmqKuusLm6v8HFzM3X2tzd4ePn6Onq8vb5+vv9/f3+EYS6xwAAAQFJREFUeNrN0dlSwkAQBdAbA2FTQIIsAmJEA5qIiIoim8oibigI0vz/jygFZEwIw4sP3reeOtVTdRt/G6kwHBYkDvC/EL0HOCBGP4lzwN4UHJGRrMMClOmrzsDH/oYNKBLLc0gA4MwvZtUK6MELiIeDxagvgY4MIdIzxqIVfF6F4WvSSjBpZHyQW6tBO7clIHjRNwO9dDdP5UQWAc9BfWICalSZZzfgBCBsHndNQIEl4o5Wna0s6UYZROcSO3IwMVsZVX9Xfe0CAF7VN+414N7PB68aH7xdxm2+YEXVzmJuLANWVHLbBXvAivqnID0iGqU5IPU0/npMckD49LasyTDlG31Ah7wRFiUBAAAAAElFTkSuQmCC\" alt=\"Routing\"></span>
    <strong>Routing</strong>
</span>
";
    }

    // line 13
    public function block_panel($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => $this->getContext($context, "token"))));
        echo "
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1077 => 657,  1073 => 656,  1069 => 654,  1064 => 651,  1055 => 648,  1051 => 647,  1048 => 646,  1044 => 645,  1035 => 639,  1026 => 633,  1023 => 632,  1021 => 631,  1018 => 630,  1013 => 627,  1004 => 624,  1000 => 623,  997 => 622,  993 => 621,  984 => 615,  975 => 609,  972 => 608,  970 => 607,  967 => 606,  963 => 604,  959 => 602,  955 => 600,  947 => 597,  941 => 595,  937 => 593,  935 => 592,  930 => 590,  926 => 589,  923 => 588,  919 => 587,  911 => 581,  909 => 580,  905 => 579,  896 => 573,  893 => 572,  891 => 571,  888 => 570,  884 => 568,  880 => 566,  874 => 562,  870 => 560,  864 => 558,  862 => 557,  854 => 552,  848 => 548,  844 => 546,  838 => 544,  836 => 543,  830 => 539,  828 => 538,  824 => 537,  815 => 531,  812 => 530,  800 => 523,  790 => 519,  780 => 513,  774 => 509,  764 => 505,  737 => 490,  732 => 487,  718 => 482,  705 => 480,  692 => 474,  678 => 468,  676 => 467,  671 => 465,  668 => 464,  628 => 444,  616 => 440,  591 => 436,  587 => 434,  578 => 432,  574 => 431,  565 => 430,  563 => 429,  542 => 421,  536 => 419,  534 => 418,  514 => 415,  280 => 194,  462 => 202,  439 => 195,  429 => 188,  422 => 184,  415 => 180,  408 => 176,  373 => 156,  348 => 140,  320 => 127,  300 => 121,  289 => 196,  270 => 102,  226 => 84,  181 => 65,  810 => 529,  807 => 528,  796 => 521,  792 => 488,  788 => 518,  775 => 485,  749 => 479,  746 => 478,  727 => 476,  706 => 473,  702 => 479,  698 => 477,  694 => 470,  690 => 469,  686 => 472,  682 => 470,  679 => 466,  677 => 465,  660 => 464,  634 => 456,  625 => 453,  620 => 451,  606 => 449,  601 => 446,  567 => 414,  532 => 410,  527 => 416,  522 => 406,  202 => 94,  403 => 136,  401 => 172,  391 => 133,  382 => 131,  356 => 122,  347 => 119,  234 => 90,  389 => 160,  380 => 160,  363 => 153,  361 => 146,  358 => 151,  345 => 147,  340 => 145,  331 => 140,  326 => 138,  307 => 128,  288 => 118,  281 => 98,  259 => 103,  255 => 101,  253 => 100,  248 => 94,  213 => 78,  197 => 71,  175 => 58,  191 => 69,  185 => 66,  113 => 38,  104 => 31,  367 => 155,  353 => 121,  306 => 286,  232 => 89,  161 => 58,  184 => 63,  170 => 84,  150 => 55,  84 => 24,  65 => 11,  292 => 156,  287 => 153,  265 => 105,  257 => 141,  251 => 182,  233 => 87,  186 => 72,  167 => 71,  153 => 56,  148 => 67,  126 => 83,  195 => 89,  146 => 64,  58 => 25,  757 => 345,  751 => 341,  742 => 492,  738 => 338,  734 => 337,  728 => 334,  724 => 484,  710 => 475,  703 => 321,  696 => 476,  674 => 304,  667 => 300,  659 => 295,  645 => 290,  639 => 287,  635 => 286,  630 => 284,  566 => 222,  559 => 427,  553 => 425,  548 => 215,  543 => 214,  537 => 212,  531 => 210,  529 => 409,  525 => 208,  517 => 404,  512 => 204,  506 => 200,  501 => 198,  496 => 197,  490 => 195,  484 => 193,  482 => 192,  470 => 190,  459 => 183,  443 => 178,  412 => 166,  396 => 161,  390 => 159,  388 => 158,  329 => 131,  324 => 112,  274 => 96,  260 => 142,  256 => 96,  244 => 128,  222 => 83,  216 => 79,  206 => 87,  200 => 72,  127 => 35,  100 => 46,  350 => 120,  342 => 137,  284 => 112,  271 => 190,  267 => 101,  228 => 128,  215 => 104,  211 => 88,  178 => 64,  165 => 60,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 507,  762 => 504,  754 => 499,  745 => 493,  740 => 491,  723 => 293,  717 => 329,  711 => 291,  708 => 290,  695 => 284,  689 => 313,  681 => 308,  673 => 279,  664 => 463,  661 => 276,  658 => 275,  655 => 457,  651 => 272,  649 => 462,  646 => 451,  642 => 449,  640 => 448,  636 => 446,  631 => 265,  629 => 454,  626 => 443,  622 => 442,  619 => 260,  603 => 439,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 424,  549 => 411,  546 => 423,  530 => 417,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 181,  451 => 209,  447 => 207,  441 => 196,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 157,  371 => 127,  335 => 134,  318 => 164,  302 => 125,  293 => 198,  377 => 129,  354 => 192,  338 => 135,  330 => 183,  313 => 110,  308 => 109,  262 => 188,  242 => 116,  237 => 91,  231 => 96,  225 => 115,  223 => 114,  198 => 107,  194 => 70,  192 => 82,  155 => 55,  134 => 47,  129 => 63,  124 => 57,  110 => 22,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 191,  468 => 223,  465 => 187,  456 => 218,  446 => 197,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 156,  370 => 198,  349 => 144,  344 => 180,  339 => 179,  333 => 115,  327 => 175,  325 => 129,  321 => 135,  317 => 134,  311 => 162,  303 => 122,  296 => 121,  275 => 105,  249 => 181,  212 => 254,  210 => 77,  205 => 138,  23 => 1,  70 => 19,  449 => 198,  431 => 189,  418 => 170,  414 => 142,  394 => 168,  386 => 159,  372 => 115,  364 => 113,  359 => 123,  351 => 141,  346 => 190,  343 => 146,  334 => 141,  328 => 113,  323 => 128,  315 => 125,  304 => 67,  297 => 200,  290 => 119,  286 => 112,  282 => 57,  279 => 110,  276 => 193,  250 => 102,  207 => 75,  190 => 92,  188 => 90,  174 => 74,  152 => 54,  137 => 65,  118 => 49,  114 => 36,  97 => 41,  90 => 26,  81 => 23,  76 => 25,  180 => 70,  172 => 62,  77 => 20,  53 => 12,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 199,  444 => 206,  440 => 148,  437 => 176,  435 => 175,  430 => 201,  427 => 200,  423 => 173,  413 => 141,  409 => 132,  407 => 138,  402 => 163,  398 => 129,  393 => 126,  387 => 164,  384 => 157,  381 => 120,  379 => 119,  374 => 128,  368 => 126,  365 => 125,  362 => 124,  360 => 147,  355 => 143,  341 => 117,  337 => 140,  322 => 165,  314 => 99,  312 => 124,  309 => 129,  305 => 108,  298 => 120,  294 => 90,  285 => 100,  283 => 115,  278 => 106,  268 => 107,  264 => 84,  258 => 187,  252 => 140,  247 => 121,  241 => 90,  229 => 85,  220 => 81,  214 => 123,  177 => 69,  169 => 75,  140 => 53,  132 => 51,  128 => 42,  107 => 56,  61 => 17,  273 => 96,  269 => 107,  254 => 198,  243 => 88,  240 => 14,  238 => 125,  235 => 89,  230 => 11,  227 => 86,  224 => 127,  221 => 80,  219 => 125,  217 => 75,  208 => 76,  204 => 75,  179 => 69,  159 => 57,  143 => 69,  135 => 46,  119 => 40,  102 => 33,  71 => 23,  67 => 18,  63 => 18,  59 => 11,  93 => 27,  88 => 32,  78 => 19,  94 => 21,  89 => 30,  85 => 23,  75 => 18,  68 => 30,  56 => 11,  27 => 3,  201 => 74,  196 => 92,  183 => 71,  171 => 73,  166 => 54,  163 => 82,  158 => 80,  156 => 58,  151 => 63,  142 => 64,  138 => 47,  136 => 71,  121 => 50,  117 => 37,  105 => 34,  91 => 33,  62 => 12,  49 => 14,  87 => 41,  46 => 13,  44 => 9,  25 => 35,  21 => 2,  31 => 4,  38 => 7,  26 => 3,  28 => 3,  24 => 3,  19 => 1,  79 => 21,  72 => 17,  69 => 16,  47 => 11,  40 => 8,  37 => 7,  22 => 2,  246 => 93,  157 => 56,  145 => 74,  139 => 63,  131 => 61,  123 => 42,  120 => 38,  115 => 58,  111 => 47,  108 => 33,  101 => 30,  98 => 45,  96 => 30,  83 => 33,  74 => 27,  66 => 25,  55 => 13,  52 => 12,  50 => 22,  43 => 9,  41 => 8,  35 => 6,  32 => 5,  29 => 3,  209 => 161,  203 => 73,  199 => 93,  193 => 95,  189 => 66,  187 => 92,  182 => 87,  176 => 63,  173 => 85,  168 => 61,  164 => 70,  162 => 59,  154 => 61,  149 => 68,  147 => 54,  144 => 42,  141 => 51,  133 => 45,  130 => 46,  125 => 41,  122 => 43,  116 => 39,  112 => 58,  109 => 52,  106 => 51,  103 => 50,  99 => 31,  95 => 27,  92 => 43,  86 => 51,  82 => 28,  80 => 27,  73 => 20,  64 => 13,  60 => 12,  57 => 20,  54 => 19,  51 => 13,  48 => 16,  45 => 10,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
