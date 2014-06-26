<?php

/* TreeTreeBundle:User:mytree1.html.twig */
class __TwigTemplate_e74d754411e6098bad9a431aceac8087306646ef8297c01a1c7ff5a5a33ef437 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base_inner.html.twig");

        $this->blocks = array(
            'mainbody' => array($this, 'block_mainbody'),
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
    public function block_mainbody($context, array $blocks = array())
    {
        // line 4
        echo "
<script>
jQuery(document).ready(function(){
\$('#right').animate({ left: 250 }, 'slow', function() {
\t\t\t\t\$('#button').html('Less');
\t\t\t});
\t\$('#button').toggle( 
\t\tfunction() {
\t\t\t\$('#right').animate({ left: 0 }, 'slow', function() {
\t\t\t\t\$('#button').html('More');
\t\t\t});
\t\t}, 
\t\tfunction() {
\t\t\t\$('#right').animate({ left: 250 }, 'slow', function() {
\t\t\t\t\$('#button').html('Less');
\t\t\t});
\t\t}
\t);


\$('#form_search').autocomplete({
\t\t      \tsource: function( request, response ) {
\t\t      \t\t\$.ajax({
\t\t      \t\t\turl : '";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("SearchFamilyMember.php"), "html", null, true);
        echo "',
\t\t      \t\t\tdatatype : \"json\",
\t\t\t\t\t\tdata: {
\t\t\t\t\t\t   SearchParameter: request.term
\t\t\t\t\t\t},
\t\t\t\t\t\t success: function( data ) {
\t\t\t\t\t\t\t response( \$.map( data, function( item ) {
\t\t\t\t\t\t\t\treturn {
\t\t\t\t\t\t\t\t\tlabel: item,
\t\t\t\t\t\t\t\t\tvalue: item
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}));
\t\t\t\t\t\t}
\t\t      \t\t});
\t\t      \t},
\t\t      \tautoFocus: true,
\t\t      \tminLength: 3     \t
\t\t      });
});
</script>


\t\t";
        // line 50
        echo "\t\t";
        // line 51
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tree"));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 52
            echo "\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "value"));
            foreach ($context['_seq'] as $context["_key"] => $context["subvalue"]) {
                // line 53
                echo "\t\t\t\t";
                // line 54
                echo "\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "
\t\t";
        // line 57
        $context["iterated"] = 0;
        // line 58
        echo "\t\t";
        $context["fatheriterated"] = 0;
        // line 59
        echo "\t\t";
        $context["spouseiterated"] = 0;
        // line 60
        echo "\t\t";
        $context["motheriterated"] = 0;
        // line 61
        echo "\t\t";
        $context["childexists"] = 0;
        // line 62
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tree"));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 63
            echo "\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "value"));
            foreach ($context['_seq'] as $context["_key"] => $context["subvalue"]) {
                // line 64
                echo "\t\t\t\t";
                if ((($this->getAttribute($this->getContext($context, "subvalue"), "relationid", array(), "array") == 6) || ($this->getAttribute($this->getContext($context, "subvalue"), "relationid", array(), "array") == 7))) {
                    // line 65
                    echo "\t\t\t\t\t";
                    $context["childexists"] = 1;
                    // line 66
                    echo "\t\t\t\t";
                }
                // line 67
                echo "\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "\t\t
<div id=\"notification-left\" class=\"col-md-3\">
\t\t<div class=\"notification-item-block\">
\t\t\t<h1>Members</h1>
\t\t\t <div class=\"row\">
                                                              <div class=\"col-md-4 margin-btm-10x\">
                                    <a href=\"profile.php?view_user_id=299\"> 
                                        <img src=\"images/profile.jpg\" class=\"img-round img-responsive\" alt=\"\" data-img=\"images/profile.jpg\" data-relation=\"7Brother In Law\" data-name=\"Christy\" rel=\"popover\" data-placement=\"bottom\" /></a>
                                </div>
                                                                <div class=\"col-md-4 margin-btm-10x\">
                                    <a href=\"profile.php?view_user_id=286\"> 
                                        <img src=\"images/profile.jpg\" class=\"img-round img-responsive\" alt=\"\" data-img=\"images/profile.jpg\" data-relation=\"-1Mother\" data-name=\"Daisy\" rel=\"popover\" data-placement=\"bottom\" /></a>
                                </div>
                                                                <div class=\"col-md-4 margin-btm-10x\">
                                    <a href=\"profile.php?view_user_id=301\"> 
                                        <img src=\"images/profile.jpg\" class=\"img-round img-responsive\" alt=\"\" data-img=\"images/profile.jpg\" data-relation=\"1Brother\" data-name=\"DiFla\" rel=\"popover\" data-placement=\"bottom\" /></a>
                                </div>
                                                                <div class=\"col-md-4 margin-btm-10x\">
                                    <a href=\"profile.php?view_user_id=193\"> 
                                        <img src=\"images/profile.jpg\" class=\"img-round img-responsive\" alt=\"\" data-img=\"images/profile.jpg\" data-relation=\"Self\" data-name=\"Dijo\" rel=\"popover\" data-placement=\"bottom\" /></a>
                                </div>
                                                                <div class=\"col-md-4 margin-btm-10x\">
                                    <a href=\"profile.php?view_user_id=298\"> 
                                        <img src=\"images/profile.jpg\" class=\"img-round img-responsive\" alt=\"\" data-img=\"images/profile.jpg\" data-relation=\"1Sister\" data-name=\"Dona\" rel=\"popover\" data-placement=\"bottom\" /></a>
                                </div>
                                                                <div class=\"col-md-4 margin-btm-10x\">
                                    <a href=\"profile.php?view_user_id=285\"> 
                                        <img src=\"images/profile.jpg\" class=\"img-round img-responsive\" alt=\"\" data-img=\"images/profile.jpg\" data-relation=\"1Brother\" data-name=\"Flamin\" rel=\"popover\" data-placement=\"bottom\" /></a>
                                </div>
                                  
                      </div>
                         
\t\t</div>
      <div class=\"notification-item-block\">
\t  \t\t<h1>Family Events</h1>
\t  \t\t";
        // line 104
        if (twig_test_empty($this->getContext($context, "eventdata"))) {
            // line 105
            echo "\t\t\t\t<p>No Events<a href=\"#\"> Click here</a> to be the first person to create the events.</p>
\t\t\t";
        } else {
            // line 107
            echo "\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "eventdata"));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 108
                echo "\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t\t<p><a href=\"";
                // line 111
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tree_tree_events", array("hash" => $this->getAttribute($this->getContext($context, "e"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "firstname"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "lastname"), "html", null, true);
                echo " has ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "eventname"), "html", null, true);
                echo " on 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                // line 113
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "eventdate"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 114
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "eventdate"), "d"))) {
                        // line 115
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "eventdate"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 117
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "eventdate"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 119
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t\t";
                    // line 120
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "eventdate"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t";
                }
                // line 121
                echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</a></p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            echo "\t\t
\t\t\t";
        }
        // line 128
        echo "\t  </div>
\t   <div class=\"notification-item-block\">
\t  \t\t<h1>Activity Stream</h1>
\t\t\t<div class=\"message-content-notification\">
\t\t\t\t\t<p> Anup Vaze has posted  on your wall.</p>
\t\t\t</div>
\t\t\t<div class=\"message-content-notification\">
\t\t\t\t\t<p> Anup Vaze has posted  on your wall.</p>
\t\t\t</div>
\t\t\t<div class=\"message-content-notification\">
\t\t\t\t\t<p> Anup Vaze has posted  on your wall.</p>
\t\t\t</div>
\t\t\t<div class=\"message-content-notification\">
\t\t\t\t\t<p> Anup Vaze has posted  on your wall.</p>
\t\t\t</div>
\t  </div>
\t  
</div>




<div class=\"treecontainer col-md-9\" id=\"right\">
<div id=\"menubar\">
            <div id=\"button\">
                Less
            </div>
</div>
\t<ul id=\"org\" style=\"display:none\" >

\t</ul>          
    
    <div id=\"chart\" class=\"orgChart\"></div>
</div>

<!-- Modal -->
<div class=\"modal fade\" id=\"AddNode\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-addnode\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\" id=\"myModalFormLabel\"></h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t";
        // line 172
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "addnodeform"), 'form_start');
        echo "
