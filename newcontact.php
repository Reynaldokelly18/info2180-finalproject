<?php
session_start();

    $host = 'localhost';
    $username = 'admin';
    $password = 'password123';
    $dbname = 'dolphin_crm';
    
    $conn = mysqli_connect($host , $username, $password, $dbname);
    if(!$conn){
        echo'Connection Error:' . mysqli_connect_error();
    }
    
    $stmt = $pdo->prepare("SELECT id, firstname, lastname FROM Users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>New Contact</title>
        <link rel='stylesheet' href='new_contact.css'>
        <script src='new_contact.js'></script>
    </head>
    <body>
        <div class='grid-container'>
            <div id='header' class='grid-item'>
                <header>
                    <div class='flex-container'>
                        <div id='head' class='flex-item'>
                            <h1>&#128044; Dolphin CRM </h1>
                        </div>
                    </div>
                </header>
            </div>
            <main>
                <div id='body' class='grid-item'>
                    <h2> New Contact</h2>
                    <form action='#' method='post'>
                        <div class='form-group'>
                            <div name='dropdown'> 
                                <label style='padding: 7px;'>Title</label><br>
                                <select name='title' id ='title' style='width: 6%;'>
                                    <option>Mr.</option>
                                    <option>Mrs.</option>
                                    <option>Ms.</option>
                                    <option value='Dr.'>Dr</option>
                                    <option value='Prof.'>Prof</option>
                                </select><br>                                
                            </div>
                            <div class='box'>
                                <label for='fname'> First Name </label><br>
                                <input type='text' id='fname' placeholder='John' required>
                            </div>
                            <div class='box'>
                                <label for='lname'> Last Name </label><br>
                                <input type='text' id='lname' placeholder='Doe' required>
                            </div>
                            <div class='box'>
                                <label for='email'> Email </label><br>
                                <input type='email' id='email' placeholder='something@example.com' required>
                            </div>
                            <div class='box'>
                                <label for='phone'>Telephone </label><br>
                                <input type='phone' id='phone' placeholder='' required>
                            </div>
                            <div class='box'>
                                <label for='company'>Company </label><br>
                                <input type='company' id='company' placeholder='' required>
                            </div>
                            <div name='dropdown'> 
                                <label style='padding: 7px;'>Type</label><br>
                                <select name='type' id='type'>
                                    <option>Sales Lead</option>
                                    <option>Support</option>
                                </select><br>";
    
    echo "<label style='padding: 7px;'>Assigned To</label><br>
                                <select name='assignedto' id='assignedto'>";
    foreach ($users as $row) {
        echo "<option value=" . $row['id'] . ">" . $row['firstname'] . " " . $row['lastname'] . "</option>";
    }
    echo "</select><br><br>                                    
                            </div>
                            <div id='button-section'>
                                <button type='submit' id ='button' name='button'>Save</button>
                            </div>
                        </div>
                    </form> 
                </div>
                <div id='show'></div>
            </main>
            <div id='sidebar' class='grid-item'>
                <div class='buttonaside' id='home'>
                    <a href='dashboard.php'>Home</a>
                </div>
                <div class='buttonaside' id='newcontact'>
                    <a href='newcontact.php'>New Contact</a>
                </div>
                <div class='buttonaside' id='users'>
                    <a href='userlist.php'>Users</a>
                </div>
                <div class='buttonaside' id='logout'>
                    <a href='logout.php'>Logout</a>
                </div>
            </div>
        </div>
    </body>
    </html>";
    ?>
    