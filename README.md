# Login-dan-register-dengan-verfikasi-email
simpan di xampp/htdocs, jalankan server apache dan mysql, import verifikasi-email.sql ke database, atau kalian bisa buat database sendiri dengan 
dbName: verifikasi-email <br>
struktur tabel :<br>
id|int:255|autoIncrement
email|varchar:255|unique
password|varchar:255
kode|varchar:6
status|boolean:2
