
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="./dist/css/styles.css" rel="stylesheet" />
    <link href="./dist/css/prism.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
    div.code {
        white-space: pre;
    }

    .biodata-section {
        margin-bottom: 30px;
    }

    .profile-pic {
        max-width: 150px;
        border-radius: 50%;
    }
    </style>
</head>
<?php
    include("route.php");
    $route = new phpRouting();
    $uri = $route->getUri();
    $filename = $route->getFilename();
?>
<body class="sb-nav-fixed">
    <?php include_once('_header.php') ?>
    <div id="layoutSidenav">
        <?php include_once('_sidebar.php') ?>
        <div id="layoutSidenav_content">

          

            <main>
               
                <div class="container-fluid px-4 pt-3">

                    <?php 
                    if($route->getPath()){
                        if(!$route->showScript()){
                            include($filename);
                        }else{
                      
                    ?>
                    <p>Source Code : </p>
                    <pre>
                      <code class="language-php">

                        <!-- <div class="code"> -->
                          <?php 
                            echo htmlentities(file_get_contents($filename));
                            ?>
                      <!-- </div> -->
                    </code>
                    </pre>


                    <div class="result">
                        <p>Result : </p>
                        <?php 
                        include($filename);
                      ?>

                    </div>




                    <?php 
                
                        }
                    }else{

                        include($filename);

                    }
                ?>
                </div>
            </main>
            <?php include_once("_footer.php") ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="./dist/js/scripts.js"></script>
    <script src="./dist/js/prism.js"></script>

    <script>
    document.querySelectorAll('div.code').forEach(el => {
        // then highlight each
        hljs.highlightElement(el);
    });
    </script>
</body>

</html>