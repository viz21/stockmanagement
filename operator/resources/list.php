    <!DOCTYPE html>
    <html>
    <head>
        
        <title>List test</title>
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    </head>
   
  <body class="fixed-left">

                    <div ng-app="Stock" ng-controller="add">
                        <form class="navbar-form">


                            <div class="container">


                                <div name="product"> <!-- START OF product LIST -->
                                    <?php
                                    for ($index=1; $index <= 2; $index++) { ?>

                                    <div class = "row panel panel-default panel-body" name="product.prd<?php echo $index ?>" id="question<?php echo $index ?>">
                                        <div class="row" name="">
                                            <div class="col-md-1"><b><?php echo $index ?></b></div>
                                            <div class="input-group-inline" id="prd<?php echo $index ?>"  >
                                                <div class="col-md-2">
                                                    <input ng-model="product.prd<?php echo $index ?>.name" name ="name" type="text" required>
                                                    
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row" style="padding-top: 5px">
                                            <div class="input-groups" id="question_<?php echo $index ?>">
                                                <div class="col-md-2 col-md-offset-1">
                                                    <input ng-model="product.prd<?php echo $index ?>.count" name ="count" type="text" required>
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                    {{product}}
                                    <div class="row panel panel-default panel-body">
                                        <div class="col-md-6 col-md-offset-5">
                                            <input type="text" name="qs" id="qs" value={{product}} hidden />
                                            <button id="submit" type="submit" class="btn btn-default">Submit</button>
                                        </div>

                                    </div>

                                </div>

                            </div> <!-- END OF product LIST -->
    
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">

    $( "form" ).on( "submit", function( event ) {

        event.preventDefault();

        var data = $( this ).serializeArray() ; 
        var qs = document.getElementById("qs").value;
       
        console.log(data);
        console.log(qs);

       /* $.ajax({
            type: "POST",
            url: '',
            data: {},
            success: function(data)
            {
                JSalert();
            }
        });
        */
    });


</script>

<script>

    var app = angular.module('Stock', []);
    app.controller('add', function($scope) {

    });
</script>




</body>
</html>