\t\t\t\t<div class=\"form-group search-people\">
                     <div> ";
        // line 174
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "search"), 'widget');
        echo "</div>
                </div>
\t\t\t\t
\t\t\t\t<div class=\"or\"><span>OR</span></div>
\t\t\t\t<div class=\"search-by-fields\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div>";
        // line 180
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "email"), 'label');
        echo "  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "email"), 'widget');
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div>";
        // line 183
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "firstname"), 'label');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "firstname"), 'widget');
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div>";
        // line 186
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "lastname"), 'label');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "lastname"), 'widget');
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div>";
        // line 189
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "mobile"), 'label');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "mobile"), 'widget');
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
                    <div>";
        // line 192
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "community"), 'label');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "community"), 'widget');
        echo "</div>
                </div>
\t\t\t\t<div class=\"form-group\">
                    <div>";
        // line 195
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "city"), 'label');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "city"), 'widget');
        echo "</div>
                </div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div>\t";
        // line 198
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "addnodeform"), "submit"), 'row');
        echo " </div>
\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t";
        // line 202
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "addnodeform"), 'form_end');
        echo "
\t\t\t</div>
\t\t</div>
\t</div>
</div>  

<!-- Modal -->
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-addnode\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\" id=\"myModalLabel\">Choose your new Relationship</h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body add-rel\">
\t\t\t\t<div class=\"add-node-relation\">
\t\t\t\t\t<div class=\"parents-top\">
\t\t\t\t\t\t<div class=\"father btn\" id=\"modalpop-1\"> <a href=\"#\">Father</a></div> 
\t\t\t\t\t\t<div class=\"mother btn\" id=\"modalpop-2\"> <a href=\"#\">Mother</a></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"siblings-middle\">
\t\t\t\t\t\t<div class=\"brother btn\" id=\"modalpop-4\"> <a href=\"#\">Brother</a></div> 
\t\t\t\t\t\t<div class=\"part-me\"></div> 
\t\t\t\t\t\t<div class=\"sister btn\" id=\"modalpop-5\"> <a href=\"#\">Sister</a></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"children-bottom\">
\t\t\t\t\t\t<div class=\"son btn\" id=\"modalpop-6\"><a href=\"#\">Son</a></div>
\t\t\t\t\t\t<div class=\"daughter btn\" id=\"modalpop-7\"><a href=\"#\">Daughter</a></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"children-bottom\">
\t\t\t\t\t\t<div class=\"spouse btn\" id=\"modalpop-3\"><a href=\"#\">Spouse</a></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>   

