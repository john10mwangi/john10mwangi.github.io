<?
session_start();
if(!isset($_SESSION['user_name'])) {
  Header("Location: index.php");
}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">

			<title> Admin </title>
			<link rel="stylesheet" href="css/mkulima.css">
			<link rel="stylesheet" href="css/style1.css">
			<link rel="stylesheet" href="css/style4.css">
      <style>

      </style>
</head>
<body>
  <div class="container">

    						<div class="column1">

    							<nav class="list">

    								<h3 class="admin"> REMOVE USER </h3>

    								<ul class="list1">

    									<li class="list2">
    										<a href="home.php" class="link">HOME</a>
    									</li>

    								</ul>
                    <ul class="list1">

                      <li class="list2">
                        <a href= "changeprice.php" class="link"> CHANGE PRICES </a>
                      </li>

                    </ul>
                    <ul class="list1">

                      <li class="list2">
                        <a href= "remove.php" class="link"> REMOVE USER </a>
                      </li>

                    </ul>

    								<ul class="list1">

    									<li class="list2">
    										<a href= "sokosell.php" class="link"> SELL PRODUCTS </a>
    									</li>

    								</ul>
                    <ul class="list1">

                      <li class="list2">
                        <a href= "sokobuy.php" class="link"> BUY PRODUCTS </a>
                      </li>

                    </ul>

    								<ul class="list1">

    									<li class="list2">
    										<a href="retrieve.php" class="link"> records </a>
    									</li>

    								</ul>

    								<ul class="list1">

    									<li class="list2">
    										<a href="logout.php" class="link"><strong> Log Out </strong> </a>
    									</li>

    								</ul>


    							</nav>

    						</div>

  						<!-- Right column: content -->
  						<div class="column2">
                <div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 20px; padding-top: 10px"></div>
  			<div class="heading"><h1>agriGOdig</h1></div>
        <?php
        session_start();
        $cnt=$_SESSION['user_county'];
        include_once ('db_connect.php');
        if(isset($_POST['remove'])){
        	$id=$_REQUEST['id'];
        	$query="DELETE FROM users WHERE id='$id' AND county='$cnt'";
          $sql="SELECT * FROM users WHERE id='$id' AND county='$cnt'";
          $rw=mysqli_query($conn, $sql);
          $res=mysqli_query($conn, $query);
        		if(!$res){
              die("COULD NOT DELETE USER");
        		} else {
              if($rw){
                $row=mysqli_fetch_assoc($rw);
                echo "<script>alert('THE USER $row[firstname]$row[lastname] WITH ID NUMBER $row[id] HAS BEEN DELETED')</script>";
                echo "<script> window.location.href='retrieve.php'</script>";
              }
          }

        }
         ?>

</div>
</div>
