<?php
echo "Coucou utilisateur<br>";
echo "<a href='/logout.php'>Logout</a>";
echo "<form action='/profile/profileForm.php' method='post'>
 <input type='submit' name='profile' value='Modifier votre profil'>
</form>";
echo "<form action='/experience/experienceForm.php' method='post'>
 <input type='submit' name='experience' value='Ajouter une expérience'>
</form>";


?>
