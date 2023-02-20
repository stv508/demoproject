<?php
include("session.php");
$year = $_POST['holi_year'];
$yearSele = mysqli_query($connect, "SELECT  * FROM `holidays` WHERE LEFT(date,4) = '$year' ");
$count = 1;
while ($yearFetch = mysqli_fetch_assoc($yearSele)) {
    echo "<tr>
        <td>" . $count . "</td>
        <td>" . $yearFetch['date'] . "</td>
        <td>" . $yearFetch['reason'] . "</td>
        <td><center><a href='set_holidays_edit.php?holidayid=" . $qu_fetch['s.no'] . "'><i class='icon-trash text-danger'></i></a></center></td>
    </tr>";
    $count = $count + 1;
}





// SELECT emp_id, month, sum(leaves),fleaves FROM 
// 	(SELECT emp_id, MONTH(from_date) AS month, 
//      CASE 
//      	WHEN MONTH(to_date)!= MONTH(from_date) THEN DATEDIFF(LAST_DAY(from_date) , from_date) +1 
//      	ELSE DATEDIFF(to_date,from_date) + 1 
//      	END AS leaves ,
//      CASE
//      	WHEN MONTH(to_date) != MONTH(from_date) THEN DAYOFMONTH(to_date)
//      	END as fleaves
//      FROM emp_leaves
     
//  	) AS a WHERE emp_id = 'emp3'  
//     	GROUP BY month;





// SELECT emp_id, month, SUM(fleaves) FROM 
// 	(SELECT emp_id, MONTH(to_date) AS month, 
//      CASE
//      	WHEN MONTH(to_date) != MONTH(from_date) THEN DAYOFMONTH(to_date)
//      ELSE (to_date-from_date)+1
//      END as fleaves
     
//      FROM emp_leaves
//  	) AS b
//     WHERE emp_id = 'emp3' GROUP BY month 







// SELECT emp_id, month, sum(leaves) FROM 
// 	(SELECT emp_id, MONTH(from_date) AS month, 
//      CASE 
//      	WHEN MONTH(to_date)!= MONTH(from_date) THEN DATEDIFF(LAST_DAY(from_date) , from_date) +1 
//      	ELSE DATEDIFF(to_date,from_date) + 1 
//      	END AS leaves 
//      FROM emp_leaves
     
//  	) AS a WHERE emp_id = 'emp3'  
//     	GROUP BY month



// SELECT emp_id, month, SUM(fleaves) FROM 
// 	(SELECT emp_id, MONTH(to_date) AS month, 
//      CASE
//      	WHEN MONTH(to_date) != MONTH(from_date) THEN DAYOFMONTH(to_date)
//      ELSE (to_date-from_date)+1
//      END as fleaves
     
//      FROM emp_leaves
//  	) AS b
//     WHERE emp_id = 'emp3' GROUP BY month;



// LAST 


// SELECT emp_id, month, sum(leaves) AS fleave,tleaves, tmonth FROM 
// 	(SELECT from_date,to_date,emp_id,MONTH(to_date) AS tmonth, MONTH(from_date) AS month, 
//      CASE 
//      	WHEN MONTH(to_date)!= MONTH(from_date) THEN DATEDIFF(LAST_DAY(from_date) , from_date) +1 
//      	ELSE DATEDIFF(to_date,from_date) + 1 
//      	END AS leaves ,
//      CASE
//      	WHEN MONTH(to_date) != MONTH(from_date) THEN DAYOFMONTH(to_date)
     
//      END as tleaves
//      FROM emp_leaves
     
//  	) AS a WHERE emp_id = 'emp3'  AND ( MONTH(from_date) = '2' OR MONTH(to_date) = '2')  AND ( YEAR(from_date) = '2022' OR YEAR(to_date) = '2022') 
//     	GROUP BY month
//         ORDER BY month;