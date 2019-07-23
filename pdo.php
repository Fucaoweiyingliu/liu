<?php
header("content-type:text/html;charset=utf8");//调整页面编码格式
try {
    //通过参数连接也是php推荐的函数
    //通过uri的方式进行连接 file后面是绝对路径，不支持相对路径
    $link='uri:file://E:/wamp/www/1704phpA/lession04/dsn.txt';
    $dbh = new PDO($link,'root',"");
    $dbh->exec("set  names  utf8");
    //使用PHP创建数据表
    $sql=<<<stu
      create table  if not  exists user01(
      user_id int  primary key  auto_increment,
      user_name varchar(40)  not  null,
      user_pwd  varchar(32)  not  null,
      user_states  int(2)   default 1
      )engine=InnoDB  charset=utf8;
stu;
    $sql="update  use  set  user_name='喜羊羊' where user_id=11";
    $res=$dbh->exec($sql);
    //因为此函数可能返回布尔值 FALSE，但也可能返回等同于 FALSE 的非布尔值。请阅读 布尔类型章节以获取更多信息。应使用 === 运算符来测试此函数的返回值。
    if($res===false){
    var_dump(  $dbh->errorCode());//mysql的错误码
        /*
         * Array
(
    [0] => 42000   错误码
    [1] => 1064  错误编码
    [2] => You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'use  set  user_name='喜羊羊' where user_id=11' at line 1   错误信息
)*/
        print_r($dbh->errorInfo());
    }else{
        echo  "ok";
    }








   /* $stmt=$dbh->query("select  *  from user");
   print_r( $stmt->fetchAll(2));*/
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}