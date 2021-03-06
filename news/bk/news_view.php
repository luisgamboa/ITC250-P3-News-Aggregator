<?php
/**
 *
 * news_view.php a view page to show a single survey
 * 
 * based on demo_shared.php
 *
 *
 demo_idb.php is both a test page for your IDB shared mysqli connection, and a starting point for 
 * building DB applications using IDB connections
 *
 * @package nmCommon
 * @author Luis Gamboa <luisgamboasierra@gmail.com>
 * @version 2.09 02/09/2016
 * @link http://lgamboa.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see config_inc.php  
 * @see header_inc.php
 * @see footer_inc.php 
 * @todo none
 */
# '../' works for a sub-folder.  use './' for the root
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials

$config->titleTag = smartTitle(); #Fills <title> tag. If left empty will fallback to $config->titleTag in config_inc.php
$config->metaDescription = smartTitle() . ' - ' . $config->metaDescription; 
/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/

if(isset($_GET['id']) && (int)$_GET['id'] > 0)
{//good data, process!
    $id = (int)$_GET['id'];
    
}else{//bad data, you go away now!
     //This is redirection in PHP
     header('Location:index.php');
}

# SQL statement - PREFIX is optional way to distinguish your app
$sql = "select * from p3_Feed where CategoryKey=$id";


# SQL statement - PREFIX is optional way to distinguish your app
//$sql = "SELECT p3_Categories.CategoryName, p3_Feed.CategoryKey as FeedName, p3_Feed.name
//FROM p3_Categories
//INNER JOIN p3_Feed
//ON p3_Categories.CategoryKey=p3_Feed.CategoryKey";


//END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to header_inc.php
?>
<h3 align="center">Subcategory</h3>

<?php


#IDB::conn() creates a shareable database connection via a singleton class
$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));


    
if(mysqli_num_rows($result) > 0)
{#there are records - present data
	while($row = mysqli_fetch_assoc($result))
	{# pull data from associative array

       echo '

       <div>
       
       <a href="news_list.php?id=' . $row['FeedKey'] . '">' . $row['name'] . '</a><br />
       
       </div>
       ';
        
	   
	}
}else{#no records
	echo '<div align="center">Sorry, there are no records that match this query</div>';
}

echo'
<br/> <p align="center"><a href="index.php"><< BACK</a></p>';
@mysqli_free_result($result);
get_footer(); #defaults to footer_inc.php
?>
