<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['set']=1;

$obj ; $conn;
error_reporting(0);
class config
{
	function con_oop()
	{
	// Load configuration as an array. Use the actual location of your configuration file
		//$config = parse_ini_file('config.ini');


    // Connect to the server and select a database
        $mysqli = new mysqli('localhost','altschoo_project','findproject1234$$$$','altschoo_project');
       return $mysqli;
            //else{die("Noooo");}

    }

	function clean($value, $type = "alphanumeric" ,$limit = 30, $min =1, $result="invalid")
    {
        //return $value;
        if(strlen($value) > $limit || strlen($value) < $min)
        {
           $result = "invalid";
        }
        else if($type === "alphabets")
        {
           if ( preg_match( '/^[A-z]+$/', $value) )
            {
                $result =  $value;
            }
        }
        else if($type === "year")
        {
           if ( preg_match( '/^(19|20)\d{2}$/', $value) )
            {
                $result =  $value;
            }
        }
        else if($type === "number")
        {
            if ( preg_match( '/^[0-9]+$/', $value) && $value != "0")
            {
                $result =  $value;
            }
        }
        else if($type === "alphanumeric")
        {
            if ( preg_match( '/^[a-zA-Z\d]+$/', $value) )
            {
                $result =  $value;
            }
        }
        else if($type === "email")
        {
            if ( preg_match( '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/', $value) )
            {
                $result =  $value;
            }
        }
        else if($type === "rich")
        {
            $result =  htmlentities( trim($value) , ENT_NOQUOTES );
        }

       return $result;
    }



