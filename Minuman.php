<?php

class Minuman
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "db_tugas_web");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getDataMinuman()
    {
        $query = "SELECT * FROM tMinuman";
        $result = $this->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function tambahMinuman($nama, $harga)
    {
        $stmt = $this->conn->prepare("INSERT INTO tMinuman (nama_minuman, harga_minuman) VALUES (?, ?)");
        if (!$stmt) {
            // Log or handle the error
            return false;
        }

        $stmt->bind_param("sd", $nama, $harga);
        $result = $stmt->execute();

        $stmt->close();
        return $result;
    }

    public function getMinumanById($id)
    {
        $query = "SELECT * FROM tMinuman WHERE id_minuman = '$id'";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function hapusMinuman($id)
    {
        $query = "DELETE FROM tMinuman WHERE id_minuman = '$id'";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function editMinuman($id, $nama, $harga)
    {
        $sql = "UPDATE tMinuman SET nama_minuman = ?, harga_minuman = ? WHERE id_minuman = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdi", $nama, $harga, $id);
        return $stmt->execute();
    }
}

?>