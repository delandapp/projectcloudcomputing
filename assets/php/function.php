<?php
$connect = mysqli_connect("database-1.clefways2bjo.us-east-1.rds.amazonaws.com","admin","Smk5terdepan#","bank");

// Query Data
function query($parameter) {
    global $connect;
    $query = mysqli_query($connect,$parameter);
    $data = [];
    while ($dataa = mysqli_fetch_assoc($query)) {
        $data [] = $dataa;
    }
    return $data;
 }

// Function Registrasi
function registrasi($data) {
    global $connect;

    $email = mysqli_real_escape_string($connect, $data["email"]);
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $password2 = mysqli_real_escape_string($connect, $data["password2"]);

    // Cek Email Ada Yang Sama
    $namaemail = mysqli_query($connect, "SELECT email FROM user WHERE email = '$email'");
    if ($password != $password2) {
      return;
    }

    if ( mysqli_fetch_assoc($namaemail)) {
     return;
    }

    // Enscripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Membuat kode_user
    $id_user = mysqli_query($connect, "SELECT id FROM user ORDER BY id DESC LIMIT 1");
    $id_user_convert = mysqli_fetch_assoc($id_user);
    $id_user_convert = strval( $id_user_convert['id'] );
    $kode_user ="$id_user_convert".date('m');
    
    // Set Session
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['kode_user'] = $kode_user;

    // // Masukan Kedalam Database
    // $inssert = "INSERT INTO user VALUES 
    // ('', '$kode_user', '$email', '$password', '$level', '$status')
    // ";

    // $inssert_profil = "INSERT INTO user_profil VALUES
    // ('', '$kode_user', '$email', '', '', '', '')
    // ";

    // mysqli_query($connect, $inssert);
    // mysqli_query($connect, $inssert_profil);
    header("location:login.php?biodata=true");
    return mysqli_affected_rows($connect);
  }

  function biodata($data) {
    global $connect;
    $email = $_SESSION["email"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $password = $_SESSION["password"];
    $kode_user = $_SESSION["kode_user"];
    $kelamin = $data['kelamin'];
    $status = "tdk aktif";
    $level = $data['jabatan'];
    $tanggal_lahir = $data['tanggal_lahir'];
    $no_handphone = $data['nohp'];

    $kode_user = $kode_user.$kelamin;

    // Cek NoHandphone Ada Yang Sama
    $nohandphone = mysqli_query($connect, "SELECT no_hp FROM user_info WHERE no_hp = '$no_handphone'");

    if ( mysqli_fetch_assoc($nohandphone)) {
     return;
    }

     // Masukan Kedalam Database
     $inssert = "INSERT INTO user VALUES 
     ('', '$kode_user', '$email', '$password', '$status', '$level')
     ";
 
     $inssert_profil = "INSERT INTO user_info VALUES
     ('', '$kode_user', '$nama', '$no_handphone', '$alamat', '$kelamin', '$tanggal_lahir', '$email')
     ";
 
     mysqli_query($connect, $inssert);
     mysqli_query($connect, $inssert_profil);
     header("location:login.php");
     session_destroy();
     return mysqli_affected_rows($connect);
  }

  function login($data) {
    global $connect;
    $email = $data['email'];
    $password = $data['password'];

    // Cek Data email
    $emaildb = mysqli_query($connect,"SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($emaildb)) {
        // Ambil_data
        $data_user = mysqli_fetch_assoc($emaildb);
        $password_user = $data_user["password"];
        $password_user = password_verify($password, $password_user);

        // Cek Apakah Password Sama
        if ($password_user == true) {
            if($data_user["status"] == "tdk aktif") {
                echo "
            <script>alert('Maaf Akun Anda Belum Aktif')</script>
            ";
            return mysqli_affected_rows($connect);
            }
            // SET SESSION
            $_SESSION['email'] = $email;
            $_SESSION['level'] = $data_user["level"];
            $_SESSION['status'] = $data_user["status"];
            $_SESSION['kode_user'] = $data_user["kode_user"];
            $_SESSION['login'] = true;
            $_SESSION['home'] = true;
            header("location:home.php");
            return mysqli_affected_rows($connect);;
        } else {
            echo "
            <script>alert('Password Salah')</script>
            ";
            return mysqli_affected_rows($connect);
        }
    } else {
        echo "
        <script>alert('Email Tidak Terdaftar')</script>
        ";
        return mysqli_affected_rows($connect);
    }
}


?>