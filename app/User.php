<?php

class User
{
    private $db;
    private $table = 'user';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($email, $password) {
	    // Memeriksa keunikan email
	    $query = "SELECT * FROM user WHERE email = ?";
	    $stmt = $this->db->getConnection()->prepare($query);
	    $stmt->bind_param("s", $email);
	    $stmt->execute();
	    $result = $stmt->get_result();
	    
	    if ($result->num_rows > 0) {
	        // Email sudah terdaftar
	        return "Email sudah terdaftar. Silakan gunakan email lain.";
	    }
	    
	    // Enkripsi password
	    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	    // Menyimpan data ke database
	    $query = "INSERT INTO user (email, password) VALUES (?, ?)";
	    $stmt = $this->db->getConnection()->prepare($query);
	    $stmt->bind_param("ss", $email, $hashedPassword);
	    
	    if ($stmt->execute()) {
	        // Registrasi berhasil
	        return true;
	    } else {
	        // Registrasi gagal
	        return "Registrasi gagal. Silakan coba lagi.";
	    }
	}
    public function login($email, $password)
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM $this->table WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
            	$_SESSION['email'] = $email;
           		header("location: pending.php");
           		exit;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function cekStatus($email){
    	$conn = $this->db->getConnection();
    	$sql = "SELECT status FROM $this->table WHERE email = '$email'";
    	$result = $conn->query($sql);
    	$status = $result->fetch_assoc();
    	$status = $status["status"];
    	$status = intval($status);
    	if($status !== 0){
    		$_SESSION['login'] = true;
    		header("location: index.php");
    	}
    }
    public function getKode($email){
    	$angka = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
		$kode = $angka[mt_rand(0, 9)].$angka[mt_rand(0, 9)].$angka[mt_rand(0, 9)].$angka[mt_rand(0, 9)].$angka[mt_rand(0, 9)].$angka[mt_rand(0, 9)];
		$kode = strval($kode);
		$conn = $this->db->getConnection();
    	$sql = "UPDATE user set kode='$kode' where email='$email'";
    	if($conn->query($sql)){
    		$result = $conn->query("SELECT kode FROM user WHERE email='$email'");
    		$row = $result->fetch_assoc();
    		$kode = $row['kode'];
    		require_once "verifikasi.php";
    	}
    }
    public function verifikasi($email, $kodeUser){
    	$conn = $this->db->getConnection();
    	$result = $conn->query("SELECT kode FROM user WHERE email='$email'");
    	$row = $result->fetch_assoc();
    	$kodeDb = $row['kode'];
    	if($kodeUser == $kodeDb){
    		$status=1;
    		$updateStatus = $conn->query("UPDATE user set status='$status' WHERE email='$email'");
    		$_SESSION['login'] = true;
    		return true;
    	}else{
    		return false;
    	}
    }
}
