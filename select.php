

<?php 
    header('Access-Control-Allow-Origin: *');
    $pdo = new PDO('oci:dbname=192.168.0.20:1521/cgbk', 'BHIGIRO', 'ABC123456');  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <title>Reports</title>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">BK Reports</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <?php
            
            $query = "SELECT * FROM prod.bksld";
            
            $stmt = $pdo->prepare($query); 
            $arr = array();
            $ret = array();
            if ($stmt->execute()) {

                ?>
                <div class="row">
                    <div class="col-md-4">
                        <br>
                        <br>
                        <form action="">
                            <div class="form-group">
                                <label for="">Select the end date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <br><br>
                        <h4>Preview</h4>
                        <table class="table">
                            <tr>
                                <th>AGE</th>
                                <th>DEV</th>
                                <th>DCO</th>
                                <th>TXIND</th>
                            </tr>

                            <?php
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // print_r('<pre>');
                                // print_r($row['AGE']);
                                // print_r('<pre>');
                                // $s->age = $row['AGE'];
                                // array_push($ret, $s);
                                // $arr[] = $row;
                                //array_push($arr, $row);
                                //echo json_encode($arr);
                                echo '
                                    <tr *ngFor="let r of results">
                                        <td>'.$row['AGE'].'</td>
                                        <td>'.$row['DEV'].'</td>
                                        <td>'.$row['DCO'].'</td>
                                        <td>'.$row['TXIND'].'</td>
                                    </tr>

                                ';
                            }
                            
                        }
                        ?>
                            
                            
                        </table>
                    </div>
                </div>            

        </div>
    </body>
    </html>
<?php
    function getAll(){
        $query = "SELECT * FROM prod.bksld";
        
        $stmt = $pdo->prepare($query); 
        $arr = array();
        $ret = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                print_r('<pre>');
                print_r($row['AGE']);
                print_r('<pre>');
                $s->age = $row['AGE'];
                array_push($ret, $s);
                // $arr[] = $row;
                //array_push($arr, $row);
                //echo json_encode($arr);
            }
            
        }
    }
?> 

