<?php

/* AdminAdminBundle:Admin:inactiveusers.html.twig */
class __TwigTemplate_017538cfd6a99cd727bf46962e3c807af206798f234814ee1d747a3e5f6ed47a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AdminAdminBundle:Admin:headerw.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AdminAdminBundle:Admin:headerw.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        echo " 
<script type=\"text/javascript\">
 function deletefunc(id,firstname){

\tvar con = confirm('Are you sure to delete '+firstname+' ? The record once deleted cannot be retrived back');

\tif(con){

\t\tvar url = \"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("admin_admin_deleteuser", array("id" => "ID"));
        echo "\";

\t\tvar urlset = url.replace('ID', id);

\t\t\twindow.open(urlset,\"_self\");

\t\treturn true;

\t}else{

\t\treturn false;

\t}

 }

</script>\t

\t

<div class=\"container\">\t

<div class=\"page-header\">

\t<h4>User Details</h4>

</div>

<div class=\"row admin-header-btn\">
\t <a class=\"btn btn-primary pull-right\" href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("admin_admin_userdetails");
        echo "\">Active Users</a>
\t<a class=\"btn btn-primary pull-right\" href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("admin_admin_inactiveusers");
        echo "\">Inactive Users</a>
</div>


<div class=\"table-responsive user-details\">



<table class=\"table table-bordered\">

\t<thead>

\t<tr>

\t\t<th>Firstname</th>

\t\t<th>Email</th>

\t\t<th>Created Date</th>

\t\t<th>Updated Date</th>

\t\t<th>Last Accessed</th>

\t\t<th>Last Accessed IP</th>

\t\t<th>Status</th>

\t\t<th>Update</th>

\t</tr>

\t</thead>

\t<tbody>

\t";
        // line 77
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "userdata"));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 78
            echo "
\t

\t<tr>

\t\t<td>";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "firstname"), "html", null, true);
            echo "</td>

\t\t<td><a href=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_admin_userprofile", array("id" => $this->getAttribute($this->getContext($context, "c"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "email"), "html", null, true);
            echo "</a></td>

\t\t<td>";
            // line 87
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "created"), "Y-m-d h:i:s"), "html", null, true);
            echo "</td>

\t\t<td>";
            // line 89
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "updated"), "Y-m-d h:i:s"), "html", null, true);
            echo "</td>

\t\t<td>";
            // line 91
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "last_access"), "Y-m-d h:i:s"), "html", null, true);
            echo "</td>

\t\t<td>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "last_access_ip"), "html", null, true);
            echo "</td>

\t\t<td>";
            // line 95
            if (($this->getAttribute($this->getContext($context, "c"), "status") == 0)) {
                echo " Inactive ";
            } elseif (($this->getAttribute($this->getContext($context, "c"), "status") == 1)) {
                echo " Active ";
            }
            echo "</td>

\t\t<td><a href=\"";
            // line 97
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_admin_updateuser", array("email" => $this->getAttribute($this->getContext($context, "c"), "email"))), "html", null, true);
            echo "\">Edit</a> | <a href=\"#\" onclick=\"deletefunc('";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "id"), "html", null, true);
            echo "','";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "firstname"), "html", null, true);
            echo "')\">Delete</a></td>

\t</tr>

\t

\t

\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "</tbody>

</table>

</div>

</div>



<div class=\"container\">

<div>Now showing : ";
        // line 117
        echo twig_escape_filter($this->env, $this->getContext($context, "from"), "html", null, true);
        echo " to ";
        echo twig_escape_filter($this->env, $this->getContext($context, "to"), "html", null, true);
        echo " records</div>

<div>";
        // line 119
        $context["page_count"] = intval(floor(((-$this->getContext($context, "count")) / 10)));
        echo " 

<ul class=\"pagination\">

