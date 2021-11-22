<?php

$err = '';

if(isset($_POST["upload_csv"]))
{
    if($_FILES['file']['name'])
    {
        $file_array = explode(".", $_FILES['file']['name']);
        $file_name = $file_array[0];
        $extension = end($file_array);
        
        if($extension == 'csv')
        {
        
        
        }
        else
        {
            $err = 'Seul ce type de fichier ( <b>.csv</b> ) est autorisé.';
        }
    }
}

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./structure.css" />
        <link rel="shortcut icon" type="x-icon" sizes="32x32" href="logo.ico">
        <title>Random</title>
    </head>
    <body>
    <header>

    <h1 class="logo"> Créer des groupes aléatoire</h1>



        <section class=CTN>
        <!-- Main -->
            <article>
                <h4 class="fichier">Créer des groupes à partir de CSV</h4>
                <form method="post" enctype="multipart/form-data"  >
                    <input type="file" name="file" />
                    <?php
                    if($err != '')
                    {
                        echo '<p>'.$err.'</p>';
                    }
                    ?>
                    <input type="number" name="randomizator" pattern="^[0-9]*$" required/>
                    
                    <input type="submit"  name="upload_csv"  v="Upload" />
                </form>
            </article>
            </section>
    </header>

        <div class="GroupeRandom">
            <?php echo $A_vue['body'] ?>
        </div>


    </body>

    <style type="text/css">
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header
        {
            height: 80px;
            flex-basis: 100%;
            border-bottom: 1px black solid;
            background-color:#92D6F2 ;
        }
        h1.logo
        {
            display: inline;
            line-height: 80px;
            padding: 0 30px;

        }
        .fichier{
            font-size: large;
            margin-bottom: 20px;
        }
        .CTN {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            border: black solid 1px;
            padding: 30px;
            text-align: center;
            margin-left: 30%;
            margin-right: 30%;
            margin-top: 80px;
            background: rgba( 255, 255, 255, 0.25 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
         
        }
        .GroupeRandom{
            align-items: center;
            justify-content: center; 
            text-align: center;
            border: black solid 1px;
            margin-top: 300px;
            margin-left: 30%;
            margin-right: 30%;
            background: rgba( 255, 255, 255, 0.25 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            margin-bottom: 60px;
            
        }
        
    
    </style> 

</html>


