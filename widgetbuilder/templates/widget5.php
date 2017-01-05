<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Widget 5</title>
	<link rel="stylesheet" href="/css/reset.css" type="text/css">
	<link rel="stylesheet" href="/css/widget5.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
<?php
foreach($_GET as $key=>$items)
{
    $_GET[$key]=htmlspecialchars($_GET[$key]);
}
if(isset($_GET['title']))
{
    $data = array();
    foreach($_GET as $key=>$items)
    {
        $data[$key] = urldecode($items);
    }
	
if(isset($_GET['bcolor'])){
		$bcolor = substr(urldecode($_GET['bcolor']), -6);
    }
if(isset($_GET['btcolor'])){
		$btcolor = substr(urldecode($_GET['btcolor']), -6);
	}

    ?>
    <div id="wrapper">
	<div id="container">
		<div class="title">
			<h1><?php echo $data['title']; ?></h1>
		</div>
		<div class="subtitle">
			<h2><?php echo urldecode($data['question']); ?></h2>
		</div>
		<div class="content">
			<div class="content-inner">
				<div class="chart">
					<div class="channel-one channel">
						<?php
							$total_channel_value = $data['channel_one_value'] + $data['channel_two_value'];
						?>
						<span class="channel-value"><?php echo $data['channel_one_value']." ".$data['channel_one_unit'];?></span>
						<?php
						$col1_height = ($data['channel_one_value'] / $total_channel_value)*100;
						$var_output = '<span class="channel-column-one channel-column" style="height:'.$col1_height.'px"></span>';
						print $var_output;
						?>
						<span class="channel-column-one channel-column"></span>
						<span class="channel-label"><?php echo $data['channel_one_type'];?></span>
					</div>
					<div class="channel-two channel">
						<span class="channel-value"><?php echo $data['channel_two_value']." ".$data['channel_two_unit'];?></span>
						<?php
						$col2_height = ($data['channel_two_value'] / $total_channel_value)*100;
						$var_output = '<span class="channel-column-two channel-column" style="height:'.$col2_height.'px"></span>';
						print $var_output;
						?>
						<span class="channel-column-two channel-column"></span>
						<span class="channel-label"><?php echo $data['channel_two_type'];?></span>
					</div>
				</div>
				<?php if ($data['target_one_type']): ?>
				<div class="target">
					<span class="title">Target:</span>
					<div class="target-channel">
						<span class="target-channel-label"><?php echo $data['target_one_type'];?>:</span>
						<span class="target-channel-value"><?php echo $data['target_one_value']." ".$data['target_one_unit'];?></span>
					</div>
					<div class="target-channel">
						<span class="target-channel-label"><?php echo $data['target_two_type'];?>:</span>
						<span class="target-channel-value"><?php echo $data['target_two_value']." ".$data['target_two_unit'];?></span>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($data['button_text']): ?>
		<div class="link">
			<a style="color: #<?php echo $btcolor; ?>; background-color: #<?php echo $bcolor;?>;" href="<?php echo urldecode($data['button_url']); ?>" target="_blank"><?php echo $data['button_text']; ?></a>
		</div>
		<?php endif; ?>
		<div class="see-more-data">
			<a href="<?php echo urldecode($data['link_url']); ?>" target="_blank"><?php echo $data['link_text']; ?></a>
		</div>
	</div>
</div>
</body>
</html>
<?php
}
else
{
    require '../includes/db_details.php';

    $widget_id = htmlspecialchars($_GET['widget_id'], ENT_QUOTES);
	$dbh = new mysqli($host,$user,$pass,$database) or die("Cannot connect to Database");
	if($sth = $dbh->prepare("Select widget_params from widget where widget_code= ? limit 1"))
	{
	$sth->bind_param("s", $widget_id);
	$sth->execute();
	$sth ->bind_result($result);
		while($sth->fetch())
		{
			//echo "result=" .$result;
			$data = unserialize($result);
		}
		$sth->close();
    ?>
    <div id="wrapper">
    	<div id="container">
    		<div class="title">
    			<h1><?php echo $data['title']; ?></h1>
    		</div>
    		<div class="subtitle">
    			<h2><?php echo $data['question']; ?></h2>
    		</div>
    		<div class="content">
    			<div class="content-inner">
    				<div class="chart">
    					<div class="channel-one channel">
    						<?php
    							$total_channel_value = $data['channel_one_value'] + $data['channel_two_value'];
    						?>
    						<span class="channel-value"><?php 
                            
                             if((isset($_GET['channel_one_value'])) && (trim($_GET['channel_one_value']) != ""))
                             {
                                 if(ereg("([0-9]+)",$_GET['channel_one_value']) && ($_GET['channel_one_value'] < 999)){
                                  $data['channel_one_value'] = htmlspecialchars($_GET['channel_one_value']);
                                  echo $data['channel_one_value']." ".$data['channel_one_unit'];
                                }
                                else
                                {
                                   echo '<script type="text/javascript">window.alert("Only Numbers < 999 are allowed for channel_one_value")</script>';
                
                                   exit;
                                }
                            }
                            else {
                                echo $data['channel_one_value']." ".$data['channel_one_unit'];
                            }
                            ?></span>
    						<?php
    						$col1_height = ($data['channel_one_value'] / $total_channel_value)*100;
    						$var_output = '<span class="channel-column-one channel-column" style="height:'.$col1_height.'px"></span>';
    						print $var_output;
    						?>
    						<span class="channel-column-one channel-column"></span>
    						<span class="channel-label"><?php echo $data['channel_one_type'];?></span>
    					</div>
    					<div class="channel-two channel">
    						<span class="channel-value"><?php 
                             if((isset($_GET['channel_two_value'])) && (trim($_GET['channel_two_value']) != ""))
                             {
                                if(ereg("([0-9]+)",$_GET['channel_two_value']) && ($_GET['channel_two_value'] < 999)){
                                  $data['channel_two_value'] = htmlspecialchars($_GET['channel_two_value']);
                                  echo $data['channel_two_value']." ".$data['channel_two_unit'];
                                }
                                else
                                {
                                   echo '<script type="text/javascript">window.alert("Only Numbers < 999 are allowed for channel_two_value")</script>';
                
                                   exit;
                                }
                            }
                            else {
                                echo $data['channel_two_value']." ".$data['channel_two_unit'];
                            }
                            ?></span>
    						<?php
    						$col2_height = ($data['channel_two_value'] / $total_channel_value)*100;
    						$var_output = '<span class="channel-column-two channel-column" style="height:'.$col2_height.'px"></span>';
    						print $var_output;
    						?>
    						<span class="channel-column-two channel-column"></span>
    						<span class="channel-label"><?php echo $data['channel_two_type'];?></span>
    					</div>
    				</div>
    				<?php if ($data['target_one_type']): ?>
    				<div class="target">
    					<span class="title">Target:</span>
    					<div class="target-channel">
    						<span class="target-channel-label"><?php echo $data['target_one_type'];?>:</span>
    						<span class="target-channel-value"><?php 
                            if((isset($_GET['target_one_value'])) && (trim($_GET['target_one_value']) != ""))
                             {
                                 if(ereg("([0-9]+)",$_GET['target_one_value']) && ($_GET['target_one_value'] < 999)){
                                  $data['target_one_value'] = htmlspecialchars($_GET['target_one_value']);
                                  echo $data['target_one_value']." ".$data['target_one_unit'];
                                }
                                else
                                {
                                   echo '<script type="text/javascript">window.alert("Only Numbers < 999 are allowed for target_one_value")</script>';
                
                                   exit;
                                }
                            }
                            else {
                                echo $data['target_one_value']." ".$data['target_one_unit'];
                            }
                            ?></span>
    					</div>
    					<div class="target-channel">
    						<span class="target-channel-label"><?php echo $data['target_two_type'];?>:</span>
    						<span class="target-channel-value"><?php 
                             if((isset($_GET['target_two_value'])) && (trim($_GET['target_two_value']) != ""))
                             {
                                if(ereg("([0-9]+)",$_GET['target_two_value']) && ($_GET['target_two_value'] < 999)){
                                  $data['target_two_value'] = htmlspecialchars($_GET['target_two_value']);
                                  echo $data['target_two_value']." ".$data['target_two_unit'];
                                }
                                else
                                {
                                   echo '<script type="text/javascript">window.alert("Only Numbers < 999 are allowed for target_two_value")</script>';
                
                                   exit;
                                }
                            }
                            else {
                                echo $data['target_two_value']." ".$data['target_two_unit'];
                            }
                            ?></span>
    					</div>
    				</div>
    				<?php endif; ?>
    			</div>
    		</div>
    		<?php if ($data['button_text']): ?>
    	<div class="link">
            <?php
            if($data['button_url']){
            ?>
    			<a style="color: #<?php echo $data['btcolor']; ?>; background-color: #<?php echo $data['bcolor'];?>;" href="<?php echo $data['button_url']; ?>" target="_blank"><?php echo $data['button_text']; ?></a>
				
            <?php
            }
            else
            {
                ?>
                <a style="text-decoration:none"><?php echo $data['button_text']; ?></a>
                <?php
            }

            ?>
    		</div>
    		<?php endif; ?>
    		<div class="see-more-data">
            <?php
            if($data['link_url']){
            ?>
    			<a href="<?php echo $data['link_url']; ?>" target="_blank"><?php echo $data['link_text']; ?></a>
                <?php
            }
            else
            {
                ?>
                <a style="text-decoration:none"><?php echo $data['link_text']; ?></a>
                <?php
            }

            ?>
    		</div>
    	</div>
    </div>
    </body>
    </html>
    <?php
    }
    else
    {
        echo "No Data returned";
    }
}
?>