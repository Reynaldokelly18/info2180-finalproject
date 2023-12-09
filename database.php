<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>CrmDocument</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="dashboard.css"> 
</head>
<body>
    
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span style='font-size110px;'>&#128044;</span> 
                <span>Dolphin Crm</span>
            </h3> 
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="newcontact.php">
                        <span class="ti-user"></span>
                        <span>New Contact</span>
                    </a>
                </li>
                <li>
                    <a href="userlist.php">
                        <span class="ti-agenda"></span>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="ti-arrow-right"></span>
                        <span>Logout</span>
                    </a>
                </li>
                

            </ul>
        </div>
    </div>
    
    
    <div class="main-content">
        
        
        
        <main>
            <div class="dash-header">
                <h2 class="dash-title">Dashboard</h2>
                <a href="newcontact.php"><button id="add-button"> + Add Contact</button>  
            </div>
         
     

            <section class="recent">
                <div class="activity-grid">
                    <div class="dashboard">
                        <h3>Filter:</h3>
                        
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Company</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                               
                                <?php
                                include "config.php";
                             ?>
                            </table>
                        </div>
                    </div>
                    
                    
                        
                        
            </section>
            
        </main>
        
    </div>
    
</body>
</html>