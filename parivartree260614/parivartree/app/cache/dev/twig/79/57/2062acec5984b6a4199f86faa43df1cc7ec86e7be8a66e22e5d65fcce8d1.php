<?php

/* ::base_error.html.twig */
class __TwigTemplate_79572062acec5984b6a4199f86faa43df1cc7ec86e7be8a66e22e5d65fcce8d1 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 2
            echo "    <div class=\"flash-notice\">
        ";
            // line 3
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "::base_error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1402 => 419,  1396 => 417,  1390 => 415,  1388 => 414,  1386 => 413,  1382 => 412,  1373 => 411,  1371 => 410,  1368 => 409,  1355 => 403,  1349 => 401,  1343 => 399,  1341 => 398,  1339 => 397,  1335 => 396,  1329 => 395,  1327 => 394,  1324 => 393,  1311 => 387,  1305 => 385,  1299 => 383,  1297 => 382,  1295 => 381,  1291 => 380,  1287 => 379,  1283 => 378,  1279 => 377,  1273 => 376,  1271 => 375,  1268 => 374,  1256 => 369,  1251 => 368,  1249 => 367,  1246 => 366,  1237 => 360,  1231 => 358,  1228 => 357,  1223 => 356,  1221 => 355,  1218 => 354,  1211 => 349,  1202 => 347,  1198 => 346,  1195 => 345,  1192 => 344,  1190 => 343,  1187 => 342,  1179 => 338,  1177 => 337,  1174 => 336,  1168 => 332,  1162 => 330,  1159 => 329,  1157 => 328,  1154 => 327,  1145 => 322,  1143 => 321,  1118 => 320,  1115 => 319,  1112 => 318,  1109 => 317,  1106 => 316,  1103 => 315,  1100 => 314,  1098 => 313,  1095 => 312,  1088 => 308,  1084 => 307,  1079 => 306,  1074 => 304,  1067 => 299,  1056 => 293,  1053 => 292,  1040 => 285,  1036 => 284,  1032 => 283,  1029 => 282,  1027 => 281,  1024 => 280,  1016 => 276,  1014 => 272,  1012 => 271,  1009 => 270,  982 => 261,  979 => 260,  976 => 259,  973 => 258,  964 => 255,  961 => 254,  958 => 253,  952 => 251,  950 => 250,  939 => 243,  936 => 242,  934 => 241,  931 => 240,  920 => 235,  918 => 234,  915 => 233,  903 => 229,  900 => 228,  897 => 227,  894 => 226,  892 => 225,  889 => 224,  881 => 220,  878 => 219,  876 => 218,  873 => 217,  865 => 213,  860 => 211,  857 => 210,  849 => 206,  846 => 205,  841 => 203,  833 => 199,  825 => 196,  817 => 192,  814 => 191,  801 => 185,  798 => 184,  793 => 182,  785 => 178,  783 => 177,  772 => 172,  769 => 171,  767 => 170,  756 => 165,  753 => 164,  739 => 156,  729 => 155,  721 => 153,  715 => 151,  712 => 150,  707 => 148,  699 => 142,  697 => 141,  683 => 135,  680 => 134,  675 => 132,  666 => 126,  662 => 125,  654 => 123,  643 => 120,  638 => 118,  617 => 112,  614 => 111,  598 => 107,  596 => 106,  593 => 105,  576 => 101,  555 => 95,  550 => 94,  547 => 93,  515 => 85,  509 => 83,  503 => 81,  467 => 72,  464 => 71,  450 => 64,  442 => 62,  433 => 60,  428 => 59,  400 => 47,  385 => 41,  366 => 33,  332 => 20,  316 => 16,  299 => 8,  266 => 366,  263 => 365,  245 => 335,  1077 => 305,  1073 => 656,  1069 => 654,  1064 => 298,  1055 => 648,  1051 => 291,  1048 => 290,  1044 => 645,  1035 => 639,  1026 => 633,  1023 => 632,  1021 => 631,  1018 => 630,  1013 => 627,  1004 => 266,  1000 => 623,  997 => 622,  993 => 621,  984 => 615,  975 => 609,  972 => 608,  970 => 257,  967 => 256,  963 => 604,  959 => 602,  955 => 252,  947 => 249,  941 => 595,  937 => 593,  935 => 592,  930 => 590,  926 => 589,  923 => 236,  919 => 587,  911 => 581,  909 => 580,  905 => 579,  896 => 573,  893 => 572,  891 => 571,  888 => 570,  884 => 568,  880 => 566,  874 => 562,  870 => 560,  864 => 558,  862 => 212,  854 => 552,  848 => 548,  844 => 204,  838 => 544,  836 => 543,  830 => 198,  828 => 197,  824 => 537,  815 => 531,  812 => 190,  800 => 523,  790 => 519,  780 => 176,  774 => 509,  764 => 169,  737 => 490,  732 => 487,  718 => 482,  705 => 480,  692 => 474,  678 => 133,  676 => 467,  671 => 465,  668 => 464,  628 => 444,  616 => 440,  591 => 436,  587 => 434,  578 => 432,  574 => 431,  565 => 430,  563 => 429,  542 => 421,  536 => 419,  534 => 418,  514 => 415,  280 => 194,  462 => 202,  439 => 195,  429 => 188,  422 => 184,  415 => 180,  408 => 50,  373 => 156,  348 => 140,  320 => 127,  300 => 121,  289 => 196,  270 => 102,  226 => 84,  181 => 232,  810 => 529,  807 => 528,  796 => 183,  792 => 488,  788 => 518,  775 => 485,  749 => 162,  746 => 161,  727 => 476,  706 => 473,  702 => 479,  698 => 477,  694 => 138,  690 => 469,  686 => 472,  682 => 470,  679 => 466,  677 => 465,  660 => 464,  634 => 456,  625 => 453,  620 => 451,  606 => 449,  601 => 446,  567 => 414,  532 => 410,  527 => 91,  522 => 406,  202 => 266,  403 => 48,  401 => 172,  391 => 133,  382 => 131,  356 => 122,  347 => 119,  234 => 90,  389 => 160,  380 => 160,  363 => 32,  361 => 146,  358 => 151,  345 => 147,  340 => 145,  331 => 140,  326 => 138,  307 => 128,  288 => 4,  281 => 409,  259 => 103,  255 => 353,  253 => 342,  248 => 336,  213 => 78,  197 => 249,  175 => 58,  191 => 246,  185 => 66,  113 => 40,  104 => 90,  367 => 155,  353 => 121,  306 => 286,  232 => 89,  161 => 202,  184 => 233,  170 => 84,  150 => 55,  84 => 41,  65 => 17,  292 => 156,  287 => 153,  265 => 105,  257 => 141,  251 => 182,  233 => 304,  186 => 239,  167 => 71,  153 => 56,  148 => 67,  126 => 147,  195 => 89,  146 => 181,  58 => 15,  757 => 345,  751 => 163,  742 => 492,  738 => 338,  734 => 337,  728 => 334,  724 => 154,  710 => 149,  703 => 321,  696 => 140,  674 => 304,  667 => 300,  659 => 295,  645 => 290,  639 => 287,  635 => 117,  630 => 284,  566 => 222,  559 => 427,  553 => 425,  548 => 215,  543 => 214,  537 => 212,  531 => 210,  529 => 92,  525 => 208,  517 => 404,  512 => 84,  506 => 200,  501 => 80,  496 => 79,  490 => 77,  484 => 193,  482 => 192,  470 => 73,  459 => 69,  443 => 178,  412 => 166,  396 => 161,  390 => 43,  388 => 42,  329 => 131,  324 => 112,  274 => 96,  260 => 363,  256 => 96,  244 => 128,  222 => 297,  216 => 79,  206 => 87,  200 => 72,  127 => 35,  100 => 36,  350 => 26,  342 => 23,  284 => 112,  271 => 374,  267 => 101,  228 => 128,  215 => 280,  211 => 88,  178 => 64,  165 => 60,  20 => 1,  809 => 189,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 507,  762 => 504,  754 => 499,  745 => 493,  740 => 491,  723 => 293,  717 => 329,  711 => 291,  708 => 290,  695 => 139,  689 => 137,  681 => 308,  673 => 279,  664 => 463,  661 => 276,  658 => 124,  655 => 457,  651 => 272,  649 => 122,  646 => 451,  642 => 449,  640 => 119,  636 => 446,  631 => 265,  629 => 454,  626 => 443,  622 => 442,  619 => 113,  603 => 439,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 99,  560 => 243,  557 => 96,  554 => 241,  551 => 424,  549 => 411,  546 => 423,  530 => 417,  524 => 90,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 181,  451 => 209,  447 => 207,  441 => 196,  438 => 204,  434 => 202,  411 => 194,  405 => 49,  397 => 190,  383 => 185,  378 => 157,  371 => 35,  335 => 21,  318 => 164,  302 => 125,  293 => 6,  377 => 37,  354 => 192,  338 => 135,  330 => 183,  313 => 15,  308 => 13,  262 => 188,  242 => 116,  237 => 91,  231 => 96,  225 => 298,  223 => 114,  198 => 107,  194 => 248,  192 => 82,  155 => 55,  134 => 161,  129 => 148,  124 => 132,  110 => 38,  508 => 227,  505 => 250,  493 => 78,  487 => 238,  478 => 74,  468 => 223,  465 => 187,  456 => 68,  446 => 197,  436 => 214,  426 => 58,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 156,  370 => 198,  349 => 144,  344 => 24,  339 => 179,  333 => 115,  327 => 175,  325 => 129,  321 => 135,  317 => 134,  311 => 14,  303 => 122,  296 => 121,  275 => 105,  249 => 181,  212 => 279,  210 => 270,  205 => 138,  23 => 2,  70 => 19,  449 => 198,  431 => 189,  418 => 170,  414 => 52,  394 => 168,  386 => 159,  372 => 115,  364 => 113,  359 => 123,  351 => 141,  346 => 190,  343 => 146,  334 => 141,  328 => 113,  323 => 128,  315 => 125,  304 => 67,  297 => 200,  290 => 5,  286 => 112,  282 => 57,  279 => 110,  276 => 393,  250 => 341,  207 => 269,  190 => 92,  188 => 90,  174 => 217,  152 => 54,  137 => 65,  118 => 49,  114 => 111,  97 => 41,  90 => 27,  81 => 40,  76 => 31,  180 => 70,  172 => 62,  77 => 25,  53 => 11,  34 => 5,  480 => 75,  474 => 161,  469 => 158,  461 => 70,  457 => 153,  453 => 199,  444 => 206,  440 => 148,  437 => 61,  435 => 175,  430 => 201,  427 => 200,  423 => 57,  413 => 141,  409 => 132,  407 => 138,  402 => 163,  398 => 129,  393 => 126,  387 => 164,  384 => 157,  381 => 120,  379 => 119,  374 => 36,  368 => 34,  365 => 125,  362 => 124,  360 => 147,  355 => 27,  341 => 117,  337 => 22,  322 => 165,  314 => 99,  312 => 124,  309 => 129,  305 => 108,  298 => 120,  294 => 90,  285 => 3,  283 => 115,  278 => 408,  268 => 373,  264 => 84,  258 => 354,  252 => 140,  247 => 121,  241 => 90,  229 => 85,  220 => 290,  214 => 123,  177 => 69,  169 => 210,  140 => 53,  132 => 51,  128 => 42,  107 => 37,  61 => 2,  273 => 392,  269 => 107,  254 => 198,  243 => 327,  240 => 326,  238 => 312,  235 => 311,  230 => 303,  227 => 301,  224 => 127,  221 => 80,  219 => 125,  217 => 289,  208 => 76,  204 => 267,  179 => 224,  159 => 196,  143 => 69,  135 => 46,  119 => 117,  102 => 30,  71 => 19,  67 => 16,  63 => 18,  59 => 13,  93 => 28,  88 => 30,  78 => 24,  94 => 57,  89 => 47,  85 => 26,  75 => 22,  68 => 20,  56 => 14,  27 => 3,  201 => 74,  196 => 92,  183 => 71,  171 => 216,  166 => 209,  163 => 82,  158 => 80,  156 => 195,  151 => 188,  142 => 64,  138 => 47,  136 => 168,  121 => 131,  117 => 37,  105 => 34,  91 => 29,  62 => 14,  49 => 12,  87 => 26,  46 => 10,  44 => 8,  25 => 35,  21 => 2,  31 => 4,  38 => 5,  26 => 3,  28 => 3,  24 => 3,  19 => 1,  79 => 32,  72 => 18,  69 => 13,  47 => 10,  40 => 11,  37 => 7,  22 => 2,  246 => 93,  157 => 56,  145 => 74,  139 => 169,  131 => 160,  123 => 42,  120 => 38,  115 => 40,  111 => 110,  108 => 33,  101 => 89,  98 => 29,  96 => 67,  83 => 33,  74 => 20,  66 => 12,  55 => 12,  52 => 12,  50 => 10,  43 => 9,  41 => 7,  35 => 4,  32 => 5,  29 => 3,  209 => 161,  203 => 73,  199 => 265,  193 => 95,  189 => 240,  187 => 92,  182 => 87,  176 => 223,  173 => 85,  168 => 61,  164 => 203,  162 => 59,  154 => 189,  149 => 182,  147 => 54,  144 => 176,  141 => 175,  133 => 45,  130 => 46,  125 => 41,  122 => 43,  116 => 116,  112 => 39,  109 => 105,  106 => 104,  103 => 50,  99 => 68,  95 => 27,  92 => 31,  86 => 46,  82 => 25,  80 => 24,  73 => 23,  64 => 17,  60 => 20,  57 => 19,  54 => 15,  51 => 13,  48 => 10,  45 => 8,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
