<!--Admin:  ./mvc/model/products.php -->
<?php

class GetData
{
    private $conn;

    function __construct()
    {
        $this->conn = new DB;
    }

    function getHotel()
    {
        $sql = 'select * from hotel';
        return $this->conn->getAll($sql);
    }

    function getRoom()
    {
        $sql = 'select * from room';
        return $this->conn->getAll($sql);
    }

    function getRoomHotel($id)
    {
        $sql = "SELECT room.*, hotel.name_hotel, hotel.address, hotel.average_rating, hotel.review, room_type.type_name from room
        JOIN hotel ON hotel.id_hotel=room.id_hotel
        JOIN room_type ON room_type.id_type_room=room.id_type_room
        WHERE room.id_room like '%$id%'";
        return $this->conn->getAll($sql);
    }
    function getHotelRoom($id)
    {
        $sql = "SELECT room.*, hotel.*, room_type.type_name from room
        JOIN hotel ON hotel.id_hotel=room.id_hotel
        JOIN room_type ON room_type.id_type_room=room.id_type_room
        WHERE hotel.id_hotel like '%$id%'";
        return $this->conn->getAll($sql);
    }

}