
			<ul class="breadcrumb" style="margin-bottom: 5px;">
			   <?php
          foreach ($posisi as $key=>$value) {
            if($value!=''){
          ?>
					  <li><a href="<?=$value; ?>"><?=$key; ?></a> <span class="divider"><b>&raquo;</b></span></li>
					  <?php }else{?>
              <li class="active"><?=$key; ?></li>

					          <?php }
          }
          ?>   
					</ul>


