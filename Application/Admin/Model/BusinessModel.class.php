<?php
    namespace Admin\Model;
    class BusinessModel extends ComModel
    {
        protected $_link = array(       
            'Att'=>array( 
                'condition'=> 'ftype=3  AND del=0',           
                'mapping_type'      => self::HAS_MANY,           
                //'mapping_name'      => 'Attachment', 
                'foreign_key'       =>  'bid',    
                'relation_foreign_key'  =>  'bid',
                'class_name'        =>  'Attachment', 
            )     
        );

    }
