<?php
/**
 * Table Definition for ft_refe
 */

class DataObject_FtRefe extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ft_refe';                         // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $referencia;                      // string(100)  
    public $fecha;                           // datetime(19)  binary

    /* Static get */
    function &staticGet($class,$k,$v=NULL) { return DB_DataObject::staticGet('DataObject_FtRefe',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'referencia' =>  DB_DATAOBJECT_STR,
             'fecha' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'referencia' => '',
         );
    }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
