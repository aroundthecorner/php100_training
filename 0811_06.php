<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">  
<html>  
    <head>  
        <title>calendar</title>  
        <meta name="Author" content="zhouyg1992">  
        <meta name="Description" content="��phpʵ�ֵ�һ����������">  
        <style type="text/css">  
            table #week {  
                 text-align:center;  
                 background-color:#cccccc;  
            }  
            .weekday {color:red}  
            table tr {  
                text-align:center;  
                background-color:#ffffcc;  
            }  
            #caption {  
                font:bold 20px ��Բ,����;  
            }  
            #query {  
                width:500px;  
                height:10px;  
                margin:50px auto;  
                text-align:center;  
            }  
        </style>  
    </head>  
<?php  
    //������ύ��ʱ������ʾ���ύ���µ�������������ʾ��ǰ�·�����  
    if ($_GET['month'] && $_GET['year'])  
    {  
        $month = $_GET['month'];  
        $year = $_GET['year'];  
    }  
    else   
    {  
        $month = date ('m');  
        $year = date ('Y');  
    }  
      
    $weekid = date ('w',mktime(0,0,0,$month,1,$year));//ĳ��ĳ�µ�һ�������ڼ���0-7�ֱ����������-������  
    $countdays = date('t',mktime(0,0,0,$month,1,$year));//ĳ��ĳ���µ�����  
    $arr_days = array ();//����$arr_days����ĳ���µ�ÿһ��  
  
    //��ʼ������$arr_days  
    for ($i = 0; $i <= 41; $i++)  
    {  
        $arr_days[$i] = " ";  
    }  
  
    //��$arr_days���鸳ֵ  
    for ($i = $weekid, $j = 1; $j <= $countdays; $i++, $j++)  
    {  
        $arr_days[$i] = $j;  
    }  
?>  
    <body>  
          
        <form action="">  
            <div id="query">  
                <input type="text" name="year">��  
                <input type="text" name="month">��  
                <input type="submit" value="��ѯ">  
            </div>  
        </form>  
          
        <table width="500px" height="300px" align="center">  
  
            <caption><span id="caption"><?php echo $year ?>��<?php echo $month ?>������</span></caption>  
            <tr id="week">  
                <td><span class="weekday">Sun</span></td>  
                <td>Mon</td>  
                <td>Tue</td>  
                <td>Wed</td>  
                <td>Thu</td>  
                <td>Fir</td>  
                <td><span class="weekday">Sat</span></td>  
            </tr>  
              
            <?php  
                //������  
                for ($i = 0; $i <= 41; $i++)  
                {  
                    if ($i % 7 == 0)  
                    {  
                        echo '<tr>';  
                    }  
                    echo '<td>'.$arr_days[$i].'</td>';  
                    if (($i + 1) % 7 == 0)  
                    {  
                        echo '</tr>';  
                    }  
                }  
            ?>  
      
        </table>  
    </body>  
</html>  