	function getIp()
	{

		if (!empty($_SERVER["HTTP_CLIENT_IP"]))
		{
			//check for ip from share internet
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		}
		else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
		{
			// Check for the Proxy User
			$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		else
		{
			$ip = $_SERVER["REMOTE_ADDR"];
		}
			// This will print user's real IP Address
			// does't matter if user using proxy or not.
		return $ip;
	}


    /*************************
    |   Get Data Function    |
    *************************/
    public function  getData($query)
    {
       // print_r ($query);
       // die();
        $obj = new config();
        $conn = $obj->con_oop();
        $errors = array();
        $data;
            //echo "yes connected";
             //$mysqli = new mysqli('localhost','root','','diarydb');
        $myArray = array();
        if($result = $conn->query($query))
        {
           // echo "yes in it";
            $tempArray = array();
            while($row = $result->fetch_object())
                {
                    $tempArray = $row;
                    array_push($myArray, $tempArray);
                }

              $conn->close();
            $data = json_encode($myArray);
        }
        else
        {
            array_push($errors,mysqli_error($conn ));
        }
    return array("data"=>$data,"errors"=>$errors);



    }/*******getdata fuction ends********/
    // Function Naya Wala
    function magicquery($table,$arrclient,$istransaction=false,$tcount=0)
    {
	//print_r($arrclient);
	//die();
        $obj = new config();
        $arrdb=$obj->getData("SHOW COLUMNS FROM ".$table)["data"];
		//print_r($arrdb);
        $typeinfo = array("varchar"=>"s","char"=>"s","int"=>"i","tinyint"=>"i",
                        "smallint"=>"i","bigint"=>"i","float"=>"d",
                        "double"=>"d","text"=>"s","date"=>"s","time"=>"s",
                        "datetime"=>"s", "timestamp"=>"s");

        $columns = "";
        $binding = "";
        $types = "";
        $values = array();

        $arrdb= json_decode($arrdb,true);
        foreach($arrdb as $column)
        {
            $typearr = explode("(", $column['Type'], 2);
            $typearr = explode(" ", $typearr[0], 2);
            $type = trim($typearr[0]);
            foreach($arrclient as $key=>$value)
            {
               //$result = array_search_partial($column,$key);
               if (strtolower($column['Field'])  == strtolower($key))
               {
                  // echo $column['Field'] ." - ". $column['Type']." - ".$value;
                   $columns .='`'.$column['Field'].'`'.",";
                   array_push($values,$value);
                   $binding .= "?,";
                   $types .= $typeinfo[$type];

               }

            }
        }

        $columns = rtrim($columns, ",");

        $binding = rtrim($binding, ",");


        $query = "insert into `{$table}` ({$columns}) values ({$binding})";
       //echo $query;
        //print_r($values);
        //die();
        if(!$istransaction){
            return $obj->executeQuery($query,$types,$values);
        }
        else{
            return $obj->executetransaction($query,$types,$values,$tcount);
        }
    }



    // Function Naya Wala
    function magicupdate($table,$arrclient,$where="",$istransaction=false,$tcount=0)
    {
       //print_r($arrclient);
        $obj = new config();
        $arrdb=$obj->getData("SHOW COLUMNS FROM ".$table)["data"];
        $typeinfo = array("varchar"=>"s","char"=>"s","int"=>"i","tinyint"=>"i",
           "mediumint"=>"i",
                        "smallint"=>"i","bigint"=>"i","float"=>"d",
                        "double"=>"d","text"=>"s","date"=>"s","datetime"=>"s",
                        "time"=>"s", "timestamp"=>"s","longtext"=>s);

        $columns = "";
        $binding = "";
        $types = "";
        $wheretypes="";
        $values = array();
        $whereArr =explode("=?",$where);
        $arrdb= json_decode($arrdb,true);
        $wherevalues=array();
        foreach($arrdb as $column)
        {
            $typearr = explode("(", $column['Type'], 2);
            $typearr = explode(" ", $typearr[0], 2);
            $type = trim($typearr[0]);
            foreach($arrclient as $key=>$value)
            {
               //$result = array_search_partial($column,$key);
               if (strtolower($column['Field'])  == strtolower($key))
               {
                   $columns.='`'.$column['Field'].'`'."=?,";
                   array_push($values,$value);
                   $binding .= "?,";
                   $types .= $typeinfo[$type];

               }

            }
            foreach($whereArr as $w)
            {

                $w = trim((isset(explode("AND",$w)[1])?explode("AND",$w)[1]:$w));
                if (strtolower($column['Field'])  == strtolower($w))
                {
                    if(!empty($w)){
                        array_push($wherevalues,$arrclient[$w]);
                        $wheretypes .= $typeinfo[$type];
                    }
                }
            }
        }
        $types .=$wheretypes;
        foreach($wherevalues as $v){
            array_push($values, $v);
        }

        $columns = rtrim($columns, ",");

        $binding = rtrim($binding, ",");

        if($where!=""){
            $where="where ".$where;
        }
        $query = "update `{$table}` set {$columns} {$where}";

        // echo $query;
        // print_r($values);
        // echo $types;
        // die();
        if(!$istransaction){
            return $obj->executeQuery($query,$types,$values);
        }
        else{
            return $obj->executetransaction($query,$types,$values,$tcount);
        }
    }
    public function executeQuery($query,$type,$params, $tcount = 0)
    {
        // echo $query;
        // echo $type;
        // print_r($params);

        $obj = new config;
        $conn=$obj->con_oop();
        $errors = array();
        $effectedrows = 0;
        $insertedid = -1;
        #array_push($errors,json_decode('{"message":"DUMMY ERROR","query":"'.$query.'", "detail":"dummy"}'));
        $res = $conn->prepare($query);// OR die('No There is an Error: ' . mysqli_error($conn));
       if($res)
       {
        $refArr = array();
        array_push($refArr,$type);
        foreach($params as $k => $v){$refArr[] = &$params[$k];}
        
        $ref    = new ReflectionClass('mysqli_stmt');
        $method = $ref->getMethod("bind_param");
        $method->invokeArgs($res,$refArr)  or  array_push($errors,json_decode('{"message":"Error in Parameters Binding","detail":"'.$res->error.'"}'));
        if(empty($errors))
        {
            $res->execute() or  array_push($errors,json_decode('{"message":"Error in Executing Query", "detail":"'.$res->error.'"}'));

            $insertedid = $conn->insert_id;
            $effectedrows = $res->affected_rows;
        }

       }
       else
       {
           array_push($errors,json_decode('{"message":"Invalid Query",
                                             "detail":"'.mysqli_error($conn ).'"}'));
       }
        $conn->close();
        return array("effected"=>$effectedrows,"id"=>$insertedid,"errors"=>$errors,"query"=>$query);
    }


    public function executetransaction($query,$type,$params, $tcount = 0)
    {
        global $obj; global $conn;

        $errors = array();
        $effectedrows = 0;
        $insertedid = -1;


        if($tcount  == 1)
        {
            $obj = new config;
            $conn=$obj->con_oop();
            $conn->autocommit(false);
        }

       $res = $conn->prepare($query);// OR die('No There is an Error: ' . mysqli_error($conn));

       if($res)
       {
        $refArr = array();
        array_push($refArr,$type);
        foreach($params as $k => $v){$refArr[] = &$params[$k];}
        $ref    = new ReflectionClass('mysqli_stmt');
        $method = $ref->getMethod("bind_param");
        $method->invokeArgs($res,$refArr)  or  array_push($errors,json_decode('{"message":"Error in Parameters Binding","query":"'.$query.'", "detail":"'.$res->error.'"}'));;
        if(empty($errors))
        {
            $res->execute() or array_push($errors,json_decode('{"message":"Error in Executing Query","query":"'.$query.'", "detail":"'.$res->error.'"}'));
            $insertedid = $conn->insert_id;
             $effectedrows = $res->affected_rows;
        }



        #die('No There is an Error: ' .$query. " - ". mysqli_error($conn ));
       }
      else
       {
           array_push($errors,json_decode('{"message":"Invalid Query | Rollback","query":"'.$query.'",
                                             "detail":"'.mysqli_error($conn ).'"}'));

       }

        if($tcount==2 && empty($errors))
        {
            echo "commit";
            $conn->commit();
            $conn->close();

        }
        elseif(!empty($errors))
        {
            $conn->rollback();
        }
        return  array("effected"=>$effectedrows,"id"=>$insertedid,"errors"=>$errors);
    }


    public function getParamData($query,$type,$params)
    {

		//echo ($query);
		//echo ($type);
		//echo print_r($params);
        $obj = new config();
        $conn = $obj->con_oop();

        $res    = $conn->prepare($query);
        $refArr = array();
        array_push($refArr,$type);
        foreach($params as $k => $v){$refArr[] = &$params[$k];}
        $ref    = new ReflectionClass('mysqli_stmt');
        $method = $ref->getMethod("bind_param");
        $method->invokeArgs($res,$refArr);
        $res->execute();


        $meta = $res->result_metadata();


         while ($field = $meta->fetch_field()) {
                $var = $field->name;
                $$var = null;
                $fields[$var] = &$$var;
        }

    // Bind Results
        call_user_func_array(array($res,'bind_result'),$fields);

    // Fetch Results
        $results=array();
        $i = 0;
        while ($res->fetch()) {
            $results[$i] = array();
            foreach($fields as $k => $v)
                $results[$i][$k] = $v;
            $i++;
        }

        $conn->close();
   //     return json_encode();
        $errors = array();
    return array("data"=>$results,"errors"=>$errors);

    }






    public function  getData2($tableName, $columnNames)
    {
         $res = array();

        $obj = new config();
        $conn = $obj->con_oop();
       // $res[2]= array("1","3r");
       $query = "select";
       $counter = 1;
       foreach($columnNames as $key => $value)
       {
        if($counter==1)
            $query .= " ".$value ;
        else
            $query .= ", ".$value ;

           $counter++;
       }
        $query .= " from ".$tableName;
        if($conn == null)
        {
            echo 'error';
        }
        else
        {
            if(!$stmt =$conn->query($query))
            {
                echo 'query error';
            }
            else
            {



                while($row = $stmt->fetch_assoc())
                {
                   //$res[count($res)]= array('MakeID'=>$row['MakeID'],'Name'=>$row['Name']);

                        $temp = array();
                        for($i = 0 ; $i <= count($columnNames)-1; $i++)
                        {
                            $temp[count($temp)] = $row[$columnNames[$i]];
                        }
                    $res[count($res)]= $temp;

                   //$res[count($res)]= array($row[$MakeID], $row[$NAME]);
                }


            }

        }
         return $res;
    }
}
/*********************
|  Reading Http Post |
*********************/
    $request = json_decode(file_get_contents('php://input'));


    $obj = new config();
    $groupid  =1;
    $userid = 1;

    function insert($table,$rdata,$return=false)
    {
        $obj = new config();
        $r = $rdata;
        //echo json_encode($r);
        $res =  $obj->magicquery($table,$r);
        if($return)
            return  $res;
        else
             echo json_encode($res);
    }

    function insertsessioncode($table,$rdata,$return=true)
    {
        $obj = new config();
        $r = $rdata;
        //echo json_encode($r);
        $res =  $obj->magicquery($table,$r);
        if($return)
            return  $res;
        else
             echo json_encode($res);
    }
    function update($table,$rdata,$whereclause="",$return=false)
    {
       $obj = new config();
        $r = $rdata;
        //echo json_encode($r);
        $res =  $obj->magicupdate($table,$r,$whereclause);
        if($return)
                    return  $res;
                else
                     echo json_encode($res);
    }
    function clean($value,$type= "alphanumeric",$limit = 30, $min =1, $result=false)
    {
      $obj = new config();
       return $obj->clean($value,$type);
    }
$userid=$_SESSION['set'];

/*********************
|  Reading Http Post |
*********************/
    $request = json_decode(file_get_contents('php://input'));
    function email($email,$subject,$content)
    {
     return   mail($email,$subject,$content);
    }
    function newaccountmessage($name,$plainpass)
    {
      return  "Hi {$name}, Your account at EJARAH Web Application is created please follow this link and input
    {$plainpass} as password to login and change your password after then";
    }
    function passwordresetmessage($plainpass)
    {
      return  "Hi, Your account password is reset please use this temporary password to login and reset it.
      Password: {$plainpass} ";
    }
    function updatednewaccountmessage($name,$plainpass)
    {
       return "Hi {$name},\n     Here’s your login details for EJARAH, go to www.ejarah.com and Login with this Username and password {$plainpass}. You can change your password when you’ve logged in by clicking on the blue key icon in the top right hand corner.\n\nThanks,\nEjarah Team";
    }

    $obj = new config();
?>
