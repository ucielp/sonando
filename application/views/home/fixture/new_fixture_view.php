            <div class="combo_box_wrapper">
            <?php $data = array('class' => 'fixture_form');
			echo form_open('fixture/show_fixture', $data);
                  echo form_dropdown('dropdown_events', $events);
            
                  $data_submit = array(
								  'name'        => 'mysubmit',
								  'class'          => 'submit_fixture',
								  'value'       => 'Fixture',
								);
                      echo form_submit($data_submit);
                
                    echo form_close();
                   ?>
                   
            </div> <!-- END COMBO_BOX_WRAPPER -->	
<!--
<ul id="menu">
-->
<!--?php
	foreach ($categories as $key=>$category):
		print '<li><a href="'. base_url().'fixture/show_new_fixture/' . $key . '">'.$category.'</a></li>';
		print $key;
	endforeach;
 ?-->
<!--
 </ul>
-->
 
 <?php
  //~ foreach($category->result() as $menu)
    //~ {
       //~ echo "<li><a class=\"sf-with-ul\" href=\"category/".$menu->urlcategory."\">".$menu->namecategory."</a>";
       //~ /*check whether sub menu is there if so first print <ul> then <li><a>*/
       //~ if(count($subcategory->result()) > 0 && is_array($subcategory->result()))
       //~ {
             //~ echo "<ul class=\"sub-menu\">";
             //~ foreach($subcategory->result() as $key=>$submenu)
             //~ {
               //~ if ($menu->idcategory == $submenu->idcategory){
                //~ echo "<li><a href=\"category/".$submenu->urlsubcategory."\">".$submenu->namesubcategory."</a></li>";
                //~ }
             //~ }
            //~ echo "</ul>";
        //~ }
        //~ echo "</li>";
    //~ }
    ?>
<!--
	<ul id="menu">

	<li><a href="#">Item 2</a></li>
	<li><a href="#">Item 3</a>
		<ul>
			<li><a href="#">Item 3-1</a></li>
			<li><a href="#">Item 3-2</a></li>
			<li><a href="#">Item 3-3</a></li>
			<li><a href="#">Item 3-4</a></li>
			<li><a href="#">Item 3-5</a></li>
		</ul>
	</li>
	<li><a href="#">Item 4</a></li>
	<li><a href="#">Item 5</a></li>
 </ul>

-->
 
             
		</div> <!-- END CONTAINER -->
	</div> <!-- END WRAPPER -->


  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <style>
  .ui-menu {
    width: 200px;
  }
  </style>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>
 

<script>
$( "#menu" ).menu();
</script>
 
</body>
</html>
