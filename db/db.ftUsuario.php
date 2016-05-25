<?php
/**
 * Table Definition for ft_usuario
 */

class DataObject_FtUsuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ft_usuario';                      // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $nombre;                          // string(100)  
    public $apellido;                        // string(150)  
    public $email;                           // string(150)  
    public $telefono;                        // string(45)  
    public $genero;                          // string(1)  enum
    public $idDepto;                         // int(11)  
    public $idCiudad;                        // int(11)  
    public $tipoDocumento;                   // string(2)  enum
    public $documento;                       // string(45)  
    public $fechaNacimiento;                 // date(10)  binary
    public $deseoInformacion;                // string(45)  
    public $autorizaNestle;                  // string(1)  enum
    public $aceptoTerminos;                  // string(1)  enum
    public $fecha;                           // datetime(19)  binary

    /* Static get */
    function &staticGet($class,$k,$v=NULL) { return DB_DataObject::staticGet('DataObject_FtUsuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'email' =>  DB_DATAOBJECT_STR,
             'telefono' =>  DB_DATAOBJECT_STR,
             'genero' =>  DB_DATAOBJECT_STR,
             'idDepto' =>  DB_DATAOBJECT_INT,
             'idCiudad' =>  DB_DATAOBJECT_INT,
             'tipoDocumento' =>  DB_DATAOBJECT_STR,
             'documento' =>  DB_DATAOBJECT_STR,
             'fechaNacimiento' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'deseoInformacion' =>  DB_DATAOBJECT_STR,
             'autorizaNestle' =>  DB_DATAOBJECT_STR,
             'aceptoTerminos' =>  DB_DATAOBJECT_STR,
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
             'nombre' => '',
             'apellido' => '',
             'email' => '',
             'telefono' => '',
             'genero' => '',
             'tipoDocumento' => '',
             'documento' => '',
             'deseoInformacion' => '',
             'autorizaNestle' => '',
             'aceptoTerminos' => '',
         );
    }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