";
        // line 123
        if (($this->getContext($context, "check") == 0)) {
            // line 124
            echo "
<li><a href=\"";
            // line 125
            echo $this->env->getExtension('routing')->getPath("admin_admin_inactiveusers", array("offset" => 1));
            echo "\">&laquo;</    a></li>
 
 ";
            // line 127
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (-$this->getContext($context, "page_count"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 128
                echo " 
 
   
   <li><a href=\"";
                // line 131
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_admin_inactiveusers", array("offset" => $this->getContext($context, "i"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</    a></li>
 
 
 
 ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 135
            echo " 
 
   
<li><a href=\"";
            // line 138
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_admin_inactiveusers", array("offset" => (-$this->getContext($context, "page_count")))), "html", null, true);
            echo "\">&raquo;</a></li>

";
        } else {
            // line 141
            echo "
  <li><a href=\"";
            // line 142
            echo $this->env->getExtension('routing')->getPath("admin_admin_userdetails", array("offset" => 1));
            echo "\">&laquo;</a></li>

";
            // line 144
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (-$this->getContext($context, "page_count"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 145
                echo "


  <li><a href=\"";
                // line 148
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_admin_userdetails", array("offset" => $this->getContext($context, "i"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</a></li>



";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 153
            echo "
   

  <li><a href=\"";
            // line 156
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_admin_userdetails", array("offset" => (-$this->getContext($context, "page_count")))), "html", null, true);
            echo "\">&raquo;</a></li>
";
        }
        // line 158
        echo "</ul>

</div>

</div>





</div>





";
    }

    public function getTemplateName()
    {
        return "AdminAdminBundle:Admin:inactiveusers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 156,  287 => 153,  265 => 144,  257 => 141,  251 => 138,  233 => 131,  186 => 105,  167 => 97,  153 => 93,  148 => 91,  126 => 83,  195 => 89,  146 => 64,  58 => 17,  757 => 345,  751 => 341,  742 => 339,  738 => 338,  734 => 337,  728 => 334,  724 => 333,  710 => 325,  703 => 321,  696 => 317,  674 => 304,  667 => 300,  659 => 295,  645 => 290,  639 => 287,  635 => 286,  630 => 284,  566 => 222,  559 => 220,  553 => 217,  548 => 215,  543 => 214,  537 => 212,  531 => 210,  529 => 209,  525 => 208,  517 => 207,  512 => 204,  506 => 200,  501 => 198,  496 => 197,  490 => 195,  484 => 193,  482 => 192,  470 => 190,  459 => 183,  443 => 178,  412 => 166,  396 => 161,  390 => 159,  388 => 158,  329 => 139,  324 => 136,  274 => 148,  260 => 142,  256 => 103,  244 => 101,  222 => 94,  216 => 124,  206 => 87,  200 => 117,  127 => 54,  100 => 46,  350 => 191,  342 => 189,  284 => 112,  271 => 136,  267 => 135,  228 => 128,  215 => 104,  211 => 88,  178 => 76,  165 => 69,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 322,  762 => 347,  754 => 316,  745 => 310,  740 => 308,  723 => 293,  717 => 329,  711 => 291,  708 => 290,  695 => 284,  689 => 313,  681 => 308,  673 => 279,  664 => 277,  661 => 276,  658 => 275,  655 => 294,  651 => 272,  649 => 291,  646 => 270,  642 => 268,  640 => 267,  636 => 266,  631 => 265,  629 => 264,  626 => 263,  622 => 261,  619 => 260,  603 => 254,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 240,  549 => 239,  546 => 238,  530 => 232,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 181,  451 => 209,  447 => 207,  441 => 205,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 184,  371 => 153,  335 => 169,  318 => 164,  302 => 152,  293 => 157,  377 => 4,  354 => 192,  338 => 186,  330 => 183,  313 => 174,  308 => 161,  262 => 105,  242 => 116,  237 => 97,  231 => 96,  225 => 115,  223 => 114,  198 => 107,  194 => 83,  192 => 82,  155 => 69,  134 => 64,  129 => 63,  124 => 57,  110 => 57,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 191,  468 => 223,  465 => 187,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 156,  370 => 198,  349 => 144,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 166,  321 => 135,  317 => 134,  311 => 162,  303 => 165,  296 => 163,  275 => 154,  249 => 139,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 26,  449 => 180,  431 => 174,  418 => 170,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 190,  343 => 142,  334 => 88,  328 => 82,  323 => 80,  315 => 163,  304 => 67,  297 => 158,  290 => 115,  286 => 58,  282 => 57,  279 => 110,  276 => 137,  250 => 102,  207 => 119,  190 => 92,  188 => 81,  174 => 52,  152 => 67,  137 => 65,  118 => 42,  114 => 53,  97 => 39,  90 => 33,  81 => 41,  76 => 41,  180 => 55,  172 => 101,  77 => 34,  53 => 15,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 206,  440 => 148,  437 => 176,  435 => 175,  430 => 201,  427 => 200,  423 => 173,  413 => 134,  409 => 132,  407 => 164,  402 => 163,  398 => 129,  393 => 126,  387 => 187,  384 => 157,  381 => 120,  379 => 119,  374 => 182,  368 => 180,  365 => 149,  362 => 195,  360 => 147,  355 => 146,  341 => 141,  337 => 140,  322 => 165,  314 => 99,  312 => 98,  309 => 97,  305 => 160,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 107,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 77,  229 => 73,  220 => 70,  214 => 123,  177 => 80,  169 => 75,  140 => 53,  132 => 51,  128 => 58,  107 => 56,  61 => 29,  273 => 96,  269 => 145,  254 => 198,  243 => 88,  240 => 14,  238 => 85,  235 => 112,  230 => 11,  227 => 10,  224 => 127,  221 => 8,  219 => 125,  217 => 75,  208 => 92,  204 => 72,  179 => 69,  159 => 72,  143 => 89,  135 => 53,  119 => 78,  102 => 37,  71 => 27,  67 => 24,  63 => 15,  59 => 14,  93 => 53,  88 => 44,  78 => 33,  94 => 28,  89 => 20,  85 => 42,  75 => 37,  68 => 31,  56 => 21,  27 => 4,  201 => 92,  196 => 90,  183 => 83,  171 => 77,  166 => 71,  163 => 74,  158 => 95,  156 => 44,  151 => 63,  142 => 62,  138 => 87,  136 => 52,  121 => 51,  117 => 10,  105 => 40,  91 => 36,  62 => 13,  49 => 17,  87 => 32,  46 => 13,  44 => 9,  25 => 4,  21 => 1,  31 => 4,  38 => 8,  26 => 2,  28 => 3,  24 => 3,  19 => 1,  79 => 38,  72 => 40,  69 => 17,  47 => 12,  40 => 11,  37 => 9,  22 => 1,  246 => 135,  157 => 56,  145 => 63,  139 => 60,  131 => 85,  123 => 57,  120 => 56,  115 => 77,  111 => 37,  108 => 52,  101 => 55,  98 => 31,  96 => 46,  83 => 31,  74 => 18,  66 => 14,  55 => 15,  52 => 20,  50 => 18,  43 => 8,  41 => 9,  35 => 5,  32 => 6,  29 => 5,  209 => 161,  203 => 108,  199 => 67,  193 => 73,  189 => 86,  187 => 84,  182 => 80,  176 => 79,  173 => 74,  168 => 48,  164 => 73,  162 => 57,  154 => 61,  149 => 68,  147 => 57,  144 => 66,  141 => 48,  133 => 57,  130 => 36,  125 => 60,  122 => 43,  116 => 54,  112 => 58,  109 => 45,  106 => 38,  103 => 42,  99 => 36,  95 => 54,  92 => 45,  86 => 35,  82 => 40,  80 => 30,  73 => 38,  64 => 30,  60 => 14,  57 => 28,  54 => 19,  51 => 22,  48 => 19,  45 => 17,  42 => 13,  39 => 10,  36 => 7,  33 => 7,  30 => 7,);
    }
}
