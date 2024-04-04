<?php
    ob_start();
	session_start();

	$pageTitle = 'Menu Categories';

	if(isset($_SESSION['username_restaurant_qRewacvAqzA']) && isset($_SESSION['password_restaurant_qRewacvAqzA']))
	{
		include 'connect.php';
  		include 'Includes/functions/functions.php'; 
		include 'Includes/templates/header.php';
		include 'Includes/templates/navbar.php';

        ?>

            <script type="text/javascript">

                var vertical_menu = document.getElementById("vertical-menu");


                var current = vertical_menu.getElementsByClassName("active_link");

                if(current.length > 0)
                {
                    current[0].classList.remove("active_link");   
                }
                
                vertical_menu.getElementsByClassName('menu_categories_link')[0].className += " active_link";

            </script>

            <style type="text/css">

                .categories-table
                {
                    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
                    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
                    text-align: center;
                    vertical-align: middle;
                }

            </style>

        <?php
            
            $stmt = $con->prepare("SELECT * FROM menu_categories");
            $stmt->execute();
            $menu_categories = $stmt->fetchAll();

        ?>
            <div class="card">
                <div class="card-header">
                    <?php echo $pageTitle; ?>
                </div>
                <div class="card-body">


                    <!-- MENU CATEGORIES TABLE -->

                    <table class="table table-bordered categories-table">
                        <thead>
                            <tr>
                                <th scope="col">Category ID</th>
                                <th scope="col">Category Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($menu_categories as $category)
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $category['category_id'];
                                        echo "</td>";
                                        echo "<td style = 'text-transform:capitalize'>";
                                            echo $category['category_name'];
                                        echo "</td>";
                                        echo "<td>";
                                            /****/
                                                $delete_data = "delete_".$category["category_id"];
                                                ?>
                                                    <ul class="list-inline m-0">
                                                    </ul>
                                                <?php
                                            /****/
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>  
                </div>
            </div>
        <?php

        /*** FOOTER BOTTON ***/

        include 'Includes/templates/footer.php';

    }
    else
    {
        header('Location: ../index.php');
        exit();
    }

?>

