 <body>
      <div class="container">
         <section id="main">
            <h3 class="page-head"> URL SHORTNER </h3>
            <form action="" method="post" accept-charset="utf-8">
                   <div class="search">
			<input type="text" name="url" class="searchTerm" placeholder="Enter URL to shorten it !">
			<button type="submit" class="searchButton">MAKE SHORT URL</button>
                   </div>
            </form>
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
         <!-- /main -->
         <table id="listTable" class="display">
            <thead>
               <tr>
                  <th>Sr.no</th>
                  <th>Long URL</th>
                  <th>Short URL</th>
                  <th>Count</th>
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
                  echo'<td>'.$fdata['count'].'</td>';
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