";
    }

    public function getTemplateName()
    {
        return "TreeTreeBundle:User:mytree1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  377 => 202,  354 => 192,  338 => 186,  330 => 183,  313 => 174,  308 => 172,  262 => 128,  242 => 120,  237 => 119,  231 => 117,  225 => 115,  223 => 114,  198 => 107,  194 => 105,  192 => 104,  155 => 69,  134 => 64,  129 => 63,  124 => 62,  110 => 57,  508 => 251,  505 => 250,  493 => 241,  487 => 238,  478 => 231,  468 => 223,  465 => 222,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 198,  370 => 198,  349 => 182,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 174,  321 => 173,  317 => 172,  311 => 171,  303 => 165,  296 => 163,  275 => 154,  249 => 139,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 26,  449 => 159,  431 => 146,  418 => 143,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 189,  343 => 107,  334 => 88,  328 => 82,  323 => 80,  315 => 75,  304 => 67,  297 => 63,  290 => 59,  286 => 58,  282 => 57,  279 => 56,  276 => 55,  250 => 197,  207 => 249,  190 => 92,  188 => 88,  174 => 52,  152 => 43,  137 => 65,  118 => 60,  114 => 31,  97 => 20,  90 => 36,  81 => 50,  76 => 36,  180 => 55,  172 => 101,  77 => 19,  53 => 18,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 157,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 144,  413 => 134,  409 => 132,  407 => 131,  402 => 133,  398 => 129,  393 => 126,  387 => 200,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 114,  365 => 111,  362 => 195,  360 => 109,  355 => 110,  341 => 105,  337 => 89,  322 => 180,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 85,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 112,  140 => 66,  132 => 51,  128 => 49,  107 => 56,  61 => 22,  273 => 96,  269 => 151,  254 => 198,  243 => 88,  240 => 14,  238 => 85,  235 => 12,  230 => 11,  227 => 10,  224 => 71,  221 => 8,  219 => 113,  217 => 75,  208 => 111,  204 => 72,  179 => 69,  159 => 45,  143 => 67,  135 => 53,  119 => 42,  102 => 32,  71 => 11,  67 => 26,  63 => 15,  59 => 14,  93 => 53,  88 => 52,  78 => 33,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 26,  56 => 27,  27 => 4,  201 => 92,  196 => 90,  183 => 121,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 61,  117 => 44,  105 => 40,  91 => 27,  62 => 13,  49 => 17,  87 => 17,  46 => 7,  44 => 17,  25 => 3,  21 => 2,  31 => 4,  38 => 7,  26 => 1,  28 => 3,  24 => 4,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 10,  40 => 11,  37 => 10,  22 => 1,  246 => 138,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 59,  111 => 37,  108 => 36,  101 => 55,  98 => 31,  96 => 31,  83 => 51,  74 => 18,  66 => 14,  55 => 15,  52 => 19,  50 => 11,  43 => 8,  41 => 6,  35 => 5,  32 => 8,  29 => 3,  209 => 161,  203 => 108,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 84,  176 => 64,  173 => 65,  168 => 48,  164 => 59,  162 => 57,  154 => 58,  149 => 68,  147 => 58,  144 => 49,  141 => 48,  133 => 37,  130 => 36,  125 => 44,  122 => 43,  116 => 41,  112 => 58,  109 => 28,  106 => 27,  103 => 35,  99 => 31,  95 => 54,  92 => 21,  86 => 35,  82 => 34,  80 => 41,  73 => 19,  64 => 17,  60 => 14,  57 => 23,  54 => 10,  51 => 22,  48 => 18,  45 => 17,  42 => 16,  39 => 16,  36 => 5,  33 => 7,  30 => 7,);
    }
}
