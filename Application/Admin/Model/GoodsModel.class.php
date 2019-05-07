<?php
    namespace Admin\Model;
    class GoodsModel extends ComModel
    {
        protected $_link = array(       
            'Att'=>array( 
                'condition'=> 'ftype=0  AND del=0',           
                'mapping_type'      => self::HAS_MANY,           
                //'mapping_name'      => 'Attachment', 
                'foreign_key'       =>  'bid',
                'relation_foreign_key'  =>  'id',
                'class_name'        =>  'Attachment', 
            )     
        );

    }
