<?php
/**
 * Table Definition for ft_redimido
 */

class DataObject_FtRedimido extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ft_redimido';                     // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $idCamiseta;                      // int(11)  
    public $fecha;                           // datetime(19)  binary

    /* Static get */
    function &staticGet($class,$k,$v=NULL) { return DB_DataObject::staticGet('DataObject_FtRedimido',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idCamiseta' =>  DB_DATAOBJECT_INT,
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


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
