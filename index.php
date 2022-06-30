<html>
    <head>
        <title>HEllo!</title>
        <link rel="stylesheet" href="app.css">
    </head>
    <body>
        <div class="container">
           
           
            <div class="box">
                <h1>Roll The Dice!</h1>
                <hr style="width:99%;text-align:center">
                <p>This a demo project to make a test function of rolling a dice using PHP functions.</p>
                <form method="post" action="index.php">
                    <input type="number" placeholder="How many dices we rollin'?" name="dicesQty"></input>
                    <select name="sides-qty">
                        <option value="none">Select The Type Of Dice</option>
                        <option value="4">4 Sides</option>
                        <option value="6">6 Sides</option>
                        <option value="8">8 Sides</option>
                        <option value="10">10 Sides</option>
                        <option value="12">12 Sides</option>
                        <option value="20">20 Sides</option>
                    </select>
                    <input type="submit" value="Roll" name="submitBtn">
                </form>
                
                
                

                <?php
                session_start();
                if(!isset($_SESSION['itemsArray'])){
                    $_SESSION['itemsArray'] = array();
                }

                
                
                function echoWords()
                {
                    $sides = $_POST['sides-qty'];
                    echo "You have rolled {$_POST['dicesQty']} ({$_POST['sides-qty']}-sided) dices!";
                    echo "<div>You got {$_SESSION["randomNum"]}</div>";
                    
                }

                if(isset($_POST['submitBtn']))
                {
                    $_SESSION["randomNum"]=rand(1,($_POST['dicesQty'] * $_POST['sides-qty']));
                    if(!isset($_SESSION['rolltimes'])){
                        $_SESSION['rolltimes'] = 0;
                    }
                    $_SESSION['rolltimes'] += 1;
                    echoWords();
                }
                ?>
            </div>
           

            <div class="box">
                <h2>Roll Log</h2>
                <hr style="width:99%;text-align:center">
                <?php
                    if(isset($_POST['submitBtn']))
                    {
                        echo "<h3>{$_SESSION['rolltimes']}  Times Rolled!</h3>";
                    }
                ?>
                
                
                
                <?php

                        if(isset($_POST['submitBtn']))
                            {
                                
                                array_push($_SESSION['itemsArray'], array($_POST['dicesQty'], $_POST['sides-qty'], $_SESSION['rolltimes'], $_SESSION['randomNum']));
                                foreach($_SESSION['itemsArray'] as $subArray){
                                    echo "
                                        <div class='itemoflog'>
                                            <div class='logentry'>Roll #{$subArray[2]}</div>
                                            <div class='logentry'>You have rolled {$subArray[0]} dices.</div>
                                            <div class='logentry'>The Dices Had {$subArray[1]} Sides</div>
                                            <div class='logentry'>The result was {$subArray[3]}</div>
                                        </div>";

                                   
                                    // foreach ($subArray as $subArrItem){
                                    //     echo "<div class='logentry'>$subArrItem</div>";
                                    // }
                                }
                            }  
                    ?>
                

            </div>
        </div>
    </body>
</html>