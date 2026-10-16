<?php
echo "Customer hash: ";
echo password_hash("Customer123!", PASSWORD_DEFAULT);

echo "<br><br>Admin hash: ";
echo password_hash("Admin123!", PASSWORD_DEFAULT);
?>