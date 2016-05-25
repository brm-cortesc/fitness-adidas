<?php
/**
 * Table Definition for ft_lote_x_usuario
 */

class DataObject_FtLoteXUsuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ft_lote_x_usuario';               // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $idLote;                          // int(11)  
    public $idUsuario;                       // int(11)  
    public $fecha;                           // datetime(19)  binary

    /* Static get */
    function &staticGet($class,$k,$v=NULL) { return DB_DataObject::staticGet('DataObject_FtLoteXUsuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idLote' =>  DB_DATAOBJECT_INT,
             'idUsuario' =>  DB_DATAOBJECT_INT,
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
