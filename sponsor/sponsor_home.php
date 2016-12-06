<html>
	<head>
		<title>Sponsors Home</title>
		<link rel="stylesheet" type="text/css" href="../css/index.css">
	</head>
<body>
	<?php include 'sponsor_header.php';?>

<div id="sponsor_content">

		<div id="kid_profile">
				<p id="kptitle"> <strong> Kids Sponsored: </strong> </p>

    		<?php foreach($kids as $kid):?>
            <table id="sponsorkidtable">
              <tr>
                <td class="skcomponent"> <p id="sktitle"> Name: </p> </td>
                <td class="skcomponent2">
                	<?php echo htmlspecialchars($kid['lname'], ENT_QUOTES, 'UTF-8'); ?> 
               	 	<?php echo ", "; ?> 
               	 	<?php echo htmlspecialchars($kid['fname'], ENT_QUOTES, 'UTF-8'); ?> 
                	<?php echo htmlspecialchars($kid['mname'], ENT_QUOTES, 'UTF-8'); ?> 
                	</td>
              </tr>
              <tr>
                <td class="skcomponent"> <p id="sktitle"> Age: </p> </td>
                <td class="skcomponent2"> 
                <?php echo htmlspecialchars($kid['k_age'], ENT_QUOTES, 'UTF-8'); ?> 
                </td>
                <tr>
                	<td class="skcomponent"> <p id="sktitle"> Gender: </p></td>
               		 <td class="skcomponent2"> 
            	    <?php echo htmlspecialchars($kid['k_gender'], ENT_QUOTES, 'UTF-8'); ?> 
              	  </td>
                </tr>
                <td class="skcomponent"> <p id="sktitle"> Grade level: </p> </td>
                <td class="skcomponent2"> 
                <?php echo htmlspecialchars($kid['g_lvl'], ENT_QUOTES, 'UTF-8'); ?> 
                </td>
              </tr>
              <tr>
                <td class="skcomponent"> <p id="sktitle"> Address: </p></td>
                <td class="skcomponent2"> 
                <?php echo htmlspecialchars($kid['k_city'], ENT_QUOTES, 'UTF-8'); ?> 
                <?php echo ", "; ?> 
                <?php echo htmlspecialchars($kid['k_country'], ENT_QUOTES, 'UTF-8'); ?> 
                <?php echo htmlspecialchars($kid['k_postal'], ENT_QUOTES, 'UTF-8'); ?> 
                </td>
              </tr>
              <tr>
                <td class="skcomponent"> <p id="sktitle"> Bio: </p> </td>
                <td class="skcomponent2"> 
                <?php echo htmlspecialchars($kid['bio'], ENT_QUOTES, 'UTF-8'); ?> 
                </td>
              </tr>
            </table>
    	<?php endforeach; ?>
		</div>


  <div id="sponsor_home">
    <div class="sponsorbadge"> <img src="../images/sponsor.png"/> </div>
    <p class="download_card"><strong><a href="http://www.barner.org/BLC_Sponsorship_Card.pdf" class="download_card1">Download Sponsorship Card</a></strong></p>
    <p class="download_description">After your first month's payment, the administration will contact you via email. Thank you for sharing your blessings through this sponsorship!</p>
  </div>

</div>

	<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>