 
<!--
     * ======================================================================================================
     * display_short_url.php View : 
     * ======================================================================================================
     * This view file display url form and short url list
     * 
-->

 <body>
      <div class="container">
         <section id="main">
            <h3 class="page-head">Enter Url to make it short: </h3>
            <!-- form for enter long URL -->
            <form action="" method="post" accept-charset="utf-8">
                   <div class="search">
            		         	<input type="text" name="url" class="searchTerm" placeholder="Enter url here">
            			         <button type="submit" class="searchButton">MAKE SHORT URL</button>
                   </div>
            </form>

            <!-- Make Validations -->
            <div class="shorturls">
               <?php
                  if(isset($short_url))
                  {
                  	if($short_url != 1)
                  	{
                  		echo 'Short URL is : <a href="'.base_url().'index.php/'.$short_url.'" target="_blank" class="shorty_url">'.base_url().$short_url.'</a>';
                  	}else if($short_url == 1){
                  		
                  		echo 'URL already exist';
                  	}
                  }
                  
                  if(isset($error))
                  {
                  	echo '<div class="errors">'.$error.'</div>';
                  }
                  ?>
            </div>
         </section>

         <!-- Display URL list -->
         <table id="listTable" class="display">
            <thead>
               <tr>
                  <th>Sr.no</th>
                  <th>Long URL</th>
                  <th>Short URL</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  if(isset($frequent))
                  {
                  $srCount=1;
                  foreach($frequent as $fdata){
                  echo '<tr>';		
                  
                  echo'<td>'.$srCount.'</td>';
                  echo'<td>'.$fdata['long_url'].'</td>';
                  echo'<td><a href="'.base_url().'index.php/'.str_replace('=','-', base64_encode($fdata['id'])).'"target="_blank">'.base_url().str_replace('=','-', base64_encode($fdata['id'])).'</a></td>';
                  
                  echo'</tr>';
                  $srCount++;
                  }
                  
                  }
                  ?>
            <tbody>
         </table>
      </div>
      <!--!/#container -->
   </body>
