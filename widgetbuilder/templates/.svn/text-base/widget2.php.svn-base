<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Widget 2</title>
	<link rel="stylesheet" href="/css/reset.css" type="text/css">
	<link rel="stylesheet" href="/css/widget2.css" type="text/css">
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
				<span class="widget-value"><?php echo $data['actual']; ?></span>
				<span class="widget-label"><?php echo $data['units']; ?></span>
				<?php if ($data['target']): ?>
				<span class="widget-target">Target:&nbsp;<strong><?php echo $data['target']; ?></strong>&nbsp;<?php echo $data['units']; ?></span>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($data['button_text']): ?>
		<div class="link" id="button">
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
    				<span class="widget-value"><?php  
                     if((isset($_GET['actual'])) && (trim($_GET['actual']) != ""))
                        {
                            if(ereg("([0-9]+)",$_GET['actual']) && ($_GET['actual'] < 999))
                            {
                              $data['actual'] = htmlspecialchars($_GET['actual']);
                             echo $data['actual'];
                          }
                           else
                          {
                              echo '<script type="text/javascript">window.alert("Only Numbers < 999 are allowed for actual")</script>';
          
                             exit;
                          }
                        }
                        else 
                        {
                            echo $data['actual']; 
                        } ?></span>
    				<span class="widget-label"><?php echo $data['units']; ?></span>
    				<?php if ($data['target']): ?>
    				<span class="widget-target">Target:&nbsp;<strong><?php 
                       if((isset($_GET['target'])) && (trim($_GET['target']) != ""))
                        {
                           if(ereg("([0-9]+)",$_GET['target']) && ($_GET['target'] < 999)){
                              $data['target'] = htmlspecialchars($_GET['target']);
                             echo $data['target'];
                          }
                           else
                          {
                             echo '<script type="text/javascript">window.alert("Only Numbers < 999 are allowed for Target")</script>';
                             exit;
                          }
                        }
                        else 
                        {
                            echo $data['target']; 
                        } 
                         ?></strong>&nbsp;<?php echo $data['units']; ?></span>
    				<?php endif; ?>
    			</div>
    		</div>
    		<?php if ($data['button_text']): ?>
    		<div class="link" id="button">
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