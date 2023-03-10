<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/desktop.css" />
    <title>Manager Users || Admin Panel</title>
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
    </div>
    <div id="admin-panel">
        <h2>Head Office</h2>
        <div class="user-display">
            <div>
                <h3>Mia Davies</h3>
                <p>Department</p>
            </div>
            <input type="button" value="Deavtivate" class="toggle-user-btn">
        </div>
        <div class="user-display">
            <div>
                <h3>Barend Clover</h3>
                <p>Department</p>
            </div>
            <input type="button" value="Deavtivate" class="toggle-user-btn">
        </div>
        <div class="user-display">
            <div>
                <h3>Angela Jones</h3>
                <p>Department</p>
            </div>
            <input type="button" value="Deavtivate" class="toggle-user-btn">
        </div>
        <div class="user-display">
            <div>
                <h3>Terri Jewel</h3>
                <p>Department</p>
            </div>
            <input type="button" value="Deavtivate" class="toggle-user-btn">
        </div>
        <div class="user-display">
            <div>
                <h3>Erin Allard</h3>
                <p>Department</p>
            </div>
            <input type="button" value="Reactivate" class="toggle-user-btn" id="deactive-user">
            <!--Examples for users to show format for time being--->
        </div>
    </div>
</body>
</html>