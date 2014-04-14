<?php
class AjaxController extends Controller
{

	static function actionIndex(){
		self::render('index','index',array('oneParam'=>'one','twoParam'=>'two'));
	}
	
	static function actiongetMeta(){
		if(isset($_GET['type']) && $_GET['type']!=''){
			$sql = 'SELECT * FROM `tbl_'.$_GET['type'].'`';
			$result = DB::query($sql)->fetchAll();
			if($result){
				foreach($result as $string){
					echo '<a style="cursor:pointer;" onclick=createForm("list","'.$string['name'].'","'.$_GET['type'].'")>'.$string['name'].'</a><br>';
				}
			}
		}
	}

    static function actiongetItems(){
        if(isset($_GET['name']) && $_GET['name']!='' && isset($_GET['parent']) && $_GET['parent']!='' && isset($_GET['type']) && $_GET['type']!=''){

            $name = $_GET['name'];
            $parent = $_GET['parent'];
            $type = $_GET['type'];



            if($type == 'list'){
                $parent = substr($parent,0,-1);
                $func = 'get'.$parent;
                $object = $parent::$func($name);
                if(isset($object->forms['listForm']))
                    echo $object->openForm($object->forms['listForm']);
                //$sprav->openForm($sprav->forms['from']);
            }else if($type == 'element'){
                if(isset($_GET['id']) && $_GET['id']!=''){
                    $func = 'get'.$parent;
                    $object = $parent::$func($name);
                    //->table[$_GET['id']]
                    if(isset($object->forms['elementForm']))
                        echo $object->openForm($object->forms['elementForm'],$object->table[$_GET['id']]);
                }
            }
        }
    }
}
 
?>