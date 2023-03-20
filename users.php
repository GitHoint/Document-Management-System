<?php
    require_once("includes/config.php");
    $queryUsers = "SELECT * FROM employee WHERE ";

    $activeOnly = false;

    if(isset($_POST['update_data']))
    {
        $active;
        $id = $_POST['id'];
        if($_POST["active_state"] == "0")
        {
            $active = "1";
        }
        else
        {
            $active = "0";
        }
        $query = "UPDATE employee SET active='$active' WHERE id='$id'";
        $result = $mysqli->query($query);
        header("Location: users.php");
    }

    $filtersArray = array();
    // Add active only conition to the query
        $activeOnly = $_GET['active_only'] ?? null;
        $activeValue = $activeOnly == null ? '1' : $activeOnly;
        $userState = "active = " . $activeValue;
        array_push($filtersArray, $userState);
    // Add search by username value to the query
    if (isset($_GET['q'])) {
        $nameQuery = $_GET['q'];
        array_push($filtersArray, "username LIKE '%{$nameQuery}%'");
    }
    $queryUsers = $queryUsers . join(" AND ", $filtersArray);
    $resultUsers = $mysqli->query($queryUsers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/desktop.css" />
    <title>Manager Users || Admin Panel</title>
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/admin-user-search.js"></script>
</head>
<body>
    <?php
    include("includes/header.php");
    ?>

    <div class="searchbar-container">
        <label for="user_search">Search</label>
        <div id="searchbar">
            <input type="text" name ="user-search" id="user-search" placeholder="Search For Users"/>
            <input type="image" src="images/search-icon.png" alt="search icon" id="search-button" height=28px width=28px>
        </div>
        <label class="toggle-switch">
            <input type="checkbox" id="ckb">
            <span class="slider"></span>
         </label>
    </div>
    <div id="admin-panel">
        <h2 id="active-title">Active Users</h2>
        <?php
        while ($obj = $resultUsers -> fetch_object()){
            echo "<div class='user-display'>";
            echo "<form action='' method='POST'>";
            echo "<input type='hidden' name='id' value='$obj->id'>";
            echo "<div>";
            echo "<h3 id='username-display'>{$obj->username}<span class 'email-display'>$obj->email</span></h3>";
            echo "<p>{$obj->department}</p>";
            echo "</div>";
            echo "<button type='submit' name='update_data' class='toggle-user-btn'>$obj->active</button>";
            echo "<input type='hidden' name='active_state' id='active-state' value='$obj->active'>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>