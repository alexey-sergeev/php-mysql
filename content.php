<div class="container mt-5 mb-3">

    <!-- Текст страницы -->

    <?php

        // Выбрать данные для страницы

        $result = $mysqli->query( "SELECT * FROM pages WHERE id=$page_id" );
        $row = $result->fetch_assoc();

        // p( $row );
        
        if ( $row ) :
            
    ?>


    <div class="row">

        <div class="col mb-5">

            <!-- Вывести данные на экран. В тексте двойные переводы строк заменить на <p> -->

            <h1 class="mb-4"><?php echo $row['title']; ?></h1>

            <p><?php echo preg_replace( "/\n\n|\r\n\r\n/", "<p>", $row['content'] ); ?>
            
        </div>

    </div>

    <!-- Фотоальбом -->

    <div class="row">

        <div class="col">

            <h2 class="mb-3">Фотоальбом</h2>
            
            <div class="card-deck">

                <?php

                    // Выбрать данные для фотоальбома

                    $result = $mysqli->query( "SELECT * FROM photos ORDER BY rand() LIMIT 8" );

                    while ( $row = $result->fetch_assoc() ) :

                    // p( $row );

                ?>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 p-3">
                    <div class="card m-0">
                        <img src="images/<?php echo $row['file']; ?>" class="card-img-top">
                    </div>
                </div>

                <?php

                    endwhile;
    
                ?>

            </div>

        </div>
        
    </div>

    <!-- Раздел сайта -->

    <div class="row">

        <div class="col bg-light border p-2 pl-3 m-3 mt-4">

            <strong>Раздел сайта:</strong> ???

        </div>

    </div>
    
    <!-- Похожие страницы -->

    <div class="row">

        <div class="col">

            <h5 class="mt-4">Похожие страницы</h5>

            <ul class="mt-4">
                <li><a href="123">Первая страница</a></li>
                <li><a href="456">Похожая страница номер два</a></li>
                <li><a href="789">Третья похожая страница</a></li>
            </ul>

            <p class="mt-5"><strong><a href=".">На главную</a></strong>

        </div>

    </div>

    <?php 
        
        else:

            include "404.php"; 

        endif;

    ?>

</div>

