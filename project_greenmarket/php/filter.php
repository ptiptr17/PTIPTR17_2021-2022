<?php 

//index.php

include('openconn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
         <br />
         <h2 align="center">Advance Ajax Product Filters in PHP</h2>
         <br />
            <div class="col-md-3">                    
    <div class="list-group">
     <h3>Price</h3>
     <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>    
                <div class="list-group">
     <h3>Name</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
     <?php

                    $query = "SELECT DISTINCT(product_name) FROM product_info WHERE one_category_id = '1' ORDER BY product_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector name" value="<?php echo $row['product_name']; ?>"  > <?php echo $row['product_name']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

    <div class="list-group">
     <h3>Resources used</h3>
                    <?php

                    $query = "SELECT DISTINCT(resource_cast) FROM product_info WHERE two_category_id = '2' ORDER BY resource_cast DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector resources" value="<?php echo $row['resource_cast']; ?>" > <?php echo $row['resource_cast']; ?> GB</label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
    
    <div class="list-group">
     <h3>Polution caused</h3>
     <?php
                    $query = "SELECT DISTINCT(polution_caused) FROM product_info WHERE two_category_id = '1' ORDER BY polution_caused DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector polution" value="<?php echo $row['polution_caused']; ?>"  > <?php echo $row['polution_caused']; ?> GB</label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>
            </div>

            <div class="col-md-9">
             <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var name = get_filter('name');
        var resources = get_filter('resources');
        var polution = get_filter('polution');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, name:name, resources:resources, polution:polution},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>
