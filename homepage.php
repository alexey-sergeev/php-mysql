<!-- Заголовок каталога и навигация -->

<div class="container-fluid">

    <!-- Поисковая строка -->

    <div class="row justify-content-center bg-secondary">
        <div class="col-md-8 text-white text-center">

            <h4 class="m-4">Animalia Linnaeus</h4>

            <div class="input-group mt-4 mb-5">
                <input class="form-control form-control-lg" type="text" placeholder="Искать ...">
                <div class="input-group-append">
                    <button class="btn btn-light" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>


        </div>
    </div>

    <!-- Кнопки выбора категории (раздела сайта) -->

    <div class="row">

        <div class="col text-center pt-5">

            <!-- Добавить кнопку "Все" -->

            <?php  $class = ( $cat_id == 0 ) ? 'btn-primary' : 'btn-dark'; ?>
            <a class="btn m-1 <?php echo $class; ?>" href="." role="button">Все</a>

            <!-- Добавить кнопки остальных разделов -->
        
            <?php

                $result = $mysqli->query( "SELECT * FROM categories ORDER BY ordered ASC" );
        
                while ( $row = $result->fetch_assoc() ) :
            
                    $class = ( $cat_id == $row['id'] ) ? 'btn-primary' : 'btn-dark';

            ?>

            <a class="btn m-1 <?php echo $class; ?>" href="?cat=<?php echo $row['id']; ?>" role="button"><?php echo $row['name']; ?></a>

            <?php

                endwhile;

            ?>
            
        </div>
    
    </div>

</div>

<!-- Сам каталог -->

<div class="container mt-5">

    <div class="card-columns">

        <?php
            
            // Выбрать данные для каталога

            $sql = "SELECT * FROM pages";
            if ( $cat_id ) $sql .= " WHERE category=$cat_id";

            $result = $mysqli->query( $sql );
        
            while ( $row = $result->fetch_assoc() ) :

                // p( $row );

        ?>

        <div class="card">
            <a href="?page=<?php echo $row['id']; ?>"><img src="images/<?php echo $row['image']; ?>" class="card-img-top"></a>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                <p class="card-text">???</p>
                <p><a href="?page=<?php echo $row['id']; ?>">Далее &rarr;</a>
            </div>
        </div>


        <?php

            endwhile;

        ?>


    </div>

</div>


<!-- Добавить новый элемент -->

<div class="container-fluid mt-5">

    <div class="row justify-content-center bg-light">

        <div class="col-md-4 text-center m-4">

            <h4 class="border-bottom pb-3 mb-4">Есть что добавить?</h4>
            <p><a href="123" class="btn btn-primary btn-lg">Написать</a></p>

        </div>

    </div>

</div>


<!-- Знаете ли вы, что? -->

<?php
            
    // Выбрать факт для размещения на сайте

    $result = $mysqli->query( "SELECT * FROM interestings ORDER by rand() LIMIT 1" );
    
    $row = $result->fetch_assoc();

    // p( $row );
    
?>


<div class="container mt-5">

    <div class="row">

        <div class="col-md-6">

            <h4 class="border-bottom pb-3 mb-4">Знаете ли вы, что?</h4>
            <p><?php echo $row['text']; ?></p>

        </div>

        <div class="col-md-6 bg-light p-4">

            <img src="interface/idea.png" class="img-fluid">
            
        </div>

    </div>

</div>

<!-- Фотоальбом -->

<div class="bg-light">

    <div class="container-fluid mt-5">

        <div class="row justify-content-center bg-light">

            <div class="col-4 text-center m-4">

                <h4 class="border-bottom pb-3 mb-4">Фотоальбом</h4>

            </div>

        </div>

    </div>


    <div class="container pb-5">

        <div class="row">

            <p>Пока ничего нет...</p>

        </div>

    </div>

</div>
