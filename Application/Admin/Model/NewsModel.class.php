<?php
    namespace Admin\Model;
    class NewsModel extends ComModel
    {
        protected $_link = array(       
            'Att'=>array( 
                'condition'=> 'ftype=1  AND del=0',           
                'mapping_type'      => self::HAS_MANY,           
                //'mapping_name'      => 'Attachment', 
                'foreign_key'       =>  'bid',    
                'relation_foreign_key'  =>  'ni_Id',
                'class_name'        =>  'Attachment', 
            )     
        );

    }
