/**
 * jQuery org-chart/tree plugin.
 *
 * Author: Wes Nolte
 * http://twitter.com/wesnolte
 *
 * Based on the work of Mark Lee
 * http://www.capricasoftware.co.uk 
 *
 * Copyright (c) 2011 Wesley Nolte
 * Dual licensed under the MIT and GPL licenses.
 *
 */
(function($) {

  $.fn.jOrgChart = function(options) {
    var opts = $.extend({}, $.fn.jOrgChart.defaults, options);
    var $appendTo = $(opts.chartElement);

    // build the tree
    $this = $(this);
    var $container = $("<div class='" + opts.chartClass + "'/>");
    if($this.is("ul")) {
		
     buildNode($this.find("li:first"), $container, 0, opts);
    }
    else if($this.is("li")) {
	
     // buildNode($this, $container, 0, opts);
    }
    $appendTo.append($container);

    // add drag and drop if enabled
    if(opts.dragAndDrop){
        $('div.node').draggable({
            cursor      : 'move',
            distance    : 40,
            helper      : 'clone',
            opacity     : 0.8,
            revert      : 'invalid',
            revertDuration : 100,
            snap        : 'div.node.expanded',
            snapMode    : 'inner',
            stack       : 'div.node'
        });
        
        $('div.node').droppable({
            accept      : '.node',          
            activeClass : 'drag-active',
            hoverClass  : 'drop-hover'
        });
        
      // Drag start event handler for nodes
      $('div.node').bind("dragstart", function handleDragStart( event, ui ){
        
        var sourceNode = $(this);
        sourceNode.parentsUntil('.node-container')
                   .find('*')
                   .filter('.node')
                   .droppable('disable');
      });

      // Drag stop event handler for nodes
      $('div.node').bind("dragstop", function handleDragStop( event, ui ){

        /* reload the plugin */
        $(opts.chartElement).children().remove();
        $this.jOrgChart(opts);      
      });
    
      // Drop event handler for nodes
      $('div.node').bind("drop", function handleDropEvent( event, ui ) {    
	  
        var targetID = $(this).data("tree-node");
        var targetLi = $this.find("li").filter(function() { return $(this).data("tree-node") === targetID; } );
        var targetUl = targetLi.children('ul');
		
        var sourceID = ui.draggable.data("tree-node");		
        var sourceLi = $this.find("li").filter(function() { return $(this).data("tree-node") === sourceID; } );		
        var sourceUl = sourceLi.parent('ul');

        if (targetUl.length > 0){
  		    targetUl.append(sourceLi);
        } else {
  		    targetLi.append("<ul></ul>");
  		    targetLi.children('ul').append(sourceLi);
        }
        
        //Removes any empty lists
        if (sourceUl.children().length === 0){
          sourceUl.remove();
        }
		
      }); // handleDropEvent
        
    } // Drag and drop
  };

  // Option defaults
  $.fn.jOrgChart.defaults = {
    chartElement : 'body',
    depth      : -1,
    chartClass : "jOrgChart",
    dragAndDrop: false
  };
	
  var nodeCount = 0;
  // Method that recursively builds the tree
  function buildNode($node, $appendTo, level, opts) {
	var $spid = $node.attr('id');
	var $childNodes = $node.children("ul:first").children("li");
	if($("#"+$spid+":has(span)").length > 0)
	{	
		if($spid=='father')
			{
				$spanclass = "spouse";
				var $spancountt =   $("#"+$spid+" span[class^='"+$spanclass+"']").length;
				var $marginleft = 0;
			}
			else if($spid == 'son')
			{		
				if($childNodes.length==1){
					$.cookie("childlength", 1,{ expires: 1 });		
				}
					$spanclass = "wH";
					var $spancountt =   $("#"+$spid+" span[class^='"+$spanclass+"']").length;
					$.removeCookie("spancountt");
					$.cookie("spancountt", $spancountt,{ expires: 1 });
					if($spancountt == 0)
						var $marginleft = 80;
					else 
						var $marginleft = $spancountt*150;
			}
			else if($spid == "child")
			{
					var $childlength = $.cookie("childlength");
					var $spanlength = $.cookie("spancountt");
					$.removeCookie("childlength");
					//$.removeCookie("spancountt");
					
					if($spanlength == 0)
						$spanlength = 1;
						
					if($childlength==1)
						var $marginleft = $spanlength*80;
					else if($childlength==2)
						var $marginleft = $spanlength*20;
					else
						var $marginleft = $spanlength*10;
			}

			var $table = $("<table cellpadding='0' cellspacing='0' border='0' style='margin-left:"+$marginleft+"px;'/>");
	}
	else 
	{
		 var $table = $("<table cellpadding='0' cellspacing='0' border='0' style='margin-left:20px;'/>");
	}
    var $tbody = $("<tbody/>");

    // Construct the node container(s)
    var $nodeRow = $("<tr/>").addClass("node-cells");
    var $nodeCell = $("<td/>").addClass("node-cell").attr("colspan", 2);
   
    var $spouseNodes = $node.children("ul:first").children("li").children("span");
    var $nodeDiv;
    var $subnodeDiv;
   
  
    if($childNodes.length > 1) {
      $nodeCell.attr("colspan", $childNodes.length * 2);
    } 

    
    // Draw the node
    // Get the contents - any markup except li and ul allowed
    var $nodeContent = $node.clone()
                            .children("ul,li")
                            .remove()
                            .end()
                            .html();

  var $subnodeContent = $node.clone()
			.children("ul,li,span")
                            .remove()
                            .end()
                            .html();
  

      //Increaments the node count which is used to link the source list and the org chart
  	nodeCount++;
  	$node.data("tree-node", nodeCount);
  	$nodeDiv = $("<div>").addClass("Node")
                                     .data("tree-node", nodeCount)
                                     .append($nodeContent);


    // Expand and contract nodes
    if ($childNodes.length > 0) {
      $nodeDiv.click(function() {
          var $this = $(this);
          var $tr = $this.closest("tr");

          if($tr.hasClass('contracted')){
            $this.css('cursor','n-resize');
            $tr.removeClass('contracted').addClass('expanded');
            $tr.nextAll("tr").css('visibility', '');

            // Update the <li> appropriately so that if the tree redraws collapsed/non-collapsed nodes
            // maintain their appearance
            $node.removeClass('collapsed');
          }else{
            $this.css('cursor','s-resize');
            $tr.removeClass('expanded').addClass('contracted');
            $tr.nextAll("tr").css('visibility', 'hidden');

            $node.addClass('collapsed');
          }
        });
    }
    
   
	
 
	var $spid = $node.attr('id');

	if($("#"+$spid+":has(span)").length > 0)
	{
			if($spid=='father')
			{
					$spanclass = "spouse";
			}
			else if($spid == 'son')
			{
					$spanclass = "wH";
			}
		 
			var $spancountt =   $("#"+$spid+" span[class^='"+$spanclass+"']").length;
				
			
		
				
			     var $Ttable = $("<table style='margin:auto;'/>");
				 var $Ttbody = $("<tbody/>");
				 var $TnodeRow = $("<tr/>").addClass("node-cells");
				 
				if($spid== 'child' || $spid=='son')
				{
					 var $TnodeCell0 = $("<td/>").addClass("node-cell");
					$TnodeCell0.append($nodeDiv);
					$TnodeRow.append($TnodeCell0);
				}
				
					
					$("#"+$spid+" span[class^='"+$spanclass+"']").each(function(i){
						
						var $subcont= $(this).html();
							var $subnodeDiv = $("<div>").addClass("Node wife")
												 .data("tree-node", nodeCount)
												.append($subcont);
												
							if($spid=='father'){
								if(i==0) 
								{
										var $TnodeCell = $("<td/>").addClass("node-cell");
										//$TnodeCell.append( $("<div></div>").addClass("line down"));
								
										$TnodeCell.append($subnodeDiv);
									
									
										$TnodeRow.append($TnodeCell);
										
								}
								else
								{
										if ($childNodes.length > 0) {
											var $linehorizontal = $("<td valign='center'><div class='horizontal'></div><div class='vertical'></div></td>").addClass("");
										}else{
											var $linehorizontal = $("<td valign='center'><div class='horizontal'></div></td>").addClass("");
										}
										//$linehorizontal = append($("<div></div>").addClass("horizontal"));
										$TnodeRow.append($linehorizontal);
										var $TnodeCell = $("<td/>").addClass("node-cell");
										//$TnodeCell.append( $("<div></div>").addClass("line down"));
								
										$TnodeCell.append($subnodeDiv);
									
									
										$TnodeRow.append($TnodeCell);
										
								}
								
							}else{
									if ($childNodes.length > 0) {
												var $linehorizontal = $("<td valign='center'><div class='horizontal'></div><div class='vertical'></div></td>").addClass("");
									}else{
												var $linehorizontal = $("<td valign='center'><div class='horizontal'></div></td>").addClass("");
									}
								//$linehorizontal = append($("<div></div>").addClass("horizontal"));
								$TnodeRow.append($linehorizontal);
								
								var $TnodeCell = $("<td/>").addClass("node-cell");
								//$TnodeCell.append( $("<div></div>").addClass("line down"));
						
								$TnodeCell.append($subnodeDiv);
							
							
								$TnodeRow.append($TnodeCell);
							}
							
							
						
					});
				$Ttbody.append($TnodeRow);
				$Ttable.append($Ttbody);
				$nodeCell.append($Ttable);	
	} 
	else
	{
		
		 $nodeCell.append($nodeDiv);
	} 
    $nodeRow.append($nodeCell);
    $tbody.append($nodeRow);

    if($childNodes.length > 0) {
      // if it can be expanded then change the cursor
     // $nodeDiv.css('cursor','n-resize');
    
      // recurse until leaves found (-1) or to the level specified
     
      if(opts.depth == -1 || (level+1 < opts.depth)) { 
        var $downLineRow = $("<tr/>");
        var $downLineCell = $("<td/>").attr("colspan", $childNodes.length*2);
        $downLineRow.append($downLineCell);
        
        // draw the connecting line from the parent node to the horizontal line 
      //if($spid=='son'){
		//	$downLine = $("<div style='margin-right:223px;'></div>").addClass("line down");
		//}
		//else
	//	{
			$downLine = $("<div></div>").addClass("line down");

		//}
        $downLineCell.append($downLine);
        $tbody.append($downLineRow);

        // Draw the horizontal lines
        var $linesRow = $("<tr/>");
        $childNodes.each(function() {
			 var $left = $("<td>&nbsp;</td>").addClass("line left top");
			 var $right = $("<td>&nbsp;</td>").addClass("line right top");
				 $linesRow.append($left).append($left).append($right);

        });

        // horizontal line shouldn't extend beyond the first and last child branches
        $linesRow.find("td:first")
                    .removeClass("top")
                 .end()
                 .find("td:last")
                    .removeClass("top");

        $tbody.append($linesRow);
        var $childNodesRow = $("<tr/>");
        $childNodes.each(function() {
           var $td = $("<td class='node-container'/>");
           $td.attr("colspan", 2);
           // recurse through children lists and items
           buildNode($(this), $td, level+1, opts);
           $childNodesRow.append($td);
        });

      }
      $tbody.append($childNodesRow);
    }

    // any classes on the LI element get copied to the relevant node in the tree
    // apart from the special 'collapsed' class, which collapses the sub-tree at this point
    if ($node.attr('class') != undefined) {
        var classList = $node.attr('class').split(/\s+/);
        $.each(classList, function(index,item) {
            if (item == 'collapsed') {
                console.log($node);
                $nodeRow.nextAll('tr').css('visibility', 'hidden');
                    $nodeRow.removeClass('expanded');
                    $nodeRow.addClass('contracted');
                    $nodeDiv.css('cursor','s-resize');
            } else {
                $nodeDiv.addClass(item);
            }
        });
    }

    $table.append($tbody);
    $appendTo.append($table);
    
    /* Prevent trees collapsing if a link inside a node is clicked */
    $nodeDiv.children('a').click(function(e){
        console.log(e);
        e.stopPropagation();
    });
  };

})(jQuery);
