<?php
echo "Admin: " . password_hash("admin123", PASSWORD_DEFAULT) . "<br>";
echo "Cliente: " . password_hash("cliente123", PASSWORD_DEFAULT) . "<br>";
?>